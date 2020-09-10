@extends('layouts.plugins')

@section('content')
    <div class="container mx-auto">
        <div class="flex flex-wrap justify-center">
            <div class="w-full max-w-sm">
                <div class="flex flex-col break-words bg-foreground rounded shadow-md">

                    <div class="font-semibold bg-highlight text-gray-200 py-3 px-6 mb-0">
                        {{ __('Login') }}
                    </div>

                    <form class="w-full p-6" method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="flex flex-wrap mb-6">
                            <label for="email" class="block text-gray-200 text-sm font-bold mb-2">
                                {{ __('E-Mail Address') }}:
                            </label>

                            <input id="email" type="email" class="form-input w-full bg-highlight border-background text-gray-200 @error('email') border-red-500 @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <p class="text-red-500 text-xs italic mt-4">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div class="flex flex-wrap mb-6">
                            <label for="password" class="block text-gray-200 text-sm font-bold mb-2">
                                {{ __('Password') }}:
                            </label>

                            <input id="password" type="password" class="form-input w-full bg-highlight border-background text-gray-200 @error('password') border-red-500 @enderror" name="password" required>

                            @error('password')
                                <p class="text-red-500 text-xs italic mt-4">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div class="flex mb-6">
                            <label class="inline-flex items-center text-sm text-gray-200" for="remember">
                                <input type="checkbox" name="remember" id="remember" class="form-checkbox" {{ old('remember') ? 'checked' : '' }}>
                                <span class="ml-2">{{ __('Remember Me') }}</span>
                            </label>
                            @if (Route::has('password.request'))
                                <a class="text-sm text-fifth hover:text-fourth whitespace-no-wrap no-underline ml-auto" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                        </div>

                        <div class="flex flex-wrap items-center">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-gray-100 font-bold py-2 px-4 rounded w-full focus:outline-none focus:shadow-outline">
                                {{ __('Login') }}
                            </button>

                            @if (Route::has('register'))
                                <p class="w-full text-xs text-center text-gray-200 mt-8 -mb-4">
                                    {{ __("Don't have an account?") }}
                                    <a class="text-fifth hover:text-fourth no-underline" href="{{ route('register') }}">
                                        {{ __('Register') }}
                                    </a>
                                </p>
                            @endif
                        </div>
                    </form>

                    <div class="flex flex-col p-4 text-gray-200">
                        <div class="flex text-center pb-4 before:border">
                            <div class="mx-auto flex-1 h-2.5 align-middle border-b-2 border-solid border-highlight"></div>
                            <p class="px-3">Or continue with</p>
                            <div class="mx-auto flex-1 h-2.5 align-middle border-b-2 border-solid border-highlight"></div>
                        </div>

                        <div class="flex justify-center space-x-2 sm:space-x-4 md:space-x-6 lg:space-x-8 xl:space-x-12">
                            <a class="bg-highlight py-2 px-7 rounded text-center text-xl text-background hover:bg-background hover:text-highlight" href="{{ route('authenticate.steam') }}"><i class="fab fa-steam w-12"></i></a>
                            <a class="bg-highlight py-2 px-7 rounded text-center text-xl text-background hover:bg-background hover:text-highlight" href="{{ route('authenticate.steam') }}"><i class="fab fa-steam-square w-12"></i></a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
