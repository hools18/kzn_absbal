<?php

namespace App\Models\Crypto;

use App\Models\UserInterface\Key;

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

    public static function encodeData($private_key_id, $data)
    {
        $key = Key::find($private_key_id);

        $privateKey = openssl_pkey_get_private($key->hash_key);

        openssl_private_encrypt($data, $encrypted, $privateKey);

        openssl_free_key($privateKey);

        $encrypted = base64_encode($encrypted);

        return $encrypted;
    }

}
