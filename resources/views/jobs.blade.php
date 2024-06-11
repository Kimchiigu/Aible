@extends('layouts.main_layout')

@section('container')
<style>
    .gsc-search-button{
        border-radius: 20px;
    }

    .gs-webResult{
        /* width: 50%; */
    }

    .gsc-result{
        width: 30%;
    }

    .gsc-webResult{
        /* width: 50%; */
    }

    .gsc-expansionArea{
        display: flex;
        flex-direction: row;
        flex-wrap: wrap;
        justify-content: space-between;
        width: 100%;
    }
    .gsc-webResult {
            border: 1px solid #e5e7eb; /* border-gray-200 */
            padding: 16px;
            border-radius: 0.5rem; /* rounded-lg */
            margin-top: 16px;
        }

        .gs-title a {
            font-size: 1rem; /* text-base */
            font-weight: 600;
            text-decoration: none;
        }

        .gs-title a:hover {
            text-decoration: underline;
            color: #3b82f6; /* text-blue-500 */
        }

        .gs-visibleUrl-short,
        .gs-visibleUrl-long {
            font-size: 0.875rem; /* text-sm */
            color: #6b7280; /* text-gray-500 */
            margin-top: 4px;
            word-break: break-all;
        }

        .gs-snippet {
            margin-top: 8px;
            color: #6b7280; /* text-gray-500 */
        }
        .gsc-result-info{
            display: none;
        }
        .gsc-orderby{
            display: none;
        }
        .gcsc-find-more-on-google{
            display: none;
        }
        .gsc-cursor-box{
            display: none;
        }
        .gs-snippet{
            color: #6b7280;
        }
</style>
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
    <h3 class="text-2xl font-semibold text-gray-800 capitalize lg:text-3xl" style="margin-left: 15px">Search other jobs</h3>
    <hr style="margin-left:15px">
    <script async src="https://cse.google.com/cse.js?cx=24bf15874667c42f2">
    </script>
    <div class="gcse-search"></div>
</section>
@endsection
