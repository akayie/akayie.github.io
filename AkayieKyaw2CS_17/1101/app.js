// ✅ Check if user is logged in
function isLoggedIn() {
  const user = localStorage.getItem("user");
  if (!user) return false;

  try {
    const parsed = JSON.parse(user);
    return parsed.loggedIn === true && !!parsed.username;
  } catch (e) {
    return false;
  }
}

// ✅ Register new user
function registerUser(username, role) {
  const userData = {
    username,
    role,
    registeredAt: Date.now(),
    loggedIn: true
  };
  localStorage.setItem("user", JSON.stringify(userData));
}

// ✅ Show registration form
function showRegistrationPage() {
  document.body.innerHTML = `
    <h2>Register</h2>
    <input id="username" placeholder="Enter username" />
    <select id="role">
      <option value="student">Student</option>
      <option value="teacher">Teacher</option>
    </select>
    <button onclick="handleRegister()">Register</button>
  `;
}

// ✅ Handle registration button click
function handleRegister() {
  const username = document.getElementById("username").value.trim();
  const role = document.getElementById("role").value;

  if (!username) {
    alert("Please enter a username.");
    return;
  }

  registerUser(username, role);
  routeUser(); // redirect to user page
}

// ✅ Show user-specific page
function showUserPage(user) {
  document.body.innerHTML = `
    <h2>Welcome, ${user.username}</h2>
    <p>Your role: ${user.role}</p>
    <button onclick="logout()">Logout</button>
  `;

  // Optional: role-based content
  if (user.role === "student") {
    document.body.innerHTML += `<p>📚 Access your timetable and assignments.</p>`;
  } else if (user.role === "teacher") {
    document.body.innerHTML += `<p>🧑‍🏫 Manage your classes and schedules.</p>`;
  }
}

// ✅ Logout function
function logout() {
  localStorage.removeItem("user");
  routeUser(); // go back to registration
}

// ✅ Routing logic
function routeUser() {
  if (!isLoggedIn()) {
    showRegistrationPage();
  } else {
    const user = JSON.parse(localStorage.getItem("user"));
    showUserPage(user);
  }
}

// ✅ Initialize app
document.addEventListener("DOMContentLoaded", routeUser);
