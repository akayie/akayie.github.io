const dayHeaderRow1 = document.getElementById("headerRow1");
const dayHeaderRow2 = document.getElementById("headerRow2");
const studentBody = document.getElementById("studentBody");
const weekSelector = document.getElementById("weekSelector");

const days = ["Mon", "Tue", "Wed", "Thu", "Fri"];
const sessions = ["AM", "PM"];
const studentCount = 16;

let currentYear = new Date().getFullYear();
let currentMonth = new Date().getMonth() + 1; // 1-based month

const prevBtn = document.getElementById("prevBtn");
const nextBtn = document.getElementById("nextBtn");
const monthDisplay = document.getElementById("monthDisplay");

prevBtn.addEventListener("click", () => {
  changeMonth(-1);
});
nextBtn.addEventListener("click", () => {
  changeMonth(1);
});

weekSelector.addEventListener("change", () => {
  renderTableForMonth(currentYear, currentMonth, parseInt(weekSelector.value));
});

function changeMonth(delta) {
  currentMonth += delta;
  if (currentMonth < 1) {
    currentMonth = 12;
    currentYear -= 1;
  } else if (currentMonth > 12) {
    currentMonth = 1;
    currentYear += 1;
  }
  // Render with current weeks selection
  const weeks = parseInt(weekSelector.value);
  renderTableForMonth(currentYear, currentMonth, weeks);
}

function formatMonthYear(year, month) {
  const date = new Date(year, month - 1);
  return date.toLocaleString('default', { month: 'long', year: 'numeric' });
}

function renderTableForMonth(year, month, weeks) {
  monthDisplay.textContent = formatMonthYear(year, month);
  renderTable(weeks, year, month);
}

function renderTable(weeks, year, month) {
  // Clear previous content
  dayHeaderRow1.innerHTML = '<th rowspan="2">#</th><th rowspan="2">Roll No</th><th rowspan="2">Name</th>';
  dayHeaderRow2.innerHTML = '';
  studentBody.innerHTML = '';

  // Header Row 1
  for (let w = 1; w <= weeks; w++) {
    for (let day of days) {
      const th = document.createElement("th");
      th.textContent = day;
      th.colSpan = 2;
      dayHeaderRow1.appendChild(th);
    }
  }

  // Header Row 2 (AM/PM)
  for (let w = 1; w <= weeks; w++) {
    for (let day of days) {
      for (let session of sessions) {
        const th = document.createElement("th");
        th.textContent = session;
        dayHeaderRow2.appendChild(th);
      }
    }
  }

  const totalSessions = weeks * days.length * sessions.length;

  // Student Rows
  for (let i = 0; i < studentCount; i++) {
    const tr = document.createElement("tr");

    // Index
    const indexTd = document.createElement("td");
    indexTd.textContent = i + 1;
    tr.appendChild(indexTd);

    // Roll No
    const rollTd = document.createElement("td");
    const rollInput = document.createElement("input");
    rollInput.type = "text";
    rollInput.placeholder = `2CS-${i + 1}`;
    rollInput.value = loadStudentField(year, month, i, "roll") || "";
    rollInput.addEventListener("input", () => {
      saveStudentField(year, month, i, "roll", rollInput.value);
    });
    rollTd.appendChild(rollInput);
    tr.appendChild(rollTd);

    // Name
    const nameTd = document.createElement("td");
    const nameInput = document.createElement("input");
    nameInput.type = "text";
    nameInput.placeholder = "နာမည်";
    nameInput.value = loadStudentField(year, month, i, "name") || "";
    nameInput.addEventListener("input", () => {
      saveStudentField(year, month, i, "name", nameInput.value);
    });
    nameTd.appendChild(nameInput);
    tr.appendChild(nameTd);

    // Attendance checkboxes
    for (let j = 0; j < totalSessions; j++) {
      const td = document.createElement("td");
      const checkbox = document.createElement("input");
      checkbox.type = "checkbox";
      checkbox.classList.add(`student-${i}`);
      checkbox.addEventListener("change", () => updateTotal(year, month, i, totalSessions));
      td.appendChild(checkbox);
      tr.appendChild(td);
    }

    // Total column
    const totalTd = document.createElement("td");
    totalTd.id = `total-${i}`;
    totalTd.textContent = "0 (0%)";
    tr.appendChild(totalTd);

    studentBody.appendChild(tr);

    // Restore checkbox states
    restoreCheckboxStates(year, month, i, totalSessions);
  }
}

function updateTotal(year, month, index, totalSessions) {
  const checkboxes = document.querySelectorAll(`.student-${index}`);
  const checked = Array.from(checkboxes).filter(cb => cb.checked).length;
  const percent = Math.round((checked / totalSessions) * 100);
  document.getElementById(`total-${index}`).textContent = `${checked} (${percent}%)`;

  const states = Array.from(checkboxes).map(cb => cb.checked);
  saveAttendance(year, month, index, states);
}

function restoreCheckboxStates(year, month, index, totalSessions) {
  const states = loadAttendance(year, month, index);
  if (!states) return;

  const checkboxes = document.querySelectorAll(`.student-${index}`);

  states.forEach((checked, i) => {
    if (checkboxes[i]) {
      checkboxes[i].checked = checked;
    }
  });

  updateTotal(year, month, index, totalSessions);
}

function saveStudentField(year, month, index, field, value) {
  const key = `student-${year}-${month}-${index}-info`;
  let data = JSON.parse(localStorage.getItem(key)) || {};
  data[field] = value;
  localStorage.setItem(key, JSON.stringify(data));
}

function loadStudentField(year, month, index, field) {
  const key = `student-${year}-${month}-${index}-info`;
  const data = JSON.parse(localStorage.getItem(key));
  return data ? data[field] : null;
}

function saveAttendance(year, month, index, states) {
  const key = `attendance-${year}-${month}-student-${index}`;
  localStorage.setItem(key, JSON.stringify(states));
}

function loadAttendance(year, month, index) {
  const key = `attendance-${year}-${month}-student-${index}`;
  const data = localStorage.getItem(key);
  return data ? JSON.parse(data) : null;
}

function clearAllData() {
  for (let y = currentYear - 1; y <= currentYear + 1; y++) {
    for (let m = 1; m <= 12; m++) {
      for (let i = 0; i < studentCount; i++) {
        localStorage.removeItem(`attendance-${y}-${m}-student-${i}`);
        localStorage.removeItem(`student-${y}-${m}-${i}-info`);
      }
    }
  }
  location.reload();
}
student-[YEAR]-[MONTH]-[STUDENT_INDEX]-info
attendance-[YEAR]-[MONTH]-student-[STUDENT_INDEX]
function loadStudentField(year, month, index, field) {
  const key = `student-${year}-${month}-${index}-info`;
  const data = JSON.parse(localStorage.getItem(key));
  return data ? data[field] : null;
}
function saveAttendance(year, month, index, states) {
  const key = `attendance-${year}-${month}-student-${index}`;
  localStorage.setItem(key, JSON.stringify(states));
}
function loadAttendance(year, month, index) {
  const key = `attendance-${year}-${month}-student-${index}`;
  const data = localStorage.getItem(key);
  return data ? JSON.parse(data) : null;
}
// Attendance checkbox change handler example:
checkbox.addEventListener("change", () => {
  // get all checkbox states for student i
  const states = Array.from(document.querySelectorAll(`.student-${i}`)).map(cb => cb.checked);
  saveAttendance(currentYear, currentMonth, i, states);
});
// On page load/render, when creating inputs for RollNo and Name:
rollInput.value = loadStudentField(currentYear, currentMonth, i, "roll") || "";
nameInput.value = loadStudentField(currentYear, currentMonth, i, "name") || "";
function renderTable(weeks, year, month) {
  // Clear previous content
  dayHeaderRow1.innerHTML = '<th rowspan="2">#</th><th rowspan="2">Roll No</th><th rowspan="2">Name</th>';
  dayHeaderRow2.innerHTML = '';
  studentBody.innerHTML = '';

  // ... header rows generation here ...

  const totalSessions = weeks * days.length * sessions.length;

  for (let i = 0; i < studentCount; i++) {
    const tr = document.createElement("tr");

    // Index
    const indexTd = document.createElement("td");
    indexTd.textContent = i + 1;
    tr.appendChild(indexTd);

    // Roll No input
    const rollTd = document.createElement("td");
    const rollInput = document.createElement("input");
    rollInput.type = "text";
    rollInput.placeholder = `2CS-${i + 1}`;
    rollInput.value = loadStudentField(year, month, i, "roll") || "";

    // Capture year, month, i in closure for event listener
    rollInput.addEventListener("input", () => {
      saveStudentField(year, month, i, "roll", rollInput.value);
    });
    rollTd.appendChild(rollInput);
    tr.appendChild(rollTd);
// Header Row 1: days with colspan=2 for AM/PM
dayHeaderRow1.innerHTML = '<th rowspan="2">#</th><th rowspan="2">Roll No</th><th rowspan="2">Name</th>';
for (let w = 1; w <= weeks; w++) {
  for (let day of days) {
    const th = document.createElement("th");
    th.textContent = day;    // Day name (Mon, Tue...)
    th.colSpan = 2;          // colspan 2 for AM & PM sessions
    dayHeaderRow1.appendChild(th);
  }
}

// Header Row 2: AM/PM sessions under each day
// dayHeaderRow2.innerHTML = '';
// for (let w = 1; w <= weeks; w++) {
//   for (let day of days) {
//     for (let session of sessions) {
//       const th = document.createElement("th");
//       th.textContent = session;  // AM or PM
//       dayHeaderRow2.appendChild(th);
//     }
//   }
// }

    // Name input
    const nameTd = document.createElement("td");
    const nameInput = document.createElement("input");
    nameInput.type = "text";
    nameInput.placeholder = "နာမည်";
    nameInput.value = loadStudentField(year, month, i, "name") || "";

    nameInput.addEventListener("input", () => {
      saveStudentField(year, month, i, "name", nameInput.value);
    });
    nameTd.appendChild(nameInput);
    tr.appendChild(nameTd);

    // Attendance checkboxes
    for (let j = 0; j < totalSessions; j++) {
      const td = document.createElement("td");
      const checkbox = document.createElement("input");
      checkbox.type = "checkbox";
      checkbox.classList.add(`student-${i}`);

      // Capture year, month, i in closure here as well
      checkbox.addEventListener("change", () => {
        updateTotal(year, month, i, totalSessions);
      });
      td.appendChild(checkbox);
      tr.appendChild(td);
    }

    // Total column
    const totalTd = document.createElement("td");
    totalTd.id = `total-${i}`;
    totalTd.textContent = "0 (0%)";
    tr.appendChild(totalTd);

    studentBody.appendChild(tr);

    // Restore checkbox states for this student and month/year
    restoreCheckboxStates(year, month, i, totalSessions);
  }
}
