<?php

namespace Vatger\Auth\Controllers;

use BookStack\Http\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use JetBrains\PhpStorm\NoReturn;
use Vatger\Auth\Provider\IAuthProvider;
use Vatger\Auth\Provider\VatsimAuthProvider;

class AuthController extends Controller
{
    private IAuthProvider $provider;

    public function __construct()
    {
        $this->provider = new VatsimAuthProvider();
    }

    #[NoReturn]
    public function login(): RedirectResponse
    {
        return $this->provider->login();
    }

    #[NoReturn]
    public function callback(Request $request): RedirectResponse
    {
        return $this->provider->callback($request);
    }
}
