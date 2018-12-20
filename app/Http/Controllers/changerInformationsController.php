<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\metier\GsbFrais;

class changerInformationsController extends Controller
{
    /**
     * récupère les régions
     */
    public function lesInfos()
    {
         $login= session::get('login');
        $gsbFrais = new GsbFrais();
        $lesinfos =$gsbFrais->getInfosPersonne($login);
        return view('changerInfos', compact('lesinfos'));
        
    }
    public function changerInfos(Request $request) 
    {
       $login= session::get('login');
       $adresse = $request->input('Naddr');
       $cp = $request->input('Ncp');
       $tel=$request->input('Ntel');
       $email=$request->input('Nemail');
       $ville=$request->input('Nville');
       $gsbFrais = new GsbFrais();
       $gsbFrais->changerLesInfos( $adresse, $cp,  $tel, $email,$ville, $login);
       return back()->with('status', "modification réussie");
       
        
       
     }
     
     
           
        }
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

