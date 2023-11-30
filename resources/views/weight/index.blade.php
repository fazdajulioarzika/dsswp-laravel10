@extends('layout.main')
@section('content')
    <div class="min-h-screen">
        <div
            class="w-2/5 px-6 py-3 mt-20 ms-6 rounded-lg shadow-md bg-gradient-to-r from-pink-500 via-purple-700 to-blue-700 down">
            <h1 class="text-3xl font-semibold text-white">Halaman Nilai</h1>
        </div>
        <div class="w-full px-6 py-6 mx-auto">
            <div class="flex flex-wrap -mx-3 toright">
                <div class="flex-none w-full max-w-full px-3">
                    <div
                        class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
                        <div class="p-6 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent font-medium ">
                            <div class="flex items-center mb-2">
                                <h6 class="inline-block mx-3">Nilai table</h6>
                                <form action="/weight/search" method="GET" class="flex items-center ml-auto">
                                    <input type="text" name="search" placeholder="Cari..."
                                        class="px-4 py-2 border rounded" value="{{ request('search') }}">
                                    <button type="submit"
                                        class="text-white bg-gradient-to-r from-pink-500 via-purple-700 to-blue-700 hover:bg-blue-600 focus:ring-1 focus:outline-none focus:ring-slate-800 font-medium rounded-lg text-sm px-5 py-2.5 ml-2">
                                        Cari
                                    </button>
                                </form>
                            </div>


                            @if (session()->has('success'))
                                <div id="success-alert"
                                    class="bg-green-100 w-1/3 border border-green-400 text-green-700 px-4 py-3 rounded relative"
                                    role="alert">
                                    <span class="block sm:inline">{{ session('success') }}</span>
                                    <button onclick="hideAlert()"
                                        class="absolute top-0 right-0 px-4 py-3 focus:outline-none">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            class="bi bi-x fill-current h-6 w-6 text-green-500" viewBox="0 0 16 16">
                                            <path
                                                d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                                        </svg>
                                    </button>
                                </div>
                            @endif
                            <script>
                                function hideAlert() {
                                    document.getElementById("success-alert").style.display = "none";
                                }
                            </script>



                        </div>
                        <div class="flex-auto pb-4">
                            <div class="relative overflow-x-auto">
                                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                    <thead
                                        class="text-xs text-gray-700 uppercase bg-gray-200 dark:bg-gray-700 dark:text-gray-400">
                                        <tr>
                                            <th scope="col" class="p-2 border border-gray-400 text-center ">
                                                No.
                                            </th>
                                            <th scope="col" class="p-2 border border-gray-400 text-center ">
                                                Nama
                                            </th>
                                            @foreach ($criteria as $c)
                                                <th scope="col" class="p-2 border border-gray-400 text-center ">
                                                    {{ $c->name }}</th>
                                            @endforeach
                                            <th scope="col" class="p-2 border border-gray-400 text-center ">
                                                Action
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($alternative as $a)
                                            <tr class="bg-white dark:bg-gray-800 dark:border-gray-700">
                                                <td scope="row" class="p-2 border border-gray-400 text-center">
                                                    {{ $loop->iteration }}
                                                </td>
                                                <td
                                                    class="p-2 font-medium border border-gray-400 text-center text-gray-900 whitespace-nowrap dark:text-white">
                                                    {{ $a->name }}</td>
                                                @foreach ($criteria as $c)
                                                    @php
                                                        $nilaiAlternatif = $weight
                                                            ->where('alternative_id', $a->id)
                                                            ->where('criteria_id', $c->id)
                                                            ->first();
                                                    @endphp
                                                    <td class="p-2 border border-gray-400 text-center">
                                                        {{ $nilaiAlternatif ? $nilaiAlternatif->jum_nilai : '' }}</td>
                                                @endforeach
                                                <td scope="row" class="p-2 border border-gray-400 text-center ">
                                                    <a href="/weight/{{ $a->id }}/edit"
                                                        class="text-white inline-block bg-gradient-to-r from-blue-400 via-blue-500 to-blue-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-md text-xs px-2 py-3 text-center me-2">
                                                        <i class="far fa-plus-square"></i> Masukan Nilai</a>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                                <div class="p-3">
                                    {{ $alternative->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-full px-6 py-6 mx-auto">
            <div class="flex flex-wrap -mx-3 toright">
                <div class="flex-none w-full max-w-full px-3">
                    <div
                        class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
                        <div class="p-6 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent font-medium ">
                            <div class="flex items-center mb-2">
                                <h6 class="inline-block mx-3">Normalized Weight Table</h6>
                            </div>
                        </div>
                        <div class="flex-auto pb-4">
                            <div class="relative overflow-x-auto">
                                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                    <thead
                                        class="text-xs text-gray-700 uppercase bg-gray-200 dark:bg-gray-700 dark:text-gray-400">
                                        <tr>
                                            <th scope="col" class="p-2 border border-gray-400 text-center ">
                                                No.
                                            </th>
                                            <th scope="col" class="p-2 border border-gray-400 text-center ">
                                                Criteria
                                            </th>
                                            <th scope="col" class="p-2 border border-gray-400 text-center ">
                                                Weight
                                            </th>
                                            <th scope="col" class="p-2 border border-gray-400 text-center ">
                                                Type Criteria
                                            </th>
                                            <th scope="col" class="p-2 border border-gray-400 text-center ">
                                                Pangkat
                                            </th>


                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($criteria as $kriteria)
                                            <tr class="bg-white dark:bg-gray-800 dark:border-gray-700">
                                                <td scope="row" class="p-2 border border-gray-400 text-center">
                                                    {{ $loop->iteration }}
                                                </td>
                                                <td
                                                    class="p-2 font-medium border border-gray-400 text-center text-gray-900 whitespace-nowrap dark:text-white">
                                                    {{ $kriteria->name }}</td>
                                                <td
                                                    class="p-2 font-medium border border-gray-400 text-center text-gray-900 whitespace-nowrap dark:text-white">
                                                    {{ $kriteria->weight }}</td>
                                                <td
                                                    class="p-2 font-medium border border-gray-400 text-center text-gray-900 whitespace-nowrap dark:text-white">
                                                    {{ $kriteria->type_criteria }}</td>
                                                <td
                                                    class="p-2 font-medium border border-gray-400 text-center text-gray-900 whitespace-nowrap dark:text-white">
                                                    {{ $kriteria->normalized_weight }}</td>


                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
