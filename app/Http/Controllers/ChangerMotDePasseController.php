<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\metier\GsbFrais;

class ChangerMotDePasseController extends Controller
{
    /**
     * Change le mot de passe
     * @return retour page de connexion avec input
     */
    public function changerMdp(Request $request) 
    {
        
        $login = Session::get('login');
        
        $ancienmdp = $request->input('ancienmdp');
        $nouveaupwd = $request->input('nouveaumdp');
        $nouveaumdpbis = $request->input('nouveaumdpbis');
        
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