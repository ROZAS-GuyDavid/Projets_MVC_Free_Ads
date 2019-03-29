@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center mb-5">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Dashboard</div>

                {{-- <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row">
                        <a href="{{route('annonce.create')}}"><button type="button" class="btn btn-primary">créez une annonce</button></a>
                    </div>
                </div>   --}}
                
                
                
                <h1 class="text-center my-4">Les annonces</h1>
                    {{$annonces->links()}}
                    <a href="{{route('annonce.create')}}"><button type="button" class="btn btn-primary">créez une annonce</button></a>
                    <form action="#" method="POST">    
                        <table class="table table-striped">
                            {!! csrf_field() !!}
                            <thead>
                                <tr>
                                    <th>Titre</th>
                                    <th>Prix</th>
                                    <th>Statut</th>
                                    <th>Editer</th>
                                    <th>Archiver</th>
                                    <th><button type="submit" class="btn btn-warning btn-xs"><i class="fas fa-archive"></i> Archiver en trie par lot >></button></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($annonces as $annonce)
                                    <tr>
                                        <td><a href="#">{{$annonce->title}}</a></td>
                                        <td>{{$annonce->price}} €</td>
                                        <td class="text-center">
                                            @if($annonce->status == 'published')
                                            <span class="badge badge-success">published</span>
                                            @elseif($annonce->status == 'unpublished')
                                            <span class="badge badge-secondary">unpublished</span>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            <a href="#" class="btn btn-success"><i class="far fa-edit"></i></a>
                                        </td>
                                        <td class="text-center">
                                            <a href="#" class="btn btn-warning"><i class="fas fa-archive"></i></a>
                                        </td>
                                        <td class=" d-block text-center">
                                            <input type="checkbox" name="ids[]" value="{{$annonce->id}}">
                                        </td>

                                    </tr>
                                @empty
                                    Commencer par créer une annonce ...
                                @endforelse
                            </tbody>
                        </table>
                    </form>
                    {{-- {{$annonces->links()}}  --}}
            </div>
        </div>
    </div>
</div>
@endsection
