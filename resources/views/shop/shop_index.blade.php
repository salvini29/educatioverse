@extends('layouts.app')

@section('content')

        @push('styles')
            <link href="{{ asset('css/shop.css') }}" rel="stylesheet">
        @endpush
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 flex justify-between items-center">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Shop') }}
                </h2>

                <div class="dropdown">
                    <a class="btn btn-outline-dark" type="button" data-toggle="dropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi-cart-fill me-1"></i>Cart
                        <span class="badge bg-dark text-white ms-1 rounded-pill">{{ count((array) session('cart')) }}</span>
                    </a>

                    <div class="dropdown-menu" style="min-width: 280px;">
                        <div class="p-3 border-bottom">
                            <div class="d-flex justify-content-between align-items-center text-dark" style="--bs-btn-font-weight: 600; letter-spacing: 0.05em;">
                                @php $total = 0 @endphp
                                @foreach((array) session('cart') as $id => $details)
                                    @php $total += $details['price'] * $details['quantity'] @endphp
                                @endforeach
                                <div>
                                    <p class="m-0">Total: <span class="text-success">$ {{ $total }}</span></p>
                                </div>
                            </div>
                        </div>
                        @if(session('cart'))
                            @foreach(session('cart') as $id => $details)
                                <div class="d-flex align-items-center p-3 border-bottom text-dark" style="--bs-btn-font-weight: 600; letter-spacing: 0.05em;">
                                    <div class="flex-shrink-0 me-2">
                                        <!-- Replace 'far' with 'fas' or 'fal' depending on the font-awesome version you're using -->
                                        <i class="bi bi-file-pdf fs-1"></i>
                                    </div>
                                    <div class="flex-grow-1">
                                        <p class="m-0">{{ $details['name'] }}</p>
                                        <span class="text-success"> ${{ $details['price'] }}</span> <span class="ms-2"> Quantity: {{ $details['quantity'] }}</span>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                        <div class="text-center p-3" style="--bs-btn-font-weight: 600; letter-spacing: 0.05em;">
                            <a href="{{ route('shop.cart') }}" class="btn btn-outline-dark">View Cart</a>
                        </div>
                    </div>



                </div>

            </div>
        </header>

        <div class="bg-dark py-5 mt-1">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder">Shop for Brain</h1>
                    <p class="lead fw-normal text-white-50 mb-0">Enhance your skills and knowledge!</p>
                </div>
            </div>
        </div>
        <!-- Section-->
        <section class="py-5">
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                    @foreach ($courses as $course)
                        <div class="col mb-5">
                            <div class="card h-100">
                                <!-- Product image-->
                                <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." />
                                <!-- Product details-->
                                <div class="card-body p-4">
                                    <div class="text-center">
                                        <!-- Product name-->
                                        <h5 class="fw-bolder">{{$course->name}}</h5>
                                        <!-- Product price-->
                                        Price: <span class="text-success">${{$course->price}}</span>
                                    </div>
                                </div>
                                <!-- Product actions-->
                                <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                    <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="{{ route('shop.add.to.cart', $course->id) }}">Add to cart</a></div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

@endsection
