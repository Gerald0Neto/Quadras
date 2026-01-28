<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <title>Dashboard</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="./assets/css/inicial-tela.css">
  <style>
    .welcome {
      font-size: 1.6rem;
      font-weight: 500;
      color: #0f172a; 
      margin-bottom: 20px;
      display: flex;
      align-items: center;
      gap: 6px;
      flex-wrap: wrap;
    }

    .welcome strong {
      font-weight: 700;
      color: #22c55e; 
    }

    .welcome::after {
      content: "";
      display: block;
      width: 60px;
      height: 4px;
      background: #22c55e;
      border-radius: 8px;
      margin-top: 8px;
    }
  </style>
</head>
<body>

<div class="d-flex">

  <!-- SIDEBAR -->
  <aside class="sidebar">
    <h4 class="logo">🏟 QuadrasPro</h4>
    <ul class="menu">
      <li class="active"><i class="bi bi-speedometer2"></i><a style="text-decoration: none;color: inherit;" href="<?= BASE_URL ?>Inicial"> Dashboard</a></li>
      <li><i class="bi bi-geo-alt"></i><a style="text-decoration: none;color: inherit;" href="<?= BASE_URL ?>quadras"> Quadras</a></li>
      <li><i class="bi bi-calendar-check"></i><a style="text-decoration: none;color: inherit;" href="<?= BASE_URL ?>agendamento">Agendamento</a></li>
      <li ><i class="bi bi-people"></i><a style="text-decoration: none;color: inherit;" href="<?= BASE_URL ?>usuarios"> Usuários</a></li>
      <li><i class="bi bi-bar-chart"></i> <a style="text-decoration: none;color: inherit;" href="<?= BASE_URL ?>relatorios">Relatórios</a></li>
      <li><i class="bi bi-gear"></i> <a style="text-decoration: none;color: inherit;" href="<?= BASE_URL ?>configuracoes">Configurações</a></li>
      <li><i class="bi "></i> <a style="text-decoration: none;color: inherit;" href="<?= BASE_URL ?>logout">Sair</a></li>
    </ul>
  </aside>

  <!-- CONTEÚDO -->
  <main class="content flex-fill">

    <h2>Dashboard</h2>
    <p class="text-muted">Visão geral do sistema de quadras</p>


    <!-- CARDS -->
    <div class="row g-3 mb-4" id="cardsResumo"></div>
    <h2 class="welcome">
      Seja bem-vindo,
      <strong><?= htmlspecialchars($dadosUser['nome']) ?></strong> 
    </h2>
    <!-- GRÁFICO + ALERTAS -->
    <div class="row g-3">
      <div class="col-lg-8">
        <div class="card p-3">
          <h5>Uso das Quadras - Última Semana</h5>
          <canvas id="graficoUso"></canvas>
        </div>
      </div>

      <div class="col-lg-4">
        <div class="card p-3">
          <h5>Alertas Recentes</h5>
          <div id="listaAlertas"></div>
        </div>
      </div>
    </div>

    <!-- PRÓXIMAS RESERVAS -->
    <div class="card p-3 mt-4">
      <h5>Próximas Reservas</h5>
      <div id="reservas"></div>
    </div>

  </main>
</div>

<!-- JS -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="./assets/js-dashboard/dashboard.js"></script>

</body>
</html>
