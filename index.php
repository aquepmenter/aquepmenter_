<?php $title = "تاج سرمی"; ?>
<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?= $title ?></title>

<link href="https://fonts.googleapis.com/css2?family=Lalezar&family=Vazirmatn:wght@300;400;600&display=swap" rel="stylesheet">

<style>

/* reset */
*{
margin:0;
padding:0;
box-sizing:border-box;
}

body{
height:100vh;
overflow:hidden;
background:#05040a;
font-family:'Vazirmatn',sans-serif;
color:white;
}

/* ===== CINEMATIC STAGE ===== */

.stage{
position:relative;
width:100%;
height:100%;
display:flex;
justify-content:center;
align-items:center;
overflow:hidden;
}

/* noise layer (texture) */
.stage::before{
content:"";
position:absolute;
inset:0;
background-image:url("https://grainy-gradients.vercel.app/noise.svg");
opacity:.08;
mix-blend-mode:overlay;
pointer-events:none;
}

/* animated gradient depth */
.gradient{
position:absolute;
width:200%;
height:200%;
background:
radial-gradient(circle at 20% 30%, rgba(255,0,150,.25), transparent 40%),
radial-gradient(circle at 80% 60%, rgba(0,200,255,.20), transparent 45%),
radial-gradient(circle at 50% 80%, rgba(120,0,255,.25), transparent 50%);
filter:blur(60px);
animation:move 12s ease-in-out infinite alternate;
}

@keyframes move{
from{transform:translate(-5%,-5%) scale(1);}
to{transform:translate(5%,5%) scale(1.2);}
}

/* floating light orbs */
.orb{
position:absolute;
width:400px;
height:400px;
border-radius:50%;
background:radial-gradient(circle, rgba(255,255,255,.12), transparent 60%);
filter:blur(40px);
animation:float 10s ease-in-out infinite;
}

.orb:nth-child(1){top:10%;left:15%;}
.orb:nth-child(2){bottom:15%;right:20%;animation-duration:14s;}
.orb:nth-child(3){top:40%;right:10%;animation-duration:18s;}

@keyframes float{
0%{transform:translateY(0);}
50%{transform:translateY(-40px);}
100%{transform:translateY(0);}
}

/* ===== HERO CONTENT ===== */

.hero{
text-align:center;
z-index:2;
opacity:0;
transform:scale(1.1);
animation:enter 2s ease forwards;
}

@keyframes enter{
to{
opacity:1;
transform:scale(1);
}
}

h1{
font-family:'Lalezar';
font-size:90px;
letter-spacing:2px;
text-shadow:
0 0 25px rgba(255,0,150,.6),
0 0 60px rgba(0,200,255,.4);
animation:glow 4s ease-in-out infinite alternate;
}

@keyframes glow{
from{filter:brightness(1);}
to{filter:brightness(1.4);}
}

#text{
margin-top:40px;
font-size:32px;
line-height:2.5;
opacity:.9;
min-height:200px;
}

.cursor{
display:inline-block;
width:3px;
height:35px;
background:white;
margin-right:6px;
animation:blink .7s infinite;
}

@keyframes blink{
50%{opacity:0;}
}

footer{
position:fixed;
bottom:18px;
width:100%;
text-align:center;
font-size:13px;
color:#aaa;
letter-spacing:2px;
opacity:.7;
}

</style>
</head>

<body>

<div class="stage">

<div class="gradient"></div>

<div class="orb"></div>
<div class="orb"></div>
<div class="orb"></div>

<div class="hero">

<h1><?= $title ?></h1>

<div id="text"></div>

</div>

</div>

<footer>تقدیم به ساینای عزیزم</footer>
  
/* ===== JS CINEMATIC ENGINE ===== */

<script>

const text = `خاکتم
تاج سرمی
میمیرم برات
خاکتم
خاک پاتم
فدات شم`;

const el = document.getElementById("text");

let i = 0;
let out = "";

/* cinematic typing (frame controlled, not basic timeout feel) */
function type(){
    if(i < text.length){

        let char = text[i];

        if(char === "\n"){
            out += "<br>";
        }else{
            out += char;
        }

        el.innerHTML = out + '<span class="cursor"></span>';

        i++;

        /* smooth cinematic pacing (not linear typing) */
        let delay = 40 + Math.random()*60;

        setTimeout(type, delay);

    }else{
        el.innerHTML = out;
    }
}

type();


/* ===== LIGHT FOLLOW (cinematic depth illusion) ===== */

document.addEventListener("mousemove",(e)=>{

    const x = (e.clientX / window.innerWidth - 0.5);
    const y = (e.clientY / window.innerHeight - 0.5);

    /* move whole scene slightly (fake camera movement) */
    document.querySelector(".stage").style.transform =
        `translate(${x*20}px, ${y*20}px)`;

    /* dynamic glow shift */
    const gradient = document.querySelector(".gradient");
    gradient.style.transform =
        `translate(${x*30}px, ${y*30}px) scale(1.2)`;

});


/* ===== SMOOTH ORB ENERGY PULSE ===== */

setInterval(()=>{

    const orbs = document.querySelectorAll(".orb");

    orbs.forEach((orb,i)=>{

        let scale = 1 + Math.random()*0.15;
        orb.style.transform = `scale(${scale})`;

    });

}, 1200);


/* ===== ENTER SEQUENCE ENHANCEMENT ===== */

window.onload = () => {

    document.body.style.opacity = 0;
    document.body.style.transition = "opacity 1.5s ease";

    setTimeout(()=>{
        document.body.style.opacity = 1;
    },200);

};

</script>

</body>
</html>
