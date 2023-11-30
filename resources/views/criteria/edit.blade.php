@extends('layout.main')
@section('content')
    <div class="min-h-screen">
        <div
            class="w-2/5 px-6 py-3 mt-20 ms-6 rounded-lg shadow-md bg-gradient-to-r from-pink-500 via-purple-700 to-blue-700 down">
            <h1 class="text-3xl font-semibold text-white">
                Edit Criteria Data</h1>
        </div>


        <form class="w-3/5 px-6 py-3 mt-8 ms-6 toright bg-white rounded-xl shadow-md" method="post"
            action="/criteria/{{ $criteria->id }}">
            @method('put')
            @csrf
            <div class="mb-5">
                <label for="name" class="block mb-2 text-lg font-medium text-gray-900 dark:text-white">Nama
                    Criteria</label>
                <input type="text" id="name"
                    class="bg-gray-50 border @error('name') border-red-500 @enderror
                text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500
                block w-full p-2.5"
                    value="{{ old('name', $criteria->name) }}" name="name" placeholder="Masukan nama criteria">
                @error('name')
                    <div class="text-red-500 text-sm m-1">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-5">
                <label for="kode_criteria" class="block mb-2 text-lg font-medium text-gray-900 dark:text-white">Kode
                    Criteria</label>
                <input type="text" id="kode_criteria"
                    class="bg-gray-50 border @error('kode_criteria') border-red-500 @enderror
                           text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500
                           block w-full p-2.5"
                    value="{{ old('kode_criteria', $criteria->kode_criteria) }}" name="kode_criteria"
                    placeholder="Masukan nama criteria">
                @error('kode_criteria')
                    <div class="text-red-500 text-sm m-1">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-5">
                <label for="weight" class="block mb-2 text-lg font-medium text-gray-900 dark:text-white">Bobot
                    Criteria</label>
                <input type="text" id="weight"
                    class="bg-gray-50 border @error('weight') border-red-500 @enderror
                           text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500
                           block w-full p-2.5"
                    value="{{ old('weight', $criteria->weight) }}" name="weight" placeholder="Masukan bobot criteria">
                @error('weight')
                    <div class="text-red-500 text-sm m-1">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-5">
                <label for="type_criteria" class="block mb-2 text-lg font-medium text-gray-900 dark:text-white">Tipe
                    Criteria</label>
                <select name="type_criteria" id="type_criteria"
                    class="bg-gray-50 border text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500
                           block w-full p-2.5">
                    @if (old('type_criteria', $criteria->type_criteria) == 'Benefit')
                        <option value="Benefit" selected>Benefit</option>
                    @else
                        <option value="Benefit">Benefit</option>
                    @endif
                    @if (old('type_criteria', $criteria->type_criteria) == 'Cost')
                        <option value="Cost" selected>Cost</option>
                    @else
                        <option value="Cost">Cost</option>
                    @endif
                </select>


            </div>
            <button type="submit"
                class="text-white inline-block bg-gradient-to-r from-blue-400 via-blue-500 to-blue-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Submit</button>
        </form>

    </div>
@endsection
