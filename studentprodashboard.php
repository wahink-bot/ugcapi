<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>BioTask — Project Tracker</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700;800&family=DM+Sans:wght@400;500&display=swap" rel="stylesheet">
<style>
/* ── Variables ─────────────────────────────────── */
:root {
  --blue:       #1d6ef5;
  --blue-mid:   #3b82f6;
  --blue-light: #eff6ff;
  --blue-pale:  #f0f7ff;
  --blue-dim:   #dbeafe;
  --blue-dark:  #1e40af;
  --green:      #16a34a;
  --green-bg:   #f0fdf4;
  --bg:         #f8faff;
  --white:      #ffffff;
  --border:     #e2ebff;
  --border2:    #cddcff;
  --text:       #0f172a;
  --text2:      #475569;
  --text3:      #94a3b8;
  --shadow-sm:  0 1px 4px #1d6ef512, 0 0 0 1px #e2ebff;
  --shadow:     0 4px 20px #1d6ef518;
  --shadow-lg:  0 8px 40px #1d6ef520;
  --radius:     14px;
  --radius-sm:  9px;
  --font-head:  'Outfit', sans-serif;
  --font-body:  'DM Sans', sans-serif;
}

/* ── Reset ─────────────────────────────────────── */
*, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
body {
  font-family: var(--font-body);
  background: var(--bg);
  color: var(--text);
  min-height: 100vh;
  line-height: 1.6;
}
button { cursor: pointer; border: none; background: none; font-family: inherit; }
input, textarea { font-family: inherit; }

/* ── Layout ────────────────────────────────────── */
.page-wrap {
  max-width: 860px;
  margin: 0 auto;
  padding: 2.5rem 1.25rem 4rem;
}

/* ── Header ────────────────────────────────────── */
.header {
  text-align: center;
  margin-bottom: 2.5rem;
  animation: fadeDown 0.5s ease;
}
.header-logo {
  display: inline-flex;
  align-items: center;
  gap: 0.6rem;
  margin-bottom: 0.75rem;
}
.logo-dot {
  width: 36px; height: 36px;
  background: var(--blue);
  border-radius: 10px;
  display: flex; align-items: center; justify-content: center;
  font-size: 1.25rem;
  box-shadow: 0 4px 14px #1d6ef440;
}
.logo-name {
  font-family: var(--font-head);
  font-weight: 800;
  font-size: 1.5rem;
  color: var(--blue-dark);
  letter-spacing: -0.02em;
}
.logo-name span { color: var(--blue); }
.header p {
  color: var(--text2);
  font-size: 0.9375rem;
}

/* ── Summary Bar ───────────────────────────────── */
.summary-bar {
  display: flex;
  gap: 0.875rem;
  margin-bottom: 2rem;
  animation: fadeDown 0.55s ease;
}
.summary-pill {
  flex: 1;
  background: var(--white);
  border: 1px solid var(--border);
  border-radius: var(--radius);
  padding: 0.875rem 1rem;
  text-align: center;
  box-shadow: var(--shadow-sm);
}
.summary-pill .val {
  font-family: var(--font-head);
  font-size: 1.75rem;
  font-weight: 800;
  color: var(--blue);
  line-height: 1;
}
.summary-pill .lbl {
  font-size: 0.75rem;
  color: var(--text3);
  text-transform: uppercase;
  letter-spacing: 0.06em;
  margin-top: 0.25rem;
}

/* ── Add Project Form ──────────────────────────── */
.add-project-wrap {
  background: var(--white);
  border: 1.5px dashed var(--border2);
  border-radius: var(--radius);
  padding: 1.25rem;
  margin-bottom: 1.75rem;
  animation: fadeDown 0.6s ease;
  transition: border-color 0.2s, box-shadow 0.2s;
}
.add-project-wrap:focus-within {
  border-color: var(--blue-mid);
  box-shadow: 0 0 0 4px #1d6ef510;
}
.add-project-row {
  display: flex;
  gap: 0.625rem;
  align-items: center;
}
.input-project {
  flex: 1;
  padding: 0.65rem 1rem;
  border: 1.5px solid var(--border);
  border-radius: var(--radius-sm);
  font-size: 0.9375rem;
  font-weight: 500;
  color: var(--text);
  background: var(--blue-pale);
  transition: border-color 0.2s, box-shadow 0.2s;
}
.input-project::placeholder { color: var(--text3); font-weight: 400; }
.input-project:focus { outline: none; border-color: var(--blue); box-shadow: 0 0 0 3px #1d6ef515; background: var(--white); }

.input-deadline {
  padding: 0.65rem 0.875rem;
  border: 1.5px solid var(--border);
  border-radius: var(--radius-sm);
  font-size: 0.875rem;
  color: var(--text2);
  background: var(--blue-pale);
  transition: border-color 0.2s;
  width: 148px;
}
.input-deadline:focus { outline: none; border-color: var(--blue); background: var(--white); }

.btn-add-project {
  padding: 0.65rem 1.25rem;
  background: var(--blue);
  color: white;
  border-radius: var(--radius-sm);
  font-family: var(--font-head);
  font-weight: 700;
  font-size: 0.9rem;
  letter-spacing: 0.01em;
  transition: background 0.15s, transform 0.1s, box-shadow 0.15s;
  box-shadow: 0 2px 10px #1d6ef430;
  white-space: nowrap;
}
.btn-add-project:hover { background: var(--blue-dark); transform: translateY(-1px); box-shadow: 0 4px 16px #1d6ef440; }
.btn-add-project:active { transform: translateY(0); }

/* ── Project Card ──────────────────────────────── */
.projects-list { display: flex; flex-direction: column; gap: 1.25rem; }

.project-card {
  background: var(--white);
  border: 1px solid var(--border);
  border-radius: var(--radius);
  box-shadow: var(--shadow-sm);
  overflow: hidden;
  animation: slideUp 0.3s ease;
  transition: box-shadow 0.2s;
}
.project-card:hover { box-shadow: var(--shadow); }

.project-header {
  display: flex;
  align-items: center;
  gap: 0.875rem;
  padding: 1rem 1.25rem 0.875rem;
  border-bottom: 1px solid var(--border);
  cursor: pointer;
  user-select: none;
  transition: background 0.15s;
}
.project-header:hover { background: var(--blue-pale); }

.project-color-tag {
  width: 5px;
  height: 40px;
  border-radius: 99px;
  flex-shrink: 0;
}

.project-info { flex: 1; min-width: 0; }
.project-name {
  font-family: var(--font-head);
  font-weight: 700;
  font-size: 1rem;
  color: var(--text);
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
}
.project-meta {
  display: flex;
  align-items: center;
  gap: 0.75rem;
  margin-top: 0.2rem;
}
.project-deadline {
  font-size: 0.75rem;
  color: var(--text3);
  display: flex;
  align-items: center;
  gap: 0.3rem;
}
.project-deadline.overdue { color: #dc2626; }

.progress-wrap { display: flex; align-items: center; gap: 0.625rem; }
.progress-bar {
  width: 90px;
  height: 5px;
  background: var(--blue-dim);
  border-radius: 99px;
  overflow: hidden;
}
.progress-fill {
  height: 100%;
  background: linear-gradient(90deg, var(--blue), var(--blue-mid));
  border-radius: 99px;
  transition: width 0.5s cubic-bezier(.4,0,.2,1);
}
.progress-fill.complete { background: linear-gradient(90deg, var(--green), #22c55e); }
.progress-text {
  font-size: 0.75rem;
  font-weight: 600;
  color: var(--text3);
  white-space: nowrap;
}

.project-actions { display: flex; gap: 0.375rem; align-items: center; }
.btn-icon {
  width: 2rem; height: 2rem;
  border-radius: 7px;
  display: flex; align-items: center; justify-content: center;
  font-size: 0.95rem;
  color: var(--text3);
  transition: background 0.15s, color 0.15s;
}
.btn-icon:hover { background: var(--blue-dim); color: var(--blue); }
.btn-icon.danger:hover { background: #fee2e2; color: #dc2626; }

.chevron {
  font-size: 0.75rem;
  color: var(--text3);
  transition: transform 0.25s;
}
.project-card.collapsed .chevron { transform: rotate(-90deg); }

/* ── Tasks Body ────────────────────────────────── */
.tasks-body {
  padding: 0.75rem 1.25rem 1rem;
}
.project-card.collapsed .tasks-body { display: none; }

/* ── Task Row ──────────────────────────────────── */
.task-list { display: flex; flex-direction: column; gap: 0.35rem; margin-bottom: 0.875rem; }

.task-row {
  display: flex;
  align-items: center;
  gap: 0.75rem;
  padding: 0.55rem 0.75rem;
  border-radius: var(--radius-sm);
  transition: background 0.15s;
  cursor: pointer;
}
.task-row:hover { background: var(--blue-pale); }
.task-row.done { background: var(--green-bg); }
.task-row.done:hover { background: #dcfce7; }

/* Custom checkbox */
.task-check {
  width: 20px; height: 20px;
  border: 2px solid var(--border2);
  border-radius: 6px;
  flex-shrink: 0;
  display: flex; align-items: center; justify-content: center;
  transition: border-color 0.15s, background 0.15s, transform 0.1s;
  background: white;
}
.task-row:hover .task-check { border-color: var(--blue-mid); }
.task-row.done .task-check {
  background: var(--green);
  border-color: var(--green);
  transform: scale(1.05);
}
.task-check svg { opacity: 0; transform: scale(0.5); transition: opacity 0.15s, transform 0.2s; }
.task-row.done .task-check svg { opacity: 1; transform: scale(1); }

.task-name {
  flex: 1;
  font-size: 0.9rem;
  font-weight: 500;
  color: var(--text);
  transition: color 0.15s;
}
.task-row.done .task-name {
  color: var(--text3);
  text-decoration: line-through;
  text-decoration-color: #94a3b860;
}

.btn-del-task {
  width: 1.5rem; height: 1.5rem;
  border-radius: 5px;
  font-size: 0.8rem;
  color: var(--text3);
  opacity: 0;
  transition: opacity 0.15s, background 0.15s, color 0.15s;
  display: flex; align-items: center; justify-content: center;
}
.task-row:hover .btn-del-task { opacity: 1; }
.btn-del-task:hover { background: #fee2e2; color: #dc2626; }

/* ── Add Task Row ──────────────────────────────── */
.add-task-row {
  display: flex;
  gap: 0.5rem;
  align-items: center;
  padding-top: 0.25rem;
  border-top: 1px dashed var(--border);
}
.input-task {
  flex: 1;
  padding: 0.5rem 0.75rem;
  border: 1.5px solid var(--border);
  border-radius: var(--radius-sm);
  font-size: 0.875rem;
  color: var(--text);
  background: var(--blue-pale);
  transition: border-color 0.2s, background 0.2s;
}
.input-task::placeholder { color: var(--text3); }
.input-task:focus { outline: none; border-color: var(--blue-mid); background: white; }
.btn-add-task {
  padding: 0.5rem 0.9rem;
  background: var(--blue-dim);
  color: var(--blue-dark);
  border-radius: var(--radius-sm);
  font-family: var(--font-head);
  font-weight: 700;
  font-size: 0.8125rem;
  transition: background 0.15s, color 0.15s;
}
.btn-add-task:hover { background: var(--blue); color: white; }

/* ── Empty State ───────────────────────────────── */
.empty-tasks {
  text-align: center;
  color: var(--text3);
  font-size: 0.85rem;
  padding: 1rem 0 0.5rem;
}

/* ── No Projects ───────────────────────────────── */
.no-projects {
  text-align: center;
  padding: 3rem 1rem;
  color: var(--text3);
  animation: fadeDown 0.5s ease;
}
.no-projects .icon { font-size: 3rem; margin-bottom: 0.75rem; }
.no-projects p { font-size: 0.9375rem; }

/* ── Animations ────────────────────────────────── */
@keyframes fadeDown { from { opacity: 0; transform: translateY(-12px); } to { opacity: 1; transform: translateY(0); } }
@keyframes slideUp  { from { opacity: 0; transform: translateY(16px); }  to { opacity: 1; transform: translateY(0); } }
@keyframes pop      { 0% { transform: scale(1); } 50% { transform: scale(1.12); } 100% { transform: scale(1); } }

/* ── Responsive ────────────────────────────────── */
@media (max-width: 560px) {
  .summary-bar { gap: 0.5rem; }
  .summary-pill .val { font-size: 1.35rem; }
  .add-project-row { flex-wrap: wrap; }
  .input-deadline { width: 100%; }
  .input-project { min-width: 0; }
  .btn-add-project { width: 100%; text-align: center; }
}
</style>
</head>
<body>
<div class="page-wrap">

  <!-- Header -->
  <header class="header">
    <div class="header-logo">
      <div class="logo-dot">🧬</div>
      <span class="logo-name">Bio<span>Task</span></span>
    </div>
    <p>Track your research projects and tasks</p>
  </header>

  <!-- Summary Bar -->
  <div class="summary-bar">
    <div class="summary-pill">
      <div class="val" id="sumProjects">0</div>
      <div class="lbl">Projects</div>
    </div>
    <div class="summary-pill">
      <div class="val" id="sumTasks">0</div>
      <div class="lbl">Total Tasks</div>
    </div>
    <div class="summary-pill">
      <div class="val" id="sumDone">0</div>
      <div class="lbl">Completed</div>
    </div>
    <div class="summary-pill">
      <div class="val" id="sumPct">0%</div>
      <div class="lbl">Progress</div>
    </div>
  </div>

  <!-- Add Project -->
  <div class="add-project-wrap">
    <div class="add-project-row">
      <input type="text" class="input-project" id="newProjectName"
             placeholder="➕  New project name…" maxlength="80">
      <input type="date" class="input-deadline" id="newProjectDeadline">
      <button class="btn-add-project" onclick="addProject()">Add Project</button>
    </div>
  </div>

  <!-- Projects List -->
  <div class="projects-list" id="projectsList"></div>
  <div class="no-projects" id="noProjects" style="display:none">
    <div class="icon">📋</div>
    <p>No projects yet — add your first one above!</p>
  </div>

</div>

<script>
// ── Palette for project color tags ──────────────────────────────────────────
const COLORS = ['#1d6ef5','#7c3aed','#0891b2','#059669','#d97706','#db2777','#dc2626','#0369a1'];

// ── State ────────────────────────────────────────────────────────────────────
let projects = JSON.parse(localStorage.getItem('bt_projects') || '[]');

function save() {
  localStorage.setItem('bt_projects', JSON.stringify(projects));
}

// ── Render ───────────────────────────────────────────────────────────────────
function render() {
  const list = document.getElementById('projectsList');
  const none = document.getElementById('noProjects');
  list.innerHTML = '';

  if (!projects.length) { none.style.display = ''; return; }
  none.style.display = 'none';

  projects.forEach((proj, pi) => {
    const total = proj.tasks.length;
    const done  = proj.tasks.filter(t => t.done).length;
    const pct   = total ? Math.round(done / total * 100) : 0;
    const color = COLORS[pi % COLORS.length];

    const today = new Date().toISOString().slice(0, 10);
    const overdue = proj.deadline && proj.deadline < today && pct < 100;

    const card = document.createElement('div');
    card.className = 'project-card' + (proj.collapsed ? ' collapsed' : '');
    card.dataset.pi = pi;

    // Task rows HTML
    const taskRowsHTML = proj.tasks.length
      ? proj.tasks.map((t, ti) => `
        <div class="task-row ${t.done ? 'done' : ''}" onclick="toggleTask(${pi},${ti})">
          <div class="task-check">
            <svg width="12" height="12" viewBox="0 0 12 12" fill="none">
              <path d="M2 6l3 3 5-5" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
          </div>
          <span class="task-name">${escHtml(t.name)}</span>
          <button class="btn-del-task" onclick="delTask(event,${pi},${ti})" title="Remove task">✕</button>
        </div>`).join('')
      : `<div class="empty-tasks">No tasks yet — add one below</div>`;

    card.innerHTML = `
      <div class="project-header" onclick="toggleCollapse(${pi})">
        <div class="project-color-tag" style="background:${color}"></div>
        <div class="project-info">
          <div class="project-name">${escHtml(proj.name)}</div>
          <div class="project-meta">
            ${proj.deadline ? `<span class="project-deadline ${overdue?'overdue':''}">📅 ${proj.deadline}${overdue?' — overdue':''}</span>` : ''}
            <div class="progress-wrap">
              <div class="progress-bar">
                <div class="progress-fill ${pct===100?'complete':''}" style="width:${pct}%"></div>
              </div>
              <span class="progress-text">${done}/${total}</span>
            </div>
          </div>
        </div>
        <div class="project-actions" onclick="event.stopPropagation()">
          <button class="btn-icon danger" onclick="delProject(${pi})" title="Delete project">🗑</button>
        </div>
        <span class="chevron">▾</span>
      </div>
      <div class="tasks-body">
        <div class="task-list" id="taskList_${pi}">${taskRowsHTML}</div>
        <div class="add-task-row">
          <input type="text" class="input-task" id="taskInput_${pi}"
                 placeholder="Add a task…" maxlength="100"
                 onkeydown="if(event.key==='Enter') addTask(${pi})">
          <button class="btn-add-task" onclick="addTask(${pi})">+ Add</button>
        </div>
      </div>`;
    list.appendChild(card);
  });

  updateSummary();
}

// ── Actions ──────────────────────────────────────────────────────────────────
function addProject() {
  const inp  = document.getElementById('newProjectName');
  const date = document.getElementById('newProjectDeadline');
  const name = inp.value.trim();
  if (!name) { inp.focus(); inp.style.borderColor = '#f87171'; setTimeout(() => inp.style.borderColor = '', 1200); return; }
  projects.push({ name, deadline: date.value, tasks: [], collapsed: false });
  inp.value = '';
  date.value = '';
  save();
  render();
  // scroll to new card
  setTimeout(() => document.querySelectorAll('.project-card').forEach(c => c === document.querySelectorAll('.project-card')[projects.length-1] && c.scrollIntoView({ behavior:'smooth', block:'nearest' })), 50);
}

function delProject(pi) {
  if (!confirm(`Delete project "${projects[pi].name}" and all its tasks?`)) return;
  projects.splice(pi, 1);
  save(); render();
}

function toggleCollapse(pi) {
  projects[pi].collapsed = !projects[pi].collapsed;
  save(); render();
}

function addTask(pi) {
  const inp  = document.getElementById(`taskInput_${pi}`);
  const name = inp.value.trim();
  if (!name) { inp.focus(); return; }
  projects[pi].tasks.push({ name, done: false });
  inp.value = '';
  save(); render();
  document.getElementById(`taskInput_${pi}`)?.focus();
}

function toggleTask(pi, ti) {
  projects[pi].tasks[ti].done = !projects[pi].tasks[ti].done;
  save(); render();
}

function delTask(e, pi, ti) {
  e.stopPropagation();
  projects[pi].tasks.splice(ti, 1);
  save(); render();
}

// ── Summary ──────────────────────────────────────────────────────────────────
function updateSummary() {
  const totalTasks = projects.reduce((a, p) => a + p.tasks.length, 0);
  const doneTasks  = projects.reduce((a, p) => a + p.tasks.filter(t => t.done).length, 0);
  const pct = totalTasks ? Math.round(doneTasks / totalTasks * 100) : 0;
  document.getElementById('sumProjects').textContent = projects.length;
  document.getElementById('sumTasks').textContent    = totalTasks;
  document.getElementById('sumDone').textContent     = doneTasks;
  document.getElementById('sumPct').textContent      = pct + '%';
}

// ── Helpers ──────────────────────────────────────────────────────────────────
function escHtml(s) {
  return s.replace(/&/g,'&amp;').replace(/</g,'&lt;').replace(/>/g,'&gt;').replace(/"/g,'&quot;');
}

// ── Keyboard shortcut: Enter in project input ─────────────────────────────
document.getElementById('newProjectName')
  .addEventListener('keydown', e => { if (e.key === 'Enter') addProject(); });

// ── Init ──────────────────────────────────────────────────────────────────────
// Seed sample data if empty
if (!projects.length) {
  projects = [
    {
      name: 'Docking Studies', deadline: '2024-06-15', collapsed: false,
      tasks: [
        { name: 'Target Selection', done: true },
        { name: 'Ligand Preparation', done: true },
        { name: 'Binding Site Analysis', done: false },
      ]
    },
    {
      name: 'Molecular Simulations', deadline: '2024-07-01', collapsed: false,
      tasks: [
        { name: 'System Setup', done: true },
        { name: 'Equilibration', done: true },
        { name: 'Production Run', done: true },
        { name: 'Traj Analysis', done: false },
      ]
    },
    {
      name: 'Genome Studies', deadline: '2024-08-10', collapsed: false,
      tasks: [
        { name: 'Data Preprocessing', done: false },
        { name: 'Read Mapping', done: false },
        { name: 'Variant Calling', done: false },
        { name: 'Annotation', done: false },
      ]
    }
  ];
  save();
}

render();
</script>
</body>
</html>