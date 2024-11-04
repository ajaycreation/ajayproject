<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    public function destroy(Request $request)
    {
        Auth::logout();
        
        // Invalidate the session
        $request->session()->invalidate();
        
        // Regenerate the session token
        $request->session()->regenerateToken();

        // Redirect to the login page
        return redirect('/login')->with('message', 'You have been logged out successfully.');
    }
}

