<!DOCTYPE html>
<html lang="lang=" {{ app()->getLocale() }} dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">
{{-- style="direction: {{ LaravelLocalization::getCurrentLocale() == 'ar' ? 'rtl' : 'ltr' }}; " --}}
@include('front.layout.header')
@yield('content')


@include('front.layout.footer')
</body>

</html>