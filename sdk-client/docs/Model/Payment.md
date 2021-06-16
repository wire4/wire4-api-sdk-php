# Payment

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**account** | **string** | Es la cuenta emisora. | [optional] 
**amount** | **float** | Es el monto de la transferencia. | [optional] 
**beneficiary_account** | **string** | Es la cuenta del beneficiario. | [optional] 
**beneficiary_bank** | [**\mx\wire4\client\model\Institution**](Institution.md) |  | [optional] 
**beneficiary_name** | **string** | Es el nombre del Beneficiario. | [optional] 
**cep** | [**\mx\wire4\client\model\MessageCEP**](MessageCEP.md) |  | [optional] 
**clave_rastreo** | **string** | Es la clave de rastreo de la transferencia. | [optional] 
**concept** | **string** | Es el concepto de pago. | [optional] 
**confirm_date** | [**\DateTime**](\DateTime.md) | Es la fecha de aplicación de la transferencia. Ésta fecha viene en formato ISO 8601 con zona horaria, ejemplo: &lt;strong&gt;2020-10-27T11:03:15.000-06:00&lt;/strong&gt;. | [optional] 
**currency_code** | **string** | Es el código de divisa de la transferencia. Es en el formato estándar de 3 dígitos. Ejemplo del peso mexicano: &lt;b&gt;MXP&lt;/b&gt;, ejemplo del dólar estadounidense: &lt;b&gt;USD&lt;/b&gt;. | [optional] 
**detention_message** | **string** | Es el mensaje proporcionado por Monex para la transferencia. | [optional] 
**error_message** | **string** | Es el mensaje de error, en caso de algún error se informará aquí. | [optional] 
**monex_description** | **string** | Es la descripción de Monex. | [optional] 
**order_id** | **string** | Es el identificador asignado por la aplciación a la transferencia. | [optional] 
**payment_order_id** | **int** | Es el identificador de la orden de pago en Monex. | [optional] 
**pending_reason** | **string** | Es la razón de porque esta pendiente aún cuando se autorizó la transferencia. | [optional] 
**reference** | **int** | Es la referencia numérica. | [optional] 
**status_code** | **string** | Es el estado de la transferencia de la transferencia, los posibles valores son: &lt;b&gt;PENDING, COMPLETED, FAILED, CANCELLED&lt;/b&gt; | [optional] 
**transaction_id** | **int** | Es el identificador de la transferencia asignado por Monex. | [optional] 

[[Back to Model list]](../../README.md#documentation-for-models) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to README]](../../README.md)

