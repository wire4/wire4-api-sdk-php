# PaymentRequestCodiResponseDTO

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**amount** | **float** | Monto del pago. | [optional] 
**barcode_base64** | **string** | Imagen QR en formato Base64 para el CODI®. | [optional] 
**barcode_url** | **string** | URL de la imagen QR para el CODI®. | [optional] 
**concept** | **string** | Concepto de pago. | [optional] 
**creation_date** | [**\DateTime**](\DateTime.md) | Fecha de creación. | [optional] 
**due_date** | [**\DateTime**](\DateTime.md) | Fecha de vencimiento. | [optional] 
**id** | **string** | Identificador de la operacion. | [optional] 
**operation_date** | [**\DateTime**](\DateTime.md) | Fecha de la operacion. | [optional] 
**operations** | [**\mx\wire4\client\model\PaymentRequestCodiResponseDTO[]**](PaymentRequestCodiResponseDTO.md) | Listado de pagos realizados sobre la petición. | [optional] 
**order_id** | **string** | OrderId asignada a la solicitud. | [optional] 
**payment_type** | **string** | Tipo de pago. | [optional] 
**phone_number** | **string** | Numero de teléfono. | [optional] 
**status** | **string** | Estatus de la orden de pago. | [optional] 
**transaction_id** | **string** | Identificador de la transacción. | [optional] 
**type** | **string** | Tipo de petición. | [optional] 

[[Back to Model list]](../../README.md#documentation-for-models) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to README]](../../README.md)

