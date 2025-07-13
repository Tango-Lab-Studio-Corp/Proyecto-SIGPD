const fichas = document.querySelectorAll('.ficha');

fichas.forEach(ficha => {
  ficha.addEventListener('dragstart', e => {
    e.dataTransfer.setData('text/plain', ficha.className);
  });
});

const zonas = document.querySelectorAll('.zona');
zonas.forEach(zona => {
  zona.addEventListener('dragover', e => e.preventDefault());
  zona.addEventListener('drop', e => {
    e.preventDefault();
    const claseFicha = e.dataTransfer.getData('text/plain');
    const nuevaFicha = document.createElement('div');
    nuevaFicha.className = claseFicha;
    nuevaFicha.setAttribute('draggable', 'true');
    nuevaFicha.addEventListener('dragstart', e => {
      e.dataTransfer.setData('text/plain', nuevaFicha.className);
    });
    zona.appendChild(nuevaFicha);
  });
});