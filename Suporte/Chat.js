document.addEventListener('DOMContentLoaded', () => { // Adiciona um evento que será executado quando o DOM estiver completamente carregado

    var chatboxToggle = document.getElementById('chatbot-toggle');
    // será usado para abrir/fechar o chatbox

    var chatbox = document.getElementById('chatbox');
    // Obtém o elemento com o ID 'chatbox', que é o contêiner do chatbox

    var chatMessages = document.getElementById('chat-messages');
    // onde as mensagens do chat serão exibidas

    var chatInput = document.getElementById('chat-input');
    // Obtém o elemento com o ID 'chat-input', que é o campo de entrada de texto para o usuário

    var chatSend = document.getElementById('chat-send');
    // Obtém o elemento com o ID 'chat-send', que é o botão de enviar mensagem

    var initialMessages = ["Bem-vindo ao nosso suporte! Em que posso ajudar?"];
    // Define uma lista de mensagens iniciais que serão exibidas quando o chatbox for aberto

    chatboxToggle.onclick = function() {
        // Adiciona um evento de clique ao botão de toggle do chatbox

        if (chatbox.classList.contains('active')) {
            // Verifica se o chatbox está ativo

            chatbox.classList.remove('active');
            // Remove a classe 'active' do chatbox, escondendo-o

            chatMessages.innerHTML = ''; 
            // Limpa as mensagens ao fechar o chatbox
        } else {
            // Se o chatbox não está ativo

            chatbox.classList.add('active');
            // Adiciona a classe 'active' ao chatbox, mostrando-o

            displayInitialMessages();
            // Exibe as mensagens iniciais
        }
    };

    function sendMessage() {
        // Função para enviar uma mensagem

        var message = chatInput.value.trim();
        // Obtém o valor do campo de entrada e remove espaços em branco no início e no fim

        if (message !== '') {
            // Verifica se a mensagem não está vazia

            addMessage(message, false); 
            // Adiciona a mensagem do usuário ao chat

            //parametro chat aqui
            // Aqui você pode adicionar lógica para processar ou enviar a mensagem do usuário
        }
    }

    chatSend.onclick = sendMessage;
    // Adiciona um evento de clique ao botão de enviar para chamar a função sendMessage

    chatInput.addEventListener('keypress', function(event) {
        // Adiciona um evento de pressionar tecla ao campo de entrada de texto

        if (event.key === 'Enter') {
            // Verifica se a tecla pressionada é Enter

            event.preventDefault(); 
            // Evita a submissão do formulário

            sendMessage();
            // Chama a função sendMessage
        }
    });

    function displayInitialMessages() {
        // Função para exibir as mensagens iniciais

        initialMessages.forEach(function(message) {
            // Para cada mensagem na lista de mensagens iniciais

            addMessage(message, true);
            // Adiciona a mensagem ao chat como uma mensagem do robô
        });
    }

    function addMessage(message, isRobot) {// Função para adicionar uma mensagem ao chat

        var messageElement = document.createElement('p');// Cria um novo elemento <p> para a mensagem
        messageElement.textContent = message;// Define o conteúdo de texto do elemento como a mensagem

        if (isRobot) {// Se a mensagem é do robô

            messageElement.classList.add('robot-message');// Adiciona a classe 'robot-message' ao elemento
        } else {// Se a mensagem é do usuário

            messageElement.classList.add('user-message');// Adiciona a classe 'user-message' ao elemento
        }

        chatMessages.appendChild(messageElement);// Adiciona o elemento de mensagem ao contêiner de mensagens do chat
    }
});
