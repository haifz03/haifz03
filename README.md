<html><head>
    <meta charset="utf-8">
    <title>Is Youu 💗</title>

    <style>
      html,
      body {
        height: 100%;
        padding: 0;
        margin: 0;
        background: #000;
      }
      canvas {
        position: absolute;
        width: 100%;
        height: 100%;
        animation: anim 1.5s ease-in-out infinite;
        -webkit-animation: anim 1.5s ease-in-out infinite;
        -o-animation: anim 1.5s ease-in-out infinite;
        -moz-animation: anim 1.5s ease-in-out infinite;
      }
      #name {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        margin-top: -20px;
        font-size: 46px;
        color: #ea80b0;
      }
      .mark {
        width: 100%;
        position: absolute;
        top: 70%;
        text-align: center;
        color: rgba(234, 128, 176, 0.5);
        font-size: 3vw;
      }
      @keyframes anim {
        0% {
          transform: scale(0.8);
        }
        25% {
          transform: scale(0.7);
        }
        50% {
          transform: scale(1);
        }
        75% {
          transform: scale(0.7);
        }
        100% {
          transform: scale(0.8);
        }
      }
      @-webkit-keyframes anim {
        0% {
          -webkit-transform: scale(0.8);
        }
        25% {
          -webkit-transform: scale(0.7);
        }
        50% {
          -webkit-transform: scale(1);
        }
        75% {
          -webkit-transform: scale(0.7);
        }
        100% {
          -webkit-transform: scale(0.8);
        }
      }
      @-o-keyframes anim {
        0% {
          -o-transform: scale(0.8);
        }
        25% {
          -o-transform: scale(0.7);
        }
        50% {
          -o-transform: scale(1);
        }
        75% {
          -o-transform: scale(0.7);
        }
        100% {
          -o-transform: scale(0.8);
        }
      }
      @-moz-keyframes anim {
        0% {
          -moz-transform: scale(0.8);
        }
        25% {
          -moz-transform: scale(0.7);
        }
        50% {
          -moz-transform: scale(1);
        }
        75% {
          -moz-transform: scale(0.7);
        }
        100% {
          -moz-transform: scale(0.8);
        }
      }
    </style>
  <style type="text/css">#_copy{align-items:center;background:#4494d5;border-radius:3px;color:#fff;cursor:pointer;display:flex;font-size:13px;height:30px;justify-content:center;position:absolute;width:60px;z-index:1000}#select-tooltip,#sfModal,.modal-backdrop,div[id^=reader-helper]{display:none!important}.modal-open{overflow:auto!important}._sf_adjust_body{padding-right:0!important}.super_copy_btns_div{position:fixed;width:154px;left:10px;top:45%;background:#e7f1ff;border:2px solid #4595d5;font-weight:600;border-radius:2px;font-family:-apple-system,BlinkMacSystemFont,Segoe UI,PingFang SC,Hiragino Sans GB,Microsoft YaHei,Helvetica Neue,Helvetica,Arial,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol;z-index:5000}.super_copy_btns_logo{width:100%;background:#4595d5;text-align:center;font-size:12px;color:#e7f1ff;line-height:30px;height:30px}.super_copy_btns_btn{display:block;width:128px;height:28px;background:#7f5711;border-radius:4px;color:#fff;font-size:12px;border:0;outline:0;margin:8px auto;font-weight:700;cursor:pointer;opacity:.9}.super_copy_btns_btn:hover{opacity:.8}.super_copy_btns_btn:active{opacity:1}</style></head>
  <body>
    <canvas id="pinkboard" width="1017" height="953"></canvas>
    
    
    <div class="mark"><br><br></div>
    <script>
      let audio = document.createElement("audio");
      audio.src = "http://music.163.com/song/media/outer/url?id=28828078.mp3";
      audio.loop = true;
      audio.volume = 0.6;
      window.onclick = function() {
        audio.play();
      }
    </script>

    <script>
      /*
       * Settings
       */
      var settings = {
        particles: {
          length: 500, 
          duration: 2, 
          velocity: 100, 
          effect: -0.75,
          size: 30, 
        },
      };

      (function () {
        var b = 0;
        var c = ["ms", "moz", "webkit", "o"];
        for (var a = 0; a < c.length && !window.requestAnimationFrame; ++a) {
          window.requestAnimationFrame = window[c[a] + "RequestAnimationFrame"];
          window.cancelAnimationFrame =
            window[c[a] + "CancelAnimationFrame"] ||
            window[c[a] + "CancelRequestAnimationFrame"];
        }
        if (!window.requestAnimationFrame) {
          window.requestAnimationFrame = function (h, e) {
            var d = new Date().getTime();
            var f = Math.max(0, 16 - (d - b));
            var g = window.setTimeout(function () {
              h(d + f);
            }, f);
            b = d + f;
            return g;
          };
        }
        if (!window.cancelAnimationFrame) {
          window.cancelAnimationFrame = function (d) {
            clearTimeout(d);
          };
        }
      })();

      var Point = (function () {
        function Point(x, y) {
          this.x = typeof x !== "undefined" ? x : 0;
          this.y = typeof y !== "undefined" ? y : 0;
        }
        Point.prototype.clone = function () {
          return new Point(this.x, this.y);
        };
        Point.prototype.length = function (length) {
          if (typeof length == "undefined")
            return Math.sqrt(this.x * this.x + this.y * this.y);
          this.normalize();
          this.x *= length;
          this.y *= length;
          return this;
        };
        Point.prototype.normalize = function () {
          var length = this.length();
          this.x /= length;
          this.y /= length;
          return this;
        };
        return Point;
      })();

      var Particle = (function () {
        function Particle() {
          this.position = new Point();
          this.velocity = new Point();
          this.acceleration = new Point();
          this.age = 0;
        }
        Particle.prototype.initialize = function (x, y, dx, dy) {
          this.position.x = x;
          this.position.y = y;
          this.velocity.x = dx;
          this.velocity.y = dy;
          this.acceleration.x = dx * settings.particles.effect;
          this.acceleration.y = dy * settings.particles.effect;
          this.age = 0;
        };
        Particle.prototype.update = function (deltaTime) {
          this.position.x += this.velocity.x * deltaTime;
          this.position.y += this.velocity.y * deltaTime;
          this.velocity.x += this.acceleration.x * deltaTime;
          this.velocity.y += this.acceleration.y * deltaTime;
          this.age += deltaTime;
        };
        Particle.prototype.draw = function (context, image) {
          function ease(t) {
            return --t * t * t + 1;
          }
          var size = image.width * ease(this.age / settings.particles.duration);
          context.globalAlpha = 1 - this.age / settings.particles.duration;
          context.drawImage(
            image,
            this.position.x - size / 2,
            this.position.y - size / 2,
            size,
            size
          );
        };
        return Particle;
      })();

      var ParticlePool = (function () {
        var particles,
          firstActive = 0,
          firstFree = 0,
          duration = settings.particles.duration;

        function ParticlePool(length) {

          particles = new Array(length);
          for (var i = 0; i < particles.length; i++)
            particles[i] = new Particle();
        }
        ParticlePool.prototype.add = function (x, y, dx, dy) {
          particles[firstFree].initialize(x, y, dx, dy);

          firstFree++;
          if (firstFree == particles.length) firstFree = 0;
          if (firstActive == firstFree) firstActive++;
          if (firstActive == particles.length) firstActive = 0;
        };
        ParticlePool.prototype.update = function (deltaTime) {
          var i;

          if (firstActive < firstFree) {
            for (i = firstActive; i < firstFree; i++)
              particles[i].update(deltaTime);
          }
          if (firstFree < firstActive) {
            for (i = firstActive; i < particles.length; i++)
              particles[i].update(deltaTime);
            for (i = 0; i < firstFree; i++) particles[i].update(deltaTime);
          }

          while (
            particles[firstActive].age >= duration &&
            firstActive != firstFree
          ) {
            firstActive++;
            if (firstActive == particles.length) firstActive = 0;
          }
        };
        ParticlePool.prototype.draw = function (context, image) {

          if (firstActive < firstFree) {
            for (i = firstActive; i < firstFree; i++)
              particles[i].draw(context, image);
          }
          if (firstFree < firstActive) {
            for (i = firstActive; i < particles.length; i++)
              particles[i].draw(context, image);
            for (i = 0; i < firstFree; i++) particles[i].draw(context, image);
          }
        };
        return ParticlePool;
      })();

      (function (canvas) {
        var context = canvas.getContext("2d"),
          particles = new ParticlePool(settings.particles.length),
          particleRate =
            settings.particles.length / settings.particles.duration, 
          time;

        function pointOnHeart(t) {
          return new Point(
            160 * Math.pow(Math.sin(t), 3),
            130 * Math.cos(t) -
              50 * Math.cos(2 * t) -
              20 * Math.cos(3 * t) -
              10 * Math.cos(4 * t) +
              25
          );
        }

        var image = (function () {
          var canvas = document.createElement("canvas"),
            context = canvas.getContext("2d");
          canvas.width = settings.particles.size;
          canvas.height = settings.particles.size;

          function to(t) {
            var point = pointOnHeart(t);
            point.x =
              settings.particles.size / 2 +
              (point.x * settings.particles.size) / 350;
            point.y =
              settings.particles.size / 2 -
              (point.y * settings.particles.size) / 350;
            return point;
          }

          context.beginPath();
          var t = -Math.PI;
          var point = to(t);
          context.moveTo(point.x, point.y);
          while (t < Math.PI) {
            t += 0.01;
            context.lineTo(point.x, point.y);
          }
          context.closePath();

          context.fillStyle = "#ea80b0";
          context.fill();

          var image = new Image();
          image.src = canvas.toDataURL();
          return image;
        })();


        function render() {

          requestAnimationFrame(render);


          var newTime = new Date().getTime() / 1000,
            deltaTime = newTime - (time || newTime);
          time = newTime;

          context.clearRect(0, 0, canvas.width, canvas.height);

          var amount = particleRate * deltaTime;
          for (var i = 0; i < amount; i++) {
            var pos = pointOnHeart(Math.PI - 2 * Math.PI * Math.random());
            var dir = pos.clone().length(settings.particles.velocity);
            particles.add(
              canvas.width / 2 + pos.x,
              canvas.height / 2 - pos.y,
              dir.x,
              -dir.y
            );
          }

          particles.update(deltaTime);
          particles.draw(context, image);
        }


        function onResize() {
          canvas.width = canvas.clientWidth;
          canvas.height = canvas.clientHeight;
        }
        window.onresize = onResize;


        setTimeout(function () {
          onResize();
          render();
        }, 10);
      })(document.getElementById("pinkboard"));

    </script>
  
</body></html>
