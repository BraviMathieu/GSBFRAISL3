<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\metier\GsbFrais;

class CreerUtilisateur extends Controller
{
    /**
     * Change le mot de passe
     * @return retour page de connexion avec input
     */
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
        
        if ($ancienmdp == $nouveaupwd)
        {
            $erreur = "Ancien et nouveau mot de passe ne doivent pas etre identiques !";
            Session::flash('erreur', $erreur);
            return back()->withInput($request->except('ancienmdp'));
        }
        else
        {
            if ($nouveaupwd != $nouveaumdpbis) 
            {
                $erreur = "Les deux nouveaux mot de passe ne sont pas identiques !";
                Session::flash('erreur', $erreur);
                return back()->withInput($request->except('ancienmdp'));
            }
            else
            {
                $gsbFrais = new GsbFrais();
                $res = $gsbFrais->getInfosVisiteur($login,$ancienmdp);
                if(empty($res))
                {
                    Session::put('id', '0');
                    $erreur = "Login ou mot de passe inconnu !";
                    
                    Session::flash('erreur', $erreur);
                    return back()->withInput($request->except('ancienmdp'));
                }
                else
                {
                    $gsbFrais->ChangerMdp($login, $nouveaupwd);
                    return back()->with('status', 'Mise à jour effectuée!');
                }
            }
           
        }
       
    }
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>
