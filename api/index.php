<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");
header("Content-Type: application/json; charset=UTF-8");

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}

$host = "db";
$dbname = "tarefas_db";
$user = "usuario";
$password = "senha123";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $method = $_SERVER['REQUEST_METHOD'];

    if ($method === 'GET') {
        $data = $_GET['data'] ?? date('Y-m-d');

        $stmt = $pdo->prepare("SELECT * FROM tarefas WHERE data_tarefa = ? ORDER BY id DESC");
        $stmt->execute([$data]);
        $tarefas = $stmt->fetchAll(PDO::FETCH_ASSOC);

        echo json_encode($tarefas);
        exit();
    }

    $dados = json_decode(file_get_contents("php://input"), true);

    if ($method === 'POST') {
        $titulo = trim($dados['titulo'] ?? '');
        $descricao = trim($dados['descricao'] ?? '');
        $dataTarefa = $dados['data_tarefa'] ?? '';

        if ($titulo === '' || $descricao === '' || $dataTarefa === '') {
            http_response_code(400);
            echo json_encode(["erro" => "Título, descrição e data são obrigatórios."]);
            exit();
        }

        $stmt = $pdo->prepare("INSERT INTO tarefas (titulo, descricao, data_tarefa, status) VALUES (?, ?, ?, 'pendente')");
        $stmt->execute([$titulo, $descricao, $dataTarefa]);

        echo json_encode(["mensagem" => "Tarefa cadastrada com sucesso"]);
        exit();
    }

    if ($method === 'PUT') {
        $id = $dados['id'] ?? 0;

        if (!$id) {
            http_response_code(400);
            echo json_encode(["erro" => "ID inválido."]);
            exit();
        }

        $stmt = $pdo->prepare("UPDATE tarefas SET status = 'concluida' WHERE id = ?");
        $stmt->execute([$id]);

        echo json_encode(["mensagem" => "Tarefa concluída com sucesso"]);
        exit();
    }

    if ($method === 'DELETE') {
        $id = $dados['id'] ?? 0;

        if (!$id) {
            http_response_code(400);
            echo json_encode(["erro" => "ID inválido."]);
            exit();
        }

        $stmt = $pdo->prepare("DELETE FROM tarefas WHERE id = ?");
        $stmt->execute([$id]);

        echo json_encode(["mensagem" => "Tarefa excluída com sucesso"]);
        exit();
    }

    http_response_code(405);
    echo json_encode(["erro" => "Método não permitido."]);

} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode([
        "erro" => "Falha na conexão com o banco",
        "detalhes" => $e->getMessage()
    ]);
}
?>