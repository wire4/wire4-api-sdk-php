<?php
/**
 * UserCompany
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
 * UserCompany Class Doc Comment
 *
 * @category Class
 * @description El usuario que corresponde al contrato
 * @package  mx\wire4
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class UserCompany implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'UserCompany';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'emails' => 'string[]',
'legal_representative' => 'bool',
'masked_name' => 'string',
'masked_user_name' => 'string',
'name' => 'string',
'phone_numbers' => 'string[]',
'surname_father' => 'string',
'surname_mother' => 'string',
'user_name' => 'string'    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'emails' => null,
'legal_representative' => null,
'masked_name' => null,
'masked_user_name' => null,
'name' => null,
'phone_numbers' => null,
'surname_father' => null,
'surname_mother' => null,
'user_name' => null    ];

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
        'emails' => 'emails',
'legal_representative' => 'legal_representative',
'masked_name' => 'masked_name',
'masked_user_name' => 'masked_user_name',
'name' => 'name',
'phone_numbers' => 'phone_numbers',
'surname_father' => 'surname_father',
'surname_mother' => 'surname_mother',
'user_name' => 'user_name'    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'emails' => 'setEmails',
'legal_representative' => 'setLegalRepresentative',
'masked_name' => 'setMaskedName',
'masked_user_name' => 'setMaskedUserName',
'name' => 'setName',
'phone_numbers' => 'setPhoneNumbers',
'surname_father' => 'setSurnameFather',
'surname_mother' => 'setSurnameMother',
'user_name' => 'setUserName'    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'emails' => 'getEmails',
'legal_representative' => 'getLegalRepresentative',
'masked_name' => 'getMaskedName',
'masked_user_name' => 'getMaskedUserName',
'name' => 'getName',
'phone_numbers' => 'getPhoneNumbers',
'surname_father' => 'getSurnameFather',
'surname_mother' => 'getSurnameMother',
'user_name' => 'getUserName'    ];

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
        $this->container['emails'] = isset($data['emails']) ? $data['emails'] : null;
        $this->container['legal_representative'] = isset($data['legal_representative']) ? $data['legal_representative'] : null;
        $this->container['masked_name'] = isset($data['masked_name']) ? $data['masked_name'] : null;
        $this->container['masked_user_name'] = isset($data['masked_user_name']) ? $data['masked_user_name'] : null;
        $this->container['name'] = isset($data['name']) ? $data['name'] : null;
        $this->container['phone_numbers'] = isset($data['phone_numbers']) ? $data['phone_numbers'] : null;
        $this->container['surname_father'] = isset($data['surname_father']) ? $data['surname_father'] : null;
        $this->container['surname_mother'] = isset($data['surname_mother']) ? $data['surname_mother'] : null;
        $this->container['user_name'] = isset($data['user_name']) ? $data['user_name'] : null;
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
     * Gets emails
     *
     * @return string[]
     */
    public function getEmails()
    {
        return $this->container['emails'];
    }

    /**
     * Sets emails
     *
     * @param string[] $emails Una lista de los correos del usuario
     *
     * @return $this
     */
    public function setEmails($emails)
    {
        $this->container['emails'] = $emails;

        return $this;
    }

    /**
     * Gets legal_representative
     *
     * @return bool
     */
    public function getLegalRepresentative()
    {
        return $this->container['legal_representative'];
    }

    /**
     * Sets legal_representative
     *
     * @param bool $legal_representative Indica sí es representate legal
     *
     * @return $this
     */
    public function setLegalRepresentative($legal_representative)
    {
        $this->container['legal_representative'] = $legal_representative;

        return $this;
    }

    /**
     * Gets masked_name
     *
     * @return string
     */
    public function getMaskedName()
    {
        return $this->container['masked_name'];
    }

    /**
     * Sets masked_name
     *
     * @param string $masked_name El nombre del usuario enmascarado
     *
     * @return $this
     */
    public function setMaskedName($masked_name)
    {
        $this->container['masked_name'] = $masked_name;

        return $this;
    }

    /**
     * Gets masked_user_name
     *
     * @return string
     */
    public function getMaskedUserName()
    {
        return $this->container['masked_user_name'];
    }

    /**
     * Sets masked_user_name
     *
     * @param string $masked_user_name El nombre del usuario de acceso enmascarado
     *
     * @return $this
     */
    public function setMaskedUserName($masked_user_name)
    {
        $this->container['masked_user_name'] = $masked_user_name;

        return $this;
    }

    /**
     * Gets name
     *
     * @return string
     */
    public function getName()
    {
        return $this->container['name'];
    }

    /**
     * Sets name
     *
     * @param string $name El nombre del usuario
     *
     * @return $this
     */
    public function setName($name)
    {
        $this->container['name'] = $name;

        return $this;
    }

    /**
     * Gets phone_numbers
     *
     * @return string[]
     */
    public function getPhoneNumbers()
    {
        return $this->container['phone_numbers'];
    }

    /**
     * Sets phone_numbers
     *
     * @param string[] $phone_numbers Una lista de los teléfonos del usuario
     *
     * @return $this
     */
    public function setPhoneNumbers($phone_numbers)
    {
        $this->container['phone_numbers'] = $phone_numbers;

        return $this;
    }

    /**
     * Gets surname_father
     *
     * @return string
     */
    public function getSurnameFather()
    {
        return $this->container['surname_father'];
    }

    /**
     * Sets surname_father
     *
     * @param string $surname_father El apellido paterno del usuario
     *
     * @return $this
     */
    public function setSurnameFather($surname_father)
    {
        $this->container['surname_father'] = $surname_father;

        return $this;
    }

    /**
     * Gets surname_mother
     *
     * @return string
     */
    public function getSurnameMother()
    {
        return $this->container['surname_mother'];
    }

    /**
     * Sets surname_mother
     *
     * @param string $surname_mother El apellido materno del usuario
     *
     * @return $this
     */
    public function setSurnameMother($surname_mother)
    {
        $this->container['surname_mother'] = $surname_mother;

        return $this;
    }

    /**
     * Gets user_name
     *
     * @return string
     */
    public function getUserName()
    {
        return $this->container['user_name'];
    }

    /**
     * Sets user_name
     *
     * @param string $user_name El nombre del usuario de acceso
     *
     * @return $this
     */
    public function setUserName($user_name)
    {
        $this->container['user_name'] = $user_name;

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