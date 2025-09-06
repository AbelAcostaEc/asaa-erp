<title>Yakusoft</title>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
<meta name="description"
      content="Home screen that contains stats, charts, call to action buttons and various listing elements."/>
<!-- Font Tags Start -->
<link rel="preconnect" href="https://fonts.gstatic.com"/>
<link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;700&display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;700&display=swap" rel="stylesheet"/>
<link rel="stylesheet" href="{{ asset('font/CS-Interface/style.css') }}"/>
<!-- Font Tags End -->
<!-- Vendor Styles Start -->
<link rel="stylesheet" href="{{ asset('css/vendor/bootstrap.min.css') }}"/>
{{--<link rel="stylesheet" href="{{ asset('css/vendor/OverlayScrollbars.min.css') }}"/>--}}

{{--<link rel="stylesheet" href="{{ asset('css/vendor/glide.core.min.css') }}"/>--}}

<link rel="stylesheet" href="{{ asset('css/vendor/introjs.min.css') }}"/>

<link rel="stylesheet" href="{{ asset('css/vendor/select2.min.css') }}"/>

<link rel="stylesheet" href="{{ asset('css/vendor/select2-bootstrap4.min.css') }}"/>

<link rel="stylesheet" href="{{ asset('css/vendor/plyr.css') }}"/>

<link rel="stylesheet" href="{{ asset('plugins/toastr.css') }}"/>
<link rel="stylesheet" href="{{ asset('plugins/bootstrap-icons/bootstrap-icons.min.css') }}"/>
<!-- Vendor Styles End -->
<!-- Template Base Styles Start -->
<link rel="stylesheet" href="{{ asset('css/styles.css') }}"/>
<!-- Template Base Styles End -->

<link rel="stylesheet" href="{{ asset('css/main.css') }}"/>
<script src="{{ asset('js/base/loader.js') }}"></script>
@yield('css')

{{-- Color template custom theme --}}
<style>
    /* alertas */
    #toast-container.custom-right {
        top: 75px;
        right: 5px;
    }

    #toastr-container > div.custom-toast {
        opacity: 1 !important;
        background-position: 1.5rem 0.5rem !important;
        padding: 0 !important;
        border-radius: 0.25rem !important;
    }

    #toastr-container > div.custom-toast.toastr-info {
        background-color: #255b9d !important;
        color: #fff !important;
    }

    #toastr-container > div.custom-toast .toastr-close-button {
        background-color: #fff !important;
        margin: 1rem 1rem 0 !important;
    }

    #toastr-container > div.custom-toast .toastr-title {
        padding: 0.5rem 0.5rem 0.5rem 4.5rem !important;
    }

    #toastr-container > div.custom-toast .toastr-message {
        padding: 1rem !important;
        background-color: #f9f9f6 !important;
        color: #000 !important;
    }

    .loaderModal {
        --d: 22px;
        width: 4px;
        height: 4px;
        border-radius: 50%;
        color: var(--primary);
        box-shadow: calc(1 * var(--d)) calc(0 * var(--d)) 0 0,
        calc(0.707 * var(--d)) calc(0.707 * var(--d)) 0 1px,
        calc(0 * var(--d)) calc(1 * var(--d)) 0 2px,
        calc(-0.707 * var(--d)) calc(0.707 * var(--d)) 0 3px,
        calc(-1 * var(--d)) calc(0 * var(--d)) 0 4px,
        calc(-0.707 * var(--d)) calc(-0.707 * var(--d)) 0 5px,
        calc(0 * var(--d)) calc(-1 * var(--d)) 0 6px;
        animation: l27 1s infinite steps(8);
    }

    @keyframes l27 {
        100% {
            transform: rotate(1turn)
        }
    }
</style>
