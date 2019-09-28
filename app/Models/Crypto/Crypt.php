<?php

namespace App\Models\Crypto;

class Crypt
{
    public static function create_keys()
    {
        $keyResource = openssl_pkey_new(['private_key_bits' => 2048, 'private_key_type' => OPENSSL_KEYTYPE_RSA,]);
        openssl_pkey_export($keyResource, $private_key);

        $publicKey = openssl_pkey_get_details($keyResource);

        $key = [
            'private' => $private_key,
            'public' => $publicKey['key'],
        ];

        return $key;
    }

}
