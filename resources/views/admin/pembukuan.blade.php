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
                            <img src="{{ asset('photos/' . $item->photo) }}" alt="Photo" class="w-full md:h-40">
                            <span>{{ $item->name }}</span>
                        </div>
                        <button type="submit">Add to Cart</button>
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
                        <div class="col-span-4">{{ $item->product->name }}</div>
                        <div class="col-span-3 flex justify-center items-center">
                            <form action="/admin/product-cart/item-reduction-{{ $item->id }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <button type="submit">
                                    <i class="fa-solid fa-square-minus text-xl"></i>
                                </button>
                            </form>
                            <div class="mx-2">
                                {{ $item->product_quantity }}
                            </div>
                            <form action="/admin/product-cart/item-addition-{{ $item->id }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <button type="submit">
                                    <i class="fa-solid fa-square-plus text-xl"></i>
                                </button>
                            </form>
                        </div>
                        <div class="col-span-3">{{ $item->price_total }}</div>
                    @endforeach
                    <div class="col-span-7 mt-3">
                        Total Harga:
                    </div>
                    <div class="col-span-3 mt-3">
                        {{ $cartContents->sum('price_total') }}
                    </div>
                    {{-- @if (session()->has('message'))
                        <h1>{{ session('message') }}</h1>
                    @endif --}}
                    <div class="col-span-10 mt-3">
                        <form action="/admin/record-transaction" method="POST" enctype="multipart/form-data">
                            @csrf
                            <button type="submit"
                                class="w-full bg-green-500 py-1.5 px-3 rounded-md text-white font-semibold uppercase">
                                Catat Transaksi
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        {{-- Cart End --}}
    </div>
@endsection
