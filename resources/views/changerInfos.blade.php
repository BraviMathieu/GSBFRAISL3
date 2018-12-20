@extends('layouts.master')
@section('content')
{!! Form::open(['url' => 'changerInfos']) !!}  
<div class="col-md-12 well well-md">
    <center><h1>Changer d'informations</h1></center>
     @foreach($lesinfos as $uneinfo)
     <p> <strong>Adresse:</strong> {{ $uneinfo->adresse }} </p>
     <p> <strong>Ville:</strong> {{ $uneinfo->ville }} </p> 
     <p> <strong>Code postal:</strong> {{ $uneinfo->cp}} </p>
     <p> <strong>Votre Numéro de téléphone :</strong> {{$uneinfo->tel}} </p>
     <p> <strong>Votre email :</strong> {{ $uneinfo->email }}  </p>
     @endforeach
    <div class="form-horizontal">    
        <div class="form-group">
            <label class="col-md-3 control-label">Adresse code postal et ville : </label>
            <div class="col-md-6  col-md-3">
                <input type="text" name="Naddr" class="form-control" placeholder="Nouvelle Adresse"  required autofocus>
                <input type="text" name="Ncp" class="form-control" placeholder="Nouveau code postal" pattern="[0-9]{5}" required autofocus>
                <input type="text" name="Nville" class="form-control" placeholder="Nouvelle ville" pattern="[A-Za-z]{1,}" required autofocus>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3 control-label">Numéro de téléphone </label>
            <div class="col-md-6 col-md-3">
                <input type="text" name="Ntel" class="form-control" placeholder="Numéro de téléphone de l'utilisateur" pattern="^(?:0|\(?\+33\)?\s?|0033\s?)[1-79](?:[\.\-\s]?\d\d){4}$" autofocus>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3 control-label">Adresse mail </label>
            <div class="col-md-6 col-md-3">
                <input type="email" name="Nemail" class="form-control" placeholder="Email de l'utilisateur" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" autofocus>
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-6 col-md-offset-3">
                <button type="submit" class="btn btn-default btn-primary"><span class="glyphicon glyphicon-log-in"></span> Valider</button>
            </div>
        </div>
    @if (session('status'))
        <div class="alert alert-success">
         {{ session('status') }}
        </div>
    @endif
    </div>
</div>
{!! Form::close() !!}
@stop


