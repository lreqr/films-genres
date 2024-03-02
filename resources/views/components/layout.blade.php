<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body style="background: indianred">
    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link {{collect(['draft', 'archived', 'create'])
                                                ->contains(function ($value){
                                                    return str_contains(url()->full(), $value);
                                                }) ? '' : 'active'}}" aria-current="page" href="{{route('film.index')}}">Films</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{str_contains(url()->full(),'draft') ? 'active' : ''}}" href="{{route('film.index') . '?status=draft'}}">Draft</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{str_contains(url()->full(),'archived') ? 'active' : ''}}" href="{{route('film.index') . '?status=archived'}}">Archived</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{str_contains(url()->full(),'create') ? 'active' : ''}}" href="{{route('film.create')}}">Create new film</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <main class="main p-4">
        {{$slot}}
    </main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
