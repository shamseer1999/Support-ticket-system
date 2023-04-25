<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Support Tickets</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

</head>
<body>
    <div class="container">
        <nav class="navbar navbar-light bg-light">
            <a class="navbar-brand" href="#">
            <img src="/docs/4.0/assets/brand/bootstrap-solid.svg" width="30" height="30" alt="">Support System
            </a>
        </nav>
        <div class="row">
            <div class="col-md-3">
                <ul>
                    <li>Dashbord</li>
                    <li>Roles</li>
                    <ul>
                        <li><a href="{{route('roles')}}" class="text-decoration-none"> Roles List </a></li>
                        <li><a href="{{route('role.add')}}" class="text-decoration-none"> Add Role </a></li>
                    </ul>
                    <li>Users</li>
                    <ul>
                        <li><a href="{{route('users')}}" class="text-decoration-none"> Users List</a></li>
                        <li><a href="{{route('user.add')}}" class="text-decoration-none">Add User</a></li>
                    </ul>
                </ul>
            </div>
            <div class="col-md-9">
                @if (session()->has('success'))
                <div class="alert alert-success mt-1">
                    <div class="card-body">
                        {{ session('success')}}
                    </div>
                </div>
                    
                @endif
                @yield('content')
            </div>
        </div>
    </div>
</body>
</html>