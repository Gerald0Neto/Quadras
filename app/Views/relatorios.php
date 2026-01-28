<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Relatórios</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="./assets/css/relatorios.css">

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
      <li class="active"><i class="bi bi-bar-chart"></i> <a style="text-decoration: none;color: inherit;" href="<?= BASE_URL ?>relatorios">Relatórios</a></li>
      <li><i class="bi bi-gear"></i> <a style="text-decoration: none;color: inherit;" href="<?= BASE_URL ?>configuracoes">Configurações</a></li>
      <li><i class="bi "></i> <a style="text-decoration: none;color: inherit;" href="<?= BASE_URL ?>logout">Sair</a></li>
    </ul>
  </aside>

  <!-- CONTEÚDO -->
  <main class="content flex-fill">

    <div class="d-flex justify-content-between align-items-center mb-4">
      <div>
        <h2>Relatórios</h2>
        <p class="text-muted">Análise de uso e estatísticas do sistema</p>
      </div>

      <div class="d-flex gap-2">
        <button class="btn btn-light">
          <i class="bi bi-calendar"></i> Este Mês
        </button>
        <button class="btn btn-success">
          <i class="bi bi-download"></i> Exportar
        </button>
      </div>
    </div>

    <!-- CARDS -->
    <div class="row g-3 mb-4" id="cardsResumo"></div>

    <!-- GRÁFICOS -->
    <div class="row g-3 mb-4">
      <div class="col-lg-6">
        <div class="card p-3">
          <div class="d-flex justify-content-between">
            <h5>Uso por Quadra (horas)</h5>
            <span class="text-muted"><i class="bi bi-file-earmark-text"></i> Detalhes</span>
          </div>
          <canvas id="graficoQuadras"></canvas>
        </div>
      </div>

      <div class="col-lg-6">
        <div class="card p-3">
          <div class="d-flex justify-content-between">
            <h5>Tendência Mensal</h5>
            <span class="text-muted"><i class="bi bi-file-earmark-text"></i> Detalhes</span>
          </div>
          <canvas id="graficoMensal"></canvas>
        </div>
      </div>
    </div>

    <!-- MODALIDADE + USUÁRIOS -->
    <div class="row g-3">
      <div class="col-lg-6">
        <div class="card p-3">
          <h5>Reservas por Modalidade</h5>
          <canvas id="graficoModalidade"></canvas>
        </div>
      </div>

      <div class="col-lg-6">
        <div class="card p-3">
          <div class="d-flex justify-content-between">
            <h5>Usuários Mais Ativos</h5>
            <small class="text-success">Ver Todos</small>
          </div>
          <div id="usuariosAtivos"></div>
        </div>
      </div>
    </div>

  </main>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="./assets/js/relatorios.js"></script>

</body>
</html>
