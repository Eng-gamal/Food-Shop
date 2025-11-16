@extends('front.layout.master')
@section('content')
    @include('front.components.breadcrumb', ['page_title' => __('words.checkout')])
    <!-- START SHOP CART CHECKOUT FORM -->
    <div class="about_content padding-top padding-bottom">
        <div class="row pt-5 justify-content-center">
            <div class="col-12 col-md-6 cart_table wow fadeInUp animated" data-wow-delay="300ms"
                style="
                                                                                                                                                                                                                            visibility: visible;
                                                                                                                                                                                                                            animation-delay: 300ms;
                                                                                                                                                                                                                            animation-name: fadeInUp;
                                                                                                                                                                                                                        ">
                <div class="card-total p-4 shadow rounded bg-white">
                    <h4 class="heading mb-4 text-center">{{__('words.total_cart')}}</h4>
                    <table class="table table-bordered">
                        <tbody>
                            <tr class="strong">
                                <td><strong>{{__('words.sub_total')}}</strong></td>
                                <td id="subtotal" class="text-right">$0.00</td>
                            </tr>
                            <tr>
                                <td><strong>{{__('words.shipping')}}</strong></td>
                                <td>
                                    <ul class="list-unstyled m-0">
                                        <li class="mb-2">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="flat-rate" name="shipping"
                                                    class="custom-control-input" checked>
                                                <label class="custom-control-label"
                                                    for="flat-rate">{{__('words.flat_rate')}} :
                                                    $49.00</label>
                                            </div>
                                        </li>
                                        <li class="mb-2">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="free-shipping" name="shipping"
                                                    class="custom-control-input">
                                                <label class="custom-control-label"
                                                    for="free-shipping">{{__('words.free_shipping')}}</label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="cod-shipping" name="shipping"
                                                    class="custom-control-input">
                                                <label class="custom-control-label"
                                                    for="cod-shipping">{{__('words.cash_delivery')}} :
                                                    $20.00</label>
                                            </div>
                                        </li>
                                    </ul>
                                </td>
                            </tr>
                            <tr>
                                <td><strong>{{__('words.total')}}</strong></td>
                                <td id="total" class="text-right">$0.00</td>
                            </tr>
                        </tbody>
                    </table>
                    {{-- <div class="text-center mt-3">
                        <a href="{{ route('checkout.index') }}" class="btn btn-primary rounded-pill px-5"
                            id="checkout-btn">Proceed to Checkout</a>
                    </div> --}}

                    <a href="{{ route('paypal.pay') }}" id="paypal-button-container">

                    </a>

                </div>
            </div>
        </div>
    </div>

    <!-- END SHOP CART CHECKOUT FORM -->


    {{-- subscribe --}}
    @include('front.components.subscribe')
    {{-- subscribe --}}
@endsection
@push('scripts')

    <script
        src="https://www.paypal.com/sdk/js?client-id=AXp-TVISLwnwZWpDht54DVKI7wPv9HLIDBJguFLRcJ3YF3dykf1rgQIF1GO-LjmCM1sPsz-PbfQfkDLr&currency=USD"></script>
    <script>
        let totalAmount = 0;

        function updateCheckout() {
            let shippingMethod = document.querySelector('input[name="shipping"]:checked')?.id || "flat-rate";

            fetch("{{ route('checkout') }}", {
                method: "POST",
                headers: {
                    "X-CSRF-TOKEN": "{{ csrf_token() }}",
                    "Content-Type": "application/json",
                    "Accept": "application/json"
                },
                body: JSON.stringify({ shipping: shippingMethod })
            })
                .then(res => res.json())
                .then(data => {
                    if (data.total !== 0) {
                        document.getElementById("subtotal").innerText = "$" + data.subtotal;
                        document.getElementById("total").innerText = "$" + data.total;


                        totalAmount = data.total;

                        if (shippingMethod === "flat-rate") {
                            document.querySelector("label[for='flat-rate']").innerText = "Flat Rate : $" + data.shipping;
                        } else if (shippingMethod === "cod-shipping") {
                            document.querySelector("label[for='cod-shipping']").innerText = "Cash on Delivery : $" + data.shipping;
                        }
                    } else {
                        toastr.error(data.message || "خطأ في الحساب");
                    }
                })
                .catch(err => {
                    console.error(err);
                    toastr.error("مشكلة في الاتصال بالسيرفر");
                });
        }

        document.addEventListener("DOMContentLoaded", updateCheckout);

        document.querySelectorAll("input[name='shipping']").forEach(el => {
            el.addEventListener("change", updateCheckout);
        });
        //save data in databaes
        paypal.Buttons({
            createOrder: function (data, actions) {
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            currency_code: "USD",
                            value: totalAmount.toFixed(2)
                        }
                    }]
                });
            },
            onApprove: function (data, actions) {
                return actions.order.capture().then(function (details) {

                    fetch("{{ route('paypal.success') }}", {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                            "X-CSRF-TOKEN": "{{ csrf_token() }}"
                        },
                        body: JSON.stringify(details)
                    })
                        .then(response => response.json())
                        .then(data => {
                            toastr.success(" تم الدفع وحفظ البيانات");
                            console.log(data);
                        });
                });
            },
            onError: function (err) {
                toastr.error("حصل خطأ في عملية الدفع");
                console.error(err);
            }
        }).render('#paypal-button-container');
    </script>

@endpush