CREATE TABLE IF NOT EXISTS tarefas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(255) NOT NULL,
    descricao TEXT NOT NULL,
    data_tarefa DATE NOT NULL,
    status VARCHAR(50) NOT NULL DEFAULT 'pendente'
);