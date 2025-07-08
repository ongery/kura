<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    /*public function login(Request $request)
    {
        $credentials = ['email' => $request->email, 'password' => $request->password];
        
        // Attempt to authenticate as an admin first
        if (Auth::guard('web')->attempt($credentials)) {
            $user = Auth::guard('web')->user();

            $token = $user->createToken('VUEAPIAUTHENTICATETOKEN')->plainTextToken;
            Session::put('authToken', $token);
            Session::put('loggedInUserId', $user->id);
            Session::put('loggedInFullName', $user->full_name);

            // Redirect to the root route
            return redirect('/');
        }
        // If admin login fails, attempt to authenticate as an LDAP user
        else if(Auth::guard('ldap')->attempt($credentials)) {
            $user = Auth::guard('ldap')->user();
            dd($user);
    
            // Generate an authentication token if needed
            $token = $user->createToken('VUEAPIAUTHENTICATETOKEN')->plainTextToken;
            Session::put('authToken', $token);
            Session::put('loggedInUserId', $user->id);
    
            // Redirect to the user dashboard or home
            return redirect('/');
        }

        return response()->json(['error' => 'The provided credentials are incorrect.'], 401);
    }*/

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required|string',
        ]);
    
        $credentials = $request->only('email', 'password');
    
        // Step 1: Check if the user is an Admin
        $admin = User::where('email', $credentials['email'])->where('role', 'Admin')->first();
    
        if ($admin !== NULL) {
            // Admin user - Use default Laravel authentication
            if (Auth::attempt($credentials)) {

                $user = Auth::user();
                $token = $user->createToken('VUEAPIAUTHENTICATETOKEN')->plainTextToken;
                Session::put('authToken', $token);
                Session::put('loggedInUserId', $user->id);

                return redirect()->intended('/'); // Redirect to the Admin dashboard
            } else {
                return back()->withErrors(['error' => 'Invalid credentials.']);
            }
        }
        // Log the LDAP connection details
            Log::debug('Attempting LDAP connection', [
                'host' => env('LDAP_HOSTS'),
                'port' => env('LDAP_PORT'),
                'base_dn' => env('LDAP_BASE_DN'),
                'username' => env('LDAP_USERNAME'),
            ]);
        // Step 2: Handle LDAP User Authentication

        $ldapConnection = ldap_connect(env('LDAP_HOSTS'), env('LDAP_PORT'));
    
        if (!$ldapConnection) {
            return back()->withErrors(['error' => 'Unable to connect to the LDAP server.']);
        }
    
        ldap_set_option($ldapConnection, LDAP_OPT_PROTOCOL_VERSION, 3);
        ldap_set_option($ldapConnection, LDAP_OPT_REFERRALS, 0);
    
        try {
            // Bind with LDAP admin credentials
            $ldapBind = @ldap_bind($ldapConnection, env('LDAP_USERNAME'), env('LDAP_PASSWORD') );
    
            if (!$ldapBind) {
                Log::error('LDAP admin bind failed', ['error' => ldap_error($ldapConnection)]);
               // return response()->json(['error' => 'LDAP admin bind failed.']);
                return back()->withErrors(['error' => 'LDAP admin bind failed.']);
            }
    
            // Search for the user by email
            // $searchFilter = "(mail={$credentials['email']})";
           // $searchFilter = "(&(objectClass=inetOrgPerson)(|(mail={$credentials['email']})(uid={$credentials['email']})))";
            $searchFilter = "(sAMAccountName={$credentials['email']})"; // Use sAMAccountName for login
            Log::debug('LDAP search filter', ['filter' => $searchFilter]);
            $searchResult = ldap_search($ldapConnection, env('LDAP_BASE_DN'), $searchFilter);
            // dd($searchFilter, $ldapConnection, $searchResult, ldap_error($ldapConnection));
            if (!$searchResult) {
                Log::error('LDAP search failed', ['error' => ldap_error($ldapConnection)]);
                return back()->withErrors(['error' => 'LDAP search failed.']);
            //    return back()->withErrors(['error' => 'LDAP search failed.']);
            }
    
            $entries = ldap_get_entries($ldapConnection, $searchResult);    
            if ($entries['count'] === 0) {
                Log::error('User not found in LDAP directory', ['email' => $credentials['email']]);
                return back()->withErrors(['error' => 'User not found in LDAP directory.']);
                // return back()->withErrors(['error' => 'Email not found in LDAP directory.']);
            }
    
            // Get the user's DN
            $userDn = $entries[0]['dn'];
            Log::debug('User DN found', ['dn' => $userDn]);

            // Attempt to bind with the user's DN and password
            $userBind = @ldap_bind($ldapConnection, $userDn, $credentials['password']);
            if (!$userBind) {
                Log::error('LDAP user bind failed', ['error' => ldap_error($ldapConnection)]);
                return back()->withErrors(['error' => 'Invalid LDAP credentials.']);
            }
            Log::debug('LDAP authentication successful', ['email' => $credentials['email']]);
            
            //$userName = explode(' ', $entries[0]['cn'][0]);
            // Extract user details from LDAP
            $userName = explode(' ', $entries[0]['cn'][0] ?? '');
            $email = $entries[0]['mail'][0] ?? $credentials['email']; // Fallback to sAMAccountName if email is not available
            $sAMAccountName = $entries[0]['samaccountname'][0] ?? $credentials['email'];

            // Sync LDAP user data into MySQL
            $userAdd = User::updateOrCreate(
                [
                    'email' => $sAMAccountName, // Use sAMAccountName as the email in the database
                ],
                [
                    'Fname' => ucwords($userName[0] ?? ''),
                    'Lname' => ucwords($userName[1] ?? ''),
                    'role' => 'User', // Assign 'User' as the default role in your database
                    'password' => bcrypt($credentials['password']), // Store bcrypt password
                ]
            );        
            // Assign the 'User' role
            if ($userAdd->exists) {
                $role = Role::where('name', 'User')->first();
                $userAdd->roles()->syncWithoutDetaching([$role->id]);
            }
            
            Auth::login($userAdd);

            $user = Auth::user();
            $token = $user->createToken('VUEAPIAUTHENTICATETOKEN')->plainTextToken;
            Session::put('authToken', $token);
            Session::put('loggedInUserId', $user->id);
            Session::put('loggedInFullName', ucwords($entries[0]['cn'][0]));

            return redirect()->intended('/'); // Redirect to the dashboard
        } catch (\Exception $e) {
            Log::error('LDAP login error: ' . $e->getMessage());
            return back()->withErrors(['error' => 'An error occurred while authenticating with LDAP.']);
        }
    }


    public function logout(Request $request)
    {
        // Log the user out
        Auth::logout();

        // Invalidate the session
        $request->session()->invalidate();

        // Regenerate the session token to prevent session fixation attacks
        $request->session()->regenerateToken();

        // Redirect to the home page or any other route
        return redirect('/');
    }
    
}
