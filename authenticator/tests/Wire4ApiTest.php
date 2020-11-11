<?php

/*
 * COPYRIGHT © 2017. TCPIP.
 * PATENT PENDING. ALL RIGHTS RESERVED.
 * SPEI GATEWAY IS REGISTERED TRADEMARKS OF TCPIP.
 *
 * This software is confidential and proprietary information of TCPIP.
 * You shall not disclose such Confidential Information and shall use it only
 * in accordance with the company policy.
 */

class Wire4ApiTest extends PHPUnit\Framework\TestCase {

    const OAUTH_CONSUMER_KEY = "wEw7JCxjgNbrWjb2yz74XuLCc7sa";
    const OAUTH_CONSUMER_SECRET = "qiPoEGpWNHTWpqUKfWCNJRuCNUsa";
    const USER_KEY = "bb5207b74dd408c8f0735e942c1d64@sandbox.wire4.mx";
    const SECRET_KEY = "0929ae15f964c98bb0be8240f7df68";
    const SUBSCRIPTION = "19b341dd-88b0-49a2-9997-117f553d15cd";

    /*const OAUTH_CONSUMER_KEY = "vfRyDiLwEmVjweHrZt9dLmqfov0a";
    const OAUTH_CONSUMER_SECRET = "IBPnjfZsuzJYKZRGRBDaFk7PaFca";
    const USER_KEY = "12ce7e19e434fed95d0c0858f21632@develop.wire4.mx";
    const SECRET_KEY = "506285a31cb43a1bfd105dcbb8640e";
    const SUBSCRIPTION = "19b341dd-88b0-49a2-9997-117f553d15cd";*/

    //Verified
    public function testObtainTransactionCepUsingPOST() {

        $accessToken ="";
        try {

            // Create the authenticator to obtain access token

            $oauth = new \mx\wire4\auth\OAuthWire4 (
                Wire4ApiTest::OAUTH_CONSUMER_KEY, //REPLACE THIS WITH YOUR DATA
                Wire4ApiTest::OAUTH_CONSUMER_SECRET, //REPLACE THIS WITH YOUR DATA
                \mx\wire4\auth\Environment::SANDBOX);

            // Obtain an access token use application flow and scope "general"
            $accessToken= $oauth->obtainAccessTokenApp("general");

        } catch(\OAuthException $e) {
            echo "Respuesta: ". $e->lastResponse . "\n";
        }

        $apiInstance = new \mx\wire4\client\api\ComprobanteElectrnicoDePagoCEPApi(
        // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
        // This is optional, `GuzzleHttp\Client` will be used as default.
            new \GuzzleHttp\Client()
        );

        $cepData = new \mx\wire4\client\model\CepSearchBanxico(); // \mx\wire4\client\model\CepSearchBanxico | Información para buscar un CEP
        $cepData->setAmount(8963.25);
        $cepData->setBeneficiaryAccount("072680004657656853");
        $cepData->setBeneficiaryBankKey("40072");
        $cepData->setClaveRastreo("58735618");
        $cepData->setOperationDate("05-12-2018");
        $cepData->setReference("1122334");
        $cepData->setSenderAccount("112680000156896531");
        $cepData->setSenderBankKey("40112");

        try {
            $result = $apiInstance->obtainTransactionCepUsingPOST($cepData,$accessToken);
            print_r($result);
        } catch (Exception $e) {
            echo 'Exception when calling ComprobanteElectrnicoDePagoCEPApi->obtainTransactionCepUsingPOST: ', $e->getMessage(), PHP_EOL;
        }

    }
    //Verified
    public function testSendContactUsingPOST() {

        $accessToken= "";
        try {

            // Create the authenticator to obtain access token

            $oauth = new \mx\wire4\auth\OAuthWire4 (
                Wire4ApiTest::OAUTH_CONSUMER_KEY, //REPLACE THIS WITH YOUR DATA
                Wire4ApiTest::OAUTH_CONSUMER_SECRET, //REPLACE THIS WITH YOUR DATA
                \mx\wire4\auth\Environment::SANDBOX);

            // Obtain an access token use application flow and scope "general"
            $accessToken= $oauth->obtainAccessTokenApp("general");

        } catch(OAuthException $e) {
            echo "Respuesta: ". $e->lastResponse . "\n";
        }

        $apiInstance = new \mx\wire4\client\api\ContactoApi(
        // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
        // This is optional, `GuzzleHttp\Client` will be used as default.
            new \GuzzleHttp\Client()
        );
        $requestDto = new \mx\wire4\client\model\ContactRequest(); // \mx\wire4\client\model\ContactRequest | Información del contacto

        $requestDto->setAddress("Calle Falsa 123, Col Fantasía");
        $requestDto->setCompany("Compu Mundo Hiper Mega Red");
        $requestDto->setContactPerson("Homer J Simpson");
        $requestDto->setEmail("homer.simpson@compumundohipermegared.com");
        $requestDto->setPhoneNumber("4422102030");

        try {
            $apiInstance->sendContactUsingPOST($requestDto,$accessToken);
            echo "El contacto se envio satisfactoriamente";
        } catch (Exception $e) {
            echo 'Exception when calling ContactoApi->sendContactUsingPOST: ', $e->getMessage(), PHP_EOL;
        }

    }
    //Verified
    public function testgetBeneficiariesForAccountUsingGET() {

        $accessToken = "";
        try {

            // Create the authenticator to obtain access token

            $oauth = new \mx\wire4\auth\OAuthWire4 (
                Wire4ApiTest::OAUTH_CONSUMER_KEY, //REPLACE THIS WITH YOUR DATA
                Wire4ApiTest::OAUTH_CONSUMER_SECRET, //REPLACE THIS WITH YOUR DATA
                \mx\wire4\auth\Environment::SANDBOX);

            // Obtain an access token use application flow and scope "general"
            $accessToken = $oauth->obtainAccessTokenAppUser(Wire4ApiTest::USER_KEY, //REPLACE THIS WITH YOUR DATA
                Wire4ApiTest::SECRET_KEY, //REPLACE THIS WITH YOUR DATA
                "spei_admin");

        } catch(OAuthException $e) {
            echo "Respuesta: ". $e->lastResponse . "\n";
        }

        $apiInstance = new mx\wire4\client\api\CuentasDeBeneficiariosSPEIApi(
        // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
        // This is optional, `GuzzleHttp\Client` will be used as default.
            new GuzzleHttp\Client()
        );
        $authorization = $accessToken; // string | Header para token
        $subscription = Wire4ApiTest::SUBSCRIPTION; // string | El identificador de la suscripción a esta API
        $account = null; // string | Cuenta del beneficiario, puede ser Clabe, TDD o Celular
        $beneficiary_bank = null; // string | Clave del banco beneficiario
        $beneficiary_name = null; // string | Nombre del beneficiario
        $end_date = null; // string | Fecha de inicio del perido a filtrar en formato dd-mm-yyyy
        $init_date = null; // string | Fecha de inicio del perido a filtrar en formato dd-mm-yyyy
        $rfc = null; // string | RFC del beneficiario
        $status = null; // string | Estatus de la cuenta

        try {
            $result = $apiInstance->getBeneficiariesForAccountUsingGET($authorization, $subscription, $account, $beneficiary_bank, $beneficiary_name, $end_date, $init_date, $rfc, $status);
            print_r($result);
        } catch (Exception $e) {
            echo 'Exception when calling CuentasDeBeneficiariosSPEIApi->getBeneficiariesForAccountUsingGET: ', $e->getMessage(), PHP_EOL;
        }

    }

   //Verified
  public function testdeleteAccountUsingDELETE(){

        $accessToken = "";
        try {

            // Create the authenticator to obtain access token

            $oauth = new \mx\wire4\auth\OAuthWire4 (
                Wire4ApiTest::OAUTH_CONSUMER_KEY, //REPLACE THIS WITH YOUR DATA
                Wire4ApiTest::OAUTH_CONSUMER_SECRET, //REPLACE THIS WITH YOUR DATA
                \mx\wire4\auth\Environment::SANDBOX);

            // Obtain an access token use application flow and scope "general"
            $accessToken = $oauth->obtainAccessTokenAppUser(Wire4ApiTest::USER_KEY, //REPLACE THIS WITH YOUR DATA
                Wire4ApiTest::SECRET_KEY, //REPLACE THIS WITH YOUR DATA
                "spei_admin");

        } catch(OAuthException $e) {
            echo "Respuesta: ". $e->lastResponse . "\n";
        }

        $apiInstance = new \mx\wire4\client\api\CuentasDeBeneficiariosSPEIApi(
        // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
        // This is optional, `GuzzleHttp\Client` will be used as default.
            new \GuzzleHttp\Client()
        );
        $account = "112680000156896531"; // string | La cuenta del beneciario que será eliminada
        $subscription = Wire4ApiTest::SUBSCRIPTION; // string | El identificador de la suscripción a esta API //REPLACE THIS WITH YOUR DATA

        try {
            $apiInstance->deleteAccountUsingDELETE($accessToken,$account, $subscription);
        } catch (Exception $e) {
            echo 'Exception when calling CuentasDeBeneficiariosSPEIApi->deleteAccountUsingDELETE: ', $e->getMessage(), PHP_EOL;
        }

    }

    //Verified
    public function testGetAvailableRelationshipsMonexUsingGET() {

        $accessToken = "";
        try {

            // Create the authenticator to obtain access token

            $oauth = new \mx\wire4\auth\OAuthWire4 (
                Wire4ApiTest::OAUTH_CONSUMER_KEY, //REPLACE THIS WITH YOUR DATA
                Wire4ApiTest::OAUTH_CONSUMER_SECRET, //REPLACE THIS WITH YOUR DATA
                \mx\wire4\auth\Environment::SANDBOX);

            // Obtain an access token use application flow and scope "general"
            $accessToken = $oauth->obtainAccessTokenAppUser(Wire4ApiTest::USER_KEY, //REPLACE THIS WITH YOUR DATA
                Wire4ApiTest::SECRET_KEY, //REPLACE THIS WITH YOUR DATA
                "spei_admin");

        } catch(OAuthException $e) {
            echo "Respuesta: ". $e->lastResponse . "\n";
        }

        $apiInstance = new \mx\wire4\client\api\CuentasDeBeneficiariosSPEIApi(
        // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
        // This is optional, `GuzzleHttp\Client` will be used as default.
            new \GuzzleHttp\Client()
        );

        // SUBSCRIPTION es un Identificador de la suscripción a esta API
        try {
            $result = $apiInstance->getAvailableRelationshipsMonexUsingGET($accessToken,Wire4ApiTest::SUBSCRIPTION);
            print_r($result);
        } catch (Exception $e) {
            echo 'Exception when calling CuentasDeBeneficiariosSPEIApi->getAvailableRelationshipsMonexUsingGET: ', $e->getMessage(), PHP_EOL;
        }

    }
    //Verified
    public function testgetBeneficiariesByRequestId() {

        $accessToken = "";
        try {

            // Create the authenticator to obtain access token

            $oauth = new \mx\wire4\auth\OAuthWire4 (
                Wire4ApiTest::OAUTH_CONSUMER_KEY, //REPLACE THIS WITH YOUR DATA
                Wire4ApiTest::OAUTH_CONSUMER_SECRET, //REPLACE THIS WITH YOUR DATA
                \mx\wire4\auth\Environment::SANDBOX);

            // Obtain an access token use application flow and scope "general"
            $accessToken = $oauth->obtainAccessTokenAppUser(Wire4ApiTest::USER_KEY, //REPLACE THIS WITH YOUR DATA
                Wire4ApiTest::SECRET_KEY, //REPLACE THIS WITH YOUR DATA
                "spei_admin");

        } catch(OAuthException $e) {
            echo "Respuesta: ". $e->lastResponse . "\n";
        }

        $apiInstance = new mx\wire4\client\api\CuentasDeBeneficiariosSPEIApi(
        // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
        // This is optional, `GuzzleHttp\Client` will be used as default.
            new GuzzleHttp\Client()
        );
        $authorization = $accessToken; // string | Header para token
        $request_id = "dcfab58c-ceaf-478d-9958-cee57887acf1"; // string | El identificador de la petición del registro de beneficiarios a esta API
        $subscription = Wire4ApiTest::SUBSCRIPTION; // string | El identificador de la suscripción a esta API

        try {
            $result = $apiInstance->getBeneficiariesByRequestId($authorization, $request_id, $subscription);
            print_r($result);
        } catch (Exception $e) {
            echo 'Exception when calling CuentasDeBeneficiariosSPEIApi->getBeneficiariesByRequestId: ', $e->getMessage(), PHP_EOL;
        }
    }
    // Verified
    public function testauthorizeAccountsPendingPUT() {

        $accessToken = "";
        try {

            // Create the authenticator to obtain access token

            $oauth = new \mx\wire4\auth\OAuthWire4 (
                Wire4ApiTest::OAUTH_CONSUMER_KEY, //REPLACE THIS WITH YOUR DATA
                Wire4ApiTest::OAUTH_CONSUMER_SECRET, //REPLACE THIS WITH YOUR DATA
                \mx\wire4\auth\Environment::SANDBOX);

            // Obtain an access token use application flow and scope "general"
            $accessToken = $oauth->obtainAccessTokenAppUser(Wire4ApiTest::USER_KEY, //REPLACE THIS WITH YOUR DATA
                Wire4ApiTest::SECRET_KEY, //REPLACE THIS WITH YOUR DATA
                "spei_admin");

        } catch(OAuthException $e) {
            echo "Respuesta: ". $e->lastResponse . "\n";
        }

        $apiInstance = new mx\wire4\client\api\CuentasDeBeneficiariosSPEIApi(
        // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
        // This is optional, `GuzzleHttp\Client` will be used as default.
            new GuzzleHttp\Client()
        );
        $body = new \mx\wire4\client\model\UrlsRedirect(); // \mx\wire4\client\model\UrlsRedirect | Información de la cuenta del beneficiario
        $authorization = $accessToken; // string | Header para token
        $subscription = Wire4ApiTest::SUBSCRIPTION; // string | El identificador de la suscripción a esta API
        $body->setCancelReturnUrl("https://sandbox.cuentasok.com");
        $body->setReturnUrl("https://sandbox.cuentasok.com");

        try {
            $result = $apiInstance->authorizeAccountsPendingPUT($body, $authorization, $subscription);
            print_r($result);
        } catch (Exception $e) {
            echo 'Exception when calling CuentasDeBeneficiariosSPEIApi->authorizeAccountsPendingPUT: ', $e->getMessage(), PHP_EOL;
        }
    }
    //Verified
    public function testPreRegisterAccountsUsingPOST() {

        $accessToken = "";
        try {

            // Create the authenticator to obtain access token

            $oauth = new \mx\wire4\auth\OAuthWire4 (
                Wire4ApiTest::OAUTH_CONSUMER_KEY, //REPLACE THIS WITH YOUR DATA
                Wire4ApiTest::OAUTH_CONSUMER_SECRET, //REPLACE THIS WITH YOUR DATA
                \mx\wire4\auth\Environment::SANDBOX);

            // Obtain an access token use application flow and scope "general"
            $accessToken = $oauth->obtainAccessTokenAppUser(Wire4ApiTest::USER_KEY, //REPLACE THIS WITH YOUR DATA
                Wire4ApiTest::SECRET_KEY,//REPLACE THIS WITH YOUR DATA
                "spei_admin");

        } catch(OAuthException $e) {
            echo "Respuesta: ". $e->lastResponse . "\n";
        }

        $apiInstance = new \mx\wire4\client\api\CuentasDeBeneficiariosSPEIApi(
        // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
        // This is optional, `GuzzleHttp\Client` will be used as default.
            new \GuzzleHttp\Client()
        );
        $requestDto = new \mx\wire4\client\model\AccountRequest(); // \mx\wire4\client\model\AccountRequest | Información de la cuenta del beneficiario


        $requestDto->setReturnUrl("https://your-app-url.mx/return");
        $requestDto->setCancelReturnUrl("https://your-app-url.mx/cancel");

        $account = new \mx\wire4\client\model\Account();
        $account->setAmountLimit(10000.00);
        $account->setbeneficiaryAccount("112680000156896531");

        $account->setEmail(array("beneficiary@wire4.mx"));
        $account->setKindOfRelationship("RECURRENTE");
        $account->setNumericReferenceSpei("1234567");
        $account->setPaymentConceptSpei("concept spei");

        $person = new \mx\wire4\client\model\Person();
        $person->setName("Bartolomeo");
        $person->setMiddleName("Jay");
        $person->setLastName("Simpson");
        $account->setPerson($person);

        $account->setRelationship("ACREEDOR");
        $account->setRfc("SJBA920125AB1");

        $requestDto->setAccounts(array($account));

        $subscription = Wire4ApiTest::SUBSCRIPTION; // string | El identificador de la suscripción a esta API //REPLACE THIS WITH YOUR DATA

        try {
            $result = $apiInstance->preRegisterAccountsUsingPOST($requestDto,$accessToken, $subscription);
            print_r($result);
        } catch (Exception $e) {
            echo 'Exception when calling CuentasDeBeneficiariosSPEIApi->preRegisterAccountsUsingPOST: ', $e->getMessage(), PHP_EOL;
        }

    }
    //Verified
    public function testremoveBeneficiariesPendingUsingDELETE(){

        $accessToken = "";
        try {

            // Create the authenticator to obtain access token

            $oauth = new \mx\wire4\auth\OAuthWire4 (
                Wire4ApiTest::OAUTH_CONSUMER_KEY, //REPLACE THIS WITH YOUR DATA
                Wire4ApiTest::OAUTH_CONSUMER_SECRET, //REPLACE THIS WITH YOUR DATA
                \mx\wire4\auth\Environment::SANDBOX);

            // Obtain an access token use application flow and scope "general"
            $accessToken = $oauth->obtainAccessTokenAppUser(Wire4ApiTest::USER_KEY, //REPLACE THIS WITH YOUR DATA
                Wire4ApiTest::SECRET_KEY, //REPLACE THIS WITH YOUR DATA
                "spei_admin");

        } catch(OAuthException $e) {
            echo "Respuesta: ". $e->lastResponse . "\n";
        }

        $apiInstance = new \mx\wire4\client\api\CuentasDeBeneficiariosSPEIApi(
        // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
        // This is optional, `GuzzleHttp\Client` will be used as default.
            new \GuzzleHttp\Client()
        );
        $request_id = "4bbbfe75-4952-43b2-abfe-9eb3bc115438"; // string | Identificador de los beneficiarios a eliminar
        $subscription = Wire4ApiTest::SUBSCRIPTION; // string | El identificador de la suscripción a esta API //REPLACE THIS WITH YOUR DATA

        try {
            $apiInstance->removeBeneficiariesPendingUsingDELETE($accessToken,$request_id, $subscription);
        } catch (Exception $e) {
            echo 'Exception when calling CuentasDeBeneficiariosSPEIApi->removeBeneficiariesPendingUsingDELETE: ', $e->getMessage(), PHP_EOL;
        }
    }
    //Verified
    public function testupdateAmountLimitAccountUsingPUT(){

        $accessToken = "";
        try {

            // Create the authenticator to obtain access token

            $oauth = new \mx\wire4\auth\OAuthWire4 (
                Wire4ApiTest::OAUTH_CONSUMER_KEY, //REPLACE THIS WITH YOUR DATA
                Wire4ApiTest::OAUTH_CONSUMER_SECRET, //REPLACE THIS WITH YOUR DATA
                \mx\wire4\auth\Environment::SANDBOX);

            // Obtain an access token use application flow and scope "general"
            $accessToken = $oauth->obtainAccessTokenAppUser(Wire4ApiTest::USER_KEY, //REPLACE THIS WITH YOUR DATA
                Wire4ApiTest::SECRET_KEY, //REPLACE THIS WITH YOUR DATA
                "spei_admin");

        } catch(OAuthException $e) {
            echo "Respuesta: ". $e->lastResponse . "\n";
        }

        $apiInstance = new \mx\wire4\client\api\CuentasDeBeneficiariosSPEIApi(
        // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
        // This is optional, `GuzzleHttp\Client` will be used as default.
            new \GuzzleHttp\Client()
        );
        $body = new \mx\wire4\client\model\AmountRequest(); // \mx\wire4\client\model\AmountRequest | Información de la cuenta y el monto límite a actualizar
        $body->setAmountLimit(80000.00);
        $body->setCurrencyCode("MXP");
        $body->setPreviousAmountLimit(10000.00);
        $account = "112680000156896531"; // string | Cuenta a actualizar
        $subscription = Wire4ApiTest::SUBSCRIPTION; // string | El identificador de la suscripción a esta API //REPLACE THIS WITH YOUR DATA

        try {
            $apiInstance->updateAmountLimitAccountUsingPUT($body,$accessToken, $account, $subscription);
        } catch (Exception $e) {
            echo 'Exception when calling CuentasDeBeneficiariosSPEIApi->updateAmountLimitAccountUsingPUT: ', $e->getMessage(), PHP_EOL;
        }

    }
    //Verified
    public function testpreRegisterAccountsUsingPOST_1() { //preRegisterAccountsUsingPOST_1

        $accessToken = "";
        try {

            // Create the authenticator to obtain access token

            $oauth = new \mx\wire4\auth\OAuthWire4 (
                Wire4ApiTest::OAUTH_CONSUMER_KEY, //REPLACE THIS WITH YOUR DATA
                Wire4ApiTest::OAUTH_CONSUMER_SECRET, //REPLACE THIS WITH YOUR DATA
                \mx\wire4\auth\Environment::SANDBOX);

            // Obtain an access token use application flow and scope "general"
            $accessToken = $oauth->obtainAccessTokenAppUser(Wire4ApiTest::USER_KEY, //REPLACE THIS WITH YOUR DATA
                Wire4ApiTest::SECRET_KEY, //REPLACE THIS WITH YOUR DATA
                "spid_admin"); //Se debe tener el scope de spid

        } catch(OAuthException $e) {
            echo "Respuesta: ". $e->lastResponse . "\n";
        }

        $apiInstance = new \mx\wire4\client\api\CuentasDeBeneficiariosSPIDApi(
        // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
        // This is optional, `GuzzleHttp\Client` will be used as default.
            new \GuzzleHttp\Client()
        );
        $body = new \mx\wire4\client\model\AccountSpid(); // \mx\wire4\client\model\AccountSpid | Información de la cuenta del beneficiario
        $beneficiaryInstitution = new \mx\wire4\client\model\BeneficiaryInstitution();
        $beneficiaryInstitution->setName("BMONEX"); //Nombre de la institucion bancaria de acuerdo al catalogo de wire4

        $body->setReturnUrl("https://your-app-url.mx/return");
        $body->setCancelReturnUrl("https://your-app-url.mx/cancel");
        $body->setAmountLimit(1000.00);
        $body->setBeneficiaryAccount("112680000156896531");
        $body->setInstitution( $beneficiaryInstitution);
        $body->setEmail(array("beneficiary.spid@wire4.mx"));
        $body->setKindOfRelationship("RECURRENTE");
        $body->setNumericReference("1234567");
        $body->setPaymentConcept("concept spid");
        $body->setRelationship("ACREEDOR");
        $body->setRfc("SJBA920125AB1");
        $subscription = Wire4ApiTest::SUBSCRIPTION; // string | El identificador de la suscripción a esta API //REPLACE THIS WITH YOUR DATA

        try {
            $result = $apiInstance->preRegisterAccountsUsingPOST1($body,$accessToken, $subscription);
            print_r($result);
        } catch (Exception $e) {
            echo 'Exception when calling CuentasDeBeneficiariosSPIDApi->preRegisterAccountsUsingPOST1: ', $e->getMessage(), PHP_EOL;
        }

    }
    //Verified
    public function testgetSpidBeneficiariesForAccount() {
        $accessToken = "";
        try {

            // Create the authenticator to obtain access token

            $oauth = new \mx\wire4\auth\OAuthWire4 (
                Wire4ApiTest::OAUTH_CONSUMER_KEY, //REPLACE THIS WITH YOUR DATA
                Wire4ApiTest::OAUTH_CONSUMER_SECRET, //REPLACE THIS WITH YOUR DATA
                \mx\wire4\auth\Environment::SANDBOX);

            // Obtain an access token use application flow and scope "general"
            $accessToken = $oauth->obtainAccessTokenAppUser(Wire4ApiTest::USER_KEY, //REPLACE THIS WITH YOUR DATA
                Wire4ApiTest::SECRET_KEY, //REPLACE THIS WITH YOUR DATA
                "spid_admin");

        } catch(OAuthException $e) {
            echo "Respuesta: ". $e->lastResponse . "\n";
        }

        $apiInstance = new mx\wire4\client\api\CuentasDeBeneficiariosSPIDApi(
        // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
        // This is optional, `GuzzleHttp\Client` will be used as default.
            new GuzzleHttp\Client()
        );
        $authorization = $accessToken; // string | Header para token
        $subscription = Wire4ApiTest::SUBSCRIPTION; // string | El identificador de la suscripción a esta API
        $account = null; // string | Cuenta del beneficiario, puede ser Clabe, TDD o Celular
        $beneficiary_bank = null; // string | Clave del banco beneficiario
        $beneficiary_name = null; // string | Nombre del beneficiario
        $end_date = null; // string | Fecha de inicio del perido a filtrar en formato dd-mm-yyyy
        $init_date = null; // string | Fecha de inicio del perido a filtrar en formato dd-mm-yyyy
        $rfc = null; // string | RFC del beneficiario
        $status = null; // string | Estatus de la cuenta

        try {
            $result = $apiInstance->getSpidBeneficiariesForAccount($authorization, $subscription, $account, $beneficiary_bank, $beneficiary_name, $end_date, $init_date, $rfc, $status);
            print_r($result);
        } catch (Exception $e) {
            echo 'Exception when calling CuentasDeBeneficiariosSPIDApi->getSpidBeneficiariesForAccount: ', $e->getMessage(), PHP_EOL;
        }
    }
    //Verified
    public function testgetDepositantsUsingGET() {

        $accessToken = "";
        try {

            // Create the authenticator to obtain access token

            $oauth = new \mx\wire4\auth\OAuthWire4 (
                Wire4ApiTest::OAUTH_CONSUMER_KEY, //REPLACE THIS WITH YOUR DATA
                Wire4ApiTest::OAUTH_CONSUMER_SECRET, //REPLACE THIS WITH YOUR DATA
                \mx\wire4\auth\Environment::SANDBOX);

            // Obtain an access token use application flow and scope "general"
            $accessToken = $oauth->obtainAccessTokenAppUser(Wire4ApiTest::USER_KEY, //REPLACE THIS WITH YOUR DATA
                Wire4ApiTest::SECRET_KEY, //REPLACE THIS WITH YOUR DATA
                "spei_admin");

        } catch(OAuthException $e) {
            echo "Respuesta: ". $e->lastResponse . "\n";
        }

        $apiInstance = new \mx\wire4\client\api\DepositantesApi(
        // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
        // This is optional, `GuzzleHttp\Client` will be used as default.
            new \GuzzleHttp\Client()
        );
        $subscription = Wire4ApiTest::SUBSCRIPTION; // string | El identificador de la suscripción a esta API //REPLACE THIS WITH YOUR DATA

        try {
            $result = $apiInstance->getDepositantsUsingGET($accessToken,$subscription);
            print_r($result);
        } catch (Exception $e) {
            echo 'Exception when calling DepositantesApi->getDepositantsUsingGET: ', $e->getMessage(), PHP_EOL;
        }
    }
    //Verified
    public function testregisterDepositantsUsingPOST() {

        $accessToken = "";
        try {

            // Create the authenticator to obtain access token

            $oauth = new \mx\wire4\auth\OAuthWire4 (
                Wire4ApiTest::OAUTH_CONSUMER_KEY, //REPLACE THIS WITH YOUR DATA
                Wire4ApiTest::OAUTH_CONSUMER_SECRET, //REPLACE THIS WITH YOUR DATA
                \mx\wire4\auth\Environment::SANDBOX);

            // Obtain an access token use application flow and scope "general"
            $accessToken = $oauth->obtainAccessTokenAppUser(Wire4ApiTest::USER_KEY, //REPLACE THIS WITH YOUR DATA
                Wire4ApiTest::SECRET_KEY, //REPLACE THIS WITH YOUR DATA
                "spei_admin");

        } catch(OAuthException $e) {
            echo "Respuesta: ". $e->lastResponse . "\n";
        }

        $apiInstance = new \mx\wire4\client\api\DepositantesApi(
        // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
        // This is optional, `GuzzleHttp\Client` will be used as default.
            new \GuzzleHttp\Client()
        );
        $body = new \mx\wire4\client\model\DepositantsRegister(); // \mx\wire4\client\model\DepositantsRegister | Depositant info


        $body->setAlias("Depositant 0292920");
        $body->setCurrencyCode("MXP");
        $body->setEmail(array("depositant@wire4.mx"));
        $body->setName("Marge Bouvier");

        $subscription = Wire4ApiTest::SUBSCRIPTION; // string | El identificador de la suscripción a esta API //REPLACE THIS WITH YOUR DATA

        try {
            $result = $apiInstance->registerDepositantsUsingPOST($body,$accessToken, $subscription);
            print_r($result);
        } catch (Exception $e) {
            echo 'Exception when calling DepositantesApi->registerDepositantsUsingPOST: ', $e->getMessage(), PHP_EOL;
        }

    }
    //Verified
    public function testgetAllInstitutionsUsingGET() {

        $accessToken = "";
        try {

            // Create the authenticator to obtain access token

            $oauth = new \mx\wire4\auth\OAuthWire4 (
                Wire4ApiTest::OAUTH_CONSUMER_KEY, //REPLACE THIS WITH YOUR DATA
                Wire4ApiTest::OAUTH_CONSUMER_SECRET, //REPLACE THIS WITH YOUR DATA
                \mx\wire4\auth\Environment::SANDBOX);

            // Obtain an access token use application flow and scope "general"
            $accessToken= $oauth->obtainAccessTokenApp("general");

        } catch(OAuthException $e) {
            echo "Respuesta: ". $e->lastResponse . "\n";
        }

        $apiInstance = new \mx\wire4\client\api\InstitucionesApi(
        // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
        // This is optional, `GuzzleHttp\Client` will be used as default.
            new \GuzzleHttp\Client()
        );

        try {
            $result = $apiInstance->getAllInstitutionsUsingGET($accessToken);
            print_r($result);
        } catch (Exception $e) {
            echo 'Exception when calling InstitucionesApi->getAllInstitutionsUsingGET: ', $e->getMessage(), PHP_EOL;
        }
    }
   //Verified
    public function testgetBalanceUsingGET() {

        $accessToken = "";
        try {

            // Create the authenticator to obtain access token

            $oauth = new \mx\wire4\auth\OAuthWire4 (
                Wire4ApiTest::OAUTH_CONSUMER_KEY, //REPLACE THIS WITH YOUR DATA
                Wire4ApiTest::OAUTH_CONSUMER_SECRET, //REPLACE THIS WITH YOUR DATA
                \mx\wire4\auth\Environment::SANDBOX);

            // Obtain an access token use application flow and scope "general"
            $accessToken = $oauth->obtainAccessTokenAppUser(Wire4ApiTest::USER_KEY, //REPLACE THIS WITH YOUR DATA
                Wire4ApiTest::SECRET_KEY, //REPLACE THIS WITH YOUR DATA
                "spei_admin");

        } catch(OAuthException $e) {
            echo "Respuesta: ". $e->lastResponse . "\n";
        }

        $apiInstance = new \mx\wire4\client\api\SaldoApi(
        // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
        // This is optional, `GuzzleHttp\Client` will be used as default.
            new \GuzzleHttp\Client()
        );
        $subscription = Wire4ApiTest::SUBSCRIPTION; // string | El identificador de la suscripción a esta API //REPLACE THIS WITH YOUR DATA

        try {
            $result = $apiInstance->getBalanceUsingGET($accessToken,$subscription);
            print_r($result);
        } catch (Exception $e) {
            echo 'Exception when calling SaldoApi->getBalanceUsingGET: ', $e->getMessage(), PHP_EOL;
        }

    }
    //Verified
    public function testpreEnrollmentMonexUserUsingPOST() {

        $accessToken = "";
        try {

            // Create the authenticator to obtain access token

            $oauth = new \mx\wire4\auth\OAuthWire4 (
                Wire4ApiTest::OAUTH_CONSUMER_KEY, //REPLACE THIS WITH YOUR DATA
                Wire4ApiTest::OAUTH_CONSUMER_SECRET, //REPLACE THIS WITH YOUR DATA
                \mx\wire4\auth\Environment::SANDBOX);

            // Obtain an access token use application flow and scope "general"
            $accessToken = $oauth->obtainAccessTokenApp("general");

        } catch(OAuthException $e) {
            echo "Respuesta: ". $e->lastResponse . "\n";
        }

        $apiInstance = new \mx\wire4\client\api\SuscripcionesApi(
        // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
        // This is optional, `GuzzleHttp\Client` will be used as default.
            new \GuzzleHttp\Client()
        );
        $body = new \mx\wire4\client\model\PreEnrollmentData(); // \mx\wire4\client\model\PreEnrollmentData | Información para el enrolamiento

        $body->setCancelReturnUrl("https://your-app-url.mx/return");
        $body->setReturnUrl("https://your-app-url.mx/cancel");

        try {
            $result = $apiInstance->preEnrollmentMonexUserUsingPOST($body,$accessToken);
            print_r($result);
        } catch (Exception $e) {
            echo 'Exception when calling SuscripcionesApi->preEnrollmentMonexUserUsingPOST: ', $e->getMessage(), PHP_EOL;
        }
    }
    //Verified
    public function testremoveSubscriptionPendingStatusUsingDELETE() {

        $accessToken = "";
        try {

            // Create the authenticator to obtain access token

            $oauth = new \mx\wire4\auth\OAuthWire4 (
                Wire4ApiTest::OAUTH_CONSUMER_KEY, //REPLACE THIS WITH YOUR DATA
                Wire4ApiTest::OAUTH_CONSUMER_SECRET, //REPLACE THIS WITH YOUR DATA
                \mx\wire4\auth\Environment::SANDBOX);

            // Obtain an access token use application flow and scope "general"
            $accessToken = $oauth->obtainAccessTokenApp("general");

        } catch(OAuthException $e) {
            echo "Respuesta: ". $e->lastResponse . "\n";
        }

        $apiInstance = new \mx\wire4\client\api\SuscripcionesApi(
        // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
        // This is optional, `GuzzleHttp\Client` will be used as default.
            new \GuzzleHttp\Client()
        );
        $subscription = "be0996b4-abd9-414c-b3a0-cf45ae14fc72"; // string | El identificador de la suscripción a esta API //REPLACE THIS WITH YOUR DATA

        try {
            $apiInstance->removeSubscriptionPendingStatusUsingDELETE($accessToken,$subscription);
        } catch (Exception $e) {
            echo 'Exception when calling SuscripcionesApi->removeSubscriptionPendingStatusUsingDELETE: ', $e->getMessage(), PHP_EOL;
        }

    }
    //Verified
    public function testremoveEnrollmentUserUsingDELETE() {

        $accessToken = "";
        try {

            // Create the authenticator to obtain access token

            $oauth = new \mx\wire4\auth\OAuthWire4 (
                Wire4ApiTest::OAUTH_CONSUMER_KEY, //REPLACE THIS WITH YOUR DATA
                Wire4ApiTest::OAUTH_CONSUMER_SECRET, //REPLACE THIS WITH YOUR DATA
                \mx\wire4\auth\Environment::SANDBOX);

            // Obtain an access token use application flow and scope "spei_admin"
            $accessToken = $oauth->obtainAccessTokenAppUser('59e59961e5644a296ed0ff11ef20a7@sandbox.wire4.mx', //REPLACE THIS WITH YOUR DATA
                '0f2fc184a264cad997f4b3ddbd1853',"spei_admin"); //REPLACE THIS WITH YOUR DATA

        } catch(OAuthException $e) {
            echo "Respuesta: ". $e->lastResponse . "\n";
        }

        $apiInstance = new \mx\wire4\client\api\SuscripcionesApi(
        // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
        // This is optional, `GuzzleHttp\Client` will be used as default.
            new \GuzzleHttp\Client()
        );
        $subscription = "31a066a5-ef31-4c29-9963-228a49ee6890"; // string | El identificador de la suscripción a esta API //REPLACE THIS WITH YOUR DATA

        try {
            $apiInstance->removeEnrollmentUserUsingDELETE($accessToken,$subscription);
        } catch (Exception $e) {
            echo 'Exception when calling SuscripcionesApi->removeEnrollmentUserUsingDELETE: ', $e->getMessage(), PHP_EOL;
        }

    }
    //Verified
    public function testincomingSpeiTransactionsReportUsingGET() {

        $accessToken = "";
        try {

            // Create the authenticator to obtain access token

            $oauth = new \mx\wire4\auth\OAuthWire4 (
                Wire4ApiTest::OAUTH_CONSUMER_KEY, //REPLACE THIS WITH YOUR DATA
                Wire4ApiTest::OAUTH_CONSUMER_SECRET, //REPLACE THIS WITH YOUR DATA
                \mx\wire4\auth\Environment::SANDBOX);

            // Obtain an access token use application flow and scope "spei_admin"
            $accessToken = $oauth->obtainAccessTokenAppUser(Wire4ApiTest::USER_KEY, //REPLACE THIS WITH YOUR DATA
                Wire4ApiTest::SECRET_KEY, //REPLACE THIS WITH YOUR DATA
                "spei_admin");

        } catch(OAuthException $e) {
            echo "Respuesta: ". $e->lastResponse . "\n";
        }

        $apiInstance = new \mx\wire4\client\api\TransferenciasSPEIApi(
        // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
        // This is optional, `GuzzleHttp\Client` will be used as default.
            new \GuzzleHttp\Client()
        );

        $subscription = Wire4ApiTest::SUBSCRIPTION; // string | El identificador de la suscripción a esta API //REPLACE THIS WITH YOUR DATA

        try {
            $result = $apiInstance->incomingSpeiTransactionsReportUsingGET($accessToken,$subscription);
            print_r($result);
        } catch (Exception $e) {
            echo 'Exception when calling TransferenciasSPEIApi->incomingSpeiTransactionsReportUsingGET: ', $e->getMessage(), PHP_EOL;
        }
    }
    //Verified
    public function testoutgoingSpeiTransactionsReportUsingGET() {

        $accessToken = "";
        try {

            // Create the authenticator to obtain access token

            $oauth = new \mx\wire4\auth\OAuthWire4 (
                Wire4ApiTest::OAUTH_CONSUMER_KEY, //REPLACE THIS WITH YOUR DATA
                Wire4ApiTest::OAUTH_CONSUMER_SECRET, //REPLACE THIS WITH YOUR DATA
                \mx\wire4\auth\Environment::SANDBOX);

            // Obtain an access token use application flow and scope "spei_admin"
            $accessToken = $oauth->obtainAccessTokenAppUser(Wire4ApiTest::USER_KEY, //REPLACE THIS WITH YOUR DATA
                Wire4ApiTest::SECRET_KEY, //REPLACE THIS WITH YOUR DATA
                "spei_admin");

        } catch(OAuthException $e) {
            echo "Respuesta: ". $e->lastResponse . "\n";
        }

        $apiInstance = new \mx\wire4\client\api\TransferenciasSPEIApi(
        // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
        // This is optional, `GuzzleHttp\Client` will be used as default.
            new \GuzzleHttp\Client()
        );
        $subscription = Wire4ApiTest::SUBSCRIPTION; // string | El identificador de la suscripción a esta API //REPLACE THIS WITH YOUR DATA
        $order_id = null; // string | Identificador de la orden a buscar //REPLACE THIS WITH YOUR DATA

        try {
            $result = $apiInstance->outgoingSpeiTransactionsReportUsingGET($accessToken,$subscription, $order_id);
            print_r($result);
        } catch (Exception $e) {
            echo 'Exception when calling TransferenciasSPEIApi->outgoingSpeiTransactionsReportUsingGET: ', $e->getMessage(), PHP_EOL;
        }
    }
    //Verified
    public function testregisterOutgoingSpeiTransactionUsingPOST() {

        $accessToken = "";
        try {

            // Create the authenticator to obtain access token

            $oauth = new \mx\wire4\auth\OAuthWire4 (
                Wire4ApiTest::OAUTH_CONSUMER_KEY, //REPLACE THIS WITH YOUR DATA
                Wire4ApiTest::OAUTH_CONSUMER_SECRET, //REPLACE THIS WITH YOUR DATA
                \mx\wire4\auth\Environment::SANDBOX);

            // Obtain an access token use application flow and scope "spei_admin"
            $accessToken = $oauth->obtainAccessTokenAppUser(Wire4ApiTest::USER_KEY, //REPLACE THIS WITH YOUR DATA
                Wire4ApiTest::SECRET_KEY, //REPLACE THIS WITH YOUR DATA
                "spei_admin");

        } catch(OAuthException $e) {
            echo "Respuesta: ". $e->lastResponse . "\n";
        }

        $apiInstance = new \mx\wire4\client\api\TransferenciasSPEIApi(
        // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
        // This is optional, `GuzzleHttp\Client` will be used as default.
            new \GuzzleHttp\Client()
        );
        $body = new \mx\wire4\client\model\TransactionsOutgoingRegister(); // \mx\wire4\client\model\TransactionsOutgoingRegister | Información de las transferencias SPEI de salida


        $body->setReturnUrl("https://your-app-url.mx/return");
        $body->setCancelReturnUrl("https://your-app-url.mx/cancel");

        $transaction = new \mx\wire4\client\model\TransactionOutgoing();
        $transaction->setOrderId("33fd6a2a-abeb-4072-8405-348b0850f669");
        $transaction->setAmount(120.25);
        $transaction->setBeneficiaryAccount("112680000189999984");
        $transaction->setCurrencyCode("MXP");
        $transaction->setEmail(array("notificar@wire4.mx"));
        $transaction->setConcept("Transfer out test 1");
        $transaction->setReference(1234567);

        $body->setTransactions(array($transaction));

        $subscription = Wire4ApiTest::SUBSCRIPTION; // string | El identificador de la suscripción a esta API //REPLACE THIS WITH YOUR DATA

        try {
            $result = $apiInstance->registerOutgoingSpeiTransactionUsingPOST($body,$accessToken, $subscription);
            print_r($result);
        } catch (Exception $e) {
            echo 'Exception when calling TransferenciasSPEIApi->registerOutgoingSpeiTransactionUsingPOST: ', $e->getMessage(), PHP_EOL;
        }
    }
    //Verified
    public function testcreateAuthorizationTransactionsGroup() {

        $accessToken = "";
        try {

            // Create the authenticator to obtain access token

            $oauth = new \mx\wire4\auth\OAuthWire4 (
                Wire4ApiTest::OAUTH_CONSUMER_KEY, //REPLACE THIS WITH YOUR DATA
                Wire4ApiTest::OAUTH_CONSUMER_SECRET, //REPLACE THIS WITH YOUR DATA
                \mx\wire4\auth\Environment::SANDBOX);

            // Obtain an access token use application flow and scope "general"
            $accessToken = $oauth->obtainAccessTokenAppUser(Wire4ApiTest::USER_KEY, //REPLACE THIS WITH YOUR DATA
                Wire4ApiTest::SECRET_KEY, //REPLACE THIS WITH YOUR DATA
                "spei_admin");

        } catch(OAuthException $e) {
            echo "Respuesta: ". $e->lastResponse . "\n";
        }

        $apiInstance = new mx\wire4\client\api\TransferenciasSPEIApi(
        // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
        // This is optional, `GuzzleHttp\Client` will be used as default.
            new GuzzleHttp\Client()
        );
        $body = new \mx\wire4\client\model\AuthorizationTransactionGroup(); // \mx\wire4\client\model\AuthorizationTransactionGroup | authorizationTransactionsGroupRequestDTO
        $authorization = $accessToken; // string | Header para token
        $subscription = Wire4ApiTest::SUBSCRIPTION; // string | Identificador de la suscripcion

        $urlsRedirect = new \mx\wire4\client\model\UrlsRedirect();
        $urlsRedirect->setReturnUrl("https://sandbox.cuentasok.com");
        $urlsRedirect->setCancelReturnUrl("https://sandbox.cuentasok.com");

        $body->setTransactions(array("33fd6a2a-abeb-4072-8405-348b0850f668","33fd6a2a-abeb-4072-8405-348b0850f669"));
        $body->setRedirectUrls($urlsRedirect);

        try {
            $result = $apiInstance->createAuthorizationTransactionsGroup($body, $authorization, $subscription);
            print_r($result);
        } catch (Exception $e) {
            echo 'Exception when calling TransferenciasSPEIApi->createAuthorizationTransactionsGroup: ', $e->getMessage(), PHP_EOL;
        }
    }
    //Verified
    public function testdropTransactionsPendingUsingDELETE() {

        $accessToken = "";
        try {

            // Create the authenticator to obtain access token

            $oauth = new \mx\wire4\auth\OAuthWire4 (
                Wire4ApiTest::OAUTH_CONSUMER_KEY, //REPLACE THIS WITH YOUR DATA
                Wire4ApiTest::OAUTH_CONSUMER_SECRET, //REPLACE THIS WITH YOUR DATA
                \mx\wire4\auth\Environment::SANDBOX);

            // Obtain an access token use application flow and scope "spei_admin"
            $accessToken = $oauth->obtainAccessTokenAppUser(Wire4ApiTest::USER_KEY, //REPLACE THIS WITH YOUR DATA
                Wire4ApiTest::SECRET_KEY, //REPLACE THIS WITH YOUR DATA
                "spei_admin");

        } catch(OAuthException $e) {
            echo "Respuesta: ". $e->lastResponse . "\n";
        }

        $apiInstance = new \mx\wire4\client\api\TransferenciasSPEIApi(
        // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
        // This is optional, `GuzzleHttp\Client` will be used as default.
            new \GuzzleHttp\Client()
        );
        $request_id = "05c9422a-b5fe-4454-b849-d3e18b11a7d2"; // string | Identificador de las transferencias a eliminar //REPLACE THIS WITH YOUR DATA
        $subscription = Wire4ApiTest::SUBSCRIPTION; // string | El identificador de la suscripción a esta API //REPLACE THIS WITH YOUR DATA

        try {
            $apiInstance->dropTransactionsPendingUsingDELETE($accessToken,$request_id, $subscription);
        } catch (Exception $e) {
            echo 'Exception when calling TransferenciasSPEIApi->dropTransactionsPendingUsingDELETE: ', $e->getMessage(), PHP_EOL;
        }
    }
    //Verified
    public function testgetSpidClassificationsUsingGET() {


        $accessToken = "";
        try {

            // Create the authenticator to obtain access token

            $oauth = new \mx\wire4\auth\OAuthWire4 (
                Wire4ApiTest::OAUTH_CONSUMER_KEY, //REPLACE THIS WITH YOUR DATA
                Wire4ApiTest::OAUTH_CONSUMER_SECRET, //REPLACE THIS WITH YOUR DATA
                \mx\wire4\auth\Environment::SANDBOX);

            // Obtain an access token use application flow and scope "spid_admin"
            $accessToken = $oauth->obtainAccessTokenAppUser(Wire4ApiTest::USER_KEY, //REPLACE THIS WITH YOUR DATA
                Wire4ApiTest::SECRET_KEY, //REPLACE THIS WITH YOUR DATA
                "spid_admin");

        } catch(OAuthException $e) {
            echo "Respuesta: ". $e->lastResponse . "\n";
        }

        $apiInstance = new \mx\wire4\client\api\TransferenciasSPIDApi(
        // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
        // This is optional, `GuzzleHttp\Client` will be used as default.
            new \GuzzleHttp\Client()
        );
        $subscription = Wire4ApiTest::SUBSCRIPTION; // string | El identificador de la suscripción a esta API //REPLACE THIS WITH YOUR DATA

        try {
            $result = $apiInstance->getSpidClassificationsUsingGET($accessToken,$subscription);
            print_r($result);
        } catch (Exception $e) {
            echo 'Exception when calling TransferenciasSPIDApi->getSpidClassificationsUsingGET: ', $e->getMessage(), PHP_EOL;
        }
    }
    //Verified
    public function testregisterOutgoingSpidTransactionUsingPOST() {

        $accessToken = "";
        try {

            // Create the authenticator to obtain access token

            $oauth = new \mx\wire4\auth\OAuthWire4 (
                Wire4ApiTest::OAUTH_CONSUMER_KEY, //REPLACE THIS WITH YOUR DATA
                Wire4ApiTest::OAUTH_CONSUMER_SECRET, //REPLACE THIS WITH YOUR DATA
                \mx\wire4\auth\Environment::SANDBOX);


            // Obtain an access token use application flow and scope "spid_admin"
            $accessToken = $oauth->obtainAccessTokenAppUser(Wire4ApiTest::USER_KEY, //REPLACE THIS WITH YOUR DATA
                Wire4ApiTest::SECRET_KEY, //REPLACE THIS WITH YOUR DATA
                "spid_admin");

        } catch(OAuthException $e) {
            echo "Respuesta: ". $e->lastResponse . "\n";
        }

        $apiInstance = new \mx\wire4\client\api\TransferenciasSPIDApi(
        // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
        // This is optional, `GuzzleHttp\Client` will be used as default.
            new \GuzzleHttp\Client()
        );
        $body = new \mx\wire4\client\model\TransactionOutgoingSpid(); // \mx\wire4\client\model\TransactionOutgoingSpid | Información de las transferencias SPID de salida

        $body->setReturnUrl("https://your-app-url.mx/return");
        $body->setCancelReturnUrl("https://your-app-url.mx/cancel");
        $body->setOrderId("8A736A1D-ECA6-4959-93FE-794365F53E35");
        $body->setAmount(120.25);
        $body->setBeneficiaryAccount("112680000189999984");
        $body->setCurrencyCode("USD");
        $body->setEmail(array("notificar@wire4.mx"));
        $body->setClassificationId("01");
        $body->setNumericReferenceSpid(1234567);
        $body->setPaymentConceptSpid("Transfer out test 1");

        $subscription = Wire4ApiTest::SUBSCRIPTION; // string | El identificador de la suscripción a esta API //REPLACE THIS WITH YOUR DATA

        try {
            $result = $apiInstance->registerOutgoingSpidTransactionUsingPOST($body,$accessToken, $subscription);
            print_r($result);
        } catch (Exception $e) {
            echo 'Exception when calling TransferenciasSPIDApi->registerOutgoingSpidTransactionUsingPOST: ', $e->getMessage(), PHP_EOL;
        }

    }
    //Verified
    public function testgetWebhook() {


        $accessToken = "";
        try {

            // Create the authenticator to obtain access token

            $oauth = new \mx\wire4\auth\OAuthWire4 (
                Wire4ApiTest::OAUTH_CONSUMER_KEY, //REPLACE THIS WITH YOUR DATA
                Wire4ApiTest::OAUTH_CONSUMER_SECRET, //REPLACE THIS WITH YOUR DATA
                \mx\wire4\auth\Environment::SANDBOX);

            // Obtain an access token use application flow and scope "general"
            $accessToken = $oauth->obtainAccessTokenApp("general");

        } catch(OAuthException $e) {
            echo "Respuesta: ". $e->lastResponse . "\n";
        }

        $apiInstance = new \mx\wire4\client\api\WebhooksApi(
        // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
        // This is optional, `GuzzleHttp\Client` will be used as default.
            new \GuzzleHttp\Client()
        );
        $id = "wh_3838229e10774e428c037d39c2cb167b"; // string | Identificador del webhook //REPLACE THIS WITH YOUR DATA

        try {
            $result = $apiInstance->getWebhook($accessToken,$id);
            print_r($result);
        } catch (Exception $e) {
            echo 'Exception when calling WebhooksApi->getWebhook: ', $e->getMessage(), PHP_EOL;
        }

    }
    //Verified
    public function testgetWebhooks() {


        $accessToken = "";
        try {

            // Create the authenticator to obtain access token

            $oauth = new \mx\wire4\auth\OAuthWire4 (
                Wire4ApiTest::OAUTH_CONSUMER_KEY, //REPLACE THIS WITH YOUR DATA
                Wire4ApiTest::OAUTH_CONSUMER_SECRET, //REPLACE THIS WITH YOUR DATA
                \mx\wire4\auth\Environment::SANDBOX);

            // Obtain an access token use application flow and scope "general"
            $accessToken = $oauth->obtainAccessTokenApp("general");

        } catch(OAuthException $e) {
            echo "Respuesta: ". $e->lastResponse . "\n";
        }

        $apiInstance = new \mx\wire4\client\api\WebhooksApi(
        // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
        // This is optional, `GuzzleHttp\Client` will be used as default.
            new \GuzzleHttp\Client()
        );

        try {
            $result = $apiInstance->getWebhooks($accessToken);
            print_r($result);
        } catch (Exception $e) {
            echo 'Exception when calling WebhooksApi->getWebhooks: ', $e->getMessage(), PHP_EOL;
        }

    }
    //Verified
    public function testregisterWebhook() {

        $accessToken = "";
        try {

            // Create the authenticator to obtain access token

            $oauth = new \mx\wire4\auth\OAuthWire4 (
                Wire4ApiTest::OAUTH_CONSUMER_KEY, //REPLACE THIS WITH YOUR DATA
                Wire4ApiTest::OAUTH_CONSUMER_SECRET, //REPLACE THIS WITH YOUR DATA
                \mx\wire4\auth\Environment::SANDBOX);


            // Obtain an access token use application flow and scope "general"
            $accessToken = $oauth->obtainAccessTokenApp("general");

        } catch(OAuthException $e) {
            echo "Respuesta: ". $e->lastResponse . "\n";
        }

        $apiInstance = new \mx\wire4\client\api\WebhooksApi(
        // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
        // This is optional, `GuzzleHttp\Client` will be used as default.
            new GuzzleHttp\Client()
        );
        $body = new \mx\wire4\client\model\WebhookRequest(); // \mx\wire4\client\model\WebhookRequest | Información para registrar un Webhook


        $body->setName("TEST-SDK-WEBHOOK-REGISTER");
        $body->setUrl("https://en0fpu357pjff.x.pipedream.net");
        $body->setEvents(array(
            "ACCOUNT.CREATED",
            "TRANSACTION.OUTGOING.RECEIVED",
            "ENROLLMENT.CREATED"));

        try {
            $result = $apiInstance->registerWebhook($body,$accessToken);
            print_r($result);
        } catch (Exception $e) {
            echo 'Exception when calling WebhooksApi->registerWebhook: ', $e->getMessage(), PHP_EOL;
        }
    }
    //Verified
    public function testbillingsReportByIdUsingGET() {

        $accessToken = "";
        try {

            // Create the authenticator to obtain access token

            $oauth = new \mx\wire4\auth\OAuthWire4 (
                Wire4ApiTest::OAUTH_CONSUMER_KEY, //REPLACE THIS WITH YOUR DATA
                Wire4ApiTest::OAUTH_CONSUMER_SECRET, //REPLACE THIS WITH YOUR DATA
                \mx\wire4\auth\Environment::SANDBOX);

            // Obtain an access token use application flow and scope "general"
            $accessToken = $oauth->obtainAccessTokenApp("general");

        } catch(OAuthException $e) {
            echo "Respuesta: ". $e->lastResponse . "\n";
        }

        $apiInstance = new \mx\wire4\client\api\FacturasApi(
        // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
        // This is optional, `GuzzleHttp\Client` will be used as default.
            new \GuzzleHttp\Client()
        );
        $id = "65203279-9A2F-43D6-87A5-81BBCC481D80"; // string | Identificador uuid de la factura //REPLACE THIS WITH YOUR DATA

        try {
            $result = $apiInstance->billingsReportByIdUsingGET($accessToken,$id);
            print_r($result);
        } catch (Exception $e) {
            echo 'Exception when calling FacturasApi->billingsReportByIdUsingGET: ', $e->getMessage(), PHP_EOL;
        }

    }
    //Verified
    public function testbillingsReportUsingGET(){

        $accessToken = "";
        try {

            // Create the authenticator to obtain access token

            $oauth = new \mx\wire4\auth\OAuthWire4 (
                Wire4ApiTest::OAUTH_CONSUMER_KEY, //REPLACE THIS WITH YOUR DATA
                Wire4ApiTest::OAUTH_CONSUMER_SECRET, //REPLACE THIS WITH YOUR DATA
                \mx\wire4\auth\Environment::SANDBOX);

            // Obtain an access token use application flow and scope "general"
            $accessToken = $oauth->obtainAccessTokenApp("general");

        } catch(OAuthException $e) {
            echo "Respuesta: ". $e->lastResponse . "\n";
        }


        $apiInstance = new \mx\wire4\client\api\FacturasApi(
        // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
        // This is optional, `GuzzleHttp\Client` will be used as default.
            new \GuzzleHttp\Client()
        );
        $period = "2019-10"; // string | Filtro de fecha yyyy-MM

        try {
            $result = $apiInstance->billingsReportUsingGET($accessToken,$period);
            print_r($result);
        } catch (Exception $e) {
            echo 'Exception when calling FacturasApi->billingsReportUsingGET: ', $e->getMessage(), PHP_EOL;
        }
    }
    //Verified
    public function testsignWebhooks() {

        $message = "{\"id\":\"evt_641296342fdbf2db40ce674dde4881b87ada81b1695ae1c54666578272c1cd10\",\"object\":\"spid_outgoing\",\"api_version\":\"1.0.0\",\"created\":\"2019-12-05T11:55:10.058-06:00\",\"data\":{\"account\":\"8999998\",\"amount\":120.25,\"currency_code\":\"USD\",\"monex_description\":\"Nombre Receptor: BANAMEX | Monto Pago: 120.25 | Cuenta beneficiaria: 112680000189999984 | Nombre Beneficiario: notificar@wire4.mx | Clave de Rastreo:  | Referencia Numerica: 1234567 | Concepto del pago: Transfer out test 1 | Fecha Confirmacion de Liquidacion: 05-12-2019 11:55:10\",\"detention_message\":\"Cuenta de beneficiario, no existe\",\"payment_order_id\":1427991983,\"status_code\":\"FAILED\",\"transaction_id\":704814938,\"beneficiary_account\":\"112680000189999984\",\"beneficiary_bank\":{\"key\":\"40112\",\"name\":\"BMONEX\",\"company_name\":\"BANCO MONEX S.A. INSTITUCION DE BANCA MULTIPLE, MONEX GRUPO FINANCIERO\",\"rfc\":\"BMI9704113PA\"},\"beneficiary_name\":\"notificar@wire4.mx\",\"concept\":\"Transfer out test 1\",\"order_id\":\"8A736A1D-ECA6-4959-93FE-794365F53E24\",\"reference\":1234567,\"request_id\":\"7dbf528d-b395-4779-924e-b182a4de17a5\",\"cep\":{}},\"livemode\":false,\"pending_webhooks\":0,\"request\":\"8A736A1D-ECA6-4959-93FE-794365F53E24\",\"type\":\"TRANSACTION.OUTGOING.SPID.RECEIVED\"}";
        $referenceString = "7c088d16a8a25f1640e95dfdce65770cb0a31dc0e71a9749bba1e4e114201efb6e78c50bea3d8d9337b8ea63b2a8abf5b1e03d0cf9dda6f8e83a509d1ac11908";
        $key = "wh_6b5cb70ab7fd489a8bd0c9d06513008e";

        $signResult = \mx\wire4\auth\webhooks\sign\UtilsCompute::toExadecimal(
            \mx\wire4\auth\webhooks\sign\UtilsCompute::computeHmacSha512($message, $key));

        var_dump($signResult);

        if( ! \mx\wire4\auth\webhooks\sign\UtilsCompute::compareSignatures($referenceString,$signResult) ) {
            echo "Las firmas no son iguales:";

        } else {
            echo "Las validacion de firmas es correcta";
        }

        echo "\noriginal:".$referenceString;
        echo "\nresultado:".$signResult;

    }

    public function testoutCommingSpeiRequestIdTransactionsReportUsingGET() {

        $accessToken = "";
        try {

            // Create the authenticator to obtain access token

            $oauth = new \mx\wire4\auth\OAuthWire4 (
                Wire4ApiTest::OAUTH_CONSUMER_KEY, //REPLACE THIS WITH YOUR DATA
                Wire4ApiTest::OAUTH_CONSUMER_SECRET, //REPLACE THIS WITH YOUR DATA
                \mx\wire4\auth\Environment::SANDBOX);

            // Obtain an access token use application flow and scope "spei_admin"
            $accessToken = $oauth->obtainAccessTokenAppUser(Wire4ApiTest::USER_KEY, //REPLACE THIS WITH YOUR DATA
                Wire4ApiTest::SECRET_KEY, //REPLACE THIS WITH YOUR DATA
                "spei_admin");


        } catch(OAuthException $e) {
            echo "Respuesta: ". $e->lastResponse . "\n";
        }

        $apiInstance = new \mx\wire4\client\api\TransferenciasSPEIApi(
        // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
        // This is optional, `GuzzleHttp\Client` will be used as default.
            new \GuzzleHttp\Client()
        );
        $request_id = "80b6571b-ef00-446c-889c-34dc79ff3a54"; // string | Identificador de la petición a buscar //REPLACE THIS WITH YOUR DATA
        $subscription = Wire4ApiTest::SUBSCRIPTION; // string | El identificador de la suscripción a esta API //REPLACE THIS WITH YOUR DATA

        try {
            $result = $apiInstance->outCommingSpeiRequestIdTransactionsReportUsingGET($accessToken,$request_id,$subscription);
            print_r($result);
        } catch (Exception $e) {
            echo 'Exception when calling TransferenciasSPEIApi->outgoingSpeiTransactionsReportUsingGET: ', $e->getMessage(), PHP_EOL;
        }
    }
    // EJMEPLOS CODI
    public function testregisterCompanyUsingPOST() {

        $accessToken = "";
        try {

            // Create the authenticator to obtain access token

            $oauth = new \mx\wire4\auth\OAuthWire4 (
                Wire4ApiTest::OAUTH_CONSUMER_KEY, //REPLACE THIS WITH YOUR DATA
                Wire4ApiTest::OAUTH_CONSUMER_SECRET, //REPLACE THIS WITH YOUR DATA
                \mx\wire4\auth\Environment::DEVELOP);

            // Obtain an access token use application flow and scope "codi_general"
            $accessToken = $oauth->obtainAccessTokenApp("codi_general");


        } catch(OAuthException $e) {
            echo "Respuesta: ". $e->lastResponse . "\n";
        }

        $apiInstance = new mx\wire4\client\api\EmpresasCoDiApi(
        // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
        // This is optional, `GuzzleHttp\Client` will be used as default.
            new GuzzleHttp\Client()
        );
        $apiInstance->getConfig()->setHost("https://development-api.wire4.mx/wire4/1.0.0");
        $body = new \mx\wire4\client\model\CompanyRequested(); // \mx\wire4\client\model\CompanyRequested | Información de la cuenta del beneficiario
        $authorization = $accessToken; // string | Header para token
        $certificadoDeBanxico = new \mx\wire4\client\model\CertificateRequest();

        //Estos son datos proporcionados por Banxico o por su proveedor del servicio
        $certificadoDeBanxico->setAlias("00000100001004030999");
        $certificadoDeBanxico->setCertificateNumber("0000010000100002799");
        $certificadoDeBanxico->setCheckDigit("1");
        $certificadoDeBanxico->setCipherData("fsjIsaa/ypeS/5Il5WN1iFxwNE6PQhdC5IZoyFCNOh6MVQcx+g9nri+SHbedQXSIAU3HHk9d5CJJuVSGPvOZyoMK3wwaXJmg9LjO3Uu7RGNqharVrsj70vcJvvdy3SVoOWd6BsEFe4eiiPzC3nhvCKcMX1GaKkwUO6STuN9QqRrxGv+7tkcGZbXZMA07iO0eZo0LBHPgxY6wsRQP4scvwwLzMqZ4Orzn+ehmpWF/hx63XmgYpASy4qjcKxLkrwgPEJb3nIKRmMOodfSLF7idAchm4SKeEoYvjE2yF//7IuXh/CR15QoIyYlBggbdQbURFqKC1c1PfxMnUlSJzPCKUg==");
        $body->setCertificate($certificadoDeBanxico);
        $body->setBusinessName("Ejemplo Codi");
        $body->setComercialName("Ejemplo de Empresa CODI  S.A de C.V");
        $body->setRfc("EJEI201002AA2");

        try {
            $result = $apiInstance->registerCompanyUsingPOST($body, $authorization);
            print_r($result);
        } catch (Exception $e) {
            echo 'Exception when calling EmpresasCoDiApi->registerCompanyUsingPOST: ', $e->getMessage(), PHP_EOL;
        }
    }

    public function testobtainCompanies() {

        $accessToken = "";
        try {

            // Create the authenticator to obtain access token

            $oauth = new \mx\wire4\auth\OAuthWire4 (
                Wire4ApiTest::OAUTH_CONSUMER_KEY, //REPLACE THIS WITH YOUR DATA
                Wire4ApiTest::OAUTH_CONSUMER_SECRET, //REPLACE THIS WITH YOUR DATA
                \mx\wire4\auth\Environment::DEVELOP);

            // Obtain an access token use application flow and scope "codi_general"
            $accessToken = $oauth->obtainAccessTokenApp("codi_general");


        } catch(OAuthException $e) {
            echo "Respuesta: ". $e->lastResponse . "\n";
        }

        $apiInstance = new mx\wire4\client\api\EmpresasCoDiApi(
        // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
        // This is optional, `GuzzleHttp\Client` will be used as default.
            new GuzzleHttp\Client()
        );
        $apiInstance->getConfig()->setHost("https://development-api.wire4.mx/wire4/1.0.0");
        $authorization = $accessToken; // string | Header para token

        try {
            $result = $apiInstance->obtainCompanies($authorization);
            print_r($result);
        } catch (Exception $e) {
            echo 'Exception when calling EmpresasCoDiApi->obtainCompanies: ', $e->getMessage(), PHP_EOL;
        }

    }

    public function testcreateSalesPoint() {

        $accessToken = "";
        try {

            // Create the authenticator to obtain access token

            $oauth = new \mx\wire4\auth\OAuthWire4 (
                Wire4ApiTest::OAUTH_CONSUMER_KEY, //REPLACE THIS WITH YOUR DATA
                Wire4ApiTest::OAUTH_CONSUMER_SECRET, //REPLACE THIS WITH YOUR DATA
                \mx\wire4\auth\Environment::DEVELOP);

            // Obtain an access token use application flow and scope "codi_general"
            $accessToken = $oauth->obtainAccessTokenApp("codi_general");


        } catch(OAuthException $e) {
            echo "Respuesta: ". $e->lastResponse . "\n";
        }
        $apiInstance = new mx\wire4\client\api\PuntosDeVentaCoDiApi(
        // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
        // This is optional, `GuzzleHttp\Client` will be used as default.
            new GuzzleHttp\Client()
        );
        $apiInstance->getConfig()->setHost("https://development-api.wire4.mx/wire4/1.0.0");
        $body = new \mx\wire4\client\model\SalesPointRequest(); // \mx\wire4\client\model\SalesPointRequest | Información del punto de venta CODI®
        $authorization = $accessToken; // string | Header para token
        $company_id = "ece66431-48af-4dc9-bd7d-4c26bab3080c"; // string | El identificador de la empresa que se obtuvo al crearla

        $body->setName("Sucursal Centro");
        $body->setAccessIp("127.0.0.1");
        $body->setAccount("030843123456789131");
        $body->setNotificationsUrl("https://webhook.site/10761622-8035-45cd-be01-48ee4cf6cdf9");

        try {
            $result = $apiInstance->createSalesPoint($body, $authorization, $company_id);
            print_r($result);
        } catch (Exception $e) {
            echo 'Exception when calling PuntosDeVentaCoDiApi->createSalesPoint: ', $e->getMessage(), PHP_EOL;
        }
    }

    public function testobtainSalePoints() {

        $accessToken = "";
        try {

            // Create the authenticator to obtain access token

            $oauth = new \mx\wire4\auth\OAuthWire4 (
                Wire4ApiTest::OAUTH_CONSUMER_KEY, //REPLACE THIS WITH YOUR DATA
                Wire4ApiTest::OAUTH_CONSUMER_SECRET, //REPLACE THIS WITH YOUR DATA
                \mx\wire4\auth\Environment::DEVELOP);

            // Obtain an access token use application flow and scope "codi_general"
            $accessToken = $oauth->obtainAccessTokenApp("codi_general");


        } catch(OAuthException $e) {
            echo "Respuesta: ". $e->lastResponse . "\n";
        }

        $apiInstance = new mx\wire4\client\api\PuntosDeVentaCoDiApi(
        // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
        // This is optional, `GuzzleHttp\Client` will be used as default.
            new GuzzleHttp\Client()
        );
        $apiInstance->getConfig()->setHost("https://development-api.wire4.mx/wire4/1.0.0");
        $authorization = $accessToken; // string | Header para token
        $company_id = "ece66431-48af-4dc9-bd7d-4c26bab3080c"; // string | El identificador de la empresa

        try {
            $result = $apiInstance->obtainSalePoints($authorization, $company_id);
            print_r($result);
        } catch (Exception $e) {
            echo 'Exception when calling PuntosDeVentaCoDiApi->obtainSalePoints: ', $e->getMessage(), PHP_EOL;
        }
    }

    public function testgenerateCodiCodeQR() {

        $accessToken = "";
        try {

            // Create the authenticator to obtain access token

            $oauth = new \mx\wire4\auth\OAuthWire4 (
                Wire4ApiTest::OAUTH_CONSUMER_KEY, //REPLACE THIS WITH YOUR DATA
                Wire4ApiTest::OAUTH_CONSUMER_SECRET, //REPLACE THIS WITH YOUR DATA
                \mx\wire4\auth\Environment::DEVELOP);

            // Obtain an access token use application user flow and scope "codi_admin"
            $accessToken = $oauth->obtainAccessTokenAppUser(Wire4ApiTest::USER_KEY, Wire4ApiTest::SECRET_KEY, "codi_admin");


        } catch(OAuthException $e) {
            echo "Respuesta: ". $e->lastResponse . "\n";
        }

        $apiInstance = new mx\wire4\client\api\PeticionesDePagoPorCoDiApi(
        // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
        // This is optional, `GuzzleHttp\Client` will be used as default.
            new GuzzleHttp\Client()
        );
        $apiInstance->getConfig()->setHost("https://development-api.wire4.mx/wire4/1.0.0");
        $body = new \mx\wire4\client\model\CodiCodeRequestDTO(); // \mx\wire4\client\model\CodiCodeRequestDTO | Información del pago CODI®
        $authorization = $accessToken; // string | Header para token
        $sales_point_id = "08c17691-af35-4b5f-a748-cdf65d60c2d6"; // string | Identificador del punto de venta

        $body->setAmount(888.88);
        $body->setConcept("Ejemplo CODI SDK PHP");
        $body->setDueDate("2020-08-25T23:59:00"); // Debe ser mayor a la fecha actual
        $body->setOrderId(uniqid());
        $body->setPhoneNumber(5532302648);
        $body->setType("QR_CODE"); // los posibles valores son QR_CODE y PUSH_NOTIFICATION

        try {
            $result = $apiInstance->generateCodiCodeQR($body, $authorization, $sales_point_id);
            print_r($result);
        } catch (Exception $e) {
            echo 'Exception when calling PeticionesDePagoPorCoDiApi->generateCodiCodeQR: ', $e->getMessage(), PHP_EOL;
        }
    }

    public function testconsultCodiRequestByOrderId() {

        $accessToken = "";
        try {

            // Create the authenticator to obtain access token

            $oauth = new \mx\wire4\auth\OAuthWire4 (
                Wire4ApiTest::OAUTH_CONSUMER_KEY, //REPLACE THIS WITH YOUR DATA
                Wire4ApiTest::OAUTH_CONSUMER_SECRET, //REPLACE THIS WITH YOUR DATA
                \mx\wire4\auth\Environment::DEVELOP);

            // Obtain an access token use application user flow and scope "codi_admin"
            $accessToken = $oauth->obtainAccessTokenAppUser(Wire4ApiTest::USER_KEY, Wire4ApiTest::SECRET_KEY, "codi_admin");


        } catch(OAuthException $e) {
            echo "Respuesta: ". $e->lastResponse . "\n";
        }

        $apiInstance = new mx\wire4\client\api\PeticionesDePagoPorCoDiApi(
        // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
        // This is optional, `GuzzleHttp\Client` will be used as default.
            new GuzzleHttp\Client()
        );
        $apiInstance->getConfig()->setHost("https://development-api.wire4.mx/wire4/1.0.0");
        $authorization = $accessToken; // string | Header para token
        $order_id = "5f453e0726f6b"; // string | Identificador del pago CODI®
        $sales_point_id = "08c17691-af35-4b5f-a748-cdf65d60c2d6"; // string | Identificador del punto de venta

        try {
            $result = $apiInstance->consultCodiRequestByOrderId($authorization, $order_id, $sales_point_id);
            print_r($result);
        } catch (Exception $e) {
            echo 'Exception when calling PeticionesDePagoPorCoDiApi->consultCodiRequestByOrderId: ', $e->getMessage(), PHP_EOL;
        }

    }

    public function testconsultCodiOperations() {

        $accessToken = "";
        try {

            // Create the authenticator to obtain access token

            $oauth = new \mx\wire4\auth\OAuthWire4 (
                Wire4ApiTest::OAUTH_CONSUMER_KEY, //REPLACE THIS WITH YOUR DATA
                Wire4ApiTest::OAUTH_CONSUMER_SECRET, //REPLACE THIS WITH YOUR DATA
                \mx\wire4\auth\Environment::DEVELOP);

            // Obtain an access token use application report flow and scope "codi_report"
            $accessToken = $oauth->obtainAccessTokenAppUser(Wire4ApiTest::USER_KEY, Wire4ApiTest::SECRET_KEY, "codi_report");


        } catch(OAuthException $e) {
            echo "Respuesta: ". $e->lastResponse . "\n";
        }

        $apiInstance = new mx\wire4\client\api\OperacionesCoDiApi(
        // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
        // This is optional, `GuzzleHttp\Client` will be used as default.
            new GuzzleHttp\Client()
        );
        $apiInstance->getConfig()->setHost("https://development-api.wire4.mx/wire4/1.0.0");
        $authorization = $accessToken; // string | Header para token
        $body = new \mx\wire4\client\model\CodiOperationsFiltersRequestDTO(); // \mx\wire4\client\model\CodiOperationsFiltersRequestDTO | Filtros de busqueda
        $company_id = "ece66431-48af-4dc9-bd7d-4c26bab3080c"; // string | Identificador de empresa CoDi
        $page = 0; // string | Número de pago
        $sales_point_id = "08c17691-af35-4b5f-a748-cdf65d60c2d6"; // string | Identificador del punto de venta
        $size = "50"; // string | Tamaño de pagina

        try {
            $result = $apiInstance->consultCodiOperations($authorization, $body, $company_id, $page, $sales_point_id, $size);
            print_r($result);
        } catch (Exception $e) {
            echo 'Exception when calling OperacionesCoDiApi->consultCodiOperations: ', $e->getMessage(), PHP_EOL;
        }

    }

    public function testcreateAuthorization() {

        $accessToken = "";
        try {

            // Create the authenticator to obtain access token

            $oauth = new \mx\wire4\auth\OAuthWire4 (
                Wire4ApiTest::OAUTH_CONSUMER_KEY, //REPLACE THIS WITH YOUR DATA
                Wire4ApiTest::OAUTH_CONSUMER_SECRET, //REPLACE THIS WITH YOUR DATA
                \mx\wire4\auth\Environment::DEVELOP);

            // Obtain an access token use application flow and scope "codi_general"
            $accessToken = $oauth->obtainAccessTokenApp("general");


        } catch(OAuthException $e) {
            echo "Respuesta: ". $e->lastResponse . "\n";
        }

        $apiInstance = new mx\wire4\client\api\ContractsDetailsApi(
        // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
        // This is optional, `GuzzleHttp\Client` will be used as default.
            new GuzzleHttp\Client()
        );
        $apiInstance->getConfig()->setHost("https://development-api.wire4.mx/wire4/1.0.0");
        $body = new \mx\wire4\client\model\PreMonexAuthorization(); // \mx\wire4\client\model\PreMonexAuthorization | Información para la autorización
        $authorization = $accessToken; // string | Header para token

        $body->setRfc("ONBI201002AA2");
        $body->setBusinessName("Ejemplo de Empresa CODI  S.A de C.V");
        $body->setReturnUrl("https://webhook.site/10761622-8035-45cd-be01-48ee4cf6cdf9");
        $body->setCancelReturnUrl("https://webhook.site/10761622-8035-45cd-be01-48ee4cf6cdf9");

        try {
            $result = $apiInstance->createAuthorization($body, $authorization);
            print_r($result);
        } catch (Exception $e) {
            echo 'Exception when calling ContractsDetailsApi->createAuthorization: ', $e->getMessage(), PHP_EOL;
        }
    }

    public function testobtainAuthorizedUsers(){

        $accessToken = "";
        try {

            // Create the authenticator to obtain access token

            $oauth = new \mx\wire4\auth\OAuthWire4 (
                Wire4ApiTest::OAUTH_CONSUMER_KEY, //REPLACE THIS WITH YOUR DATA
                Wire4ApiTest::OAUTH_CONSUMER_SECRET, //REPLACE THIS WITH YOUR DATA
                \mx\wire4\auth\Environment::DEVELOP);

            // Obtain an access token use application flow and scope "codi_general"
            $accessToken = $oauth->obtainAccessTokenApp("general");


        } catch(OAuthException $e) {
            echo "Respuesta: ". $e->lastResponse . "\n";
        }

        $apiInstance = new mx\wire4\client\api\ContractsDetailsApi(
        // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
        // This is optional, `GuzzleHttp\Client` will be used as default.
            new GuzzleHttp\Client()
        );
        $apiInstance->getConfig()->setHost("https://development-api.wire4.mx/wire4/1.0.0");
        $authorization = $accessToken; // string | Header para token
        $x_access_key = "Arzuco#1"; // string | La llave de acceso de la aplicación
        $request_id = "5569a11f-c17e-497e-8b31-acb403a54276"; // string | El identificador de la petición a esta API

        try {
            $result = $apiInstance->obtainAuthorizedUsers($authorization, $x_access_key, $request_id);
            print_r($result);
        } catch (Exception $e) {
            echo 'Exception when calling ContractsDetailsApi->obtainAuthorizedUsers: ', $e->getMessage(), PHP_EOL;
        }

    }

    public function testobtainContractDetails() {

        $accessToken = "";
        try {

            // Create the authenticator to obtain access token

            $oauth = new \mx\wire4\auth\OAuthWire4 (
                Wire4ApiTest::OAUTH_CONSUMER_KEY, //REPLACE THIS WITH YOUR DATA
                Wire4ApiTest::OAUTH_CONSUMER_SECRET, //REPLACE THIS WITH YOUR DATA
                \mx\wire4\auth\Environment::DEVELOP);

            // Obtain an access token use application flow and scope "codi_general"
            $accessToken = $oauth->obtainAccessTokenApp("general");


        } catch(OAuthException $e) {
            echo "Respuesta: ". $e->lastResponse . "\n";
        }

        $apiInstance = new mx\wire4\client\api\ContractsDetailsApi(
        // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
        // This is optional, `GuzzleHttp\Client` will be used as default.
            new GuzzleHttp\Client()
        );
        $apiInstance->getConfig()->setHost("https://development-api.wire4.mx/wire4/1.0.0");
        $body = new \mx\wire4\client\model\ContractDetailRequest(); // \mx\wire4\client\model\ContractDetailRequest | Información para obtener los detalles de la companía
        $authorization = $accessToken; // string | Header para token
        $x_access_key = "YcJRdmXIt2SiZHxkCM+G3fK+EeRCIC1W"; // string | La llave de acceso de la aplicación

        $body->setContract("1234567");
        $body->setPassword("prueba12");
        $body->setTokenCode("12345678");
        $body->setUserName("amolina");

        try {
            $result = $apiInstance->obtainContractDetails($body, $authorization, $x_access_key);
            print_r($result);
        } catch (Exception $e) {
            echo 'Exception when calling ContractsDetailsApi->obtainContractDetails: ', $e->getMessage(), PHP_EOL;
        }

    }
    //Verified
    public function testChangeSubscriptionStatusUsingPUT() {

        $accessToken= "";
        try {

            // Create the authenticator to obtain access token

            $oauth = new \mx\wire4\auth\OAuthWire4 (
                Wire4ApiTest::OAUTH_CONSUMER_KEY, //REPLACE THIS WITH YOUR DATA
                Wire4ApiTest::OAUTH_CONSUMER_SECRET, //REPLACE THIS WITH YOUR DATA
                \mx\wire4\auth\Environment::SANDBOX);

            // Obtain an access token use application flow and scope "general"
            $accessToken= $oauth->obtainAccessTokenApp("general");

        } catch(OAuthException $e) {
            echo "Respuesta: ". $e->lastResponse . "\n";
        }

        $apiInstance = new \mx\wire4\client\api\SuscripcionesApi(
        // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
        // This is optional, `GuzzleHttp\Client` will be used as default.
            new \GuzzleHttp\Client()
        );
        $requestDto = new \mx\wire4\client\model\SubscriptionChangeStatusRequest(); // \mx\wire4\client\model\ContactRequest | Información del contacto
        $requestDto->setStatus(\mx\wire4\client\model\SubscriptionChangeStatusRequest::STATUS_INACTIVE);

        try {
            $apiInstance->changeSubscriptionStatusUsingPUTWithHttpInfo($requestDto,$accessToken, Wire4ApiTest::SUBSCRIPTION);
            echo "El contacto se envio satisfactoriamente";
        } catch (Exception $e) {
            echo 'Exception when calling ContactoApi->sendContactUsingPOST: ', $e->getMessage(), PHP_EOL;
        }

    }

}