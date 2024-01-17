<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/img/apple-icon.png') }}" />
    <link rel="icon" type="image/png" href="{{ asset('assets/img/favicon.png') }}" />
    <title>{{ $title }}</title>
    @include('layout.partials.link')
</head>

<body>
    <div class="w-full min-h-screen flex items-center"
        style="background-image: url({{ asset('assets/img/bg1.jpg') }});
    background-size: cover">
        <div class="w-4/5 md:w-1/3 mx-auto">
            @if (session()->has('success'))
                <div id="success-alert"
                    class="bg-green-100 w-full mb-4 border border-green-400 text-green-700 px-4 py-3 rounded relative"
                    role="alert">
                    <span class="block sm:inline">{{ session('success') }}</span>
                    <button onclick="hideAlert()" class="absolute top-0 right-0 px-4 py-3 focus:outline-none">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                            class="bi bi-x fill-current h-6 w-6 text-green-500" viewBox="0 0 16 16">
                            <path
                                d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                        </svg>
                    </button>
                </div>
            @endif
            @if (session()->has('loginError'))
                <div id="error-alert"
                    class="bg-red-100 w-full mb-4 border border-red-400 text-red-700 px-4 py-3 rounded relative"
                    role="alert">
                    <span class="block sm:inline">{{ session('loginError') }}</span>
                    <button onclick="hideAlertError()" class="absolute top-0 right-0 px-4 py-3 focus:outline-none">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                            class="bi bi-x fill-current h-6 w-6 text-red-500" viewBox="0 0 16 16">
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

                function hideAlertError() {
                    document.getElementById("error-alert").style.display = "none";
                }
            </script>
            <div
                class="w-full bg-gray-300 rounded-md shadow-md down backdrop-filter backdrop-blur-lg bg-opacity-10 border border-gray-100 p-4">
                <h1 class="text-3xl font-semibold text-center text-white">Login</h1>


                <form class="max-w-md mx-auto mt-12" action="/auth/login" method="POST">
                    @csrf
                    <div class="relative z-0 w-full mb-5 group">
                        <input type="text" name="email" id="email"
                            class="block py-2.5 px-0 w-full text-sm text-white bg-transparent border-0 border-b-2 border-gray-300 appearance-nonefocus:outline-none focus:ring-0 focus:border-rose-400 peer @error('email') border-red-500 @enderror"
                            placeholder=" " autofocus required value="{{ old('email') }}" />
                        <label for="email"
                            class="peer-focus:font-medium absolute text-sm text-white duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0  peer-focus:text-rose-400 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6 ">Email
                            Address</label>
                        @error('email')
                            <div class="text-red-500 text-sm m-1">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="relative z-0 w-full mb-5 group">
                        <input type="password" name="password" id="password"
                            class="block py-2.5 px-0 w-full text-sm text-white bg-transparent border-0 border-b-2 border-gray-300 appearance-none  focus:outline-none focus:ring-0 focus:border-rose-400 peer @error('password') border-red-500 @enderror"
                            placeholder=" " required />
                        <label for="password"
                            class="peer-focus:font-medium absolute text-sm text-white duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0  peer-focus:text-rose-400 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Password</label>
                        @error('password')
                            <div class="text-red-500 text-sm m-1">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>


                    <button type="submit"
                        class="text-white bg-rose-500 hover:bg-rose-700 focus:ring-2 focus:outline-none focus:ring-rose-300 font-medium rounded-lg text-sm w-full md:w-auto px-5 py-2.5 text-center">Login</button>
                </form>
                <div class="max-w-md mt-5 mx-auto">
                    <a href="/auth/register" class="text-rose-500 text-sm hover:text-rose-700  w-1/2"> Belum punya akun?
                        Register</a>
                </div>
            </div>
        </div>
    </div>

</body>
@include('layout.partials.script')

</html>
