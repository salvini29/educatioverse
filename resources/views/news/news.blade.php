@extends('layouts.app')

@section('content') 

    @push('styles')
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    @endpush

    <header class="bg-white shadow-sm">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('News') }}
            </h2>
        </div>
    </header>

    <div class="py-12">
        @foreach($news as $new)
            <div class="max-w-7xl mb-4 mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="p-4 sm:p-8 bg-white shadow-sm sm:rounded-lg d-flex">
                    <div class="row">
                        <div class="col-12">
                            <div class="max-w-xl">
                                <div class="d-flex align-items-center">
                                    <span class="bg-dark text-white p-1 rounded d-flex align-items-center">
                                        <i class="bi bi-bell" style="font-size: 1.4rem;"></i>
                                        <h3 class="text-xl font-semibold fst-italic ml-2 mr-2">{{$new->title}}</h3>
                                        <i class="bi bi-bell" style="font-size: 1.4rem;"></i>
                                    </span>
                                </div>
                                <div class="mt-4 max-w-xl">
                                    <p class="text-gray-600 fst-italic" style="word-wrap: break-word;">{{$new->body}}</p>
                                </div>
                            </div>
                            <div class="d-flex align-items-center mt-4">
                                <i class="bi bi-calendar-date" style="font-size: 1.4rem;"></i>
                                <span class="text-dark ms-1">{{$new->date}}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

@endsection


