<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight mb-10">
            {{ __('Edit Employee') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <form class="mt-10px" method="POST" action="/employees/{{ $employee->id }}">
            @csrf
            @method("PATCH")

            <!-- First Name -->
            <div>
                <x-input-label for="firstname" :value="__('Firstname')" />
                <x-text-input id="firstname" class="block mt-1 w-full" type="text" name="firstname" :value="old('firstname', $employee->firstname)" required autofocus autocomplete="firstname" />
                <x-input-error :messages="$errors->get('firstname')" class="mt-2" />
            </div>

            <!-- last Name -->
            <div>
                <x-input-label for="lastname" :value="__('Lastname')" />
                <x-text-input id="lastname" class="block mt-1 w-full" type="text" name="lastname" :value="old('lastname',  $employee->lastname)" required autofocus autocomplete="lastname" />
                <x-input-error :messages="$errors->get('lastname')" class="mt-2" />
            </div>

            <!-- Company -->
            <div>
                <x-input-label for="company" :value="__('Company',)" />

                <select name="company" id="company-drop" >
                    @php
                        $companies = \App\Models\Company::all();
                    @endphp
                    @foreach ($companies as $company)
                        <option value="{{ $company->id}}" {{ old('company', $employee->company ?? '') == $company->id ? 'selected' : '' }}>{{ ucwords($company->name) }}</option>
                    @endforeach

                </select>

                <x-input-error :messages="$errors->get('company')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $employee->email)" autofocus autocomplete="email" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Phone -->
            <div>
                <x-input-label for="phone" :value="__('Phone')" />
                <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone', $employee->phone)" autofocus />
                <x-input-error :messages="$errors->get('phone')" class="mt-2" />
            </div>

            <x-primary-button class="mt-10">
                {{ __('update Employee') }}
            </x-primary-button>


        </form>
    </div>

</x-app-layout>
