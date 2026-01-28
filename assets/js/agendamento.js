const horarios = [
  "06:00","07:00","08:00","09:00","10:00",
  "11:00","12:00","13:00","14:00","15:00"
];

const grade = document.getElementById("gradeHorarios");

horarios.forEach(h => {
  let linha = `<tr><td><strong>${h}</strong></td>`;
  for (let i = 0; i < 7; i++) {
    linha += `<td><div class="slot">Livre</div></td>`;
  }
  linha += `</tr>`;
  grade.innerHTML += linha;
});
