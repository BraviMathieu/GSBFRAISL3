<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\metier\GsbFrais;

class CreerUtilisateurController extends Controller
{
    /**
     * récupère les régions
     */
    public function lesRegions()
    {
         $secteur = session::get('secteur');
        $gsbFrais = new GsbFrais();
        $lesregions =$gsbFrais->getRegions($secteur);
        return view('creerUtilisateur', compact('lesregions'));
        
    }
    public function createUser(Request $request) 
    {
       $id=$request->input('id');
       $nom = $request->input('nom');
       $prenom = $request->input('prenom');
       $ville = $request->input('ville');
       $adresse = $request->input('adr');
       $cp = $request->input('cp');
       $dateEmbauch=$request->input('dateEmbauch');
       $tel=$request->input('tel');
       $email=$request->input('email');
       $region=$request->input('reg');
       $role=$request->input('role');
       $gsbFrais = new GsbFrais();
       
       $chiffreShuffle = str_shuffle("1234567890");
        $minusShuffle = str_shuffle("azertyuiopqsdfghjklmwxcvbn");
        $majShuffle = str_shuffle("AZERTYUIOPQSDFGHJKLMWXCVBN");
 
        //ne prend que les 6 premier caractères 
        $pass1 = substr($chiffreShuffle,0,1);
        $pass2 = substr($minusShuffle,0,3);
        $pass3 = substr($majShuffle,0,2);
        
        $pass = $pass1.$pass2.$pass3;
        $passShuffle = substr(str_shuffle($pass),0,6);
        $mdp=$passShuffle;
       if(strpos($nom,'-'))
       {
        $login= substr($prenom, 0,strpos($nom,'-')-1).$nom;
        
       }
       else
       {
         $login= substr($prenom, 0,1).$nom;  
       }
       
       $verif = $gsbFrais->compareIdVisiteur($id);

       if($verif != null)
       {
           return back()->with('erreur', "l'id existe déjà");
       }
       else
       {
           $gsbFrais->creerUtil($id, $nom, $prenom, $ville, $adresse, $cp, $dateEmbauch, $tel, $email, $region, $role, $login, MD5($mdp));
           return back()->with('status', "création réussie login: $login mot de passe : $mdp");
       }
       
       
     }
        
        }
       


?>
