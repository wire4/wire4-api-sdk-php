# mx\wire4\InstitucionesApi

All URIs are relative to *https://sandbox-api.wire4.mx/wire4/1.0.0*

Method | HTTP request | Description
------------- | ------------- | -------------
[**getAllInstitutionsUsingGET**](InstitucionesApi.md#getallinstitutionsusingget) | **GET** /institutions | Información de instituciones bancarias.

# **getAllInstitutionsUsingGET**
> \mx\wire4\client\model\InstitutionsList getAllInstitutionsUsingGET($authorization)

Información de instituciones bancarias.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new mx\wire4\client\api\InstitucionesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$authorization = "authorization_example"; // string | Header para token

try {
    $result = $apiInstance->getAllInstitutionsUsingGET($authorization);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling InstitucionesApi->getAllInstitutionsUsingGET: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **authorization** | **string**| Header para token |

### Return type

[**\mx\wire4\client\model\InstitutionsList**](../Model/InstitutionsList.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

