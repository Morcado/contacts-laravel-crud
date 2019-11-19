@extends('layouts.base')

@section('main')
    <h1>Add new contact</h1>
    <form action="/contacts/{{ $contact->id }}" method="post">{{-- se deja post porque no se puede usar put/patch --}}
        @csrf {{-- crea un token para que solo se pueda llamar al post desde solo la aplicacion --}}
        @method('patch') {{-- Se establece aqui el metodo patch que actualiza --}}
        <div class="form-group">
            <label for="first_name">First name</label>
            <input type="text" class="form-control" name="first_name" id="first_name" placeholder="Nombre" value="{{ $contact->first_name }}">
            <small></small>
        </div>
        <div class="form-group">
            <label for="last_name">Last name</label>
            <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Nombre" value="{{ $contact->last_name }}">
            <small></small>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" id="email" placeholder="Nombre" value="{{ $contact->email }}">
            <small></small>
        </div>
        <button type="submit" class="btn btn-success">Update</button>
        <a href="/contacts" class="btn btn-danger">Cancel</a>

    </form>
@endsection