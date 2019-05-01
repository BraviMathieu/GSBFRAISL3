@extends('layouts.master')
@section('content')
{!! Form::open(['url' => 'changerInfos']) !!}  
<div class="col-md-12 well well-md">
    <center><h1>Changer d'informations</h1></center>
    <div class="form-horizontal"> 
    @foreach($lesinfos as $uneinfo)   
        <div class="form-group">
            <label class="col-md-3 control-label">Adresse code postal et ville : </label>
            <div class="col-md-6  col-md-3">
                <input type="text" name="Naddr" class="form-control" placeholder="Nouvelle Adresse" value="{{ $uneinfo->adresse }}"  required autofocus>
                <input type="text" name="Ncp" class="form-control" placeholder="Nouveau code postal" value="{{ $uneinfo->cp}}" pattern="[0-9]{5}" required autofocus>
                <input type="text" name="Nville" class="form-control" placeholder="Nouvelle ville" value ="{{ $uneinfo->ville }}" pattern="[A-Za-z]{1,}" required autofocus>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3 control-label">Numéro de téléphone </label>
            <div class="col-md-6 col-md-3">
                <input type="text" name="Ntel" class="form-control" placeholder="Numéro de téléphone de l'utilisateur" value="{{$uneinfo->tel}}" pattern="^(?:0|\(?\+33\)?\s?|0033\s?)[1-79](?:[\.\-\s]?\d\d){4}$" autofocus>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3 control-label">Adresse mail </label>
            <div class="col-md-6 col-md-3">
                <input type="email" name="Nemail" class="form-control" placeholder="Email de l'utilisateur" value="{{ $uneinfo->email }}" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" autofocus>
            </div>
        </div>
        @endforeach
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


