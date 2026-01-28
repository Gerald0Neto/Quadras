const dados = {
  cards: [
    { titulo: "Total de Reservas", valor: 1127, icon: "calendar", variacao: "+12%" },
    { titulo: "Horas Utilizadas", valor: "2.254h", icon: "graph-up", variacao: "+8%" },
    { titulo: "Usuários Ativos", valor: 156, icon: "people", variacao: "+15%" },
    { titulo: "Taxa de Ocupação", valor: "78%", icon: "geo-alt", variacao: "+5%" }
  ],

  usuarios: [
    { nome: "Time Azul", reservas: 45, horas: 90, progresso: 100 },
    { nome: "Time Verde", reservas: 32, horas: 64, progresso: 70 },
    { nome: "João Silva", reservas: 28, horas: 42, progresso: 60 },
    { nome: "Maria Santos", reservas: 25, horas: 37, progresso: 55 },
    { nome: "Time Vermelho", reservas: 22, horas: 44, progresso: 50 }
  ]
};

// CARDS
const cardsResumo = document.getElementById("cardsResumo");
dados.cards.forEach(c => {
  cardsResumo.innerHTML += `
    <div class="col-md-3 col-sm-6">
      <div class="card-resumo">
        <div class="d-flex justify-content-between">
          <i class="bi bi-${c.icon} fs-3 text-success"></i>
          <small class="text-success">${c.variacao}</small>
        </div>
        <h3 class="mt-2">${c.valor}</h3>
        <small class="text-muted">${c.titulo}</small>
      </div>
    </div>
  `;
});

// USUÁRIOS
const usuarios = document.getElementById("usuariosAtivos");
dados.usuarios.forEach((u, i) => {
  usuarios.innerHTML += `
    <div class="usuario">
      <div>
        <strong>${i + 1}. ${u.nome}</strong><br>
        <small>${u.reservas} reservas • ${u.horas} horas</small>
      </div>
      <div class="progress w-25">
        <div class="progress-bar bg-success" style="width:${u.progresso}%"></div>
      </div>
    </div>
  `;
});

// GRÁFICOS
new Chart(document.getElementById("graficoQuadras"), {
  type: "bar",
  data: {
    labels: ["Quadra 1", "Quadra 2", "Quadra 3", "Quadra 4", "Quadra 5", "Quadra 6"],
    datasets: [{
      data: [120, 95, 78, 64, 110, 45],
      backgroundColor: "#22c55e"
    }]
  },
  options: { indexAxis: 'y' }
});

new Chart(document.getElementById("graficoMensal"), {
  type: "line",
  data: {
    labels: ["Jan", "Fev", "Mar", "Abr", "Mai", "Jun"],
    datasets: [{
      data: [140, 165, 190, 205, 185, 220],
      borderColor: "#22c55e",
      fill: false,
      tension: .4
    }]
  }
});

new Chart(document.getElementById("graficoModalidade"), {
  type: "doughnut",
  data: {
    labels: ["Futsal", "Basquete", "Vôlei", "Tênis", "Outros"],
    datasets: [{
      data: [35, 25, 20, 12, 8],
      backgroundColor: ["#22c55e", "#f59e0b", "#3b82f6", "#8b5cf6", "#ef4444"]
    }]
  }
});
