@extends('layouts.admin.app')

@section('title', 'Product Add')

@section('content')
    <form action="/admin/product-upd/{{ $product->id }}" method="post" enctype="multipart/form-data"
        class="bg-white rounded-xl px-8 pt-6 pb-8 my-5">
        @csrf
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                Produk
            </label>
            <input
                class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight  @error('name') border-red-500 @enderror"
                type="text" placeholder="Masukan nama produk..." name="name" value="{{ $product->name }}" />
            @error('name')
                <div class="text-red-500">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="description">
                Description
            </label>
            <textarea id="message" rows="4"
                class="block p-2.5 w-full bg-gray-50 rounded border @error('description') border-red-500 @enderror"
                placeholder="Masukan deskripsi..." name="description">{{ $product->description }}</textarea>
            @error('description')
                <div class="text-red-500">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="price">
                Harga
            </label>
            <input
                class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight  @error('price') border-red-500 @enderror"
                type="number" placeholder="Masukan harga..." name="price" value="{{ $product->price }}" />
            @error('price')
                <div class="text-red-500">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="stock">
                Stock
            </label>
            <input
                class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight  @error('stock') border-red-500 @enderror"
                type="number" placeholder="Masukan stok..." name="stock" value="{{ $product->stock }}" />
            @error('stock')
                <div class="text-red-500">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-4">
            <label for="category" class="block mb-2 text-sm font-bold">
                Kategori
            </label>
            <select class="w-full p-2.5 bg-gray-50 border rounded @error('category_id') border-red-500 @enderror"
                name="category_id">
                <option disabled selected value>Pilih Kategori</option>
                @foreach ($categories as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>
            @error('category_id')
                <div class="text-red-500">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-4">
            <label class="block mb-2 text-sm font-bold text-gray-900" for="file_input">
                Upload Gambar
            </label>
            <input
                class="block w-full bg-gray-50 rounded-lg border cursor-pointer file:bg-slate-800 file:text-white file:cursor-pointer @error('photo') border-red-500 @enderror"
                id="file_input" type="file" name="photo">
            @error('photo')
                <div class="text-red-500">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <div class="flex items-center justify-between">
                <button type="submit"
                    class="bg-green-500 py-1.5 px-3 rounded-md text-white font-semibold uppercase">Submit</button>
            </div>
        </div>
    </form>
@endsection
