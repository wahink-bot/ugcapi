<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Team Portal — Restricted Access</title>
  <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Mono:wght@300;400;500;600&family=Syne:wght@400;600;700;800&display=swap" rel="stylesheet" />
  <style>
    *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

    :root {
      --bg:        #f9f9f9;
      --surface:  #4B0082;
      --border:    #1c2333;
      --accent:    #00e5ff;
      --accent2:   #7c3aed;
      --text:      #444547;
      --muted:     #4a5568;
      --danger:    #f56565;
      --success:   #48bb78;
      --glow:      0 0 20px rgba(0, 229, 255, 0.3);
    }

    body {
      background: var(--bg);
      font-family: 'IBM Plex Mono', monospace;
      color: var(--text);
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      overflow: hidden;
      position: relative;
    }

    body::before {
      content: '';
      position: fixed; inset: 0;
      background-image:
        linear-gradient(rgba(0,229,255,0.03) 1px, transparent 1px),
        linear-gradient(90deg, rgba(0,229,255,0.03) 1px, transparent 1px);
      background-size: 40px 40px;
      pointer-events: none;
      animation: gridDrift 20s linear infinite;
    }
    @keyframes gridDrift { from { background-position: 0 0; } to { background-position: 40px 40px; } }

    .orb {
      position: fixed;
      border-radius: 50%;
      filter: blur(80px);
      pointer-events: none;
      opacity: 0.25;
      animation: pulse 6s ease-in-out infinite alternate;
    }
    .orb-1 { width: 400px; height: 400px; background: var(--accent); top: -100px; left: -100px; animation-delay: 0s; }
    .orb-2 { width: 300px; height: 300px; background: var(--accent2); bottom: -80px; right: -80px; animation-delay: 3s; }
    @keyframes pulse { from { opacity: 0.15; transform: scale(1); } to { opacity: 0.3; transform: scale(1.1); } }

    .card {
      position: relative;
      width: 420px;
      background: var(--surface);
      border: 1px solid var(--border);
      border-radius: 2px;
      padding: 44px 40px 40px;
      box-shadow: 0 0 0 1px rgba(0,229,255,0.06), 0 32px 64px rgba(0,0,0,0.6);
      animation: slideUp 0.5s cubic-bezier(0.16, 1, 0.3, 1) both;
    }
    @keyframes slideUp {
      from { opacity: 0; transform: translateY(24px); }
      to   { opacity: 1; transform: translateY(0); }
    }

    .card::before {
      content: '';
      position: absolute;
      top: 0; left: 0; right: 0;
      height: 2px;
      background: linear-gradient(90deg, transparent, var(--accent), var(--accent2), transparent);
    }

    .badge {
      display: inline-flex;
      align-items: center;
      gap: 6px;
      background: rgba(0,229,255,0.07);
      border: 1px solid rgba(0,229,255,0.2);
      border-radius: 2px;
      padding: 4px 10px;
      font-size: 10px;
      letter-spacing: 0.15em;
      color: var(--accent);
      text-transform: uppercase;
      margin-bottom: 24px;
    }
    .badge-dot {
      width: 6px; height: 6px;
      border-radius: 50%;
      background: var(--accent);
      animation: blink 1.4s step-end infinite;
    }
    @keyframes blink { 0%,100%{opacity:1} 50%{opacity:0} }

    h1 {
      font-family: 'Syne', sans-serif;
      font-size: 26px;
      font-weight: 800;
      color: #fff;
      letter-spacing: -0.5px;
      line-height: 1.2;
    }
    h1 span { color: var(--accent); }

    .subtitle {
      font-size: 11px;
      color: var(--muted);
      margin-top: 6px;
      letter-spacing: 0.05em;
    }

    .divider {
      border: none;
      border-top: 1px solid var(--border);
      margin: 28px 0;
    }

    .field { margin-bottom: 18px; }

    label {
      display: block;
      font-size: 10px;
      letter-spacing: 0.12em;
      text-transform: uppercase;
      color: var(--muted);
      margin-bottom: 8px;
    }

    .input-wrap { position: relative; }

    input[type="text"],
    input[type="password"] {
      width: 100%;
      background: var(--bg);
      border: 1px solid var(--border);
      border-radius: 2px;
      padding: 12px 40px 12px 14px;
      color: var(--text);
      font-family: 'IBM Plex Mono', monospace;
      font-size: 13px;
      outline: none;
      transition: border-color 0.2s, box-shadow 0.2s;
    }
    input:focus {
      border-color: var(--accent);
      box-shadow: 0 0 0 3px rgba(0,229,255,0.08);
    }
    input::placeholder { color: var(--muted); }

    .icon {
      position: absolute;
      right: 14px; top: 50%;
      transform: translateY(-50%);
      font-size: 14px;
      color: var(--muted);
      cursor: pointer;
      user-select: none;
      transition: color 0.2s;
    }
    .icon:hover { color: var(--accent); }

    .btn {
      width: 100%;
      padding: 13px;
      margin-top: 8px;
      background: var(--accent);
      color: #000;
      font-family: 'IBM Plex Mono', monospace;
      font-size: 12px;
      font-weight: 600;
      letter-spacing: 0.12em;
      text-transform: uppercase;
      border: none;
      border-radius: 2px;
      cursor: pointer;
      position: relative;
      overflow: hidden;
      transition: opacity 0.2s, transform 0.1s;
    }
    .btn:hover { opacity: 0.9; }
    .btn:active { transform: scale(0.99); }
    .btn:disabled { opacity: 0.4; cursor: not-allowed; }

    .btn::after {
      content: '';
      position: absolute;
      inset: 0;
      background: rgba(255,255,255,0.15);
      transform: translateX(-100%);
      transition: transform 0.3s;
    }
    .btn:hover::after { transform: translateX(100%); }

    .msg {
      display: none;
      align-items: center;
      gap: 8px;
      margin-top: 14px;
      padding: 10px 14px;
      border-radius: 2px;
      font-size: 11px;
      letter-spacing: 0.04em;
      animation: fadeIn 0.3s ease;
    }
    @keyframes fadeIn { from { opacity: 0; transform: translateY(-4px); } to { opacity: 1; transform: translateY(0); } }
    .msg.show { display: flex; }
    .msg.error  { background: rgba(245,101,101,0.08); border: 1px solid rgba(245,101,101,0.25); color: var(--danger); }
    .msg.success { background: rgba(72,187,120,0.08); border: 1px solid rgba(72,187,120,0.25); color: var(--success); }

    .lockout {
      display: none;
      margin-top: 14px;
      background: rgba(245,101,101,0.05);
      border: 1px solid rgba(245,101,101,0.2);
      border-radius: 2px;
      padding: 10px 14px;
      font-size: 11px;
      color: var(--danger);
    }
    .lockout.show { display: block; }
    .lockout-bar-wrap { margin-top: 6px; background: rgba(245,101,101,0.1); border-radius: 2px; height: 3px; }
    .lockout-bar { height: 3px; background: var(--danger); border-radius: 2px; transition: width 1s linear; }

    .footer {
      margin-top: 28px;
      font-size: 10px;
      color: var(--muted);
      text-align: center;
      letter-spacing: 0.06em;
    }
    .footer span { color: rgba(0,229,255,0.5); }

    .shake { animation: shake 0.4s ease; }
    @keyframes shake {
      0%,100%{ transform: translateX(0) }
      20%{ transform: translateX(-6px) }
      40%{ transform: translateX(6px) }
      60%{ transform: translateX(-4px) }
      80%{ transform: translateX(4px) }
    }
  </style>
</head>
<body>
  <div class="orb orb-1"></div>
  <div class="orb orb-2"></div>

  <div class="card" id="loginCard">
    <div class="badge"><span class="badge-dot"></span> Restricted Access</div>
    <h1>Team<span>.</span>Portal</h1>
    <p class="subtitle">// Authorized personnel only</p>
    <hr class="divider" />

    <div class="field">
      <label>Username</label>
      <div class="input-wrap">
        <input type="text" id="username" placeholder="enter username" autocomplete="off" spellcheck="false" />
        <span class="icon">⌘</span>
      </div>
    </div>

    <div class="field">
      <label>Password</label>
      <div class="input-wrap">
        <input type="password" id="password" placeholder="••••••••" autocomplete="off" />
        <span class="icon" id="togglePwd" title="Toggle visibility">👁</span>
      </div>
    </div>

    <button class="btn" id="loginBtn" onclick="attemptLogin()">→ Authenticate</button>

    <div class="msg error" id="errorMsg">
      <span>⚠</span><span id="errorText">Access denied. Not a team member.</span>
    </div>
    <div class="msg success" id="successMsg">
      <span>✓</span><span>Identity confirmed. Redirecting…</span>
    </div>

    <div class="lockout" id="lockoutMsg">
      <div>⛔ Too many failed attempts. Locked for <span id="lockTimer">30</span>s</div>
      <div class="lockout-bar-wrap"><div class="lockout-bar" id="lockBar" style="width:100%"></div></div>
    </div>

    <div class="footer">
      <span>© 2025 Team Portal</span> — Internal use only
    </div>
  </div>

  <script>
    const TEAM = [
      { username: "BioinfoLab2026", password: "COB1.@bioinfo", name: "Students of COB", role: "Projects", color: ["#00e5ff","#7c3aed"] },
    ];

    const MAX_ATTEMPTS = 3;
    const LOCKOUT_SECONDS = 30;

    let attempts = 0;
    let lockedUntil = 0;
    let lockInterval = null;

    document.getElementById('togglePwd').addEventListener('click', () => {
      const p = document.getElementById('password');
      p.type = p.type === 'password' ? 'text' : 'password';
    });

    document.getElementById('password').addEventListener('keydown', e => {
      if (e.key === 'Enter') attemptLogin();
    });
    document.getElementById('username').addEventListener('keydown', e => {
      if (e.key === 'Enter') document.getElementById('password').focus();
    });

    function clearMessages() {
      document.getElementById('errorMsg').classList.remove('show');
      document.getElementById('successMsg').classList.remove('show');
    }

    function showError(text) {
      const el = document.getElementById('errorMsg');
      document.getElementById('errorText').textContent = text;
      el.classList.add('show');
      document.getElementById('loginCard').classList.add('shake');
      setTimeout(() => document.getElementById('loginCard').classList.remove('shake'), 400);
    }

    function attemptLogin() {
      clearMessages();

      const now = Date.now();
      if (now < lockedUntil) return;

      const uInput = document.getElementById('username').value.trim().toLowerCase();
      const pInput = document.getElementById('password').value;

      if (!uInput || !pInput) {
        showError('Please fill in both fields.');
        return;
      }

      const member = TEAM.find(m => m.username.toLowerCase() === uInput && m.password === pInput);

      if (member) {
        attempts = 0;
        document.getElementById('successMsg').classList.add('show');
        document.getElementById('loginBtn').disabled = true;
        // ── Redirect to projects.html after a short delay ──
        setTimeout(() => {
          window.location.href = 'studentprodashboard.php';
        }, 1200);
      } else {
        attempts++;
        const remaining = MAX_ATTEMPTS - attempts;

        if (attempts >= MAX_ATTEMPTS) {
          triggerLockout();
        } else {
          showError(
            remaining === 1
              ? '⚠ Access denied. 1 attempt remaining before lockout.'
              : `Access denied. ${remaining} attempts remaining.`
          );
        }
        document.getElementById('password').value = '';
      }
    }

    function triggerLockout() {
      lockedUntil = Date.now() + LOCKOUT_SECONDS * 1000;
      attempts = 0;

      const lockout = document.getElementById('lockoutMsg');
      const bar = document.getElementById('lockBar');
      const timer = document.getElementById('lockTimer');
      const btn = document.getElementById('loginBtn');

      lockout.classList.add('show');
      btn.disabled = true;
      document.getElementById('username').disabled = true;
      document.getElementById('password').disabled = true;

      let remaining = LOCKOUT_SECONDS;
      timer.textContent = remaining;
      bar.style.width = '100%';

      lockInterval = setInterval(() => {
        remaining--;
        timer.textContent = remaining;
        bar.style.width = ((remaining / LOCKOUT_SECONDS) * 100) + '%';

        if (remaining <= 0) {
          clearInterval(lockInterval);
          lockout.classList.remove('show');
          btn.disabled = false;
          document.getElementById('username').disabled = false;
          document.getElementById('password').disabled = false;
        }
      }, 1000);
    }
  </script>
</body>
</html>