@extends('layouts.master')
@section('content')
{!! Form::open(['url' => 'changerInfos']) !!}  
<div class="col-md-12 well well-md">
    <center><h1>Authentification</h1></center>
    <div class="form-horizontal">    
        <div class="form-group">
            <label class="col-md-3 control-label">Adresse et code postal : </label>
            <div class="col-md-6  col-md-3">
                <input type="text" name="login" class="form-control" placeholder="Nouvelle Adresse" pattern="[a-zA-Z]" required autofocus>
                <input type="text" name="cp" class="form-control" placeholder="Nouveau code Postal" pattern="[0-9]{5}" required autofocus>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3 control-label">numéro de téléphone </label>
            <div class="col-md-6 col-md-3">
                <input type="text" name="tel" class="form-control" placeholder="numéro de téléphone de l'utilisatreur" pattern="^(?:0|\(?\+33\)?\s?|0033\s?)[1-79](?:[\.\-\s]?\d\d){4}$" autofocus>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3 control-label">adresse mail </label>
            <div class="col-md-6 col-md-3">
                <input type="email" name="email" class="form-control" placeholder="email de l'utilisateur" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" autofocus>
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-6 col-md-offset-3">
                <button type="submit" class="btn btn-default btn-primary"><span class="glyphicon glyphicon-log-in"></span> Valider</button>
            </div>
        </div>
    @if (session('erreur'))
        <div class="alert alert-danger">
         {{ session('erreur') }}
        </div>
    @endif
    </div>
</div>
{!! Form::close() !!}
@stop


