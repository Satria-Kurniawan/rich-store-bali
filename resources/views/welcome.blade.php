@extends('layouts.guest.app')

@section('body')
    {{-- Header --}}
    <div class="bg-black h-[31rem] text-stone-400 flex justify-center items-center">
        <div class="w-full text-center">
            <img data-aos="fade-up" data-aos-anchor-placement="top-center" data-aos-delay="50" data-aos-duration="1000"
                data-aos-easing="ease-in-out" src="{{ asset('photos/RichStoreCrop.png') }}" alt="Brand" class="mx-auto">
            <h1 data-aos="fade-right" data-aos-delay="50" data-aos-duration="1000" data-aos-easing="ease-in-out"
                class="mt-2 md:text-2xl font-light">
                Distributor Produk Lokal Go International</h1>
            <div data-aos="fade-left" data-aos-delay="50" data-aos-duration="1000" data-aos-easing="ease-in-out"
                class="flex justify-center">
                <div class="w-72">
                    <div class="flex justify-between font-light">
                        <div>
                            <i class="fa-brands fa-instagram text-white"></i>
                            <span class="ml-1">rich_storebali</span>
                        </div>
                        <div>
                            <i class="fa-brands fa-facebook-f text-white"></i>
                            <span class="ml-1">Rich Store Bali</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-10" data-aos="flip-left" data-aos-delay="50" data-aos-duration="1000"
                data-aos-easing="ease-in-out">
                <form action="{{ route('searchProduct') }}" method="POST">
                    @csrf
                    <input class="md:max-w-lg max-w-xs w-full p-2 focus:outline-green-500 rounded-l-xl" type="text"
                        name="query" placeholder="Search...">
                    <button class="bg-white p-2 rounded-r-xl text-green-500 hover:bg-green-500 hover:text-white">
                        <i class="fa-solid fa-magnifying-glass text-xl "></i>
                    </button>
                </form>
            </div>
        </div>
    </div>
    {{-- Header End --}}
    {{-- Content --}}
    <div class="container mx-auto md:px-0 px-10 max-w-screen-lg">
        <div id="about"></div>
        <h1 style="font-family: 'Caveat', cursive;" class="text-center mt-8 text-3xl font-semibold">
            Rich Store Bali Semakin Terdepan
        </h1>
        <div class="border-b border-gray-300 h-1 mt-8"></div>
        <div class="text-xl mt-8">
            {{-- Intro --}}
            <span class="uppercase font-semibold">Rich Store Bali </span>
            <p data-aos="fade-up" data-aos-delay="50" data-aos-duration="1000" data-aos-easing="ease-in-out"
                class="font-light text-justify">
                merupakan toko online yang sudah Go International, yang bergerak dalam bidang produsen dan distributor
                produk-produk berkualitas asli Bali-Indonesia.
            </p>
            {{-- Intro End --}}
            {{-- Products --}}
            <div id="produk"></div>
            <div class="mt-20">
                <h1 class="text-xl font-semibold uppercase">Produk</h1>
                <div class="grid md:grid-cols-4 grid-cols-1 gap-5 mt-3">
                    @foreach ($products as $product)
                        <a href="/detail-product/{{ $product->id }}">
                            <div data-aos="flip-left" data-aos-delay="50" data-aos-duration="1000"
                                data-aos-easing="ease-in-out" class="shadow-md rounded-lg overflow-hidden">
                                <img src="{{ asset('photos/' . $product->photo) }}" alt="Product" class="w-full h-52">
                                <div class="p-5">
                                    <div class="flex justify-between">
                                        <span class="font-semibold">{{ $product->name }}</span>
                                        <span
                                            class="bg-green-500 text-white px-3 rounded-2xl">{{ $product->category->name }}
                                        </span>
                                    </div>
                                    <span>{{ convertToIDR($product->price) }}</span>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
            {{-- Products End --}}
            {{-- Visi Misi --}}
            <div id="visimisi"></div>
            <div class="mt-20">
                <h1 class="uppercase text-xl font-semibold">Visi & Misi</h1>
                <div class="grid md:grid-cols-7 grid-cols-1 gap-3 mt-3">
                    <h1 data-aos="fade-up" data-aos-delay="50" data-aos-duration="1000" data-aos-easing="ease-in-out"
                        class="col-span-2 italic">Visi Kami</h1>
                    <p data-aos="fade-right" data-aos-delay="50" data-aos-duration="1000" data-aos-easing="ease-in-out"
                        class="col-span-5 text-justify">
                        Menjadi online shop pilihan utama maysarakat yang berperan sebagai distributor produk lokal
                        berkualitas asli Bali-Indonesia
                    </p>
                    <h1 data-aos="fade-up" data-aos-delay="50" data-aos-duration="1000" data-aos-easing="ease-in-out"
                        class="col-span-2 italic">Misi Kami</h1>
                    <div data-aos="fade-left" data-aos-delay="50" data-aos-duration="1000" data-aos-easing="ease-in-out"
                        class="col-span-5 flex-col">
                        <li class="text-justify">
                            Membangun institusi yang unggul di bidang distributor produk dan solusi kualitas bagi
                            pebisnis dan perseorangan
                        </li>
                        <li class="text-justify mt-1">
                            Memahami beragam kebutuhan pebisnis dan usaha kecil guna memberikan layanan produk yang
                            tepat demi tercapainya kepuasan optimal bagi pelanggan
                        </li>
                        <li class="text-justify mt-1">
                            Meningkatkan nilai franchise dan nilai stakeholder RICH STORE BALI
                        </li>
                    </div>
                </div>
            </div>
            {{-- Visi Misi End --}}
            {{-- Tata Nilai --}}
            <div id="tatanilai"></div>
            <div class="mt-20">
                <div class="grid md:grid-cols-7 grid-cols-1 gap-3 mt-3">
                    <h1 data-aos="fade-up" data-aos-delay="50" data-aos-duration="1000" data-aos-easing="ease-in-out"
                        class="col-span-2 font-semibold">Tata Nilai</h1>
                    <div class="col-span-5 flex-col">
                        <div class="grid md:grid-cols-2 grid-cols-1 md:gap-10 gap-5 text-justify">
                            <div data-aos="fade-right" data-aos-delay="50" data-aos-duration="1000"
                                data-aos-easing="ease-in-out">
                                <h1 class="font-semibold">
                                    <i class="fa-solid fa-bullseye text-red-500 mr-3"></i>
                                    Fokus Pada Nasabah
                                </h1>
                                Perhatian/kepedulian yang diikuti dengan usaha memberikan layanan untuk memenuhi harapan
                                dan/atau kebutuhan customer secara spesifik
                            </div>
                            <div data-aos="fade-left" data-aos-delay="50" data-aos-duration="1000"
                                data-aos-easing="ease-in-out">
                                <h1 class="font-semibold">
                                    <i class="fa-solid fa-circle-check text-green-500 mr-3"></i>
                                    Integritas
                                </h1>
                                Sikap yang teguh dalam menjunjung tinggi kejujuran dan keterbukaan, yang diikuti dengan
                                tindakan konsisten dan konsekuen pada peran/tugas dalam berbagai situasi dan kondisi
                                untuk membangun kepercayaan customer
                            </div>
                            <div data-aos="fade-left" data-aos-delay="50" data-aos-duration="1000"
                                data-aos-easing="ease-in-out">
                                <h1 class="font-semibold">
                                    <i class="fa-solid fa-handshake-simple text-yellow-400 mr-3"></i>
                                    Kerjasama Tim
                                </h1>
                                Interaksi dan sinergi yang didasari atas pemahaman diri sendiri dan orang lain untuk
                                mencapai tujuan organisasi
                            </div>
                            <div data-aos="fade-right" data-aos-delay="50" data-aos-duration="1000"
                                data-aos-easing="ease-in-out">
                                <h1 class="font-semibold">
                                    <i class="fa-solid fa-star text-blue-500 mr-3"></i>
                                    Berusaha Mencapai Yang Terbaik
                                </h1>
                                Usaha berkelanjutan untuk mencapai yang terbaik guna memberikan nilai tambah bagi
                                customer
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Tata Nilai End --}}
        </div>
        <div class="border-b border-gray-300 h-1 mt-8"></div>
    </div>
    {{-- Content End --}}
    {{-- Footer --}}
    <footer id="contacts" class="w-full bg-black text-white mt-5 p-10">
        <div data-aos="fade-up" data-aos-delay="50" data-aos-duration="1000" data-aos-easing="ease-in-out"
            class="grid md:grid-cols-3 grid-cols-1 gap-5">
            <div>
                <h1 class="text-2xl font-semibold mb-5">Kantor Pusat</h1>
                <h2 class="italic"><i class="fa-solid fa-location-dot mr-3 text-blue-500"></i>Kota Singaraja</h2>
                <p class="font-light">Lingkungan Kebon Sari Gang III No.35 Singaraja-Bali</p>
                <h2 class="italic mt-3"><i class="fa-solid fa-location-dot mr-3 text-blue-500"></i>Kota Denpasar</h2>
                <p class="font-light">
                    Jl. Damperaupan, Peguyangan Kaja, Kec. Denpasar Utara (Perumahan Belakang SMP Negeri 12 Denpasar
                    Gang Kedua Rumah Pertama dari TImur)
                </p>
            </div>
            <div>
                <h1 class="text-2xl font-semibold mb-5">Hubungi Kami</h1>
                <h2><i class="fa-solid fa-phone mr-3 text-green-500"></i>Krishna</h2>
                <h2 class="mt-3"><i class="fa-solid fa-phone mr-3 text-green-500"></i>Yuning</h2>
            </div>
            <div>
                <h1 class="text-2xl font-semibold mb-5">Media Sosial</h1>
                <h2 class="flex">
                    <img src="{{ asset('photos/Facebook.png') }}" alt="fb" width="30" class="mr-3">Facebook
                </h2>
                <h2 class="mt-3 flex">
                    <img src="{{ asset('photos/Instagram.png') }}" alt="fb" width="30"
                        class="mr-3">Instagram
                </h2>
                <h2 class="mt-3 flex">
                    <img src="{{ asset('photos/Youtube.png') }}" alt="fb" width="30" class="mr-3">Youtube
                </h2>
                <h2 class="mt-3 flex">
                    <img src="{{ asset('photos/Shopee.png') }}" alt="fb" width="30" class="mr-3">Shopee
                </h2>
                <h2 class="mt-3 flex">
                    <img src="{{ asset('photos/Gmail.png') }}" alt="fb" width="30" class="mr-3">Email
                </h2>
            </div>
        </div>
    </footer>
    {{-- Footer End --}}
@endsection
