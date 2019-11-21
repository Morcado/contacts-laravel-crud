@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Add new contact</h1>
    <form action="/contacts" method="post">
        @csrf {{-- crea un token para que solo se pueda llamar al post desde solo la aplicacion --}}
        <div class="form-group">
            <label for="first_name">First name</label>
            <input type="text" class="form-control" name="first_name" id="first_name" placeholder="Nombre">
            <small></small>
        </div>
        <div class="form-group">
            <label for="last_name">Last name</label>
            <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Nombre">
            <small></small>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" id="email" placeholder="Nombre">
            <small></small>
        </div>
        <button type="submit" class="btn btn-success">Submit</button>
        <a href="/contacts" class="btn btn-danger">Cancel</a>

    </form>
</div>
@endsection