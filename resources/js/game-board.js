document.addEventListener('DOMContentLoaded', () => {
  let selectedZone = null;

  document.querySelectorAll('.add-dino-btn').forEach(btn => {
    btn.addEventListener('click', e => {
      selectedZone = e.target.dataset.zone;
      const modal = new bootstrap.Modal(document.getElementById('dinoModal'));
      modal.show();
    });
  });

  document.getElementById('saveDino').addEventListener('click', () => {
    const dinoType = document.getElementById('dinoType').value;
    const zoneDiv = document.querySelector(`.zone[data-zone="${selectedZone}"] .dinosaurs-list`);

    const newDino = document.createElement('span');
    newDino.textContent = dinoType;
    newDino.classList.add('badge', 'bg-success', 'me-1', 'mt-1');
    zoneDiv.appendChild(newDino);

    const modal = bootstrap.Modal.getInstance(document.getElementById('dinoModal'));
    modal.hide();

    fetch(`/games/save-dino`, {
      method: 'POST',
      headers: {
        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
        'Content-Type': 'application/json',
      },
      body: JSON.stringify({
        game_id: window.location.pathname.split('/').pop(),
        zone: selectedZone,
        dino: dinoType,
      })
    });
  });
});
