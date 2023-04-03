<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Login</title>

        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
        
    </head>
    <body>
        <div class="header my-5"></div> 
        <div class="container">
           <h1>Dashboard</h1>
           <h2>new users</h2>
           <table border="1">
        <tr>
            <th>id</th>
            <th>name</th>
            <th>Email</th>
            <th>Password</th>
            <th>Createt at</th>
            <th>Upadted at</th>
            <!-- <th>Update</th>
            <th>Delete</th> -->
        </tr> 
        @foreach($data as $user)
        <tr>
            <td>{{$user->id}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->password}}</td>
            <td>{{$user->created_at}}</td>
            <td>{{$user->updated_at}}</td>
            <!-- <td class="pop-up-btn"><a href="edit-user/{{$user->id}}">edit</a></td>
            <td><a href="delete-user/{{$user->id}}">delete</a></td> -->
        </tr>
        @endforeach
    </table>
        </div>
    </body>
</html>
