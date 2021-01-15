# CodiCodeQrResponseDTO

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**amount** | **float** | Es el monto del pago CODI®. | [optional] 
**barcode_base64** | **string** | El código QR en su represantación base 64. | [optional] 
**barcode_url** | **string** | Es la dirección URL del código QR. | [optional] 
**concept** | **string** | Es la descripción del pago CODI®. | [optional] 
**creation_date** | [**\DateTime**](\DateTime.md) | Es la fecha de creación del código QR para pago CODI®. Ésta fecha viene en formato ISO 8601 con zona horaria, ejemplo: &lt;strong&gt;2020-10-27T11:03:15.000-06:00&lt;/strong&gt;. | [optional] 
**due_date** | [**\DateTime**](\DateTime.md) | Es la fecha de operación del pago CODI®. Ésta fecha viene en formato ISO 8601 con zona horaria, ejemplo: &lt;strong&gt;2020-10-27T11:03:15.000-06:00&lt;/strong&gt;. | [optional] 
**order_id** | **string** | Es la referencia de la transferencia asignada por el cliente. | [optional] 
**phone_number** | **string** | Es el Número de teléfono móvil en caso de ser un pago CODI® usando \&quot;PUSH_NOTIFICATION\&quot;. | [optional] 
**status** | **string** | El estado del código QR para pago CODI®. | [optional] 
**type** | **string** | Es el tipo de código QR para pago con CODI®. | [optional] 

[[Back to Model list]](../../README.md#documentation-for-models) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to README]](../../README.md)

