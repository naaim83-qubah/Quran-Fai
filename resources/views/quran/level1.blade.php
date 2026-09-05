<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}"
      dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arabic Letters · Quran with FAI</title>

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

</style>
</head>

<body>

<div class="page">

    <div class="top">
        <a href="/" class="back">← Quran Journey</a>
        <div class="level">LEVEL 1 · ARABIC LETTERS</div>
    </div>

    <section class="teacher">

        <div class="teacher-label">🎧 TEACHER FAI</div>

        <h1>Meet the Arabic Letters</h1>

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
        <h2>Listen · Repeat · Touch</h2>
        <p>Tap a letter to begin.</p>
    </div>

    <div class="letters">

        @php
            $lessonLetters = [
                ['letter' => 'ا', 'audio' => 'alif.wav'],
                ['letter' => 'ب', 'audio' => 'ba.wav'],
                ['letter' => 'ت', 'audio' => 'ta.wav'],
                ['letter' => 'ث', 'audio' => 'tha.wav'],
                ['letter' => 'ج', 'audio' => 'jim.wav'],
                ['letter' => 'ح', 'audio' => 'ha.wav'],
                ['letter' => 'خ', 'audio' => 'kha.wav'],
                ['letter' => 'د', 'audio' => 'dal.wav'],
                ['letter' => 'ذ', 'audio' => 'dhal.wav'],
                ['letter' => 'ر', 'audio' => 'ra.wav'],
                ['letter' => 'ز', 'audio' => 'zay.wav'],
                ['letter' => 'س', 'audio' => 'sin.wav'],
                ['letter' => 'ش', 'audio' => 'shin.wav'],
                ['letter' => 'ص', 'audio' => 'sad.wav'],
                ['letter' => 'ض', 'audio' => 'dad.wav'],
                ['letter' => 'ط', 'audio' => 'ta_emphatic.wav'],
                ['letter' => 'ظ', 'audio' => 'za_emphatic.wav'],
                ['letter' => 'ع', 'audio' => 'ain.wav'],
                ['letter' => 'غ', 'audio' => 'ghain.wav'],
                ['letter' => 'ف', 'audio' => 'fa.wav'],
                ['letter' => 'ق', 'audio' => 'qaf.wav'],
                ['letter' => 'ك', 'audio' => 'kaf.wav'],
                ['letter' => 'ل', 'audio' => 'lam.wav'],
                ['letter' => 'م', 'audio' => 'mim.wav'],
                ['letter' => 'ن', 'audio' => 'nun.wav'],
                ['letter' => 'ه', 'audio' => 'ha_final.wav'],
                ['letter' => 'و', 'audio' => 'waw.wav'],
                ['letter' => 'ي', 'audio' => 'ya.wav'],
            ];
        @endphp

        @foreach($lessonLetters as $index => $item)

            <div class="letter-card {{ $index === 0 ? 'active' : '' }}"
                 data-index="{{ $index + 1 }}">

                <div class="arabic">{{ $item['letter'] }}</div>

                <button class="listen"
                        type="button"
                        data-audio="{{ asset('audio/quran-fai/level-1/pronunciation/'.$item['audio']) }}">
                    🔊 {{ __('quran.listen') }}
                </button>

            </div>

        @endforeach

    </div>

    <div class="actions">

        <button class="action repeat" type="button">
            🎙 {{ __('quran.repeat') }}
        </button>

        <button class="action next" type="button" id="nextButton">
            Next Letter →
        </button>

    </div>
    <div class="completion-overlay" id="completionOverlay">
        <div class="completion-card">
            <div class="completion-stars">⭐ ⭐ ⭐</div>
            <div class="completion-badge">🏆</div>

            <div class="completion-small">LESSON COMPLETE</div>

            <h2>MashaAllah!</h2>
            <p>You completed your first Arabic letter lesson.</p>

            <div class="reward-box">
                <span>⭐</span>
                <div>
                    <strong id="rewardHasana">+10 Hasana</strong>
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
    const cards = [...document.querySelectorAll('.letter-card')];
    const progressBar = document.getElementById('progressBar');
    const progressText = document.getElementById('progressText');
    const nextButton = document.getElementById('nextButton');
    const completionOverlay = document.getElementById('completionOverlay');
    const practiceAgain = document.getElementById('practiceAgain');
    const rewardHasana = document.getElementById('rewardHasana');
    const rewardStatus = document.getElementById('rewardStatus');

    let current = 0;

    function selectLetter(index, autoplay = false){
        current = index;

        cards.forEach((card, i) => {
            card.classList.toggle('active', i === current);
        });

        progressText.textContent = `${current + 1} / ${cards.length}`;
        progressBar.style.width = `${((current + 1) / cards.length) * 100}%`;

        nextButton.textContent =
            current === cards.length - 1 ? 'Complete Lesson ⭐' : 'Next Letter →';

        if (autoplay) {
            const button = cards[current].querySelector('.listen');

            if (button) {
                const audio = new Audio(button.dataset.audio);

                audio.play().catch(() => {
                    alert('Audio could not be played.');
                });
            }
        }
    }

    cards.forEach((card, index) => {
        card.addEventListener('click', () => selectLetter(index));
    });

    document.querySelectorAll('.listen').forEach((button) => {
        button.addEventListener('click', (event) => {
            event.stopPropagation();

            const src = button.dataset.audio;
            const audio = new Audio(src);

            audio.play().catch(() => {
                alert('Audio file not added yet.');
            });
        });
    });

    nextButton.addEventListener('click', () => {

        if(current < cards.length - 1){
            selectLetter(current + 1, true);
        }else{
            const rewardKey = 'quran_fai_level1_rewarded';
            const hasanaKey = 'quran_fai_hasana';

            if (!localStorage.getItem(rewardKey)) {
                const currentHasana = parseInt(
                    localStorage.getItem(hasanaKey) || '120',
                    10
                );

                localStorage.setItem(hasanaKey, currentHasana + 10);
                localStorage.setItem(rewardKey, '1');

                rewardHasana.textContent = '+10 Hasana';
                rewardStatus.textContent = 'Reward earned';
            } else {
                rewardHasana.textContent = '⭐ Hasana secured';
                rewardStatus.textContent = 'Reward already earned';
            }

            completionOverlay.classList.add('show');
        }

    });

    practiceAgain.addEventListener('click', () => {
        completionOverlay.classList.remove('show');
        selectLetter(0);
    });

</script>

</body>
</html>
