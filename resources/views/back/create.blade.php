@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{route('annonce.store')}}" method="post" enctype="multipart/form-data">
        <h1 class="text-center my-4">Créez une annonce</h1>
            <div class="row">
                <div class="col-md-6 mr-auto">
                    @csrf
                    <div class="form-group">
                        <label for="title">Titre :</label>
                        <input type="text" name="title" value="{{old('title')}}" class="form-control" id="title" placeholder="Titre du poste">
                        @if($errors->has('title'))
                            <div class="alert alert-danger" role="alert">
                                <span class="error">{{$errors->first('title')}}</span>
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="description">Description :</label>
                        <textarea type="text" name="description" value="{{old('description')}}" class="form-control" placeholder="Description du poste"></textarea>
                        @if($errors->has('description'))
                            <div class="alert alert-danger" role="alert">
                                <span class="error">{{$errors->first('description')}}</span>
                            </div>
                        @endif
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="price">Prix :</label>
                            <input type="text" name="price" value="{{old('price')}}" class="form-control" placeholder="3,4"></input>
                            @if($errors->has('price'))
                                <div class="alert alert-danger" role="alert">
                                    <span class="error">{{$errors->first('price')}}</span>
                                </div>
                            @endif
                        </div>
                    </div>
            </div>
            <div class="col-md-5 col-auto">  
                <div class="form-group">
                    <p class="m-b05">Statut :</p>    
                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                        <label class="btn btn-secondary">
                            <input type="radio" id="option1" name="status" value="published"> publier
                        </label>
                        <label class="btn btn-secondary active">
                            <input type="radio" id="option2" name="status" value="unpublished" checked> dépublier
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <p class="m-b05">Image :</p>
                    <div class="input-group">   
                        <div class="custom-file">
                            <input class="custom-file-input" type="file" name="picture" onchange="readURL(this);">
                            <label class="custom-file-label" for="picture">Choisissez une image</label>
                        </div>
                        @if($errors->has('picture'))
                        <div class="alert alert-danger" role="alert">
                            <span class="error bg-warning text-warning">{{$errors->first('picture')}}</span>
                        </div>
                        @endif
                    </div>
                </div>
                <div class="m-b05">
                    <img id="preview" src="">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Ajouter le poste</button>
                </div>
            </div>
        </form>
    </div>
@endsection