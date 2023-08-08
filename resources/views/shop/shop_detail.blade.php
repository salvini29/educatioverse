@extends('layouts.app')

@section('content')

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>

        @push('styles')
            <link href="{{ asset('css/shop.css') }}" rel="stylesheet">
        @endpush

        <header class="bg-white shadow-sm">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 flex justify-between items-center">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Detail') }}
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
                                        <i class="bi {{ $details['type'] === 'pdf' ? 'bi-file-pdf' : ($details['type'] === 'video' ? 'bi-file-play' : 'bi-people') }} fs-1"></i>
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
        <!-- Product section-->
        <section class="py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="row gx-4 gx-lg-5 align-items-center">
                    <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src="{{ asset('img/details/'.$course->img_path)}}" alt="..." /></div>
                    <div class="col-md-6">
                        <div class="small mb-1">SUBJECT: {{ $course->topic }}</div>
                        <h1 class="display-5 fw-bolder">{{ $course->name }}</h1>
                        <div class="fs-5 mb-5">
                            <span class="text-decoration-line-through">${{ ($course->price)*(1+0.15) }}</span>
                            <span>${{ $course->price }}</span>
                        </div>
                        <p class="lead">{{ $course->description }}</p>
                        <div class="d-flex mt-4">
                            <x-text-input value="{{ $course->id }}" id="courseId" name="courseId" type="hidden"/>
                            <x-text-input value="1" id="quantity" name="quantity" type="number" class="block form-control quantity update-cart me-3" required style="max-width: 4rem"/>
                            <button id="addMultipleToCartBtn" class="btn btn-outline-dark flex-shrink-0" type="button">
                                <i class="bi-cart-fill me-1"></i>
                                Add to cart
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Related items section-->
        <section class="py-5 bg-light">
            <div class="container px-4 px-lg-5 mt-5">
                <h2 class="fw-bolder mb-4">Related courses</h2>
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">     
                @if (count($relatedCourses) > 0)    
                    @foreach ($relatedCourses as $relatedCourse)
                        <div class="col mb-5">
                            <div class="card h-100">
                                <!-- Product image-->
                                <div class="badge text-white position-absolute" style="top: 0.5rem; right: 0.5rem; background-color: var(--bs-dark);" onmouseover="this.style.backgroundColor='#424649';" onmouseout="this.style.backgroundColor='var(--bs-dark)';"><a class="icon-link link-light" href="{{ route('shop.detail', $relatedCourse->id) }}">
                                  <i class="bi bi-info-circle fs-6"></i>
                                </a></div>
                                <img class="card-img-top" src="{{ asset('img/shop/'.$course->img_path)}}" alt="..." />
                                <!-- Product details-->
                                <div class="card-body p-4">
                                    <div class="text-center">
                                        <!-- Product name-->
                                        <h5 class="fw-bolder">{{$relatedCourse->name}}</h5>
                                        <!-- Product price-->
                                        <span class="text-muted text-decoration-line-through">${{ ($relatedCourse->price)*(1+0.15) }}</span>
                                        Price: <span class="text-success">${{$relatedCourse->price}}</span>
                                    </div>
                                </div>
                                <!-- Product actions-->
                                <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                    <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="{{ route('shop.add.to.cart', $relatedCourse->id) }}"><i class="bi-cart-fill me-1"></i>Add to cart</a></div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                        <div class="mt-5">
                            <div class="row justify-content-center">
                                <div class="col-md-6 text-center">
                                    <p class="text-muted fs-5 text-nowrap">No related courses</p>
                                </div>
                            </div>
                        </div>
                @endif
                </div>
            </div>
        </section>

@endsection

@section('scripts')
    
    <script>
    $(document).ready(function() {

        let quantityInput = $('#quantity');
        let idInput = $('#courseId');
        let addMultipleToCartBtn = $('#addMultipleToCartBtn');

        addMultipleToCartBtn.on('click', function(event) {
            event.preventDefault();

            let quantityValue = quantityInput.val();
            let idValue = idInput.val();

            let url = "{{ route('shop.add.multiple.to.cart', ['quantity' => ':quantity', 'id' => ':id']) }}";
            url = url.replace(':quantity', quantityValue);
            url = url.replace(':id', idValue);
            
            window.location.href = url;
        });
    });
    </script>

@endsection