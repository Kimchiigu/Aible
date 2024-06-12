<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Webcam Capture</title>
    @vite('resources/css/app.css')
    <style>
        .transcript-line {
            display: inline;
        }
    </style>
</head>
<body class="bg-gray-100 flex flex-col items-center justify-center min-h-screen">
    <div class="text-center">
        <div class="text-4xl font-bold mt-0 mb-4">AIBLE</div>
        <video id="videoElement" autoplay class="h-96 w-full max-w-4xl mx-auto border-2 border-gray-300 rounded-md shadow-md"></video>
        <canvas id="canvas" class="hidden border-s-amber-500"></canvas>

        <div class="mt-8">
            <h1 class="text-3xl font-bold mb-2">Subtitles</h1>
            <p id="label" class="text-4xl font-bold text-gray-800"></p>
        </div>
        <div class="transcript">
            <button id="startButton" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mx-2">Start Listening</button>
            <button id="stopButton" class="bg-red-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mx-2">Stop Listening</button>
            <div id="transcript"></div>
        </div>
        <div class="mt-8 flex justify-center">
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mx-2">Mute</button>
            <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded mx-2">Close Video</button>
            <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mx-2">Chat</button>
            </div>
            </div>
            <script src="{{ asset('javascript/speechtotext.js') }}"></script>
    <script>
        // Function to initialize webcam feed
        function initializeWebcam() {
            navigator.mediaDevices.getUserMedia({ video: true })
                .then(function(stream) {
                    var video = document.getElementById("videoElement");
                    video.srcObject = stream;
                })
                .catch(function(err) {
                    console.log("An error occurred: " + err);
                });
        }

    async function captureAndSendFrame() {
        var video = document.getElementById("videoElement");
        var canvas = document.getElementById("canvas");
        var context = canvas.getContext("2d");

        // Set canvas dimensions to match video element
        canvas.width = video.videoWidth;
        canvas.height = video.videoHeight;

        context.drawImage(video, 0, 0, video.videoWidth, video.videoHeight); // Use video dimensions
        var imageData = canvas.toDataURL("image/jpeg");
        try {
            var response = await fetch("http://127.0.0.1:5000/process_frame", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json"
                },
                body: JSON.stringify({ image: imageData })
            });

            if (response.ok) {
                var responseData = await response.json();
                console.log(responseData);
                if(responseData!='No hand' && responseData != 'Thread in progress'){
                    document.getElementById("label").textContent = responseData[0];
                    document.getElementById("confidence").textContent = responseData[1];
                }
            } else {
                console.error("Failed to receive response from server:", response);
            }
        } catch (error) {
            console.log("Thread in progress");
        }
    }

initializeWebcam();
setInterval(captureAndSendFrame, 50);
    // window.addEventListener('beforeunload', function (e) {
    //     fetch('/cancel-python-execution', {
    //         method: 'POST',
    //     });
    // });
    </script>
</body>
</html>
