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
    $apkPath = public_path('apk/MIGBAN.apk');
    $apkExists = file_exists($apkPath);

    $apkSize = 0;
    if ($apkExists) {
        $apkSize = round(filesize($apkPath) / 1024 / 1024, 1);
    }

    // lien vers l'APK pour les boutons
    $apkUrl = asset('apk/MIGBAN.apk');

    // QR Code vers la page MIGBAN
    $pageUrl = "https://n-double.com/application/migban";
    $encodedUrl = urlencode($pageUrl);

    $qrCodeUrl = "https://api.qrserver.com/v1/create-qr-code/?size=150x150&data={$encodedUrl}&bgcolor=FFFFFF";

    return view('services.detaille', [
        'qrCodeUrl' => $qrCodeUrl,
        'apkExists' => $apkExists,
        'apkUrl' => $apkUrl,
        'apkSize' => $apkSize
    ]);

    
}



}