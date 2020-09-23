# mx\wire4\EmpresasCoDiApi

All URIs are relative to *https://sandbox-api.wire4.mx/wire4/1.0.0*

Method | HTTP request | Description
------------- | ------------- | -------------
[**obtainCompanies**](EmpresasCoDiApi.md#obtaincompanies) | **GET** /codi/companies | Consulta de empresas CODI
[**registerCompanyUsingPOST**](EmpresasCoDiApi.md#registercompanyusingpost) | **POST** /codi/companies | Registro de empresas CODI

# **obtainCompanies**
> \mx\wire4\client\model\CompanyRegistered[] obtainCompanies($authorization)

Consulta de empresas CODI

Consulta de empresas CODI registradas para la aplicación.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new mx\wire4\client\api\EmpresasCoDiApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$authorization = "authorization_example"; // string | Header para token

try {
    $result = $apiInstance->obtainCompanies($authorization);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling EmpresasCoDiApi->obtainCompanies: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **authorization** | **string**| Header para token |

### Return type

[**\mx\wire4\client\model\CompanyRegistered[]**](../Model/CompanyRegistered.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **registerCompanyUsingPOST**
> \mx\wire4\client\model\CompanyRegistered registerCompanyUsingPOST($body, $authorization)

Registro de empresas CODI

Registra una empresa para hacer uso de operaciones CODI. Es requerido tener el certificado emitido por BANXICO® asi como el Nombre de la empresa, Nombre comercial y RFC de la empresa.<br/>

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new mx\wire4\client\api\EmpresasCoDiApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$body = new \mx\wire4\client\model\CompanyRequested(); // \mx\wire4\client\model\CompanyRequested | Información de la cuenta del beneficiario
$authorization = "authorization_example"; // string | Header para token

try {
    $result = $apiInstance->registerCompanyUsingPOST($body, $authorization);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling EmpresasCoDiApi->registerCompanyUsingPOST: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\mx\wire4\client\model\CompanyRequested**](../Model/CompanyRequested.md)| Información de la cuenta del beneficiario |
 **authorization** | **string**| Header para token |

### Return type

[**\mx\wire4\client\model\CompanyRegistered**](../Model/CompanyRegistered.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

