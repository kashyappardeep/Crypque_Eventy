<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\UserEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AdminController extends Controller
{
    public function index()
    {
        return view('AdminPenal.adminlogin');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect()->route('admin.dashboard')->with('success', 'Logged in successfully');
        }

        return back()->withErrors(['email' => 'Invalid credentials'])->withInput();
    }

    public function dashboard()
    {
        return view('AdminPenal.dashboard');
    }

    public function logout(Request $request)
    {
        Auth::logout(); // Log the user out

        // Invalidate the session and regenerate the CSRF token
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login'); // Redirect to the login page or home
    }

    public function usereventlist()
    {
        $events = UserEvent::where('type', 1)->with('user', 'EventType')->paginate(10);
        return view('AdminPenal.usereventlist', compact('events'));
    }
    public function user_event_destroy($id)
    {
        try {
            $event = UserEvent::findOrFail($id);
            $event->delete();

            // Redirect back to the 'user-events' route (which you have defined)
            return redirect()->route('user-events')->with('success', 'Event deleted successfully!');
        } catch (\Exception $e) {
            // Redirect back to the 'user-events' route in case of failure
            return redirect()->route('user-events')->with('error', 'Failed to delete event.');
        }
    }
}
