<?php
/**
 * Created by IntelliJ IDEA.
 * User: arturo.zuniga
 * Date: 2019-12-02
 * Time: 20:05
 */

namespace mx\wire4\auth;


class Environment {

    const SANDBOX = "SANDBOX";
    const PRODUCTION = "PRODUCTION";
    const DEVELOP = "DEVELOP";

    private $urlToken;
    private $urlServices;
    private $environment;

    public function __construct($pointTo) {

        $this->environment = $pointTo;

        if(empty($this->environment)) {
            throw new \Exception("Environment is required...");
        }

        if($this->environment == self::DEVELOP){
            $this->urlToken = "https://development-api.wire4.mx/token";
            $this->urlServices = "https://development-api.wire4.mx/wire4/1.0.0";
        }

        if($this->environment == self::SANDBOX){
            $this->urlToken = "https://sandbox-api.wire4.mx/token";
            $this->urlServices = "https://sandbox-api.wire4.mx/wire4/1.0.0";

        }

        if($this->environment == self::PRODUCTION){
            $this->urlToken = "https://api.wire4.mx/token";
            $this->urlServices = "https://api.wire4.mx/wire4/1.0.0";
        }

    }

    /**
     * @return string
     */
    public function getUrlServices() {
        return $this->urlServices;
    }

    /**
     * @return string
     */
    public function getUrlToken() {
        return $this->urlToken;
    }

}
