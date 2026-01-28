<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <title>Usuários</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="./assets/css/inicial-tela.css">
  <link rel="stylesheet" href="./assets/css/usuarios.css">

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
      <li class="active"><i class="bi bi-people"></i><a style="text-decoration: none;color: inherit;" href="<?= BASE_URL ?>usuarios"> Usuários</a></li>
      <li><i class="bi bi-bar-chart"></i> <a style="text-decoration: none;color: inherit;" href="<?= BASE_URL ?>relatorios">Relatórios</a></li>
      <li><i class="bi bi-gear"></i> <a style="text-decoration: none;color: inherit;" href="<?= BASE_URL ?>configuracoes">Configurações</a></li>
      <li><i class="bi "></i> <a style="text-decoration: none;color: inherit;" href="<?= BASE_URL ?>logout">Sair</a></li>
    </ul>
  </aside>

  <!-- CONTEÚDO -->
  <main class="content flex-fill">

    <div class="d-flex justify-content-between align-items-center mb-3">
      <div>
        <h2>Usuários e Equipes</h2>
        <p class="text-muted">Gerencie usuários e equipes cadastradas</p>
      </div>
      <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalCadastro">
        <i class="bi bi-plus"></i> Novo Cadastro
      </button>
    </div>

    <!-- FILTROS -->
    <div class="d-flex gap-2 mb-3">
      <button class="btn btn-light active">Todos</button>
      <button class="btn btn-light">Usuários</button>
      <button class="btn btn-light">Equipes</button>
    </div>

    <!-- BUSCA -->
    <div class="mb-3">
      <input type="text" class="form-control" placeholder="Buscar por nome ou email...">
    </div>

    <!-- TABELA -->
    <div class="card p-3">
      <table class="table align-middle">
        <thead>
          <tr>
            <th>Nome</th>
            <th>Contato</th>
            <th>Reservas</th>
            <th>Última Atividade</th>
            <th></th>
          </tr>
        </thead>
        <tbody id="listaUsuarios"></tbody>
      </table>
    </div>

  </main>
</div>

<!-- MODAL -->
<div class="modal fade" id="modalCadastro" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content p-3">
      <div class="modal-header border-0">
        <h5>Novo Cadastro</h5>
        <button class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <div class="modal-body">
        <div class="btn-group w-100 mb-3">
          <button class="btn btn-light active">Usuário</button>
          <button class="btn btn-light">Equipe</button>
        </div>

        <div class="mb-3">
          <label class="form-label">Nome</label>
          <input type="text" class="form-control" placeholder="Nome completo ou da equipe">
        </div>

        <div class="mb-3">
          <label class="form-label">Email</label>
          <input type="email" class="form-control" placeholder="email@exemplo.com">
        </div>

        <div class="mb-3">
          <label class="form-label">Telefone</label>
          <input type="text" class="form-control" placeholder="(00) 00000-0000">
        </div>
      </div>

      <div class="modal-footer border-0">
        <button class="btn btn-light" data-bs-dismiss="modal">Cancelar</button>
        <button class="btn btn-success">Salvar</button>
      </div>
    </div>
  </div>
</div>

<!-- JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="./assets/js/usuarios.js"></script>

</body>
</html>
