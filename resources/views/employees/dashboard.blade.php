<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Employees') }}
        </h2>
        {{-- <x-nav-link :href="route('companies/create')" :active="request()->routeIs('companies/create')">{{ __('Add New Company') }}</x-nav-link> --}}
        {{-- <a :href="route('/companies/create')">Add new</a> --}}
        <x-responsive-nav-link :href="route('employees.create')">Add new</x-responsive-nav-link>
    </x-slot>
</x-app-layout>
