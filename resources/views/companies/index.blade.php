<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight mb-2">
            {{ __('Companies') }}
        </h2>
        {{-- <x-nav-link :href="route('companies/create')" :active="request()->routeIs('companies/create')">{{ __('Add New Company') }}</x-nav-link> --}}
        {{-- <a :href="route('/companies/create')">Add new</a> --}}
        <x-responsive-nav-link :href="route('companies.create')" class="mb-2" >Add new Company</x-responsive-nav-link>

        <h2 class="mb-2">* Deleting a company will delete all employees associated with that company</h2>
    </x-slot>

    <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8 mb-3 text-lg">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="w-full divide-y divide-gray-200">
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($companies as $company)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="font-medium text-gray-900">
                                                <a href="/companies/{{ $company->id }}" class="!text-sm sm:text-lg">
                                                    {{ $company->name }}
                                                </a>
                                            </div>
                                        </div>
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap text-right text-base font-medium">
                                        <a href="/companies/{{ $company->id }}/edit" class="text-blue-500 hover:text-blue-600">Edit</a>
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <form method="POST" action="/companies/{{ $company->id }}">
                                            @csrf
                                            @method('DELETE')

                                            <button class="text-base text-gray-400">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        {{ $companies->links() }}
    </div>

</x-app-layout>
