<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Exception;
use App\metier\GsbFrais;

class ValiderFraisController extends Controller
{
     /**
     * Affiche la liste de toutes les fiches
     * de Frais du visiteur connecté
     * Si une erreur a été stockée dans la Session
     * on la récupère, on l'efface de la Session
     * et la passe au formulaire
     * @return type Vue listeFrais
     */
    public function getListeVisiteurs() {
        //$erreur = Session::get('erreur');
        //Session::forget('erreur');
        $unVisiteur = new GsbFrais();
        // On récupère la liste de tous les frais sur une année glissante
        $mesVisiteurs = $unVisiteur->getListeVisiteurs();
        // On affiche la liste de ces frais       
        return view('ValiderFrais', compact('mesVisiteurs'));
    }
  /**
     * Affiche le détail (frais forfait et hors forfait)
     * @return type Vue detailFrais
     */ 
  public function voirDetailFraisValidation($mois){
      $gsbFrais = new GsbFrais();
      $idVisiteur = Session::get('id');
      $lesFraisForfait = $gsbFrais->getLesFraisForfait($idVisiteur, $mois);
      $lesFraisHorsForfait = $gsbFrais->getLesFraisHorsForfait($idVisiteur, $mois);
      $montantTotal = 0;
      foreach ($lesFraisHorsForfait as $fhf){
            $montantTotal = $montantTotal + $fhf->montant;
      }
      $titreVue = "Détail de la fiche de frais du mois ".$mois;
      return view('listeDetailFicheValidation', compact('lesFraisForfait', 'lesFraisHorsForfait', 'mois', 'titreVue','montantTotal'));
  }
}
