<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;


class MainController extends Controller
{
    public function viewLanding(Request $request): View
    {
        return view('landing.landing');
    }
}
