<?php

namespace Vatger\Auth\Provider;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

interface IAuthProvider
{
    public function handleLogin(): RedirectResponse;
    public function handleCallback(Request $request): RedirectResponse;
}
