<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Employees') }}
        </h2>

        <form method="POST" action="/employees">
            @csrf

            <!-- First Name -->
            <div>
                <x-input-label for="firstname" :value="__('Firstname')" />
                <x-text-input id="firstname" class="block mt-1 w-full" type="firstname" name="firstname" :value="old('firstname')" required autofocus autocomplete="firstname" />
                <x-input-error :messages="$errors->get('firstname')" class="mt-2" />
            </div>

            <!-- last Name -->
            <div>
                <x-input-label for="Lastname" :value="__('Lastname')" />
                <x-text-input id="lastname" class="block mt-1 w-full" type="lastname" name="lastname" :value="old('lastname')" required autofocus autocomplete="lastname" />
                <x-input-error :messages="$errors->get('lastname')" class="mt-2" />
            </div>

            <!-- Company -->
            <div>
                <x-input-label for="company" :value="__('Company')" />

                <select name="company" id="company-drop">
                    @php
                        $companies = \App\Models\Company::all();
                    @endphp

                    @foreach ($companies as $company)
                        <option value="{{ $company->id }}">{{ ucwords($company->name) }}</option>
                    @endforeach

                </select>

                <x-input-error :messages="$errors->get('company')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" autofocus autocomplete="email" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Phone -->
            <div>
                <x-input-label for="phone" :value="__('Phone')" />
                <x-text-input id="phone" class="block mt-1 w-full" type="phone" name="phone" :value="old('phone')" autofocus />
                <x-input-error :messages="$errors->get('phone')" class="mt-2" />
            </div>

            <x-primary-button class="ms-3">
                {{ __('Add Employee') }}
            </x-primary-button>


        </form>
    </x-slot>
</x-app-layout>
