<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    {{-- Font Awsome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="bg-gray-100">
    <div class="flex">
        {{-- Sidebar --}}
        <aside class="relative h-screen w-20 bg-slate-800 p-5 text-white duration-300">
            <div class="inline-flex">
                <img src="{{ asset('photos/RichStore.png') }}" alt="Brand" class="rounded-full mr-3" width="50">
                <span class="hidden mt-2 font-bold text-xl">Rich Store Bali</span>
            </div>
            <i id="arrow" onclick="toggleSidebar()"
                class="absolute top-16 -right-3 fa-solid fa-circle-chevron-right text-3xl text-white bg-green-500 shadow rounded-full cursor-pointer duration-300"></i>
            <ul class="pt-5 text-lg font-medium">
                <li class="flex py-3">
                    <a href="/">
                        <i class="fa-solid fa-house text-green-400 mr-3 text-xl"></i>
                        <span class="font-semibold hidden">
                            Home
                        </span>
                    </a>
                </li>
                <li class="flex py-3">
                    <a href="/admin/category-list">
                        <i class="fa-solid fa-layer-group text-green-400 mr-3 text-xl"></i>
                        <span class="font-semibold hidden">
                            Categories
                        </span>
                    </a>
                </li>
                <li class="flex py-3">
                    <a href="/admin/product-list">
                        <i class="fa-solid fa-box text-green-400 mr-3 text-xl"></i>
                        <span class="font-semibold hidden">
                            Products
                        </span>
                    </a>
                </li>
                <li class="flex py-3">
                    <a href="/admin/product-bookkeeping">
                        <i class="fa-solid fa-book text-green-400 mr-3 text-xl"></i>
                        <span class="font-semibold hidden">
                            Pembukuan
                        </span>
                    </a>
                </li>
                <li class="flex py-3">
                    <a href="/admin/transaction-list">
                        <i class="fa-solid fa-receipt text-green-400 mr-3 text-xl"></i>
                        <span class="font-semibold hidden">
                            Daftar Transaksi
                        </span>
                    </a>
                </li>
            </ul>
        </aside>
        {{-- Content --}}
        <main class="container mx-auto px-5">
            @yield('content')
        </main>
    </div>
    <script>
        function toggleSidebar() {
            const aSide = document.querySelector('aside')
            const spans = document.getElementsByTagName("span");
            const arrow = document.getElementById('arrow')

            if (aSide.classList.contains('w-20')) {
                aSide.classList.replace('w-20', 'w-72')
                arrow.classList.add('rotate-180')
                for (const span of spans) {
                    span.classList.remove('hidden')
                }
                return
            }
            if (aSide.classList.contains('w-72')) {
                aSide.classList.replace('w-72', 'w-20')
                arrow.classList.remove('rotate-180')
                for (const span of spans) {
                    span.classList.add('hidden')
                }
                return
            }
        }
    </script>
</body>

</html>
