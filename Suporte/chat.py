import random
from fuzzywuzzy import process

# Dicionário de perguntas e respostas predefinidas pelo chatbot
respostas_chatbot = {
    "olá": ["Olá! Bem-vindo ao nosso serviço de atendimento.", "Oi! Como posso ajudá-lo?"],
    "horário de funcionamento": ["Nosso horário de funcionamento é de segunda a sexta, das 9h às 18h."],
    "endereço": ["Estamos localizados na Rua Principal, 123, Cidade. Ficamos felizes em recebê-lo!"],
    "adeus": ["Até mais!", "Até logo!", "Tenha um bom dia!"]
}

# Função para identificar o contexto mais próximo da pergunta do usuário
def identificar_contexto(pergunta):
    melhor_correspondencia, _ = process.extractOne(pergunta, respostas_chatbot.keys())
    return melhor_correspondencia

# Função para o chatbot responder às perguntas
def responder_chatbot(pergunta):
    contexto = identificar_contexto(pergunta)
    if contexto:
        return random.choice(respostas_chatbot[contexto])
    else:
        return "Para que possamos te ajudar de forma mais eficaz, por favor utilize os campos ao lado e forneça seu problema."

# Função principal para interagir com o usuário
def main():
    print("Bem-vindo ao nosso serviço de atendimento. Como posso ajudá-lo hoje?")
    while True:
        pergunta = input("Você: ")
        if pergunta.lower() == "sair":
            print("Até mais!")
            break
        resposta_chatbot = responder_chatbot(pergunta)
        print("ChatBot:", resposta_chatbot)

if __name__ == "__main__":
    main()
