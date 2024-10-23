<?php


namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Validation\ValidationException;


class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }


    /**
     * Handle an incoming authentication request.
     */
    public function store(Request $request)
    {


        if (Auth::attempt($request->only('email', 'password'), $request->filled('remember'))) {
            $request->session()->regenerate();


            // Redirect user based on their role
            if (Auth::user()->role === 'siswa') {
                return redirect()->route('siswa.index');
            } elseif (Auth::user()->role === 'guru') {
                return redirect()->route('guru.index');
            }


            // Default redirect if role is not found
            return redirect()->intended('dashboard');
        }


        throw ValidationException::withMessages([
            'email' => [trans('auth.failed')],
        ]);
    }
    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();


        $request->session()->invalidate();


        $request->session()->regenerateToken();


        return redirect('/');
    }
}
