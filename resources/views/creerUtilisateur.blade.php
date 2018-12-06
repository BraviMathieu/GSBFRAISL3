@extends('layouts.master')
@section('content')
{!! Form::open(['url' => 'createUser']) !!}  
<div class="col-md-12 well well-md">
    <center><h1>Créer un utilisateur</h1></center>
    <form method="POST" action="">
        <div class="row">
        <div class="form-group">
            <label class="col-md-3 control-label">id  nom et prenom : </label>
            <div class="col-md-2">
                <input type="text" name="id" class="form-control" placeholder="Id utilisateur" maxlength="4"  required   autofocus>
            </div>
            <div class="col-md-3">
                <input type="text" name="nom" class="form-control" placeholder="Nom de l'utilisateur" pattern="^[A-Za-z-]+$" required autofocus>
            </div>
            <div class="col-md-3">
            <input type="text" name="prenom" class="form-control" placeholder="Prénom de l'utilisateur" pattern="^[A-Za-z-]+$" required autofocus>
            </div>
        </div>
        </div>
         <div class="row">
        <div class="form-group">
            <label class="col-md-3 control-label"> ville adresse et Code postal : </label>
            <div class="col-md-6">
                <input type="text" name="ville" class="form-control" placeholder="Ville de l'utilisateur" pattern="[A-Za-z]{1,}" required autofocus>
                <input type="text" name="adr" class="form-control" placeholder="adresse de l'utilisateur" required autofocus>
                <input type="text" name="cp" class="form-control" placeholder="Code postal de l'utilisateur" pattern="[0-9]{5}" required autofocus>
            </div>
        </div>
         </div>
         <div class="row">
        <div class="form-group">
            <label class="col-md-3 control-label"> date d'embauche numéro de télephonne et email : </label>
            <div class="col-md-6">
                <input type="text" name="dateEmbauch" class="form-control" placeholder="date d'embauche de l'utilisateur" pattern="[0-9]{4}-(0[1-9]|1[012])-(0[1-9]|1[0-9]|2[0-9]|3[01])" autofocus>
                <input type="text" name="tel" class="form-control" placeholder="numéro de téléphone de l'utilisatreur" pattern="^(?:0|\(?\+33\)?\s?|0033\s?)[1-79](?:[\.\-\s]?\d\d){4}$" autofocus>
                <input type="email" name="email" class="form-control" placeholder="email de l'utilisateur" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" autofocus>
            </div>
        </div>
         </div>
        <div class="row">
        <div class="form-group">
            <label class="col-md-3 control-label"> région d'embauche et rôle : </label>
            <div class="col-md-6">
                <input type="text" name="reg" class="form-control" placeholder="région de l'utilisateur" autofocus>
                <input type="text" name="role" class="form-control" placeholder="rôle de l'utilisateur" autofocus>
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

