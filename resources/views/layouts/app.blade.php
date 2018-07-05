<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Dama</title>
    <!-- Styles -->
    <link rel="Shortcut Icon" type="image/png" href="{{ asset('post/bblogo.png')}}"/>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style media="screen">
    canvas {
      display: block;
      vertical-align: bottom;
    }

    /* Particle container. */
    #particle-container {
        position: absolute;
        width: 100%;
        height: 100%;
    }

.count-particles{
  background: #000022;
  position: absolute;
  top: 48px;
  left: 0;
  width: 80px;
  color: #13E8E9;
  font-size: .8em;
  text-align: left;
  text-indent: 4px;
  line-height: 14px;
  padding-bottom: 2px;
  font-family: Helvetica, Arial, sans-serif;
  font-weight: bold;
}

.js-count-particles{
  font-size: 1.1em;
}

#stats,
.count-particles{
  -webkit-user-select: none;
  margin-top: 5px;
  margin-left: 5px;
}

#stats{
  border-radius: 3px 3px 0 0;
  overflow: hidden;
}

.count-particles{
  border-radius: 0 0 3px 3px;
}


/* ---- particles.js container ---- */

#particles-js{
  width: 100%;
  height: 100%;
  background-color:orange;
  position: absolute;
  z-index: -1;
  background-image: url('');
  background-size: cover;
  background-position: 50% 50%;
  background-repeat: no-repeat;
}
    </style>
</head>
<body>
  <div id="particles-js"></div>
  
    <div id="app">
      <!-- <div id="particle-container"></div> -->

        <!-- <div class="count-particles">
          <span class="js-count-particles">--</span>
        </div> -->

        <!-- particles.js container -->


        @yield('content')

    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    <script src="{{ asset('js/particles.js') }}"></script>
    <script src="{{ asset('js/par.js') }}"></script>
    <script src="{{ asset('js/stats.js') }}"></script>


    </script>
    <!-- <script>
  var count_particles, stats, update;
  stats = new Stats;
  stats.setMode(0);
  stats.domElement.style.position = 'absolute';
  stats.domElement.style.left = '0px';
  stats.domElement.style.top = '0px';
  document.body.appendChild(stats.domElement);
  count_particles = document.querySelector('.js-count-particles');
  update = function() {
    stats.begin();
    stats.end();
    if (window.pJSDom[0].pJS.particles && window.pJSDom[0].pJS.particles.array) {
      count_particles.innerText = window.pJSDom[0].pJS.particles.array.length;
    }
    requestAnimationFrame(update);
  };
  requestAnimationFrame(update);
</script> -->


</body>
</html>
