# AccountSpid

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**amount_limit** | **float** | Monto límite permitido para la cuenta | 
**bank_code_banxico** | **string** | Código banxico con una longitud de 5 dígitos, es requerido en caso de que la cuenta del beneficiario sea un número de celular | [optional] 
**beneficiary_account** | **string** | Cuenta del beneficiario debe ser una cuenta CLABE | 
**cancel_return_url** | **string** | Url a la que se redirigira en caso no exitoso | [optional] 
**email** | **string[]** | Lista de email&#x27;s, este dato es opcional | [optional] 
**institution** | [**\mx\wire4\client\model\BeneficiaryInstitution**](BeneficiaryInstitution.md) |  | 
**kind_of_relationship** | **string** | Tipo de relación de la cuentaobtained of endpoint relationships | 
**numeric_reference** | **string** | Referencia numérica | [optional] 
**payment_concept** | **string** | Concepto de pago | [optional] 
**relationship** | **string** | Código de relación de la cuenta, este valor debe ser igual a un valor obtenido del endpoint relationship | 
**return_url** | **string** | Url a la que se redireccionara en caso exitoso | [optional] 
**rfc** | **string** | Registro federal de contribuyentes | [optional] 

[[Back to Model list]](../../README.md#documentation-for-models) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to README]](../../README.md)

