{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resume</title> --}}
@extends('layouts/main_layout')
@section('container')
    <style>
    /* body {
        font-family: Arial, sans-serif;
        line-height: 1.6;
        color: #333;
        margin: 0;
        padding: 0;
    } */

    #container {
        max-width: 800px;
        margin: 0 auto;
        padding: 20px;
        display: none;
    }

    header {
        text-align: center;
        border-bottom: 4px solid #000;
        margin-bottom: 20px;
    }

    #name {
        font-size: 32px;
        font-weight: bold;
        color: #27ae60; /* Light green color */
    }

    #contact {
        font-size: 14px;
        color: #333;
    }

    #summary, #work-history, #skills, #education {
        margin-bottom: 20px;
    }

    #error-msg{
        color: red;
    }

    h2 {
        font-size: 20px;
        border-bottom: 2px solid #27ae60;
        padding-bottom: 5px;
        margin-bottom: 10px;
    }

    #job {
        margin-bottom: 15px;
    }

    #job h3 {
        font-size: 18px;
        color: #000;
    }

    #job p {
        margin: 5px 0;
        color: #666;
    }

    #skills p, #education p {
        margin: 5px 0;
    }

    form h2 {
        margin-top: 20px;
    }

    label {
        display: block;
        margin: 10px 0 5px;
    }

    input[type="text"], textarea {
        width: 100%;
        padding: 8px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    input[type="submit"] {
        background-color: #27ae60;
        color: #fff;
        padding: 10px 15px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    input[type="submit"]:hover {
        background-color: #2ecc71;
    }
</style>
{{-- </head>
<body> --}}
    <div id="container">
        <header>
            <h1 id="name-text" class="text-2xl">
            </h1>
            <p id="contact-text">
            </p>
        </header>

        <section id="summary" class="mb-10">
            <h2>Professional Summary</h2>
            <p id="summary-text" class="">
            </p>
        </section>

        <section id="work-history">
            <h2>Work History</h2>
            <p id="work-history-text"></p>
        </section>

        <section id="skills">
            <h2>Skills</h2>
            <p id="skills-text">
            </p>
        </section>

        <section id="education">
            <h2>Education</h2>
            <p id="education-text"></p>
        </section>
        <div id="error-msg"></div>
    </div>
    <label for="input">Input your story here: </label>
    <textarea name="story" id="story"></textarea>
    <div class="flex flex-row gap-3">
        <button id="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Generate CV</button>
        <button type="button" class="focus:outline-none text-white bg-yellow-500 hover:bg-yellow-600 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:focus:ring-yellow-900" onclick="startSpeechRecognition()">Start Speaking</button>
        <button id="download-button" class="focus:outline-none text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900">Download CV</button>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>
    <script src="{{ asset('javascript/cvmaker.js') }}"></script>

    <script>
        const cvcontainer = document.getElementById('container')

        function startSpeechRecognition() {
            if ('webkitSpeechRecognition' in window) {
                const recognition = new webkitSpeechRecognition();
                recognition.lang = 'en-US';
                recognition.continuous = false;
                recognition.interimResults = false;

                recognition.onstart = function() {
                    console.log('Speech recognition started');
                };

                recognition.onresult = function(event) {
                    const transcript = event.results[0][0].transcript;
                    document.getElementById('story').value += transcript + ' ';
                };

                recognition.onerror = function(event) {
                    console.error('Speech recognition error', event);
                };

                recognition.onend = function() {
                    console.log('Speech recognition ended');
                };

                recognition.start();
            } else {
                alert('Speech recognition not supported in this browser. Please use Chrome or another supported browser.');
            }
        }

        document.getElementById('download-button').addEventListener('click', () => {
            const element = document.getElementById('container');
            html2pdf().from(element).save();
        });
    </script>
{{-- </body>
</html> --}}
@endsection
