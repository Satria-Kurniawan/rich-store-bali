@extends('layouts.admin.app')

@section('title', 'Category Edit')

@section('content')
    <form action="/admin/category-upd/{{ $category->id }}" method="post" enctype="multipart/form-data"
        class="bg-white rounded-xl px-8 pt-6 pb-8 mb-4">
        @csrf
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                Kategori
            </label>
            <input
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight  @error('name') border-red-500 @enderror"
                type="text" placeholder="Masukan kategori..." name="name" value="{{ $category->name }}" />
            @error('name')
                <div class="text-red-500">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <div class="flex items-center justify-between">
                <button type="submit"
                    class="bg-green-500 py-1.5 px-3 rounded-md text-white font-semibold uppercase">Update</button>
            </div>
        </div>
    </form>
@endsection
