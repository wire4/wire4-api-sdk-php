# mx\wire4\InstitucionesApi

All URIs are relative to *https://sandbox-api.wire4.mx/wire4/1.0.0*

Method | HTTP request | Description
------------- | ------------- | -------------
[**getAllInstitutionsUsingGET**](InstitucionesApi.md#getallinstitutionsusingget) | **GET** /institutions | Información de instituciones bancarias.

# **getAllInstitutionsUsingGET**
> \mx\wire4\client\model\InstitutionsList getAllInstitutionsUsingGET()

Información de instituciones bancarias.

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
        $accessToken= $oauth->obtainAccessTokenApp("general");

    } catch(OAuthException $e) {
        echo "Respuesta: ". $e->lastResponse . "\n";
    }

    // Configure OAuth2 access token for authorization: wire4_aut_app
    $config = mx\wire4\Configuration::getDefaultConfiguration()->setAccessToken($accessToken);

    $apiInstance = new mx\wire4\client\api\InstitucionesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
        new GuzzleHttp\Client(),
        $config
    );

    try {
        $result = $apiInstance->getAllInstitutionsUsingGET();
        print_r($result);
    } catch (Exception $e) {
        echo 'Exception when calling InstitucionesApi->getAllInstitutionsUsingGET: ', $e->getMessage(), PHP_EOL;
    }
   
?>
```

### Parameters
This endpoint does not need any parameter.

### Return type

[**\mx\wire4\client\model\InstitutionsList**](../Model/InstitutionsList.md)

### Authorization

[wire4_aut_app](../../README.md#wire4_aut_app)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

