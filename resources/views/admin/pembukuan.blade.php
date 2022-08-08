@extends('layouts.admin.app')

@section('title', 'Pembukuan')

@section('content')
    <div class="grid grid-cols-4 gap-6">
        {{-- Products --}}
        <div class="col-span-3">
            <div class="grid grid-cols-4 gap-2 my-5">
                @foreach ($products as $item)
                    <form action="/admin/product-add-to-cart/product-{{ $item->id }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="bg-white rounded-xl p-3 md:max-w-xs">
                            <img src="{{ asset('photos/' . $item->photo) }}" alt="Photo" class="w-full md:h-40 rounded-lg">
                            <div class="my-2">
                                <h1 class="font-semibold">{{ $item->name }}</h1>
                                <h1 class="font-semibold">{{ convertToIDR($item->price) }}</h1>
                            </div>
                            <button
                                class="bg-blue-500 py-1.5 px-3 rounded-lg text-white font-semibold w-full mt-1 uppercase hover:brightness-90"
                                type="submit">
                                Add to Cart<i class="fa-solid fa-cart-plus ml-2"></i>
                            </button>
                        </div>
                    </form>
                @endforeach
            </div>
        </div>
        {{-- Products End --}}

        {{-- Cart --}}
        <div class="col-span-1 md:-mr-5">
            <div class="bg-white p-5 h-screen">
                <div class="grid grid-cols-10 gap-2">
                    @foreach ($cartContents as $item)
                        <div class="col-span-3">{{ $item->product->name }}</div>
                        <div class="col-span-3 flex justify-center items-center">
                            <form action="/admin/product-cart/item-reduction-{{ $item->id }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <button type="submit" class="hover:brightness-90">
                                    <i class="fa-solid fa-square-minus text-xl text-red-500"></i>
                                </button>
                            </form>
                            <div class="mx-2">
                                {{ $item->product_quantity }}
                            </div>
                            <form action="/admin/product-cart/item-addition-{{ $item->id }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <button type="submit" class="hover:brightness-90">
                                    <i class="fa-solid fa-square-plus text-xl text-blue-500"></i>
                                </button>
                            </form>
                        </div>
                        <div class="col-span-4">{{ convertToIDR($item->price_total) }}</div>
                    @endforeach
                    <div class="col-span-6 mt-3">
                        Total Harga:
                    </div>
                    <div class="col-span-4 mt-3">
                        {{ convertToIDR($cartContents->sum('price_total')) }}
                    </div>
                    {{-- @if (session()->has('message'))
                        <h1>{{ session('message') }}</h1>
                    @endif --}}
                    <div class="col-span-10 mt-3">
                        <form action="{{ route('clearItems') }}" method="POST"
                            onsubmit="return confirm('Yakin ingin menghapus semua item di keranjang?')">
                            @csrf
                            <button type="submit"
                                class="w-full bg-red-500 py-1.5 px-3 rounded-md text-white font-semibold uppercase hover:brightness-90">
                                Kosongkan Keranjang<i class="fa-solid fa-xmark ml-2"></i>
                            </button>
                        </form>
                        <form action="/admin/record-transaction" method="POST" enctype="multipart/form-data"
                            onsubmit="return confirm('Yakin?')" class="mt-3">
                            @csrf
                            <button type="submit"
                                class="w-full bg-green-500 py-1.5 px-3 rounded-md text-white font-semibold uppercase hover:brightness-90">
                                Catat Transaksi<i class="fa-solid fa-book ml-2"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        {{-- Cart End --}}
    </div>
@endsection
