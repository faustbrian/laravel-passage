<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Passage\Http\Controllers\MagicLink;

use App\Models\User;
use BaseCodeOy\Passage\Facades\Passage;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\View\View;

final class RegisterController
{
    public function create(): View
    {
        return view('passage::magic-link.register');
    }

    public function store(Request $request): View
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
        ]);

        Passage::authentication()->magicLink()->register($request->email);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        event(new Registered($user));

        return view('passage::magic-link.register-pending', [
            'email' => $request->email,
        ]);
    }
}
