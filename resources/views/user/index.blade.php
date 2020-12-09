@extends('layouts.master')


@section('content')

    <div class="col-md-12 text-center">
        <button type="button" class="btn btn-primary" onclick="location.href='{{route('users.create')}}'">Create User</button>
    </div>
    <br/>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Phone</th>
            <th scope="col">Email</th>
            <th scope="col">Name in arabic</th>
            <th scope="col">Name in english</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($users as $user)
            <tr>
                <td>{{ $user['phone'] }}</td>
                <td>{{ $user['email'] }}</td>
                <td>{{ $user['name']['name_ar']}}</td>
                <td>{{ $user['name']['name_en']}}</td>
                <td> <button type="button" class="btn btn-success" onclick="location.href='{{route('users.show',['user' => $user['id']])}}'">View</button>
                    <button type="button" class="btn btn-primary" onclick="location.href='{{route('users.edit',['user' => $user['id']])}}'">Edit</button>
                    <button type="button" class="btn btn-danger delete"  targ="{{$user['id']}}" >Delete</button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script>
        $(".delete").on('click',function(){
            var my = this;
            var con = confirm("Are you sure");
            if(con){
                $.ajax(
                    {
                        url: "users/"+$(my).attr("targ") ,
                        type: 'DELETE',
                        data : {'_token' : '{{csrf_token()}}'},
                        success : function (res) {
                            console.log(res);
                            location.reload();
                        },
                        error : function(err){
                            console.log(err)
                        }
                    }
                );
            }
        });
    </script>

@endsection