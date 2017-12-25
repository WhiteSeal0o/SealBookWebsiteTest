/*===================First Canvas======================*/

var canvas = document.querySelector('#canvas1');

canvas.width = innerWidth;
canvas.height = innerHeight;

var c = canvas.getContext('2d');

var mouse = {
    x: undefined,
    y:undefined
};

var minR = 3;

var colors = [
    '#A8BAA9',
    '#FFF5CF',
    '#DBCDAD',
    '#B29C7D',
    '#E1F7E7',
    '#7F6854',
];

var colors = [
    '#F2A03D',
    '#F17A97',
    '#F3BCC8',
    '#F26849',
    '#F24968',
    '#D93240',
];

// var colors = [
//   'rgba(222,123,231,0.5)',
//   'rgba(255,0,50,0.5)',
//   'rgba(255,0,122,0.5)',
//   'rgba(255,122,50,0.5)',
//   'rgba(122,0,50,0.5)',
//   'rgba(255,221,50,0.5)',
//   'rgba(255,0,111,0.5)',
// ];

window.addEventListener('mousemove', function (event) {
    mouse.x = event.x;
    mouse.y = event.y;
});

function Circle(x,y,dx,dy,radius) {

    this.x = x;
    this.dx = dx;
    this.y = y;
    this.dy = dy;
    this.radius = radius;
    this.maxR = radius;
    this.e = Math.random()*0.1 + 0.1;
    this.color = colors[Math.floor(Math.random() * colors.length)];

    this.draw = function() {

        c.beginPath();
        c.strokeStyle = 'rgba(255,0,50,0)';
        c.arc(this.x, this.y, this.radius, Math.PI * 0.5, Math.PI * 2.5, false);
        c.stroke();
        c.fillStyle = this.color;
        c.fill();

    };

    this.move = function () {

        if (this.x + this.radius > innerWidth || this.x - this.radius <0 ) {
            this.dx = -this.dx;
        }

        if (this.y + this.radius > innerHeight || this.y - this.radius < 0) {
            this.dy = -this.dy;
        }

        this.y += this.dy;
        this.x += this.dx;

        //active
        if (this.x - mouse.x > -150 && this.x - mouse.x < 150
            && this.y - mouse.y > -150 && this.y - mouse.y < 150
            && this.radius > minR) {
            this.radius -= minR;

        } else if (this.radius < this.maxR) {
            this.radius += 1;

        }

        this.draw();
    }
}

var circles = [];

for (var i = 0; i < 700; i++) {

    var radius = Math.random() * 40 + minR;
    var x = Math.random() * (innerWidth - 2*radius) + radius;
    var y = Math.random() * (innerHeight - 2*radius) + radius ;
    var dx = (Math.random()-0.5) * 5;
    var dy = (Math.random()-0.5) * 5;

    circles.push(new Circle(x,y,dx,dy,radius));

}
var loop;

function animate() {
    loop = requestAnimationFrame(animate);

    c.clearRect(0, 0, innerWidth, innerHeight);

    circles.forEach(function (circle) {
        circle.move();
    });
}

animate();

//================================== Second Canvas ==========================================

var canvas2 = document.querySelector('#canvas2');
var c2 = canvas2.getContext('2d');

canvas2.width = window.innerWidth;
canvas2.height = window.innerHeight;


var mouse2 = {
    x: innerWidth / 2,
    y: innerHeight / 2
};

var colors2 = ['#2185C5', '#7ECEFD', '#FFF6E5', '#FF7F66'];


window.addEventListener('mousemove', function (event) {
    mouse2.x = event.clientX;
    mouse2.y = event.clientY;
});

addEventListener('resize', function ()  {
    canvas2.width = innerWidth;
    canvas2.height = innerHeight;

    init();
});


function randomIntFromRange(min, max) {
    return Math.floor(Math.random() * (max - min + 1) + min)
}

function randomColor(colors) {
    return colors[Math.floor(Math.random() * colors.length)]
}


function Particle(x, y, radius, color) {
    this.x = x;
    this.y = y;
    this.radius = radius;
    this.color = color;
    this.radians = Math.random() * Math.PI * 2;
    this.velocity = 0.04;
    this.rX = randomIntFromRange(30, 100);
    this.rY = randomIntFromRange(30, 100);
    this.lastMouse = { x: x, y: y };


    this.update = function () {
        this.radians += this.velocity;
        this.lastMouse.x += (mouse2.x - this.lastMouse.x) * 0.05;
        this.lastMouse.y += (mouse2.y - this.lastMouse.y) * 0.05;
        this.x = this.lastMouse.x + Math.cos(this.radians) * this.rX;
        this.y = this.lastMouse.y + Math.sin(this.radians) * this.rX;

        // console.log(Math.cos(this.radians));
        this.draw();
    };

    this.draw = function () {
        c2.beginPath();
        c2.arc(this.x, this.y, this.radius, 0, Math.PI * 2, false);
        c2.fillStyle = this.color;
        c2.fill();
        c2.closePath();
    }
}



// Implementation
var particles;
function init() {
    particles = [];

    for (var i = 0; i < 50; i++) {
        const radius = Math.random() * 3 + 1;
        particles.push(new Particle(canvas2.width / 2, canvas2.height / 2, radius, randomColor(colors)));
        // console.log(particles[i]);
    }
    // console.log(particles);
}

function animate2() {
    requestAnimationFrame(animate2);
    c2.fillStyle = 'rgba(205,92,92,0.3)';
    c2.fillRect(0, 0, canvas2.width, canvas2.height);

    particles.forEach(function(particle) {
        particle.update();
    });

}

// init();
// animate2();




/*=================== Transition ======================*/
var btn = document.getElementsByClassName("btn1")[0];

var firstCanvas = document.getElementById("canvas1");

btn.addEventListener('click', function () {

    firstCanvas.style.transform = "translateX(100%)";
    var h1Overlay = document.querySelector('.h1-overlay');
    h1Overlay.style.transform = "translate(1%,-100%)";
    this.style.transform = "scale(0)";

    setTimeout(function () {
        cancelAnimationFrame(loop);
        var h1Overlay2 = document.querySelector('.h1-overlay2');
        h1Overlay2.style.transform = "translate(0%,-98%)";
    },1500);

    setTimeout(function () {
        var h1Overlay3 = document.querySelector('.h1-overlay3');
        h1Overlay3.style.transform = "translate(0,-98%)";
        // h1Overlay3.style.background = "transparent";
    },3000);

    setTimeout(function () {
        var h1 = document.querySelector('h1');
        h1.style.transform = "translate(-50%,-70vh)";

        var secondCanvas = document.querySelector('#canvas2');
        init();
        // console.log(c2);
        secondCanvas.style.transform = "translate(0)";

        setTimeout(function () {
            animate2();
            var container = document.querySelector(".container");
            container.style.opacity = "1";

            setTimeout(function () {
                var btn = document.querySelector(".container .btn");
                btn.style.transform = "translate(0,0)";

                btn.addEventListener("click", function () {
                    var transition = document.querySelector(".container .content .transition");
                    var p1 = document.querySelector(".container .content .p1");
                    var p2 = document.querySelector(".container .content .p2");
                    transition.style.transform = "translateX(0)";

                    setTimeout(function () {
                        p1.style.transform = "translateX(-100%)";
                        transition.style.transform = "translateX(-100%)";
                        p2.style.transform = "translateX(0)";
                    },1000);

                    this.addEventListener("click", function () {
                        var transition2 = document.querySelector(".container .title span");
                        transition2.classList.add("transition");

                        setTimeout(function () {
                            transition.style.transform = "translateX(100%)";
                            p2.style.transform = "translateX(100%)";
                            transition2.classList.add("translate");
                            console.log(btn);
                            btn.style.transform = "translate(110%,0)";

                            var lastPage = document.querySelector(".last-page");
                            lastPage.style.zIndex = "1";
                            setTimeout(function () {
                                lastPage.style.opacity = "1";
                            },1500);
                        }, 1000);

                    });
                });
            },2000);
        },1000);
    },4500);
});

















