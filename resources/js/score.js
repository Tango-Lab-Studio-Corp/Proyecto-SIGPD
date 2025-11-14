// public/js/score.js
document.addEventListener('DOMContentLoaded', () => {
    const playerNameInput = document.getElementById('playerName');
    const startBtn = document.getElementById('startBtn');
    const gameBoard = document.getElementById('gameBoard');
    const currentScoreEl = document.getElementById('currentScore');
    const saveScoreBtn = document.getElementById('saveScore');
    const rankingList = document.getElementById('rankingList');

    let playerName = '';
    let currentScore = 0;

    // === INICIAR PARTIDA ===
    startBtn.addEventListener('click', () => {
        playerName = playerNameInput.value.trim();
        if (!playerName) {
            alert('Por favor, ingresa tu nombre');
            return;
        }

        // Mostrar tablero
        gameBoard.classList.remove('d-none');

        // Generar mano (ahora #playerHand existe)
        generateHand();

        // Cargar ranking
        loadRanking();
    });

    // === GENERAR 6 FICHAS ALEATORIAS ===
    function generateHand() {
        const hand = document.getElementById('playerHand');
        if (!hand) return; // Seguridad extra

        hand.innerHTML = '';
        const colors = ['white', 'red', 'blue', 'green', 'black', 'gold'];
        const values = ['1', '5', '10', '25', '100', '500'];

        for (let i = 0; i < 6; i++) {
            const color = colors[Math.floor(Math.random() * colors.length)];
            const value = values[Math.floor(Math.random() * values.length)];
            const chip = document.createElement('div');
            chip.className = `chip ${color}`;
            chip.textContent = value;
            chip.dataset.value = value;
            chip.dataset.color = color;
            chip.draggable = true;

            // Drag events
            chip.addEventListener('dragstart', e => {
                e.dataTransfer.effectAllowed = 'move';
                chip.classList.add('dragging');
            });
            chip.addEventListener('dragend', () => {
                chip.classList.remove('dragging');
            });

            hand.appendChild(chip);
        }
    }

    // === DRAG & DROP ===
    document.querySelectorAll('.chip-container').forEach(container => {
        container.addEventListener('dragover', e => {
            e.preventDefault();
            container.classList.add('dropzone-highlight');
        });

        container.addEventListener('dragleave', () => {
            container.classList.remove('dropzone-highlight');
        });

        container.addEventListener('drop', e => {
            e.preventDefault();
            container.classList.remove('dropzone-highlight');

            const dragged = document.querySelector('.dragging');
            if (dragged && dragged.closest('#playerHand')) {
                const clone = dragged.cloneNode(true);
                clone.draggable = false;
                clone.style.cursor = 'pointer';
                clone.addEventListener('click', () => {
                    clone.remove();
                    calculate();
                });
                container.appendChild(clone);
                dragged.remove();
                calculate();
            }
        });
    });

    // === CÁLCULO DE PUNTUACIÓN ===
    function calculate() {
        currentScore = 0;
        const zones = {};

        document.querySelectorAll('.chip-container').forEach(c => {
            const zone = c.closest('[data-zone]')?.dataset.zone || 'losers';
            zones[zone] = Array.from(c.children).map(ch => ({
                value: ch.textContent,
                color: [...ch.classList].find(cls => cls !== 'chip' && cls !== 'dragging')
            }));
        });

        // 1. COLOR ENJOYER
        if (zones['color-enjoyer']?.length > 0) {
            const counts = {};
            zones['color-enjoyer'].forEach(c => counts[c.color] = (counts[c.color] || 0) + 1);
            currentScore += Math.max(...Object.values(counts));
        }

        // 2. PARES O NADA
        if (zones['pares-o-nada']) {
            const counts = {};
            zones['pares-o-nada'].forEach(c => counts[c.value] = (counts[c.value] || 0) + 1);
            Object.values(counts).forEach(n => { if (n >= 2) currentScore += 5; });
        }

        // 3. BACCARAT 3
        if (zones['baccarat-3']?.length === 3) currentScore += 5;

        // 4. SUFRIENDO DEL ÉXITO
        if (zones['sufriendo-exito']?.length === 1) currentScore += 7;

        // 5. MESA MIL CARAS
        if (zones['mesa-mil-caras']) {
            currentScore += new Set(zones['mesa-mil-caras'].map(c => c.value)).size;
        }

        // 6. MESA ABANDONADA
        if (zones['mesa-abandonada']?.length === 1) {
            const val = zones['mesa-abandonada'][0].value;
            let exists = false;
            Object.keys(zones).forEach(k => {
                if (k !== 'mesa-abandonada' && zones[k].some(c => c.value === val)) exists = true;
            });
            if (!exists) currentScore += 7;
        }

        // 7. PERDEDORES
        if (zones['losers']) currentScore += zones['losers'].length;

        currentScoreEl.textContent = currentScore;
    }

    // === GUARDAR EN RANKING ===
    saveScoreBtn.addEventListener('click', () => {
        if (currentScore === 0) return alert('Primero genera puntos');
        if (confirm(`¿Guardar ${currentScore} puntos para ${playerName}?`)) {
            fetch('/api/scores', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify({ name: playerName, score: currentScore })
            })
            .then(r => r.json())
            .then(() => {
                alert(`¡${playerName} en el ranking con ${currentScore} pts!`);
                loadRanking();
                document.querySelectorAll('.chip-container').forEach(c => c.innerHTML = '');
                generateHand();
                currentScore = 0;
                currentScoreEl.textContent = '0';
            })
            .catch(err => {
                console.error(err);
                alert('Error al guardar. Revisa la consola.');
            });
        }
    });

    // === CARGAR RANKING ===
    function loadRanking() {
        fetch('/api/scores')
            .then(r => r.json())
            .then(data => {
                rankingList.innerHTML = data.length === 0
                    ? '<p class="text-center text-muted col-12">Aún no hay ganadores</p>'
                    : data.map((s, i) => `
                        <div class="col">
                            <div class="card ranking-card text-white h-100">
                                <div class="card-body text-center d-flex flex-column justify-content-center">
                                    <div class="ranking-position">#${i + 1}</div>
                                    <h5 class="mt-2">${s.name}</h5>
                                    <p class="mb-0 text-success fs-3">${s.score} pts</p>
                                    <small class="text-muted">${new Date(s.created_at).toLocaleDateString('es-UY')}</small>
                                </div>
                            </div>
                        </div>
                    `).join('');
            })
            .catch(() => {
                rankingList.innerHTML = '<p class="text-center text-danger col-12">Error al cargar ranking</p>';
            });
    }

    // Cargar ranking al inicio
    loadRanking();
});