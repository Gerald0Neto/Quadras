const usuarios = [
  { nome: "João Silva", tipo: "Individual", email: "joao@email.com", tel: "(11) 99999-0001", reservas: 12, atividade: "Hoje" },
  { nome: "Maria Santos", tipo: "Individual", email: "maria@email.com", tel: "(11) 99999-0002", reservas: 8, atividade: "Ontem" },
  { nome: "Time Azul", tipo: "Equipe", email: "timeazul@email.com", tel: "(11) 99999-0003", reservas: 45, atividade: "Hoje" },
  { nome: "Pedro Costa", tipo: "Individual", email: "pedro@email.com", tel: "(11) 99999-0004", reservas: 5, atividade: "3 dias atrás" },
  { nome: "Time Verde", tipo: "Equipe", email: "timeverde@email.com", tel: "(11) 99999-0005", reservas: 32, atividade: "Ontem" },
  { nome: "Ana Oliveira", tipo: "Individual", email: "ana@email.com", tel: "(11) 99999-0006", reservas: 15, atividade: "Hoje" }
];

const lista = document.getElementById("listaUsuarios");

usuarios.forEach(u => {
  lista.innerHTML += `
    <tr>
      <td>
        <div class="d-flex align-items-center gap-2">
          <div class="avatar ${u.tipo === "Equipe" ? "equipe" : ""}">
            <i class="bi bi-${u.tipo === "Equipe" ? "people" : "person"}"></i>
          </div>
          <div class="nome">
            <strong>${u.nome}</strong>
            <small>${u.tipo}</small>
          </div>
        </div>
      </td>
      <td>
        <small><i class="bi bi-envelope"></i> ${u.email}</small><br>
        <small><i class="bi bi-telephone"></i> ${u.tel}</small>
      </td>
      <td><strong>${u.reservas}</strong></td>
      <td>${u.atividade}</td>
      <td class="text-end">
        <i class="bi bi-three-dots-vertical"></i>
      </td>
    </tr>
  `;
});
