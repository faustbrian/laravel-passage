<p align="center">
    <a href="https://bombenprodukt.com" target="_blank">
        <img src="https://raw.githubusercontent.com/faustbrian/assets/main/logo-text.svg" width="128" alt="BombenProdukt Logo" />
    </a>
</p>


## About Laravel Passage

This project was created by, and is maintained by [Brian Faust](https://github.com/faustbrian), and is a package to integrate Passage by 1Password with Laravel. Be sure to browse through the [changelog](CHANGELOG.md), [code of conduct](.github/CODE_OF_CONDUCT.md), [contribution guidelines](.github/CONTRIBUTING.md), [license](LICENSE), and [security policy](.github/SECURITY.md).

## Installation

> **Note**
> This package requires [PHP](https://www.php.net/) 8.2 or later, and it supports [Laravel](https://laravel.com/) 10 or later.

To get the latest version, simply require the project using [Composer](https://getcomposer.org/):

```bash
$ composer require bombenprodukt/laravel-passage
```

You can publish the migrations by using:

```bash
$ php artisan vendor:publish --tag="laravel-passage-migrations"
```

You can publish the configuration file by using:

```bash
$ php artisan vendor:publish --tag="laravel-passage-config"
```

## Usage

Please review the contents of [our test suite](/tests) for detailed usage examples.

## Examples

### Authentication with Magic Link

```php
<?php

declare(strict_types=1);

use App\Models\User;
use BombenProdukt\Passage\Facades\Passage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::post('/passage/login', function (Request $request): void {
    Passage::authentication()->magicLink()->login($request->get('email'));

    $request->session()->flash('status', 'We have e-mailed your magic link!');

    return redirect()->back();
});

Route::post('/passage/register', function (Request $request): void {
    Passage::authentication()->magicLink()->register($request->get('email'));

    User::create(['email' => $request->get('email')]);

    $request->session()->flash('status', 'We have e-mailed your magic link!');

    return redirect()->back();
});

Route::get('/passage/{YOUR_APP_ID}', function (Request $request) {
    $response = Passage::authentication()->magicLink()->activate($request->query('psg_magic_link'));
    $currentUser = Passage::authentication()->authenticatedUsers($response['auth_token'])->currentUser();

    Auth::login(User::where('email', $currentUser['email'])->firstOrFail());

    $request->session()->flash('status', 'You have been logged in!');

    return redirect($response['redirect_url']);
});

Route::get('/passage/{YOUR_APP_ID}/dashboard', function (Request $request): void {
    return view('dashboard');
});
```
