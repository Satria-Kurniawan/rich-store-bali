@extends('layouts.guest.app')

@section('body')
    <div class="flex justify-center items-center h-screen">
        <div class="container mx-auto px-10">
            <div class="flex" data-aos="fade-down" data-aos-delay="50" data-aos-duration="1000" data-aos-easing="ease-in-out">
                <form action="{{ route('searchProduct') }}" method="POST">
                    @csrf
                    <input class="p-2 focus:outline-green-500 rounded-l-xl" type="text" name="query"
                        placeholder="Search...">
                    <button class="bg-green-500 p-2 rounded-r-xl text-white hover:brightness-90">
                        <i class="fa-solid fa-magnifying-glass text-xl "></i>
                    </button>
                </form>
                <form action="{{ route('searchProduct') }}" method="POST" class="ml-3">
                    @csrf
                    <button class="bg-green-500 p-2 px-3 rounded-xl text-white font-semibold uppercase hover:brightness-90">
                        Show All
                    </button>
                </form>
            </div>
            @if ($products->isEmpty())
                <div class="my-10" data-aos="fade-left" data-aos-delay="50" data-aos-duration="1000"
                    data-aos-easing="ease-in-out">
                    <h1 class="font-semibold text-3xl">Produk tidak ditemukan</h1>
                </div>
            @else
                <div class="grid md:grid-cols-4 grid-cols-1 gap-5 mt-3">
                    @foreach ($products as $product)
                        <a href="/detail-product/{{ $product->id }}">
                            <div data-aos="fade-left" data-aos-delay="50" data-aos-duration="1000"
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
            @endif
        </div>
    </div>
@endsection
