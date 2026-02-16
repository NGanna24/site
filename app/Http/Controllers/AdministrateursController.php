<?php
 
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdministrateursController extends Controller
{
    //
    public function accueil(){
        return view('admin.accueil');
    }
}
