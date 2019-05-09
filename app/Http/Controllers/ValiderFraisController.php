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
        $roles = new GsbFrais();
        $idVisiteur = Session::get('id');
        $role = $roles->getRole($idVisiteur);
        $reg = Session::get('region');
        $sec = Session::get('secteur');
        if($role == "Délégué")
        {
            $roleRes = "Visiteur";
            $mesVisiteurs = $unVisiteur->getListeVisiteursRoleReg($roleRes, $reg);
        }
        else
        {
            $roleRes = "Délégué";
            $mesVisiteurs = $unVisiteur->getListeVisiteursRoleSec($roleRes, $sec);
        }
        return view('ValiderFrais', compact('mesVisiteurs'));
    }
  /**
     * Affiche le détail (frais forfait et hors forfait)
     * @return type Vue detailFrais
     */ 
  public function voirDetailFraisValidation($nom,$prenom,$idVisiteur,$mois){
      $gsbFrais = new GsbFrais();
      $lesFraisForfait = $gsbFrais->getLesFraisForfait($idVisiteur, $mois);
      $lesFraisHorsForfait = $gsbFrais->getLesFraisHorsForfait($idVisiteur, $mois);
      $montantTotal = 0;
      foreach ($lesFraisHorsForfait as $fhf){
            $montantTotal = $montantTotal + $fhf->montant;
      }
      $titreVue = "Détail de la fiche de frais du mois ".$mois." correspondant au visiteur ".$prenom." ".$nom;
      return view('listeDetailFicheValidation', compact('lesFraisForfait', 'lesFraisHorsForfait', 'mois', 'titreVue','montantTotal','idVisiteur'));
  }
  
  public function SuppressionLigneHorsForfait($idVisiteur,$mois,$id)
  {
      $gsbFrais = new GsbFrais();
      $gsbFrais->supprimerFraisHorsForfait($id);
      return redirect()->back()->with('status', 'Suppression effectuée!');
      
  }
  
  public function getListeApresValidation($idVisiteur,$mois){
      $gsbFrais = new GsbFrais();
      $gsbFrais->ValiderFiche($idVisiteur, $mois);
      $unVisiteur = new GsbFrais();
      $roles = new GsbFrais();
      $idVisiteur = Session::get('id');
      $role = $roles->getRole($idVisiteur);
      if($role == "Délégué")
      {
          $roleRes = "Visiteur";
          $mesVisiteurs = $unVisiteur->getListeVisiteursRole($roleRes);
      }
      else
      {
          $roleRes = "Délégué";
          $mesVisiteurs = $unVisiteur->getListeVisiteursRole($roleRes);
      }
      return view('ValiderFrais', compact(['mesVisiteurs', 'confirmation']));
  }
  
  public function ModificationLigneFrais($idVisiteur,$mois,$id,$qte,Request $request)
  {
      $gsbFrais = new GsbFrais();
      $qte = $request->input('quantite');
      $gsbFrais->majFraisForfaitValidation($qte,$idVisiteur,$mois,$id);
      return redirect()->back()->with('statusMod', 'Modification effectuée!');
      
  }
}
