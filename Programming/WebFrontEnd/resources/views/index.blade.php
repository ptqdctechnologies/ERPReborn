<!DOCTYPE html>
<html>

<head>
    <title>Cara Membuat PDF Menggunakan DomPDF di Laravel 10 - Leravio</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-12" style="margin-top: 15px ">
                <div class="pull-left">
                    <h2>{{$title}}</h2>
                    <h4>{{$date}}</h4>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{route('users.index',['download'=>'pdf'])}}">Download PDF</a>
                </div>
            </div>
        </div><br>
        <table class="table table-bordered">
            <tr>
                <th>Name</th>
                <th>Email</th>
            </tr>
            @foreach ($users as $user)
            <tr>
                <td>{{ $user['Sys_ID'] }}</td>
                <td>{{ $user['Name'] }}</td>
            </tr>
            @endforeach
        </table>
    </div>
</body>

</html>