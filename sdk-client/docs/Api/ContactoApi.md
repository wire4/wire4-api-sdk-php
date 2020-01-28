# mx\wire4\ContactoApi

All URIs are relative to *https://sandbox-api.wire4.mx/wire4/1.0.0*

Method | HTTP request | Description
------------- | ------------- | -------------
[**sendContactUsingPOST**](ContactoApi.md#sendcontactusingpost) | **POST** /contact | Solicitud de contacto

# **sendContactUsingPOST**
> sendContactUsingPOST($body)

Solicitud de contacto

Notifica a un asesor Monex para que se ponga en contacto con un posible cliente.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

    try {

        // Create the authenticator to obtain access token

        $oauth = new mx\wire4\OAuthWire4(
            Wire4ApiTest::OAUTH_CONSUMER_KEY, //REPLACE THIS WIT YOUR CONSUMER_KEY
            Wire4ApiTest::OAUTH_CONSUMER_SECRET, //REPLACE THIS WIT YOUR CONSUMER_SECRET
            \mx\wire4\Environment::SANDBOX);

        // Obtain an access token use application flow and scope "general"
        $accessToken= $oauth->obtainAccessTokenApp("general");

    } catch(OAuthException $e) {
        echo "Respuesta: ". $e->lastResponse . "\n";
    }

    // Configure OAuth2 access token for authorization: wire4_aut_app
    $config = mx\wire4\Configuration::getDefaultConfiguration()->setAccessToken($accessToken);

    $apiInstance = new \mx\wire4\client\api\ContactoApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
        new GuzzleHttp\Client(),
        $config
    );
    $requestDto = new \mx\wire4\client\model\ContactRequest(); // \mx\wire4\client\model\ContactRequest | Información del contacto

    $requestDto->setAddress("Calle Falsa 123, Col Fantasía");
    $requestDto->setCompany("Compu Mundo Hiper Mega Red");
    $requestDto->setContactPerson("Homer J Simpson");
    $requestDto->setEmail("homer.simpson@compumundohipermegared.com");
    $requestDto->setPhoneNumber("4422102030");

    try {
        $apiInstance->sendContactUsingPOST($requestDto);
        echo "El contacto se envio satisfactoriamente";
    } catch (Exception $e) {
        echo 'Exception when calling ContactoApi->sendContactUsingPOST: ', $e->getMessage(), PHP_EOL;
    }
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\mx\wire4\client\model\ContactRequest**](../Model/ContactRequest.md)| Información del contacto |

### Return type

void (empty response body)

### Authorization

[wire4_aut_app](../../README.md#wire4_aut_app)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

