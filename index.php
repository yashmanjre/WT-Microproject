<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>StartUpSync — Home</title>

  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700;800&display=swap" rel="stylesheet">

  <style>
    /* -------------------------
       Theme variables
       ------------------------- */
    :root {
      --bg: #0f1226;
      --card: #0f1724;
      --muted: #9aa4c0;
      --accent1: #6c7bff;
      --accent2: #9b5cff;
      --neon: linear-gradient(360deg, var(--accent1), var(--accent2));
      --max-width: 1100px;
    }

    /* -------------------------
       Reset & base
       ------------------------- */
    * {
      box-sizing: border-box;
    }

    html,
    body {
      height: 100%;
    }

    body {
      margin: 0;
      font-family: 'Inter', system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial;
      background:
        radial-gradient(1200px 600px at 10% 10%, rgba(108, 123, 255, 0.06), transparent),
        radial-gradient(900px 400px at 90% 90%, rgba(155, 92, 255, 0.04), transparent),
        var(--bg);
      color: #e6eef8;
      -webkit-font-smoothing: antialiased;
      -moz-osx-font-smoothing: grayscale;
      scroll-behavior: smooth;
      line-height: 1.45;
    }

    a {
      color: inherit;
      text-decoration: none;
    }

    /* -------------------------
       Navigation (fixed)
       ------------------------- */
    nav {
      position: fixed;
      left: 0;
      right: 0;
      top: 0;
      z-index: 1000;
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 18px 36px;
      background: linear-gradient(180deg, rgba(255, 255, 255, 0.02), rgba(255, 255, 255, 0.01));
      border-bottom: 1px solid rgba(255, 255, 255, 0.03);
      backdrop-filter: blur(10px);
    }

    .brand {
      display: flex;
      gap: 20px;
      align-items: center;
    }

    .logo {
      width: 50px;
      height: 50px;
      border-radius: 20px;
      display: flex;
      align-items: center;
      justify-content: center;
      background: var(--neon);
      font-weight: 850;
      font-size: 30px;
      color: white;
    }

    .brand h1 {
      font-size: 18px;
      margin: 0;
    }

    .brand p {
      margin: 0;
      font-size: 12px;
      color: var(--muted);
    }

    .nav-links {
      display: flex;
      gap: 18px;
      align-items: center;
    }

    .nav-links a {
      color: var(--muted);
      font-weight: 600;
      padding: 8px 12px;
      border-radius: 8px;
    }

    .nav-links a:hover {
      color: #fff;
      background: rgba(255, 255, 255, 0.02);
    }

    /* user initial button */
    .user-btn {
      width: 40px;
      height: 40px;
      border-radius: 50%;
      display: inline-flex;
      align-items: center;
      justify-content: center;
      background: var(--neon);
      color: #fff;
      border: none;
      cursor: pointer;
      font-weight: 700;
    }

    .user-dropdown {
      position: absolute;
      right: 0;
      top: 56px;
      background: linear-gradient(180deg, rgba(255, 255, 255, 0.02), rgba(255, 255, 255, 0.01));
      padding: 10px;
      border-radius: 8px;
      display: none;
      border: 1px solid rgba(255, 255, 255, 0.04);
      backdrop-filter: blur(6px);
    }

    .user-wrap {
      position: relative;
    }

    .cta {
      padding: 9px 14px;
      border-radius: 10px;
      background: var(--neon);
      color: white;
      font-weight: 700;
    }

    .spacer {
      height: 84px;
    }

    /* -------------------------
       Layout
       ------------------------- */
    section {
      min-height: 100vh;
      padding: 90px 6vw;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .container {
      max-width: var(--max-width);
      width: 100%;
    }

    .card-gradient {
      background: linear-gradient(180deg, rgba(255, 255, 255, 0.02), rgba(255, 255, 255, 0.01));
      padding: 26px;
      border-radius: 14px;
      box-shadow: 0 10px 40px rgba(0, 0, 0, 0.6);
      border: 1px solid rgba(255, 255, 255, 0.04);
    }

    /* Hero */
    .hero {
      display: grid;
      grid-template-columns: 1fr 420px;
      gap: 48px;
      align-items: center;
    }

    .eyebrow {
      font-weight: 700;
      color: var(--accent1);
      letter-spacing: 1px;
    }

    h2 {
      font-size: 44px;
      margin: 12px 0 18px;
      line-height: 1.05;
    }

    p.lead {
      color: var(--muted);
      font-size: 18px;
      max-width: 70%;
      margin: 0;
    }

    .floaty {
      animation: floaty 6s ease-in-out infinite;
    }

    .feature {
      display: flex;
      gap: 28px;
      align-items: center;
      justify-content: space-between;
    }

    .feature .left {
      flex: 1;
    }

    .feature .right {
      width: 420px;
    }

    .feature-visual {
      height: 220px;
      border-radius: 12px;
      background: linear-gradient(120deg, rgba(108, 123, 255, 0.12), rgba(155, 92, 255, 0.08));
      display: flex;
      align-items: center;
      justify-content: center;
      font-weight: 700;
    }


    /* contact */
    #contact {
      display: grid;
      grid-template-columns: 1fr 420px;
      gap: 40px;
      align-items: start;
    }

    form {
      background: var(--card);
      padding: 22px;
      border-radius: 12px;
      border: 1px solid rgba(255, 255, 255, 0.03);
      box-shadow: 0 10px 30px rgba(12, 15, 25, 0.7);
    }

    label {
      display: block;
      font-size: 13px;
      color: var(--muted);
      margin-bottom: 6px;
    }

    input,
    textarea {
      width: 100%;
      padding: 12px 14px;
      border-radius: 8px;
      border: 1px solid rgba(255, 255, 255, 0.06);
      background: transparent;
      color: inherit;
      font-size: 15px;
    }

    textarea {
      resize: vertical;
      min-height: 120px;
    }

    .form-row {
      margin-bottom: 14px;
    }

    .btn-primary {
      background: var(--neon);
      padding: 12px 18px;
      border-radius: 10px;
      border: none;
      color: white;
      font-weight: 700;
      cursor: pointer;
    }

    .reach {
      background: linear-gradient(180deg, rgba(255, 255, 255, 0.02), rgba(255, 255, 255, 0.01));
      padding: 18px;
      border-radius: 10px;
    }

    .reach p {
      margin: 8px 0;
      color: var(--muted);
    }

    footer {
      padding: 28px 6vw;
      background: linear-gradient(180deg, rgba(255, 255, 255, 0.01), transparent);
      border-top: 1px solid rgba(255, 255, 255, 0.02);
    }

    .footer-inner {
      max-width: var(--max-width);
      margin: 0 auto;
      display: flex;
      justify-content: space-between;
      gap: 20px;
      align-items: center;
    }

    .socials {
      display: flex;
      gap: 12px;
    }

    .socials a {
      width: 38px;
      height: 38px;
      border-radius: 8px;
      display: inline-flex;
      align-items: center;
      justify-content: center;
      background: rgba(255, 255, 255, 0.02);
      color: var(--muted);
      text-decoration: none;
      font-weight: 700;
    }

    .card-gradient:hover {
      transform: translateY(-6px);
      transition: transform 300ms;
    }

    .feature-visual:hover {
      transform: scale(1.02);
      transition: transform 300ms;
    }
  </style>
</head>

<body>
  <!-- NAV -->
  <nav>
    <div class="brand">
      <div class="logo" aria-hidden="true">S</div>
      <div>
        <h1>StartUpSync</h1>
        <p class="muted">Innovation & Mentorship</p>
      </div>
    </div>

    <div class="nav-links">
      <a href="index.php">Home</a>
      <a href="idea_engine.php">Idea Engine</a>
      <a href="pitch_generator.php">Pitch Deck</a>
      <a href="mentors.php">Mentors</a>
      <a href="learning.php">Learning</a>
      <a href="dashboard.php">Dashboard</a>

      <?php if (!isset($_SESSION['user_name'])): ?>
        <a href="login.php" class="cta" style="color: #fff;">Login</a>
      <?php else: ?>
        <div class="user-wrap" style="display:inline-block;">
          <button id="userBtn" class="user-btn" title="Account">
            <?php echo htmlspecialchars(strtoupper(mb_substr($_SESSION['user_name'], 0, 1))); ?>
          </button>
          <div id="userDropdown" class="user-dropdown" aria-hidden="true">
            <div style="padding:4px 8px; color:var(--muted); font-size:13px;">Signed in as <strong><?php echo htmlspecialchars($_SESSION['user_name']); ?></strong></div>
            <div style="height:8px"></div>
            <a href="profile.php" style="display:block; padding:8px 10px; color:#fff;">Profile</a>
            <a href="logout.php" style="display:block; padding:8px 10px; color:#fff;">Logout</a>
          </div>
        </div>
      <?php endif; ?>
    </div>
  </nav>

  <div class="spacer" aria-hidden="true"></div>

  <!-- HERO -->
  <section id="home">
    <div class="container hero card-gradient reveal">
      <div>
        <div class="eyebrow">StartUpSync.ai</div>
        <h2>
          Turn your idea into a startup — faster.
          <br />
          <span class="muted" style="font-weight:600">Submit, score, get a pitch and find mentors — all in one place.</span>
        </h2>

        <p class="lead">A playful, modern platform for students and creators to test and grow their startup ideas. Keep scrolling — each scroll reveals a new feature.</p>

        <div style="margin-top:22px; display:flex; gap:12px; align-items:center;">
          <button class="btn-primary" onclick="location.href='idea_engine.php'">Try Idea Engine</button>
          <button style="background:transparent; border:1px solid rgba(255,255,255,0.06); padding:10px 14px; border-radius:10px; color:var(--muted);" onclick="location.href='pitch_generator.php'">Explore Features</button>
        </div>

        <div style="margin-top:18px; color:var(--muted); font-size:13px;">Tip: Use the pitch generator to create an instant one-page pitch for presentations.</div>
      </div>

      <div class="floaty" aria-hidden="true">
        <div class="card-gradient" style="text-align:center;">
          <div style="font-weight:700; font-size:18px; margin-bottom:6px;">Innovation Score</div>
          <div style="display:flex; gap:6px; align-items:end; justify-content:center;">
            <div style="width:18px; height:64px; background: linear-gradient(180deg,var(--accent2),var(--accent1)); border-radius:6px;"></div>
            <div style="width:18px; height:48px; background: linear-gradient(180deg,var(--accent2),var(--accent1)); border-radius:6px; opacity:0.9;"></div>
            <div style="width:18px; height:76px; background: linear-gradient(180deg,var(--accent2),var(--accent1)); border-radius:6px; opacity:0.95;"></div>
            <div style="width:18px; height:36px; background: linear-gradient(180deg,var(--accent2),var(--accent1)); border-radius:6px; opacity:0.85;"></div>
          </div>

          <!-- example image from uploaded asset -->
          <div style="margin-top:14px;">
            <!-- developer-provided image path (will be transformed to an accessible URL by the environment) -->

          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- FEATURE SECTIONS -->
  <section id="feature-a">
    <div class="container reveal feature card-gradient">
      <div class="left">
        <h3>Idea Engine — Instant Scoring & Feedback</h3>
        <p class="muted">Submit a short idea and our rule-based engine (JS) calculates Innovation, Feasibility, and Market Fit — then gives short suggestions to improve your pitch.</p>

        <div style="margin-top:18px; display:flex; gap:10px;">
          <button class="btn-primary" onclick="location.href='idea_engine.php'">Open Idea Engine</button>
          <button style="background:transparent; border:1px solid rgba(255,255,255,0.04); padding:10px 14px; border-radius:10px; color:var(--muted);" onclick="location.href='pitch_generator.php'">See Pitch Deck</button>
        </div>
      </div>

      <div class="right">
        <div class="feature-visual">Type an idea → Get a score</div>
      </div>
    </div>
  </section>

  <section id="feature-b">
    <div class="container reveal feature card-gradient">
      <div class="left">
        <h3>Pitch Deck Generator</h3>
        <p class="muted">Automatically create a clean one-page pitch: Problem → Solution → Market → Business Model. Export as PDF or copy the text to slides.</p>
        <div style="margin-top:18px;">
          <button class="btn-primary" onclick="location.href='pitch_generator.php'">Generate Sample Pitch</button>
        </div>
      </div>

      <div class="right">
        <div class="feature-visual">One-click pitch</div>
      </div>
    </div>
  </section>

  <section id="feature-c">
    <div class="container reveal feature card-gradient">
      <div class="left">
        <h3>Mentor Matchmaking</h3>
        <p class="muted">Match with mentors based on category, experience and availability. Request mentorship, schedule a call, and save mentor notes.</p>
      </div>

      <div class="right">
        <div class="feature-visual">Find mentors nearby</div>
      </div>
    </div>
  </section>

  <!-- CONTACT -->
  <section id="contact">
    <div class="container" style="display:grid; grid-template-columns: 1fr 420px; gap:40px; align-items:start;">
      <div class="reveal">
        <h3 style="margin-top:0;">Contact Us</h3>
        <p class="muted">Questions, partnership requests or feedback? Send us a message and we'll get back to you within 2 business days.</p>

        <form id="contactForm" novalidate>
          <div class="form-row">
            <label for="name">Name</label>
            <input id="name" name="name" type="text" placeholder="Your full name" required />
          </div>

          <div class="form-row">
            <label for="email">Email</label>
            <input id="email" name="email" type="email" placeholder="you@example.com" required />
          </div>

          <div class="form-row">
            <label for="message">Message</label>
            <textarea id="message" name="message" rows="5" placeholder="Tell us about your idea or question" required></textarea>
          </div>

          <div style="display:flex; gap:12px; align-items:center;">
            <button type="submit" class="btn-primary">Send Message</button>
            <div id="formStatus" class="muted" style="font-size:14px;"></div>
          </div>
        </form>
      </div>

      <aside class="reveal reach">
        <h4 style="margin-top:0;">How to Reach Us</h4>
        <p><strong>Email:</strong> support@startupsync.ai</p>
        <p><strong>Phone:</strong> +91 98234 56231</p>
        <p><strong>Address:</strong> Innovation Hub, Mumbai, India</p>
        <p class="muted" style="margin-top:10px;">Office hours: Mon — Fri, 10:00 — 18:00 IST</p>
        <div style="margin-top:12px;"><a href="#" style="color:var(--muted)">Get directions →</a></div>
      </aside>
    </div>
  </section>

  <footer>
    <div class="footer-inner">
      <div>
        <div style="font-weight:700;">StartUpSync</div>
        <div class="muted" style="font-size:13px;">AI-powered ideation platform</div>
      </div>

      <div class="socials" role="navigation" aria-label="social links">
        <a href="#" aria-label="Twitter">T</a>
        <a href="#" aria-label="LinkedIn">in</a>
        <a href="#" aria-label="Instagram">ig</a>
      </div>
    </div>
  </footer>

  <!-- IDEA MODAL -->
  <div id="ideaModal" style="position:fixed; inset:0; display:none; align-items:center; justify-content:center; z-index:2000;">
    <div style="position:absolute; inset:0; background:linear-gradient(180deg, rgba(0,0,0,0.6), rgba(0,0,0,0.7)); backdrop-filter: blur(2px);"></div>
    <div style="position:relative; max-width: 820px; width:95%; z-index:2;">
      <div style="background:var(--card); padding:22px; border-radius:12px; border:1px solid rgba(255,255,255,0.03);">
        <h3 style="margin-top:0;">Idea Engine</h3>
        <p class="muted">Enter a short idea and see instant scores + suggestions.</p>

        <div style="display:grid; grid-template-columns: 1fr 280px; gap:16px; margin-top:12px;">
          <div>
            <textarea id="ideaTextModal" rows="8" placeholder="Briefly describe your idea..." style="width:100%; padding:12px; background:transparent; border:1px solid rgba(255,255,255,0.04); border-radius:10px; color:inherit;"></textarea>
            <div style="margin-top:10px; display:flex; gap:8px;">
              <button class="btn-primary" onclick="scoreIdea()">Analyze</button>
              <button style="background:transparent; border:1px solid rgba(255,255,255,0.04); padding:8px; border-radius:8px; color:var(--muted);" onclick="closeIdeaModal()">Close</button>
            </div>
          </div>

          <div style="background: linear-gradient(180deg, rgba(255,255,255,0.02), rgba(255,255,255,0.01)); padding:12px; border-radius:10px;">
            <div style="font-weight:700;">Results</div>
            <div id="scores" style="margin-top:8px; color:var(--muted);">No analysis yet</div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- SCRIPTS -->
  <script>
    /* Smooth scroll util (kept for compatibility with in-page flows) */
    function scrollToId(id) {
      const el = document.getElementById(id);
      if (el) el.scrollIntoView({
        behavior: 'smooth'
      });
    }



    /* Contact form handling (client-side demo) */
    (function initContactForm() {
      const form = document.getElementById('contactForm');
      if (!form) return;
      form.addEventListener('submit', function(e) {
        e.preventDefault();
        const name = document.getElementById('name').value.trim();
        const email = document.getElementById('email').value.trim();
        const message = document.getElementById('message').value.trim();
        const status = document.getElementById('formStatus');
        if (!name || !email || !message) {
          status.textContent = 'Please fill all fields.';
          return;
        }
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(email)) {
          status.textContent = 'Enter a valid email.';
          return;
        }
        status.textContent = 'Sending...';
        setTimeout(() => {
          status.textContent = 'Message sent ✅ We will reply within 2 business days.';
          form.reset();
        }, 1200);
      });
    })();

    /* Idea Modal controls */
    function openIdeaModal() {
      document.getElementById('ideaModal').style.display = 'flex';
      setTimeout(() => document.getElementById('ideaTextModal').focus(), 50);
    }


    window.addEventListener('keydown', (e) => {
      if (e.key === 'Escape') closeIdeaModal();
    });

    /* Simple client-side idea scorer used in modal (same heuristics as earlier) */
    function scoreIdea() {
      const text = document.getElementById('ideaTextModal').value.trim();
      const out = document.getElementById('scores');
      if (!text) {
        out.textContent = 'Please type your idea first.';
        return;
      }
      const words = text.split(/\s+/).length;
      let innovation = 40,
        feasibility = 50,
        market = 45;
      if (words > 20) {
        innovation += 10;
        feasibility += 5;
      }
      if (/ai|machine learning|ml|blockchain|iot/i.test(text)) innovation += 18;
      if (/market|customers|users|industry|b2b|b2c/i.test(text)) market += 20;
      if (/prototype|mvp|build|develop/i.test(text)) feasibility += 18;
      if (/idea|something|something like/i.test(text)) innovation -= 10;
      innovation = Math.min(100, Math.max(10, Math.round(innovation)));
      feasibility = Math.min(100, Math.max(10, Math.round(feasibility)));
      market = Math.min(100, Math.max(10, Math.round(market)));
      const suggestions = [];
      if (innovation < 50) suggestions.push('Highlight the unique benefit of your idea.');
      if (feasibility < 50) suggestions.push('Mention a simple prototype or MVP you can build.');
      if (market < 50) suggestions.push('Define the customer and why they will pay.');
      out.innerHTML = [
        `<div style="display:flex;flex-direction:column;gap:8px">`,
        `<div><strong>Innovation:</strong> ${innovation}/100</div>`,
        `<div><strong>Feasibility:</strong> ${feasibility}/100</div>`,
        `<div><strong>Market fit:</strong> ${market}/100</div>`,
        `<div style="margin-top:8px"><strong>Quick Suggestions:</strong>`,
        `<ul style="margin:6px 0 0 18px;color:var(--muted)">`,
        suggestions.length ? suggestions.map(s => `<li>${s}</li>`).join('') : `<li>Looks good — add specifics to boost score.</li>`,
        `</ul></div>`,
        `</div>`
      ].join('');
    }

    /* User dropdown toggle (if present) */
    (function userDropdown() {
      const btn = document.getElementById('userBtn');
      const dd = document.getElementById('userDropdown');
      if (!btn || !dd) return;
      btn.addEventListener('click', () => dd.style.display = dd.style.display === 'block' ? 'none' : 'block');
      // hide when clicking outside
      document.addEventListener('click', (e) => {
        if (!btn.contains(e.target) && !dd.contains(e.target)) dd.style.display = 'none';
      });
    })();
  </script>
</body>

</html>