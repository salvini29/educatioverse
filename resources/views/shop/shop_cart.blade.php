@extends('layouts.app')

@section('content')
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @push('styles')
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    @endpush

    <header class="bg-white shadow-sm">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Cart') }}
            </h2>
        </div>
    </header>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-md-12">
                                <table id="cart" class="table table-hover table-condensed">
                                    <thead>
                                        <tr>
                                            <th style="width: 10%">Type</th>
                                            <th style="width: 40%">Name</th>
                                            <th style="width: 15%">Price</th>
                                            <th style="width: 15%">Quantity</th>
                                            <th style="width: 15%" class="text-center">Subtotal</th>
                                            <th style="width: 5%"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $total = 0 @endphp
                                        @if(session('cart'))
                                            @foreach(session('cart') as $id => $details)
                                                @php $total += $details['price'] * $details['quantity'] @endphp
                                                <tr data-id="{{ $id }}">
                                                    <td data-th="Type">
                                                        <div class="d-flex align-items-center">
                                                            <i class="bi {{ $details['type'] === 'pdf' ? 'bi-file-pdf' : ($details['type'] === 'video' ? 'bi-file-play' : 'bi-people') }} fs-1"></i>
                                                        </div>
                                                    </td>
                                                    <td data-th="Name" class="align-middle">
                                                        <h4 class="mb-0">{{ $details['name'] }}</h4>
                                                    </td>
                                                    <td data-th="Price">
                                                        <div class="row align-items-center">
                                                            <div class="col-9 col-sm-12">
                                                                <div class="mt-3 text-success">${{ $details['price'] }}</div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td data-th="Quantity" class="text-center align-middle">
                                                        <x-text-input value="{{ $details['quantity'] }}" id="quantity" name="quantity" type="number" class="block w-full form-control quantity update-cart" required/>
                                                    </td>
                                                    <td data-th="Subtotal" class="text-center align-middle text-success">${{ $details['price'] * $details['quantity'] }}</td>
                                                    <td class="actions align-middle" data-th="">
                                                        <button class="btn btn-danger btn-md remove-from-cart"><i class="bi bi-trash"></i></button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="6" class="text-right"><h3><strong>Total: <span class="text-success">${{ $total }}</span></strong></h3></td>
                                        </tr>
                                        <tr>
                                            <td colspan="6" class="text-right">
                                                <a href="{{ route('shop.index') }}" class="btn btn-outline-dark"><i class="bi bi-caret-left"></i> Continue Shopping</a>
                                                <a class="btn btn-dark" href="{{ route('shop.stripe.view',  ['pay_amount' => $total]) }}"><i class="bi bi-credit-card me-2"></i>Checkout</a>
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
            </div>

        </div>
    </div>

@endsection

@section('scripts')
    
    <script type="text/javascript">
        $(document).ready(function() {
            $(".update-cart").change(function (e) {
                e.preventDefault();
                var ele = $(this);

                $.ajax({
                    url: '{{ route('shop.update.cart') }}',
                    method: "patch",
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: ele.parents("tr").attr("data-id"),
                        quantity: ele.parents("tr").find(".quantity").val()
                    },
                    success: function (response) {
                       window.location.reload();
                    }
                });
        });

        $(".remove-from-cart").click(function (e) {
                e.preventDefault();
                var ele = $(this);
                console.log("Delete button clicked!");
                Swal.fire('Any fool can use a computer');
                Swal.fire({
                  title: 'Are you sure?',
                  text: "You won't be able to revert this!",
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#212529',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                  if (result.isConfirmed) {
                    $.ajax({
                        url: '{{ route('shop.remove.from.cart') }}',
                        method: "DELETE",
                        data: {
                            _token: '{{ csrf_token() }}',
                            id: ele.parents("tr").attr("data-id")
                        },
                        success: function (response) {
                            window.location.reload();
                        }
                    });
                  }
                })
            });
        });
    </script>

    <style>
        /* Custom styles for the cart view */
        .table {
            background-color: #f8f9fa; /* Light grey */
        }

        .quantity input {
            width: 60px;
            height: 30px;
            text-align: center;
        }
    </style>

@endsection