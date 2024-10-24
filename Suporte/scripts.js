
document.addEventListener('DOMContentLoaded', function() {
    
    const faqItems = document.querySelectorAll('.faq-item');// Obtém todos os itens de FAQ com a classe 'faq-item'
    faqItems.forEach(item => {// Para cada item de FAQ
        const question = item.querySelector('.faq-question');// Obtém o elemento da pergunta dentro do item
        question.addEventListener('click', () => {// Adiciona um evento de clique à pergunta

            const answer = item.querySelector('.faq-answer');// Obtém o elemento da resposta dentro do item
            const isVisible = answer.style.display === 'block';
            // Verifica se a resposta está visível
            answer.style.display = isVisible ? 'none' : 'block';
            // Alterna a visibilidade da resposta entre 'block' (visível) e 'none' (invisível)
        });
    });

    const contactForm = document.getElementById('contact-form');// Obtém o formulário de contato pelo ID 'contact-form'
    const responseMessage = document.getElementById('response-message');// Obtém a mensagem de resposta pelo ID 'response-message'

    contactForm.addEventListener('submit', function(event) {
        // Adiciona um evento de envio ao formulário de contato

        event.preventDefault();
        // Impede o envio real do formulário

        responseMessage.classList.remove('hidden');
        // Remove a classe 'hidden' da mensagem de resposta, exibindo-a na página
    });
});
