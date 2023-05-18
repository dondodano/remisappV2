<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"/>
    <title>{{ isset($title) ? $title : 'REMIS' }}</title>
    <meta name="description" content="Southern Philippines and Marine and Aquatic School of Technology REMIS" />
    <meta name="description" content="SPAMAST REMIS" />
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    @vite('resources/css/app.css')
    @livewireStyles
    @stack('topComponents')
</head>
<body>

    @livewire('components.flash-offline')

    @yield('contents')

    <script src="https://js.pusher.com/7.2/pusher.min.js"></script>
    <script>
        var pusher = new Pusher('b9a98d5d52ec6269f87b', {
            cluster: 'ap1'
        });
        var channel = pusher.subscribe('notification-channel');
        channel.bind('notification-event', function(data) {
            if(data)
            {
                if(data.message == 'NewNotification')
                {
                    Livewire.emit('NewNotification')
                }

                if(data.message == 'UserOnlineStatus')
                {
                    Livewire.emit('UserOnlineStatus')
                }
            }
        });

        window.addEventListener('reloadComponent', event => {
            location.reload();
        })
    </script>
    @livewireScripts
    @stack('bodyComponents')
</body>
</html>
