# PaymentsSpeiAndSpidRequestId

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**authorization_date** | [**\DateTime**](\DateTime.md) | Fecha en que el usuario propietario del token emitió la autorización | [optional] 
**request_date** | [**\DateTime**](\DateTime.md) | Fecha en que se realizó la petición de registro de transacciones | [optional] 
**request_id** | **string** | Identificador de la petición del registro de transacciones | [optional] 
**spei** | [**\mx\wire4\client\model\Payment[]**](Payment.md) | Lista de las transacciones spei registradas | [optional] 
**spid** | [**\mx\wire4\client\model\Payment[]**](Payment.md) | Lista de las transacciones spid registradas | [optional] 

[[Back to Model list]](../../README.md#documentation-for-models) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to README]](../../README.md)

