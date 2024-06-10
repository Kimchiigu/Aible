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
    <section class="bg-black">
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
    </section>
@endsection

