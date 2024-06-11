@extends('layouts.main_layout')

@section('container')
    <section class="bg-gradient-to-tr from-teal-50 to-blue-200 py-10">
        <div class="py-16 bg-white">
            <div  class="container m-auto px-6 space-y-8 text-gray-500 md:px-12 lg:px-20">
                <div class="justify-center text-center gap-6 md:text-left md:flex lg:items-center  lg:gap-16">
                    <div class="order-last mb-6 space-y-6 md:mb-0 md:w-6/12 lg:w-6/12">
                        <div class="flex flex-col gap-5">
                            <h1 class="text-4xl text-gray-700 font-bold lg:text-5xl xl:text-6xl">Equal <span class="bg-gradient-to-r from-violet-500 to-blue-500 bg-clip-text text-transparent">Lives</span></h1>
                            <h1 class="text-4xl text-gray-700 font-bold lg:text-5xl xl:text-6xl">Equal <span class="bg-gradient-to-r from-violet-500 to-blue-500 bg-clip-text text-transparent">Experience</span></h1>
                        </div>
                        <p class="text-xl text-black">Welcome to AIBLE, designed to facilitate comfortable communication for individuals facing speech or hearing difficulties. Interact seamlessly, especially during interviews, ensuring equal experiences for all.</p>
                    </div>
                    <div class="grid grid-cols-5 grid-rows-4 gap-4 md:w-5/12 lg:w-6/12">
                        <div class="col-span-2 row-span-4">
                            <img src="{{ asset('assets/images/home2.jpg') }}" class="rounded-full" width="640" height="960" alt="shoes" loading="lazy">
                        </div>
                        <div class="col-span-2 row-span-2">
                            <img src="{{ asset('assets/images/home3.jpg') }}" class="w-full h-full object-cover object-top rounded-xl" width="640" height="640" alt="shoe" loading="lazy">
                        </div>
                        <div class="col-span-3 row-span-3">
                            <img src="{{ asset('assets/images/home1.png') }}" class="w-full h-full object-cover object-top rounded-xl" width="640" height="427" alt="shoes" loading="lazy">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="py-16 overflow-hidden">
            <div class="container m-auto px-6 space-y-8 text-gray-500 md:px-12">
                <div>
                    <span class="text-gray-600 text-lg font-semibold">Features</span>
                    <h2 class="mt-4 text-2xl text-gray-900 font-bold md:text-4xl">AIBLE Main Features</h2>
                </div>
                <div class="mt-16 grid border divide-x divide-y rounded-xl overflow-hidden sm:grid-cols-2 lg:divide-y-0 lg:grid-cols-3 xl:grid-cols-4">
                    <div class="relative group bg-white transition hover:z-[1] hover:shadow-2xl">
                        <div class="relative p-8 space-y-8">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M10.05 4.575a1.575 1.575 0 1 0-3.15 0v3m3.15-3v-1.5a1.575 1.575 0 0 1 3.15 0v1.5m-3.15 0 .075 5.925m3.075.75V4.575m0 0a1.575 1.575 0 0 1 3.15 0V15M6.9 7.575a1.575 1.575 0 1 0-3.15 0v8.175a6.75 6.75 0 0 0 6.75 6.75h2.018a5.25 5.25 0 0 0 3.712-1.538l1.732-1.732a5.25 5.25 0 0 0 1.538-3.712l.003-2.024a.668.668 0 0 1 .198-.471 1.575 1.575 0 1 0-2.228-2.228 3.818 3.818 0 0 0-1.12 2.687M6.9 7.575V12m6.27 4.318A4.49 4.49 0 0 1 16.35 15m.002 0h-.002" />
                              </svg>
                            <div class="space-y-2">
                                <h5 class="text-2xl text-gray-800 font-medium transition group-hover:text-blue-700">Gesture Recognition with Live Translation</h5>
                                <p class="text-lg text-gray-600">Utilize computer vision technology to recognize sign language gestures from individuals with disabilities. Real-time translation of sign language into subtitles enables seamless communication with hearing individuals.</p>
                            </div>
                            
                        </div>
                    </div>
                    <div class="relative group bg-white transition hover:z-[1] hover:shadow-2xl">
                        <div class="relative p-8 space-y-6">
                            <svg width="32px" height="32px" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M12 3V21M9 21H15M19 6V3H5V6" stroke="#000000" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>

                            <div class="space-y-2">
                                <h5 class="text-2xl text-gray-800 font-medium transition group-hover:text-blue-700">Live Voice-to-Text Communication</h5>
                                <p class="text-lg text-gray-600">Enable real-time communication between individuals with hearing disabilities and hearing individuals through voice-to-text transcription.</p>
                            </div>
                            
                        </div>
                    </div>
                    <div class="relative group bg-white transition hover:z-[1] hover:shadow-2xl">
                        <div class="relative p-6 space-y-4">
                            <svg fill="#666666" width="42px" height="42px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" stroke="#666666"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M15.3568437,15 C15.7646155,15.4524132 16,16.046195 16,16.6740273 L16,18.5 C16,19.8807119 14.8807119,21 13.5,21 L4.5,21 C3.11928813,21 2,19.8807119 2,18.5 L2,16.6741582 C2,16.0462625 2.23543163,15.4524277 2.64327433,15 L2.5,15 C2.22385763,15 2,14.7761424 2,14.5 C2,14.2238576 2.22385763,14 2.5,14 L4.16159469,14 L6.20372283,12.860218 C5.46099525,12.1339918 5,11.1208315 5,10 C5,7.790861 6.790861,6 9,6 C11.209139,6 13,7.790861 13,10 C13,10.0851511 12.9973393,10.1696808 12.9920965,10.2535104 L13.5294677,9.70238819 C13.1955521,9.21872477 13,8.6321992 13,8 C13,6.34314575 14.3431458,5 16,5 C17.6568542,5 19,6.34314575 19,8 C19,8.63142186 18.8049285,9.21728235 18.4717634,9.70060362 L18.4756434,9.70454496 L20.2910569,11.5687647 C20.7456276,12.0355563 21,12.6613719 21,13.3129308 L21,14 L21.5,14 C21.7761424,14 22,14.2238576 22,14.5 C22,14.7761424 21.7761424,15 21.5,15 L15.3568437,15 L15.3568437,15 Z M13.8388411,14 L20,14 L20,13.3129308 C20,12.9219955 19.8473766,12.5465061 19.5746341,12.2664311 L17.7752165,10.4186373 C17.2781336,10.7840978 16.6642801,11 16,11 C15.3364952,11 14.7232995,10.7846015 14.2265245,10.4199164 L12.4260261,12.2664886 C12.2161243,12.4817616 12.1876639,12.5119114 12.1322325,12.5816619 C12.0367817,12.7017697 12.0030449,12.7911346 12.0001997,12.9735561 L13.8388411,14 Z M13.2430272,14.8126554 L10.9146921,13.5128341 C10.3460214,13.8234492 9.6936285,14 9,14 C8.30657563,14 7.65436264,13.8235531 7.08580996,13.5131083 L3.76895585,15.3643588 C3.29420285,15.6293348 3,16.1304646 3,16.6741582 L3,18.5 C3,19.3284271 3.67157288,20 4.5,20 L13.5,20 C14.3284271,20 15,19.3284271 15,18.5 L15,16.6740273 C15,16.130386 14.7058532,15.6292958 14.2311717,15.3642991 L13.5719516,14.9962814 C13.4392535,14.9800633 13.3226161,14.9118587 13.2430272,14.8126554 L13.2430272,14.8126554 Z M9,13 C10.6568542,13 12,11.6568542 12,10 C12,8.34314575 10.6568542,7 9,7 C7.34314575,7 6,8.34314575 6,10 C6,11.6568542 7.34314575,13 9,13 Z M16,10 C17.1045695,10 18,9.1045695 18,8 C18,6.8954305 17.1045695,6 16,6 C14.8954305,6 14,6.8954305 14,8 C14,9.1045695 14.8954305,10 16,10 Z" stroke="#000000" stroke-width="0"></path> </g></svg>
                            <div class="space-y-2">
                                <h5 class="text-2xl text-gray-800 font-medium transition group-hover:text-blue-700">Interview Tips and Tricks</h5>
                                <p class="text-lg text-gray-600">Access valuable tips and tricks to enhance interview performance, tailored for individuals with disabilities.</p>
                            </div>
                            
                        </div>
                    </div>
                    <div class="relative group bg-white transition hover:z-[1] hover:shadow-2xl">
                        <div class="relative p-8 space-y-6">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                            </svg>


                            <div class="space-y-2">
                                <h5 class="text-2xl text-gray-800 font-medium transition group-hover:text-blue-700">Disability Job Search Center</h5>
                                <p class="text-lg text-gray-600">Explore our dedicated job search center, designed to assist individuals with disabilities in finding employment opportunities tailored to their needs and skills.</p>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
