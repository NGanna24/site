<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MigbanDownload; // <-- IMPORTANT

class PagesController extends Controller
{
    public function accueil()
    {
        return view('welcome');
    }
    
    public function serviceDetail(Request $request) // <-- Ajoutez Request ici
    {
        // Vérifier si c'est une requête de téléchargement
        if ($request->has('download') && $request->download == 'migban') {
            return $this->handleDownload($request);
        }
        
        // Récupération du nombre de téléchargements
        $nombreDeTelechargement = MigbanDownload::count();
        
        $apkPath = public_path('apk/MIGBAN.apk');
        $apkExists = file_exists($apkPath);

        $apkSize = 0;
        if ($apkExists) {
            $apkSize = round(filesize($apkPath) / 1024 / 1024, 1);
        }

        // MODIFICATION ICI : Ajout du paramètre download
        $apkUrl = url('/application/migban?download=migban');

        // QR Code vers la page MIGBAN
        $pageUrl = "https://n-double.com/application/migban";
        $encodedUrl = urlencode($pageUrl);
        $qrCodeUrl = "https://api.qrserver.com/v1/create-qr-code/?size=150x150&data={$encodedUrl}&bgcolor=FFFFFF";

        return view('services.detaille', [
            'qrCodeUrl' => $qrCodeUrl,
            'apkExists' => $apkExists,
            'apkUrl' => $apkUrl,
            'apkSize' => $apkSize,
            'nombreDeTelechargement' => $nombreDeTelechargement // <-- AJOUT
        ]);
    }
    
    /**
     * Gère le téléchargement et l'enregistrement en BD
     */
    private function handleDownload(Request $request)
    {
        $apkPath = public_path('apk/MIGBAN.apk');
        
        if (!file_exists($apkPath)) {
            abort(404, 'Application non trouvée');
        }

        // Enregistrer dans la base de données
        MigbanDownload::create([
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
            'device_type' => $this->getDeviceType($request->userAgent()),
            'platform' => $this->getPlatform($request->userAgent()),
            'browser' => $this->getBrowser($request->userAgent()),
            'referer' => $request->header('referer')
        ]);

        // Télécharger le fichier
        return response()->download($apkPath, 'MIGBAN.apk', [
            'Content-Type' => 'application/vnd.android.package-archive',
        ]);
    }
    
    /**
     * Helpers pour détecter les appareils
     */
    private function getDeviceType($userAgent)
    {
        if (preg_match('/(android|iphone|ipad|ipod)/i', $userAgent)) return 'mobile';
        if (preg_match('/(tablet|ipad)/i', $userAgent)) return 'tablet';
        return 'desktop';
    }
    
    private function getPlatform($userAgent)
    {
        if (preg_match('/windows/i', $userAgent)) return 'Windows';
        if (preg_match('/mac/i', $userAgent)) return 'Mac';
        if (preg_match('/linux/i', $userAgent)) return 'Linux';
        if (preg_match('/android/i', $userAgent)) return 'Android';
        if (preg_match('/iphone|ipad/i', $userAgent)) return 'iOS';
        return 'Unknown';
    }
    
    private function getBrowser($userAgent)
    {
        if (preg_match('/firefox/i', $userAgent)) return 'Firefox';
        if (preg_match('/chrome/i', $userAgent)) return 'Chrome';
        if (preg_match('/safari/i', $userAgent)) return 'Safari';
        if (preg_match('/edge/i', $userAgent)) return 'Edge';
        return 'Unknown';
    }
}