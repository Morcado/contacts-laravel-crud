@extends('layouts.base')

@section('main')
    <h1 class="text-center">Contactos</h1>
    <a href="/contacts/create" class="btn btn-primary">New contacts</a>

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
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection