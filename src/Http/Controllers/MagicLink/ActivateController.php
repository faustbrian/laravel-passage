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
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

final class ActivateController
{
    public function __invoke(Request $request): RedirectResponse
    {
        $response = Passage::authentication()->magicLink()->activate($request->query('psg_magic_link'));
        $currentUser = Passage::authentication()->authenticatedUsers($response['auth_token'])->currentUser();

        Auth::login(User::where('email', $currentUser['email'])->firstOrFail());

        $request->session()->flash('status', 'You have been logged in!');

        return redirect($response['redirect_url']);
    }
}
