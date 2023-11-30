@extends('layout.main')
@section('content')
    <div class="min-h-screen">
        <div
            class="w-2/5 px-6 py-3 mt-20 ms-6 rounded-lg shadow-md bg-gradient-to-r from-pink-500 via-purple-700 to-blue-700 down">
            <h1 class="text-3xl font-semibold text-white">Halaman Alternative</h1>

        </div>
        <div class="w-full px-6 py-6 mx-auto">
            <div class="flex flex-wrap -mx-3 toright">
                <div class="flex-none w-full max-w-full px-3">
                    <div
                        class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
                        <div class="p-6 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent font-medium ">
                            <div class="flex items-center mb-2">
                                <h6 class="inline-block mx-3">Alternative table</h6>
                                <a href="/alternative/create"
                                    class="text-white inline-block bg-gradient-to-r from-blue-400 via-blue-500 to-blue-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2">
                                    <i class="far fa-plus-square"></i> Add a Alternative
                                </a>
                                <form action="/alternative/search" method="GET" class="flex items-center ml-auto">
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
                                            <th scope="col" class="px-6 py-3">
                                                No.
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Nama
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Kode Alternative
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Action
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($alternative as $a)
                                            <tr class="bg-white dark:bg-gray-800 dark:border-gray-700">
                                                <td scope="row" class="px-6 py-4">
                                                    {{ $loop->iteration }}
                                                </td>
                                                <td
                                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                    {{ $a->name }}
                                                </td>
                                                <td class="px-6 py-4">
                                                    {{ $a->kode_alternative }}
                                                </td>
                                                <td class="px-6 py-4">

                                                    <a href="/alternative/{{ $a->id }}/edit"
                                                        class="text-gray-900 bg-gradient-to-r from-yellow-200 via-yellow-400 to-yellow-500 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-yellow-300 dark:focus:ring-lime-yellow font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2"><i
                                                            class="far fa-edit"></i> Edit</a>

                                                    <!-- Trigger button -->
                                                    <button id="openDeleteModal{{ $a->id }}"
                                                        class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2"><i
                                                            class="fas fa-trash-alt"></i> Delete
                                                    </button>

                                                    <!-- Delete Modal -->
                                                    <div id="deleteModal{{ $a->id }}" class="hidden fixed inset-0 ">
                                                        <div class="flex justify-center min-h-screen p-4">
                                                            <!-- Background overlay -->
                                                            <div class="fixed inset-0 bg-gray-500 opacity-50 z-80"></div>

                                                            <!-- Modal content -->
                                                            <div
                                                                class="bg-white w-full h-1/4 max-w-md p-4 rounded shadow-md relative z-50">
                                                                <!-- Modal header -->
                                                                <div class="flex items-center justify-between mb-4">
                                                                    <h3 class="text-xl font-semibold text-gray-800">Hapus
                                                                        Data</h3>
                                                                    <button id="closeDeleteModal{{ $a->id }}"
                                                                        class="text-gray-600 hover:text-gray-800">
                                                                        <svg class="w-6 h-6" fill="none"
                                                                            stroke="currentColor" viewBox="0 0 24 24"
                                                                            xmlns="http://www.w3.org/2000/svg">
                                                                            <path stroke-linecap="round"
                                                                                stroke-linejoin="round" stroke-width="2"
                                                                                d="M6 18L18 6M6 6l12 12"></path>
                                                                        </svg>
                                                                    </button>
                                                                </div>

                                                                <!-- Modal body -->
                                                                <div class="text-gray-700 mb-4">
                                                                    <p>Apakah Anda yakin ingin menghapus data ini?</p>
                                                                </div>

                                                                <!-- Modal footer -->
                                                                <div class="flex justify-end">

                                                                    <form action="/alternative/{{ $a->id }}"
                                                                        method="post" class="inline">
                                                                        @method('delete')
                                                                        @csrf
                                                                        <button
                                                                            class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded mr-2"><i
                                                                                class="bi bi-trash mt-1"></i>
                                                                            Hapus!</button>
                                                                    </form>
                                                                    <button id="cancelDelete{{ $a->id }}"
                                                                        class="bg-gray-300 hover:bg-gray-400 text-gray-700 font-bold py-2 px-4 rounded">
                                                                        Batal
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <script>
                                                        document.addEventListener('DOMContentLoaded', function() {
                                                            const openModalButton = document.getElementById('openDeleteModal{{ $a->id }}');
                                                            const deleteModal = document.getElementById('deleteModal{{ $a->id }}');
                                                            const closeModalButton = document.getElementById('closeDeleteModal{{ $a->id }}');
                                                            const confirmDeleteButton = document.getElementById('confirmDelete{{ $a->id }}');
                                                            const cancelDeleteButton = document.getElementById('cancelDelete{{ $a->id }}');

                                                            openModalButton.addEventListener('click', function() {
                                                                deleteModal.classList.remove('hidden');
                                                            });

                                                            closeModalButton.addEventListener('click', function() {
                                                                deleteModal.classList.add('hidden');
                                                            });

                                                            cancelDeleteButton.addEventListener('click', function() {
                                                                deleteModal.classList.add('hidden');
                                                            });
                                                        });
                                                    </script>

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
    </div>
@endsection
