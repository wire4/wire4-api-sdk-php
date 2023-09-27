# PaymentRequestReq

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**amount** | **float** | Es el monto de la solicitud de pago | 
**cancel_return_url** | **string** | Es la dirección URL a la que se redirigirá en caso de que el usuario cancele. | [optional] 
**customer** | [**\mx\wire4\client\model\Customer**](Customer.md) |  | [optional] 
**description** | **string** | Es la descripción de la solicitud de pago. | [optional] 
**due_date** | [**\DateTime**](\DateTime.md) | Es la fecha de operación de la solicitud de pago. | [optional] 
**method** | **string** |  | 
**order_id** | **string** | Número de orden asignado por el cliente de Wire4 | 
**return_url** | **string** | Es la dirección URL a la que se redirigirá en caso de éxito. | [optional] 
**type** | **string** | Tipo de pago por paycash | [optional] 

[[Back to Model list]](../../README.md#documentation-for-models) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to README]](../../README.md)

