@extends('layouts.app')

@section('content')
<div class="container">

    <h1 class="text-center">Contacts of {{ Auth::user()->name }}</h1>
    <a href="/contacts/create" class="btn btn-primary">New contacts</a>

    @if (count($contacts) == 0)
        <p class="display-4">No contacts</p>                
    @else        
    <table class="table">
        <thead class="thead-light">
            <tr>
                <th>First name</th>
                <th>Last name</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($contacts as $contact)
            <tr>
                <td>{{ $contact->first_name }}</td>
                <td>{{ $contact->last_name }}</td>
                <td>{{ $contact->email }}</td>
                <td>
                    <a href="/contacts/{{ $contact->id }}/edit">Edit</a>
                    <form action="/contacts/{{ $contact->id }}" method="POST">
                        @csrf
                        @method('delete')
                        {{-- Hacer un cuadro de confirmacion aqui --}}
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif

</div>

@endsection