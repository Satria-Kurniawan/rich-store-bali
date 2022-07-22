@extends('layouts.admin.app')

@section('title', 'Product List')

@section('content')
    <a href="{{ route('displayCategories') }}" class="flex justify-end">
        <button class="bg-green-500 py-1.5 px-3 rounded-md text-white font-semibold uppercase mt-5">Tambah</button>
    </a>
    <div class="overflow-x-auto relative w-full mt-2">
        <table class="w-full table-auto bg-white rounded-xl overflow-hidden border-collapse border">
            <thead>
                <tr class="bg-slate-800 text-white">
                    <th class="py-2 px-6">Gambar</th>
                    <th class="py-2 px-6">Produk</th>
                    <th class="py-2 px-6">Deskripsi</th>
                    <th class="py-2 px-6">Harga</th>
                    <th class="py-2 px-6">Stock</th>
                    <th class="py-2 px-6">Kategori</th>
                    <th class="py-2 px-6">Opsi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $item)
                    <tr class="border-b text-center">
                        <td class="py-2 px-6 flex justify-center">
                            <img src="{{ asset('photos/' . $item->photo) }}" alt="Photo" class="w-10 h-10">
                        </td>
                        <td class="py-2 px-6">{{ $item->name }}</td>
                        <td class="py-2 px-6">{{ Str::limit($item->description, 20) }}</td>
                        <td class="py-2 px-6">{{ $item->price }}</td>
                        <td class="py-2 px-6">{{ $item->stock }}</td>
                        <td class="py-2 px-6">{{ $item->category->name }}</td>
                        <td>
                            <a href="/admin/product-edit/{{ $item->id }}">
                                <i class="fa-solid fa-pen-to-square text-2xl text-blue-500 mr-1"></i>
                            </a>
                            <a href="/admin/product-del/{{ $item->id }}">
                                <i class="fa-solid fa-trash-can text-2xl text-red-500 ml-1"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
