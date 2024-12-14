<!DOCTYPE html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        <!-- Styles / Scripts -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @endif
    </head>
    <body class="antialiased ">
        <div class="w-full h-screen flex justify-center items-center ">
            <div class="w-[350px] shadow-lg  rounded-lg">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <h2 class="text-gray-900 text-lg mb-1 font-medium title-font px-4 mt-4">Login</h2>

                        <div class="relative mb-4 px-4">
                            <label for="email" class="leading-7 text-sm text-gray-600">Email</label>
                            <input type="email" id="email" name="email" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" value="{{ old('email') }}">
                        </div>
                        @error('email')
                            <div class="error px-2 py-2 mx-4 mb-4 border border-red-500 bg-red-200 text-red-400 rounded text-sm">{{$message}}</div>
                        @enderror


                        <div class="relative mb-4 px-4">
                            <label for="name" class="leading-7 text-sm text-gray-600">Password</label>
                            <input type="password" id="password" name="password" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </div>
                        @error('password')
                            <div class="error px-2 py-2 mx-4 mb-4 border border-red-500 bg-red-200 text-red-400 rounded text-sm">{{$message}}</div>
                        @enderror
                        <div class="px-4 mb-4 "><button class="text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg w-full" type="submit">Login</button></div>

                </form>
            </div>
        </div>
    </body>
</html>
