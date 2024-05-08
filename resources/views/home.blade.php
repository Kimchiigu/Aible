@extends('layouts.main_layout')

@section('container')
    <div class="py-16 bg-white">
        <div  class="container m-auto px-6 space-y-8 text-gray-500 md:px-12 lg:px-20">
            <div class="justify-center text-center gap-6 md:text-left md:flex lg:items-center  lg:gap-16">
                <div class="order-last mb-6 space-y-6 md:mb-0 md:w-6/12 lg:w-6/12">
                    <h1 class="text-4xl text-gray-700 font-bold md:text-4xl">Equal <span class="text-blue-500">Lives</span></h1>
                    <h1 class="text-4xl text-gray-700 font-bold md:text-4xl">Equal <span class="text-blue-500">Experience</span></h1>

                    <p class="text-xl text-black">Welcome to AI.BLE, designed to facilitate comfortable communication for individuals facing speech or hearing difficulties. Interact seamlessly, especially during interviews, ensuring equal experiences for all.</p>

                </div>
                <div class="grid grid-cols-5 grid-rows-4 gap-4 md:w-5/12 lg:w-6/12">
                    <div class="col-span-2 row-span-4">
                        <img src="https://tailus.io/sources/blocks/ecommerce-site/preview/images/products/kushagra.webp" class="rounded-full" width="640" height="960" alt="shoes" loading="lazy">
                    </div>
                    <div class="col-span-2 row-span-2">
                        <img src="https://tailus.io/sources/blocks/ecommerce-site/preview/images/products/iman.webp" class="w-full h-full object-cover object-top rounded-xl" width="640" height="640" alt="shoe" loading="lazy">
                    </div>
                    <div class="col-span-3 row-span-3">
                        <img src="https://tailus.io/sources/blocks/ecommerce-site/preview/images/products/daniel.webp" class="w-full h-full object-cover object-top rounded-xl" width="640" height="427" alt="shoes" loading="lazy">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="py-16 overflow-hidden">
        <div class="container m-auto px-6 space-y-8 text-gray-500 md:px-12">
            <div>
                <span class="text-gray-600 text-lg font-semibold">Main features</span>
                <h2 class="mt-4 text-2xl text-gray-900 font-bold md:text-4xl">Why AIBLE?
            </div>
            <div class="mt-16 grid border divide-x divide-y rounded-xl overflow-hidden sm:grid-cols-2 lg:divide-y-0 lg:grid-cols-3 xl:grid-cols-4">
                <div class="relative group bg-white transition hover:z-[1] hover:shadow-2xl">
                    <div class="relative p-8 space-y-8">
                        <img src="https://tailus.io/sources/blocks/stacked/preview/images/avatars/burger.png" class="w-10" width="512" height="512" alt="burger illustration">

                        <div class="space-y-2">
                            <h5 class="text-2xl text-gray-800 font-medium transition group-hover:text-yellow-600">Gesture Recognition with Live Translation</h5>
                            <p class="text-lg text-gray-600">Utilize computer vision technology to recognize sign language gestures from individuals with disabilities. Real-time translation of sign language into subtitles enables seamless communication with hearing individuals.</p>
                        </div>
                        <a href="#" class="flex justify-between items-center group-hover:text-yellow-600">
                            <span class="text-sm">Read more</span>
                            <span class="-translate-x-4 opacity-0 text-2xl transition duration-300 group-hover:opacity-100 group-hover:translate-x-0">&RightArrow;</span>
                        </a>
                    </div>
                </div>
                <div class="relative group bg-white transition hover:z-[1] hover:shadow-2xl">
                    <div class="relative p-8 space-y-8">
                        <img src="https://tailus.io/sources/blocks/stacked/preview/images/avatars/trowel.png" class="w-10" width="512" height="512" alt="burger illustration">

                        <div class="space-y-2">
                            <h5 class="text-2xl text-gray-800 font-medium transition group-hover:text-yellow-600">Live Voice-to-Text Communication</h5>
                            <p class="text-lg text-gray-600">Enable real-time communication between individuals with hearing disabilities and hearing individuals through voice-to-text transcription.</p>
                        </div>
                        <a href="#" class="flex justify-between items-center group-hover:text-yellow-600">
                            <span class="text-sm">Read more</span>
                            <span class="-translate-x-4 opacity-0 text-2xl transition duration-300 group-hover:opacity-100 group-hover:translate-x-0">&RightArrow;</span>
                        </a>
                    </div>
                </div>
                <div class="relative group bg-white transition hover:z-[1] hover:shadow-2xl">
                    <div class="relative p-8 space-y-8">
                        <img src="https://tailus.io/sources/blocks/stacked/preview/images/avatars/package-delivery.png" class="w-10" width="512" height="512" alt="burger illustration">

                        <div class="space-y-2">
                            <h5 class="text-2xl text-gray-800 font-medium transition group-hover:text-yellow-600">Interview Tips and Tricks</h5>
                            <p class="text-lg text-gray-600">Access valuable tips and tricks to enhance interview performance, tailored for individuals with disabilities.</p>
                        </div>
                        <a href="#" class="flex justify-between items-center group-hover:text-yellow-600">
                            <span class="text-sm">Read more</span>
                            <span class="-translate-x-4 opacity-0 text-2xl transition duration-300 group-hover:opacity-100 group-hover:translate-x-0">&RightArrow;</span>
                        </a>
                    </div>
                </div>
                <div class="relative group bg-white transition hover:z-[1] hover:shadow-2xl">
                    <div class="relative p-8 space-y-8">
                        <img src="https://tailus.io/sources/blocks/stacked/preview/images/avatars/trowel.png" class="w-10" width="512" height="512" alt="burger illustration">

                        <div class="space-y-2">
                            <h5 class="text-2xl text-gray-800 font-medium transition group-hover:text-yellow-600">Disability Job Search Center</h5>
                            <p class="text-lg text-gray-600">Explore our dedicated job search center, designed to assist individuals with disabilities in finding employment opportunities tailored to their needs and skills.</p>
                        </div>
                        <a href="#" class="flex justify-between items-center group-hover:text-yellow-600">
                            <span class="text-sm">Read more</span>
                            <span class="-translate-x-4 opacity-0 text-2xl transition duration-300 group-hover:opacity-100 group-hover:translate-x-0">&RightArrow;</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
