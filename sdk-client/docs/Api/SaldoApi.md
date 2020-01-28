# mx\wire4\SaldoApi

All URIs are relative to *https://sandbox-api.wire4.mx/wire4/1.0.0*

Method | HTTP request | Description
------------- | ------------- | -------------
[**getBalanceUsingGET**](SaldoApi.md#getbalanceusingget) | **GET** /subscriptions/{subscription}/balance | Consulta los saldo de una cuenta

# **getBalanceUsingGET**
> \mx\wire4\client\model\BalanceListResponse getBalanceUsingGET($subscription)

Consulta los saldo de una cuenta

Obtiene el de las divisas que se manejen en el contrato.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

    try {

        // Create the authenticator to obtain access token

        $oauth = new mx\wire4\OAuthWire4(
            Wire4ApiTest::OAUTH_CONSUMER_KEY, //REPLACE THIS WITH YOUR DATA
            Wire4ApiTest::OAUTH_CONSUMER_SECRET, //REPLACE THIS WITH YOUR DATA
            \mx\wire4\Environment::SANDBOX);

        // Obtain an access token use application flow and scope "spei_admin"
        $accessToken = $oauth->obtainAccessTokenAppUser(Wire4ApiTest::USER_KEY, //REPLACE THIS WITH YOUR DATA
            Wire4ApiTest::SECRET_KEY, //REPLACE THIS WITH YOUR DATA
            "spei_admin");

    } catch(OAuthException $e) {
        echo "Respuesta: ". $e->lastResponse . "\n";
    }

    // Configure OAuth2 access token for authorization: wire4_aut_app_user_spei
    $config = mx\wire4\Configuration::getDefaultConfiguration()->setAccessToken($accessToken);

    $apiInstance = new mx\wire4\client\api\SaldoApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
        new GuzzleHttp\Client(),
        $config
    );
    $subscription = Wire4ApiTest::SUBSCRIPTION; // string | El identificador de la suscripción a esta API

    try {
        $result = $apiInstance->getBalanceUsingGET($subscription);
        print_r($result);
    } catch (Exception $e) {
        echo 'Exception when calling SaldoApi->getBalanceUsingGET: ', $e->getMessage(), PHP_EOL;
    }
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **subscription** | **string**| El identificador de la suscripción a esta API |

### Return type

[**\mx\wire4\client\model\BalanceListResponse**](../Model/BalanceListResponse.md)

### Authorization

[wire4_aut_app_user_spei](../../README.md#wire4_aut_app_user_spei)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

