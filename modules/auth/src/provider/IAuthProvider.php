<?php

namespace Vatger\Auth\Provider;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

interface IAuthProvider
{
    public function login(): RedirectResponse;
    public function callback(Request $request): RedirectResponse;
}
