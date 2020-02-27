# BeneficiariesQueryRegisterStatus

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**authorization_date** | [**\DateTime**](\DateTime.md) | Fecha en que el usuario propietario del token autorizo el registro de beneficiarios | [optional] 
**beneficiaries** | [**\mx\wire4\client\model\AccountResponse[]**](AccountResponse.md) | Lista de beneficiarios obtenidos | [optional] 
**request_date** | [**\DateTime**](\DateTime.md) | Fecha en que se realizó la petición de registro de beneficiarios | [optional] 
**request_id** | **string** | Identificador de la petición del registro de beneficiarios | [optional] 
**status_request** | **string** | Indica sí la petición ya fue autorizada usando el token del usuario | [optional] 
**total_beneficiaries** | **int** | Total de beneficiarios enviados en la petición | [optional] 

[[Back to Model list]](../../README.md#documentation-for-models) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to README]](../../README.md)

