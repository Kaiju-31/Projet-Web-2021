@extends('layouts.template')

@section('title')
        Checkout
@endsection

@section('extra-script')
    <script src="https://js.stripe.com/v3/"></script>
@endsection

@section('content')
    <div class="card w-half" style="margin-top: 2%; margin-left: 25%">
        <div class="card-header"><h1>Payment</h1></div>
        <div class="card-body">
            <form class="" style="margin-top: 2%" id="payment-form" action="" method="POST">
                <div id="card-element">
                    <!-- Elements will create input elements here -->
                </div>

                <!-- We'll put the error messages in this element -->
                <div id="card-errors" role="alert"></div>

                <button id="submit" class="btn btn-success">Pay</button>
            </form>
        </div>
    </div>
@endsection

@section('extra-js')
<script>
    var stripe = Stripe('pk_test_51IDLtMCK5z95ADJxiMxd6rKxJsEDqKvYTX3xNJCCn99aWXnSHiavqfWF2OKKXAnRbEN0B1YcDhWPZMt4RokXzoD200iXMmFHlP');
    var elements = stripe.elements();
    var style = {
        base: {
            color: "#aab7c4",
            fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
            fontSmoothing: "antialiased",
            fontSize: "16px",
            "::placeholder": {
                color: "#aab7c4"
            }
        },
        invalid: {
            color: "#fa755a",
            iconColor: "#fa755a"
        }
    };

    var card = elements.create("card", { style: style });
    card.mount("#card-element");

    card.on('change', ({error}) => {
        let displayError = document.getElementById('card-errors');
        if (error) {
            displayError.classList.add('alert', 'alert-danger');
            displayError.textContent = error.message;
        } else {
            displayError.classList.remove('alert', 'alert-danger');
            displayError.textContent = '';
        }
    });

    const form = document.getElementById('payment-form');

    form.addEventListener('submit', function(ev) {
        ev.preventDefault();
        stripe.confirmCardPayment("{{ $clientSecret }}", {
            payment_method: {
                card: card
            }
        }).then(function(result) {
            if (result.error) {
                // Show error to your customer (e.g., insufficient funds)
                console.log(result.error.message);
            } else {
                // The payment has been processed!
                if (result.paymentIntent.status === 'succeeded') {
                    // Show a success message to your customer
                    // There's a risk of the customer closing the window before callback
                    // execution. Set up a webhook or plugin to listen for the
                    // payment_intent.succeeded event that handles any business critical
                    // post-payment actions.
                    console.log(result.paymentIntent);
                }
            }
        });
    });

</script>
@endsection
