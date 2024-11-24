<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Passage\Http\Controllers\MagicLink;

use BaseCodeOy\Passage\Facades\Passage;
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
