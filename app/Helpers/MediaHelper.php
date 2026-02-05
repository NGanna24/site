<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class MediaHelper
{
    /**
     * Uploader un fichier
     */
    public static function uploadFile($file, $directory = 'uploads', $disk = 'public')
    {
        $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
        $path = $file->storeAs($directory, $filename, $disk);
        
        return [
            'path' => $path,
            'url' => Storage::disk($disk)->url($path),
            'filename' => $filename,
            'original_name' => $file->getClientOriginalName(),
            'size' => $file->getSize(),
            'mime_type' => $file->getMimeType()
        ];
    }
    
    /**
     * Uploader une image avec redimensionnement
     */
    public static function uploadImage($file, $directory = 'images', $sizes = [])
    {
        $upload = self::uploadFile($file, $directory);
        
        // Créer des versions redimensionnées si nécessaire
        if (!empty($sizes)) {
            $image = Image::make($file);
            $originalPath = Storage::path($upload['path']);
            
            foreach ($sizes as $sizeName => $dimensions) {
                [$width, $height] = $dimensions;
                
                $resizedImage = Image::make($file)
                    ->resize($width, $height, function ($constraint) {
                        $constraint->aspectRatio();
                        $constraint->upsize();
                    });
                
                $resizedPath = str_replace(
                    $upload['filename'],
                    "{$sizeName}_{$upload['filename']}",
                    $originalPath
                );
                
                $resizedImage->save($resizedPath);
            }
        }
        
        return $upload;
    }
    
    /**
     * Supprimer un fichier
     */
    public static function deleteFile($path, $disk = 'public')
    {
        if (Storage::disk($disk)->exists($path)) {
            return Storage::disk($disk)->delete($path);
        }
        
        return false;
    }
    
    /**
     * Obtenir l'URL d'un fichier
     */
    public static function getFileUrl($path, $disk = 'public')
    {
        if (!$path) {
            return null;
        }
        
        return Storage::disk($disk)->url($path);
    }
    
    /**
     * Vérifier si c'est une image
     */
    public static function isImage($mimeType)
    {
        return strpos($mimeType, 'image/') === 0;
    }
    
    /**
     * Obtenir les dimensions d'une image
     */
    public static function getImageDimensions($path, $disk = 'public')
    {
        if (!self::isImage(mime_content_type(Storage::path($path)))) {
            return null;
        }
        
        [$width, $height] = getimagesize(Storage::disk($disk)->path($path));
        
        return [
            'width' => $width,
            'height' => $height
        ];
    }
}