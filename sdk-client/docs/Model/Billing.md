# Billing

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**amount** | **float** | Monto total de la factura | [optional] 
**emission_at** | [**\DateTime**](\DateTime.md) | Fecha y hora en que se emitió de la factura | [optional] 
**end_date** | [**\DateTime**](\DateTime.md) | Fecha en que finaliza el periodo que se factura | [optional] 
**id** | **string** | Identificador de la factura | [optional] 
**start_date** | [**\DateTime**](\DateTime.md) | Fecha de inicio del periodo que se factura | [optional] 
**status** | **string** | Estatus de la factura | [optional] 
**transactions** | [**\mx\wire4\client\model\BillingTransaction[]**](BillingTransaction.md) |  | [optional] 
**url_pdf** | **string** | Url de la representación impresa en pdf de la factura | [optional] 
**url_xml** | **string** | Url del archivo xml de la factura | [optional] 

[[Back to Model list]](../../README.md#documentation-for-models) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to README]](../../README.md)

