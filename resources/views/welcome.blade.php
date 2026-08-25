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
        @media(max-width:700px){
            .letters{grid-template-columns:1fr;}
            .hero h1{font-size:34px;}
        }
    </style>
</head>
<body>

<div class="wrap">

    <div class="hero">
        <div class="badge">Level 1 · Huruf Hijaiyah</div>
        <h1>📖 Quran with FAI</h1>
        <p>Learn to read the Quran step by step with Teacher FAI.</p>
    </div>

    <div class="card">
        <h2 style="text-align:center;">Kenali Huruf Pertama ✨</h2>
        <p style="text-align:center;color:#667;">Tap a letter to begin learning its sound.</p>

        <div class="letters">

            <button class="letter" onclick="learnLetter('Alif')">
                <div class="arabic">ا</div>
                <div class="name">Alif</div>
            </button>

            <button class="letter" onclick="learnLetter('Ba')">
                <div class="arabic">ب</div>
                <div class="name">Ba</div>
            </button>

            <button class="letter" onclick="learnLetter('Ta')">
                <div class="arabic">ت</div>
                <div class="name">Ta</div>
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

        <div class="stars">
            ⭐ <span id="stars">0</span> Stars
        </div>
    </div>

</div>

<script>
    let stars = 0;

    function learnLetter(letter){
        document.getElementById('message').textContent =
            'Teacher FAI will teach: ' + letter + ' 🔊';

        stars++;
        document.getElementById('stars').textContent = stars;
    }
</script>

</body>
</html>
