<?php

namespace App\Services\Shared;

use App\Models\BUNIT;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class AuthHelperService
{
    public function getBusinessUnitAssigned(int $userId = null): array
    {
        // Determine the user ID
        $user_id = $userId ?? Auth::user()->id;
    
        // Fetch the user data with the associated business unit
        $userData = User::with('bunit')->where('id', $user_id)->first();
    
        // Check if the user and their business unit exist
        if ($userData && $userData->bunit) {
            return [
                $userData->bunit->id,
            ];
        }
    
        // Return an empty array if no business unit is found
        return [];
    }
}
