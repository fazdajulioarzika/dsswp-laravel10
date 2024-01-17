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

            <div
                class="w-full bg-gray-300 rounded-md shadow-md down backdrop-filter backdrop-blur-lg bg-opacity-10 border border-gray-100 p-4">
                <h1 class="text-3xl font-semibold text-center text-white">Register</h1>


                <form class="max-w-md mx-auto mt-12" action="/auth/register" method="post">
                    @csrf
                    <div class="relative z-0 w-full mb-5 group">
                        <input type="text" name="name" id="name"
                            class="block py-2.5 px-0 w-full text-sm text-white bg-transparent border-0 border-b-2 border-gray-300 appearance-nonefocus:outline-none focus:ring-0 focus:border-rose-400 peer @error('name') border-red-500 @enderror"
                            placeholder=" " required autofocus />
                        <label for="name"
                            class="peer-focus:font-medium absolute text-sm text-white duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0  peer-focus:text-rose-400 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Name</label>
                        @error('name')
                            <div class="text-red-500 text-sm m-1">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="relative z-0 w-full mb-5 group">
                        <input type="text" name="username" id="username"
                            class="block py-2.5 px-0 w-full text-sm text-white bg-transparent border-0 border-b-2 border-gray-300 appearance-nonefocus:outline-none focus:ring-0 focus:border-rose-400 peer @error('username') border-red-500 @enderror"
                            placeholder=" " required />
                        <label for="username"
                            class="peer-focus:font-medium absolute text-sm text-white duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0  peer-focus:text-rose-400 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Username</label>
                        @error('username')
                            <div class="text-red-500 text-sm m-1">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="relative z-0 w-full mb-5 group">
                        <input type="email" name="email" id="email"
                            class="block py-2.5 px-0 w-full text-sm text-white bg-transparent border-0 border-b-2 border-gray-300 appearance-nonefocus:outline-none focus:ring-0 focus:border-rose-400 peer @error('email') border-red-500 @enderror"
                            placeholder=" " required />
                        <label for="email"
                            class="peer-focus:font-medium absolute text-sm text-white duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0  peer-focus:text-rose-400 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Email
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
                        class="text-white bg-rose-500 hover:bg-rose-700 focus:ring-2 focus:outline-none focus:ring-rose-300 font-medium rounded-lg text-sm w-full md:w-auto px-5 py-2.5 text-center">Register</button>
                </form>
                <div class="max-w-md mt-5 mx-auto">
                    <a href="/auth/login" class="text-rose-500 text-sm hover:text-rose-700  w-1/2"> Sudah punya akun?
                        Login</a>
                </div>
            </div>
        </div>
    </div>

</body>
@include('layout.partials.script')

</html>
