<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-3xl text-gray-800 dark:text-gray-200 leading-tight mb-2">
            {{ __('Employees') }}
        </h2>
        {{-- <x-nav-link :href="route('companies/create')" :active="request()->routeIs('companies/create')">{{ __('Add New Company') }}</x-nav-link> --}}
        {{-- <a :href="route('/companies/create')">Add new</a> --}}
        <x-responsive-nav-link :href="route('employees.create')" class="mb-2">Add new Employee</x-responsive-nav-link>
    </x-slot>

    <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8 mb-3 ">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="w-full divide-y divide-gray-200">
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($employees as $employee)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class=" font-medium text-gray-900 ">
                                                <a href="/employees/{{ $employee->id }}" class="!text-sm sm:text-lg hover:text-gray-500">
                                                    {{ $employee->firstname . " " .  $employee->lastname }}
                                                </a>
                                            </div>
                                        </div>
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap text-right  font-medium">
                                        <a href="/employees/{{ $employee->id }}/edit" class="text-base text-blue-500 hover:text-blue-800">Edit</a>
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap text-right text-base font-medium ">
                                        <form method="POST" action="/employees/{{ $employee->id }}">
                                            @csrf
                                            @method('DELETE')

                                            <button class="text-base text-gray-400 hover:text-gray-800">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        {{ $employees->links() }}
    </div>

</x-app-layout>
