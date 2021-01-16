# MessagePaymentStatePending

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**account** | **string** | Es la cuenta del ordenante. | [optional] 
**amount** | **float** | Es el monto de la transferencia. | [optional] 
**beneficiary_account** | **string** | Es la cuenta del beneficiario. | [optional] 
**beneficiary_bank** | [**\mx\wire4\client\model\MessageInstitution**](MessageInstitution.md) |  | [optional] 
**beneficiary_name** | **string** | Es el nombre del beneficiario. | [optional] 
**concept** | **string** | Es el concepto de la transferencia de salida. | [optional] 
**currency_code** | **string** | Código de divisa de la transferencia de salida. Es en el formato estándar ISO 4217 y es de 3 dígitos. Ejemplo: \&quot;MXN\&quot;. | [optional] 
**detention_message** | **string** | Es el Mensaje de detención de Monex, indica la causa por la cuál esta detenida la operación en Monex. | [optional] 
**error_message** | **string** | Es el mensaje de error. | [optional] 
**order_id** | **string** | El identificador de la transferencia de salida. | [optional] 
**payment_order_id** | **int** | Es el identificador de la orden de pago de Monex de la transferencia de salida. | [optional] 
**pending_reason** | **string** | Es el esaado que identifica la causa por la que la transferencia se ecuentra detenida o  pendiente de procesarse. Los posibles estados son: &lt;ul&gt;&lt;li&gt;FI&#x3D;Fondos Insuficientes&lt;/li&gt;&lt;li&gt;FM&#x3D;Firma mancomunada, en espera de ingreso de segundo token de autorización&lt;/li&gt;&lt;li&gt;DP&#x3D;Se detecto una transferencia duplicada que esta en wspera de confirmación o de eliminación&lt;/li&gt;&lt;/ul&gt; | [optional] 
**reference** | **int** | Es la referecia de la transferencia. | [optional] 
**request_id** | **string** | Es el identificador, en esta API, de la petición de envío de la transferencia de salida. | [optional] 
**status_code** | **string** | Es el estado (estatus) de la transferencia de salida. Deberá ser \&quot;PENDING\&quot;. | [optional] 
**transaction_id** | **int** | Es el identificador de Monex de la transferencia de salida, podría no estar presente por lo que Usted debería hacer referencias mediate el paymentOrderID. | [optional] 

[[Back to Model list]](../../README.md#documentation-for-models) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to README]](../../README.md)

