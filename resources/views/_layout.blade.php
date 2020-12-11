<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <title>Blog</title>
    </head>
    <body class="bg-light">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3 bg-dark">
                    <ul>
                        <li class="my-3"><a href="/">Home</a></li>
                        <li class="my-3"><a href="/posts">Posts</a></li>
                    </ul>
                </div>
                <div class="col-md">
                    @yield('content')
                </div>
            </div>
        </div>
    </body>
</html>
