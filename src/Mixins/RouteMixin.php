<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Passage\Mixins;

use BaseCodeOy\Passage\Http\Controllers\MagicLink\ActivateController;
use BaseCodeOy\Passage\Http\Controllers\MagicLink\LoginController;
use BaseCodeOy\Passage\Http\Controllers\MagicLink\LogoutController;
use BaseCodeOy\Passage\Http\Controllers\MagicLink\RegisterController;
use Illuminate\Support\Facades\Route;

final class RouteMixin
{
    public function magicLink(): \Closure
    {
        return function (): void {
            Route::middleware('guest')->group(function (): void {
                Route::get('register', [RegisterController::class, 'create'])->name('register');
                Route::post('register', [RegisterController::class, 'store']);

                Route::get('login', [LoginController::class, 'create'])->name('login');
                Route::post('login', [LoginController::class, 'store']);

                Route::get('activate', ActivateController::class)->name('activate');
            });

            Route::middleware('auth')->group(function (): void {
                Route::post('logout', LogoutController::class)->name('logout');
            });
        };
    }
}
