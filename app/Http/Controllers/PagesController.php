<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function accueil()
    {
        return view('welcome');
    }
    
    public function serviceDetail()
    {
        // Chemin vers le fichier APK
        $apkPath = public_path('apk/MIGBAN.apk');
        $apkExists = file_exists($apkPath);
        
        // Calculer la taille de l'APK si existe
        $apkSize = 0;
        if ($apkExists) {
            $apkSize = round(filesize($apkPath) / 1024 / 1024, 1); // Taille en MB
        }
        
        // URL vers un service de QR Code en ligne (solution simple)
        $apkUrl = asset('apk/MIGBAN.apk');
        $encodedUrl = urlencode($apkUrl);
        $qrCodeUrl = "https://api.qrserver.com/v1/create-qr-code/?size=150x150&data={$encodedUrl}&color=EC681D&bgcolor=FFFFFF";
        
        return view('services.detaille', [
            'qrCodeUrl' => $qrCodeUrl,  // URL du QR Code
            'apkExists' => $apkExists,
            'apkUrl' => $apkUrl,
            'apkSize' => $apkSize
        ]);
    }
}