@extends('layouts.main_layout')

@section('container')
<section class="bg-white">
    <div class="container px-6 py-10 mx-auto">
        <div class="flex items-center justify-between">
            <h1 class="text-2xl font-semibold text-gray-800 capitalize lg:text-3xl">Available Jobs</h1>

            <button class="focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-600 transition-colors duration-300 transform hover:text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </button>
        </div>

        <hr class="my-8 border-gray-200">

        <div class="grid grid-cols-1 gap-8 md:grid-cols-2 xl:grid-cols-3">
            <div>
                <img class="object-cover object-center w-full h-64 rounded-lg lg:h-80" src="{{ asset('assets/images/imgnotfound.jpg') }}" alt="">

                <div class="mt-8">
                    <span class="text-blue-500 uppercase">Environment</span>

                    <h1 class="mt-4 text-xl font-semibold text-gray-800">
                        Proper Ways to Clean Beaches
                    </h1>

                    <p class="mt-2 text-gray-500">
                        How to clean the beach correctly and effectively. Starting from waste sorting, relevant tools, and team coordination.
                    </p>

                    <div class="flex items-center justify-between mt-4">
                        <div>
                            <a href="#" class="text-lg font-medium text-gray-700 hover:underline hover:text-gray-500">
                                Aurelia Puspita, Marketing Lead
                            </a>

                            <p class="text-sm text-gray-500">May 22, 2024</p>
                        </div>

                        <a href="/training/detail" class="inline-block text-blue-500 underline hover:text-blue-400">Read more</a>
                    </div>

                </div>
            </div>

            <div>
                <img class="object-cover object-center w-full h-64 rounded-lg lg:h-80" src="{{ asset('assets/images/imgnotfound.jpg') }}" alt="">

                <div class="mt-8">
                    <span class="text-blue-500 uppercase">Technology</span>

                    <h1 class="mt-4 text-xl font-semibold text-gray-800">
                        Getting Started with OceanPals</h1>

                    <p class="mt-2 text-gray-500">
                        How to use this application “OceanPals” to find volunteer activities that are suitable for you and maximize community contribution
                    </p>

                    <div class="flex items-center justify-between mt-4">
                        <div>
                            <a href="#" class="text-lg font-medium text-gray-700 hover:underline hover:text-gray-500">
                                Christopher H.G, IT Team
                            </a>

                            <p class="text-sm text-gray-500">April 30, 2024</p>
                        </div>

                        <a href="/training/detail" class="inline-block text-blue-500 underline hover:text-blue-400">Read more</a>
                    </div>

                </div>
            </div>

            <div>
                <img class="object-cover object-center w-full h-64 rounded-lg lg:h-80" src="{{ asset('assets/images/imgnotfound.jpg') }}" alt="">

                <div class="mt-8">
                    <span class="text-blue-500 uppercase">Environment</span>

                    <h1 class="mt-4 text-xl font-semibold text-gray-800">
                        Systems of Garbage Sorting
                    </h1>

                    <p class="mt-2 text-gray-500">
                        In-depth understanding of waste sorting systems, starting from organic, inorganic and many other waste categories.
                    </p>

                    <div class="flex items-center justify-between mt-4">
                        <div>
                            <a href="#" class="text-lg font-medium text-gray-700 hover:underline hover:text-gray-500">
                                Stanic Dylan, EO
                            </a>

                            <p class="text-sm text-gray-500">April 19, 2024</p>
                        </div>

                        <a href="/training/detail" class="inline-block text-blue-500 underline hover:text-blue-400">Read more</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
