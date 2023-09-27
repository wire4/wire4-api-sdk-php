<?php
/**
 * Account
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
 * Swagger Codegen version: 3.0.46
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
 * Account Class Doc Comment
 *
 * @category Class
 * @description Objeto que contiene información de la cuenta
 * @package  mx\wire4
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class Account implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'Account';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'amount_limit' => 'float',
        'bank_key' => 'string',
        'beneficiary_account' => 'string',
        'email' => 'string[]',
        'institution' => '\mx\wire4\client\model\BeneficiaryInstitution',
        'kind_of_relationship' => 'string',
        'numeric_reference_spei' => 'string',
        'payment_concept_spei' => 'string',
        'person' => '\mx\wire4\client\model\Person',
        'relationship' => 'string',
        'rfc' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'amount_limit' => null,
        'bank_key' => null,
        'beneficiary_account' => null,
        'email' => null,
        'institution' => null,
        'kind_of_relationship' => null,
        'numeric_reference_spei' => null,
        'payment_concept_spei' => null,
        'person' => null,
        'relationship' => null,
        'rfc' => null
    ];

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
        'bank_key' => 'bank_key',
        'beneficiary_account' => 'beneficiary_account',
        'email' => 'email',
        'institution' => 'institution',
        'kind_of_relationship' => 'kind_of_relationship',
        'numeric_reference_spei' => 'numeric_reference_spei',
        'payment_concept_spei' => 'payment_concept_spei',
        'person' => 'person',
        'relationship' => 'relationship',
        'rfc' => 'rfc'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'amount_limit' => 'setAmountLimit',
        'bank_key' => 'setBankKey',
        'beneficiary_account' => 'setBeneficiaryAccount',
        'email' => 'setEmail',
        'institution' => 'setInstitution',
        'kind_of_relationship' => 'setKindOfRelationship',
        'numeric_reference_spei' => 'setNumericReferenceSpei',
        'payment_concept_spei' => 'setPaymentConceptSpei',
        'person' => 'setPerson',
        'relationship' => 'setRelationship',
        'rfc' => 'setRfc'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'amount_limit' => 'getAmountLimit',
        'bank_key' => 'getBankKey',
        'beneficiary_account' => 'getBeneficiaryAccount',
        'email' => 'getEmail',
        'institution' => 'getInstitution',
        'kind_of_relationship' => 'getKindOfRelationship',
        'numeric_reference_spei' => 'getNumericReferenceSpei',
        'payment_concept_spei' => 'getPaymentConceptSpei',
        'person' => 'getPerson',
        'relationship' => 'getRelationship',
        'rfc' => 'getRfc'
    ];

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
        $this->container['bank_key'] = isset($data['bank_key']) ? $data['bank_key'] : null;
        $this->container['beneficiary_account'] = isset($data['beneficiary_account']) ? $data['beneficiary_account'] : null;
        $this->container['email'] = isset($data['email']) ? $data['email'] : null;
        $this->container['institution'] = isset($data['institution']) ? $data['institution'] : null;
        $this->container['kind_of_relationship'] = isset($data['kind_of_relationship']) ? $data['kind_of_relationship'] : null;
        $this->container['numeric_reference_spei'] = isset($data['numeric_reference_spei']) ? $data['numeric_reference_spei'] : null;
        $this->container['payment_concept_spei'] = isset($data['payment_concept_spei']) ? $data['payment_concept_spei'] : null;
        $this->container['person'] = isset($data['person']) ? $data['person'] : null;
        $this->container['relationship'] = isset($data['relationship']) ? $data['relationship'] : null;
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
        if ($this->container['kind_of_relationship'] === null) {
            $invalidProperties[] = "'kind_of_relationship' can't be null";
        }
        if ($this->container['relationship'] === null) {
            $invalidProperties[] = "'relationship' can't be null";
        }
        if ($this->container['rfc'] === null) {
            $invalidProperties[] = "'rfc' can't be null";
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
     * @param float $amount_limit Es el monto límite permitido que se registra para la cuenta. Por ejemplo 1000.00.
     *
     * @return $this
     */
    public function setAmountLimit($amount_limit)
    {
        $this->container['amount_limit'] = $amount_limit;

        return $this;
    }

    /**
     * Gets bank_key
     *
     * @return string
     */
    public function getBankKey()
    {
        return $this->container['bank_key'];
    }

    /**
     * Sets bank_key
     *
     * @param string $bank_key Es la clave del banco, es requerido en caso de que la cuenta del beneficiario sea un número de celular.
     *
     * @return $this
     */
    public function setBankKey($bank_key)
    {
        $this->container['bank_key'] = $bank_key;

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
     * @param string $beneficiary_account Es la cuenta del beneficiario, podría ser teléfono celular (se valida que sea de 10 dígitos), Tarjeta de débito (TDD, se valida que sea de 16 dígitos) o cuenta CLABE (se valida que sea de 18 dígitos). <br/><br/>Por ejemplo Teléfono celular: 5525072600, TDD: 4323 1234 5678 9123, CLABE: 032180000118359719.
     *
     * @return $this
     */
    public function setBeneficiaryAccount($beneficiary_account)
    {
        $this->container['beneficiary_account'] = $beneficiary_account;

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
     * @param string[] $email Es una lista de correos electrónicos (emails). Se valida el formato de email. Este campo es opcional.
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
     * @param string $kind_of_relationship Es el tipo de relación que se tiene con el propietario de la cuenta. Para registrar una cuenta, este valor se debe obtener del recurso <a href=\"#operation/getAvailableRelationshipsMonexUsingGET\">relationships.</a> <br /><br /><b>Nota:</b> <em>Si en la respuesta de Monex esta propiedad es nula, tampoco estará presente en esta respuesta.</em>
     *
     * @return $this
     */
    public function setKindOfRelationship($kind_of_relationship)
    {
        $this->container['kind_of_relationship'] = $kind_of_relationship;

        return $this;
    }

    /**
     * Gets numeric_reference_spei
     *
     * @return string
     */
    public function getNumericReferenceSpei()
    {
        return $this->container['numeric_reference_spei'];
    }

    /**
     * Sets numeric_reference_spei
     *
     * @param string $numeric_reference_spei Es la referencia numérica a utilizar cuando se realice una transferencia y no se especifique una referencia.
     *
     * @return $this
     */
    public function setNumericReferenceSpei($numeric_reference_spei)
    {
        $this->container['numeric_reference_spei'] = $numeric_reference_spei;

        return $this;
    }

    /**
     * Gets payment_concept_spei
     *
     * @return string
     */
    public function getPaymentConceptSpei()
    {
        return $this->container['payment_concept_spei'];
    }

    /**
     * Sets payment_concept_spei
     *
     * @param string $payment_concept_spei Es el concepto de pago a utilizar cuando se realice una transferencia y no se especifique un concepto
     *
     * @return $this
     */
    public function setPaymentConceptSpei($payment_concept_spei)
    {
        $this->container['payment_concept_spei'] = $payment_concept_spei;

        return $this;
    }

    /**
     * Gets person
     *
     * @return \mx\wire4\client\model\Person
     */
    public function getPerson()
    {
        return $this->container['person'];
    }

    /**
     * Sets person
     *
     * @param \mx\wire4\client\model\Person $person person
     *
     * @return $this
     */
    public function setPerson($person)
    {
        $this->container['person'] = $person;

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
     * @param string $rfc Es el Registro Federal de Contribuyentes (RFC) de la persona o institución propietaria dela cuenta. <br/> <br/><b>Nota:</b> Si en la respuesta de Monex esta propiedad es nula, tampoco estará presente en esta respuesta.
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
    #[\ReturnTypeWillChange]
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
    #[\ReturnTypeWillChange]
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
    #[\ReturnTypeWillChange]
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
    #[\ReturnTypeWillChange]
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
