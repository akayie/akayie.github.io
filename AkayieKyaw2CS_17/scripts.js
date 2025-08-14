let currentUser = null;

function login() {
  const input = document.getElementById("usernameInput");
  const name = input.value.trim();
  if (!name) {
    alert("Please enter your name to proceed.");
    return;
  }
  currentUser = name;
  localStorage.setItem("loggedInUser", currentUser);

  document.getElementById("loginSection").style.display = "none";
  document.getElementById("appSection").style.display = "block";

  const weeks = parseInt(weekSelector.value);
  renderTableForMonth(currentYear, currentMonth, weeks);
}

// Auto-login if already logged in
window.addEventListener("DOMContentLoaded", () => {
  const savedUser = localStorage.getItem("loggedInUser");
  if (savedUser) {
    currentUser = savedUser;
    document.getElementById("loginSection").style.display = "none";
    document.getElementById("appSection").style.display = "block";
    const weeks = parseInt(weekSelector.value);
    renderTableForMonth(currentYear, currentMonth, weeks);
  }
});
function saveStudentField(year, month, index, field, value) {
  const key = `${currentUser}-student-${year}-${month}-${index}-info`;
  let data = JSON.parse(localStorage.getItem(key)) || {};
  data[field] = value;
  localStorage.setItem(key, JSON.stringify(data));
}

function loadStudentField(year, month, index, field) {
  const key = `${currentUser}-student-${year}-${month}-${index}-info`;
  const data = JSON.parse(localStorage.getItem(key));
  return data ? data[field] : null;
}

function saveAttendance(year, month, index, states) {
  const key = `${currentUser}-attendance-${year}-${month}-student-${index}`;
  localStorage.setItem(key, JSON.stringify(states));
}

function loadAttendance(year, month, index) {
  const key = `${currentUser}-attendance-${year}-${month}-student-${index}`;
  const data = localStorage.getItem(key);
  return data ? JSON.parse(data) : null;
}
function clearAllData() {
  if (!currentUser) return;

  for (let y = currentYear - 1; y <= currentYear + 1; y++) {
    for (let m = 1; m <= 12; m++) {
      for (let i = 0; i < studentCount; i++) {
        localStorage.removeItem(`${currentUser}-attendance-${y}-${m}-student-${i}`);
        localStorage.removeItem(`${currentUser}-student-${y}-${m}-${i}-info`);
      }
    }
  }
  location.reload();
}
function logout() {
  localStorage.removeItem("loggedInUser");
  location.reload();
}
