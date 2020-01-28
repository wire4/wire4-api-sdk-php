# MessageDepositReceived

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**amount** | **float** | Monto de la transferencia | [optional] 
**beneficiary_account** | **string** | Cuenta del beneficiario | [optional] 
**beneficiary_name** | **string** | Nombre del beneficiario | [optional] 
**beneficiary_rfc** | **string** | RFC del beneficiario | [optional] 
**clave_rastreo** | **string** | Clave de rastreo de la transferencia | [optional] 
**confirm_date** | [**\DateTime**](\DateTime.md) | Fecha de confirmación de la transferencia | [optional] 
**currency_code** | **string** | Código de moneda de la transferencia, puede ser MXP, USD | [optional] 
**deposit_date** | [**\DateTime**](\DateTime.md) | Fecha de recepción de la transferencia | [optional] 
**depositant** | **string** | Nombre del depositante, en caso que la transferencia se reciba en una cuenta de depositante | [optional] 
**depositant_clabe** | **string** | CLABE del depositante, en caso que la transferencia se reciba en una cuenta de depositante | [optional] 
**depositant_email** | **string** | Correo electrónico del depositante, en caso que la transferencia se reciba en una cuenta de depositante | [optional] 
**depositant_rfc** | **string** | RFC del depositante, en caso que la transferencia se reciba en una cuenta de depositante | [optional] 
**description** | **string** | Concepto de la transferencia | [optional] 
**monex_description** | **string** | Descripción de Monex para la transferencia | [optional] 
**monex_transaction_id** | **string** | Identificador asignado por Monex a la transferencia | [optional] 
**reference** | **string** | Referecia de la transferencia | [optional] 
**sender_account** | **string** | Cuenta del ordenante, podría ser un número celular, TDD o Cuenta CLABE interbancaria | [optional] 
**sender_bank** | [**\mx\wire4\client\model\MessageInstitution**](MessageInstitution.md) |  | [optional] 
**sender_name** | **string** | Nombre del ordenante | [optional] 
**sender_rfc** | **string** | RFC del ordenante | [optional] 

[[Back to Model list]](../../README.md#documentation-for-models) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to README]](../../README.md)

