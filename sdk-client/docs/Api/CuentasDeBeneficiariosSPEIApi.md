# mx\wire4\CuentasDeBeneficiariosSPEIApi

All URIs are relative to *https://sandbox-api.wire4.mx/wire4/1.0.0*

Method | HTTP request | Description
------------- | ------------- | -------------
[**deleteAccountUsingDELETE**](CuentasDeBeneficiariosSPEIApi.md#deleteaccountusingdelete) | **DELETE** /subscriptions/{subscription}/beneficiaries/spei/{account} | Elimina la cuenta del beneficiario
[**getAvailableRelationshipsMonexUsingGET**](CuentasDeBeneficiariosSPEIApi.md#getavailablerelationshipsmonexusingget) | **GET** /subscriptions/{subscription}/beneficiaries/relationships | Consulta de relaciones
[**getBeneficiariesForAccountUsingGET**](CuentasDeBeneficiariosSPEIApi.md#getbeneficiariesforaccountusingget) | **GET** /subscriptions/{subscription}/beneficiaries/spei | Consulta los beneficiarios registrados
[**preRegisterAccountsUsingPOST**](CuentasDeBeneficiariosSPEIApi.md#preregisteraccountsusingpost) | **POST** /subscriptions/{subscription}/beneficiaries/spei | Pre-registro de cuentas de beneficiarios.
[**removeBeneficiariesPendingUsingDELETE**](CuentasDeBeneficiariosSPEIApi.md#removebeneficiariespendingusingdelete) | **DELETE** /subscriptions/{subscription}/beneficiaries/spei/request/{requestId} | Eliminación de beneficiarios SPEI® sin confirmar
[**updateAmountLimitAccountUsingPUT**](CuentasDeBeneficiariosSPEIApi.md#updateamountlimitaccountusingput) | **PUT** /subscriptions/{subscription}/beneficiaries/spei/{account} | Actualiza el monto límite

# **deleteAccountUsingDELETE**
> deleteAccountUsingDELETE($account, $subscription)

Elimina la cuenta del beneficiario

Borra la cuenta de beneficiario proporcionada relacionada al contrato perteneciente a la subscripción. La cuenta a borrar debe ser una cuenta que opere con SPEI.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

    try {

        // Create the authenticator to obtain access token
    
        $oauth = new mx\wire4\OAuthWire4(
            Wire4ApiTest::OAUTH_CONSUMER_KEY, //REPLACE THIS WITH YOUR CONSUMER_KEY
            Wire4ApiTest::OAUTH_CONSUMER_SECRET, //REPLACE THIS WITH YOUR CONSUMER_SECRET
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
    
    $apiInstance = new mx\wire4\client\api\CuentasDeBeneficiariosSPEIApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
        new GuzzleHttp\Client(),
        $config
    );
    $account = "112680000156896531"; // string | La cuenta del beneciario que será eliminada
    $subscription = Wire4ApiTest::SUBSCRIPTION; // string | El identificador de la suscripción a esta API
    
    try {
        $apiInstance->deleteAccountUsingDELETE($account, $subscription);
    } catch (Exception $e) {
        echo 'Exception when calling CuentasDeBeneficiariosSPEIApi->deleteAccountUsingDELETE: ', $e->getMessage(), PHP_EOL;
    }
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **account** | **string**| La cuenta del beneciario que será eliminada |
 **subscription** | **string**| El identificador de la suscripción a esta API |

### Return type

void (empty response body)

### Authorization

[wire4_aut_app_user_spei](../../README.md#wire4_aut_app_user_spei)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getAvailableRelationshipsMonexUsingGET**
> \mx\wire4\client\model\RelationshipsResponse getAvailableRelationshipsMonexUsingGET($subscription)

Consulta de relaciones

Obtiene las posibles relaciones existentes para registrar beneficiarios en Monex. Se debe invocar este recurso antes de pre-registrar una cuenta de beneficiario.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

    try {

        // Create the authenticator to obtain access token

        $oauth = new mx\wire4\OAuthWire4(
            Wire4ApiTest::OAUTH_CONSUMER_KEY, //REPLACE THIS WITH YOUR CONSUMER_KEY
            Wire4ApiTest::OAUTH_CONSUMER_SECRET, //REPLACE THIS WITH YOUR CONSUMER_SECRET
            \mx\wire4\Environment::SANDBOX);

        // Obtain an access token use application flow and scope "general"
        $accessToken = $oauth->obtainAccessTokenAppUser(Wire4ApiTest::USER_KEY,
            Wire4ApiTest::SECRET_KEY,"spei_admin");

    } catch(OAuthException $e) {
        echo "Respuesta: ". $e->lastResponse . "\n";
    }

    // Configure OAuth2 access token for authorization: wire4_aut_app_user_spei
    $config = mx\wire4\Configuration::getDefaultConfiguration()->setAccessToken($accessToken);

    $apiInstance = new \mx\wire4\client\api\CuentasDeBeneficiariosSPEIApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
        new GuzzleHttp\Client(),
        $config
    );

    // SUBSCRIPTION es un Identificador de la suscripción a esta API
    try {
        $result = $apiInstance->getAvailableRelationshipsMonexUsingGET(Wire4ApiTest::SUBSCRIPTION);
        print_r($result);
    } catch (Exception $e) {
        echo 'Exception when calling CuentasDeBeneficiariosSPEIApi->getAvailableRelationshipsMonexUsingGET: ', $e->getMessage(), PHP_EOL;
    }
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **subscription** | **string**| Identificador de la suscripción a esta API |

### Return type

[**\mx\wire4\client\model\RelationshipsResponse**](../Model/RelationshipsResponse.md)

### Authorization

[wire4_aut_app_user_spei](../../README.md#wire4_aut_app_user_spei)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getBeneficiariesForAccountUsingGET**
> \mx\wire4\client\model\BeneficiariesResponse getBeneficiariesForAccountUsingGET($subscription, $rfc)

Consulta los beneficiarios registrados

Obtiene los beneficiarios registrados al contrato relacionado con la suscripción, Los beneficiarios son los que actualmente se encuentran registrados en banca Monex.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

    try {

        // Create the authenticator to obtain access token

        $oauth = new mx\wire4\OAuthWire4(
            Wire4ApiTest::OAUTH_CONSUMER_KEY, //REPLACE THIS WITH YOUR CONSUMER_KEY
            Wire4ApiTest::OAUTH_CONSUMER_SECRET, //REPLACE THIS WITH YOUR CONSUMER_SECRET
            \mx\wire4\Environment::SANDBOX);

        // Obtain an access token use application flow and scope "spei_admin"
        $accessToken = $oauth->obtainAccessTokenAppUser(Wire4ApiTest::USER_KEY,//REPLACE THIS WITH YOUR DATA
            Wire4ApiTest::SECRET_KEY, //REPLACE THIS WITH YOUR DATA
            "spei_admin");

    } catch(OAuthException $e) {
        echo "Respuesta: ". $e->lastResponse . "\n";
    }

    // Configure OAuth2 access token for authorization: wire4_aut_app_user_spei
    $config = mx\wire4\Configuration::getDefaultConfiguration()->setAccessToken($accessToken);

    $apiInstance = new mx\wire4\client\api\CuentasDeBeneficiariosSPEIApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
        new GuzzleHttp\Client(),
        $config
    );
    $subscription = Wire4ApiTest::SUBSCRIPTION; // string | El identificador de la suscripción a esta API
    $rfc = ""; // string | RFC del beneficiario

    try {
        $result = $apiInstance->getBeneficiariesForAccountUsingGET($subscription, $rfc);
        print_r($result);
    } catch (Exception $e) {
        echo 'Exception when calling CuentasDeBeneficiariosSPEIApi->getBeneficiariesForAccountUsingGET: ', $e->getMessage(), PHP_EOL;
    }
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **subscription** | **string**| El identificador de la suscripción a esta API |
 **rfc** | **string**| RFC del beneficiario | [optional]

### Return type

[**\mx\wire4\client\model\BeneficiariesResponse**](../Model/BeneficiariesResponse.md)

### Authorization

[wire4_aut_app_user_spei](../../README.md#wire4_aut_app_user_spei)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **preRegisterAccountsUsingPOST**
> \mx\wire4\client\model\TokenRequiredResponse preRegisterAccountsUsingPOST($body, $subscription)

Pre-registro de cuentas de beneficiarios.

Pre-registra una o más cuentas de beneficiario en la plataforma, proporcionando una URL donde el cuentahabiente Monex debe ingresar un valor de su llave digital para confirmar el alta de las cuentas de beneficiarios.<br/>Los posibles valores de <i>relationship</i> y <i>kind_of_relationship</i> se deben  obtener de /subscriptions/{subscription}/beneficiaries/relationships.<br/><br/>La confirmación de registro en Monex se realiza a través de una llamada a los webhooks registrados con el evento ACCOUNT.CREATED.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

    try {

        // Create the authenticator to obtain access token

        $oauth = new mx\wire4\OAuthWire4(
            Wire4ApiTest::OAUTH_CONSUMER_KEY, //REPLACE THIS WITH YOUR CONSUMER_KEY
            Wire4ApiTest::OAUTH_CONSUMER_SECRET, //REPLACE THIS WITH YOUR CONSUMER_SECRET
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

    $apiInstance = new \mx\wire4\client\api\CuentasDeBeneficiariosSPEIApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
        new GuzzleHttp\Client(),
        $config
    );
    $requestDto = new \mx\wire4\client\model\AccountRequest(); // \mx\wire4\client\model\AccountRequest | Información de la cuenta del beneficiario


    $requestDto->setReturnUrl("https://your-app-url.mx/return");
    $requestDto->setCancelReturnUrl("https://your-app-url.mx/cancel");

    $account = new \mx\wire4\client\model\Account();
    $account->setAmountLimit(10000.00);
    $account->setbeneficiaryAccount("112680000156896531");

    $account->setEmail(array("beneficiary@wire4.mx"));
    $account->setKindOfRelationship("RECURRENTE");
    $account->setNumericReferenceSpei("1234567");
    $account->setPaymentConceptSpei("concept spei");

    $person = new \mx\wire4\client\model\Person();
    $person->setName("Bartolomeo");
    $person->setMiddleName("Jay");
    $person->setLastName("Simpson");
    $account->setPerson($person);

    $account->setRelationship("ACREEDOR");
    $account->setRfc("SJBA920125AB1");

    $requestDto->setAccounts(array($account));

    $subscription = Wire4ApiTest::SUBSCRIPTION; // string | El identificador de la suscripción a esta API

    try {
        $result = $apiInstance->preRegisterAccountsUsingPOST($requestDto, $subscription);
        print_r($result);
    } catch (Exception $e) {
        echo 'Exception when calling CuentasDeBeneficiariosSPEIApi->preRegisterAccountsUsingPOST: ', $e->getMessage(), PHP_EOL;
    }
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\mx\wire4\client\model\AccountRequest**](../Model/AccountRequest.md)| Información de la cuenta del beneficiario |
 **subscription** | **string**| El identificador de la suscripción a esta API |

### Return type

[**\mx\wire4\client\model\TokenRequiredResponse**](../Model/TokenRequiredResponse.md)

### Authorization

[wire4_aut_app_user_spei](../../README.md#wire4_aut_app_user_spei)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **removeBeneficiariesPendingUsingDELETE**
> removeBeneficiariesPendingUsingDELETE($request_id, $subscription)

Eliminación de beneficiarios SPEI® sin confirmar

Elimina un conjunto de beneficiarios a registrar en la cuenta del cliente Monex relacionada a la suscripción, los beneficiarios no deben haber sido confirmados por el cliente.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

    try {

        // Create the authenticator to obtain access token

        $oauth = new mx\wire4\OAuthWire4(
            Wire4ApiTest::OAUTH_CONSUMER_KEY, //REPLACE THIS WITH YOUR CONSUMER_KEY
            Wire4ApiTest::OAUTH_CONSUMER_SECRET, //REPLACE THIS WITH YOUR CONSUMER_SECRET
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

    $apiInstance = new mx\wire4\client\api\CuentasDeBeneficiariosSPEIApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
        new GuzzleHttp\Client(),
        $config
    );
    $request_id = "ac24c501-021d-4eff-8310-262119d5c5da"; // string | Identificador de los beneficiarios a eliminar
    $subscription = Wire4ApiTest::SUBSCRIPTION; // string | El identificador de la suscripción a esta API

    try {
        $apiInstance->removeBeneficiariesPendingUsingDELETE($request_id, $subscription);
    } catch (Exception $e) {
        echo 'Exception when calling CuentasDeBeneficiariosSPEIApi->removeBeneficiariesPendingUsingDELETE: ', $e->getMessage(), PHP_EOL;
    }
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **request_id** | **string**| Identificador de los beneficiarios a eliminar |
 **subscription** | **string**| El identificador de la suscripción a esta API |

### Return type

void (empty response body)

### Authorization

[wire4_aut_app_user_spei](../../README.md#wire4_aut_app_user_spei)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **updateAmountLimitAccountUsingPUT**
> updateAmountLimitAccountUsingPUT($body, $account, $subscription)

Actualiza el monto límite

Actualiza el monto límite a la cuenta de beneficiario proporcionada relacionada al contrato perteneciente a la subscripción.

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
            Wire4ApiTest::SECRET_KEY,//REPLACE THIS WITH YOUR DATA
            "spei_admin");

    } catch(OAuthException $e) {
        echo "Respuesta: ". $e->lastResponse . "\n";
    }

    // Configure OAuth2 access token for authorization: wire4_aut_app_user_spei
    $config = mx\wire4\Configuration::getDefaultConfiguration()->setAccessToken($accessToken);

    $apiInstance = new mx\wire4\client\api\CuentasDeBeneficiariosSPEIApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
        new GuzzleHttp\Client(),
        $config
    );
    $body = new \mx\wire4\client\model\AmountRequest(); // \mx\wire4\client\model\AmountRequest | Información de la cuenta y el monto límite a actualizar
    $body->setAmountLimit(80000.00);
    $body->setCurrencyCode("MXP");
    $body->setPreviousAmountLimit(10000.00);
    $account = "112680000156896531"; // string | Cuenta a actualizar
    $subscription = Wire4ApiTest::SUBSCRIPTION; // string | El identificador de la suscripción a esta API

    try {
        $apiInstance->updateAmountLimitAccountUsingPUT($body, $account, $subscription);
    } catch (Exception $e) {
        echo 'Exception when calling CuentasDeBeneficiariosSPEIApi->updateAmountLimitAccountUsingPUT: ', $e->getMessage(), PHP_EOL;
    }
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\mx\wire4\client\model\AmountRequest**](../Model/AmountRequest.md)| Información de la cuenta y el monto límite a actualizar |
 **account** | **string**| Cuenta a actualizar |
 **subscription** | **string**| El identificador de la suscripción a esta API |

### Return type

void (empty response body)

### Authorization

[wire4_aut_app_user_spei](../../README.md#wire4_aut_app_user_spei)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

