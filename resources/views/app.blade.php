<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="icon" href="img/favicon_64.png" type="image/png" sizes="16x16">

        <title inertia>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap"> -->

        <!-- Styles -->
        <!-- <link rel="stylesheet" href="{{ mix('css/app.css') }}"> -->

        <!-- Font Awesome Icons -->
          <link rel="stylesheet" href="http://127.0.0.1:8000/assets/admin-lte-v3.2.0/plugins/fontawesome-free/css/all.min.css">
          <!-- Theme style -->
          <link rel="stylesheet" href="http://127.0.0.1:8000/assets/admin-lte-v3.2.0/dist/css/adminlte.min.css">


            <link rel="stylesheet" href="http://127.0.0.1:8000/assets/admin-lte-v3.2.0/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">

        <!-- Scripts -->
        @routes
            <script src="http://127.0.0.1:8000/js/app.js" defer></script>
        @inertiaHead
    </head>
    <body id="body" class="hold-transition ">
        
        @inertia

        @env ('local')

        @endenv

        <!-- jQuery -->
        <script src="http://127.0.0.1:8000/assets/admin-lte-v3.2.0/plugins/jquery/jquery.min.js"></script>
        <!-- Bootstrap 4 -->
        <script src="http://127.0.0.1:8000/assets/admin-lte-v3.2.0/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- AdminLTE App -->
        <script src="http://127.0.0.1:8000/assets/admin-lte-v3.2.0/dist/js/adminlte.min.js"></script>


    
        <script src="http://127.0.0.1:8000/assets/admin-lte-v3.2.0/plugins/jquery-validation/jquery.validate.min.js"></script>
        <script src="http://127.0.0.1:8000/assets/admin-lte-v3.2.0/plugins/jquery-validation/additional-methods.min.js"></script>

        <script src="http://127.0.0.1:8000/assets/admin-lte-v3.2.0/plugins/sweetalert2/sweetalert2.min.js"></script>
        
    </body>
</html>
