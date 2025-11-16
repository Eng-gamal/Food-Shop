@extends('front.layout.master')
@section('content')
    @include('front.components.breadcrumb', ['page_title' => __('words.products')])

    <section class="main" id="main">
        <!--content-->
        <div class="blog-content padding-top">
            <div class="container">
                <div class="row justify-content-center"> <!-- علشان ييجي في النص -->

                    <div class="col-12 col-lg-12"> <!-- نفس العرض للـ search و المنتجات -->

                        <!-- Search Box -->
                        <div class="col-12 col-lg-8 search-bar mb-4">
                            <div class="input-group">
                                <input id="search" type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-append">
                                    <button id="searchBtn" class="btn btn-primary"><i class="fa fa-search"></i></button>
                                </span>
                            </div>
                        </div>
                        <!-- هنا هيتعرض نتايج البحث -->
                        <div id="searchResults" class="row"></div>
                        <!-- End Search Box -->

                        <!-- START LISTING HEADING -->
                        <div class="col-12 text-center">
                            <div class="heading-details mb-0">
                                <h4 class="heading">{{__('words.our_products')}}</h4>
                            </div>
                        </div>

                        <!-- END LISTING HEADING -->

                        <!-- START PRODUCT LISTING SECTION -->
                        <div class="col-12 product-listing-products">
                            <!--featured item sec start-->
                            <section class="featured-items padding-bottom" id="featured-items">
                                <div class="row">

                                    @foreach ($products as $product)
                                        <div class="col-12 col-md-6 col-lg-4 text-center">
                                            <div class="featured-item-card">
                                                <div class="item-img">
                                                    <img src="{{asset($product->image)}}">
                                                    <div class="item-overlay">
                                                        <div class="item-btns">
                                                            <a href="javascript:void(0)" class="btn btn-view add-to-cart"
                                                                data-id="{{ $product->id }}">
                                                                <i class="las la-shopping-bag"></i>
                                                            </a>
                                                            <a href="#" class="btn btn-view"><i class="las la-heart"></i></a>
                                                            <a href="{{route('product.details', $product->id)}}"
                                                                class="btn btn-view"><i class="las la-plus"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="item-detail">
                                                    <h4 class="item-name">{{$product->title}}</h4>
                                                    <ul class="reviews">
                                                        <li><i class="las la-star"></i></li>
                                                        <li><i class="las la-star"></i></li>
                                                        <li><i class="las la-star"></i></li>
                                                        <li><i class="las la-star"></i></li>
                                                        <li><i class="las la-star"></i></li>
                                                    </ul>
                                                    <p class="item-price">${{$product->price}}</p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </section>
                            <!--featured item sec end-->
                        </div>
                        <!-- END PRODUCT LISTING SECTION -->

                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- subscribe --}}
    @include('front.components.subscribe')
    {{-- subscribe --}}
@endsection

@push('scripts')


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#searchBtn').on('click', function () {
                let query = $('#search').val();

                $.ajax({
                    url: "{{ route('search') }}",
                    type: 'GET',
                    data: { q: query },
                    success: function (data) {
                        let html = '';
                        if (data.length > 0) {
                            data.forEach(product => {
                                console.log(product);
                                html += `
                                                                                                                                                                                                                                                    <div class="col-12 col-md-6 col-lg-4 text-center mb-3">
                                                                                                                                                                                                                                                        <div class="featured-item-card">
                                                                                                                                                                                                                                                            <div class="item-img">
                                                                                                                                                                                                                                                                <img src="${product.image}" style="max-height:200px;object-fit:cover;">
                                                                                                                                                                                                                                                            </div>
                                                                                                                                                                                                                                                            <div class="item-detail">
                                                                                                                                                                                                                                                                <h4 class="item-name">${product.title}</h4>
                                                                                                                                                                                                                                                                <p class="item-price">$${product.price}</p>
                                                                                                                                                                                                                                                            </div>
                                                                                                                                                                                                                                                        </div>
                                                                                                                                                                                                                                                    </div>
                                                                                                                                                                                                                                                `;
                            });
                        } else {
                            html = '<p class="text-center w-100">No products found</p>';
                        }
                        $('#searchResults').html(html);
                    }
                });
            });
        });
    </script>

    <script>
        document.querySelectorAll('.add-to-cart').forEach(btn => {
            btn.addEventListener('click', async function () {
                const productId = this.dataset.id;

                const response = await fetch("{{ url('/cart/add') }}/" + productId, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json'
                    },
                    credentials: "same-origin"
                });


                if (response.status === 401) {
                    // toastr.error(" لازم تسجل الدخول الأول");
                    window.location.href = "{{ route('login') }}";
                    return;
                }

                const data = await response.json().catch(err => {
                    console.error("JSON Parse Error:", err);
                });


                if (response.ok && data) {

                    document.querySelectorAll('.cart-count').forEach(el => {
                        el.innerText = data.cart_count;
                    });
                    toastr.success(data.message);
                } else {
                    toastr.error("حصل خطأ");
                }
            });
        });
    </script>






@endpush