<!DOCTYPE html>
<html>
    <head>
        <title>Document</title>
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" type="text/css" />
        <link rel="stylesheet" href="/css/app.css" type="text/css" />
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css" rel="stylesheet" />
    </head>
    
    <body>
        @include('partials.nav')
    
        <div class="container">
            @include('flash::message')
            
            @yield('content')
        </div>
        
        <script src="//code.jquery.com/jquery.js"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
        
        <script>
            $('#flash-overlay-modal').modal();
            // $('div.alert').not('.alert-important').delay(3000).slideUp(300);
        </script>
        
        <script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>
        @yield('footer')
    </body>
</html>