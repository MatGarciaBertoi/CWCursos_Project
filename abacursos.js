function showDetails(courseId) {
    // Função que exibe os detalhes de um curso específico no modal

    var courses = {
        'curso1': {
            'title': 'Curso de SEO',
            'description': 'Aprenda as melhores práticas de otimização para motores de busca. Com este curso, você dominará técnicas para melhorar o posicionamento do seu site nos resultados de busca, aumentando o tráfego orgânico e alcançando mais clientes em potencial.',
            'videoLink': 'https://www.example.com/video-seo',
        },
        'curso2': {
            'title': 'Curso de Marketing de Conteúdo',
            'description': 'Crie conteúdo que engaja e converte. Aprenda a desenvolver uma estratégia de marketing de conteúdo que atraia e retenha seu público-alvo, utilizando técnicas comprovadas para produzir conteúdo de alta qualidade que gere resultados.',
            'videoLink': 'https://www.example.com/video-marketing-conteudo',
        },
        'curso3': {
            'title': 'Curso de Mídias Sociais',
            'description': 'Domine as redes sociais e aumente sua presença online. Este curso ensina como utilizar as principais plataformas de mídia social para promover seu negócio, criar campanhas eficazes e interagir com seu público de maneira autêntica e impactante.',
            'videoLink': 'https://www.example.com/video-midias-sociais',
        },
        'curso4': {
            'title': 'Curso de Introdução ao Marketing',
            'description': 'Aprenda os fundamentos do marketing digital e como aplicá-los.',
            'videoLink': 'https://www.example.com/video-introducao-marketing',
        },
        'curso5': {
            'title': 'Curso de Redes Sociais',
            'description': 'Domine as redes sociais e aumente sua presença online. Parte voltada do curso para a venda.',
            'videoLink': 'https://www.example.com/video-redes-sociais',
        }
    };

    var modal = document.getElementById("modal"); // Obtém o elemento do modal pelo ID
    var modalTitle = document.getElementById("modal-title"); // Obtém o elemento do título do modal pelo ID
    var modalDescription = document.getElementById("modal-description"); // Obtém o elemento da descrição do modal pelo ID
    var modalLink = document.getElementById("modal-link"); // Obtém o elemento do link do vídeo do modal pelo ID
    var modalImage = document.getElementById("modal-image"); // Obtém o elemento da imagem do modal pelo ID

    modalTitle.textContent = courses[courseId].title; // Define o título do modal com base no curso selecionado
    modalDescription.textContent = courses[courseId].description; // Define a descrição do modal com base no curso selecionado
    modalLink.href = courses[courseId].videoLink; // Define o link do vídeo do modal com base no curso selecionado
    modalImage.src = courses[courseId].image; // Define a imagem do modal com base no curso selecionado (parece que a propriedade image não foi definida no objeto courses)
    modal.style.display = "block"; // Exibe o modal definindo seu estilo de exibição como "block"
}

function closeModal() { // Função que fecha o modal

    var modal = document.getElementById("modal"); // Obtém o elemento do modal pelo ID
    modal.style.display = "none"; // Oculta o modal definindo seu estilo de exibição como "none"
}

window.onclick = function(event) { // Função que fecha o modal se o usuário clicar fora do modal

    var modal = document.getElementById("modal");// Obtém o elemento do modal pelo ID

    if (event.target == modal) {  // Verifica se o alvo do clique é o próprio modal

        modal.style.display = "none";// Oculta o modal definindo seu estilo de exibição como "none"
    }
}

