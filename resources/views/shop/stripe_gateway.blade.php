@extends('layouts.app')

@section('content')
    
    <script src="https://js.stripe.com/v3/"></script>
    @push('styles')
        <link href="{{ asset('css/stripe.css') }}" rel="stylesheet" />
    @endpush

    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Checkout') }}
            </h2>
        </div>
    </header>

    <div class="stripe-container">
      @csrf
      <form id="payment-form">
      <div id="payment-element">
      </div>
      <button id="submit" style="background-color: #30313d; color: white; height: 40px;">
      <div class="spinner hidden" id="spinner"></div>
      <span id="button-text">PAY ${{ $pay_amount }}</span>
      </button>
      <div id="payment-message" class="hidden"></div>
      </form>
    </div>


@endsection

@section('scripts')
    
  <script type="text/javascript">
    const stripe = Stripe('{{ config('stripe.pk') }}'); 

    const items = [{ id: "xl-tshirt" }];

    let elements;

    const appearance = {
      theme: 'night',
      labels: 'floating'
    };

    initialize();
    checkStatus();

    document
        .querySelector("#payment-form")
        .addEventListener("submit", handleSubmit);

    async function initialize() {
        const { clientSecret } = await fetch("{{ route('shop.stripe.post') }}", {
            method: "POST",
            headers: {
                "X-CSRF-TOKEN": document.querySelector('input[name="_token"]').value,
            },
            body: JSON.stringify({ items }),
        }).then((r) => r.json());

        console.log("Fetched clientSecret:", clientSecret);
        
        elements = stripe.elements({ clientSecret, appearance });

        const paymentElement = elements.create("payment");
        paymentElement.mount("#payment-element");
    }

    async function handleSubmit(e) {
        e.preventDefault();
        setLoading(true);

        const { error } = await stripe.confirmPayment({
            elements,
            confirmParams: {
                // Replace with your payment completion page
                return_url: "{{ route('dashboard') }}",
            },
        });

        if (error.type === "card_error" || error.type === "validation_error") {
            showMessage(error.message);
        } else {
            showMessage("An unexpected error occured.");
        }

        setLoading(false);
    }

    async function checkStatus() {
        const clientSecret = new URLSearchParams(window.location.search).get(
            "payment_intent_client_secret"
        );

        if (!clientSecret) {
            return;
        }

        const { paymentIntent } = await stripe.retrievePaymentIntent(clientSecret);

        switch (paymentIntent.status) {
            case "succeeded":
                showMessage("Payment succeeded!");
                break;
            case "processing":
                showMessage("Your payment is processing.");
                break;
            case "requires_payment_method":
                showMessage("Your payment was not successful, please try again.");
                break;
            default:
                showMessage("Something went wrong.");
                break;
        }
    }

    // ------- UI helpers -------

    function showMessage(messageText) {
        const messageContainer = document.querySelector("#payment-message");

        messageContainer.classList.remove("hidden");
        messageContainer.textContent = messageText;

        setTimeout(function () {
            messageContainer.classList.add("hidden");
            messageText.textContent = "";
        }, 4000);
    }

    function setLoading(isLoading) {
        if (isLoading) {
            document.querySelector("#submit").disabled = true;
            document.querySelector("#spinner").classList.remove("hidden");
            document.querySelector("#button-text").classList.add("hidden");
        } else {
            document.querySelector("#submit").disabled = false;
            document.querySelector("#spinner").classList.add("hidden");
            document.querySelector("#button-text").classList.remove("hidden");
        }
    }
  </script>

@endsection