<!DOCTYPE html>
<html>
    <head>
        <title>HTTP Error {{$exception->getStatusCode()}}</title>
    </head>
    <body>
        <h2>{{$exception->getStatusCode()}} | {{ $exception->getMessage() }}</h2>
    </body>
</html>