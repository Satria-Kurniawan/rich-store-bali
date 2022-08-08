<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" style="scroll-behavior: smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Rich Store Bali</title>

    <!-- Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Caveat:wght@400;500;600;700&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    {{-- Fontawsome --}}
    {{-- Font Awsome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- Jquery --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    {{-- AOS --}}
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
</head>

<body style="font-family: 'Roboto', sans-serif;">
    {{-- Navbar --}}
    @include('layouts.guest.navbar')
    {{-- Navbar End --}}

    @yield('body')

    <script>
        function toggleNav() {
            const mobileNav = document.getElementById('mobilenav')

            if (mobileNav.classList.contains('-left-[110%]')) {
                mobileNav.classList.replace('-left-[110%]', '-left-5')
                mobileNav.classList.add('bg-black')
                return
            }
            if (mobileNav.classList.contains('-left-5')) {
                mobileNav.classList.replace('-left-5', '-left-[110%]')
                mobileNav.classList.remove('bg-black')
                return
            }
        }

        $(document).ready(function() {
            $("a").click(function() {
                $("a.text-white").removeClass("text-white");
                $(this).addClass("text-white");
            });
        });

        AOS.init()
    </script>
</body>

</html>
