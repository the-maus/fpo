<html lang="en"><head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Ficha de Programação Orçamentária</title>

    <!-- Bootstrap core CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <style>
        .material-icons {
            vertical-align: middle;
        }
    </style>
</head>

<body>

<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <a class="navbar-brand" href="#">FPO</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="{{route('procedimentos.index')}}">Home</a>
            </li>

        </ul>
    </div>
    <div class="navbar-collapse collapse" id="navbarTeste">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle"  id="dropdownCreate" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false"><i class="material-icons">add_box</i>&nbsp;Cadastrar</a>
                <div class="dropdown-menu" aria-labelledby="dropdownCreate">
                    <a class="dropdown-item" href="{{route('procedimentos.create')}}"><i class="material-icons">note_add</i>&nbsp;Procedimento</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle"  id="dropdownList" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false"><i class="material-icons">list</i>&nbsp;Listar</a>
                <div class="dropdown-menu" aria-labelledby="dropdownList">
                    <a class="dropdown-item" href="{{route('procedimentos.index')}}"><i class="material-icons">note_add</i>&nbsp;Procedimento</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle"  id="dropdownAuth" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false"><i class="material-icons">account_circle</i>&nbsp;</a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownAuth">
                    @guest
                        <a class="dropdown-item" href="{{ route('register') }}"><i class="material-icons">person_add</i>&nbsp;Cadastrar</a>
                        <a class="dropdown-item" href="{{ route('login') }}"><i class="material-icons">input</i>&nbsp;Login</a>
                    @else
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                            Logout
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    @endguest
                </div>
            </li>
        </ul>
    </div>
</nav>

<main role="main">

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
        <div class="container">
            <h1 class="display-3">@yield('header')</h1>
            <p>Ficha de Programação Orçamentária</p>
        </div>
    </div>

    <div class="container">
        <!-- Example row of columns -->
        <div class="row">
            <div class="container">
                @yield('conteudo')
            </div>
        </div>

        <hr>

    </div> <!-- /container -->

</main>

<footer class="container">
    <p>© IFBA 2019</p>
</footer>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body></html>
