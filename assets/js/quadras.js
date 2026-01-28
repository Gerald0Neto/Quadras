let quadras = [
  { nome: "Quadra 1", tipo: "Futsal / Futebol Society", status: "Disponível" },
  { nome: "Quadra 2", tipo: "Basquete", status: "Ocupada", proximo: "16:00" },
  { nome: "Quadra 3", tipo: "Vôlei", status: "Manutenção" },
  { nome: "Quadra 4", tipo: "Tênis", status: "Disponível" },
  { nome: "Quadra 5", tipo: "Futsal", status: "Ocupada", proximo: "18:00" },
  { nome: "Quadra 6", tipo: "Poliesportiva", status: "Disponível" }
];

function renderizarQuadras() {
  const lista = document.getElementById("listaQuadras");
  lista.innerHTML = "";

  const busca = document.getElementById("buscar").value.toLowerCase();
  const filtro = document.getElementById("filtroStatus").value;

  quadras
    .filter(q =>
      q.nome.toLowerCase().includes(busca) &&
      (filtro === "" || q.status === filtro)
    )
    .forEach(q => {
      lista.innerHTML += `
        <div class="col-md-4">
          <div class="card-quadra">
            <span class="status ${q.status}">${q.status}</span>
            <i class="bi bi-geo-alt-fill text-success fs-3"></i>
            <h5 class="mt-2">${q.nome}</h5>
            <p class="text-muted">${q.tipo}</p>
            ${q.proximo ? `<small><i class="bi bi-clock"></i> Próximo horário: ${q.proximo}</small>` : ""}
          </div>
        </div>
      `;
    });
}

function salvarQuadra() {
  quadras.push({
    nome: nomeQuadra.value,
    tipo: tipoQuadra.value,
    status: statusQuadra.value
  });

  nomeQuadra.value = "";
  bootstrap.Modal.getInstance(document.getElementById("modalQuadra")).hide();
  renderizarQuadras();
}

buscar.oninput = renderizarQuadras;
filtroStatus.onchange = renderizarQuadras;

renderizarQuadras();
