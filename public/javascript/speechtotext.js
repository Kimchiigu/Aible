// Check if the browser supports the Web Speech API
if (!('webkitSpeechRecognition' in window)) {
    alert("Your browser does not support the Web Speech API");
} else {
    // Create a new instance of SpeechRecognition
    const recognition = new webkitSpeechRecognition();

    // Set the recognition to continue listening
    recognition.continuous = true;
    recognition.interimResults = false;
    recognition.lang = 'en-US';

    // Get references to the DOM elements
    const startButton = document.getElementById('startButton');
    const stopButton = document.getElementById('stopButton');
    const transcriptDiv = document.getElementById('transcript');

    // Function to start speech recognition
    startButton.addEventListener('click', () => {
        recognition.start();
    });

    // Function to stop speech recognition
    stopButton.addEventListener('click', () => {
        recognition.stop();
    });

    // Event handler for when a speech result is returned
    recognition.onresult = (event) => {
        // Get the transcribed text
        const transcript = event.results[event.resultIndex][0].transcript;
        console.log(transcript);

        // Create a new div for the new transcript line
        const newTranscriptDiv = document.createElement('div');
        newTranscriptDiv.textContent = transcript;
        newTranscriptDiv.className = 'transcript-line';

        // Insert the new transcript line after transcriptDiv
        // Append the new transcript line after the last element
        transcriptDiv.appendChild(newTranscriptDiv);

        // Set a timeout to clear the new transcript line after 5 seconds
        setTimeout(() => {
            transcriptDiv.removeChild(newTranscriptDiv);
        }, 5000);
    };



    // Event handler for any errors
    recognition.onerror = (event) => {
        console.error('Speech recognition error:', event.error);
    };

    // Event handler for when speech recognition ends
    recognition.onend = () => {
        console.log('Speech recognition ended');
    };
}
