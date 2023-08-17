<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\User;
use App\Models\Course;
use App\Models\News;

class SpecialController extends Controller
{
    public function viewSpecialPayment(Request $request): View
    {

        $user = Auth::user();
        if ($user->email === 'admin@admin.com') {
            return view('special.special');
        }
        abort(403);
    }
}
