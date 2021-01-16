# MessageCEP

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**account_beneficiary** | **string** | Es la cuenta del beneficiario. | [optional] 
**account_sender** | **string** | Es la cuenta que envía la operación. | [optional] 
**amount** | **float** | Es el monto de la operación. | [optional] 
**available** | **bool** | Indica sí el CEP está disponible. | [optional] 
**bank_beneficiary** | **string** | Es la clave del banco beneficiario. | [optional] 
**bank_sender** | **string** | Es la clave del banco que envía la operación. | [optional] 
**beneficiary_name** | **string** | Es el nombre del beneficiario. | [optional] 
**beneficiary_rfc** | **string** | Es el Registro Federal de Contribuyentes (RFC) del beneficiario. | [optional] 
**cadena_original** | **string** | Es la cadena original emitida por el Servicio de Administración Tributaria (SAT). | [optional] 
**capture_date** | [**\DateTime**](\DateTime.md) | Es la fecha de captura. | [optional] 
**certificate_serial_number** | **string** | Es el número de serie emitido por el SAT | [optional] 
**clave_rastreo** | **string** | Es la clave de rastreo de la operación. | [optional] 
**description** | **string** | Es la descripción de la operación. | [optional] 
**iva** | **float** | Es el Impuesto al Valor Agregado (IVA) de la operación. | [optional] 
**operation_date** | [**\DateTime**](\DateTime.md) | Es la fecha en la que se realizó la operación. | [optional] 
**operation_date_cep** | [**\DateTime**](\DateTime.md) | Es la fecha en la que se genera el CEP. | [optional] 
**reference** | **string** | Es la Referencia de la operación | [optional] 
**sender_name** | **string** | Es el nombre de quién envía la operación. | [optional] 
**sender_rfc** | **string** | Es el Registro Federal de Contrinuyentes (RFC) de quién envía la operación. | [optional] 
**signature** | **string** | Firma del CEP | [optional] 
**url_zip** | **string** | Dirección URL de descarga del archivo ZIP que contiene el PDF y XML del CEP proporcionado por BANXICO | [optional] 

[[Back to Model list]](../../README.md#documentation-for-models) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to README]](../../README.md)

