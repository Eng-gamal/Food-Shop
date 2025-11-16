<form class="contact-form" action="{{route('send.email')}}" method="post" id="contact-form">
    @csrf
    <div class="row my-form">
        <div class="col-md-12 col-sm-12">
            <div id="result"></div>
        </div>
        <div class="col-12 col-md-6">
            <input type="text" class="form-control" id="candidate_fname" name="name"
                placeholder="{{__('words.first_name')}}" required="required">
        </div>
        <div class="col-12 col-md-6">
            <input type="text" class="form-control" id="candidate_lname" name="lastname"
                placeholder="{{__('words.last_name')}}" required="required">
        </div>
        <div class="col-12 col-md-6">
            <input type="email" class="form-control" id="user_email" name="email" placeholder="{{__('words.email')}}"
                required="required">
        </div>
        <div class="col-12 col-md-6">
            <input type="text" class="form-control" id="user_phone" name="phone" placeholder="{{__('words.phone')}}"
                required="required">
        </div>
        <div class="col-12">
            <textarea class="form-control" id="user_message" name="message" placeholder="{{__('words.message')}}" rows="7"
                required="required"></textarea>
        </div>
        <div class="col-12">
            <button class="btn web-btn user-contact rounded-pill contact_btn" type="submit">{{__('words.send')}}
            </button>
        </div>
    </div>
</form>

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $('#contact-form').submit(function (e) {
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
                    $('#contact-form')[0].reset();
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