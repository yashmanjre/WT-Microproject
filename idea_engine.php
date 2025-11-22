 <?php
    session_start();
    $loggedIn = isset($_SESSION["user_name"]);
    $userName = $loggedIn ? $_SESSION["user_name"] : "";
    $initial = $loggedIn ? strtoupper($userName[0]) : "";
    ?>
 <!doctype html>
 <html lang="en">

 <head>
     <meta charset="utf-8" />
     <meta name="viewport" content="width=device-width,initial-scale=1" />
     <title>StartUpSync — Idea Engine</title>

     <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet" />

     <style>
         :root {
             --bg: #0f1226;
             --card: #0f1724;
             --muted: #9aa4c0;
             --accent1: #6c7bff;
             --accent2: #9b5cff;
             --neon: linear-gradient(360deg, var(--accent1), var(--accent2));
         }

         body {
             margin: 0;
             font-family: 'Inter', system-ui, -apple-system, "Segoe UI", Roboto, Arial;
             background:
                 radial-gradient(1200px 600px at 10% 10%, rgba(108, 123, 255, 0.06), transparent),
                 radial-gradient(900px 400px at 90% 90%, rgba(155, 92, 255, 0.04), transparent),
                 var(--bg);
             color: #e6eef8;
         }

         a {
             text-decoration: none;
             color: inherit;
         }

         /* NAVBAR (copied exactly from index.html) */
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

         /* Page Content */
         .container {
             max-width: 1000px;
             margin: 0 auto;
             padding: 24px;
         }

         h1 {
             font-size: 32px;
         }

         .card {
             background: rgba(255, 255, 255, 0.03);
             padding: 20px;
             border-radius: 12px;
             border: 1px solid rgba(255, 255, 255, 0.05);
         }

         textarea {
             width: 100%;
             min-height: 140px;
             padding: 12px;
             border-radius: 8px;
             border: 1px solid rgba(255, 255, 255, 0.06);
             background: transparent;
             color: inherit;
             margin-top: 10px;
         }

         .row {
             margin-top: 14px;
             display: flex;
             gap: 14px;
             flex-wrap: wrap;
         }

         .btn {
             background: var(--neon);
             padding: 10px 16px;
             border-radius: 10px;
             border: none;
             cursor: pointer;
             color: white;
             font-weight: 700;
         }

         .btn:hover {
             opacity: 0.9;
         }

         #clearBtn {
             background: #445;
         }

         .saved-list {
             margin-top: 20px;
         }

         .item {
             background: rgba(255, 255, 255, 0.02);
             padding: 10px;
             border-radius: 10px;
             margin-bottom: 10px;
         }

         footer {
             text-align: center;
             padding: 24px;
             color: var(--muted);
         }
     </style>
 </head>

 <body>

     <!-- NAVBAR -->
     <nav>
         <div class="brand">
             <div class="logo">S</div>
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
         </div>
     </nav>

     <style>

     </style>


     <div class="spacer"></div>

     <!-- PAGE CONTENT -->
     <div class="container">
         <h1>Idea Engine (Prototype)</h1>

         <div class="card">
             <p class="small">Write your startup idea and analyze Innovation, Feasibility, and Market Fit using rule-based scoring.</p>

             <textarea id="ideaText" placeholder="Describe your idea..."></textarea>

             <div class="row">
                 <button class="btn" id="analyzeBtn">Analyze</button>
                 <button class="btn" id="saveBtn">Save Idea</button>
                 <button class="btn" id="clearBtn">Clear</button>
             </div>

             <div id="results" class="small" style="margin-top:14px;">No analysis yet.</div>
         </div>

         <div class="saved-list card">
             <h3>Saved Ideas</h3>
             <div id="ideasContainer">No ideas saved yet.</div>
         </div>
     </div>

     <footer>StartUpSync — Prototype • Client-side demo only</footer>

     <script>
         function analyzeText(text) {
             const words = text.trim().split(/\s+/).length;
             let innovation = 40,
                 feasibility = 50,
                 market = 45;

             if (words > 20) {
                 innovation += 10;
                 feasibility += 5;
             }
             if (/ai|ml|blockchain|iot/i.test(text)) innovation += 18;
             if (/market|users|industry/i.test(text)) market += 20;
             if (/prototype|mvp|build/i.test(text)) feasibility += 18;

             return {
                 innovation: Math.min(100, innovation),
                 feasibility: Math.min(100, feasibility),
                 market: Math.min(100, market)
             };
         }

         const ideaText = document.getElementById('ideaText');
         const results = document.getElementById('results');
         const ideasContainer = document.getElementById('ideasContainer');

         document.getElementById('analyzeBtn').onclick = () => {
             const t = ideaText.value.trim();
             if (!t) return results.textContent = "Please enter text first.";
             const sc = analyzeText(t);
             results.innerHTML =
                 `<strong>Innovation:</strong> ${sc.innovation}/100 — 
                 <strong>Feasibility:</strong> ${sc.feasibility}/100 — 
                 <strong>Market:</strong> ${sc.market}/100`;
         };

         document.getElementById('saveBtn').onclick = () => {
             const text = ideaText.value.trim();
             if (!text) return alert("Enter something first.");

             const scores = analyzeText(text);
             const saved = JSON.parse(localStorage.getItem("ideas") || "[]");
             saved.push({
                 text,
                 scores
             });
             localStorage.setItem("ideas", JSON.stringify(saved));
             renderIdeas();
         };

         document.getElementById('clearBtn').onclick = () => {
             ideaText.value = "";
             results.textContent = "No analysis yet.";
         };

         function renderIdeas() {
             const saved = JSON.parse(localStorage.getItem("ideas") || "[]");
             if (!saved.length) {
                 ideasContainer.innerHTML = "No ideas saved yet.";
                 return;
             }

             ideasContainer.innerHTML = "";
             saved.reverse().forEach(i => {
                 const box = document.createElement("div");
                 box.className = "item";
                 box.innerHTML =
                     `<div>${i.text}</div>
                     <div class="small" style="margin-top:8px;">
                        I:${i.scores.innovation} — 
                        F:${i.scores.feasibility} —
                        M:${i.scores.market}
                     </div>`;
                 ideasContainer.appendChild(box);
             });
         }

         //
     </script>

 </body>

 </html>