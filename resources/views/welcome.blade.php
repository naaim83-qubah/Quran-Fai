<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quran with FAI</title>

    <style>
        *{
            box-sizing:border-box;
        }

        :root{
            --bg:#082f33;
            --bg-deep:#052629;
            --panel:#0d3d41;
            --panel-soft:#11484d;
            --cream:#fff9e7;
            --gold:#f4c45d;
            --gold-soft:#ffe7a6;
            --teal:#5cc6b2;
            --purple:#8e7ee8;
            --orange:#f0a554;
            --blue:#60a8e8;
            --pink:#e989b0;
            --green:#5ebc7c;
            --text:#f8f4df;
            --muted:#b5cecb;
        }

        body{
            margin:0;
            min-height:100vh;
            font-family:Arial,Helvetica,sans-serif;
            color:var(--text);
            background:
                radial-gradient(circle at 50% 30%, rgba(68,146,140,.18), transparent 34%),
                linear-gradient(135deg,var(--bg-deep),var(--bg));
            overflow-x:hidden;
        }

        body:before{
            content:"";
            position:fixed;
            inset:0;
            pointer-events:none;
            opacity:.13;
            background-image:
                linear-gradient(30deg, rgba(255,255,255,.06) 12%, transparent 12.5%, transparent 87%, rgba(255,255,255,.06) 87.5%),
                linear-gradient(150deg, rgba(255,255,255,.06) 12%, transparent 12.5%, transparent 87%, rgba(255,255,255,.06) 87.5%);
            background-size:54px 94px;
        }

        .app{
            min-height:100vh;
            display:grid;
            grid-template-columns:300px 1fr;
        }

        .sidebar{
            position:relative;
            z-index:2;
            padding:28px 24px;
            background:rgba(4,34,36,.86);
            border-right:1px solid rgba(255,255,255,.08);
            backdrop-filter:blur(12px);
        }

        .brand{
            display:flex;
            align-items:center;
            gap:12px;
            margin-bottom:32px;
        }

        .brand-mark{
            width:50px;
            height:50px;
            border-radius:17px;
            background:linear-gradient(145deg,#ffe9a3,#e9ad44);
            display:flex;
            align-items:center;
            justify-content:center;
            font-size:28px;
            box-shadow:0 8px 24px rgba(0,0,0,.2);
        }

        .brand h1{
            font-size:20px;
            margin:0;
        }

        .brand small{
            color:var(--muted);
        }

        .profile{
            display:flex;
            align-items:center;
            gap:12px;
            padding:15px;
            border-radius:20px;
            background:rgba(255,255,255,.07);
            margin-bottom:24px;
        }

        .avatar{
            width:47px;
            height:47px;
            border-radius:50%;
            background:#f1c45f;
            display:flex;
            align-items:center;
            justify-content:center;
            font-size:24px;
        }

        .profile strong{
            display:block;
        }

        .profile span{
            color:var(--muted);
            font-size:13px;
        }

        .stat-card{
            padding:18px;
            margin-bottom:14px;
            border-radius:22px;
            background:linear-gradient(145deg,rgba(255,255,255,.09),rgba(255,255,255,.04));
            border:1px solid rgba(255,255,255,.08);
        }

        .stat-top{
            display:flex;
            justify-content:space-between;
            align-items:center;
            margin-bottom:7px;
        }

        .stat-label{
            color:var(--muted);
            font-size:13px;
        }

        .stat-value{
            font-size:24px;
            font-weight:800;
        }

        .reward{
            margin-top:24px;
            padding:18px;
            background:linear-gradient(145deg,#173f43,#0b3539);
            border-radius:24px;
            border:1px solid rgba(244,196,93,.22);
        }

        .reward-icon{
            font-size:38px;
            margin-bottom:8px;
        }

        .reward h3{
            margin:0 0 6px;
            font-size:16px;
        }

        .reward p{
            margin:0;
            color:var(--muted);
            font-size:13px;
            line-height:1.45;
        }

        .main{
            position:relative;
            z-index:1;
            padding:26px 34px 50px;
        }

        .topbar{
            display:flex;
            align-items:center;
            justify-content:space-between;
            margin-bottom:22px;
        }

        .welcome h2{
            margin:0 0 5px;
            font-size:27px;
        }

        .welcome p{
            margin:0;
            color:var(--muted);
        }

        .top-actions{
            display:flex;
            gap:10px;
        }

        .circle-btn{
            width:43px;
            height:43px;
            border:none;
            border-radius:50%;
            background:rgba(255,255,255,.08);
            color:white;
            font-size:18px;
            cursor:pointer;
        }

        .hero{
            position:relative;
            min-height:220px;
            border-radius:34px;
            overflow:hidden;
            padding:30px;
            display:grid;
            grid-template-columns:1fr 260px;
            gap:20px;
            background:
                radial-gradient(circle at 80% 20%,rgba(244,196,93,.18),transparent 28%),
                linear-gradient(135deg,#15555a,#0e4246);
            border:1px solid rgba(255,255,255,.08);
            box-shadow:0 24px 60px rgba(0,0,0,.22);
        }

        .hero-copy{
            align-self:center;
        }

        .eyebrow{
            display:inline-block;
            color:#ffe2a0;
            background:rgba(244,196,93,.12);
            padding:8px 12px;
            border-radius:999px;
            font-size:12px;
            font-weight:800;
            letter-spacing:.5px;
            margin-bottom:14px;
        }

        .hero h3{
            font-size:30px;
            line-height:1.18;
            margin:0 0 10px;
            max-width:560px;
        }

        .hero p{
            margin:0 0 20px;
            color:#d0e3df;
            max-width:580px;
            line-height:1.6;
        }

        .continue-btn{
            border:none;
            border-radius:18px;
            background:linear-gradient(135deg,#f9cf6a,#e8aa42);
            color:#17352f;
            padding:14px 22px;
            font-weight:900;
            cursor:pointer;
            font-size:15px;
            box-shadow:0 10px 25px rgba(244,196,93,.18);
        }

        .quran-art{
            display:flex;
            align-items:center;
            justify-content:center;
        }

        .quran-wrap{
            width:195px;
            height:150px;
            position:relative;
        }

        .book{
            position:absolute;
            left:18px;
            right:18px;
            bottom:12px;
            height:110px;
            border-radius:18px 18px 28px 28px;
            background:linear-gradient(145deg,#f3dc9e,#c79643);
            transform:perspective(450px) rotateX(11deg);
            box-shadow:0 20px 35px rgba(0,0,0,.28);
        }

        .book:before,
        .book:after{
            content:"";
            position:absolute;
            top:7px;
            bottom:13px;
            width:47%;
            background:linear-gradient(#fff8df,#ecdca9);
            border-radius:12px;
        }

        .book:before{left:3px; transform:rotateY(-9deg);}
        .book:after{right:3px; transform:rotateY(9deg);}

        .moon{
            position:absolute;
            top:5px;
            right:8px;
            font-size:48px;
            filter:drop-shadow(0 6px 12px rgba(0,0,0,.2));
        }

        .section-head{
            display:flex;
            align-items:flex-end;
            justify-content:space-between;
            margin:30px 0 16px;
        }

        .section-head h3{
            margin:0;
            font-size:23px;
        }

        .section-head p{
            margin:4px 0 0;
            color:var(--muted);
            font-size:14px;
        }

        .progress-text{
            color:#ffe3a0;
            font-weight:800;
            font-size:13px;
        }

        .journey{
            position:relative;
            padding:20px 6px 55px;
        }

        .path{
            position:absolute;
            left:50%;
            top:60px;
            bottom:40px;
            width:8px;
            transform:translateX(-50%);
            border-radius:20px;
            background:
                repeating-linear-gradient(
                    to bottom,
                    rgba(255,255,255,.18) 0,
                    rgba(255,255,255,.18) 24px,
                    rgba(255,255,255,.05) 24px,
                    rgba(255,255,255,.05) 42px
                );
        }

        .stage{
            position:relative;
            min-height:150px;
            display:grid;
            grid-template-columns:1fr 90px 1fr;
            align-items:center;
        }

        .stone{
            grid-column:2;
            justify-self:center;
            width:70px;
            height:54px;
            border:none;
            border-radius:50%;
            display:flex;
            align-items:center;
            justify-content:center;
            font-weight:900;
            color:#163735;
            box-shadow:0 10px 18px rgba(0,0,0,.28);
            z-index:2;
            transform:rotate(-4deg);
        }

        .stage:nth-child(even) .stone{
            transform:rotate(5deg);
        }

        .lesson{
            width:min(360px,95%);
            padding:20px;
            border-radius:25px;
            background:rgba(255,255,255,.075);
            border:1px solid rgba(255,255,255,.08);
            box-shadow:0 18px 35px rgba(0,0,0,.15);
            transition:.2s ease;
        }

        .lesson:hover{
            transform:translateY(-4px);
        }

        .stage.left .lesson{
            grid-column:1;
            justify-self:end;
            margin-right:24px;
        }

        .stage.right .lesson{
            grid-column:3;
            justify-self:start;
            margin-left:24px;
        }

        .lesson-top{
            display:flex;
            align-items:center;
            gap:12px;
        }

        .lesson-icon{
            flex:0 0 52px;
            width:52px;
            height:52px;
            border-radius:17px;
            display:flex;
            align-items:center;
            justify-content:center;
            font-size:27px;
            color:#17352f;
        }

        .lesson h4{
            margin:0 0 4px;
            font-size:18px;
        }

        .lesson p{
            margin:0;
            color:var(--muted);
            font-size:13px;
        }

        .chips{
            display:flex;
            gap:8px;
            flex-wrap:wrap;
            margin-top:14px;
        }

        .chip{
            padding:7px 10px;
            border-radius:999px;
            background:rgba(255,255,255,.08);
            font-size:11px;
            font-weight:800;
            color:#d8e7e4;
        }

        .current{
            border-color:rgba(244,196,93,.48);
            box-shadow:0 18px 40px rgba(244,196,93,.12);
        }

        .locked{
            opacity:.55;
            filter:saturate(.55);
        }

        .locked .lesson{
            background:rgba(255,255,255,.04);
        }

        .lock{
            margin-left:auto;
            font-size:18px;
        }

        .stone.gold{background:linear-gradient(145deg,#ffe89a,#eab13e);}
        .stone.teal{background:linear-gradient(145deg,#90e6d3,#4ab5a0);}
        .stone.purple{background:linear-gradient(145deg,#b9aaff,#7768d3);}
        .stone.orange{background:linear-gradient(145deg,#ffc77e,#e9923a);}
        .stone.blue{background:linear-gradient(145deg,#9fd3ff,#529edc);}
        .stone.green{background:linear-gradient(145deg,#a4e4ad,#55b672);}
        .stone.pink{background:linear-gradient(145deg,#f7b1d0,#d86f9f);}

        .gold-bg{background:#f1c85d;}
        .teal-bg{background:#72d5c1;}
        .purple-bg{background:#9d8fe8;}
        .orange-bg{background:#efad63;}
        .blue-bg{background:#72b4eb;}
        .green-bg{background:#76cb8d;}
        .pink-bg{background:#e693ba;}

        .bottom-flow{
            display:flex;
            flex-wrap:wrap;
            justify-content:center;
            gap:10px;
            padding:22px;
            border-radius:24px;
            background:rgba(255,255,255,.05);
            border:1px solid rgba(255,255,255,.06);
        }

        .flow-item{
            padding:10px 13px;
            border-radius:14px;
            background:rgba(255,255,255,.07);
            font-size:12px;
            font-weight:800;
        }

        @media(max-width:980px){
            .app{
                grid-template-columns:1fr;
            }

            .sidebar{
                border-right:none;
                border-bottom:1px solid rgba(255,255,255,.08);
            }

            .sidebar .stats-wrap{
                display:grid;
                grid-template-columns:repeat(3,1fr);
                gap:12px;
            }

            .reward{
                display:none;
            }

            .hero{
                grid-template-columns:1fr;
            }

            .quran-art{
                display:none;
            }
        }

        @media(max-width:720px){
            .main{
                padding:20px 15px 35px;
            }

            .sidebar{
                padding:20px 15px;
            }

            .sidebar .stats-wrap{
                grid-template-columns:1fr;
            }

            .stage{
                grid-template-columns:62px 1fr;
                min-height:145px;
            }

            .path{
                left:31px;
                transform:none;
            }

            .stone,
            .stage:nth-child(even) .stone{
                grid-column:1;
                width:58px;
                height:46px;
                transform:none;
            }

            .stage.left .lesson,
            .stage.right .lesson{
                grid-column:2;
                justify-self:stretch;
                margin:0 0 0 14px;
                width:auto;
            }

            .top-actions{
                display:none;
            }

            .hero h3{
                font-size:25px;
            }
        }
    </style>
</head>

<body>

<div class="app">

    <aside class="sidebar">

        <div class="brand">
            <div class="brand-mark">📖</div>
            <div>
                <h1>Quran with FAI</h1>
                <small>Learn · Read · Grow</small>
            </div>
        </div>

        <div class="profile">
            <div class="avatar">🧒</div>
            <div>
                <strong>Assalamualaikum!</strong>
                <span>Young Quran Explorer</span>
            </div>
        </div>

        <div class="stats-wrap">
            <div class="stat-card">
                <div class="stat-top">
                    <span class="stat-label">Hasana</span>
                    <span>⭐</span>
                </div>
                <div class="stat-value" id="hasana">120</div>
            </div>

            <div class="stat-card">
                <div class="stat-top">
                    <span class="stat-label">Reading Streak</span>
                    <span>🔥</span>
                </div>
                <div class="stat-value">5 days</div>
            </div>

            <div class="stat-card">
                <div class="stat-top">
                    <span class="stat-label">Stars Earned</span>
                    <span>🌟</span>
                </div>
                <div class="stat-value">18</div>
            </div>
        </div>

        <div class="reward">
            <div class="reward-icon">🏅</div>
            <h3>Next Reward</h3>
            <p>Complete 2 more lessons to unlock your <strong>Little Qari Badge</strong>.</p>
        </div>

    </aside>

    <main class="main">

        <div class="topbar">
            <div class="welcome">
                <h2>Your Quran Journey</h2>
                <p>Every small step brings you closer to reading with confidence.</p>
            </div>

            <div class="top-actions">
                <button class="circle-btn">🔊</button>
                <button class="circle-btn">⚙️</button>
            </div>
        </div>

        <section class="hero">
            <div class="hero-copy">
                <div class="eyebrow">CURRENT LESSON · LEVEL 1</div>

                <h3>Meet the Arabic Letters</h3>

                <p>
                    Begin with the first five Hijaiyah letters.
                    Listen carefully, repeat with Teacher FAI, touch the letters and start reading.
                </p>

                <button class="continue-btn" onclick="continueLearning()">
                    ▶ Continue Learning
                </button>
            </div>

            <div class="quran-art">
                <div class="quran-wrap">
                    <div class="moon">☾</div>
                    <div class="book"></div>
                </div>
            </div>
        </section>

        <div class="section-head">
            <div>
                <h3>Learning Journey</h3>
                <p>Follow the path and unlock each Quran reading skill.</p>
            </div>

            <div class="progress-text">Level 1 · 20% complete</div>
        </div>

        <section class="journey">

            <div class="path"></div>

            <div class="stage left">
                <button class="stone gold">1</button>

                <div class="lesson current">
                    <div class="lesson-top">
                        <div class="lesson-icon gold-bg">ا</div>
                        <div>
                            <h4>Arabic Letters</h4>
                            <p>Recognise and pronounce Hijaiyah letters.</p>
                        </div>
                    </div>

                    <div class="chips">
                        <span class="chip">👂 Listen</span>
                        <span class="chip">🗣 Repeat</span>
                        <span class="chip">👆 Touch</span>
                    </div>
                </div>
            </div>

            <div class="stage right">
                <button class="stone teal">2</button>

                <div class="lesson">
                    <div class="lesson-top">
                        <div class="lesson-icon teal-bg">ب</div>
                        <div>
                            <h4>Letter Sounds</h4>
                            <p>Hear each letter and match the correct sound.</p>
                        </div>
                    </div>

                    <div class="chips">
                        <span class="chip">🔊 Listen</span>
                        <span class="chip">🧩 Match</span>
                    </div>
                </div>
            </div>

            <div class="stage left locked">
                <button class="stone purple">3</button>

                <div class="lesson">
                    <div class="lesson-top">
                        <div class="lesson-icon purple-bg">بَ</div>
                        <div>
                            <h4>Harakat</h4>
                            <p>Learn Fathah, Kasrah and Dammah.</p>
                        </div>
                        <span class="lock">🔒</span>
                    </div>
                </div>
            </div>

            <div class="stage right locked">
                <button class="stone orange">4</button>

                <div class="lesson">
                    <div class="lesson-top">
                        <div class="lesson-icon orange-bg">بت</div>
                        <div>
                            <h4>Joining Letters</h4>
                            <p>See how Arabic letters connect together.</p>
                        </div>
                        <span class="lock">🔒</span>
                    </div>
                </div>
            </div>

            <div class="stage left locked">
                <button class="stone blue">5</button>

                <div class="lesson">
                    <div class="lesson-top">
                        <div class="lesson-icon blue-bg">ـٌ</div>
                        <div>
                            <h4>Tanwin, Sukun & Shaddah</h4>
                            <p>Build stronger reading patterns.</p>
                        </div>
                        <span class="lock">🔒</span>
                    </div>
                </div>
            </div>

            <div class="stage right locked">
                <button class="stone green">6</button>

                <div class="lesson">
                    <div class="lesson-top">
                        <div class="lesson-icon green-bg">آ</div>
                        <div>
                            <h4>Mad</h4>
                            <p>Learn how and when sounds are extended.</p>
                        </div>
                        <span class="lock">🔒</span>
                    </div>
                </div>
            </div>

            <div class="stage left locked">
                <button class="stone pink">7</button>

                <div class="lesson">
                    <div class="lesson-top">
                        <div class="lesson-icon pink-bg">۞</div>
                        <div>
                            <h4>Basic Tajwid</h4>
                            <p>Discover simple rules for beautiful Quran reading.</p>
                        </div>
                        <span class="lock">🔒</span>
                    </div>
                </div>
            </div>

            <div class="stage right locked">
                <button class="stone gold">8</button>

                <div class="lesson">
                    <div class="lesson-top">
                        <div class="lesson-icon gold-bg">كلمة</div>
                        <div>
                            <h4>Quranic Words</h4>
                            <p>Read real words found in the Quran.</p>
                        </div>
                        <span class="lock">🔒</span>
                    </div>
                </div>
            </div>

            <div class="stage left locked">
                <button class="stone teal">9</button>

                <div class="lesson">
                    <div class="lesson-top">
                        <div class="lesson-icon teal-bg">آية</div>
                        <div>
                            <h4>Short Ayat</h4>
                            <p>Combine your skills to read short verses.</p>
                        </div>
                        <span class="lock">🔒</span>
                    </div>
                </div>
            </div>

            <div class="stage right locked">
                <button class="stone purple">10</button>

                <div class="lesson">
                    <div class="lesson-top">
                        <div class="lesson-icon purple-bg">📖</div>
                        <div>
                            <h4>Read with FAI</h4>
                            <p>Read together with Teacher FAI step by step.</p>
                        </div>
                        <span class="lock">🔒</span>
                    </div>
                </div>
            </div>

        </section>

        <div class="bottom-flow">
            <span class="flow-item">👂 Listen</span>
            <span class="flow-item">🗣 Repeat</span>
            <span class="flow-item">👆 Touch</span>
            <span class="flow-item">🧩 Match</span>
            <span class="flow-item">📖 Read</span>
            <span class="flow-item">⭐ Earn Hasana</span>
            <span class="flow-item">🔓 Unlock</span>
        </div>

    </main>

</div>

<script>
    function continueLearning(){
        const current = document.querySelector('.current');
        if(current){
            current.scrollIntoView({
                behavior:'smooth',
                block:'center'
            });

            current.animate(
                [
                    {transform:'scale(1)'},
                    {transform:'scale(1.035)'},
                    {transform:'scale(1)'}
                ],
                {
                    duration:700
                }
            );
        }
    }
</script>

</body>
</html>
