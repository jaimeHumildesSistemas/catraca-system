<!-- resources/views/users/index.blade.php -->
@extends('layouts.app') {{-- se você tem um layout principal --}}

@section('content')
<div class="container">
    <h1>Usuários</h1>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
