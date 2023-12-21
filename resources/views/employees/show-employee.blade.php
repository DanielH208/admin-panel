<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Employee') }}
        </h2>
    </x-slot>
    <section class="px-6 py-8">
        <main class="max-w-6xl mx-auto mt-10 lg:mt-20 space-y-6">
            <article class="max-w-4xl mx-auto lg:grid lg:grid-cols-12 gap-x-10">

                <div class="col-span-8">
                    <h1 class="font-bold text-5xl lg:text-6xl mb-10 break-all">
                        {{ $employee->firstname }}
                    </h1>
                    <h1 class="font-bold text-5xl lg:text-6xl mb-10 break-all">
                        {{ $employee->lastname }}
                    </h1>

                    <div class="!text-xl sm:text-3xl mb-6 break-all leading-loose">
                        <a href="/companies/{{ $employee->company }}" class="hover:text-gray-500">
                            Company: {{ \App\Models\Employee::findCompany($employee->company) }}
                        </a>
                    </div>

                    <div class="!text-xl sm:text-3xl mb-6 break-all leading-loose space-y-4 ">
                        <a href="mailto:{{ $employee->email }}" class="hover:text-gray-500">
                            {{ $employee->email }}
                        </a>
                    </div>

                    <div class="!text-xl sm:text-3xl mb-6 break-all space-y-4 leading-loose">
                        <a href="tel:{{ $employee->phone }}" class="hover:text-gray-500">
                            {{ $employee->phone }}
                        </a>
                    </div>
                </div>
            </article>
        </main>
    </section>
</x-app-layout>
