<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{ 'EziProposal' }} | @yield('page_title') </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- font awesome  -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" />
    <link rel="stylesheet" href="{{ asset('public/assets/frontend/') }}/style.css" />
    <link rel="stylesheet" href="{{ asset('public/assets/frontend/') }}/css/slick.css" />
    <link rel="stylesheet" href="{{ asset('public/assets/frontend/') }}/css/slick-theme.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('public/assets/frontend/') }}/custom-script.js"></script>
    <script src="{{ asset('public/assets/frontend/') }}/js/slick.js"></script>
    @yield('css_links')
    <style>
        @yield('css')
    </style>
</head>

<body id="body-pd">
<!-- Main Sidebar Container -->
@include('frontend.partials.navbar')
@include('frontend.partials.sidebar')
@yield('content','Content goes here...')
@yield('js_links')
@yield('js')
<script>
    if(window.outerWidth < 992) {
        jQuery('.dashboard-list').slick({
            dots: false,
            arrows: true,
            infinite: true,
            speed: 300,
            slidesToShow: 1,
            slidesToScroll: 1
        });
    }


    jQuery('.dashboard-nav .pe-2 img').click(function() {
        jQuery('span.last-day').toggleClass('show');

    });

</script>
</body>
</html>
