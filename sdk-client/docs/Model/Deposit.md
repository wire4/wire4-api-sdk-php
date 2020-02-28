# Deposit

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**amount** | **float** | Monto de la transferencia | [optional] 
**beneficiary_account** | **string** | La cuenta del beneficiario | [optional] 
**beneficiary_name** | **string** | El nombre del beneficiario | [optional] 
**beneficiary_rfc** | **string** | El RFC del beneficiario | [optional] 
**cep** | [**\mx\wire4\client\model\MessageCEP**](MessageCEP.md) |  | [optional] 
**clave_rastreo** | **string** | La clave de rastreo de la transferencia | [optional] 
**confirm_date** | [**\DateTime**](\DateTime.md) | Fecha de confirmación del deposito | [optional] 
**currency_code** | **string** | Código de moneda de la transferencia | [optional] 
**deposit_date** | [**\DateTime**](\DateTime.md) | Fecha del deposito | [optional] 
**depositant** | **string** | Depositante | [optional] 
**depositant_clabe** | **string** | Cuenta CLABE interbancaria del depositante | [optional] 
**depositant_email** | **string** | Email del depositante | [optional] 
**depositant_rfc** | **string** | RFC del depositante | [optional] 
**description** | **string** | Descripción del traspaso | [optional] 
**monex_description** | **string** | Descripción directa de Monex | [optional] 
**monex_transaction_id** | **string** | Identificador de la transferencia en Monex | [optional] 
**reference** | **string** | La referencia del depósito | [optional] 
**sender_account** | **string** | La cuenta del ordenante | [optional] 
**sender_bank** | [**\mx\wire4\client\model\MessageInstitution**](MessageInstitution.md) |  | [optional] 
**sender_name** | **string** | El nombre del ordenante | [optional] 
**sender_rfc** | **string** | El RFC del ordenante | [optional] 

[[Back to Model list]](../../README.md#documentation-for-models) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to README]](../../README.md)

