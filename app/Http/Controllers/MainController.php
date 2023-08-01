<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\User;
use App\Models\Course;


class MainController extends Controller
{
    public function viewLanding(Request $request): View
    {
        return view('landing.landing');
    }
    public function viewDashboard(Request $request): View
    {
        $courses = Auth::user()->courses()->get();
        return view('dashboard')->with('courses', $courses);
    }
}
