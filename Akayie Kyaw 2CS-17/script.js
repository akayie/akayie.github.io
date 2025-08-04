const days = ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday"];
const time = ["", "9:00 - 10:00", "10:05 - 11:05","11:05 - 12:00","1:00 - 2:00", "2:05 - 3:05", "3:05 - 4:05"];
const periodsPerDay = 6;
const subjectLimit = 4;
const fallbackLimit = 5;

function getRandomSubject(subjects, subjectCount) {
  const available = subjects.filter(sub => subjectCount[sub] < subjectLimit);
  if (available.length === 0) return null;
  return available[Math.floor(Math.random() * available.length)];
}

function generateTimetable() {
  const subjectInput = document.getElementById("subjectsInput").value;
  const subjects = subjectInput.split(",").map(s => s.trim()).filter(s => s);
  if (subjects.length === 0) return alert("Please enter at least one subject.");

  let subjectCount = {};
  subjects.forEach(sub => subjectCount[sub] = 0);

  let timetable = {};
  let fallbackToggle = true;
  let fallbackCount = 0;

  days.forEach(day => {
    timetable[day] = new Array(periodsPerDay).fill("");
    let dailySubjectCount = {};
    subjects.forEach(sub => dailySubjectCount[sub] = 0);

    for (let period = 0; period < periodsPerDay; period++) {
      if (period === periodsPerDay - 1) {
        // Last column for fallback
        if (fallbackCount < fallbackLimit) {
          timetable[day][period] = fallbackToggle ? "library" : "selfStudy";
          fallbackToggle = !fallbackToggle;
          fallbackCount++;
        }
        continue;
      }

      const subject = getRandomSubject(subjects, subjectCount);
      if (!subject || dailySubjectCount[subject] >= 2 || subjectCount[subject] >= subjectLimit) {
        continue;
      }

      const allowDouble = Math.random() < 0.4;
      timetable[day][period] = subject;
      subjectCount[subject]++;
      dailySubjectCount[subject]++;

      if (
        allowDouble &&
        period + 1 < periodsPerDay - 1 &&
        timetable[day][period + 1] === "" &&
        subjectCount[subject] < subjectLimit &&
        dailySubjectCount[subject] < 2
      ) {
        timetable[day][period + 1] = subject;
        subjectCount[subject]++;
        dailySubjectCount[subject]++;
        period++;
      }
    }
  });

  displayTimetable(timetable);
}

function displayTimetable(data) {
  const thead = document.querySelector("#timetable thead");
  const tbody = document.querySelector("#timetable tbody");
  thead.innerHTML = "";
  tbody.innerHTML = "";

  const headerRow = document.createElement("tr");
  headerRow.innerHTML = "<th>Day</th>";
  for (let i = 1; i <= periodsPerDay; i++) {
    headerRow.innerHTML += `<th>${time[i]}</th>`;
  }
  thead.appendChild(headerRow);

  for (let day of days) {
    const row = document.createElement("tr");
    row.innerHTML = `<td>${day}</td>`;
    data[day].forEach(cell => {
      row.innerHTML += `<td>${cell || ""}</td>`;
    });
    tbody.appendChild(row);
  }
}
