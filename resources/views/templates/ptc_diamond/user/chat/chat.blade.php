@extends($activeTemplate . 'layouts.master')
@section('content')
    <div id="conversation">
        <div class="message-container user">
            <div class="icon">
                <i class="fa fa-user"></i>
            </div>
            <div class="message"></div>
        </div>
        <div class="message-container chatbot">
            <div class="icon">
                <i class="fa fa-robot"></i>
            </div>
            <div class="message"></div>
        </div>
    </div>
    <div id="input-container">
        <input type="text" id="user-input">
        <button id="send-button">Send</button>
    </div>
@endsection
@push('style')
    <style>
        #conversation {
            display: flex;
            flex-direction: column;
        }

        .message-container {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
            padding: 10px;
            max-width: 70%;
        }

        .user .message {
            background-color: #DCF8C6;
            color: #000;
        }

        .chatbot .message {
            background-color: #F8C6D3;
            color: #000;
        }

        .icon {
            margin-right: 10px;
        }

        #input-container {
            display: flex;
            align-items: center;
        }

        #input-container input[type="text"] {
            flex: 1;
            margin-right: 10px;
        }
    </style>
@endpush
@push('script')
    <script>
        const conversation = document.getElementById('conversation');
        const userInput = document.getElementById('user-input');
        const sendButton = document.getElementById('send-button');

        // Function to add a message to the conversation
        function addMessage(message, sender) {
            const messageContainer = document.createElement('div');
            messageContainer.classList.add('message-container', sender);

            const icon = document.createElement('div');
            icon.classList.add('icon');
            icon.innerHTML = sender === 'user' ? '<i class="fa fa-user"></i>' : '<i class="fa fa-robot"></i>';

            const messageDiv = document.createElement('div');
            messageDiv.classList.add('message');
            messageDiv.innerText = message;

            messageContainer.appendChild(icon);
            messageContainer.appendChild(messageDiv);

            conversation.appendChild(messageContainer);
        }

        // Function to send user input to ChatGPT API and get a response
        async function getChatbotResponse(input) {
            const response = await fetch('http://localhost/ai/writer/chatbot', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    input
                })
            });

            const data = await response.json();

            return data.response;
        }

        // Event listener for send button click
        sendButton.addEventListener('click', async () => {
            const input = userInput.value.trim();

            if (input) {
                addMessage(input, 'user');

                const response = await getChatbotResponse(input);

                addMessage(response, 'chatbot');

                userInput.value = '';
                userInput.focus();
            }
        });

        // Event listener for enter key press in user input field
        userInput.addEventListener('keydown', async (event) => {
            if (event.key === 'Enter') {
                const input = userInput.value.trim();

                if (input) {
                    addMessage(input, 'user');

                    const response = await getChatbotResponse(input);

                    addMessage(response, 'chatbot');

                    userInput.value = '';
                    userInput.focus();
                }
            }
        });
    </script>
@endpush
