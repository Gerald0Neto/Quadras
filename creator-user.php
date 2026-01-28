<?php
require_once __DIR__ . '/vendor/autoload.php';
use App\Connections\Conexao;

$msg = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nome  = trim($_POST['nome']);
    $email = trim($_POST['email']);
    $senha = $_POST['senha'];
    $perfil = (int)$_POST['perfil'];

    if ($nome && $email && $senha && $perfil) {

        $hash = password_hash($senha, PASSWORD_DEFAULT);

        try {
            $db = Conexao::getConnection();

            $sql = "INSERT INTO usuarios (nome, email, senha, perfil_id)
                    VALUES (:nome, :email, :senha, :perfil)";

            $stmt = $db->prepare($sql);
            $stmt->bindValue(':nome', $nome);
            $stmt->bindValue(':email', $email);
            $stmt->bindValue(':senha', $hash);
            $stmt->bindValue(':perfil', $perfil);

            $stmt->execute();

            $msg = ['type' => 'success', 'text' => 'Usuário criado com sucesso!'];

        } catch (PDOException $e) {
            $msg = ['type' => 'danger', 'text' => 'Erro ao criar usuário'];
        }
    } else {
        $msg = ['type' => 'warning', 'text' => 'Preencha todos os campos'];
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<title>Criar Usuário</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body {
    min-height: 100vh;
    background: linear-gradient(135deg, #0f172a, #020617);
    display: flex;
    align-items: center;
    justify-content: center;
    font-family: 'Segoe UI', sans-serif;
}

.card-user {
    background: #fff;
    width: 100%;
    max-width: 420px;
    padding: 30px;
    border-radius: 16px;
    box-shadow: 0 15px 40px rgba(0,0,0,.3);
}

.card-user h3 {
    text-align: center;
    margin-bottom: 20px;
    color: #0f172a;
    font-weight: 700;
}

.btn-save {
    background: #22c55e;
    border: none;
    border-radius: 12px;
    height: 46px;
    font-weight: 600;
}

.btn-save:hover {
    background: #16a34a;
}
</style>
</head>
<body>

<div class="card-user">

    <h3>Criar Usuário</h3>

    <?php if ($msg): ?>
        <div class="alert alert-<?= $msg['type'] ?>">
            <?= $msg['text'] ?>
        </div>
    <?php endif; ?>

    <form method="POST">

        <div class="mb-3">
            <label class="form-label">Nome</label>
            <input type="text" name="nome" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Senha</label>
            <input type="password" name="senha" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Perfil</label>
            <select name="perfil" class="form-select" required>
                <option value="">Selecione</option>
                <option value="1">Administrador</option>
                <option value="2">Usuário</option>
                <option value="3">Operador</option>
            </select>
        </div>

        <button class="btn btn-save w-100">Salvar Usuário</button>

    </form>
</div>

</body>
</html>
