<?php
/**
 * AccountSpid
 *
 * PHP version 5
 *
 * @category Class
 * @package  mx\wire4
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */

/**
 * Wire4RestAPI
 *
 * Referencia de la API de Wire4
 *
 * OpenAPI spec version: 1.0.0
 * 
 * Generated by: https://github.com/swagger-api/swagger-codegen.git
 * Swagger Codegen version: 3.0.11
 */
/**
 * NOTE: This class is auto generated by the swagger code generator program.
 * https://github.com/swagger-api/swagger-codegen
 * Do not edit the class manually.
 */

namespace mx\wire4\client\model;

use \ArrayAccess;
use \mx\wire4\ObjectSerializer;

/**
 * AccountSpid Class Doc Comment
 *
 * @category Class
 * @description Objeto que contiene información de la cuenta
 * @package  mx\wire4
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class AccountSpid implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'AccountSpid';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'amount_limit' => 'float',
'bank_code_banxico' => 'string',
'beneficiary_account' => 'string',
'cancel_return_url' => 'string',
'email' => 'string[]',
'institution' => '\mx\wire4\client\model\BeneficiaryInstitution',
'kind_of_relationship' => 'string',
'numeric_reference' => 'string',
'payment_concept' => 'string',
'relationship' => 'string',
'return_url' => 'string',
'rfc' => 'string'    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'amount_limit' => null,
'bank_code_banxico' => null,
'beneficiary_account' => null,
'cancel_return_url' => null,
'email' => null,
'institution' => null,
'kind_of_relationship' => null,
'numeric_reference' => null,
'payment_concept' => null,
'relationship' => null,
'return_url' => null,
'rfc' => null    ];

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function swaggerTypes()
    {
        return self::$swaggerTypes;
    }

    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function swaggerFormats()
    {
        return self::$swaggerFormats;
    }

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @var string[]
     */
    protected static $attributeMap = [
        'amount_limit' => 'amount_limit',
'bank_code_banxico' => 'bank_code_banxico',
'beneficiary_account' => 'beneficiary_account',
'cancel_return_url' => 'cancel_return_url',
'email' => 'email',
'institution' => 'institution',
'kind_of_relationship' => 'kind_of_relationship',
'numeric_reference' => 'numeric_reference',
'payment_concept' => 'payment_concept',
'relationship' => 'relationship',
'return_url' => 'return_url',
'rfc' => 'rfc'    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'amount_limit' => 'setAmountLimit',
'bank_code_banxico' => 'setBankCodeBanxico',
'beneficiary_account' => 'setBeneficiaryAccount',
'cancel_return_url' => 'setCancelReturnUrl',
'email' => 'setEmail',
'institution' => 'setInstitution',
'kind_of_relationship' => 'setKindOfRelationship',
'numeric_reference' => 'setNumericReference',
'payment_concept' => 'setPaymentConcept',
'relationship' => 'setRelationship',
'return_url' => 'setReturnUrl',
'rfc' => 'setRfc'    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'amount_limit' => 'getAmountLimit',
'bank_code_banxico' => 'getBankCodeBanxico',
'beneficiary_account' => 'getBeneficiaryAccount',
'cancel_return_url' => 'getCancelReturnUrl',
'email' => 'getEmail',
'institution' => 'getInstitution',
'kind_of_relationship' => 'getKindOfRelationship',
'numeric_reference' => 'getNumericReference',
'payment_concept' => 'getPaymentConcept',
'relationship' => 'getRelationship',
'return_url' => 'getReturnUrl',
'rfc' => 'getRfc'    ];

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @return array
     */
    public static function attributeMap()
    {
        return self::$attributeMap;
    }

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @return array
     */
    public static function setters()
    {
        return self::$setters;
    }

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @return array
     */
    public static function getters()
    {
        return self::$getters;
    }

    /**
     * The original name of the model.
     *
     * @return string
     */
    public function getModelName()
    {
        return self::$swaggerModelName;
    }

    

    /**
     * Associative array for storing property values
     *
     * @var mixed[]
     */
    protected $container = [];

    /**
     * Constructor
     *
     * @param mixed[] $data Associated array of property values
     *                      initializing the model
     */
    public function __construct(array $data = null)
    {
        $this->container['amount_limit'] = isset($data['amount_limit']) ? $data['amount_limit'] : null;
        $this->container['bank_code_banxico'] = isset($data['bank_code_banxico']) ? $data['bank_code_banxico'] : null;
        $this->container['beneficiary_account'] = isset($data['beneficiary_account']) ? $data['beneficiary_account'] : null;
        $this->container['cancel_return_url'] = isset($data['cancel_return_url']) ? $data['cancel_return_url'] : null;
        $this->container['email'] = isset($data['email']) ? $data['email'] : null;
        $this->container['institution'] = isset($data['institution']) ? $data['institution'] : null;
        $this->container['kind_of_relationship'] = isset($data['kind_of_relationship']) ? $data['kind_of_relationship'] : null;
        $this->container['numeric_reference'] = isset($data['numeric_reference']) ? $data['numeric_reference'] : null;
        $this->container['payment_concept'] = isset($data['payment_concept']) ? $data['payment_concept'] : null;
        $this->container['relationship'] = isset($data['relationship']) ? $data['relationship'] : null;
        $this->container['return_url'] = isset($data['return_url']) ? $data['return_url'] : null;
        $this->container['rfc'] = isset($data['rfc']) ? $data['rfc'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        if ($this->container['amount_limit'] === null) {
            $invalidProperties[] = "'amount_limit' can't be null";
        }
        if ($this->container['beneficiary_account'] === null) {
            $invalidProperties[] = "'beneficiary_account' can't be null";
        }
        if ($this->container['institution'] === null) {
            $invalidProperties[] = "'institution' can't be null";
        }
        if ($this->container['kind_of_relationship'] === null) {
            $invalidProperties[] = "'kind_of_relationship' can't be null";
        }
        if ($this->container['relationship'] === null) {
            $invalidProperties[] = "'relationship' can't be null";
        }
        return $invalidProperties;
    }

    /**
     * Validate all the properties in the model
     * return true if all passed
     *
     * @return bool True if all properties are valid
     */
    public function valid()
    {
        return count($this->listInvalidProperties()) === 0;
    }


    /**
     * Gets amount_limit
     *
     * @return float
     */
    public function getAmountLimit()
    {
        return $this->container['amount_limit'];
    }

    /**
     * Sets amount_limit
     *
     * @param float $amount_limit Monto límite permitido para la cuenta. Ejemplo: 1000.00
     *
     * @return $this
     */
    public function setAmountLimit($amount_limit)
    {
        $this->container['amount_limit'] = $amount_limit;

        return $this;
    }

    /**
     * Gets bank_code_banxico
     *
     * @return string
     */
    public function getBankCodeBanxico()
    {
        return $this->container['bank_code_banxico'];
    }

    /**
     * Sets bank_code_banxico
     *
     * @param string $bank_code_banxico Es el código banxico con una longitud de 5 dígitos, es requerido en caso de que la cuenta del beneficiario sea un número de celular.
     *
     * @return $this
     */
    public function setBankCodeBanxico($bank_code_banxico)
    {
        $this->container['bank_code_banxico'] = $bank_code_banxico;

        return $this;
    }

    /**
     * Gets beneficiary_account
     *
     * @return string
     */
    public function getBeneficiaryAccount()
    {
        return $this->container['beneficiary_account'];
    }

    /**
     * Sets beneficiary_account
     *
     * @param string $beneficiary_account Cuenta del beneficiario debe ser una cuenta CLABE. Ejemplo: 032180000118359719.
     *
     * @return $this
     */
    public function setBeneficiaryAccount($beneficiary_account)
    {
        $this->container['beneficiary_account'] = $beneficiary_account;

        return $this;
    }

    /**
     * Gets cancel_return_url
     *
     * @return string
     */
    public function getCancelReturnUrl()
    {
        return $this->container['cancel_return_url'];
    }

    /**
     * Sets cancel_return_url
     *
     * @param string $cancel_return_url Es la dirección URL a la que se redirigirá en caso de que el cliente cancele el registro. Se valida hasta 512 caracteres.
     *
     * @return $this
     */
    public function setCancelReturnUrl($cancel_return_url)
    {
        $this->container['cancel_return_url'] = $cancel_return_url;

        return $this;
    }

    /**
     * Gets email
     *
     * @return string[]
     */
    public function getEmail()
    {
        return $this->container['email'];
    }

    /**
     * Sets email
     *
     * @param string[] $email Lista de correos electrónicos (emails), este dato es opcional.
     *
     * @return $this
     */
    public function setEmail($email)
    {
        $this->container['email'] = $email;

        return $this;
    }

    /**
     * Gets institution
     *
     * @return \mx\wire4\client\model\BeneficiaryInstitution
     */
    public function getInstitution()
    {
        return $this->container['institution'];
    }

    /**
     * Sets institution
     *
     * @param \mx\wire4\client\model\BeneficiaryInstitution $institution institution
     *
     * @return $this
     */
    public function setInstitution($institution)
    {
        $this->container['institution'] = $institution;

        return $this;
    }

    /**
     * Gets kind_of_relationship
     *
     * @return string
     */
    public function getKindOfRelationship()
    {
        return $this->container['kind_of_relationship'];
    }

    /**
     * Sets kind_of_relationship
     *
     * @param string $kind_of_relationship Es el tipo de relación que se tiene con el propietario de la cuenta. Para registrar una cuenta, este valor se debe obtener del recurso <a href=\"#operation/getAvailableRelationshipsMonexUsingGET\"> relationships.</a> <br /><br /><b>Nota:</b> <em>Si en la respuesta de Monex esta propiedad es nula, tampoco estará presente en esta respuesta.</em>
     *
     * @return $this
     */
    public function setKindOfRelationship($kind_of_relationship)
    {
        $this->container['kind_of_relationship'] = $kind_of_relationship;

        return $this;
    }

    /**
     * Gets numeric_reference
     *
     * @return string
     */
    public function getNumericReference()
    {
        return $this->container['numeric_reference'];
    }

    /**
     * Sets numeric_reference
     *
     * @param string $numeric_reference Es la referencia numérica.
     *
     * @return $this
     */
    public function setNumericReference($numeric_reference)
    {
        $this->container['numeric_reference'] = $numeric_reference;

        return $this;
    }

    /**
     * Gets payment_concept
     *
     * @return string
     */
    public function getPaymentConcept()
    {
        return $this->container['payment_concept'];
    }

    /**
     * Sets payment_concept
     *
     * @param string $payment_concept Es el concepto de pago.
     *
     * @return $this
     */
    public function setPaymentConcept($payment_concept)
    {
        $this->container['payment_concept'] = $payment_concept;

        return $this;
    }

    /**
     * Gets relationship
     *
     * @return string
     */
    public function getRelationship()
    {
        return $this->container['relationship'];
    }

    /**
     * Sets relationship
     *
     * @param string $relationship Es la relación con el propietario de la cuenta, para registrar este valor se debe obtener del recurso <a href=\"#operation/getAvailableRelationshipsMonexUsingGET\">relationships.</a> <br/> <br/> <b>Nota:</b> Si en la respuesta de Monex, sta propiedad es nula, tampoco estará presente en esta respuesta.
     *
     * @return $this
     */
    public function setRelationship($relationship)
    {
        $this->container['relationship'] = $relationship;

        return $this;
    }

    /**
     * Gets return_url
     *
     * @return string
     */
    public function getReturnUrl()
    {
        return $this->container['return_url'];
    }

    /**
     * Sets return_url
     *
     * @param string $return_url Es la dirección URL a la que se redirigirá en caso exitoso. Se valida hasta 512 caracteres.
     *
     * @return $this
     */
    public function setReturnUrl($return_url)
    {
        $this->container['return_url'] = $return_url;

        return $this;
    }

    /**
     * Gets rfc
     *
     * @return string
     */
    public function getRfc()
    {
        return $this->container['rfc'];
    }

    /**
     * Sets rfc
     *
     * @param string $rfc Es el Registro federal de contribuyentes (RFC) de la persona o institución propietaria de la cuenta. <br/> <br/><b>Nota:</b> Se valida el formato de RFC.
     *
     * @return $this
     */
    public function setRfc($rfc)
    {
        $this->container['rfc'] = $rfc;

        return $this;
    }
    /**
     * Returns true if offset exists. False otherwise.
     *
     * @param integer $offset Offset
     *
     * @return boolean
     */
    public function offsetExists($offset)
    {
        return isset($this->container[$offset]);
    }

    /**
     * Gets offset.
     *
     * @param integer $offset Offset
     *
     * @return mixed
     */
    public function offsetGet($offset)
    {
        return isset($this->container[$offset]) ? $this->container[$offset] : null;
    }

    /**
     * Sets value based on offset.
     *
     * @param integer $offset Offset
     * @param mixed   $value  Value to be set
     *
     * @return void
     */
    public function offsetSet($offset, $value)
    {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    /**
     * Unsets offset.
     *
     * @param integer $offset Offset
     *
     * @return void
     */
    public function offsetUnset($offset)
    {
        unset($this->container[$offset]);
    }

    /**
     * Gets the string presentation of the object
     *
     * @return string
     */
    public function __toString()
    {
        if (defined('JSON_PRETTY_PRINT')) { // use JSON pretty print
            return json_encode(
                ObjectSerializer::sanitizeForSerialization($this),
                JSON_PRETTY_PRINT
            );
        }

        return json_encode(ObjectSerializer::sanitizeForSerialization($this));
    }
}
