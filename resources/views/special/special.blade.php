@extends('layouts.app')

@section('content') 

    @push('styles')
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    @endpush

    <header class="bg-white shadow-sm">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Special') }}
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
                                {{ __('Payment') }}
                            </h2>

                            <p class="mt-1 text-sm text-gray-600">
                                {{ __("Create a special payment") }}
                            </p>
                        </header>

                        <form method="post" action="" class="mt-6 space-y-6">
                            @csrf
                            <div>
                                <x-input-label for="order" :value="__('Order')" class="mb-1" />
                                <x-text-input id="reason" name="reason" type="text" class="mt-1 block w-full" required autofocus autocomplete="reason" />
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
                        </form>
                    </section>


                </div>
            </div>
        </div>
    </div>

@endsection


