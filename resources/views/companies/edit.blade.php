<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Company') }}
        </h2>

        <div class="py-12">
            <form method="POST" action="/companies/{{ $company->id }}" enctype="multipart/form-data">
                @csrf
                @method("PATCH")

                <!-- Name -->
                <div>
                    <x-input-label for="name" :value="__('Name')" />
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name', $company->name)" required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <!-- Email Address -->
                <div>
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $company->email)" autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Logo -->
                <div>
                    <x-input-label for="logo" :value="__('Logo')" />
                    <x-text-input id="logo" class="block mt-1 w-full" type="file" name="logo" :value="old('logo', $company->logo)" autofocus />
                    <x-input-error :messages="$errors->get('logo')" class="mt-2" />

                    <img src="{{ asset('storage/' . $company->logo) }}" alt="" class="rounded-xl ml-6" width="100">

                </div>

                <!-- Website -->
                <div>
                    <x-input-label for="website" :value="__('Website')" />
                    <x-text-input id="website" class="block mt-1 w-full" type="text" name="website" :value="old('website', $company->website)" autofocus />
                    <x-input-error :messages="$errors->get('website')" class="mt-2" />
                </div>

                <x-primary-button>
                    {{ __('Update Company') }}
                </x-primary-button>


            </form>
        </div>
    </x-slot>
</x-app-layout>
