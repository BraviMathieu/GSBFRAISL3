@extends('layouts.master')
@section('content')
<div class="container">
    <div class="col-md-7">
        @isset($confirmation)
            <div class="alert alert-success">Mise à jour effectuée!</div>
        @endisset
        <div class="blanc">
            <h1>Visiteurs ayant une fiche clôturée</h1>
        </div>
            @if(empty($mesVisiteurs))
            <div class="alert alert-danger">
                Aucune fiche de frais à valider
            </div>
            @else
            <table class="table table-bordered table-striped table-responsive">
            <thead>
                <tr>
                    <th style="width:20%">Visiteur</th>
                    <th style="width:20%">Mois</th>
                    <th style="width:20%">Montant de la fiche</th>
                    <th style="width:20%">Sélectionner</th> 
                </tr>
            </thead>
            @foreach($mesVisiteurs as $unVisiteur)
            <tr>   
                <td> {{ $unVisiteur->prenom }} {{ $unVisiteur->nom }} </td> 
                <td> {{ $unVisiteur->mois }} </td> 
                <td> {{ $unVisiteur->montantValide }} </td>
                <td style="text-align:center;"><a href="{{ url('/voirDetailFraisValidation') }}/{{ $unVisiteur->nom }}/{{ $unVisiteur->prenom }}/{{ $unVisiteur->idVisiteur }}/{{ $unVisiteur->mois }}">
                        <span class="glyphicon glyphicon-list" data-toggle="tooltip" data-placement="top" title="Voir"></span></a></td>
            </tr>
            @endforeach
            </table>
            @endif
    @if (session('erreur'))
        <div class="alert alert-danger">
         {{ session('erreur') }}
        </div>
    @endif
    </div>
</div>
@stop
