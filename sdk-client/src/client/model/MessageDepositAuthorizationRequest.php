<?php
/**
 * MessageDepositAuthorizationRequest
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
 * MessageDepositAuthorizationRequest Class Doc Comment
 *
 * @category Class
 * @description Es el objet mensaje que se envía mediante webHook con la información de un depósito que necesita ser autorizado.
 * @package  mx\wire4
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class MessageDepositAuthorizationRequest implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'MessageDepositAuthorizationRequest';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'amount' => 'float',
        'beneficiary_account' => 'string',
        'beneficiary_name' => 'string',
        'beneficiary_rfc' => 'string',
        'clave_rastreo' => 'string',
        'confirm_date' => '\DateTime',
        'currency_code' => 'string',
        'deposit_date' => '\DateTime',
        'depositant' => 'string',
        'depositant_alias' => 'string',
        'depositant_clabe' => 'string',
        'depositant_email' => 'string',
        'depositant_rfc' => 'string',
        'description' => 'string',
        'monex_description' => 'string',
        'monex_transaction_id' => 'string',
        'reference' => 'string',
        'sender_account' => 'string',
        'sender_bank' => '\mx\wire4\client\model\MessageInstitution',
        'sender_name' => 'string',
        'sender_rfc' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'amount' => null,
        'beneficiary_account' => null,
        'beneficiary_name' => null,
        'beneficiary_rfc' => null,
        'clave_rastreo' => null,
        'confirm_date' => 'date-time',
        'currency_code' => null,
        'deposit_date' => 'date-time',
        'depositant' => null,
        'depositant_alias' => null,
        'depositant_clabe' => null,
        'depositant_email' => null,
        'depositant_rfc' => null,
        'description' => null,
        'monex_description' => null,
        'monex_transaction_id' => null,
        'reference' => null,
        'sender_account' => null,
        'sender_bank' => null,
        'sender_name' => null,
        'sender_rfc' => null
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
        'amount' => 'amount',
        'beneficiary_account' => 'beneficiary_account',
        'beneficiary_name' => 'beneficiary_name',
        'beneficiary_rfc' => 'beneficiary_rfc',
        'clave_rastreo' => 'clave_rastreo',
        'confirm_date' => 'confirm_date',
        'currency_code' => 'currency_code',
        'deposit_date' => 'deposit_date',
        'depositant' => 'depositant',
        'depositant_alias' => 'depositant_alias',
        'depositant_clabe' => 'depositant_clabe',
        'depositant_email' => 'depositant_email',
        'depositant_rfc' => 'depositant_rfc',
        'description' => 'description',
        'monex_description' => 'monex_description',
        'monex_transaction_id' => 'monex_transaction_id',
        'reference' => 'reference',
        'sender_account' => 'sender_account',
        'sender_bank' => 'sender_bank',
        'sender_name' => 'sender_name',
        'sender_rfc' => 'sender_rfc'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'amount' => 'setAmount',
        'beneficiary_account' => 'setBeneficiaryAccount',
        'beneficiary_name' => 'setBeneficiaryName',
        'beneficiary_rfc' => 'setBeneficiaryRfc',
        'clave_rastreo' => 'setClaveRastreo',
        'confirm_date' => 'setConfirmDate',
        'currency_code' => 'setCurrencyCode',
        'deposit_date' => 'setDepositDate',
        'depositant' => 'setDepositant',
        'depositant_alias' => 'setDepositantAlias',
        'depositant_clabe' => 'setDepositantClabe',
        'depositant_email' => 'setDepositantEmail',
        'depositant_rfc' => 'setDepositantRfc',
        'description' => 'setDescription',
        'monex_description' => 'setMonexDescription',
        'monex_transaction_id' => 'setMonexTransactionId',
        'reference' => 'setReference',
        'sender_account' => 'setSenderAccount',
        'sender_bank' => 'setSenderBank',
        'sender_name' => 'setSenderName',
        'sender_rfc' => 'setSenderRfc'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'amount' => 'getAmount',
        'beneficiary_account' => 'getBeneficiaryAccount',
        'beneficiary_name' => 'getBeneficiaryName',
        'beneficiary_rfc' => 'getBeneficiaryRfc',
        'clave_rastreo' => 'getClaveRastreo',
        'confirm_date' => 'getConfirmDate',
        'currency_code' => 'getCurrencyCode',
        'deposit_date' => 'getDepositDate',
        'depositant' => 'getDepositant',
        'depositant_alias' => 'getDepositantAlias',
        'depositant_clabe' => 'getDepositantClabe',
        'depositant_email' => 'getDepositantEmail',
        'depositant_rfc' => 'getDepositantRfc',
        'description' => 'getDescription',
        'monex_description' => 'getMonexDescription',
        'monex_transaction_id' => 'getMonexTransactionId',
        'reference' => 'getReference',
        'sender_account' => 'getSenderAccount',
        'sender_bank' => 'getSenderBank',
        'sender_name' => 'getSenderName',
        'sender_rfc' => 'getSenderRfc'
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
        $this->container['amount'] = isset($data['amount']) ? $data['amount'] : null;
        $this->container['beneficiary_account'] = isset($data['beneficiary_account']) ? $data['beneficiary_account'] : null;
        $this->container['beneficiary_name'] = isset($data['beneficiary_name']) ? $data['beneficiary_name'] : null;
        $this->container['beneficiary_rfc'] = isset($data['beneficiary_rfc']) ? $data['beneficiary_rfc'] : null;
        $this->container['clave_rastreo'] = isset($data['clave_rastreo']) ? $data['clave_rastreo'] : null;
        $this->container['confirm_date'] = isset($data['confirm_date']) ? $data['confirm_date'] : null;
        $this->container['currency_code'] = isset($data['currency_code']) ? $data['currency_code'] : null;
        $this->container['deposit_date'] = isset($data['deposit_date']) ? $data['deposit_date'] : null;
        $this->container['depositant'] = isset($data['depositant']) ? $data['depositant'] : null;
        $this->container['depositant_alias'] = isset($data['depositant_alias']) ? $data['depositant_alias'] : null;
        $this->container['depositant_clabe'] = isset($data['depositant_clabe']) ? $data['depositant_clabe'] : null;
        $this->container['depositant_email'] = isset($data['depositant_email']) ? $data['depositant_email'] : null;
        $this->container['depositant_rfc'] = isset($data['depositant_rfc']) ? $data['depositant_rfc'] : null;
        $this->container['description'] = isset($data['description']) ? $data['description'] : null;
        $this->container['monex_description'] = isset($data['monex_description']) ? $data['monex_description'] : null;
        $this->container['monex_transaction_id'] = isset($data['monex_transaction_id']) ? $data['monex_transaction_id'] : null;
        $this->container['reference'] = isset($data['reference']) ? $data['reference'] : null;
        $this->container['sender_account'] = isset($data['sender_account']) ? $data['sender_account'] : null;
        $this->container['sender_bank'] = isset($data['sender_bank']) ? $data['sender_bank'] : null;
        $this->container['sender_name'] = isset($data['sender_name']) ? $data['sender_name'] : null;
        $this->container['sender_rfc'] = isset($data['sender_rfc']) ? $data['sender_rfc'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

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
     * Gets amount
     *
     * @return float
     */
    public function getAmount()
    {
        return $this->container['amount'];
    }

    /**
     * Sets amount
     *
     * @param float $amount Es el monto de la transferencia.
     *
     * @return $this
     */
    public function setAmount($amount)
    {
        $this->container['amount'] = $amount;

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
     * @param string $beneficiary_account Es la cuenta del beneficiario.
     *
     * @return $this
     */
    public function setBeneficiaryAccount($beneficiary_account)
    {
        $this->container['beneficiary_account'] = $beneficiary_account;

        return $this;
    }

    /**
     * Gets beneficiary_name
     *
     * @return string
     */
    public function getBeneficiaryName()
    {
        return $this->container['beneficiary_name'];
    }

    /**
     * Sets beneficiary_name
     *
     * @param string $beneficiary_name Es el nombre del beneficiario.
     *
     * @return $this
     */
    public function setBeneficiaryName($beneficiary_name)
    {
        $this->container['beneficiary_name'] = $beneficiary_name;

        return $this;
    }

    /**
     * Gets beneficiary_rfc
     *
     * @return string
     */
    public function getBeneficiaryRfc()
    {
        return $this->container['beneficiary_rfc'];
    }

    /**
     * Sets beneficiary_rfc
     *
     * @param string $beneficiary_rfc Es el Registro Federal de Contribuyentes (RFC) del beneficiario.
     *
     * @return $this
     */
    public function setBeneficiaryRfc($beneficiary_rfc)
    {
        $this->container['beneficiary_rfc'] = $beneficiary_rfc;

        return $this;
    }

    /**
     * Gets clave_rastreo
     *
     * @return string
     */
    public function getClaveRastreo()
    {
        return $this->container['clave_rastreo'];
    }

    /**
     * Sets clave_rastreo
     *
     * @param string $clave_rastreo Es la clave de rastreo de la transferencia.
     *
     * @return $this
     */
    public function setClaveRastreo($clave_rastreo)
    {
        $this->container['clave_rastreo'] = $clave_rastreo;

        return $this;
    }

    /**
     * Gets confirm_date
     *
     * @return \DateTime
     */
    public function getConfirmDate()
    {
        return $this->container['confirm_date'];
    }

    /**
     * Sets confirm_date
     *
     * @param \DateTime $confirm_date Es la Fecha de confirmación de la transferencia.
     *
     * @return $this
     */
    public function setConfirmDate($confirm_date)
    {
        $this->container['confirm_date'] = $confirm_date;

        return $this;
    }

    /**
     * Gets currency_code
     *
     * @return string
     */
    public function getCurrencyCode()
    {
        return $this->container['currency_code'];
    }

    /**
     * Sets currency_code
     *
     * @param string $currency_code Es el código de divisa de la transferencia. Es en el formato estándar ISO 4217 y es de 3 dígitos. Puede ser \"MXN\" o \"USD\".
     *
     * @return $this
     */
    public function setCurrencyCode($currency_code)
    {
        $this->container['currency_code'] = $currency_code;

        return $this;
    }

    /**
     * Gets deposit_date
     *
     * @return \DateTime
     */
    public function getDepositDate()
    {
        return $this->container['deposit_date'];
    }

    /**
     * Sets deposit_date
     *
     * @param \DateTime $deposit_date Es la fecha de recepción de la transferencia.
     *
     * @return $this
     */
    public function setDepositDate($deposit_date)
    {
        $this->container['deposit_date'] = $deposit_date;

        return $this;
    }

    /**
     * Gets depositant
     *
     * @return string
     */
    public function getDepositant()
    {
        return $this->container['depositant'];
    }

    /**
     * Sets depositant
     *
     * @param string $depositant Es el nombre del depositante en caso de que la transferencia se reciba en una cuenta de depositante.
     *
     * @return $this
     */
    public function setDepositant($depositant)
    {
        $this->container['depositant'] = $depositant;

        return $this;
    }

    /**
     * Gets depositant_alias
     *
     * @return string
     */
    public function getDepositantAlias()
    {
        return $this->container['depositant_alias'];
    }

    /**
     * Sets depositant_alias
     *
     * @param string $depositant_alias Es el alias de la cuenta CLABE del depositante en caso que la transferencia se reciba de una cuenta de depositante
     *
     * @return $this
     */
    public function setDepositantAlias($depositant_alias)
    {
        $this->container['depositant_alias'] = $depositant_alias;

        return $this;
    }

    /**
     * Gets depositant_clabe
     *
     * @return string
     */
    public function getDepositantClabe()
    {
        return $this->container['depositant_clabe'];
    }

    /**
     * Sets depositant_clabe
     *
     * @param string $depositant_clabe Es la cuenta CLABE del depositante en caso que la transferencia se reciba en una cuenta de depositante
     *
     * @return $this
     */
    public function setDepositantClabe($depositant_clabe)
    {
        $this->container['depositant_clabe'] = $depositant_clabe;

        return $this;
    }

    /**
     * Gets depositant_email
     *
     * @return string
     */
    public function getDepositantEmail()
    {
        return $this->container['depositant_email'];
    }

    /**
     * Sets depositant_email
     *
     * @param string $depositant_email Es el Correo electrónico (email) del depositante en caso que la transferencia se reciba en una cuenta de depositante
     *
     * @return $this
     */
    public function setDepositantEmail($depositant_email)
    {
        $this->container['depositant_email'] = $depositant_email;

        return $this;
    }

    /**
     * Gets depositant_rfc
     *
     * @return string
     */
    public function getDepositantRfc()
    {
        return $this->container['depositant_rfc'];
    }

    /**
     * Sets depositant_rfc
     *
     * @param string $depositant_rfc Es el Registro Federal de Contribuyentes (RFC) del depositante, en caso que la transferencia se reciba en una cuenta de depositante.
     *
     * @return $this
     */
    public function setDepositantRfc($depositant_rfc)
    {
        $this->container['depositant_rfc'] = $depositant_rfc;

        return $this;
    }

    /**
     * Gets description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->container['description'];
    }

    /**
     * Sets description
     *
     * @param string $description Es el concepto de la transferencia.
     *
     * @return $this
     */
    public function setDescription($description)
    {
        $this->container['description'] = $description;

        return $this;
    }

    /**
     * Gets monex_description
     *
     * @return string
     */
    public function getMonexDescription()
    {
        return $this->container['monex_description'];
    }

    /**
     * Sets monex_description
     *
     * @param string $monex_description Es la descripción de Monex para la transferencia.
     *
     * @return $this
     */
    public function setMonexDescription($monex_description)
    {
        $this->container['monex_description'] = $monex_description;

        return $this;
    }

    /**
     * Gets monex_transaction_id
     *
     * @return string
     */
    public function getMonexTransactionId()
    {
        return $this->container['monex_transaction_id'];
    }

    /**
     * Sets monex_transaction_id
     *
     * @param string $monex_transaction_id Es el identificador asignado por Monex a la transferencia.
     *
     * @return $this
     */
    public function setMonexTransactionId($monex_transaction_id)
    {
        $this->container['monex_transaction_id'] = $monex_transaction_id;

        return $this;
    }

    /**
     * Gets reference
     *
     * @return string
     */
    public function getReference()
    {
        return $this->container['reference'];
    }

    /**
     * Sets reference
     *
     * @param string $reference Es la referecia de la transferencia.
     *
     * @return $this
     */
    public function setReference($reference)
    {
        $this->container['reference'] = $reference;

        return $this;
    }

    /**
     * Gets sender_account
     *
     * @return string
     */
    public function getSenderAccount()
    {
        return $this->container['sender_account'];
    }

    /**
     * Sets sender_account
     *
     * @param string $sender_account Es la cuenta del ordenante que podría ser un número celular (10 dígitos), una tarjeta de débito (TDD, de 16 dígitos) o Cuenta CLABE interbancaria (18 dígitos).
     *
     * @return $this
     */
    public function setSenderAccount($sender_account)
    {
        $this->container['sender_account'] = $sender_account;

        return $this;
    }

    /**
     * Gets sender_bank
     *
     * @return \mx\wire4\client\model\MessageInstitution
     */
    public function getSenderBank()
    {
        return $this->container['sender_bank'];
    }

    /**
     * Sets sender_bank
     *
     * @param \mx\wire4\client\model\MessageInstitution $sender_bank sender_bank
     *
     * @return $this
     */
    public function setSenderBank($sender_bank)
    {
        $this->container['sender_bank'] = $sender_bank;

        return $this;
    }

    /**
     * Gets sender_name
     *
     * @return string
     */
    public function getSenderName()
    {
        return $this->container['sender_name'];
    }

    /**
     * Sets sender_name
     *
     * @param string $sender_name Es el nombre del ordenante.
     *
     * @return $this
     */
    public function setSenderName($sender_name)
    {
        $this->container['sender_name'] = $sender_name;

        return $this;
    }

    /**
     * Gets sender_rfc
     *
     * @return string
     */
    public function getSenderRfc()
    {
        return $this->container['sender_rfc'];
    }

    /**
     * Sets sender_rfc
     *
     * @param string $sender_rfc Es el Registro Federal de Contribuyente (RFC) del ordenante.
     *
     * @return $this
     */
    public function setSenderRfc($sender_rfc)
    {
        $this->container['sender_rfc'] = $sender_rfc;

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
