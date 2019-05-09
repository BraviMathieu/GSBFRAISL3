@extends('layouts.master')
@section('content')
<div class="container">
    <div class="col-md-8 col-sm-8">
        @if (session('status'))
            <div class="alert alert-danger">
                {{ session('status') }}
            </div>
        @endif
        @if (session('statusMod'))
            <div class="alert alert-info">
                {{ session('statusMod') }}
            </div>
        @endif
        <div class="blanc">
            <h1>{{$titreVue or ''}}</h1>
        </div>
        <h3>Liste des frais forfait</h3>
        <table class="table table-bordered table-striped table-responsive">
            <thead>
                <tr>
                    <th>id</th> 
                    <th>Quantité</th>  
                </tr>
            </thead>
            @foreach($lesFraisForfait as $unFF)
            <tr>   
                <td> {{ $unFF->idfrais }} </td> 
                <td> {{ $unFF->quantite }} </td>
                <td style="text-align: center;width:1px"><input type="text" id="quantite" name="quantite" size="3" ></td>
                <td style="text-align: center;width:1px"><a href="{{url('/getModifierFrais')}}/{{$idVisiteur}}/{{$mois}}/{{$unFF->idfrais}}/{{$unFF->quantite}}" ><button type="button" class="btn btn-sm btn-primary" style="height:30px">Modification</button></a></td>
            </tr>
            @endforeach
        </table>
        <h3>Liste des frais hors forfait</h3>
        <table class="table table-bordered table-striped table-responsive">
            <thead>
                <tr>
                    <th>Libellé</th> 
                    <th>Date</th> 
                    <th>Montant</th>  
                </tr>
            </thead>
            @foreach($lesFraisHorsForfait as $unFHF)
            <tr>   
                <td> {{ $unFHF->libelle }} </td> 
                <td> {{ $unFHF->date }} </td> 
                <td> {{ $unFHF->montant }} </td>
                <td style="text-align: center;width:1px"><a href="{{ url('/getSuppressionLigne')}}/{{$idVisiteur}}/{{$mois}}/{{$unFHF->id}}" ><button type="button" class="btn btn-sm btn-danger supr" onclick="a()" CausesValidation="False">Suppresion de la ligne</button></a></td>
            </tr>
            @endforeach
            <!--
            <select>
                @foreach($lesFraisHorsForfait as $unFHF)
                <option value="{{$unFHF->libelle}}-{{$unFHF->date}}-{{$unFHF->montant}}">{{$unFHF->libelle}} - {{$unFHF->date}} - {{$unFHF->montant}}</option>
                @endforeach
            </select>
            -->
            <tr>
                <td style="text-align: right">Montant total :</td>
                <td></td>
                <td>{{$montantTotal}}</td>
            </tr>
        </table>
        <div class="form-group">
            <div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3">
                <a href="{{ url('/getValiderFrais') }}" ><button type="button" class="btn btn-default btn-primary" >Retour</button></a>
                <a href="{{ url('/getValiderFrais')}}/{{$idVisiteur}}/{{$mois}}" ><button type="button" class="btn btn-default btn-primary" >Valider la fiche</button></a>
            </div>
        </div>  
        @if (session('erreur'))
        <div class="alert alert-danger">
         {{ session('erreur') }}
        </div>
  @endif
    </div>
    <!--<script type="text/javascript">
        function a()
        {
            if(!confirm("test"))
            {
                alert("cancelled!");
                window.stop();
                return false;
            }
        }
    </script>-->
</div>
@stop
