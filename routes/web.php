<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});

// Afficher le formulaire d'authentification 
//Route::get('/getLogin', 'ConnexionController@getLogin');
Route::get('/getLogin', function () {
   return view ('formLogin');
});
// Authentifie le visiteur à partir du login et mdp saisis
Route::post('/login', 'ConnexionController@logIn');

// Déloguer le visiteur
Route::get('/Logout', 'ConnexionController@logOut');

//saisirFrais
Route::get('/saisirFraisForfait', 'FraisForfaitController@saisirFraisForfait');

//saisirFrais
Route::post('/saisirFraisForfait', 'FraisForfaitController@validerFraisForfait');

// Afficher la liste des fiches de Frais du visiteur connecté
Route::get('/getListeFrais', 'VoirFraisController@getFraisVisiteur');

// Afficher le détail de la fiche de frais pour le mois sélectionné
Route::get('/voirDetailFrais/{mois}', 'VoirFraisController@voirDetailFrais');

// Afficher la liste des frais hors forfait d'une fiche de Frais
Route::get('/getListeFraisHorsForfait/{mois}', 'FraisHorsForfaitController@getFraisHorsForfait');

// Afficher le formulaire d'un Frais Hors Forfait pour une modification
Route::get('/modifierFraisHorsForfait/{idFrais}', 'FraisHorsForfaitController@modifierFraisHorsForfait');

// Afficher le formulaire d'un Frais Hors Forfait pour un ajout
Route::get('/ajouterFraisHorsForfait/{mois}', 'FraisHorsForfaitController@saisirFraisHorsForfait');

// Enregistrer une modification ou un ajout d'un Frais Hors Forfait
Route::post('/validerFraisHorsForfait', 'FraisHorsForfaitController@validerFraisHorsForfait');

// Supprimer un Frais Hors Forfait
Route::get('/supprimerFraisHorsForfait/{idFrais}', 'FraisHorsForfaitController@supprimmerFraisHorsForfait');

//Changer de mot de passe
//Route::get('/getMdp', 'ChangerMotDePasseController@changerMdp');

Route::get('/getMdp', function () {
   return view ('changermdp');
});

Route::post('/getMdp', 'ChangerMotDePasseController@changerMdp');

//Valider fiche de frais
Route::get('/getValiderFrais', 'ValiderFraisController@getListeVisiteurs');

Route::post('/getValiderFrais', 'ValiderFraisController@getListeVisiteurs');

// Retourner à une vue dont on passe le nom en paramètre
Route::get('getRetour/{retour}', function($retour){
    return redirect("/".$retour);
});

Route::get('/createUser', function () {
   return view ('creerUtilisateur');
});
Route::post('/createUser', 'creerUtilisateurController@createUser');
Route::get('/voirDetailFraisValidation/{mois}', 'ValiderFraisController@voirDetailFraisValidation');
