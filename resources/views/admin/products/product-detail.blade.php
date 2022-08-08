@extends('layouts.guest.app')

@section('body')
    <div class="flex justify-center items-center h-screen">
        <div class="container mx-auto px-10">
            <div class="shadow border-b w-full p-5 rounded-xl">
                <div class="flex">
                    <img data-aos="fade-left" data-aos-delay="50" data-aos-duration="1000" data-aos-easing="ease-in-out"
                        src="{{ asset('photos/' . $product->photo) }}" alt="Produk" width="500" class="rounded-xl">
                    <div class="ml-7">
                        <h1 data-aos="fade-right" data-aos-delay="50" data-aos-duration="1000" data-aos-easing="ease-in-out"
                            class="text-2xl font-semibold">{{ $product->name }}</h1>
                        <p data-aos="fade-up" data-aos-delay="50" data-aos-duration="1000" data-aos-easing="ease-in-out"
                            class="text-justify my-2">{{ $product->description }}</p>
                        <div data-aos="fade-down" data-aos-delay="50" data-aos-duration="1000" data-aos-easing="ease-in-out"
                            class="flex justify-between">
                            <h1 class="text-xl">Stock: {{ $product->stock }}</h1>
                            <h1 class="text-2xl font-semibold">
                                {{ convertToIDR($product->price) }}</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
