@extends('layouts.app')

@section('content')

    @push('styles')
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    @endpush

    <header class="bg-white shadow-sm">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Dashboard') }}
            </h2>
        </div>
    </header>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="p-4 sm:p-8 bg-white shadow-sm sm:rounded-lg">
                <div>
                    <header>
                        <h2 class="text-lg font-medium text-gray-900">
                            {{ __('Your Courses') }}
                        </h2>
                        <p class="mt-1 text-sm text-gray-600">
                            {{ __("Discover your purchased courses, tailored to enrich your learning journey.") }}
                        </p>
                    </header>

                    <!-- Replace the following with a loop to display your purchased courses -->
                    <div class="flex flex-wrap justify-start gap-4 mt-4">
                        <!-- Course Card 1 -->
                        <div class="bg-white rounded-lg shadow overflow-hidden" style="width: 18.3%;">
                            <img src="https://via.placeholder.com/150" alt="Course Image" class="w-full h-32 object-cover">
                            <div class="p-4">
                                <h3 class="text-lg font-semibold text-gray-900">Course Title 1</h3>
                                <p class="mt-1 text-sm text-gray-600">Course Description goes here.</p>
                                <a href="#" class="mt-2 text-sm font-medium text-indigo-600 hover:text-indigo-500">View Course</a>
                            </div>
                        </div>

                        <!-- Course Card 2 -->
                        <div class="bg-white rounded-lg shadow overflow-hidden" style="width: 18.3%;">
                            <img src="https://via.placeholder.com/150" alt="Course Image" class="w-full h-32 object-cover">
                            <div class="p-4">
                                <h3 class="text-lg font-semibold text-gray-900">Course Title 2</h3>
                                <p class="mt-1 text-sm text-gray-600">Course Description goes here.</p>
                                <a href="#" class="mt-2 text-sm font-medium text-indigo-600 hover:text-indigo-500">View Course</a>
                            </div>
                        </div>
                        <!-- Course Card 2 -->
                        <div class="bg-white rounded-lg shadow overflow-hidden" style="width: 18.3%;">
                            <img src="https://via.placeholder.com/150" alt="Course Image" class="w-full h-32 object-cover">
                            <div class="p-4">
                                <h3 class="text-lg font-semibold text-gray-900">Course Title 2</h3>
                                <p class="mt-1 text-sm text-gray-600">Course Description goes here.</p>
                                <a href="#" class="mt-2 text-sm font-medium text-indigo-600 hover:text-indigo-500">View Course</a>
                            </div>
                        </div>
                                                <!-- Course Card 2 -->
                        <div class="bg-white rounded-lg shadow overflow-hidden" style="width: 18.3%;">
                            <img src="https://via.placeholder.com/150" alt="Course Image" class="w-full h-32 object-cover">
                            <div class="p-4">
                                <h3 class="text-lg font-semibold text-gray-900">Course Title 2</h3>
                                <p class="mt-1 text-sm text-gray-600">Course Description goes here.</p>
                                <a href="#" class="mt-2 text-sm font-medium text-indigo-600 hover:text-indigo-500">View Course</a>
                            </div>
                        </div>
                                                <!-- Course Card 2 -->
                        <div class="bg-white rounded-lg shadow overflow-hidden" style="width: 18.3%;">
                            <img src="https://via.placeholder.com/150" alt="Course Image" class="w-full h-32 object-cover">
                            <div class="p-4">
                                <h3 class="text-lg font-semibold text-gray-900">Course Title 2</h3>
                                <p class="mt-1 text-sm text-gray-600">Course Description goes here.</p>
                                <a href="#" class="mt-2 text-sm font-medium text-indigo-600 hover:text-indigo-500">View Course</a>
                            </div>
                        </div>

                        <!-- Add more course cards as needed -->
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
