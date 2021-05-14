# Deposit

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**amount** | **float** | Es el monto de la transferencia. | [optional] 
**beneficiary_account** | **string** | Es la cuenta del beneficiario. | [optional] 
**beneficiary_name** | **string** | Es el nombre del beneficiario. | [optional] 
**beneficiary_rfc** | **string** | Es el Registro Federal de Contribuyentes (RFC) del beneficiario. | [optional] 
**cep** | [**\mx\wire4\client\model\MessageCEP**](MessageCEP.md) |  | [optional] 
**clave_rastreo** | **string** | Es la clave de rastreo de la transferencia. | [optional] 
**confirm_date** | [**\DateTime**](\DateTime.md) | Es la fecha de confirmación del deposito. Ésta fecha viene en formato ISO 8601 con zona horaria, ejemplo: &lt;strong&gt;2020-10-27T11:03:15.000-06:00&lt;/strong&gt;. | [optional] 
**currency_code** | **string** | Es el código de divisa de la transferencia. Es en el formato estándar de 3 dígitos, por ejemplo para el peso mexicano: &lt;b&gt;MXP&lt;/b&gt;, para el dólar estadounidense: &lt;b&gt;USD&lt;/b&gt;. | [optional] 
**deposit_date** | [**\DateTime**](\DateTime.md) | Es la fecha del deposito.  Ésta fecha viene en formato ISO 8601 con zona horaria, ejemplo: &lt;strong&gt;2020-10-27T11:03:15.000-06:00&lt;/strong&gt;. | [optional] 
**depositant** | **string** | Es el depositante. | [optional] 
**depositant_alias** | **string** | Es el alias asignado a la cuenta CABLE del depositante. | [optional] 
**depositant_clabe** | **string** | Es la Cuenta CLABE interbancaria (de 18 dígitos) del depositante. | [optional] 
**depositant_email** | **string** | Es el correo electrónico (email) del depositante. | [optional] 
**depositant_rfc** | **string** | Es el Registro Federal de Contribuyentes (RFC) del depositante. | [optional] 
**description** | **string** | Es la descripción del traspaso. | [optional] 
**monex_description** | **string** | Es la descripción directa de Monex. | [optional] 
**monex_transaction_id** | **string** | es el identificador de la transferencia en Monex. | [optional] 
**reference** | **string** | Es la referencia del depósito. | [optional] 
**sender_account** | **string** | Es la cuenta del ordenante. | [optional] 
**sender_bank** | [**\mx\wire4\client\model\MessageInstitution**](MessageInstitution.md) |  | [optional] 
**sender_name** | **string** | Es el nombre del ordenante. | [optional] 
**sender_rfc** | **string** | Es el Registro Federal de Contribuyentes (RFC) de la cuenta ordenante. | [optional] 

[[Back to Model list]](../../README.md#documentation-for-models) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to README]](../../README.md)

