@extends('front.layout.master')
@section('content')
    @include('front.components.breadcrumb', ['page_title' => __('words.cart')])

    <!-- START HEADING SECTION -->
    <div class="about_content padding-top padding-bottom">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-10 text-center text-lg-left wow slideInUp" data-wow-duration="2s">
                    <h1 class="heading">{{__('words.title_checkout')}}</h1>
                    {{-- <p class="para_text">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. A
                        dolores explicabo laudantium, omnis provident consectetur
                        adipisicing elit quam reiciendis voluptatum?
                    </p> --}}
                </div>
            </div>
        </div>

        <!-- START SHOP CART SECTION -->
        <div class="shop-cart wow slideInUp" data-wow-duration="2s">
            <div class="container">
                <!-- START SHOP CART TABLE -->
                <div class="row pt-5">
                    <div class="col-12 col-md-12 cart_table wow fadeInUp animated" data-wow-delay="300ms" style="
                                            visibility: visible;
                                            animation-delay: 300ms;
                                            animation-name: fadeInUp;
                                        ">
                        <div class="table-responsive">
                            <table class="table table-bordered border-radius" id="cart-table" >
                                <thead>
                                    <tr>
                                        <th class="darkcolor">{{__('words.products')}}</th>
                                        <th class="darkcolor">{{__('words.name')}}</th>
                                        <th class="darkcolor">{{__('words.price')}}</th>
                                        <th class="darkcolor">{{__('words.quantity')}}</th>
                                        <th class="darkcolor">{{__('words.sub_total')}}</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                   @foreach($cart as $id => $item)
<tr id="row-{{ $id }}">
    <td>
        <div class="d-table product-detail-cart">
            <div class="media">
                <div class="row no-gutters">
                    <div class="col-12 col-lg-2 product-detail-cart-image">
                        <a class="shopping-product" href="javascript:void(0)">
                            @if($item['image'])
                                <img src="{{ $item['image'] }}" alt="image" />
                            @endif
                        </a>
                    </div>

                    {{-- <div class="col-12 col-lg-10 mt-auto mb-auto product-detail-cart-data">
                        <div class="media-body ml-lg-3">
                            <h4 class="product-name">
                                {{ $item['title'] }}
                            </h4>
                            <p class="product-des">
                                الكمية: {{ $item['quantity'] }}
                            </p>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </td>
    <td>
        <h4 class="text-center amount">{{ $item['title'] }}</h4>
    </td>
    <td>
        <h4 class="text-center amount">${{ number_format($item['price'], 2) }}</h4>
    </td>
    <td class="text-center">
        <div class="quote text-center mt-1">
        <input
            type="number"
            name="quantity[{{ $id }}]"
            value="{{ $item['quantity'] }}"
            class="cart-quantity form-control"
            min="1">
    </td>
        </div>
    </td>

          <td id="total-{{ $id }}">${{ number_format($item['price'] * $item['quantity'], 2) }}</td>


    <td class="text-center">
          <a href="javascript:void(0)" onclick="removeFromCart( $id )" class="btn btn-danger btn-sm">
            <i class="las la-trash"></i>
        </a>
    </td>
</tr>
@endforeach


                                </tbody>
                            </table>
                        </div>
                        <div class="apply_coupon">
                            <div class="row">
                                <div class="col-12 text-left">
                                         <a href="javascript:void(0)" onclick="updateCart()" class="btn web-btn rounded-pill">{{__('words.update')}} </a>
                                    <a href="{{route('checkout.index')}}" class="btn web-btn rounded-pill" id="checkout-btn">{{__('words.checkout')}}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END SHOP CART TABLE -->


            </div>
        </div>
        <!-- END SHOP CART SECTION-->
    </div>
    <!-- END HEADING SECTION -->


    <!--newsletter sec end-->
    {{-- subscribe --}}
    @include('front.components.subscribe')
    {{-- subscribe --}}
@endsection

@push('scripts')
<script>
async function updateCart(event) {
    if (event) event.preventDefault();

    let items = {};
    document.querySelectorAll('.cart-quantity').forEach(input => {
        let id = input.name.match(/\d+/)[0];
        items[id] = input.value;
    });

    const response = await fetch("{{ route('cart.updateAll') }}", {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Content-Type': 'application/json',
            'Accept': 'application/json'
        },
        body: JSON.stringify({ items: items })
    });

    const data = await response.json();

    if (response.ok) {
        toastr.success(data.message);
        renderCart(data.cart); // 👈 نحدث الجدول
    } else {
        toastr.error(" حصل خطأ أثناء التحديث");
    }
}


function renderCart(cart, total) {
    let tbody = document.querySelector("#cart-table tbody");
    tbody.innerHTML = "";

    Object.values(cart).forEach(item => {
        tbody.innerHTML += `
            <tr id="row-${item.id}">
                <td><img src="${item.image}" width="50"></td>
                <td>${item.title}</td>
                <td>
                    <input type="number" class="cart-quantity"
                           name="quantity[${item.id}]"
                           value="${item.quantity}" min="1">
                </td>
                <td>${item.price}</td>
                <td>${item.price * item.quantity}</td>
                <td>
                    <a href="javascript:void(0)" onclick="removeFromCart(${item.id})"class="btn btn-danger btn-sm">
                        <i class="las la-trash"></i>
                    </a>
                </td>
            </tr>
        `;
    });

    // document.querySelector("#cart-total").textContent = total + " جنيه";
}

</script>
<script>
async function removeFromCart(id) {


    const response = await fetch("{{ url('cart/remove') }}/" + id, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Accept': 'application/json'
        }
    });

    const data = await response.json();
    if (response.ok) {

                    document.querySelectorAll('.cart-count').forEach(el => {
                        el.innerText = data.cart_count;
                    });
        toastr.success(data.message);
        document.getElementById('row-' + id).remove();

    }
}

</script>

{{-- <script>
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
        if (data.total !== undefined) {
            document.getElementById("subtotal").innerText = "$" + data.subtotal;
            document.getElementById("total").innerText = "$" + data.total;

            // خلي ال shipping يبقى النص حسب الاختيار
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

// لما تضغط على CHECKOUT
document.getElementById("checkout-btn").addEventListener("click", updateCheckout);

// لما تغيّر نوع الشحن (flat / free / cod) يتحدث تلقائي
document.querySelectorAll("input[name='shipping']").forEach(el => {
    el.addEventListener("change", updateCheckout);
});
</script> --}}



@endpush
