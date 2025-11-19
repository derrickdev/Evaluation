<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class NewController extends Controller
{
     private $nom = "Raphaël";
      public function accueil()
    {
    return view('accueil', ['nom_utilisateur' => $this->nom]);

    }

    public function contact()
    {
         $nom = "Raphaël";
    return view('contact', ['nom_utilisateur' => $this->nom]);
    }
    public function services()
    {

    $services = ['Comptabilité', 'Fiscalité', 'Création d’entreprise', 'Gestion de paie'];
    return view('services', [
        'services' => $services,
        'nom_utilisateur' => $this->nom
    ]);
    }
          public function dyna($no)
    {
       $no = "Raph";
    return view('dyna', ['no' => $no]);

    }

}
