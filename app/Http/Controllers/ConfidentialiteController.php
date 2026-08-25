<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConfidentialiteController extends Controller
{
    public function index()
    {
        $pageTitle = 'Politique de Confidentialité - Migban';
        return view('migban.confidentialite', compact('pageTitle'));
    }
}