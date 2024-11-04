<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User; // Make sure to include the User model
use App\Models\Product;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        // Get the authenticated user
        $user = Auth::user();

        // Fetch users for admin if the user is an admin
        $users = $this->getUsersForAdmin($user);
        $products = $this->getProductsForAdmin($user); // Fetch products
        $products = $this->getProductsForUser($user);
       

        // Prevent caching
        $response = response()->view($this->getViewForUser($user), compact('users','products'));

        $response->headers->add([
            'Cache-Control' => 'no-store, no-cache, must-revalidate, max-age=0',
            'Pragma' => 'no-cache',
            'Expires' => 'Fri, 01 Jan 1990 00:00:00 GMT'
        ]);

        return $response;
    }

    protected function getViewForUser($user)
    {
        if ($user->usertype === 0) {
            return 'dashboard'; // User dashboard view
        } elseif ($user->usertype === 1) {
            return 'admindashboard'; // Admin dashboard view
        }

        // Optionally handle unauthorized access
        abort(403, 'Unauthorized access.');
    }

    protected function getUsersForAdmin($user)
    {
        // Return users only if the authenticated user is an admin
        if ($user->usertype === 1) {
            return User::all(); // Fetch all users for admin
        }

        return []; // Return empty array for regular users
    }

    public function destroy($id)
    {
        // Check if the user is admin
        if (Auth::user()->usertype === 1) {
            User::destroy($id);
            return redirect()->back()->with('success', 'User deleted successfully.');
        }

        return redirect()->back()->with('error', 'Unauthorized action.');
    }
    protected function getProductsForAdmin($user)
    {
        if ($user->usertype === 1) {
            return Product::all(); // Fetch all products for admin
        }

        return []; // Return empty array for regular users
    }
    protected function getProductsForUser($user)
    {
         {
            return Product::all(); // Fetch all products for admin
        }

         // Return empty array for regular users
    }
    
}
