# mx\wire4\DepositantesApi

All URIs are relative to *https://sandbox-api.wire4.mx/wire4/1.0.0*

Method | HTTP request | Description
------------- | ------------- | -------------
[**getDepositantsUsingGET**](DepositantesApi.md#getdepositantsusingget) | **GET** /subscriptions/{subscription}/depositants | Consulta de cuentas de depositantes
[**registerDepositantsUsingPOST**](DepositantesApi.md#registerdepositantsusingpost) | **POST** /subscriptions/{subscription}/depositants | Registra un nuevo depositante

# **getDepositantsUsingGET**
> \mx\wire4\client\model\GetDepositants getDepositantsUsingGET($subscription)

Consulta de cuentas de depositantes

Obtiene una lista de depositantes asociados al contrato relacionado a la subscripción.

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

        // Obtain an access token use application flow and scope "general"
        $accessToken = $oauth->obtainAccessTokenAppUser(Wire4ApiTest::USER_KEY, //REPLACE THIS WITH YOUR DATA
            Wire4ApiTest::SECRET_KEY, //REPLACE THIS WITH YOUR DATA
            "spei_admin");

    } catch(OAuthException $e) {
        echo "Respuesta: ". $e->lastResponse . "\n";
    }

    // Configure OAuth2 access token for authorization: wire4_aut_app_user_spei
    $config = mx\wire4\Configuration::getDefaultConfiguration()->setAccessToken($accessToken);

    $apiInstance = new mx\wire4\client\api\DepositantesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
        new GuzzleHttp\Client(),
        $config
    );
    $subscription = Wire4ApiTest::SUBSCRIPTION; // string | El identificador de la suscripción a esta API

    try {
        $result = $apiInstance->getDepositantsUsingGET($subscription);
        print_r($result);
    } catch (Exception $e) {
        echo 'Exception when calling DepositantesApi->getDepositantsUsingGET: ', $e->getMessage(), PHP_EOL;
    }
    
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **subscription** | **string**| El identificador de la suscripción a esta API |

### Return type

[**\mx\wire4\client\model\GetDepositants**](../Model/GetDepositants.md)

### Authorization

[wire4_aut_app_user_spei](../../README.md#wire4_aut_app_user_spei)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **registerDepositantsUsingPOST**
> \mx\wire4\client\model\DepositantsResponse registerDepositantsUsingPOST($body, $subscription)

Registra un nuevo depositante

Registra un nuevo depositante en el contrato asociado a la subscripción.

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

    $apiInstance = new mx\wire4\client\api\DepositantesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
        new GuzzleHttp\Client(),
        $config
    );
    $body = new \mx\wire4\client\model\DepositantsRegister(); // \mx\wire4\client\model\DepositantsRegister | Depositant info


    $body->setAlias("Depositant 0292920");
    $body->setCurrencyCode("MXP");
    $body->setEmail(array("depositant@wire4.mx"));
    $body->setName("Marge Bouvier");

    $subscription = Wire4ApiTest::SUBSCRIPTION; // string | El identificador de la suscripción a esta API

    try {
        $result = $apiInstance->registerDepositantsUsingPOST($body, $subscription);
        print_r($result);
    } catch (Exception $e) {
        echo 'Exception when calling DepositantesApi->registerDepositantsUsingPOST: ', $e->getMessage(), PHP_EOL;
    }
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\mx\wire4\client\model\DepositantsRegister**](../Model/DepositantsRegister.md)| Depositant info |
 **subscription** | **string**| El identificador de la suscripción a esta API |

### Return type

[**\mx\wire4\client\model\DepositantsResponse**](../Model/DepositantsResponse.md)

### Authorization

[wire4_aut_app_user_spei](../../README.md#wire4_aut_app_user_spei)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

