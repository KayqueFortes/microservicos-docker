📌 Sistema de Tarefas com Docker

Este projeto consiste no desenvolvimento de um sistema de gerenciamento de tarefas utilizando arquitetura de microserviços com Docker.

🚀 Tecnologias utilizadas
HTML, CSS e JavaScript (Front-end)
PHP (API)
MySQL (Banco de dados)
Docker e Docker Compose
Nginx (Servidor web)
🧠 Arquitetura do sistema

O sistema é dividido em três serviços principais:

Web (Nginx): responsável pela interface do usuário
API (PHP): responsável pela lógica e comunicação com o banco
Banco de Dados (MySQL): responsável pela persistência dos dados
⚙️ Funcionalidades
Adicionar tarefas
Listar tarefas por data
Marcar tarefas como concluídas
Excluir tarefas com confirmação
Mini calendário para navegação por dias
🐳 Como executar o projeto
1. Clonar o repositório
git clone https://github.com/KayqueFortes/microservicos-docker.git
cd microservicos-docker
2. Subir os containers
docker compose up --build
3. Acessar o sistema

Abra no navegador:

http://localhost:8080
🗄️ Banco de dados

O banco de dados é criado automaticamente ao iniciar o container MySQL.

A tabela principal:

tarefas (id, titulo, descricao, data_tarefa, status)
🔁 Workflow (GitHub Actions)

O projeto utiliza um workflow simples para verificar o build dos containers automaticamente a cada push na branch main.

👨‍💻 Autor

Desenvolvido por Kayque Fortes.