# CodiCodeRequestDTO

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**amount** | **float** | Monto del pago CODI® | [optional] 
**beneficiary2** | [**\mx\wire4\client\model\BeneficiaryDTO**](BeneficiaryDTO.md) |  | [optional] 
**concept** | **string** | Descripción del pago CODI®, no debe contener letras con acentos ni caracteres especiales | 
**due_date** | [**\DateTime**](\DateTime.md) | Fecha de operación pago CODI®, formato: yyyy-MM-dd&#x27;T&#x27;HH:mm:ss | [optional] 
**metadata** | **string** | Campo de metada CODI®, longitud máxima determinada por configuracion de la empresa, por defecto 100 caracteres | [optional] 
**order_id** | **string** | Referencia de la transferencia asignada por el cliente | 
**payment_type** | **string** | El tipo de pago ya sea en una ocasión (ONE_OCCASION) o recurrente (RECURRENT) | 
**phone_number** | **string** | Número de teléfono móvil en caso de ser un pago CODI® usando &#x27;PUSH_NOTIFICATION&#x27; estecampo sería obligatorio | [optional] 
**reference** | **int** | Referencia numérica del pago CODI®. Debe ser de 7 dígitos | 
**type** | **string** | El tipo de solicitud QR o PUSH para pago con CODI® | 

[[Back to Model list]](../../README.md#documentation-for-models) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to README]](../../README.md)

