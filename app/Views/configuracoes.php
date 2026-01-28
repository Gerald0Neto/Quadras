<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Configurações</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="./assets/css/configuracoes.css">

</head>
<body>

<div class="d-flex">

  <!-- SIDEBAR -->
  <aside class="sidebar">
    <h4 class="logo">🏟 QuadrasPro</h4>
    <ul class="menu">
      <li><i class="bi bi-speedometer2"></i><a style="text-decoration: none;color: inherit;" href="<?= BASE_URL ?>Inicial"> Dashboard</a></li>
      <li><i class="bi bi-geo-alt"></i><a style="text-decoration: none;color: inherit;" href="<?= BASE_URL ?>quadras"> Quadras</a></li>
      <li><i class="bi bi-calendar-check"></i><a style="text-decoration: none;color: inherit;" href="<?= BASE_URL ?>agendamento">Agendamento</a></li>
      <li><i class="bi bi-people"></i><a style="text-decoration: none;color: inherit;" href="<?= BASE_URL ?>usuarios"> Usuários</a></li>
      <li><i class="bi bi-bar-chart"></i> <a style="text-decoration: none;color: inherit;" href="<?= BASE_URL ?>relatorios">Relatórios</a></li>
      <li class="active"><i class="bi bi-gear"></i> <a style="text-decoration: none;color: inherit;" href="<?= BASE_URL ?>configuracoes">Configurações</a></li>
      <li><i class="bi "></i> <a style="text-decoration: none;color: inherit;" href="<?= BASE_URL ?>logout">Sair</a></li>
    </ul>
  </aside>

  <!-- CONTEÚDO -->
  <main class="content flex-fill">

    <h2>Configurações</h2>
    <p class="text-muted">Gerencie as configurações do sistema</p>

    <!-- ABAS -->
    <div class="tabs mb-4">
      <button class="tab active">Geral</button>
      <button class="tab">Permissões</button>
      <button class="tab">Notificações</button>
      <button class="tab">Horários</button>
      <button class="tab">Aparência</button>
    </div>

    <!-- CARD -->
    <div class="card p-4">

      <h5 class="mb-3">Informações da Organização</h5>

      <div class="row g-3">

        <div class="col-md-6">
          <label class="form-label">Nome da Organização</label>
          <input type="text" class="form-control" value="Prefeitura Municipal">
        </div>

        <div class="col-md-6">
          <label class="form-label">CNPJ</label>
          <input type="text" class="form-control" value="00.000.000/0001-00">
        </div>

        <div class="col-md-6">
          <label class="form-label">Email de Contato</label>
          <input type="email" class="form-control" value="contato@prefeitura.gov.br">
        </div>

        <div class="col-md-6">
          <label class="form-label">Telefone</label>
          <input type="text" class="form-control" value="(11) 3333-4444">
        </div>

        <div class="col-md-12">
          <label class="form-label">Endereço</label>
          <textarea class="form-control" rows="3">Praça da Matriz, 123 - Centro</textarea>
        </div>
        
      </div>

      <button class="btn btn-success mt-4">
        <i class="bi bi-save"></i> Salvar Alterações
      </button>

    </div>

  </main>

</div>

</body>
</html>
