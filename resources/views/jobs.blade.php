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
                <img class="object-cover object-center w-full h-64 rounded-lg lg:h-80" src="{{ asset('assets/images/softwaredev.jpg') }}" alt="">

                <div class="mt-8">
                    <span class="text-blue-500 uppercase">Information Technology</span>

                    <h1 class="mt-4 text-xl font-semibold text-gray-800">
                        Software Developer
                    </h1>

                    <p class="mt-2 text-gray-500">
                        Design, develop, and maintain software applications and systems. Work primarily involves coding, testing, and debugging software.
                    </p>

                    <div class="flex items-center justify-between mt-4">
                        <div>
                            <a href="#" class="text-lg font-medium text-gray-700 hover:underline hover:text-gray-500">
                                Aurelia Puspita - Microsoft
                            </a>

                            <p class="text-sm text-gray-500">May 22, 2024</p>
                        </div>

                        <a href="" class="inline-block text-blue-500 underline hover:text-blue-400">Read more</a>
                    </div>

                </div>
            </div>

            <div>
                <img class="object-cover object-center w-full h-64 rounded-lg lg:h-80" src="{{ asset('assets/images/graphicdesign.jpg') }}" alt="">

                <div class="mt-8">
                    <span class="text-blue-500 uppercase">Graphic Design</span>

                    <h1 class="mt-4 text-xl font-semibold text-gray-800">
                        Graphic Designer
                    </h1>

                    <p class="mt-2 text-gray-500">
                        Create visual concepts using computer software to communicate ideas that inspire, inform, or captivate consumers.
                    </p>

                    <div class="flex items-center justify-between mt-4">
                        <div>
                            <a href="#" class="text-lg font-medium text-gray-700 hover:underline hover:text-gray-500">
                                Christopher H.G - Adobe
                            </a>

                            <p class="text-sm text-gray-500">April 30, 2024</p>
                        </div>

                        <a href="/training/detail" class="inline-block text-blue-500 underline hover:text-blue-400">Read more</a>
                    </div>

                </div>
            </div>

            <div>
                <img class="object-cover object-center w-full h-64 rounded-lg lg:h-80" src="{{ asset('assets/images/contentwriter.jpg') }}" alt="">

                <div class="mt-8">
                    <span class="text-blue-500 uppercase">Writing and Editing</span>

                    <h1 class="mt-4 text-xl font-semibold text-gray-800">
                        Content Writer
                    </h1>

                    <p class="mt-2 text-gray-500">
                        Produce engaging, clear text for different advertising channels such as websites, print ads, and catalogs.
                    </p>

                    <div class="flex items-center justify-between mt-4">
                        <div>
                            <a href="#" class="text-lg font-medium text-gray-700 hover:underline hover:text-gray-500">
                                Stanic Dylan - BuzzFeed
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
