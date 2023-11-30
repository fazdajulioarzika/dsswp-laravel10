@extends('layout.main')
@section('content')
    <div class="min-h-screen">
        <div
            class="w-2/5 px-6 py-3 mt-20 ms-6 rounded-lg shadow-md bg-gradient-to-r from-pink-500 via-purple-700 to-blue-700 down">
            <h1 class="text-3xl font-semibold text-white">
                Add Alternative Data</h1>
        </div>


        <form class="w-3/5 px-6 py-3 mt-8 ms-6 toright bg-white rounded-xl shadow-md" method="post" action="/alternative">
            @csrf
            <div class="mb-5">
                <label for="name" class="block mb-2 text-lg font-medium text-gray-900 dark:text-white">Nama
                    Alternatif</label>
                <input type="text" id="name"
                    class="bg-gray-50 border @error('name') border-red-500 @enderror
                text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500
                block w-full p-2.5"
                    value="{{ old('name') }}" name="name" placeholder="Masukan nama alternative">
                @error('name')
                    <div class="text-red-500 text-sm m-1">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-5">
                <label for="kode_alternative" class="block mb-2 text-lg font-medium text-gray-900 dark:text-white">Kode
                    Alternatif</label>
                <input type="text" id="kode_alternative"
                    class="bg-gray-50 border @error('kode_alternative') border-red-500 @enderror
                           text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500
                           block w-full p-2.5"
                    value="{{ old('kode_alternative') }}" name="kode_alternative" placeholder="Masukan nama alternative">
                @error('kode_alternative')
                    <div class="text-red-500 text-sm m-1">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <button type="submit"
                class="text-white inline-block bg-gradient-to-r from-blue-400 via-blue-500 to-blue-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Submit</button>
        </form>

    </div>
@endsection
