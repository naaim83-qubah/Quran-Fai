<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quran with FAI</title>
    <style>
        body{
            margin:0;
            font-family:Arial,sans-serif;
            background:linear-gradient(135deg,#f7fff9,#eefbf4);
            color:#17352b;
        }
        .wrap{
            max-width:1000px;
            margin:auto;
            padding:40px 20px;
        }
        .hero{
            text-align:center;
            margin-bottom:35px;
        }
        .hero h1{
            font-size:42px;
            margin:0 0 10px;
        }
        .hero p{
            font-size:18px;
            color:#557067;
        }
        .badge{
            display:inline-block;
            background:#dff7e8;
            padding:8px 16px;
            border-radius:999px;
            font-weight:bold;
            margin-bottom:18px;
        }
        .card{
            background:#fff;
            border-radius:24px;
            padding:28px;
            box-shadow:0 10px 30px rgba(0,0,0,.08);
        }
        .letters{
            display:grid;
            grid-template-columns:repeat(3,1fr);
            gap:18px;
            margin-top:25px;
        }
        .letter{
            border:none;
            background:#f8fffb;
            border:2px solid #d9f2e4;
            border-radius:22px;
            padding:25px 10px;
            cursor:pointer;
            transition:.2s;
        }
        .letter:hover{
            transform:translateY(-3px);
            border-color:#7ac9a0;
        }
        .arabic{
            font-size:64px;
            direction:rtl;
        }
        .name{
            font-weight:bold;
            margin-top:8px;
            font-size:18px;
        }
        .flow{
            margin-top:30px;
            display:flex;
            flex-wrap:wrap;
            justify-content:center;
            gap:10px;
        }
        .flow span{
            background:#eef8f2;
            padding:10px 14px;
            border-radius:14px;
            font-size:14px;
            font-weight:bold;
        }
        .stars{
            margin-top:24px;
            text-align:center;
            font-size:20px;
        }

        .activity-btn{
            border:none;
            background:#1f8f63;
            color:white;
            padding:11px 20px;
            border-radius:14px;
            font-weight:bold;
            cursor:pointer;
        }

        .game-choice{
            border:2px solid #d7ede2;
            background:white;
            padding:16px 22px;
            margin:8px;
            border-radius:16px;
            font-size:20px;
            cursor:pointer;
        }

        @media(max-width:700px){
            .letters{grid-template-columns:1fr;}
            .hero h1{font-size:34px;}
        }
    </style>
</head>
<body>

<div class="wrap">

    <div class="hero">
        <div class="badge">Level 1 · Lesson 1 · Huruf Hijaiyah</div>
        <h1>📖 Quran with FAI</h1>
        <p>Learn to read the Quran step by step with Teacher FAI.</p>
    </div>

    <div class="card">
        <h2 style="text-align:center;">Kenali 5 Huruf Pertama ✨</h2>
        <p style="text-align:center;color:#667;">Tap a letter to begin learning its sound.</p>

        <div class="letters">

            <button class="letter" onclick="learnLetter('Alif','ا')">
                <div class="arabic">ا</div>
                <div class="name">Alif</div>
            </button>

            <button class="letter" onclick="learnLetter('Ba','ب')">
                <div class="arabic">ب</div>
                <div class="name">Ba</div>
            </button>

            <button class="letter" onclick="learnLetter('Ta','ت')">
                <div class="arabic">ت</div>
                <div class="name">Ta</div>
            </button>

            <button class="letter" onclick="learnLetter('Tha','ث')">
                <div class="arabic">ث</div>
                <div class="name">Tha</div>
            </button>

            <button class="letter" onclick="learnLetter('Jim','ج')">
                <div class="arabic">ج</div>
                <div class="name">Jim</div>
            </button>

        </div>

        <div id="message" style="text-align:center;margin-top:25px;font-size:20px;font-weight:bold;">
            Choose a letter 🌟
        </div>

        <div class="flow">
            <span>👂 Listen</span>
            <span>🗣️ Repeat</span>
            <span>👆 Touch</span>
            <span>🧩 Match</span>
            <span>📖 Read</span>
            <span>⭐ Earn Stars</span>
        </div>


        <div style="
            margin-top:35px;
            padding-top:28px;
            border-top:1px solid #e5efe9;
        ">
            <h2 style="text-align:center;">🎮 Let's Play & Practice</h2>

            <div style="
                display:grid;
                grid-template-columns:repeat(auto-fit,minmax(220px,1fr));
                gap:16px;
                margin-top:22px;
            ">

                <div style="
                    background:#fff8e8;
                    padding:22px;
                    border-radius:20px;
                    text-align:center;
                ">
                    <div style="font-size:34px;">👀</div>
                    <h3>Which Letter?</h3>
                    <p>Look at the Arabic letter and choose its name.</p>
                    <button onclick="startLetterQuiz()" class="activity-btn">
                        Start
                    </button>
                </div>

                <div style="
                    background:#eef6ff;
                    padding:22px;
                    border-radius:20px;
                    text-align:center;
                ">
                    <div style="font-size:34px;">🧩</div>
                    <h3>Match</h3>
                    <p>Match the Arabic letter with its correct name.</p>
                    <button onclick="startMatchGame()" class="activity-btn">
                        Start
                    </button>
                </div>

                <div style="
                    background:#fff0f7;
                    padding:22px;
                    border-radius:20px;
                    text-align:center;
                ">
                    <div style="font-size:34px;">🔎</div>
                    <h3>Find the Letter</h3>
                    <p>Teacher FAI asks you to find a letter.</p>
                    <button onclick="startFindGame()" class="activity-btn">
                        Start
                    </button>
                </div>

            </div>

            <div id="gameArea" style="
                margin-top:25px;
                background:#f8fffb;
                padding:25px;
                border-radius:20px;
                text-align:center;
                display:none;
            "></div>
        </div>

        <div class="stars">
            ⭐ <span id="stars">0</span> Stars
        </div>
    </div>

</div>

<script>
    let stars = 0;

    function learnLetter(letter, arabic){
        document.getElementById('message').innerHTML =
            '<div style="font-size:48px;margin-bottom:8px;">' + arabic + '</div>' +
            'Listen and repeat: <strong>' + letter + '</strong> 🔊';

        stars++;
        document.getElementById('stars').textContent = stars;
    }

    const lessonLetters = [
        {arabic:'ا', name:'Alif'},
        {arabic:'ب', name:'Ba'},
        {arabic:'ت', name:'Ta'},
        {arabic:'ث', name:'Tha'},
        {arabic:'ج', name:'Jim'}
    ];

    function showGame(html){
        const area = document.getElementById('gameArea');
        area.style.display = 'block';
        area.innerHTML = html;
        area.scrollIntoView({behavior:'smooth', block:'center'});
    }

    function reward(){
        stars++;
        document.getElementById('stars').textContent = stars;
    }

    function startLetterQuiz(){
        const q = lessonLetters[Math.floor(Math.random()*lessonLetters.length)];
        const names = lessonLetters.map(x => x.name).sort(() => Math.random() - 0.5);

        showGame(`
            <h3>Which letter is this?</h3>
            <div style="font-size:80px;margin:15px;">${q.arabic}</div>
            ${names.map(name =>
                `<button class="game-choice"
                    onclick="checkGameAnswer('${name}','${q.name}')">${name}</button>`
            ).join('')}
            <div id="gameFeedback" style="margin-top:15px;font-weight:bold;"></div>
        `);
    }

    function startMatchGame(){
        const q = lessonLetters[Math.floor(Math.random()*lessonLetters.length)];
        const choices = lessonLetters
            .map(x => x.name)
            .sort(() => Math.random() - 0.5);

        showGame(`
            <h3>Match this letter</h3>
            <div style="font-size:80px;margin:15px;">${q.arabic}</div>
            ${choices.map(name =>
                `<button class="game-choice"
                    onclick="checkGameAnswer('${name}','${q.name}')">${name}</button>`
            ).join('')}
            <div id="gameFeedback" style="margin-top:15px;font-weight:bold;"></div>
        `);
    }

    function startFindGame(){
        const q = lessonLetters[Math.floor(Math.random()*lessonLetters.length)];
        const shuffled = [...lessonLetters].sort(() => Math.random() - 0.5);

        showGame(`
            <h3>Find: ${q.name}</h3>
            <p>Tap the correct Arabic letter.</p>
            ${shuffled.map(item =>
                `<button class="game-choice"
                    style="font-size:45px;"
                    onclick="checkGameAnswer('${item.name}','${q.name}')">${item.arabic}</button>`
            ).join('')}
            <div id="gameFeedback" style="margin-top:15px;font-weight:bold;"></div>
        `);
    }

    function checkGameAnswer(answer, correct){
        const feedback = document.getElementById('gameFeedback');

        if(answer === correct){
            feedback.textContent = '⭐ Correct! Well done!';
            reward();
        } else {
            feedback.textContent = '🌱 Try again.';
        }
    }

</script>

</body>
</html>
