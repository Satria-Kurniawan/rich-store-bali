@extends('layouts.admin.app')

@section('title', 'Category List')

@section('content')
    <a href="/admin/category-add" class="flex justify-end">
        <button class="bg-green-500 py-1.5 px-3 rounded-md text-white font-semibold uppercase mt-5">Tambah</button>
    </a>
    <div class="overflow-x-auto relative w-full mt-2">
        <table class="w-full table-auto bg-white rounded-xl overflow-hidden border-collapse border">
            <thead>
                <tr class="bg-slate-800 text-white">
                    <th class="py-2 px-6">Kategori</th>
                    <th class="py-2 px-6">Opsi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $item)
                    <tr class="border-b text-center">
                        <td class="py-2 px-6">{{ $item->name }}</td>
                        <td>
                            <a href="/admin/category-edit/{{ $item->id }}">
                                <i class="fa-solid fa-pen-to-square text-2xl text-blue-500 mr-1"></i>
                            </a>
                            <a href="/admin/category-del/{{ $item->id }}">
                                <i class="fa-solid fa-trash-can text-2xl text-red-500 ml-1"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
