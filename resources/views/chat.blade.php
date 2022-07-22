<!DOCTYPE html>
<html>

<head>

  <meta charset="utf-8">

  <title>CHAT</title>

  <meta name="author" content="">
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <script src="{{ asset('node_modules/laravel-echo/dist/echo.iife.js') }}"></script>
  <script src="{{ asset('node_modules/pusher-js/dist/web/pusher.js') }}"></script>

  @php
    
    $broadcaster = 'pusher';
    $key = env('MIX_PUSHER_APP_KEY');
    $cluster = env('MIX_PUSHER_APP_CLUSTER');
    $wsHost = 'window.location.hostname';
    $wsPort = 6001;
    $wssPort = 6001;
    $forceTLS = 'false';
    $disableStats = 'false';

    echo "
    <script>
        
        window.Pusher = Pusher;

        window.Echo = new Echo({
            broadcaster: '${broadcaster}',
            key: '${key}',
            cluster: '${cluster}',
            wsHost: ${wsHost},
            wsPort: ${wsPort},
            wssPort: ${wssPort},
            forceTLS: ${forceTLS},
            disableStats: ${disableStats},
            enabledTransports: ['ws', 'wss']
        });

    </script>";

  @endphp

</head>

<body>

  <p>Hello, world!</p>

  <ul id="messages"></ul>

  <input id="input" type="text" name="input" value="hello" />

  <button type="button" id="send">Enviar</button>

  <script src="{{ asset('main.js') }}"></script>

</body>

</html>