<?php

declare(strict_types=1);

namespace BombenProdukt\Passage\Http\Controllers\MagicLink;

use BombenProdukt\Passage\Facades\Passage;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

final class LoginController
{
    public function create(): View
    {
        return view('passage::magic-link.login');
    }

    public function store(Request $request): View
    {
        $request->validate([
            'email' => ['required', 'string', 'email'],
        ]);

        Passage::authentication()->magicLink()->login($request->email);

        $request->session()->regenerate();

        return view('passage::magic-link.login-pending', [
            'email' => $request->email,
        ]);
    }
}
