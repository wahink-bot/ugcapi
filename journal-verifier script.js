const form = document.getElementById('verify-form');
const btn = document.getElementById('verify-btn');
const errorBox = document.getElementById('intake-error');
const loadingSection = document.getElementById('loading-section');
const dossierSection = document.getElementById('dossier-section');
const loadingText = document.getElementById('loading-text');

const LOADING_MESSAGES = [
  'Reading the submitted page…',
  'Checking DOAJ for a matching title…',
  'Resolving any ISSNs found via Crossref…',
  'Checking domain registration age…',
  'Weighing the evidence…',
];

function showError(msg) {
  errorBox.textContent = msg;
  errorBox.hidden = false;
}
function clearError() {
  errorBox.hidden = true;
  errorBox.textContent = '';
}

function cycleLoadingMessages() {
  let i = 0;
  loadingText.textContent = LOADING_MESSAGES[0];
  return setInterval(() => {
    i = (i + 1) % LOADING_MESSAGES.length;
    loadingText.textContent = LOADING_MESSAGES[i];
  }, 1400);
}

form.addEventListener('submit', async (e) => {
  e.preventDefault();
  clearError();

  const journalName = document.getElementById('journal_name').value.trim();
  const journalUrl = document.getElementById('journal_url').value.trim();
  const apiBase = document.getElementById('api_base').value.trim().replace(/\/$/, '');

  if (!journalName || !journalUrl) {
    showError('Both the journal name and URL are required.');
    return;
  }

  btn.disabled = true;
  dossierSection.hidden = true;
  loadingSection.hidden = false;
  const interval = cycleLoadingMessages();

  try {
    const resp = await fetch(`${apiBase}/api/verify`, {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify({ journal_name: journalName, journal_url: journalUrl }),
    });

    if (!resp.ok) {
      const body = await resp.json().catch(() => ({}));
      throw new Error(body.detail || `Server returned ${resp.status}`);
    }

    const data = await resp.json();
    renderDossier(data);
  } catch (err) {
    showError(
      `Could not complete verification: ${err.message}. ` +
      `Confirm the backend is running and reachable at "${apiBase}".`
    );
  } finally {
    clearInterval(interval);
    loadingSection.hidden = true;
    btn.disabled = false;
  }
});

function renderDossier(data) {
  document.getElementById('dossier-title').textContent = data.journal_name;
  document.getElementById('dossier-sub').textContent = data.submitted_url;

  // Stamp
  const probs = data.probabilities;
  const topCategory = Object.keys(probs).reduce((a, b) => (probs[a] >= probs[b] ? a : b));
  const stamp = document.getElementById('stamp');
  stamp.className = `stamp verdict-${topCategory}`;
  const stampLabels = {
    predatory: 'Predatory\nrisk: high',
    hijacked: 'Hijacking\nsigns found',
    cloned: 'Cloning\nsigns found',
    legitimate: 'No strong\nred flags',
  };
  document.getElementById('stamp-text').innerHTML =
    (stampLabels[topCategory] || 'Checked').replace('\n', '<br>');

  // Meters
  const order = ['predatory', 'hijacked', 'cloned', 'legitimate'];
  const metersEl = document.getElementById('meters');
  metersEl.innerHTML = '';
  order.forEach((cat) => {
    const pct = probs[cat] ?? 0;
    const row = document.createElement('div');
    row.className = 'meter-row';
    row.innerHTML = `
      <div class="meter-top">
        <span class="meter-cat">${cat}</span>
        <span class="meter-pct">${pct.toFixed(1)}%</span>
      </div>
      <div class="meter-track">
        <div class="meter-fill ${cat}" style="width:0%"></div>
      </div>
    `;
    metersEl.appendChild(row);
    requestAnimationFrame(() => {
      row.querySelector('.meter-fill').style.width = `${pct}%`;
    });
  });

  // Original link
  const linkBlock = document.getElementById('original-link-block');
  if (data.original_journal_url) {
    linkBlock.hidden = false;
    const a = document.getElementById('original-link-href');
    a.href = data.original_journal_url;
    a.textContent = data.original_journal_url;
    document.getElementById('original-link-confidence').textContent =
      `Match confidence: ${data.original_url_confidence}`;
  } else {
    linkBlock.hidden = true;
  }

  // Evidence
  const evidenceList = document.getElementById('evidence-list');
  evidenceList.innerHTML = '';
  data.evidence.forEach((ev) => {
    const li = document.createElement('li');
    li.className = `evidence-item sev-${ev.severity}`;
    li.innerHTML = `<div><span class="evidence-tag">${ev.category}</span>${escapeHtml(ev.message)}</div>`;
    evidenceList.appendChild(li);
  });
  if (data.evidence.length === 0) {
    evidenceList.innerHTML = '<li class="evidence-item sev-info"><div>No specific evidence items were generated.</div></li>';
  }

  // Sources
  const sourcesList = document.getElementById('sources-list');
  sourcesList.innerHTML = '';
  data.source_checks.forEach((s) => {
    const li = document.createElement('li');
    li.className = 'source-item';
    li.innerHTML = `
      <span>${escapeHtml(s.source)} — ${escapeHtml(s.detail)}</span>
      <span class="source-status ${s.status}">${s.status.replace('_', ' ')}</span>
    `;
    sourcesList.appendChild(li);
  });

  // Notes
  const notesBlock = document.getElementById('notes-block');
  const notesList = document.getElementById('notes-list');
  notesList.innerHTML = '';
  if (data.notes && data.notes.length) {
    notesBlock.hidden = false;
    data.notes.forEach((n) => {
      const li = document.createElement('li');
      li.textContent = n;
      notesList.appendChild(li);
    });
  } else {
    notesBlock.hidden = true;
  }

  dossierSection.hidden = false;
  dossierSection.scrollIntoView({ behavior: 'smooth', block: 'start' });
}

function escapeHtml(str) {
  const div = document.createElement('div');
  div.textContent = str;
  return div.innerHTML;
}
