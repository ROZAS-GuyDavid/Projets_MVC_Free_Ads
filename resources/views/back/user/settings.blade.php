@extends('layouts.app')

@section('content')

<div class="container">
    
    @include('back.user.infos-form')
    @include('back.user.change-password-form')

    <div class="row justify-content-center">
        <a class="btn btn-danger" onclick="return confirm('Are you sure?')" href="{{route('deleteUser', $user)}}" role="button">Supprimer le compte</a>
    </div>
    
</div>

@endsection