<?php

/*
 * COPYRIGHT © 2017. TCPIP.
 * PATENT PENDING. ALL RIGHTS RESERVED.
 * SPEI GATEWAY IS REGISTERED TRADEMARKS OF TCPIP.
 *
 * This software is confidential and proprietary information of TCPIP.
 * You shall not disclose such Confidential Information and shall use it only
 * in accordance with the company policy.
 */
namespace mx\wire4\auth;

class OAuthWire4 {

    private $clientId;
    private $clientSecret;
    private $tokenUrl;

    public function __construct($clientId, $clientSecret, $url) {

        $this->clientId = $clientId;
        $this->clientSecret = $clientSecret;

        if ( $url != null) {

            $this->tokenUrl = $url;
        } else {

            throw new \Exception("Environment is required...");
        }

    }

    public function obtainAccessTokenApp($scope) {

        $accessToken=null;
        try {

            if (empty($scope)) {

                throw new \Exception("A least one scope is required...",401 );
            }


            $fields = array(
                'grant_type' => 'client_credentials',
                'scope' => $scope
            );

            $parametros="";
            foreach($fields as $key=>$value) { $parametros .= $key.'='.$value.'&'; }
            $parametros = rtrim($parametros, '&');

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL,$this->tokenUrl);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS,$parametros);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Authorization: Basic ' . base64_encode($this->clientId.':'.$this->clientSecret)
            ));

            $accessToken = json_decode(curl_exec($ch));

            curl_close ($ch);

        } catch (\Exception $e) {

            throw $e;
        }

        return 'Bearer '.$accessToken->access_token;

    }

    public function obtainAccessTokenAppUser($userKey, $secretKey, $scope)
    {

        $accessToken = null;

        try {

            $fields = array(
                'grant_type' => 'password',
                'username' => $userKey,
                'password' => $secretKey,
                'scope' => $scope
            );

            $parametros = "";
            foreach ($fields as $key => $value) {
                $parametros .= $key . '=' . $value . '&';
            }
            $parametros = rtrim($parametros, '&');

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $this->tokenUrl);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $parametros);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Authorization: Basic ' . base64_encode($this->clientId . ':' . $this->clientSecret)
            ));


            $accessToken = json_decode(curl_exec($ch));
            curl_close($ch);

            if (! isset($accessToken->access_token)) {
                throw new \Exception(
                    !isset($accessToken->error_description) ? "Ocurrio un error inesperado, por favor contacte al administrados":$accessToken->error_description,400);
            }

        } catch (\Exception $e) {
            throw $e;
            exit(-1);
        }


        return 'Bearer '.$accessToken->access_token;
    }

}
