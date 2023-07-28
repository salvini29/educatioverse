@extends('layouts.app')

@section('content')

    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Dashboard') }}
            </h2>
        </div>
    </header>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <header>
                        <h2 class="text-lg font-medium text-gray-900">
                            {{ __('Your Courses') }}
                        </h2>
                        <p class="mt-1 text-sm text-gray-600">
                            {{ __("Discover your purchased courses, tailored to enrich your learning journey.") }}
                        </p>
                    </header>

                    
                    
                </div>
            </div>

        </div>
    </div>

@endsection
