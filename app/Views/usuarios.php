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
      <!--<button class="btn btn-light">Usuários</button>
      <button class="btn btn-light">Equipes</button> -->
    </div>

    <!-- BUSCA 
    <div class="mb-3">
      <input type="text" class="form-control" placeholder="Buscar por nome ou email...">
    </div>-->

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
        <tbody>
        <?php if (!empty($listarUsuarios)): ?>
          <?php foreach ($listarUsuarios as $usuario): ?>
            <tr>
              <td>
                <div class="d-flex align-items-center gap-2">
                  <div class="avatar <?= $usuario['css_class'] ?>">
                    <i class="bi bi-<?= $usuario['icon'] ?>"></i>
                  </div>
                  <div class="nome">
                    <strong><?= $usuario['nome'] ?></strong>
                    <small><?= $usuario['tipo_perfil'] ?></small>
                  </div>
                </div>
              </td>
              <td>
                <small><i class="bi bi-envelope"></i> <?= $usuario['email'] ?></small><br>
                <small><i class="bi bi-telephone"></i> <?= $usuario['telefone'] ?></small>
              </td>
              <td><strong><?= $usuario['reservas'] ?></strong></td>
              <td><?= $usuario['atividades'] ?></td>
              <td class="text-end">
                <div class="dropdown">
                  <button 
                    class="btn btn-sm btn-light" 
                    type="button" 
                    data-bs-toggle="dropdown" 
                    aria-expanded="false">
                    <i class="bi bi-three-dots-vertical"></i>
                  </button>

                  <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                      <a class="dropdown-item" href="editar.php?id=<?= $id ?>">
                        <i class="bi bi-pencil-square me-2"></i> Editar
                      </a>
                    </li>
                    <li>
                      <button class="dropdown-item text-danger btn-apagar"
                              data-id="<?= $usuario['id'] ?>"
                              data-bs-toggle="modal"
                              data-bs-target="#modalExcluir">
                          <i class="bi bi-trash"></i> Apagar
                      </button>
                    </li>
                  </ul>
                </div>
              </td>

            </tr>
          <?php endforeach; ?>
        <?php else: ?>
            <div class="col-12">
                <div class="alert alert-warning">
                    Nenhuma Usuario cadastrada.
                </div>
            </div>
        <?php endif; ?>
        </tbody>
      </table>
    </div>

  </main>
</div>

<!-- MODAL EXCLUIR -->
<form method="POST" action="./usuarios/excluir">
    <input type="hidden" name="id" id="userId">
    <div class="modal fade" id="modalExcluir" tabindex="-1">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

          <div class="modal-header">
            <h5 class="modal-title">Excluir Usuario</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
          </div>

          <div class="modal-body">

            <div class="mb-3">
              <label class="form-label">Tem certeza de que deseja excluir este usuario?</label>
      
            </div>

          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-light" data-bs-dismiss="modal">
              Cancelar
            </button>

            <!-- BOTÃO QUE ENVIA O FORM -->
            <button type="submit" class="btn btn-success">
              Confirmar
            </button>
          </div>

        </div>
      </div>
    </div>
</form>
<script>
document.querySelectorAll('.btn-apagar').forEach(btn => {
  btn.addEventListener('click', () => {
    document.getElementById('userId').value = btn.dataset.id;
  });
});
</script>

<!-- MODAL -->
<form method="POST" action="./usuarios/insert">

    <div class="modal fade" id="modalCadastro" tabindex="-1">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

          <div class="modal-header">
            <h5 class="modal-title">Novo Cadastro</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
          </div>

          <div class="modal-body">
            <div class="mb-3">
              <label class="form-label">Nome</label>
              <input type="text" class="form-control" name="nome" required>
            </div>

            <div class="mb-3">
              <label class="form-label">Email</label>
              <input type="text" class="form-control" name="email" required>
            </div>

            <div class="mb-3">
              <label class="form-label">Senha</label>
              <input type="text" class="form-control" name="senha" required>
            </div>

            <div class="mb-3">
              <label class="form-label">Telefone</label>
              <input type="text" class="form-control" name="telefone" required>
            </div>


            <div class="mb-3">
                <label class="form-label">Perfil</label>
                <select name="perfil" class="form-select" required>
                    <option value="">Selecione</option>
                    <option value="1">Administrador</option>
                    <option value="2">Individual</option>
                    <option value="3">Operador</option>
                    <option value="4">Equipe</option>
                </select>
            </div>

          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-light" data-bs-dismiss="modal">
              Cancelar
            </button>

            <button type="submit" class="btn btn-success">
              Confirmar
            </button>
          </div>

        </div>
      </div>
    </div>
</form>

<!-- JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="./assets/js/usuarios.js"></script>

</body>
</html>
