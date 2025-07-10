<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        if (Auth::user()->hasRole('admin')) {
            return redirect()->intended(route('admin.dashboard', absolute: false));
        } else if (Auth::user()->hasRole('kades')) {
            return redirect()->intended(route('kades.dashboard', absolute: false));
        } else if (Auth::user()->hasRole('staff')) {
            return redirect()->intended(route('staff.dashboard', absolute: false));
        } else if (Auth::user()->hasRole('desa')) {
            return redirect()->intended(route('desa.dashboard', absolute: false));
        } else {
            return redirect()->intended(route('dashboard', absolute: false));
        }
    }
}
