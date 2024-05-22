<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Webcam Capture</title>
    @vite('resources/css/app.css')
</head>
<body class="flex flex-col justify-center align-middle">
        <div class="text-center font-bold mt-10 text-4xl mb-4">AIBLE</div>
        <video id="videoElement" autoplay class="h-96"></video>
        <canvas id="canvas" class="border-s-amber-500" style="display:none;"></canvas>
        <div class="flex flex-row">
            <h1 class="mx-24 font-bold text-3xl">Subtitles : </h1>
            <p id="label" class="text-9xl font-bold "></p>
        </div>
        <div class="flex flex-row">
            <h1 class="mx-24 font-bold text-3xl mt-10">CF Level : </h1>
            <p id="confidence"></p>
        </div>
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
