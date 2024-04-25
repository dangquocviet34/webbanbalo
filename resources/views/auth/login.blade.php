<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="{{route('index')}}">
                <img src="{{asset('images/logo.png')}}" width='500px'>
            </a>
        </x-slot>
                    <!-- Left column container with background-->
                <div class="flex h-full flex-wrap items-center justify-center lg:justify-between">
                <div class="w-full lg:w-1/2 mb-6 md:mb-0 md:w-1/2">
                    <div class="shrink-1 mb-6 grow-0 basis-auto md:mb-0 md:w-5/18 md:shrink-0 lg:w-4/12 xl:w-4/12 p-4 md:p-8">
                    <img src="https://tecdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp" class=" md:w-2/3 lg:w-1/2 xl:w-2/3 rounded-lg max-w-sm" alt="Sample image" />
                    </div>
                </div>
                <div class="w-full lg:w-1/2 md:w-1/2">
                    <!-- Session Status -->
                    <x-auth-session-status class="mb-4" :status="session('status')" />

                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <!-- Email Address -->
                        <div class="mb-4">
                            <x-label for="email" :value="__('Email')" />

                            <x-input id="email" class="block mt-1 w-full rounded-md shadow-sm " type="email" name="email" :value="old('email')" required autofocus />
                        </div>

                        <!-- Password -->
                        <div class="mb-4">
                            <x-label for="password" :value="__('Password')" />

                            <x-input id="password" class="block mt-1 w-full rounded-md shadow-sm "
                                        type="password"
                                        name="password"
                                        required autocomplete="current-password" />
                        </div>

                        <!-- Remember Me -->
                        <div class="block mt-4">
                            <label for="remember_me" class="inline-flex items-center">
                                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                                <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                            </label>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            @if (Route::has('password.request'))
                                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                                    {{ __('Forgot your password?') }}
                                </a>
                            @endif

                            <x-button class="ml-3">
                                {{ __('Log in') }}
                            </x-button>
                        </div>
                    </form>
                    </div>
                </div>
       
    </x-auth-card>
</x-guest-layout>
