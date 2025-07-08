<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\WIP;
use App\Models\OITM;
use App\Models\NavBar;
use LdapRecord\Connection;
use App\Models\Attachment;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class PageController extends Controller
{

    public function saveToSession(Request $request){

        // Get the identifier from the AJAX request
        // $navItem = $request->input('navItem');
        $navItem = $request['navItem'];

        // Set the session variable
        session(['navSecondaryItem' => $navItem]);

        // echo  $_SESSION['navSecondaryItem'];

        // Return a response (optional)
        return response()->json(['message' => '('+$navItem+')'+' : Session set successfully']);
    }


    public function mainMaster()
    {
        $user = Auth::user();
        $navbarModule1 = [];
        $navbarModule2 = [];
        $navbarModule3 = [];
        $navbarModule4 = [];
        $navbarModule5 = [];

        if ($user->hasPermissionTo("Risk")) {
            $navbarModule1 = NavBar::whereNull('ParentID')->where('Order', 1)->get();
        }

        if ($user->hasPermissionTo("QMS")) {
            $navbarModule2 = NavBar::whereNull('ParentID')->where('Order', 2)->get();
        }

        if ($user->hasPermissionTo("ERM")) {
            $navbarModule3 = NavBar::whereNull('ParentID')->where('Order', 3)->get();
        }

        // if ($user->hasPermissionTo("CRM")) {
        //     $navbarModule4 = NavBar::whereNull('ParentID')->where('Order', 4)->get();
        // }

        // if ($user->hasPermissionTo("STRATEGIC")) {
        //     $navbarModule5 = NavBar::whereNull('ParentID')->where('Order', 5)->get();
        // }

        //Main Layout with data
        // return view('layouts.master', [
            return view('layouts.best', [
            'navbarModule1' => $navbarModule1,
            'navbarModule2' => $navbarModule2,
            'navbarModule3' => $navbarModule3,
            'navbarModule4' => $navbarModule4,
            'navbarModule5' => $navbarModule5,
        ]);
    }

    public function fileDownload($id)
    {
        $item = OITM::where('id', $id)->first();
        $headers = [
            'Content-Type' => 'application/pdf',
        ];
        return Storage::disk('local')->download('files/' . $item->file_path, Str::slug($item->description, '-') . ".pdf", $headers);
    }

    public function fileDownloadWIP($id)
    {
        $item = WIP::where('id', $id)->first();
        $headers = [
            'Content-Type' => 'application/pdf',
        ];
        return Storage::disk('local')->download('files/' . $item->file_path, Str::slug($item->description, '-') . ".pdf", $headers);
    }

    public function attachmentDownload($id)
    {
        $item = Attachment::where('id', $id)->first();
        $headers = [
            'Content-Type' => 'application/pdf',
        ];
        return Storage::disk('local')->download('files/' . $item->file_path, Str::slug($item->description, '-') . ".pdf", $headers);
    }

    public function checkLdapConnection()
    {
        try {
            // Instantiate the LDAP connection
            $ldap = new Connection([
                'hosts' => explode(',', env('LDAP_HOSTS')),
                'username' => env('LDAP_USERNAME'),
                'password' => env('LDAP_PASSWORD'),
                'port' => env('LDAP_PORT'),
                'use_ssl' => env('LDAP_USE_SSL'),
                'use_tls' => env('LDAP_USE_TLS'),
                'base_dn' => env('LDAP_BASE_DN'),
                'timeout' => env('LDAP_TIMEOUT'),
            ]);

            // Attempt to connect and bind
            $ldap->connect();
            
            return response()->json(['status' => 'success', 'message' => 'LDAP connection established successfully.']);
        } catch (Exception $e) {
            Log::error('LDAP connection failed: ' . $e->getMessage());
            return response()->json(['status' => 'error', 'message' => 'Failed to connect to LDAP: ' . $e->getMessage()]);
        }
    }

}
