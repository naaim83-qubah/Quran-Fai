<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}"
      dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Harakat · Quran with FAI</title>

    <style>
        *{box-sizing:border-box}

        body{
            margin:0;
            min-height:100vh;
            font-family:Arial,sans-serif;
            color:#fff8e7;
            background:
                radial-gradient(circle at 70% 10%,rgba(244,196,93,.12),transparent 30%),
                linear-gradient(145deg,#062f31,#073f42);
        }

        .page{
            max-width:1100px;
            margin:auto;
            padding:32px 24px 60px;
        }

        .top{
            display:flex;
            align-items:center;
            justify-content:space-between;
            margin-bottom:28px;
        }

        .back{
            color:#d8ebe7;
            text-decoration:none;
            font-weight:700;
        }

        .level{
            color:#ffd875;
            font-size:13px;
            font-weight:900;
            letter-spacing:.5px;
        }

        .teacher{
            border:1px solid rgba(255,255,255,.10);
            border-radius:28px;
            padding:30px;
            background:
                linear-gradient(135deg,rgba(21,90,92,.95),rgba(13,65,68,.95));
            box-shadow:0 25px 60px rgba(0,0,0,.22);
        }

        .teacher-label{
            color:#ffd875;
            font-weight:900;
            font-size:13px;
            margin-bottom:10px;
        }

        h1{
            margin:0 0 10px;
            font-size:36px;
        }

        .teacher p{
            margin:0;
            max-width:700px;
            line-height:1.6;
            color:#d5e7e3;
        }

        .progress-wrap{
            margin-top:25px;
        }

        .progress-info{
            display:flex;
            justify-content:space-between;
            margin-bottom:8px;
            font-size:13px;
            font-weight:800;
        }

        .progress{
            height:10px;
            background:rgba(255,255,255,.10);
            border-radius:20px;
            overflow:hidden;
        }

        .progress-bar{
            width:20%;
            height:100%;
            background:linear-gradient(90deg,#ffd875,#efa93d);
            border-radius:20px;
            transition:.3s ease;
        }

        .instruction{
            text-align:center;
            margin:34px 0 18px;
        }

        .instruction h2{
            margin:0 0 7px;
            font-size:25px;
        }

        .instruction p{
            margin:0;
            color:#bcd6d1;
        }

        .letters{
            display:grid;
            grid-template-columns:repeat(5,1fr);
            gap:16px;
        }

        .letter-card{
            border:1px solid rgba(255,255,255,.10);
            background:rgba(255,255,255,.07);
            border-radius:25px;
            min-height:180px;
            display:flex;
            flex-direction:column;
            align-items:center;
            justify-content:center;
            cursor:pointer;
            transition:.2s ease;
        }

        .letter-card:hover{
            transform:translateY(-4px);
            border-color:rgba(255,216,117,.55);
            background:rgba(255,255,255,.10);
        }

        .letter-card.active{
            border:2px solid #ffd875;
            background:rgba(244,196,93,.15);
            box-shadow:0 12px 30px rgba(244,196,93,.12);
        }

        .arabic{
            font-family:"Geeza Pro","Arial",sans-serif;
            font-size:72px;
            line-height:1;
            margin-bottom:18px;
            color:#fff7dc;
        }

        .listen{
            border:0;
            border-radius:999px;
            padding:9px 15px;
            background:rgba(255,255,255,.10);
            color:#fff;
            font-weight:800;
            cursor:pointer;
        }

        .actions{
            display:flex;
            justify-content:center;
            gap:12px;
            margin-top:28px;
        }

        .action{
            border:0;
            border-radius:16px;
            padding:14px 22px;
            font-size:14px;
            font-weight:900;
            cursor:pointer;
        }

        .repeat{
            background:rgba(255,255,255,.10);
            color:#fff;
        }

        .next{
            background:linear-gradient(135deg,#ffd875,#efa93d);
            color:#173a35;
        }

        @media(max-width:800px){
            .letters{
                grid-template-columns:repeat(2,1fr);
            }

            .letter-card:last-child{
                grid-column:span 2;
            }

            h1{font-size:30px}
        }
    
    .completion-overlay{
        position:fixed;
        inset:0;
        background:rgba(0,18,18,.82);
        backdrop-filter:blur(8px);
        display:none;
        align-items:center;
        justify-content:center;
        z-index:9999;
        padding:24px;
    }

    .completion-overlay.show{
        display:flex;
    }

    .completion-card{
        width:min(460px,100%);
        background:linear-gradient(180deg,#103b38,#082b29);
        border:1px solid rgba(219,174,76,.45);
        border-radius:30px;
        padding:38px 34px 32px;
        text-align:center;
        box-shadow:0 30px 90px rgba(0,0,0,.5);
    }

    .completion-stars{
        font-size:28px;
        letter-spacing:8px;
        margin-bottom:14px;
    }

    .completion-badge{
        width:92px;
        height:92px;
        display:flex;
        align-items:center;
        justify-content:center;
        margin:0 auto 18px;
        border-radius:50%;
        font-size:48px;
        background:rgba(219,174,76,.12);
        border:2px solid rgba(219,174,76,.55);
    }

    .completion-small{
        color:#d9ae4c;
        font-size:12px;
        font-weight:800;
        letter-spacing:2px;
        margin-bottom:8px;
    }

    .completion-card h2{
        margin:0;
        font-size:38px;
        color:#fff7df;
    }

    .completion-card p{
        color:#b9cbc7;
        line-height:1.6;
        margin:10px 0 24px;
    }

    .reward-box{
        display:flex;
        align-items:center;
        justify-content:center;
        gap:14px;
        padding:16px;
        margin:0 auto 24px;
        border-radius:18px;
        background:rgba(255,255,255,.055);
        border:1px solid rgba(255,255,255,.08);
    }

    .reward-box strong,
    .reward-box small{
        display:block;
        text-align:left;
    }

    .reward-box strong{
        color:#f0ca6a;
        font-size:18px;
    }

    .reward-box small{
        color:#8eaaa5;
    }

    .completion-actions{
        display:flex;
        gap:12px;
        justify-content:center;
        flex-wrap:wrap;
    }

    .completion-actions button,
    .completion-actions a{
        border:0;
        border-radius:14px;
        padding:14px 20px;
        font-weight:800;
        cursor:pointer;
        text-decoration:none;
        font-family:inherit;
    }

    .completion-actions button{
        background:#173f3c;
        color:#dce9e6;
    }

    .completion-actions a{
        background:#d6a83e;
        color:#092624;
    }


    .sound-challenge{
        max-width:760px;
        margin:20px auto 0;
        text-align:center;
        padding:34px;
        border-radius:28px;
        background:rgba(255,255,255,.035);
        border:1px solid rgba(255,255,255,.08);
    }

    .sound-icon{
        font-size:52px;
        margin-bottom:12px;
    }

    .play-sound{
        border:0;
        border-radius:16px;
        padding:15px 24px;
        background:#d9ae4c;
        color:#082b29;
        font-size:17px;
        font-weight:800;
        cursor:pointer;
        margin-bottom:22px;
    }

    .sound-challenge h2{
        margin:4px 0 6px;
        font-size:30px;
        color:#fff7df;
    }

    #questionProgress{
        margin:0 0 24px;
        color:#8eaaa5;
        font-weight:700;
    }

    .match-options{
        display:grid;
        grid-template-columns:repeat(4,1fr);
        gap:16px;
        margin:24px auto;
    }

    .match-option{
        min-height:130px;
        border-radius:22px;
        border:1px solid rgba(255,255,255,.12);
        background:rgba(255,255,255,.055);
        color:#fff8e5;
        font-size:62px;
        cursor:pointer;
        transition:.2s ease;
    }

    .match-option:hover{
        transform:translateY(-3px);
        border-color:#d9ae4c;
    }

    .match-option.correct{
        background:rgba(49,180,120,.22);
        border-color:#57d498;
    }

    .match-option.wrong{
        background:rgba(220,80,80,.18);
        border-color:#e37474;
    }

    .match-feedback{
        min-height:32px;
        font-size:18px;
        font-weight:800;
        margin:14px 0;
    }

    .match-feedback.correct{
        color:#73dda9;
    }

    .match-feedback.wrong{
        color:#ef8c8c;
    }

    #nextQuestion:disabled{
        opacity:.4;
        cursor:not-allowed;
    }

    @media(max-width:700px){
        .match-options{
            grid-template-columns:repeat(2,1fr);
        }
    }


    .harakat-challenge{
        max-width:760px;
        margin:20px auto 0;
        text-align:center;
        padding:36px;
        border-radius:28px;
        background:rgba(255,255,255,.035);
        border:1px solid rgba(255,255,255,.08);
    }

    .harakat-symbol{
        font-size:110px;
        line-height:1;
        color:#fff7df;
        margin:8px 0 22px;
    }

    .harakat-options{
        display:grid;
        grid-template-columns:repeat(3,1fr);
        gap:16px;
        margin:24px auto;
    }

    .harakat-option{
        min-height:95px;
        border-radius:20px;
        border:1px solid rgba(255,255,255,.12);
        background:rgba(255,255,255,.055);
        color:#fff8e5;
        font-size:18px;
        font-weight:800;
        cursor:pointer;
        transition:.2s ease;
    }

    .harakat-option:hover{
        transform:translateY(-3px);
        border-color:#d9ae4c;
    }

    .harakat-option.correct{
        background:rgba(49,180,120,.22);
        border-color:#57d498;
    }

    .harakat-option.wrong{
        background:rgba(220,80,80,.18);
        border-color:#e37474;
    }

    @media(max-width:700px){
        .harakat-options{
            grid-template-columns:1fr;
        }
    }

</style>
</head>

<body>

<div class="page">

    <div class="top">
        <a href="/" class="back">← Quran Journey</a>
        <div class="level">LEVEL 3 · HARAKAT</div>
    </div>

    <section class="teacher">

        <div class="teacher-label">🎧 TEACHER FAI</div>

        <h1>Fathah, Kasrah & Dammah</h1>

        <p>
            {{ __('quran.teacher_instruction') }}
            Today we will begin with five letters.
            Touch each letter, listen carefully, and repeat.
        </p>

        <div class="progress-wrap">

            <div class="progress-info">
                <span>Lesson Progress</span>
                <span id="progressText">1 / 5</span>
            </div>

            <div class="progress">
                <div class="progress-bar" id="progressBar"></div>
            </div>

        </div>

    </section>

    
    
    <div class="instruction">
        <h2>See · Listen · Choose</h2>
        <p>Look at the harakah, listen to the sound, then choose the correct answer.</p>
    </div>

    <div class="harakat-challenge">
        <div class="harakat-symbol" id="harakatSymbol">بَ</div>

        <button type="button" class="play-sound" id="playSound">
            🔊 Play Sound
        </button>

        <h2>Which harakah is this?</h2>
        <p id="questionProgress">Question 1 of 6</p>

        <div class="harakat-options" id="harakatOptions"></div>

        <div class="match-feedback" id="matchFeedback"></div>

        <button type="button" class="action next" id="nextQuestion" disabled>
            Next →
        </button>
    </div>

<div class="completion-overlay" id="completionOverlay">
        <div class="completion-card">
            <div class="completion-stars">⭐ ⭐ ⭐</div>
            <div class="completion-badge">🏆</div>

            <div class="completion-small">LESSON COMPLETE</div>

            <h2>MashaAllah!</h2>
            <p>You completed the Harakat lesson.</p>

            <div class="reward-box">
                <span>⭐</span>
                <div>
                    <strong id="rewardHasana">+20 Hasana</strong>
                    <small id="rewardStatus">Reward earned</small>
                </div>
            </div>

            <div class="completion-actions">
                <button type="button" id="practiceAgain">
                    ↻ Practice Again
                </button>

                <a href="{{ url('/') }}">
                    Quran Journey →
                </a>
            </div>
        </div>
    </div>


</div>



<script>
    const questions = [
        { symbol:'بَ', name:'Fathah', sound:'ba' },
        { symbol:'بِ', name:'Kasrah', sound:'bi' },
        { symbol:'بُ', name:'Dammah', sound:'bu' },
        { symbol:'تَ', name:'Fathah', sound:'ta' },
        { symbol:'تِ', name:'Kasrah', sound:'ti' },
        { symbol:'تُ', name:'Dammah', sound:'tu' }
    ];

    const harakatSymbol = document.getElementById('harakatSymbol');
    const harakatOptions = document.getElementById('harakatOptions');
    const matchFeedback = document.getElementById('matchFeedback');
    const nextQuestion = document.getElementById('nextQuestion');
    const questionProgress = document.getElementById('questionProgress');
    const playSound = document.getElementById('playSound');

    const progressBar = document.getElementById('progressBar');
    const progressText = document.getElementById('progressText');

    const completionOverlay = document.getElementById('completionOverlay');
    const practiceAgain = document.getElementById('practiceAgain');
    const rewardHasana = document.getElementById('rewardHasana');
    const rewardStatus = document.getElementById('rewardStatus');

    let order = [];
    let index = 0;
    let answered = false;

    function shuffle(array){
        return [...array].sort(() => Math.random() - 0.5);
    }

    function speakCurrent(){
        const current = order[index];

        if ('speechSynthesis' in window) {
            speechSynthesis.cancel();

            const utterance = new SpeechSynthesisUtterance(current.sound);
            utterance.lang = 'ar-SA';
            utterance.rate = 0.7;

            speechSynthesis.speak(utterance);
        }
    }

    function renderQuestion(){
        answered = false;
        nextQuestion.disabled = true;

        const current = order[index];

        harakatSymbol.textContent = current.symbol;
        questionProgress.textContent = `Question ${index + 1} of ${order.length}`;
        progressText.textContent = `${index + 1} / ${order.length}`;
        progressBar.style.width = `${((index + 1) / order.length) * 100}%`;

        matchFeedback.textContent = '';
        matchFeedback.className = 'match-feedback';

        const choices = shuffle(['Fathah', 'Kasrah', 'Dammah']);

        harakatOptions.innerHTML = '';

        choices.forEach(name => {
            const button = document.createElement('button');
            button.type = 'button';
            button.className = 'harakat-option';
            button.textContent = name;

            button.addEventListener('click', () => {
                if(answered) return;

                if(name === current.name){
                    answered = true;
                    button.classList.add('correct');

                    matchFeedback.textContent =
                        '✅ MashaAllah! Correct! ⭐';

                    matchFeedback.className =
                        'match-feedback correct';

                    nextQuestion.disabled = false;
                } else {
                    button.classList.add('wrong');

                    matchFeedback.textContent =
                        'Try again — look carefully at the harakah.';

                    matchFeedback.className =
                        'match-feedback wrong';
                }
            });

            harakatOptions.appendChild(button);
        });
    }

    function completeLevel(){
        const rewardKey = 'quran_fai_level3_rewarded';
        const hasanaKey = 'quran_fai_hasana';

        if (!localStorage.getItem(rewardKey)) {
            const currentHasana = parseInt(
                localStorage.getItem(hasanaKey) || '120',
                10
            );

            localStorage.setItem(hasanaKey, currentHasana + 20);
            localStorage.setItem(rewardKey, '1');

            rewardHasana.textContent = '+20 Hasana';
            rewardStatus.textContent = 'Reward earned';
        } else {
            rewardHasana.textContent = '⭐ Hasana secured';
            rewardStatus.textContent = 'Reward already earned';
        }

        completionOverlay.classList.add('show');
    }

    function startLevel(){
        order = shuffle(questions);
        index = 0;

        completionOverlay.classList.remove('show');
        renderQuestion();

        setTimeout(speakCurrent, 350);
    }

    playSound.addEventListener('click', speakCurrent);

    nextQuestion.addEventListener('click', () => {
        if(!answered) return;

        if(index < order.length - 1){
            index++;
            renderQuestion();
            setTimeout(speakCurrent, 300);
        } else {
            completeLevel();
        }
    });

    practiceAgain.addEventListener('click', startLevel);

    startLevel();
</script>



</body>
</html>
