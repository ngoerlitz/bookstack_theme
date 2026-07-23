<?php

namespace Vatger\Auth\Controller;

use BookStack\Http\Controller;
use Illuminate\Http\RedirectResponse;
use JetBrains\PhpStorm\NoReturn;

class WelcomeController extends Controller
{
    #[NoReturn]
    public function handleWelcome(): RedirectResponse
    {
        $user = auth()->user();
        $user->read_welcome = true;
        $user->save();

        return redirect()->back()->with('success', trans('welcome.marked_as_read'));
    }
}
