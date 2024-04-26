<x-guest-layout>
    <x-auth-card>
    <section class="w-1200 h-900 flex items-center justify-center">
            <div class="h-full w-full bg-gray-100 rounded-lg shadow-lg p-8">
                <!-- Left column container with background-->
                <div class="flex h-full flex-wrap items-center justify-center lg:justify-between">
                    <div class="shrink-1 mb-12 grow-0 basis-auto md:mb-0 md:w-9/12 md:shrink-0 lg:w-6/12 xl:w-6/12">
                        <img src="https://tecdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp" class="w-full rounded-lg" alt="Sample image" />
                    </div>
                    <x-slot name="logo">
                        <a href="/">
                            <img src="{{asset('images/logo.png')}}" width='400px' class="rounded-lg">
                        </a>
                    </x-slot>

                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />

                    <form method="POST" action="{{ route('register') }}" class="w-full">
                        @csrf

                        <!-- Name -->
                        <div class="mt-4">
                            <x-label for="name" :value="__('Name')" />

                            <x-input id="name" class="block mt-1 w-full rounded-md shadow-sm" type="text" name="name" :value="old('name')" required autofocus />
                        </div>

                        <!-- Email Address -->
                        <div class="mt-4">
                            <x-label for="email" :value="__('Email')" />

                            <x-input id="email" class="block mt-1 w-full rounded-md shadow-sm" type="email" name="email" :value="old('email')" required />
                        </div>

                        <!-- Password -->
                        <div class="mt-4">
                            <x-label for="password" :value="__('Password')" />

                            <x-input id="password" class="block mt-1 w-full rounded-md shadow-sm"
                                    type="password"
                                    name="password"
                                    required autocomplete="new-password" />
                        </div>

                        <!-- Confirm Password -->
                        <div class="mt-4">
                            <x-label for="password_confirmation" :value="__('Confirm Password')" />

                            <x-input id="password_confirmation" class="block mt-1 w-full rounded-md shadow-sm"
                                    type="password"
                                    name="password_confirmation" required />
                        </div>

                        <div class="flex items-center justify-between mt-6">
                            <a class="text-sm text-gray-1000 hover:text-gray-2000" href="{{ route('login') }}">
                                {{ __('Already registered?') }}
                            </a>

                            <x-button class="ml-4 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                {{ __('Register') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </x-auth-card>
</x-guest-layout>
