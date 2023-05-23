<?php

declare(strict_types=1);

namespace BombenProdukt\Passage\Http\Controllers\MagicLink;

use App\Providers\RouteServiceProvider;
use BombenProdukt\Passage\Facades\Passage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

final class LoginController
{
    public function create(): View
    {
        return view('passage::magic-link.login');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => ['required', 'string', 'email'],
        ]);

        Passage::authentication()->magicLink()->login($request->email);

        $request->session()->regenerate();

        return redirect(RouteServiceProvider::HOME);
    }
}
