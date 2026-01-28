// Clique em reservar
document.querySelectorAll('.livre button').forEach(btn => {
  btn.addEventListener('click', () => {
    btn.innerText = 'Processando...';
    btn.style.opacity = '0.7';

    setTimeout(() => {
      alert('Reserva confirmada com sucesso 🟢');
      btn.innerText = 'Reservado';
      btn.style.background = '#555';
      btn.disabled = true;
    }, 800);
  });
});

// Animação ao rolar a página
const observer = new IntersectionObserver(entries => {
  entries.forEach(entry => {
    if(entry.isIntersecting){
      entry.target.style.opacity = 1;
      entry.target.style.transform = 'translateY(0)';
    }
  });
});

document.querySelectorAll('.court, .slot, .stat').forEach(el => {
  el.style.opacity = 0;
  el.style.transform = 'translateY(20px)';
  observer.observe(el);
});
