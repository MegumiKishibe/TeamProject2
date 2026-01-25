<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    public function create(): View
    {
        return view('auth.top');
    }

    public function store(LoginRequest $request): RedirectResponse
    {

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials, true)) {
            $request->session()->regenerate();

            return redirect()->route('author.search')->with('status', 'ログインしました');
        }

        // 失敗した時用
        return back()->withErrors(['email' => '認証に失敗しました']);
    }

    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('login')->with('status', 'ログアウトしました');
    }
}
