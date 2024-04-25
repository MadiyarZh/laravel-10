<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title-block')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container py-3">
        @include('inc.header')

        @include('inc.messages')
        
        <main>
            <div class="row mt-5">
                <div class="col-9">
                    @yield('content')
                </div>
                <div class="col-3">
                    @include('inc.aside')
                </div>
            </div>
        </main>

        @include('inc.footer')
    </div>
</body>
</html>