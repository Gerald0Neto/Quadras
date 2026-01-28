// DADOS DINÂMICOS (simulando backend)
const dados = {
  cards: [
    { titulo: "Total de Quadras", valor: 8, sub: "4 disponíveis agora", icon: "geo-alt" },
    { titulo: "Reservas Hoje", valor: 24, sub: "85% ocupação", icon: "calendar-check" },
    { titulo: "Usuários Ativos", valor: 156, sub: "Este mês", icon: "people" },
    { titulo: "Alertas", valor: 2, sub: "Requer atenção", icon: "exclamation-triangle" }
  ],

  alertas: [
    { tipo: "danger", texto: "Conflito de reserva na Quadra 1 (15:00 - 16:00)" },
    { tipo: "warning", texto: "Manutenção agendada na Quadra 3 amanhã às 08:00" }
  ],

  reservas: [
    { time: "Time Azul", quadra: "Quadra 1 • Futsal", hora: "14:00 - 15:00" },
    { time: "Time Verde", quadra: "Quadra 2 • Basquete", hora: "15:00 - 16:00" },
    { time: "Time Vermelho", quadra: "Quadra 1 • Vôlei", hora: "16:00 - 17:00" },
    { time: "Time Amarelo", quadra: "Quadra 3 • Futsal", hora: "17:00 - 18:00" }
  ]
};

// CARDS
const cardsResumo = document.getElementById("cardsResumo");
dados.cards.forEach(c => {
  cardsResumo.innerHTML += `
    <div class="col-md-3 col-sm-6">
      <div class="card-resumo">
        <i class="bi bi-${c.icon} fs-3 text-success"></i>
        <h6 class="mt-2">${c.titulo}</h6>
        <h3>${c.valor}</h3>
        <small class="text-muted">${c.sub}</small>
      </div>
    </div>
  `;
});

// ALERTAS
const listaAlertas = document.getElementById("listaAlertas");
dados.alertas.forEach(a => {
  listaAlertas.innerHTML += `
    <div class="alert alert-${a.tipo}">
      ${a.texto}
    </div>
  `;
});

// RESERVAS
const reservas = document.getElementById("reservas");
dados.reservas.forEach(r => {
  reservas.innerHTML += `
    <div class="d-flex justify-content-between border-bottom py-2">
      <div>
        <strong>${r.time}</strong><br>
        <small class="text-muted">${r.quadra}</small>
      </div>
      <strong>${r.hora}</strong>
    </div>
  `;
});

// GRÁFICO
new Chart(document.getElementById("graficoUso"), {
  type: "bar",
  data: {
    labels: ["Seg", "Ter", "Qua", "Qui", "Sex", "Sáb", "Dom"],
    datasets: [
      {
        label: "Ocupado",
        data: [8, 10, 6, 9, 11, 12, 7],
        backgroundColor: "#22c55e"
      },
      {
        label: "Livre",
        data: [4, 2, 6, 3, 1, 0, 5],
        backgroundColor: "#e5e7eb"
      }
    ]
  }
});
