# PaymentRequestCodiResponseDTO

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**amount** | **float** | Es el Monto del pago. Ejemplo 1000.00 | [optional] 
**barcode_base64** | **string** | Es la imagen QR en formato Base64 para el CODI®. | [optional] 
**barcode_url** | **string** | Es la dirección URL de la imagen QR para el CODI®. | [optional] 
**concept** | **string** | Es el concepto de pago. | [optional] 
**creation_date** | [**\DateTime**](\DateTime.md) | Es la fecha de creación. Ésta fecha viene en formato ISO 8601 con zona horaria, ejemplo: &lt;strong&gt;2020-10-27T11:03:15.000-06:00&lt;/strong&gt;. | [optional] 
**due_date** | [**\DateTime**](\DateTime.md) | Es la fecha de vencimiento. Ésta fecha viene en formato ISO 8601 con zona horaria, ejemplo: &lt;strong&gt;2020-10-27T11:03:15.000-06:00&lt;/strong&gt;. | [optional] 
**operations** | [**\mx\wire4\client\model\CodiOperationResponseDTO[]**](CodiOperationResponseDTO.md) | Es el listado de pagos realizados sobre la petición. | [optional] 
**order_id** | **string** | Es el orderId asignado a la solicitud. | [optional] 
**phone_number** | **string** | Es el número de teléfono. | [optional] 
**status** | **string** | Es el estado (estatus) de la orden de pago. Los valores pueden ser: &lt;b&gt;RECEIVED, COMPLETED Y CANCELLED&lt;/b&gt; | [optional] 
**type** | **string** | Es el tipo de petición. Los valores pueden ser: &lt;b&gt;QR_CODE o PUSH_NOTIFICATION&lt;/b&gt; | [optional] 

[[Back to Model list]](../../README.md#documentation-for-models) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to README]](../../README.md)

