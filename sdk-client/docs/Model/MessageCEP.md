# MessageCEP

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**account_beneficiary** | **string** | Cuenta del beneficiario | [optional] 
**account_sender** | **string** | Cuenta que envia la operación | [optional] 
**amount** | **float** | Monto de la operación | [optional] 
**available** | **bool** | Indica sí el CEP está disponible | [optional] 
**bank_beneficiary** | **string** | Clave del banco beneficiario | [optional] 
**bank_sender** | **string** | Clave del banco que envía la operación | [optional] 
**beneficiary_name** | **string** | Nombre del beneficiario | [optional] 
**beneficiary_rfc** | **string** | RFC del beneficiario | [optional] 
**cadena_original** | **string** | Cadena original emita por el SAT | [optional] 
**capture_date** | [**\DateTime**](\DateTime.md) | Fecha de captura | [optional] 
**certificate_serial_number** | **string** | Número de serie emitido por el SAT | [optional] 
**clave_rastreo** | **string** | Clave de rastreo de la operación | [optional] 
**description** | **string** | Descripción de la operación | [optional] 
**iva** | **float** | IVA de la operación | [optional] 
**operation_date** | [**\DateTime**](\DateTime.md) | Fecha en la que se realizó la operación | [optional] 
**operation_date_cep** | [**\DateTime**](\DateTime.md) | Fecha en la que genera el CEP | [optional] 
**reference** | **string** | Referencia de la operación | [optional] 
**sender_name** | **string** | Nombre de quién envía la operación | [optional] 
**sender_rfc** | **string** | RFC de quién envía la operación | [optional] 
**signature** | **string** | Firma del CEP | [optional] 
**url_zip** | **string** | Dirección URL de descarga del archivo ZIP que contiene el PDF y XML del CEP proporcionado por BANXICO | [optional] 

[[Back to Model list]](../../README.md#documentation-for-models) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to README]](../../README.md)

