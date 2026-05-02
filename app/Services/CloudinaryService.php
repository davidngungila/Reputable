<?php

namespace App\Services;

use Cloudinary\Cloudinary;
use Cloudinary\Api\Admin\AdminApi;
use Cloudinary\Api\Upload\UploadApi;
use Cloudinary\Api\Search\SearchApi;
use App\Models\CloudinaryConfig;

class CloudinaryService
{
    private static $cloudinary;
    private static $initialized = false;
    
    public static function initialize()
    {
        if (!self::$initialized) {
            $config = self::getDatabaseConfig();
            
            // Initialize Cloudinary Configuration
            \Cloudinary\Configuration\Configuration::instance([
                'cloud' => [
                    'cloud_name' => $config['cloud_name'],
                    'api_key' => $config['api_key'],
                    'api_secret' => $config['api_secret'],
                ],
                'url' => [
                    'secure' => true
                ]
            ]);
            
            self::$initialized = true;
        }
    }
    
    public static function getInstance()
    {
        if (!self::$cloudinary) {
            self::initialize();
            $config = self::getDatabaseConfig();
            self::$cloudinary = new Cloudinary($config);
        }
        
        return self::$cloudinary;
    }
    
    public static function admin()
    {
        self::initialize();
        return new AdminApi();
    }
    
    public static function upload()
    {
        self::initialize();
        return new UploadApi();
    }
    
    public static function search()
    {
        self::initialize();
        return new SearchApi();
    }
    
    public static function getConfig()
    {
        return self::getDatabaseConfig();
    }
    
    private static function getDatabaseConfig()
    {
        $config = CloudinaryConfig::getActive();
        
        if ($config) {
            return [
                'cloud_name' => $config->cloud_name,
                'api_key' => $config->api_key,
                'api_secret' => $config->api_secret,
                'cloud_url' => $config->cloud_url,
            ];
        }
        
        // Fallback to hardcoded values
        return [
            'cloud_name' => 'dqflffa1o',
            'api_key' => '934773358234285',
            'api_secret' => 'GV5IttBrxjmDF5wsDO9jL7KCAUY',
            'cloud_url' => 'cloudinary://934773358234285:GV5IttBrxjmDF5wsDO9jL7KCAUY@dqflffa1o',
        ];
    }
}
