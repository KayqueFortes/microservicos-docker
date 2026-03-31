# 📌 Sistema de Tarefas com Docker

Projeto de um sistema de gerenciamento de tarefas desenvolvido com arquitetura de microserviços utilizando Docker.

---

## 🚀 Tecnologias

- HTML, CSS e JavaScript  
- PHP  
- MySQL  
- Docker e Docker Compose  
- Nginx  

---

## 🧠 Como funciona

O sistema é dividido em três partes:

- **Web:** responsável pela interface do usuário  
- **API:** responsável pela lógica do sistema e comunicação com o banco  
- **Banco de Dados:** responsável pela persistência das tarefas  

A comunicação acontece da seguinte forma:

1. O usuário interage com a interface (Front-end)
2. O JavaScript envia requisições para a API
3. A API processa os dados e acessa o banco
4. O banco retorna as informações
5. A API responde em JSON para o front-end

---

## ⚙️ Funcionalidades

- Adicionar tarefas  
- Listar tarefas por data  
- Marcar tarefas como concluídas  
- Excluir tarefas com confirmação  
- Seleção de data (mini calendário)  

---

## 🐳 Como executar o projeto

### 1. Clonar o repositório

```bash
git clone https://github.com/KayqueFortes/microservicos-docker.git
cd microservicos-docker
```

---

### 2. Subir os containers

```bash
docker compose up --build
```

---

### 3. Acessar o sistema

Abra no navegador:

```
http://localhost:8080
```

---

## 🗄️ Banco de Dados

O banco de dados é criado automaticamente ao subir o container.

Tabela principal:

```
tarefas
```

Campos:

- id  
- titulo  
- descricao  
- data_tarefa  
- status  


## 🔁 Workflow (GitHub Actions)

O projeto utiliza um workflow simples para validar o build dos containers automaticamente a cada push na branch `main`.

---

## 👨‍💻 Autor

Desenvolvido por Kayque Fortes.
