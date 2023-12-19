<x-app-layout>
    <section class="px-6 py-8">
        <main class="max-w-6xl mx-auto mt-10 lg:mt-20 space-y-6">
            <article class="max-w-4xl mx-auto lg:grid lg:grid-cols-12 gap-x-10">

                <div class="col-span-8">
                    <h1>here</h1>
                    <h1 class="font-bold text-3xl lg:text-4xl mb-10">
                        {{ $employee->firstname }}
                    </h1>
                    <h1 class="font-bold text-3xl lg:text-4xl mb-10">
                        {{ $employee->lastname }}
                    </h1>

                    <div class="space-y-4 lg:text-lg leading-loose">
                        <a href="/companies/{{ $employee->company }}">
                            {{ $employee->company }}
                        </a>
                    </div>

                    <div class="space-y-4 lg:text-lg leading-loose">
                        {{ $employee->email }}
                    </div>

                    <div class="space-y-4 lg:text-lg leading-loose">
                        {{ $employee->phone }}
                    </div>
                </div>
            </article>
        </main>
    </section>
</x-app-layout>
