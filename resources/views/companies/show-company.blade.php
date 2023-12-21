<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Company') }}
        </h2>
    </x-slot>
    <section class="px-6 py-8">
        <main class="max-w-6xl mx-auto mt-10 lg:mt-20 space-y-6">
            <article class="max-w-4xl mx-auto lg:grid lg:grid-cols-12 gap-x-10">
                <div class="col-span-4 lg:text-center  mb-10">
                    <img src="{{ asset('storage/'. $company->logo) }}" alt="" class="rounded-xl">
                </div>
                <div class="col-span-8">

                    <h1 class="font-bold text-5xl lg:text-6xl mb-10 break-all">
                        {{ $company->name }}
                    </h1>

                    <div class="space-y-4 leading-loose">
                        <h2 class="!text-xl sm:text-3xl mb-6 break-all">
                            <a href="mailto:{{ $company->email }}">
                                {{ $company->email }}
                            </a>
                        </h2>
                    </div>

                    <div class="space-y-4 leading-loose">
                        <h2 class="!text-xl sm:text-3xl break-all">
                            <a href="{{ $company->website }}" target="_blank">
                                {{ $company->website }}
                            </a>
                        </h2>
                    </div>
                </div>
            </article>
        </main>
    </section>
</x-app-layout>
