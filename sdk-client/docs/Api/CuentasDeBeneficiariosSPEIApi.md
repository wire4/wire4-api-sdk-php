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
> deleteAccountUsingDELETE($authorization, $account, $subscription)

Elimina la cuenta del beneficiario

Borra la cuenta de beneficiario proporcionada relacionada al contrato perteneciente a la subscripción. La cuenta a borrar debe ser una cuenta que opere con SPEI.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new mx\wire4\client\api\CuentasDeBeneficiariosSPEIApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$authorization = "authorization_example"; // string | Header para token
$account = "account_example"; // string | La cuenta del beneciario que será eliminada
$subscription = "subscription_example"; // string | El identificador de la suscripción a esta API

try {
    $apiInstance->deleteAccountUsingDELETE($authorization, $account, $subscription);
} catch (Exception $e) {
    echo 'Exception when calling CuentasDeBeneficiariosSPEIApi->deleteAccountUsingDELETE: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **authorization** | **string**| Header para token |
 **account** | **string**| La cuenta del beneciario que será eliminada |
 **subscription** | **string**| El identificador de la suscripción a esta API |

### Return type

void (empty response body)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getAvailableRelationshipsMonexUsingGET**
> \mx\wire4\client\model\RelationshipsResponse getAvailableRelationshipsMonexUsingGET($authorization, $subscription)

Consulta de relaciones

Obtiene las posibles relaciones existentes para registrar beneficiarios en Monex. Se debe invocar este recurso antes de pre-registrar una cuenta de beneficiario.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new mx\wire4\client\api\CuentasDeBeneficiariosSPEIApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$authorization = "authorization_example"; // string | Header para token
$subscription = "subscription_example"; // string | Identificador de la suscripción a esta API

try {
    $result = $apiInstance->getAvailableRelationshipsMonexUsingGET($authorization, $subscription);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CuentasDeBeneficiariosSPEIApi->getAvailableRelationshipsMonexUsingGET: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **authorization** | **string**| Header para token |
 **subscription** | **string**| Identificador de la suscripción a esta API |

### Return type

[**\mx\wire4\client\model\RelationshipsResponse**](../Model/RelationshipsResponse.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getBeneficiariesForAccountUsingGET**
> \mx\wire4\client\model\BeneficiariesResponse getBeneficiariesForAccountUsingGET($authorization, $subscription, $account, $rfc)

Consulta los beneficiarios registrados

Obtiene los beneficiarios registrados al contrato relacionado con la suscripción, Los beneficiarios son los que actualmente se encuentran registrados en banca Monex.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new mx\wire4\client\api\CuentasDeBeneficiariosSPEIApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$authorization = "authorization_example"; // string | Header para token
$subscription = "subscription_example"; // string | El identificador de la suscripción a esta API
$account = "account_example"; // string | Cuenta del beneficiario, puede ser Clabe, TDD o Celular
$rfc = "rfc_example"; // string | RFC del beneficiario

try {
    $result = $apiInstance->getBeneficiariesForAccountUsingGET($authorization, $subscription, $account, $rfc);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CuentasDeBeneficiariosSPEIApi->getBeneficiariesForAccountUsingGET: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **authorization** | **string**| Header para token |
 **subscription** | **string**| El identificador de la suscripción a esta API |
 **account** | **string**| Cuenta del beneficiario, puede ser Clabe, TDD o Celular | [optional]
 **rfc** | **string**| RFC del beneficiario | [optional]

### Return type

[**\mx\wire4\client\model\BeneficiariesResponse**](../Model/BeneficiariesResponse.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **preRegisterAccountsUsingPOST**
> \mx\wire4\client\model\TokenRequiredResponse preRegisterAccountsUsingPOST($body, $authorization, $subscription)

Pre-registro de cuentas de beneficiarios.

Pre-registra una o más cuentas de beneficiario en la plataforma, proporcionando una URL donde el cuentahabiente Monex debe ingresar un valor de su llave digital para confirmar el alta de las cuentas de beneficiarios.<br/>Los posibles valores de <i>relationship</i> y <i>kind_of_relationship</i> se deben  obtener de /subscriptions/{subscription}/beneficiaries/relationships.<br/><br/>La confirmación de registro en Monex se realiza a través de una llamada a los webhooks registrados con el evento ACCOUNT.CREATED.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new mx\wire4\client\api\CuentasDeBeneficiariosSPEIApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$body = new \mx\wire4\client\model\AccountRequest(); // \mx\wire4\client\model\AccountRequest | Información de la cuenta del beneficiario
$authorization = "authorization_example"; // string | Header para token
$subscription = "subscription_example"; // string | El identificador de la suscripción a esta API

try {
    $result = $apiInstance->preRegisterAccountsUsingPOST($body, $authorization, $subscription);
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
 **authorization** | **string**| Header para token |
 **subscription** | **string**| El identificador de la suscripción a esta API |

### Return type

[**\mx\wire4\client\model\TokenRequiredResponse**](../Model/TokenRequiredResponse.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **removeBeneficiariesPendingUsingDELETE**
> removeBeneficiariesPendingUsingDELETE($authorization, $request_id, $subscription)

Eliminación de beneficiarios SPEI® sin confirmar

Elimina un conjunto de beneficiarios a registrar en la cuenta del cliente Monex relacionada a la suscripción, los beneficiarios no deben haber sido confirmados por el cliente.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new mx\wire4\client\api\CuentasDeBeneficiariosSPEIApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$authorization = "authorization_example"; // string | Header para token
$request_id = "request_id_example"; // string | Identificador de los beneficiarios a eliminar
$subscription = "subscription_example"; // string | El identificador de la suscripción a esta API

try {
    $apiInstance->removeBeneficiariesPendingUsingDELETE($authorization, $request_id, $subscription);
} catch (Exception $e) {
    echo 'Exception when calling CuentasDeBeneficiariosSPEIApi->removeBeneficiariesPendingUsingDELETE: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **authorization** | **string**| Header para token |
 **request_id** | **string**| Identificador de los beneficiarios a eliminar |
 **subscription** | **string**| El identificador de la suscripción a esta API |

### Return type

void (empty response body)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **updateAmountLimitAccountUsingPUT**
> updateAmountLimitAccountUsingPUT($body, $authorization, $account, $subscription)

Actualiza el monto límite

Actualiza el monto límite a la cuenta de beneficiario proporcionada relacionada al contrato perteneciente a la subscripción.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new mx\wire4\client\api\CuentasDeBeneficiariosSPEIApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$body = new \mx\wire4\client\model\AmountRequest(); // \mx\wire4\client\model\AmountRequest | Información de la cuenta y el monto límite a actualizar
$authorization = "authorization_example"; // string | Header para token
$account = "account_example"; // string | Cuenta a actualizar
$subscription = "subscription_example"; // string | El identificador de la suscripción a esta API

try {
    $apiInstance->updateAmountLimitAccountUsingPUT($body, $authorization, $account, $subscription);
} catch (Exception $e) {
    echo 'Exception when calling CuentasDeBeneficiariosSPEIApi->updateAmountLimitAccountUsingPUT: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\mx\wire4\client\model\AmountRequest**](../Model/AmountRequest.md)| Información de la cuenta y el monto límite a actualizar |
 **authorization** | **string**| Header para token |
 **account** | **string**| Cuenta a actualizar |
 **subscription** | **string**| El identificador de la suscripción a esta API |

### Return type

void (empty response body)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

