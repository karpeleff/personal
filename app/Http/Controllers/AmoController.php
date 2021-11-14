<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use AmoCRM\OAuth2\Client\Provider\AmoCRM;

class AmoController extends Controller
{
    public  function   amo()
    {
        $provider = new AmoCRM([
            'clientId' => 'c9c17064-2a4c-44e7-abd8-b5850e828780',
            'clientSecret' => 'S0F3nlQ91R9txt0sanm04vNxNQlqkJFuSZbxU84jBujsZQYe3e4nMsFFLZbHOzVE',
            'redirectUri' => 'http://karpelev.com/amo',
        ]);

        if (isset($_GET['code']) && $_GET['code']) {
            //Вызов функции setBaseDomain требуется для установки контектс аккаунта.
            if (isset($_GET['referer'])) {
                $provider->setBaseDomain($_GET['referer']);
            }

            $token = $provider->getAccessToken('authorization_code', [
                'code' => $_GET['code']
            ]);

            //todo сохраняем access, refresh токены и привязку к аккаунту и возможно пользователю

            /** @var \AmoCRM\OAuth2\Client\Provider\AmoCRMResourceOwner $ownerDetails */
            $ownerDetails = $provider->getResourceOwner($token);

            printf('Hello, %s!', $ownerDetails->getName());
        }

    }

}
