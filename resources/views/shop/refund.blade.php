@extends('layouts.app')

@section('content') 

    @push('styles')
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    @endpush

    <header class="bg-white shadow-sm">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Refund') }}
            </h2>
        </div>
    </header>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow-sm sm:rounded-lg">
                <div class="max-w-xl">
                    
                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900">
                                {{ __('Ask for a Refund') }}
                            </h2>

                            <p class="mt-1 text-sm text-gray-600">
                                {{ __("Want a Refund? Reach out and ask. We're here to help.") }}
                            </p>
                        </header>

                        <form method="post" action="{{ route('shop.refund.post') }}" class="mt-6 space-y-6">
                            @csrf
                            @if (count($orders) > 0) 
                                <div>
                                    <x-input-label for="order" :value="__('Order')" class="mb-1" />
                                    <select class="form-select" id="order" name="order" class="block w-full" required autofocus style="border-radius: .375rem;">
                                        @foreach ($orders as $order)
                                        <option value="{{$order->id}}">{{$order->name}}</option>
                                        @endforeach
                                    </select>
                                    <x-input-error class="mt-2" :messages="$errors->get('order')" />
                                </div>

                                <div>
                                    <x-input-label for="reason" :value="__('Reason')" />
                                    <x-text-input id="reason" name="reason" type="text" class="mt-1 block w-full" required autofocus autocomplete="reason" />
                                    <x-input-error class="mt-2" :messages="$errors->get('reason')" />
                                </div>

                                <div class="flex items-center gap-4">
                                    <x-primary-button>{{ __('Refund') }}</x-primary-button>
                                </div>
                            @else
                                <div>
                                    <x-input-label for="order" :value="__('Order')" class="mb-1" />
                                    <select class="form-select" id="order" name="order" class="block w-full" required autofocus disabled style="border-radius: .375rem;">
                                        <option value="false">You don't have Orders!</option>
                                    </select>
                                    <x-input-error class="mt-2" :messages="$errors->get('order')" />
                                </div>

                                <div>
                                    <x-input-label for="reason" :value="__('Reason')" />
                                    <x-text-input id="reason" name="reason" type="text" class="mt-1 block w-full" required autofocus autocomplete="reason" disabled style="background-color: #e9ecef; color: #666;"/>
                                    <x-input-error class="mt-2" :messages="$errors->get('reason')" />
                                </div>

                                <div class="flex items-center gap-4">
                                    <x-primary-button disabled>{{ __('Refund') }}</x-primary-button>
                                </div>
                            @endif

                        </form>
                    </section>


                </div>
                <p class="mt-4 text-sm text-gray-600 text-muted">
                            Disclaimer: Refund Policy<br>
                            Thank you for choosing our services. We understand that situations may arise where you need to request a refund for a transaction made through our platform. This disclaimer outlines our refund policy to ensure clarity and transparency in the refund process.<br>
                            1. Eligibility for Refunds:<br>
                               - Refunds are considered for valid and eligible transactions only.<br>
                               - Refunds are generally processed in accordance with our Terms of Service.<br>
                            2. Refund Process:<br>
                               - Refund requests should include the Order detail and reason for the request.<br>
                               - Our team will review the request and may require additional information for verification purposes.<br>
                               - Approved refunds will be processed within 24 hours.<br>
                            3. Non-Refundable Items:<br>
                               - Certain digital goods may be non-refundable. This will be clearly communicated during the transaction process.<br>
                            4. Payment Method:<br>
                               - Refunds will be issued using the original payment method used for the transaction.<br>
                               - The refund amount may be subject to deductions such as processing fees or charges.<br>
                            5. Disputed Charges:<br>
                               - In cases of disputed charges or unauthorized transactions, we encourage you to contact us immediately. We will investigate the matter promptly.<br>
                            6. Contact Us:<br>
                               - For refund requests or any related inquiries, please contact our customer support team at educatioverse@gmail.com.<br>
                            Please note that this disclaimer is intended to provide a general overview of our refund policy. For specific details and to ensure accurate information, please refer to our complete Terms of Service and refund policy document.<br>
                            We value your trust and aim to provide a seamless and satisfactory experience. Your understanding of our refund policy is greatly appreciated.<br>
                            Thank you,<br>
                            Educatioverse
                </p>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    
    <style>
        .form-select {
            border-color: #D1D5DB;
        }
        .form-select:focus {
            border-color: #3F51B5;
            outline: 0;
            box-shadow: 0 0 0 0.25rem rgba(63, 81, 181, 0.25);
        }
    </style>

@endsection