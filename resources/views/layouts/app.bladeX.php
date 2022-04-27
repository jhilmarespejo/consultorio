<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased bg-light">
        <x-jet-banner />
        @livewire('navigation-menu')

        <!-- Page Heading -->
       {{--  <header class="d-flex py-3 bg-white shadow-sm border-bottom">
            <div class="container">
                {{ $header }}
            </div>
        </header> --}}

        <!-- Page Content -->
        <main class="container my-2 shadow">
            
            <div class="row p-3">
                <nav class="navbar navbar-expand-md col-lg-3 col-sm-12">
                    <button class="navbar-toggler bg-danger" type="button" data-bs-toggle="collapse" data-bs-target="#navbarOptions" aria-controls="navbarOptions" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                         <span class="navbar-toggler-icon"></span>
                    </button>
                    <ul class="collapse navbar-collapse p-0" id="navbarOptions" >
                        <div class="card text-white bg-secondary mb-3" style="max-width: 18rem;">
                          <div class="card-header">MENÚ</div>
                          <div class="card-body">
                            <h5 class="card-title">Success card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                          </div>
                        </div>
                    </ul>
                </nav>    
                <div class="col-9 p-4 bg-light border">
                    {{ $slot }}

                    
                </div>
            </div>
        </main>

        @stack('modals')

        @livewireScripts

        @stack('scripts')
    </body>
</html>
