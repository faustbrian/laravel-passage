<?php

declare(strict_types=1);

namespace BombenProdukt\Passage\Http\Controllers\MagicLink;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use BombenProdukt\Passage\Facades\Passage;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

final class RegisterController
{
    public function create(): View
    {
        return view('passage::magic-link.register');
    }

    public function store(Request $request): RedirectResponse
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

        return redirect(RouteServiceProvider::HOME);
    }
}
