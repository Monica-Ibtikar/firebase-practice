@extends('layouts.master')


@section('content')
    <form method="post" action="/users">
        {{csrf_field()}}
        <div class="form-row">
            <div class="col">
                <label for="formGroupExampleInput2">الاسم بالعربي</label>
                <input name="name[name_ar]" type="text" class="form-control" placeholder="الاسم بالعربي">
            </div>
            <div class="col">
                <label for="formGroupExampleInput2">Name in English</label>
                <input name="name[name_en]" type="text" class="form-control" placeholder="Name in english">
            </div>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput2">Phone Number</label>
            <input name="phone" type="text" class="form-control" id="formGroupExampleInput2" placeholder="Phone">
        </div>
        <input type="submit" class="btn btn-primary" value="Create"/>
    </form>
@endsection