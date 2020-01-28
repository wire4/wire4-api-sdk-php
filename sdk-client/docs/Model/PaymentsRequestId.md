# PaymentsRequestId

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**authorization_date** | [**\DateTime**](\DateTime.md) | Fecha en que el usuario propietario del token emitió la autorización | [optional] 
**request_date** | [**\DateTime**](\DateTime.md) | Fecha en que se realizó la petición de registro de transacciones | [optional] 
**request_id** | **string** | Identificador de la petición del registro de transacciones | [optional] 
**total_amount** | **float** | Monto total de las transacciones registradas | [optional] 
**total_transactions** | **int** | Total de transacciones en la petición | [optional] 
**transactions** | [**\mx\wire4\client\model\Payment[]**](Payment.md) | Lista de las transacciones registradas | [optional] 

[[Back to Model list]](../../README.md#documentation-for-models) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to README]](../../README.md)

