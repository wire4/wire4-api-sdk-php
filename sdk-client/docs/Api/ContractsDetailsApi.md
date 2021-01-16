# mx\wire4\ContractsDetailsApi

All URIs are relative to *https://sandbox-api.wire4.mx/wire4/1.0.0*

Method | HTTP request | Description
------------- | ------------- | -------------
[**createAuthorization**](ContractsDetailsApi.md#createauthorization) | **POST** /onboarding/accounts/authorize | Devuelve la URL para autorización del usuario Monex
[**obtainAuthorizedUsers**](ContractsDetailsApi.md#obtainauthorizedusers) | **GET** /onboarding/accounts/{requestId}/authorized-users | Obtiene los usuarios autorizados
[**obtainAuthorizedUsersByContract**](ContractsDetailsApi.md#obtainauthorizedusersbycontract) | **GET** /onboarding/accounts/authorized-users | Obtiene los usuarios autorizados por contrato
[**obtainContractDetails**](ContractsDetailsApi.md#obtaincontractdetails) | **POST** /onboarding/accounts/details | Obtiene los detalles de la empresa del contrato

# **createAuthorization**
> \mx\wire4\client\model\TokenRequiredResponse createAuthorization($body, $authorization)

Devuelve la URL para autorización del usuario Monex

Se obtiene la URL para la autorización del usuario Monex.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new mx\wire4\client\api\ContractsDetailsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$body = new \mx\wire4\client\model\PreMonexAuthorization(); // \mx\wire4\client\model\PreMonexAuthorization | Información para la autorización
$authorization = "authorization_example"; // string | Header para token

try {
    $result = $apiInstance->createAuthorization($body, $authorization);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ContractsDetailsApi->createAuthorization: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\mx\wire4\client\model\PreMonexAuthorization**](../Model/PreMonexAuthorization.md)| Información para la autorización |
 **authorization** | **string**| Header para token |

### Return type

[**\mx\wire4\client\model\TokenRequiredResponse**](../Model/TokenRequiredResponse.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **obtainAuthorizedUsers**
> \mx\wire4\client\model\AuthorizedUsers[] obtainAuthorizedUsers($authorization, $x_access_key, $request_id)

Obtiene los usuarios autorizados

Obtienen los detalles de los usuarios autorizados de Monex.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new mx\wire4\client\api\ContractsDetailsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$authorization = "authorization_example"; // string | Header para token
$x_access_key = "x_access_key_example"; // string | La llave de acceso de la aplicación
$request_id = "request_id_example"; // string | El identificador de la petición a esta API

try {
    $result = $apiInstance->obtainAuthorizedUsers($authorization, $x_access_key, $request_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ContractsDetailsApi->obtainAuthorizedUsers: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **authorization** | **string**| Header para token |
 **x_access_key** | **string**| La llave de acceso de la aplicación |
 **request_id** | **string**| El identificador de la petición a esta API |

### Return type

[**\mx\wire4\client\model\AuthorizedUsers[]**](../Model/AuthorizedUsers.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **obtainAuthorizedUsersByContract**
> \mx\wire4\client\model\AuthorizedUsers[] obtainAuthorizedUsersByContract($authorization, $x_access_key, $contract)

Obtiene los usuarios autorizados por contrato

Obtienen los detalles de los usuarios autorizados por contrato Monex.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new mx\wire4\client\api\ContractsDetailsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$authorization = "authorization_example"; // string | Header para token
$x_access_key = "x_access_key_example"; // string | La llave de acceso de la aplicación
$contract = "contract_example"; // string | El contrato Monex

try {
    $result = $apiInstance->obtainAuthorizedUsersByContract($authorization, $x_access_key, $contract);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ContractsDetailsApi->obtainAuthorizedUsersByContract: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **authorization** | **string**| Header para token |
 **x_access_key** | **string**| La llave de acceso de la aplicación |
 **contract** | **string**| El contrato Monex | [optional]

### Return type

[**\mx\wire4\client\model\AuthorizedUsers[]**](../Model/AuthorizedUsers.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **obtainContractDetails**
> \mx\wire4\client\model\ContractDetailResponse obtainContractDetails($body, $authorization, $x_access_key)

Obtiene los detalles de la empresa del contrato

Detalles de la compañía relacionada con el contrato de Monex.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new mx\wire4\client\api\ContractsDetailsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$body = new \mx\wire4\client\model\ContractDetailRequest(); // \mx\wire4\client\model\ContractDetailRequest | Información para obtener los detalles de la companía
$authorization = "authorization_example"; // string | Header para token
$x_access_key = "x_access_key_example"; // string | La llave de acceso de la aplicación

try {
    $result = $apiInstance->obtainContractDetails($body, $authorization, $x_access_key);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ContractsDetailsApi->obtainContractDetails: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\mx\wire4\client\model\ContractDetailRequest**](../Model/ContractDetailRequest.md)| Información para obtener los detalles de la companía |
 **authorization** | **string**| Header para token |
 **x_access_key** | **string**| La llave de acceso de la aplicación |

### Return type

[**\mx\wire4\client\model\ContractDetailResponse**](../Model/ContractDetailResponse.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

