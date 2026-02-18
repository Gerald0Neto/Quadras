<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Agendamento</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="./assets/css/agendamento.css">

</head>
<body>

<div class="d-flex">

  <!-- SIDEBAR -->
  <aside class="sidebar">
    <h4 class="logo">🏟 QuadrasPro</h4>
    <ul class="menu">
      <li><i class="bi bi-speedometer2"></i><a style="text-decoration: none;color: inherit;" href="<?= BASE_URL ?>Inicial"> Dashboard</a></li>
      <li><i class="bi bi-geo-alt"></i><a style="text-decoration: none;color: inherit;" href="<?= BASE_URL ?>quadras"> Quadras</a></li>
      <li class="active"><i class="bi bi-calendar-check"></i><a style="text-decoration: none;color: inherit;" href="<?= BASE_URL ?>agendamento">Agendamento</a></li>
      <li><i class="bi bi-people"></i><a style="text-decoration: none;color: inherit;" href="<?= BASE_URL ?>usuarios"> Usuários</a></li>
      <li><i class="bi bi-bar-chart"></i> <a style="text-decoration: none;color: inherit;" href="<?= BASE_URL ?>relatorios">Relatórios</a></li>
      <li><i class="bi bi-gear"></i> <a style="text-decoration: none;color: inherit;" href="<?= BASE_URL ?>configuracoes">Configurações</a></li>
      <li><i class="bi "></i> <a style="text-decoration: none;color: inherit;" href="<?= BASE_URL ?>logout">Sair</a></li>
    </ul>
  </aside>

  <!-- CONTEÚDO -->
  <main class="content flex-fill">

    <div class="d-flex justify-content-between align-items-center mb-3">
      <div>
        <h2>Agendamento</h2>
        <p class="text-muted">Gerencie as reservas das quadras</p>
      </div>
      <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalReserva">
        <i class="bi bi-plus"></i> Nova Reserva
      </button>
    </div>

    <!-- CARDS -->
    <div class="row g-3 mb-4">
      <div class="col-md-3">
        <div class="card-resumo">
          <h6>Reservas Hoje</h6>
          <h3>0</h3>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card-resumo">
          <h6>Horários Livres</h6>
          <h3>0</h3>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card-resumo">
          <h6>Pendentes</h6>
          <h3>0</h3>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card-resumo">
          <h6>Canceladas</h6>
          <h3>0</h3>
        </div>
      </div>
    </div>

    <!-- CALENDÁRIO -->
    <div class="card p-3">
      <h5>Calendário de Reservas</h5>
      <small class="text-muted">2026</small>

      <div class="legenda mt-3 mb-2">
        <span class="badge bg-success">Disponível</span>
        <span class="badge bg-danger">Ocupado</span>
        <span class="badge bg-secondary">Selecionado</span>
      </div>

      <div class="table-responsive">
        <table class="table table-borderless calendario">
          <thead>
            <tr>
              <th>Horário</th>
              <?php foreach ($dias as $dia): ?>
                <th><?= $dia['label'] ?></th>
              <?php endforeach; ?>
            </tr>
          </thead>

          <tbody>
            <?php foreach ($horarios as $hora): ?>
              <tr>
                <td><strong><?= date('H:i', strtotime($hora['hora'])) ?></strong></td>

                <?php foreach ($dias as $dia): ?>
                  <td>
                    <button class="btn btn-outline-success btn-sm rounded-pill w-100">
                      Livre
                    </button>
                  </td>
                <?php endforeach; ?>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>

    </div>

  </main>
</div>
<!-- MODAL -->
<form method="POST" action="./Agendamento/insert">
<div class="modal fade" id="modalReserva" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title"><i class="bi bi-calendar-plus"></i> Nova Reserva</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <div class="modal-body">
        <div class="mb-3">
          <label>Data</label>
          <input name="data" type="date" class="form-control">
        </div>

        <div class="mb-3">
            <label>Horário</label>
            <select name="horario_id" class="form-select" required>
                <option value="">Selecione</option>

                <?php foreach ($horarios as $hora): ?>
                  
                    <option value="<?= $hora['id'] ?>">
                        <?= date('H:i', strtotime($hora['hora'])) ?>
                    </option>
                <?php endforeach; ?>

            </select>
        </div>


        <div class="mb-3">
          <label>Quadra</label>
          <select name="quadra_id" class="form-select">
            <option>Selecione a quadra</option>
             <?php foreach ($listarQuadras as $quadra): ?>
              <option value="<?= $quadra['id'] ?>"><?= $quadra['nome'] ?></option>
            <?php endforeach; ?>
          </select>
        </div>

        <div class="mb-3">
          <label>Duração</label>
          <select name="duracao" class="form-select">
            <option>1 hora</option>
            <option>2 horas</option>
          </select>
        </div>

        <div class="mb-3">
          <label>Usuário / Equipe</label>
          <select name="usuario_id" class="form-select">
            <option>Selecione o usuário</option>
           <?php foreach ($listarUsuarios as $usuario): ?>
              <option value="<?= $usuario['id'] ?>"><?= $usuario['nome'] ?></option>
           <?php endforeach; ?>
          </select>
        </div>

        <div class="mb-3">
          <label>Status</label>
          <select name="status" class="form-select">
            <option>Confirmada</option>
            <option>Pendente</option>
            <option>Cancelada</option>
          </select>
        </div>

        <div class="mb-3">
          <label>Observações</label>
          <textarea class="form-control" rows="3"></textarea>
        </div>
      </div>

      <div class="modal-footer">
        <button class="btn btn-light" data-bs-dismiss="modal">Cancelar</button>
        <button class="btn btn-success">Confirmar Reserva</button>
      </div>

    </div>
  </div>
</div>
</form>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="./assets/js/agendamento.js"></script>
</body>
</html>
