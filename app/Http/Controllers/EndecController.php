<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class EndecController extends Controller
{
    public function enkripsi()
    {
        $encrypted = Crypt::encryptString('Belajar Laravel Di malasngoding.com');
        $decrypted = Crypt::decryptString($encrypted);

        echo "Hasil Enkripsi : " . $encrypted;
        echo "<br/>";
        echo "<br/>";
        echo "Hasil Dekripsi : " . $decrypted;
echo "<br/>App_name from env :::".env('APP_NAME');
// APP_NAME
        // 
        
// if (env('APP_ENV') == 'local'){

//     echo 'Local Enviroment';

// }
    }
}
