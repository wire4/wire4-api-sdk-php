<?php
require_once(__DIR__ . '/vendor/autoload.php');

$accessToken= "";
try {
    // Create the authenticator to obtain access token
    $oauth = new \mx\wire4\auth\OAuthWire4 (
        'YOUR_OAUTH_CONSUMER_KEY', //REPLACE THIS WITH YOUR DATA
        'YOUR_OAUTH_CONSUMER_SECRET', //REPLACE THIS WITH YOUR DATA
        \mx\wire4\auth\Environment::SANDBOX); // O \mx\wire4\auth\Environment::PRODUCTION
    // Obtain an access token use application flow and scope "general"
    $accessToken= $oauth->obtainAccessTokenApp("general");
} catch(OAuthException $e) {
    echo "Respuesta: ". $e->lastResponse . "\n";
}

$apiInstance = new \mx\wire4\client\api\ComprobanteElectrnicoDePagoCEPApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$body = new \mx\wire4\client\model\CepSearchBanxico(); // \mx\wire4\client\model\CepSearchBanxico | Información para buscar un CEP

try {
    $result = $apiInstance->obtainTransactionCepUsingPOST($body,$accessToken);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ComprobanteElectrnicoDePagoCEPApi->obtainTransactionCepUsingPOST: ', $e->getMessage(), PHP_EOL;
}
?>