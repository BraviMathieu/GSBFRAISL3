@extends('layouts.master')
@section('content')
{!! Form::open(['url' => 'getMdp']) !!}  
<div class="col-md-12 well well-md">
    <center><h1>Changer de mot de passe</h1></center>
    <form method="POST" action="">
        <div class="row">
        <div class="form-group">
            <label class="col-md-3 control-label">Ancien mot de passe : </label>
            <div class="col-md-6">
                <input type="password" name="ancienmdp" class="form-control" placeholder="Votre ancien mot de passe" required autofocus>
            </div>
        </div>
        </div>
         <div class="row">
        <div class="form-group">
            <label class="col-md-3 control-label">Nouveau mot de passe : </label>
            <div class="col-md-6">
                <input type="password" name="nouveaumdp" class="form-control" placeholder="Votre nouveau mot de passe" required pattern ="[A-Za-z0-9]{8}" title="8 caractères : Majuscules,Minuscules,Chiffres" autofocus value="{{old('nouveaumdp')}}">
            </div>
        </div>
         </div>
         <div class="row">
        <div class="form-group">
            <label class="col-md-3 control-label">Nouveau mot de passe : </label>
            <div class="col-md-6">
                <input type="password" name="nouveaumdpbis" class="form-control" placeholder="Votre nouveau mot de passe" value="{{old('nouveaumdpbis')}}" required pattern ="[A-Za-z0-9]{8}" title="8 caractères : Majuscules,Minuscules,Chiffres" autofocus >
            </div>
        </div>
         </div>
        </br>
        <div class="form-group">    
            
            <center><button type="submit" class="btn btn-default btn-primary"><span class="glyphicon glyphicon-log-in"></span> Valider</button></center>
        </div>
        <div class="form-group">
            <center><button type="reset" class="btn btn-default"> Reset</button></center>
        </div>
    </form>
     @if (session('erreur'))
        <div class="alert alert-danger">
         {{ session('erreur') }}
        </div>
    @endif
    @if (session('status'))
        <div class="alert alert-success">
         {{ session('status') }}
        </div>
    @endif

</div>
{!! Form::close() !!}
@stop