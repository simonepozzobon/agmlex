<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AgmLex - Admin login</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="/css/app.css">
</head>

<body>
    <div id="login" class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6 p-5 bg-light">
                <h1>Login</h1>
                <form method="POST" action="/authenticate" class="mt-4">
                    @csrf
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" placeholder="Inserisci la mail..." class="form-control"
                            value="{{ old('email') }}" required autofocus>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" placeholder="***" class="form-control" required>
                    </div>

                    <div class="form-group mt-4">
                        <button class="btn btn-primary" type="submit">Accedi</button>
                    </div>
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                        <span>{{ $error }}</span>
                        @endforeach
                    </div>
                    @endif
                </form>
            </div>
        </div>
    </div>
</body>

</html>