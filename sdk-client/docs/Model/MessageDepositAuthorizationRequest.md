# MessageDepositAuthorizationRequest

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**amount** | **float** | Es el monto de la transferencia. | [optional] 
**beneficiary_account** | **string** | Es la cuenta del beneficiario. | [optional] 
**beneficiary_name** | **string** | Es el nombre del beneficiario. | [optional] 
**beneficiary_rfc** | **string** | Es el Registro Federal de Contribuyentes (RFC) del beneficiario. | [optional] 
**clave_rastreo** | **string** | Es la clave de rastreo de la transferencia. | [optional] 
**confirm_date** | [**\DateTime**](\DateTime.md) | Es la Fecha de confirmación de la transferencia. | [optional] 
**currency_code** | **string** | Es el código de divisa de la transferencia. Es en el formato estándar ISO 4217 y es de 3 dígitos. Puede ser \&quot;MXN\&quot; o \&quot;USD\&quot;. | [optional] 
**deposit_date** | [**\DateTime**](\DateTime.md) | Es la fecha de recepción de la transferencia. | [optional] 
**depositant** | **string** | Es el nombre del depositante en caso de que la transferencia se reciba en una cuenta de depositante. | [optional] 
**depositant_clabe** | **string** | Es la cuenta CLABE del depositante en caso que la transferencia se reciba en una cuenta de depositante | [optional] 
**depositant_email** | **string** | Es el Correo electrónico (email) del depositante en caso que la transferencia se reciba en una cuenta de depositante | [optional] 
**depositant_rfc** | **string** | Es el Registro Federal de Contribuyentes (RFC) del depositante, en caso que la transferencia se reciba en una cuenta de depositante. | [optional] 
**description** | **string** | Es el concepto de la transferencia. | [optional] 
**monex_description** | **string** | Es la descripción de Monex para la transferencia. | [optional] 
**monex_transaction_id** | **string** | Es el identificador asignado por Monex a la transferencia. | [optional] 
**reference** | **string** | Es la referecia de la transferencia. | [optional] 
**sender_account** | **string** | Es la cuenta del ordenante que podría ser un número celular (10 dígitos), una tarjeta de débito (TDD, de 16 dígitos) o Cuenta CLABE interbancaria (18 dígitos). | [optional] 
**sender_bank** | [**\mx\wire4\client\model\MessageInstitution**](MessageInstitution.md) |  | [optional] 
**sender_name** | **string** | Es el nombre del ordenante. | [optional] 
**sender_rfc** | **string** | Es el Registro Federal de Contribuyente (RFC) del ordenante. | [optional] 

[[Back to Model list]](../../README.md#documentation-for-models) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to README]](../../README.md)

