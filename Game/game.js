const canvas = document.getElementById("gameCanvas");
const ctx = canvas.getContext("2d");

canvas.width = 360;
canvas.height = 640;

let shooter = { x: canvas.width / 2 - 15, y: canvas.height - 40, width: 30, height: 30 };
let bullets = [];
let objects = [];

function drawShooter() {
  ctx.fillStyle = "#0f0";
  ctx.fillRect(shooter.x, shooter.y, shooter.width, shooter.height);
}

function drawBullets() {
  ctx.fillStyle = "#ff0";
  bullets.forEach((b) => {
    ctx.fillRect(b.x, b.y, 5, 10);
    b.y -= 5;
  });
}

function drawObjects() {
  ctx.fillStyle = "#f00";
  for (let i = 0; i < objects.length; i++) {
    let obj = objects[i];
    ctx.fillRect(obj.x, obj.y, 20, 20);
    obj.y += 2;
  }
}


function spawnObject() {
  let x = Math.random() * (canvas.width - 20);
  objects.push({ x, y: 0 });
}

function moveLeft() {
  shooter.x = Math.max(0, shooter.x - 20);
}

function moveRight() {
  shooter.x = Math.min(canvas.width - shooter.width, shooter.x + 20);
}

function shoot() {
  bullets.push({ x: shooter.x + shooter.width / 2 - 2.5, y: shooter.y });
}

function detectCollisions() {
  bullets.forEach((b, bi) => {
    objects.forEach((o, oi) => {
      if (
        b.x < o.x + 20 &&
        b.x + 5 > o.x &&
        b.y < o.y + 20 &&
        b.y + 10 > o.y
      ) {
        objects.splice(oi, 1);
        bullets.splice(bi, 1);
      }
    });
  });
}

function gameLoop() {
  ctx.clearRect(0, 0, canvas.width, canvas.height);
  drawShooter();
  drawBullets();
  drawObjects();
  detectCollisions();
  requestAnimationFrame(gameLoop);
}

setInterval(spawnObject, 1500);
gameLoop();
