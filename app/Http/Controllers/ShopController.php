<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ShopController extends Controller
{
    public function viewIndex(Request $request): View
    {
        return view('shop.shop_index');
    }
}
