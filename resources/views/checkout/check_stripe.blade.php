@extends('frontend.app')
@section('title','paiement')

@section('extra-meta')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('extra-script')
<script src="https://js.stripe.com/v3/"></script>
@endsection

@section('content')
<section class="section-content bg padding-y" style="min-height:84vh">
    <div class="container" style=" margin-top:100px;max-width: 1000px;">
    <div class="col-md-12">
        <h1>PAGE DE PAIEMENT</h1>
        <div class="row">
            <div class="col-md-6">
                montant : {{Cart::total()}}
                <form action="{{route('paiement.store')}}" method="POST" id="payment-form" class="ny-4" >
                    @csrf
                    <div id="card-element">
                      <!-- Elements will create input elements here -->
                    </div>
                  
                    <!-- We'll put the error messages in this element -->
                    <div id="card-errors" role="alert"></div>
                  
                    <button class="btn btn-success nl-4" id="submit">Proceder au paiement</button>
                  </form>
            </div>
        </div>
    </div>
    </div>
</section>
@endsection

@section('extra-js')
    <script>
        var stripe = Stripe('pk_test_51GvMrEIC4FQuwivkob7owwAwRqpy5s2PAOJQYMF26g20GTTKGIX8fQa1nvR4AOSBWX6J5NiuLXc3lNeZhUqJBBJK00KS7UeuSz');
        var elements = stripe.elements();
        var style = {
            base: {
            color: "#32325d",
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
  const displayError = document.getElementById('card-errors');
  if (error) {
    displayError.classList.add("alert","alert-warning");
    displayError.textContent = error.message;
  } else {
    displayError.classList.remove("alert","alert-warning")
    displayError.textContent = '';
  }
});
var form = document.getElementById('payment-form');
var submitButton=document.getElementById('submit');
form.addEventListener('submit', function(ev) {
  ev.preventDefault();
  submitButton.disabled=true;
  stripe.confirmCardPayment('{{$clientSecret}}', {
    payment_method: {
      card: card,
      billing_details: {
        name: 'sminth Malan'
      }
    }
  }).then(function(result) {
    if (result.error) {
        submitButton.disabled=false;
      // Show error to your customer (e.g., insufficient funds)
      console.log(result.error.message);
    } else {
      // The payment has been processed!
      if (result.paymentIntent.status === 'succeeded') {
        var paymentIntent=result.paymentIntent;
        var token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        var url=form.action;
        var redirect ="/paiement/merci";
        //console.log(result.paymentIntent);
        fetch(
                        url,
                        {
                            headers: {
                                "Content-Type": "application/json",
                                "Accept": "application/json, text-plain, */*",
                                "X-Requested-With": "XMLHttpRequest",
                                "X-CSRF-TOKEN": token
                            },
                            method: 'post',
                            body: JSON.stringify({
                                paymentIntent: paymentIntent
                            })
                        }).then((data) => {
                            console.log(data);
                            form.reset();
                            window.location.href = redirect;
                    }).catch((error) => {
                        console.log(error)
                    })
      }
    }
  });
});
    </script>
@endsection