<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Login | QuadrasPro</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

  <style>
    body {
      min-height: 100vh;
      background: linear-gradient(135deg, #0f172a, #020617);
      display: flex;
      align-items: center;
      justify-content: center;
      font-family: 'Segoe UI', sans-serif;
    }

    .login-card {
      background: #ffffff;
      width: 100%;
      max-width: 420px;
      padding: 35px;
      border-radius: 16px;
      box-shadow: 0 15px 40px rgba(0,0,0,0.3);
    }

    .login-card h3 {
      font-weight: 700;
      margin-bottom: 10px;
      color: #0f172a;
      text-align: center;
    }

    .login-card p {
      text-align: center;
      color: #64748b;
      margin-bottom: 30px;
    }

    .form-control {
      height: 48px;
      border-radius: 10px;
    }

    .input-group-text {
      background: #f1f5f9;
      border-radius: 10px 0 0 10px;
    }

    .btn-login {
      background: #22c55e;
      border: none;
      height: 48px;
      border-radius: 12px;
      font-weight: 600;
      color: #fff;
      transition: 0.3s;
    }

    .btn-login:hover {
      background: #16a34a;
    }

    .logo {
      text-align: center;
      font-size: 26px;
      font-weight: bold;
      margin-bottom: 15px;
    }

    .logo span {
      color: #22c55e;
    }

    .error {
      background: #fee2e2;
      color: #b91c1c;
      padding: 10px;
      border-radius: 8px;
      text-align: center;
      margin-top: 15px;
      font-size: 14px;
    }

    @media (max-width: 576px) {
      .login-card {
        margin: 15px;
        padding: 25px;
      }
    }
  </style>
</head>
<body>

  <div class="login-card">

    <div class="logo">
      <span>Quadras</span>Pro
    </div>

    <h3>Bem-vindo</h3>
    <p>Acesse o sistema para continuar</p>

    <form method="POST" action="<?= BASE_URL ?>form-login/auth">

      <div class="mb-3 input-group">
        <span class="input-group-text">
          <i class="bi bi-envelope"></i>
        </span>
        <input type="email" name="email" class="form-control" placeholder="Email" required>
      </div>

      <div class="mb-3 input-group">
        <span class="input-group-text">
          <i class="bi bi-lock"></i>
        </span>
        <input type="password" name="senha" class="form-control" placeholder="Senha" required>
      </div>

      <button type="submit" class="btn btn-login w-100">
        Entrar
      </button>
    </form>

    <?php if (isset($_GET['error'])): ?>
      <div class="error">
        Email ou senha inválidos
      </div>
    <?php endif; ?>

  </div>

</body>
</html>
