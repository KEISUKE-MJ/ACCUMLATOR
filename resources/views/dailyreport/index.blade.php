<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-200 leading-tight">
            test
        </h2>
    </x-slot>

    <div class="py-12">
       
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <section class="text-gray-600 body-font">
                <div class="container px-5 py-24 mx-auto">
                    <div class="flex flex-wrap -mx-4 -my-8 w-full">
                    @foreach($testE as $E)
                        <div class="py-8 px-4 bg-white w-full">
                            <div class="h-full flex items-start">
                                <div class="w-12 text-center leading-none">
                                    <span class="text-gray-500 pb-2 mb-2 border-b-2 border-gray-200">{{ $E->id}}</span>
                                </div>
                                <div class="flex-grow pl-6">
                                    <h2 class="tracking-widest text-xs title-font font-medium text-red-500 mb-1">{{ $E->participant_matsui}}</h2>
                                    <p class="leading-relaxed mb-5"> {{ $E->participant_client}}</p>
                                </div>
                            </div>
                            <div class="w-12 flex-shrink-0 flex flex-col text-center leading-none">
                                    <span class="text-gray-500 pb-2 mb-2 border-b-2 border-gray-200">{{ $E->content}}</span>
                            </div>
                        </div>
                    @endforeach
                    </div>
                </div>
            </section>
        </div>
</x-app-layout>