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

                    <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center mt-5">
                        @if (count($courses) > 0)    
                            @foreach ($courses as $course)
                                <div class="col mb-5">
                                    <div class="card h-100">
                                        <!-- Product image-->
                                        <img class="card-img-top" src="{{$course->img_path}}"/>
                                        <div class="card-body p-4">
                                            <div class="text-center">
                                                <!-- Product name-->
                                                <h5 class="fw-bolder">{{$course->name}}</h5>
                                                <div class="small"> SUBJECT: <span class="text-dark">{{$course->topic}}</span></div>
                                            </div>
                                        </div>
                                        <!-- Product actions-->
                                        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                            <div class="text-center"><a class="btn btn-outline-dark mt-auto"><i class="bi bi-door-open me-1"></i></i>Options</a></div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="text-center mt-4 mb-4">
                                <h3 class="font-medium text-gray-900 mb-2">No purchased courses yet!</h3>
                                <p class="text-gray-600">Visit our shop and explore a wide range of courses.</p>
                                <a href="{{ route('shop.index') }}" class="btn btn-outline-dark mt-3">Explore Courses</a>
                            </div>
                        @endif
                    </div>

                </div>
            </div>

        </div>
    </div>

@endsection