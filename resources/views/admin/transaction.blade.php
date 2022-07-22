@extends('layouts.admin.app')

@section('title', 'Daftar Transaksi')

@section('content')
    <div class="overflow-x-auto relative w-full my-5">
        <table class="w-full table-auto bg-white rounded-xl overflow-hidden border-collapse border">
            <thead>
                <tr class="bg-slate-800 text-white">
                    <th class="py-2 px-6">Gambar</th>
                    <th class="py-2 px-6">Produk</th>
                    <th class="py-2 px-6">Jumlah</th>
                    <th class="py-2 px-6">Total Harga</th>
                    <th class="py-2 px-6">Tanggal</th>
                    <th class="py-2 px-6">Admin</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transactions as $item)
                    <tr class="border-b text-center">
                        <td class="py-2 px-6 flex justify-center">
                            <img src="{{ asset('photos/' . $item->product->photo) }}" alt="Photo" class="w-10 h-10">
                        </td>
                        <td class="py-2 px-6">{{ $item->product->name }}</td>
                        <td class="py-2 px-6">{{ $item->product_quantity }}</td>
                        <td class="py-2 px-6">{{ $item->price_total }}</td>
                        {{-- <td class="py-2 px-6">{{ $item->created_at->diffForHumans() }}</td> --}}
                        <td class="py-2 px-6">{{ $item->created_at->isoFormat('dddd, D MMMM Y') }}</td>
                        <td class="py-2 px-6">{{ $item->user->name }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
