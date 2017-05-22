<!doctype html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Gestione Lista Invitati - {{config('app.name')}}</title>

    <!-- General Library -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
          crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"
          integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp"
          crossorigin="anonymous">

    <script src="/js/vendor/modernizr-custom.js"></script>

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script>
        window.csrfToken = '{{ csrf_token() }}';
    </script>

    @stack('headScripts')

</head>
<body>

    @yield('mainContent')

    <!-- Behavioral and Application Logic -->
    <!-- jQuery -->
    <script src="//code.jquery.com/jquery-1.12.4.min.js"></script>
    <script>
    window.jQuery || document.write('<script src="/js/vendor/jquery-1.12.4.min.js"><\/script>')
    </script>

    <!-- Bootstrap JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
            integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
            crossorigin="anonymous"></script>

    @stack('footerScripts')

    <!-- main.js -->
    <script src="/js/main.js"></script>




</body>
</html>