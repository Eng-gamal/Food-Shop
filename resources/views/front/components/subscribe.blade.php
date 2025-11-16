<!--newsletter sec start-->
<section class="newsletter" id="newsletter">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-4 text-center text-md-left">
                <h4 class="newsletter-heading"><i class="las la-envelope"></i>{{__('words.newsletters')}} </h4>
                <p class="newsletter-text">{{__('words.title_new_letters')}}</p>
            </div>
            <div class="col-12 col-md-8">

                <form method="post" action="{{route('news-letters')}}" id="subscribe">
                    @csrf
                    <div class="input-group">
                        <input class="form-control" name="email" placeholder="{{__('words.email')}}">
                        <button type="submit" class="btn news-btn">{{__('words.subscribe')}}</button>

                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!--newsletter sec end-->

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $('#subscribe').submit(function (e) {
            e.preventDefault();
            let formData = new FormData(e.target);

            $.ajax({
                type: 'POST',
                url: "{{ route('news-letters') }}",
                data: formData,
                contentType: false,
                processData: false,
                success: (response) => {
                    toastr.options = {
                        "closeButton": true,
                        "debug": false,
                        "newestOnTop": false,
                        "progressBar": true,
                        "positionClass": "{{app()->getLocale() == 'ar' ? 'toast-top-left' : 'toast-top-right'}}",
                        "preventDuplicates": false,
                        "onclick": null,
                        "showDuration": "300",
                        "hideDuration": "1000",
                        "timeOut": "5000",
                        "extendedTimeOut": "1000",
                        "showEasing": "swing",
                        "hideEasing": "linear",
                        "showMethod": "fadeIn",
                        "hideMethod": "fadeOut"
                    };
                    toastr.success("{{ __('message.subscribe_successfully') }}");
                    $('#subscribe')[0].reset();
                },
                error: function (response) {
                    toastr.options = {
                        "closeButton": true,
                        "debug": false,
                        "newestOnTop": false,
                        "progressBar": true,
                        "positionClass": "{{app()->getLocale() == 'ar' ? 'toast-top-left' : 'toast-top-right'}}",
                        "preventDuplicates": false,
                        "onclick": null,
                        "showDuration": "300",
                        "hideDuration": "1000",
                        "timeOut": "5000",
                        "extendedTimeOut": "1000",
                        "showEasing": "swing",
                        "hideEasing": "linear",
                        "showMethod": "fadeIn",
                        "hideMethod": "fadeOut"
                    };
                    toastr.error("{{ __('message.something_wrong') }}");
                }
            });
        });
    </script>
@endpush