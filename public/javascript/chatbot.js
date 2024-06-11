document.getElementById('send-btn').addEventListener('click', sendMessage);

document.getElementById('send-btn').addEventListener('click', function() {

  });


function sendMessage() {
    const messageInput = document.getElementById('message-input');
    const message = messageInput.value.trim();

    if (message) {
        const chatContainer = document.getElementById('chat-container');

        // User message
        const userMessage = createMessageElement(message, 'user');
        chatContainer.appendChild(userMessage);

        // Scroll to bottom
        chatContainer.scrollTop = chatContainer.scrollHeight;

        // Clear the input
        messageInput.value = '';

        // Simulate bot response
        const content = [
          { role: "system", content: "You are a chat bot that placed in Platform which give interview tips and tricks tailored for people with disabilities. This user-focused feature sets to encourage disabled users in their job searching, enhancing their confidence and performance during interviews." },
          { role: "user", content: "You need to answer the user question as simple, effective and efficient as posible. And always be polite. And don't answer anything beside the related topic" },
          { role: "user", content: message},
          ]

        fetch("http://localhost:3001/chat-bot", {
            method: "POST",
            headers: {
                "Content-Type": "application/json"
            },
            body: JSON.stringify({ content })
        })
        .then(response => response.json())
        .then(data => {
            console.log(data);
            const botMessage = createMessageElement(data);
            chatContainer.appendChild(botMessage);
        })
        .catch(error => console.error("Error:", error));
        // setTimeout(() => {
        //     const botMessage = createMessageElement('Hi there! How can I help you?', 'bot');
        //     chatContainer.appendChild(botMessage);

        //     // Scroll to bottom
        //     chatContainer.scrollTop = chatContainer.scrollHeight;
        // }, 1000);
    }
}

function createMessageElement(text, type) {
    const messageEl = document.createElement('div');
    messageEl.classList.add('p-2', 'rounded-lg', 'mb-2', 'max-w-xs', 'break-words');

    if (type === 'user') {
        messageEl.classList.add('bg-blue-500', 'text-white', 'self-end');
    } else {
        messageEl.classList.add('bg-gray-300', 'text-black', 'self-start');
    }

    messageEl.innerText = text;
    return messageEl;
}
