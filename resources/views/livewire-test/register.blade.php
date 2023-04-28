<html>
    <head>
        <!--Styles-->
        
        @livewireStyles

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
    </head>
    <body>
        Registerテスト<span class="text-red-500">register</span>
        @livewire('register')
        @livewireScripts
    </body>
</html>