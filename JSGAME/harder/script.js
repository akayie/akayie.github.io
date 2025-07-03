const player = {
  name: "Hero",
  hp: 100,
  maxHp: 100,
  attack: 20,
  defense: 5,
  potions: 3
};

const enemy = {
  name: "Goblin",
  hp: 80,
  maxHp: 80,
  attack: 15,
  defense: 3
};

function log(message) {
  const logBox = document.getElementById('battle-log');
  logBox.innerHTML += `<p>${message}</p>`;
  logBox.scrollTop = logBox.scrollHeight;
}

function updateStats() {
  document.getElementById('player-stats').innerHTML = `Player HP: ${player.hp}/${player.maxHp} | Potions: ${player.potions}`;
  document.getElementById('enemy-stats').innerHTML = `Enemy HP: ${enemy.hp}/${enemy.maxHp}`;
}

function attack() {
  const damage = Math.max(0, player.attack - enemy.defense);
  enemy.hp -= damage;
  log(`You attack and deal ${damage} damage!`);
  enemyTurn();
  updateStats();
  checkWin();
}

function defend() {
  log("You defend and reduce damage!");
  enemyTurn(true);
  updateStats();
}

function usePotion() {
  if (player.potions > 0 && player.hp < player.maxHp) {
    player.hp = Math.min(player.maxHp, player.hp + 30);
    player.potions--;
    log("You used a potion and restored 30 HP!");
  } else {
    log("No potions left or HP is full!");
  }
  enemyTurn();
  updateStats();
}

function special() {
  const damage = Math.floor(Math.random() * 40) + 10;
  enemy.hp -= damage;
  log(`Special attack hits for ${damage} damage!`);
  enemyTurn();
  updateStats();
  checkWin();
}

function enemyTurn(playerDefending = false) {
  if (enemy.hp <= 0) return;
  let damage = Math.max(0, enemy.attack - player.defense);
  if (playerDefending) damage = Math.floor(damage / 2);
  player.hp -= damage;
  log(`Enemy attacks and deals ${damage} damage!`);
  checkLose();
}

function checkWin() {
  if (enemy.hp <= 0) {
    log("🎉 You won the battle!");
    document.getElementById('actions').style.display = 'none';
  }
}

function checkLose() {
  if (player.hp <= 0) {
    log("💀 You were defeated!");
    document.getElementById('actions').style.display = 'none';
  }
}

// Initialize
updateStats();
log("Battle started!");
