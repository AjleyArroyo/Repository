<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <title>Registrar</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- CSS -->
    <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=PT+Sans:400,700'>
    <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Oleo+Script:400,700'>
    {!!Html::style('css/bootstrap.min.css')!!}
    {!!Html::style('css/style.css')!!}

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

</head>

<body>
<!-- Javascript -->

<div class="register-container container">
    <div class="row">
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="col-sm-4">
            <img src="../img/v2/iphone-bg-lg.min.png" alt="" style="width: 70%;height: 70%">
        </div>
        <div class="col-sm-8 register">

            @yield('content')
        </div>
    </div>
</div>
{!!Html::script('js/jquery-1.10.2.js')!!}
{!!Html::script('js/bootstrap.min.js')!!}
{!!Html::script('js/jquery-1.8.2.min.js')!!}
{!!Html::script('js/jquery.backstretch.min.js')!!}


</body>
</html>
