const quadras = [
  {
    nome: "Quadra 1 - Futsal",
    dias: {
      "05/03": ["14:00", "15:00", "17:00"],
      "06/03": ["16:00", "18:00"]
    }
  },
  {
    nome: "Quadra 2 - Basquete",
    dias: {
      "05/03": ["15:00", "16:00"],
      "07/03": ["18:00", "19:00"]
    }
  }
];

const lista = document.getElementById("listaQuadras");

function renderizar() {
  lista.innerHTML = "";

  quadras.forEach(q => {
    let html = `
      <div class="quadra-card">
        <h5><i class="bi bi-geo-alt-fill text-success"></i> ${q.nome}</h5>
    `;

    for (let dia in q.dias) {
      html += `
        <div class="dia">
          <h6>${dia}</h6>
          <div class="horarios">
      `;

      q.dias[dia].forEach(h => {
        html += `
          <div class="horario" onclick="contato('${q.nome}', '${dia}', '${h}')">
            ${h}
          </div>
        `;
      });

      html += `</div></div>`;
    }

    html += `</div>`;
    lista.innerHTML += html;
  });
}

function contato(quadra, dia, hora) {
  const msg = encodeURIComponent(
    `Olá! Tenho interesse em reservar ${quadra} no dia ${dia} às ${hora}.`
  );

  window.open(`https://wa.me/5599999999999?text=${msg}`, "_blank");
}

renderizar();
