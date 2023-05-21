<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" SameSite=None class="dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>{{ isset($title) ? $title : 'REMIS' }}</title>
    <meta name="description" content="Southern Philippines and Marine and Aquatic School of Technology REMIS" />
    <meta name="description" content="SPAMAST REMIS" />
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
    @livewireStyles
    @vite(['resources/css/app.css','resources/js/app.js'])
    @stack('topComponents')
</head>
<body class="bg-gray-50 dark:bg-gray-800">

    @livewire('components.flash-offline')

    @livewire('components.navbar')

    <div class="flex pt-16 overflow-hidden bg-gray-50 dark:bg-gray-900">

        @livewire('components.sidebar')

        <div class="fixed inset-0 z-10 hidden bg-gray-900/50 dark:bg-gray-900/90" id="sidebarBackdrop"></div>

        <div id="main-content" class="relative w-full h-full overflow-y-auto bg-gray-50 lg:ml-64 dark:bg-gray-900">
            <main>
                <div class="grid grid-cols-1 px-4 pt-6 xl:grid-cols-3 xl:gap-4 dark:bg-gray-900">

                    @livewire('components.breadcrumb')

                    @yield('contents')
                </div>
            </main>

            {{-- @livewire('components.footer-link') --}}

            @livewire('components.footer-status')

        </div>

    </div>

    @livewireScripts
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
    @stack('bodyComponents')
</body>
</html>
