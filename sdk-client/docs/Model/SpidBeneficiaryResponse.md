# SpidBeneficiaryResponse

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**amount_limit** | **float** | Monto límite permitido para la cuenta | 
**bank** | [**\mx\wire4\client\model\Institution**](Institution.md) |  | [optional] 
**beneficiary_account** | **string** | Cuenta del beneficiario debe ser una cuenta CLABE | 
**email** | **string[]** | Lista de email&#x27;s, este dato es opcional | [optional] 
**institution** | [**\mx\wire4\client\model\BeneficiaryInstitution**](BeneficiaryInstitution.md) |  | 
**kind_of_relationship** | **string** | Tipo de relación de la cuenta, este valor debe ser igual a uno de los obtenidos del recurso de consulta de relationships | 
**numeric_reference_spid** | **string** | Referencia numérica | [optional] 
**payment_concept_spid** | **string** | Concepto de pago | [optional] 
**relationship** | **string** | Código de relación de la cuenta, este valor debe ser igual a uno de los obtenidos del recurso de consulta de  relationship | 
**rfc** | **string** | Registro federal de contribuyentes | [optional] 

[[Back to Model list]](../../README.md#documentation-for-models) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to README]](../../README.md)

