@extends('layouts.main_layout')

@section('container')
    <section class="bg-white">
        <div class="container px-6 py-10 mx-auto">
            <div class="flex items-center justify-between">
                <h1 class="text-2xl font-semibold text-gray-800 capitalize lg:text-3xl">AIBLE Training Center</h1>

                <button class="focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-600 transition-colors duration-300 transform hover:text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </button>
            </div>

            <hr class="my-8 border-gray-200">

            <div class="grid grid-cols-1 gap-8 md:grid-cols-2 xl:grid-cols-3">
                @foreach ($materials as $material)
                <div>
                    <img class="object-cover object-center w-full h-64 rounded-lg lg:h-80" src="{{ $material->src }}" alt="">
                    <div class="mt-8">
                        <a href="/training/{{ $material->slug }}">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">{{ $material->title }}</h5>
                        </a>

                        <p class="mb-3 font-normal text-gray-700">{{ $material->excerpt }}</p>

                        <div class="flex items-center justify-between mt-4">
                            <div>
                                <a href="#" class="text-lg font-medium text-gray-700 hover:underline hover:text-gray-500">
                                    Aurelia Puspita, Marketing Lead
                                </a>

                                <p class="text-sm text-gray-500">May 22, 2024</p>
                            </div>

                            <a href="/training/{{ $material->slug }}" class="inline-flex items-center justify-center px-3 py-2 text-sm font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                                Read more
                                <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection

