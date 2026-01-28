<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Quadras</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="./assets/css/quadras.css">

</head>
<body>

<div class="d-flex">

  <!-- SIDEBAR (MESMO PADRÃO) -->
  <aside class="sidebar">
    <h4 class="logo">🏟 QuadrasPro</h4>
    <ul class="menu">
      <li><i class="bi bi-speedometer2"></i><a style="text-decoration: none;color: inherit;" href="<?= BASE_URL ?>Inicial"> Dashboard</a></li>
      <li class="active"><i class="bi bi-geo-alt"></i><a style="text-decoration: none;color: inherit;" href="<?= BASE_URL ?>quadras"> Quadras</a></li>
      <li><i class="bi bi-calendar-check"></i><a style="text-decoration: none;color: inherit;" href="<?= BASE_URL ?>agendamento">Agendamento</a></li>
      <li><i class="bi bi-people"></i><a style="text-decoration: none;color: inherit;" href="<?= BASE_URL ?>usuarios"> Usuários</a></li>
      <li><i class="bi bi-bar-chart"></i> <a style="text-decoration: none;color: inherit;" href="<?= BASE_URL ?>relatorios">Relatórios</a></li>
      <li><i class="bi bi-gear"></i> <a style="text-decoration: none;color: inherit;" href="<?= BASE_URL ?>configuracoes">Configurações</a></li>
      <li><i class="bi "></i> <a style="text-decoration: none;color: inherit;" href="<?= BASE_URL ?>logout">Sair</a></li>
    </ul>
  </aside>

  <!-- CONTEÚDO -->
  <main class="content flex-fill">

    <!-- TOPO -->
    <div class="d-flex justify-content-between align-items-center mb-3">
      <div>
        <h2>Quadras</h2>
        <p class="text-muted">Gerencie todas as quadras do sistema</p>
      </div>
      <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalQuadra">
        <i class="bi bi-plus"></i> Nova Quadra
      </button>
    </div>

    <!-- FILTROS -->
    <div class="row mb-4 g-2">
      <div class="col-md-8">
        <input type="text" id="buscar" class="form-control" placeholder="Buscar quadra...">
      </div>
      <div class="col-md-4">
        <select id="filtroStatus" class="form-select">
          <option value="">Todos os status</option>
          <option value="Disponível">Disponível</option>
          <option value="Ocupada">Ocupada</option>
          <option value="Manutenção">Manutenção</option>
        </select>
      </div>
    </div>

    <!-- LISTA DE QUADRAS -->
    <div class="row g-3" id="listaQuadras"></div>

  </main>
</div>

<!-- MODAL -->
<div class="modal fade" id="modalQuadra" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Nova Quadra</h5>
        <button class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <div class="mb-3">
          <label class="form-label">Nome da Quadra</label>
          <input type="text" id="nomeQuadra" class="form-control" placeholder="Ex: Quadra 1">
        </div>
        <div class="mb-3">
          <label class="form-label">Tipo</label>
          <select id="tipoQuadra" class="form-select">
            <option>Futsal</option>
            <option>Basquete</option>
            <option>Vôlei</option>
            <option>Tênis</option>
            <option>Poliesportiva</option>
          </select>
        </div>
        <div class="mb-3">
          <label class="form-label">Status</label>
          <select id="statusQuadra" class="form-select">
            <option>Disponível</option>
            <option>Ocupada</option>
            <option>Manutenção</option>
          </select>
        </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-light" data-bs-dismiss="modal">Cancelar</button>
        <button class="btn btn-success" onclick="salvarQuadra()">Salvar</button>
      </div>
    </div>
  </div>
</div>

<!-- JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="./assets/js/quadras.js"></script>

</body>
</html>
