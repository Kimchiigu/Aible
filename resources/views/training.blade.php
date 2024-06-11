@extends('layouts.main_layout')

@section('container')
<style>
    /* CSS for positioning the chat container */
    #chat-box {
        position: fixed;
        bottom: 20px; /* Distance from the bottom */
        right: 20px;  /* Distance from the right */
        width: 300px; /* Set the desired width */
        max-height: 400px; /* Maximum height */
        overflow-y: auto; /* Enable vertical scrolling */
        background-color: white; /* Background color */
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Box shadow */
        border-radius: 10px; /* Rounded corners */
    }

    /* Style for other elements */
    .chat-header {
        background-color: #2d3748;
        color: white;
        padding: 10px;
        display: flex;
        align-items: center;
    }

    .chat-content {
        padding: 10px;
    }

    .chat-footer {
        background-color: #e2e8f0;
        padding: 10px;
        display: flex;
    }

    .chat-footer input {
        flex-grow: 1;
        padding: 5px;
        border: 1px solid #cbd5e0;
        border-radius: 5px;
    }

    .chat-footer button {
        margin-left: 5px;
        padding: 5px 10px;
        background-color: #4299e1;
        color: white;
        border: none;
        border-radius: 5px;
    }
</style>
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
                                    Information Technology
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
    <div id="chat-box">
        <div class="chat-header">
            <img src="{{ asset('assets/images/chatbot2.png') }}" class="rounded-full mr-3" alt="Profile" style="width: 40px;margin-right:5px">
            <div>
                <div class="font-bold">AIBLE BOT</div>
            </div>
        </div>
        <div id="chat-container" class="chat-content">
            <!-- Chat messages will go here -->
        </div>
        <div class="chat-footer">
            <input id="message-input" type="text" placeholder="Type a message">
            <button id="send-btn">SEND</button>
        </div>
    </div>

<script src="{{ asset('javascript/chatbot.js') }}"></script>
@endsection

