@extends('layout.main')
@section('content')
    <div class="min-h-screen">
        <div
            class="w-2/5 px-6 py-3 mt-20 ms-6 rounded-lg shadow-md bg-gradient-to-r from-pink-500 via-purple-700 to-blue-700 down">
            <h1 class="text-3xl font-semibold text-white">
                Masukan Nilai - {{ $alternative->name }}</h1>
        </div>

        <form action="/weight/{{ $alternative->id }}" method="post"
            class="w-3/5 px-6 py-3 mt-8 ms-6 toright bg-white rounded-xl shadow-md">
            @csrf
            @method('put')

            @foreach ($criteria as $kriteria)
                @php
                    $nilaiAlternatif = $weight->where('criteria_id', $kriteria->id)->first();
                @endphp
                <div class="mb-5">
                    <label for="criteria_{{ $kriteria->id }}"
                        class="block mb-2 text-lg font-medium text-gray-900 dark:text-white">{{ $kriteria->name }}
                    </label>
                    <p class="text-sm text-slate-400 font-normal mb-2">masukan indeks nilai 1-10</p>
                    <input type="number" id="criteria_{{ $kriteria->id }}" name="criteria[{{ $kriteria->id }}]"
                        class="bg-gray-50 border text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        min="1" max="10" value="{{ $nilaiAlternatif ? $nilaiAlternatif->jum_nilai : '' }}">
                </div>
            @endforeach

            <button type="submit"
                class="text-white inline-block bg-gradient-to-r from-blue-400 via-blue-500 to-blue-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Submit</button>
        </form>

    </div>
@endsection
