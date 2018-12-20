@extends('layouts.master')
@section('content')
{!! Form::open(['url' => 'createUser']) !!}  
<div class="col-md-12 well well-md">
    <center><h1>Créer un utilisateur</h1></center>
    <form method="POST" action="">
        <div class="row">
        <div class="form-group">
            <label class="col-md-3 control-label">Id  nom et prenom : </label>
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
            <label class="col-md-3 control-label"> Ville adresse et Code postal : </label>
            <div class="col-md-6">
                <input type="text" name="ville" class="form-control" placeholder="Ville de l'utilisateur" pattern="[A-Za-z]{1,}" required autofocus>
                <input type="text" name="adr" class="form-control" placeholder="Adresse de l'utilisateur" required autofocus>
                <input type="text" name="cp" class="form-control" placeholder="Code postal de l'utilisateur" pattern="[0-9]{5}" required autofocus>
            </div>
        </div>
         </div>
         <div class="row">
        <div class="form-group">
            <label class="col-md-3 control-label"> Date d'embauche numéro de télephonne et email : </label>
            <div class="col-md-6">
                <input type="text" name="dateEmbauch" class="form-control" placeholder="Date d'embauche de l'utilisateur" pattern="[0-9]{4}-(0[1-9]|1[012])-(0[1-9]|1[0-9]|2[0-9]|3[01])" autofocus>
                <input type="text" name="tel" class="form-control" placeholder="Numéro de téléphone de l'utilisatreur" pattern="^(?:0|\(?\+33\)?\s?|0033\s?)[1-79](?:[\.\-\s]?\d\d){4}$" autofocus>
                <input type="email" name="email" class="form-control" placeholder="Email de l'utilisateur" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" autofocus>
            </div>
        </div>
         </div>
        <div class="row">
        <div class="form-group">
            <label class="col-md-3 control-label"> Région d'embauche et rôle : </label>
            <div class="col-md-6">
                 <select class="form-control" name='reg'>
                @foreach($lesregions as $laregion)
                <option value="{{$laregion->id}}">
                {{ $laregion->reg_nom }}
            </option>
            @endforeach
        </select>
                <label class="form-check-label" >
                 Visiteur
                </label>
               <input class="form-check-input" type="radio" name="role" id="exampleRadios2" value="Visiteur" checked>
               <label class="form-check-label">
                 Délégué
                </label>
               <input class="form-check-input" type="radio" name="role" id="exampleRadios2" value="Délégué">
               <label class="form-check-label">
                 Responsable
                </label>
               <input class="form-check-input" type="radio" name="role" id="exampleRadios2" value="Responsable">
                
               
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

