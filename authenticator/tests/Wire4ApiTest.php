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


    public function testTrueAssertsToTrue() {

        $this->assertTrue(true);
    }

    public function testObtainTransactionCepUsingPOST() {

        try {

            // Create the authenticator to obtain access token

            $oauth = new mx\wire4\OAuthWire4(
                Wire4ApiTest::OAUTH_CONSUMER_KEY, //REPLACE THIS WITH YOUR DATA
                Wire4ApiTest::OAUTH_CONSUMER_SECRET, //REPLACE THIS WITH YOUR DATA
                \mx\wire4\Environment::SANDBOX);

            // Obtain an access token use application flow and scope "general"
            $accessToken= $oauth->obtainAccessTokenApp("general");

        } catch(OAuthException $e) {
            echo "Respuesta: ". $e->lastResponse . "\n";
        }

        // Configure OAuth2 access token for authorization: wire4_aut_app
        $config = mx\wire4\Configuration::getDefaultConfiguration()->setAccessToken($accessToken);


        $apiInstance = new \mx\wire4\client\api\ComprobanteElectrnicoDePagoCEPApi(
        // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
        // This is optional, `GuzzleHttp\Client` will be used as default.
            new GuzzleHttp\Client(),
            $config
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
            $result = $apiInstance->obtainTransactionCepUsingPOST($cepData);
            print_r($result);
        } catch (Exception $e) {
            echo 'Exception when calling ComprobanteElectrnicoDePagoCEPApi->obtainTransactionCepUsingPOST: ', $e->getMessage(), PHP_EOL;
        }

    }

    public function testSendContactUsingPOST() {

        try {

            // Create the authenticator to obtain access token

            $oauth = new mx\wire4\OAuthWire4(
                Wire4ApiTest::OAUTH_CONSUMER_KEY, //REPLACE THIS WITH YOUR DATA
                Wire4ApiTest::OAUTH_CONSUMER_SECRET, //REPLACE THIS WITH YOUR DATA
                \mx\wire4\Environment::SANDBOX);

            // Obtain an access token use application flow and scope "general"
            $accessToken= $oauth->obtainAccessTokenApp("general");

        } catch(OAuthException $e) {
            echo "Respuesta: ". $e->lastResponse . "\n";
        }

        // Configure OAuth2 access token for authorization: wire4_aut_app
        $config = mx\wire4\Configuration::getDefaultConfiguration()->setAccessToken($accessToken);

        $apiInstance = new \mx\wire4\client\api\ContactoApi(
        // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
        // This is optional, `GuzzleHttp\Client` will be used as default.
            new GuzzleHttp\Client(),
            $config
        );
        $requestDto = new \mx\wire4\client\model\ContactRequest(); // \mx\wire4\client\model\ContactRequest | Información del contacto

        $requestDto->setAddress("Calle Falsa 123, Col Fantasía");
        $requestDto->setCompany("Compu Mundo Hiper Mega Red");
        $requestDto->setContactPerson("Homer J Simpson");
        $requestDto->setEmail("homer.simpson@compumundohipermegared.com");
        $requestDto->setPhoneNumber("4422102030");

        try {
            $apiInstance->sendContactUsingPOST($requestDto);
            echo "El contacto se envio satisfactoriamente";
        } catch (Exception $e) {
            echo 'Exception when calling ContactoApi->sendContactUsingPOST: ', $e->getMessage(), PHP_EOL;
        }

    }

    public function testGetAvailableRelationshipsMonexUsingGET() {

        try {

            // Create the authenticator to obtain access token

            $oauth = new mx\wire4\OAuthWire4(
                Wire4ApiTest::OAUTH_CONSUMER_KEY, //REPLACE THIS WITH YOUR DATA
                Wire4ApiTest::OAUTH_CONSUMER_SECRET, //REPLACE THIS WITH YOUR DATA
                \mx\wire4\Environment::SANDBOX);

            // Obtain an access token use application flow and scope "general"
            $accessToken = $oauth->obtainAccessTokenAppUser(Wire4ApiTest::USER_KEY, //REPLACE THIS WITH YOUR DATA
                Wire4ApiTest::SECRET_KEY, //REPLACE THIS WITH YOUR DATA
                "spei_admin");

        } catch(OAuthException $e) {
            echo "Respuesta: ". $e->lastResponse . "\n";
        }

        // Configure OAuth2 access token for authorization: wire4_aut_app_user_spei
        $config = mx\wire4\Configuration::getDefaultConfiguration()->setAccessToken($accessToken);

        $apiInstance = new \mx\wire4\client\api\CuentasDeBeneficiariosSPEIApi(
        // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
        // This is optional, `GuzzleHttp\Client` will be used as default.
            new GuzzleHttp\Client(),
            $config
        );

        // SUBSCRIPTION es un Identificador de la suscripción a esta API
        try {
            $result = $apiInstance->getAvailableRelationshipsMonexUsingGET(Wire4ApiTest::SUBSCRIPTION);
            print_r($result);
        } catch (Exception $e) {
            echo 'Exception when calling CuentasDeBeneficiariosSPEIApi->getAvailableRelationshipsMonexUsingGET: ', $e->getMessage(), PHP_EOL;
        }

    }

    public function testPreRegisterAccountsUsingPOST() {

        try {

            // Create the authenticator to obtain access token

            $oauth = new mx\wire4\OAuthWire4(
                Wire4ApiTest::OAUTH_CONSUMER_KEY, //REPLACE THIS WITH YOUR DATA
                Wire4ApiTest::OAUTH_CONSUMER_SECRET, //REPLACE THIS WITH YOUR DATA
                \mx\wire4\Environment::SANDBOX);

            // Obtain an access token use application flow and scope "general"
            $accessToken = $oauth->obtainAccessTokenAppUser(Wire4ApiTest::USER_KEY, //REPLACE THIS WITH YOUR DATA
                Wire4ApiTest::SECRET_KEY,//REPLACE THIS WITH YOUR DATA
                "spei_admin");

        } catch(OAuthException $e) {
            echo "Respuesta: ". $e->lastResponse . "\n";
        }

        // Configure OAuth2 access token for authorization: wire4_aut_app_user_spei
        $config = mx\wire4\Configuration::getDefaultConfiguration()->setAccessToken($accessToken);

        $apiInstance = new \mx\wire4\client\api\CuentasDeBeneficiariosSPEIApi(
        // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
        // This is optional, `GuzzleHttp\Client` will be used as default.
            new GuzzleHttp\Client(),
            $config
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
            $result = $apiInstance->preRegisterAccountsUsingPOST($requestDto, $subscription);
            print_r($result);
        } catch (Exception $e) {
            echo 'Exception when calling CuentasDeBeneficiariosSPEIApi->preRegisterAccountsUsingPOST: ', $e->getMessage(), PHP_EOL;
        }

    }

    public function testgetBeneficiariesForAccountUsingGET() {

        try {

            // Create the authenticator to obtain access token

            $oauth = new mx\wire4\OAuthWire4(
                Wire4ApiTest::OAUTH_CONSUMER_KEY, //REPLACE THIS WITH YOUR DATA
                Wire4ApiTest::OAUTH_CONSUMER_SECRET, //REPLACE THIS WITH YOUR DATA
                \mx\wire4\Environment::SANDBOX);

            // Obtain an access token use application flow and scope "general"
            $accessToken = $oauth->obtainAccessTokenAppUser(Wire4ApiTest::USER_KEY, //REPLACE THIS WITH YOUR DATA
                Wire4ApiTest::SECRET_KEY, //REPLACE THIS WITH YOUR DATA
                "spei_admin");

        } catch(OAuthException $e) {
            echo "Respuesta: ". $e->lastResponse . "\n";
        }

        // Configure OAuth2 access token for authorization: wire4_aut_app_user_spei
        $config = mx\wire4\Configuration::getDefaultConfiguration()->setAccessToken($accessToken);

        $apiInstance = new mx\wire4\client\api\CuentasDeBeneficiariosSPEIApi(
        // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
        // This is optional, `GuzzleHttp\Client` will be used as default.
            new GuzzleHttp\Client(),
            $config
        );
        $subscription = Wire4ApiTest::SUBSCRIPTION; // string | El identificador de la suscripción a esta API //REPLACE THIS WITH YOUR DATA
        $rfc = ""; // string | RFC del beneficiario

        try {
            $result = $apiInstance->getBeneficiariesForAccountUsingGET($subscription, $rfc);
            print_r($result);
        } catch (Exception $e) {
            echo 'Exception when calling CuentasDeBeneficiariosSPEIApi->getBeneficiariesForAccountUsingGET: ', $e->getMessage(), PHP_EOL;
        }

    }

    public function testdeleteAccountUsingDELETE(){

        try {

            // Create the authenticator to obtain access token

            $oauth = new mx\wire4\OAuthWire4(
                Wire4ApiTest::OAUTH_CONSUMER_KEY, //REPLACE THIS WITH YOUR DATA
                Wire4ApiTest::OAUTH_CONSUMER_SECRET, //REPLACE THIS WITH YOUR DATA
                \mx\wire4\Environment::SANDBOX);

            // Obtain an access token use application flow and scope "general"
            $accessToken = $oauth->obtainAccessTokenAppUser(Wire4ApiTest::USER_KEY, //REPLACE THIS WITH YOUR DATA
                Wire4ApiTest::SECRET_KEY, //REPLACE THIS WITH YOUR DATA
                "spei_admin");

        } catch(OAuthException $e) {
            echo "Respuesta: ". $e->lastResponse . "\n";
        }

        // Configure OAuth2 access token for authorization: wire4_aut_app_user_spei
        $config = mx\wire4\Configuration::getDefaultConfiguration()->setAccessToken($accessToken);

        $apiInstance = new mx\wire4\client\api\CuentasDeBeneficiariosSPEIApi(
        // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
        // This is optional, `GuzzleHttp\Client` will be used as default.
            new GuzzleHttp\Client(),
            $config
        );
        $account = "112680000156896531"; // string | La cuenta del beneciario que será eliminada
        $subscription = Wire4ApiTest::SUBSCRIPTION; // string | El identificador de la suscripción a esta API //REPLACE THIS WITH YOUR DATA

        try {
            $apiInstance->deleteAccountUsingDELETE($account, $subscription);
        } catch (Exception $e) {
            echo 'Exception when calling CuentasDeBeneficiariosSPEIApi->deleteAccountUsingDELETE: ', $e->getMessage(), PHP_EOL;
        }

    }

    public function testremoveBeneficiariesPendingUsingDELETE(){

        try {

            // Create the authenticator to obtain access token

            $oauth = new mx\wire4\OAuthWire4(
                Wire4ApiTest::OAUTH_CONSUMER_KEY, //REPLACE THIS WITH YOUR DATA
                Wire4ApiTest::OAUTH_CONSUMER_SECRET, //REPLACE THIS WITH YOUR DATA
                \mx\wire4\Environment::SANDBOX);

            // Obtain an access token use application flow and scope "general"
            $accessToken = $oauth->obtainAccessTokenAppUser(Wire4ApiTest::USER_KEY, //REPLACE THIS WITH YOUR DATA
                Wire4ApiTest::SECRET_KEY, //REPLACE THIS WITH YOUR DATA
                "spei_admin");

        } catch(OAuthException $e) {
            echo "Respuesta: ". $e->lastResponse . "\n";
        }

        // Configure OAuth2 access token for authorization: wire4_aut_app_user_spei
        $config = mx\wire4\Configuration::getDefaultConfiguration()->setAccessToken($accessToken);

        $apiInstance = new mx\wire4\client\api\CuentasDeBeneficiariosSPEIApi(
        // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
        // This is optional, `GuzzleHttp\Client` will be used as default.
            new GuzzleHttp\Client(),
            $config
        );
        $request_id = "ac24c501-021d-4eff-8310-262119d5c5da"; // string | Identificador de los beneficiarios a eliminar
        $subscription = Wire4ApiTest::SUBSCRIPTION; // string | El identificador de la suscripción a esta API //REPLACE THIS WITH YOUR DATA

        try {
            $apiInstance->removeBeneficiariesPendingUsingDELETE($request_id, $subscription);
        } catch (Exception $e) {
            echo 'Exception when calling CuentasDeBeneficiariosSPEIApi->removeBeneficiariesPendingUsingDELETE: ', $e->getMessage(), PHP_EOL;
        }
    }

    public function testupdateAmountLimitAccountUsingPUT(){

        try {

            // Create the authenticator to obtain access token

            $oauth = new mx\wire4\OAuthWire4(
                Wire4ApiTest::OAUTH_CONSUMER_KEY, //REPLACE THIS WITH YOUR DATA
                Wire4ApiTest::OAUTH_CONSUMER_SECRET, //REPLACE THIS WITH YOUR DATA
                \mx\wire4\Environment::SANDBOX);

            // Obtain an access token use application flow and scope "general"
            $accessToken = $oauth->obtainAccessTokenAppUser(Wire4ApiTest::USER_KEY, //REPLACE THIS WITH YOUR DATA
                Wire4ApiTest::SECRET_KEY, //REPLACE THIS WITH YOUR DATA
                "spei_admin");

        } catch(OAuthException $e) {
            echo "Respuesta: ". $e->lastResponse . "\n";
        }

        // Configure OAuth2 access token for authorization: wire4_aut_app_user_spei
        $config = mx\wire4\Configuration::getDefaultConfiguration()->setAccessToken($accessToken);

        $apiInstance = new mx\wire4\client\api\CuentasDeBeneficiariosSPEIApi(
        // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
        // This is optional, `GuzzleHttp\Client` will be used as default.
            new GuzzleHttp\Client(),
            $config
        );
        $body = new \mx\wire4\client\model\AmountRequest(); // \mx\wire4\client\model\AmountRequest | Información de la cuenta y el monto límite a actualizar
        $body->setAmountLimit(80000.00);
        $body->setCurrencyCode("MXP");
        $body->setPreviousAmountLimit(10000.00);
        $account = "112680000156896531"; // string | Cuenta a actualizar
        $subscription = Wire4ApiTest::SUBSCRIPTION; // string | El identificador de la suscripción a esta API //REPLACE THIS WITH YOUR DATA

        try {
            $apiInstance->updateAmountLimitAccountUsingPUT($body, $account, $subscription);
        } catch (Exception $e) {
            echo 'Exception when calling CuentasDeBeneficiariosSPEIApi->updateAmountLimitAccountUsingPUT: ', $e->getMessage(), PHP_EOL;
        }

    }

    public function testpreRegisterAccountsUsingPOST_1() { //preRegisterAccountsUsingPOST_1

        try {

            // Create the authenticator to obtain access token

            $oauth = new mx\wire4\OAuthWire4(
                Wire4ApiTest::OAUTH_CONSUMER_KEY, //REPLACE THIS WITH YOUR DATA
                Wire4ApiTest::OAUTH_CONSUMER_SECRET, //REPLACE THIS WITH YOUR DATA
                \mx\wire4\Environment::SANDBOX);

            // Obtain an access token use application flow and scope "general"
            $accessToken = $oauth->obtainAccessTokenAppUser(Wire4ApiTest::USER_KEY, //REPLACE THIS WITH YOUR DATA
                Wire4ApiTest::SECRET_KEY, //REPLACE THIS WITH YOUR DATA
                "spid_admin"); //Se debe tener el scope de spid

        } catch(OAuthException $e) {
            echo "Respuesta: ". $e->lastResponse . "\n";
        }

        // Configure OAuth2 access token for authorization: wire4_aut_app_user_spid
        $config = mx\wire4\Configuration::getDefaultConfiguration()->setAccessToken($accessToken);

        $apiInstance = new mx\wire4\client\api\CuentasDeBeneficiariosSPIDApi(
        // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
        // This is optional, `GuzzleHttp\Client` will be used as default.
            new GuzzleHttp\Client(),
            $config
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
            $result = $apiInstance->preRegisterAccountsUsingPOST1($body, $subscription);
            print_r($result);
        } catch (Exception $e) {
            echo 'Exception when calling CuentasDeBeneficiariosSPIDApi->preRegisterAccountsUsingPOST1: ', $e->getMessage(), PHP_EOL;
        }

    }

    public function testgetDepositantsUsingGET() {

        try {

            // Create the authenticator to obtain access token

            $oauth = new mx\wire4\OAuthWire4(
                Wire4ApiTest::OAUTH_CONSUMER_KEY, //REPLACE THIS WITH YOUR DATA
                Wire4ApiTest::OAUTH_CONSUMER_SECRET, //REPLACE THIS WITH YOUR DATA
                \mx\wire4\Environment::SANDBOX);

            // Obtain an access token use application flow and scope "general"
            $accessToken = $oauth->obtainAccessTokenAppUser(Wire4ApiTest::USER_KEY, //REPLACE THIS WITH YOUR DATA
                Wire4ApiTest::SECRET_KEY, //REPLACE THIS WITH YOUR DATA
                "spei_admin");

        } catch(OAuthException $e) {
            echo "Respuesta: ". $e->lastResponse . "\n";
        }

        // Configure OAuth2 access token for authorization: wire4_aut_app_user_spei
        $config = mx\wire4\Configuration::getDefaultConfiguration()->setAccessToken($accessToken);

        $apiInstance = new mx\wire4\client\api\DepositantesApi(
        // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
        // This is optional, `GuzzleHttp\Client` will be used as default.
            new GuzzleHttp\Client(),
            $config
        );
        $subscription = Wire4ApiTest::SUBSCRIPTION; // string | El identificador de la suscripción a esta API //REPLACE THIS WITH YOUR DATA

        try {
            $result = $apiInstance->getDepositantsUsingGET($subscription);
            print_r($result);
        } catch (Exception $e) {
            echo 'Exception when calling DepositantesApi->getDepositantsUsingGET: ', $e->getMessage(), PHP_EOL;
        }
    }

    public function testregisterDepositantsUsingPOST() {

        try {

            // Create the authenticator to obtain access token

            $oauth = new mx\wire4\OAuthWire4(
                Wire4ApiTest::OAUTH_CONSUMER_KEY, //REPLACE THIS WITH YOUR DATA
                Wire4ApiTest::OAUTH_CONSUMER_SECRET, //REPLACE THIS WITH YOUR DATA
                \mx\wire4\Environment::SANDBOX);

            // Obtain an access token use application flow and scope "general"
            $accessToken = $oauth->obtainAccessTokenAppUser(Wire4ApiTest::USER_KEY, //REPLACE THIS WITH YOUR DATA
                Wire4ApiTest::SECRET_KEY, //REPLACE THIS WITH YOUR DATA
                "spei_admin");

        } catch(OAuthException $e) {
            echo "Respuesta: ". $e->lastResponse . "\n";
        }

        // Configure OAuth2 access token for authorization: wire4_aut_app_user_spei
        $config = mx\wire4\Configuration::getDefaultConfiguration()->setAccessToken($accessToken);

        $apiInstance = new mx\wire4\client\api\DepositantesApi(
        // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
        // This is optional, `GuzzleHttp\Client` will be used as default.
            new GuzzleHttp\Client(),
            $config
        );
        $body = new \mx\wire4\client\model\DepositantsRegister(); // \mx\wire4\client\model\DepositantsRegister | Depositant info


        $body->setAlias("Depositant 0292920");
        $body->setCurrencyCode("MXP");
        $body->setEmail(array("depositant@wire4.mx"));
        $body->setName("Marge Bouvier");

        $subscription = Wire4ApiTest::SUBSCRIPTION; // string | El identificador de la suscripción a esta API //REPLACE THIS WITH YOUR DATA

        try {
            $result = $apiInstance->registerDepositantsUsingPOST($body, $subscription);
            print_r($result);
        } catch (Exception $e) {
            echo 'Exception when calling DepositantesApi->registerDepositantsUsingPOST: ', $e->getMessage(), PHP_EOL;
        }

    }

    public function testbillingsReportByIdUsingGET() {

        try {

            // Create the authenticator to obtain access token

            $oauth = new mx\wire4\OAuthWire4(
                Wire4ApiTest::OAUTH_CONSUMER_KEY, //REPLACE THIS WITH YOUR DATA
                Wire4ApiTest::OAUTH_CONSUMER_SECRET, //REPLACE THIS WITH YOUR DATA
                \mx\wire4\Environment::SANDBOX);

            // Obtain an access token use application flow and scope "general"
            $accessToken = $oauth->obtainAccessTokenAppUser(Wire4ApiTest::USER_KEY, //REPLACE THIS WITH YOUR DATA
                Wire4ApiTest::SECRET_KEY, //REPLACE THIS WITH YOUR DATA
                "general");

        } catch(OAuthException $e) {
            echo "Respuesta: ". $e->lastResponse . "\n";
        }

        // Configure OAuth2 access token for authorization: wire4_aut_app
        $config = mx\wire4\Configuration::getDefaultConfiguration()->setAccessToken($accessToken);

        $apiInstance = new mx\wire4\client\api\FacturasApi(
        // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
        // This is optional, `GuzzleHttp\Client` will be used as default.
            new GuzzleHttp\Client(),
            $config
        );
        $id = "65203279-9A2F-43D6-87A5-81BBCC481D80"; // string | Identificador uuid de la factura //REPLACE THIS WITH YOUR DATA

        try {
            $result = $apiInstance->billingsReportByIdUsingGET($id);
            print_r($result);
        } catch (Exception $e) {
            echo 'Exception when calling FacturasApi->billingsReportByIdUsingGET: ', $e->getMessage(), PHP_EOL;
        }

    }

    public function testbillingsReportUsingGET(){

        try {

            // Create the authenticator to obtain access token

            $oauth = new mx\wire4\OAuthWire4(
                Wire4ApiTest::OAUTH_CONSUMER_KEY, //REPLACE THIS WITH YOUR DATA
                Wire4ApiTest::OAUTH_CONSUMER_SECRET, //REPLACE THIS WITH YOUR DATA
                \mx\wire4\Environment::SANDBOX);

            // Obtain an access token use application flow and scope "general"
            $accessToken = $oauth->obtainAccessTokenAppUser(Wire4ApiTest::USER_KEY, //REPLACE THIS WITH YOUR DATA
                Wire4ApiTest::SECRET_KEY, //REPLACE THIS WITH YOUR DATA
                "general");

        } catch(OAuthException $e) {
            echo "Respuesta: ". $e->lastResponse . "\n";
        }

        // Configure OAuth2 access token for authorization: wire4_aut_app
        $config = mx\wire4\Configuration::getDefaultConfiguration()->setAccessToken($accessToken);

        $apiInstance = new mx\wire4\client\api\FacturasApi(
        // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
        // This is optional, `GuzzleHttp\Client` will be used as default.
            new GuzzleHttp\Client(),
            $config
        );
        $period = "2019-10"; // string | Filtro de fecha yyyy-MM

        try {
            $result = $apiInstance->billingsReportUsingGET($period);
            print_r($result);
        } catch (Exception $e) {
            echo 'Exception when calling FacturasApi->billingsReportUsingGET: ', $e->getMessage(), PHP_EOL;
        }
    }

    public function testgetAllInstitutionsUsingGET() {

        try {

            // Create the authenticator to obtain access token

            $oauth = new mx\wire4\OAuthWire4(
                Wire4ApiTest::OAUTH_CONSUMER_KEY, //REPLACE THIS WITH YOUR DATA
                Wire4ApiTest::OAUTH_CONSUMER_SECRET, //REPLACE THIS WITH YOUR DATA
                \mx\wire4\Environment::SANDBOX);

            // Obtain an access token use application flow and scope "general"
            $accessToken= $oauth->obtainAccessTokenApp("general");

        } catch(OAuthException $e) {
            echo "Respuesta: ". $e->lastResponse . "\n";
        }

        // Configure OAuth2 access token for authorization: wire4_aut_app
        $config = mx\wire4\Configuration::getDefaultConfiguration()->setAccessToken($accessToken);

        $apiInstance = new mx\wire4\client\api\InstitucionesApi(
        // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
        // This is optional, `GuzzleHttp\Client` will be used as default.
            new GuzzleHttp\Client(),
            $config
        );

        try {
            $result = $apiInstance->getAllInstitutionsUsingGET();
            print_r($result);
        } catch (Exception $e) {
            echo 'Exception when calling InstitucionesApi->getAllInstitutionsUsingGET: ', $e->getMessage(), PHP_EOL;
        }
    }

    public function testgetBalanceUsingGET() {

        try {

            // Create the authenticator to obtain access token

            $oauth = new mx\wire4\OAuthWire4(
                Wire4ApiTest::OAUTH_CONSUMER_KEY, //REPLACE THIS WITH YOUR DATA
                Wire4ApiTest::OAUTH_CONSUMER_SECRET, //REPLACE THIS WITH YOUR DATA
                \mx\wire4\Environment::SANDBOX);

            // Obtain an access token use application flow and scope "general"
            $accessToken = $oauth->obtainAccessTokenAppUser(Wire4ApiTest::USER_KEY, //REPLACE THIS WITH YOUR DATA
                Wire4ApiTest::SECRET_KEY, //REPLACE THIS WITH YOUR DATA
                "spei_admin");

        } catch(OAuthException $e) {
            echo "Respuesta: ". $e->lastResponse . "\n";
        }

        // Configure OAuth2 access token for authorization: wire4_aut_app_user_spei
        $config = mx\wire4\Configuration::getDefaultConfiguration()->setAccessToken($accessToken);

        $apiInstance = new mx\wire4\client\api\SaldoApi(
        // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
        // This is optional, `GuzzleHttp\Client` will be used as default.
            new GuzzleHttp\Client(),
            $config
        );
        $subscription = Wire4ApiTest::SUBSCRIPTION; // string | El identificador de la suscripción a esta API //REPLACE THIS WITH YOUR DATA

        try {
            $result = $apiInstance->getBalanceUsingGET($subscription);
            print_r($result);
        } catch (Exception $e) {
            echo 'Exception when calling SaldoApi->getBalanceUsingGET: ', $e->getMessage(), PHP_EOL;
        }

    }

    public function testpreEnrollmentMonexUserUsingPOST() {

        try {

            // Create the authenticator to obtain access token

            $oauth = new mx\wire4\OAuthWire4(
                Wire4ApiTest::OAUTH_CONSUMER_KEY, //REPLACE THIS WITH YOUR DATA
                Wire4ApiTest::OAUTH_CONSUMER_SECRET, //REPLACE THIS WITH YOUR DATA
                \mx\wire4\Environment::SANDBOX);

            // Obtain an access token use application flow and scope "general"
            $accessToken = $oauth->obtainAccessTokenApp("general");

        } catch(OAuthException $e) {
            echo "Respuesta: ". $e->lastResponse . "\n";
        }

        // Configure OAuth2 access token for authorization: wire4_aut_app
        $config = mx\wire4\Configuration::getDefaultConfiguration()->setAccessToken($accessToken);

        $apiInstance = new mx\wire4\client\api\SuscripcionesApi(
        // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
        // This is optional, `GuzzleHttp\Client` will be used as default.
            new GuzzleHttp\Client(),
            $config
        );
        $body = new \mx\wire4\client\model\PreEnrollmentData(); // \mx\wire4\client\model\PreEnrollmentData | Información para el enrolamiento

        $body->setCancelReturnUrl("https://your-app-url.mx/return");
        $body->setReturnUrl("https://your-app-url.mx/cancel");

        try {
            $result = $apiInstance->preEnrollmentMonexUserUsingPOST($body);
            print_r($result);
        } catch (Exception $e) {
            echo 'Exception when calling SuscripcionesApi->preEnrollmentMonexUserUsingPOST: ', $e->getMessage(), PHP_EOL;
        }
    }

    public function testremoveSubscriptionPendingStatusUsingDELETE() {

        try {

            // Create the authenticator to obtain access token

            $oauth = new mx\wire4\OAuthWire4(
                Wire4ApiTest::OAUTH_CONSUMER_KEY, //REPLACE THIS WITH YOUR DATA
                Wire4ApiTest::OAUTH_CONSUMER_SECRET, //REPLACE THIS WITH YOUR DATA
                \mx\wire4\Environment::SANDBOX);

            // Obtain an access token use application flow and scope "general"
            $accessToken = $oauth->obtainAccessTokenApp("general");

        } catch(OAuthException $e) {
            echo "Respuesta: ". $e->lastResponse . "\n";
        }

        // Configure OAuth2 access token for authorization: wire4_aut_app
        $config = mx\wire4\Configuration::getDefaultConfiguration()->setAccessToken($accessToken);

        $apiInstance = new mx\wire4\client\api\SuscripcionesApi(
        // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
        // This is optional, `GuzzleHttp\Client` will be used as default.
            new GuzzleHttp\Client(),
            $config
        );
        $subscription = "f7e3b24c-163f-4a3a-872b-1247ecfd624d"; // string | El identificador de la suscripción a esta API //REPLACE THIS WITH YOUR DATA

        try {
            $apiInstance->removeSubscriptionPendingStatusUsingDELETE($subscription);
        } catch (Exception $e) {
            echo 'Exception when calling SuscripcionesApi->removeSubscriptionPendingStatusUsingDELETE: ', $e->getMessage(), PHP_EOL;
        }

    }

    public function testremoveEnrollmentUserUsingDELETE() {

        try {

            // Create the authenticator to obtain access token

            $oauth = new mx\wire4\OAuthWire4(
                Wire4ApiTest::OAUTH_CONSUMER_KEY, //REPLACE THIS WITH YOUR DATA
                Wire4ApiTest::OAUTH_CONSUMER_SECRET, //REPLACE THIS WITH YOUR DATA
                \mx\wire4\Environment::SANDBOX);

            // Obtain an access token use application flow and scope "spei_admin"
            $accessToken = $oauth->obtainAccessTokenAppUser("51ea09921a14e2aa244662d68ba0ca@sandbox.wire4.mx", //REPLACE THIS WITH YOUR DATA
                "21fa249f775406e87419d359cabfef","spei_admin"); //REPLACE THIS WITH YOUR DATA

        } catch(OAuthException $e) {
            echo "Respuesta: ". $e->lastResponse . "\n";
        }

        // Configure OAuth2 access token for authorization: wire4_aut_app_user_spei
        $config = mx\wire4\Configuration::getDefaultConfiguration()->setAccessToken($accessToken);

        $apiInstance = new mx\wire4\client\api\SuscripcionesApi(
        // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
        // This is optional, `GuzzleHttp\Client` will be used as default.
            new GuzzleHttp\Client(),
            $config
        );
        $subscription = "bf181fed-a2fb-4912-a49c-45d5b8f91581"; // string | El identificador de la suscripción a esta API //REPLACE THIS WITH YOUR DATA

        try {
            $apiInstance->removeEnrollmentUserUsingDELETE($subscription);
        } catch (Exception $e) {
            echo 'Exception when calling SuscripcionesApi->removeEnrollmentUserUsingDELETE: ', $e->getMessage(), PHP_EOL;
        }

    }

    public function testdropTransactionsPendingUsingDELETE() {

        try{
            // Create the authenticator to obtain access token

            $oauth = new mx\wire4\OAuthWire4(
                Wire4ApiTest::OAUTH_CONSUMER_KEY, //REPLACE THIS WITH YOUR DATA
                Wire4ApiTest::OAUTH_CONSUMER_SECRET, //REPLACE THIS WITH YOUR DATA
                \mx\wire4\Environment::SANDBOX);

            // Obtain an access token use application flow and scope "spei_admin"
            $accessToken = $oauth->obtainAccessTokenAppUser(Wire4ApiTest::USER_KEY, //REPLACE THIS WITH YOUR DATA
                Wire4ApiTest::SECRET_KEY, //REPLACE THIS WITH YOUR DATA
                "spei_admin");

        } catch(OAuthException $e) {
            echo "Respuesta: ". $e->lastResponse . "\n";
        }

        // Configure OAuth2 access token for authorization: wire4_aut_app_user_spei
        $config = mx\wire4\Configuration::getDefaultConfiguration()->setAccessToken($accessToken);

        $apiInstance = new mx\wire4\client\api\TransferenciasSPEIApi(
        // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
        // This is optional, `GuzzleHttp\Client` will be used as default.
            new GuzzleHttp\Client(),
            $config
        );
        $request_id = "209648a5-2ff2-46f6-bfe8-2645e60104b7"; // string | Identificador de las transferencias a eliminar //REPLACE THIS WITH YOUR DATA
        $subscription = Wire4ApiTest::SUBSCRIPTION; // string | El identificador de la suscripción a esta API //REPLACE THIS WITH YOUR DATA

        try {
            $apiInstance->dropTransactionsPendingUsingDELETE($request_id, $subscription);
        } catch (Exception $e) {
            echo 'Exception when calling TransferenciasSPEIApi->dropTransactionsPendingUsingDELETE: ', $e->getMessage(), PHP_EOL;
        }
    }

    public function testincomingSpeiTransactionsReportUsingGET() {

        try{
        // Create the authenticator to obtain access token

        $oauth = new mx\wire4\OAuthWire4(
            Wire4ApiTest::OAUTH_CONSUMER_KEY, //REPLACE THIS WITH YOUR DATA
            Wire4ApiTest::OAUTH_CONSUMER_SECRET, //REPLACE THIS WITH YOUR DATA
            \mx\wire4\Environment::SANDBOX);

        // Obtain an access token use application flow and scope "spei_admin"
        $accessToken = $oauth->obtainAccessTokenAppUser(Wire4ApiTest::USER_KEY, //REPLACE THIS WITH YOUR DATA
            Wire4ApiTest::SECRET_KEY, //REPLACE THIS WITH YOUR DATA
            "spei_admin");

        } catch(OAuthException $e) {
            echo "Respuesta: ". $e->lastResponse . "\n";
        }

        // Configure OAuth2 access token for authorization: wire4_aut_app_user_spei
        $config = mx\wire4\Configuration::getDefaultConfiguration()->setAccessToken($accessToken);

        $apiInstance = new mx\wire4\client\api\TransferenciasSPEIApi(
        // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
        // This is optional, `GuzzleHttp\Client` will be used as default.
            new GuzzleHttp\Client(),
            $config
        );

        $subscription = Wire4ApiTest::SUBSCRIPTION; // string | El identificador de la suscripción a esta API //REPLACE THIS WITH YOUR DATA

        try {
            $result = $apiInstance->incomingSpeiTransactionsReportUsingGET($subscription);
            print_r($result);
        } catch (Exception $e) {
            echo 'Exception when calling TransferenciasSPEIApi->incomingSpeiTransactionsReportUsingGET: ', $e->getMessage(), PHP_EOL;
        }
    }

    public function testoutgoingSpeiTransactionsReportUsingGET() {

        try{
            // Create the authenticator to obtain access token

            $oauth = new mx\wire4\OAuthWire4(
                Wire4ApiTest::OAUTH_CONSUMER_KEY, //REPLACE THIS WITH YOUR DATA
                Wire4ApiTest::OAUTH_CONSUMER_SECRET, //REPLACE THIS WITH YOUR DATA
                \mx\wire4\Environment::SANDBOX);

            // Obtain an access token use application flow and scope "spei_admin"
            $accessToken = $oauth->obtainAccessTokenAppUser(Wire4ApiTest::USER_KEY, //REPLACE THIS WITH YOUR DATA
                Wire4ApiTest::SECRET_KEY, //REPLACE THIS WITH YOUR DATA
                "spei_admin");

        } catch(OAuthException $e) {
            echo "Respuesta: ". $e->lastResponse . "\n";
        }

        // Configure OAuth2 access token for authorization: wire4_aut_app_user_spei
        $config = mx\wire4\Configuration::getDefaultConfiguration()->setAccessToken($accessToken);

        $apiInstance = new mx\wire4\client\api\TransferenciasSPEIApi(
        // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
        // This is optional, `GuzzleHttp\Client` will be used as default.
            new GuzzleHttp\Client(),
            $config
        );
        $subscription = Wire4ApiTest::SUBSCRIPTION; // string | El identificador de la suscripción a esta API //REPLACE THIS WITH YOUR DATA
        $order_id = "C71D144B-652E-447A-978E-AEA6F67C8ECB"; // string | Identificador de la orden a buscar //REPLACE THIS WITH YOUR DATA

        try {
            $result = $apiInstance->outgoingSpeiTransactionsReportUsingGET($subscription, $order_id);
            print_r($result);
        } catch (Exception $e) {
            echo 'Exception when calling TransferenciasSPEIApi->outgoingSpeiTransactionsReportUsingGET: ', $e->getMessage(), PHP_EOL;
        }
    }


    public function testregisterOutgoingSpeiTransactionUsingPOST() {

        try{
            // Create the authenticator to obtain access token

            $oauth = new mx\wire4\OAuthWire4(
                Wire4ApiTest::OAUTH_CONSUMER_KEY, //REPLACE THIS WITH YOUR DATA
                Wire4ApiTest::OAUTH_CONSUMER_SECRET, //REPLACE THIS WITH YOUR DATA
                \mx\wire4\Environment::SANDBOX);

            // Obtain an access token use application flow and scope "spei_admin"
            $accessToken = $oauth->obtainAccessTokenAppUser(Wire4ApiTest::USER_KEY, //REPLACE THIS WITH YOUR DATA
                Wire4ApiTest::SECRET_KEY, //REPLACE THIS WITH YOUR DATA
                "spei_admin");

        } catch(OAuthException $e) {
            echo "Respuesta: ". $e->lastResponse . "\n";
        }

        // Configure OAuth2 access token for authorization: wire4_aut_app_user_spei
        $config = mx\wire4\Configuration::getDefaultConfiguration()->setAccessToken($accessToken);

        $apiInstance = new mx\wire4\client\api\TransferenciasSPEIApi(
        // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
        // This is optional, `GuzzleHttp\Client` will be used as default.
            new GuzzleHttp\Client(),
            $config
        );
        $body = new \mx\wire4\client\model\TransactionsOutgoingRegister(); // \mx\wire4\client\model\TransactionsOutgoingRegister | Información de las transferencias SPEI de salida


        $body->setReturnUrl("https://your-app-url.mx/return");
        $body->setCancelReturnUrl("https://your-app-url.mx/cancel");

        $transaction = new \mx\wire4\client\model\TransactionOutgoing();
        $transaction->setOrderId("33fd6a2a-abeb-4072-8405-348b0850f657");
        $transaction->setAmount(120.25);
        $transaction->setBeneficiaryAccount("112680000189999984");
        $transaction->setCurrencyCode("MXP");
        $transaction->setEmail(array("notificar@wire4.mx"));
        $transaction->setConcept("Transfer out test 1");
        $transaction->setReference(1234567);

        $body->setTransactions(array($transaction));

        $subscription = Wire4ApiTest::SUBSCRIPTION; // string | El identificador de la suscripción a esta API //REPLACE THIS WITH YOUR DATA

        try {
            $result = $apiInstance->registerOutgoingSpeiTransactionUsingPOST($body, $subscription);
            print_r($result);
        } catch (Exception $e) {
            echo 'Exception when calling TransferenciasSPEIApi->registerOutgoingSpeiTransactionUsingPOST: ', $e->getMessage(), PHP_EOL;
        }
    }

    public function testgetSpidClassificationsUsingGET() {


        try{
            // Create the authenticator to obtain access token

            $oauth = new mx\wire4\OAuthWire4(
                Wire4ApiTest::OAUTH_CONSUMER_KEY, //REPLACE THIS WITH YOUR DATA
                Wire4ApiTest::OAUTH_CONSUMER_SECRET, //REPLACE THIS WITH YOUR DATA
                \mx\wire4\Environment::SANDBOX);

            // Obtain an access token use application flow and scope "spid_admin"
            $accessToken = $oauth->obtainAccessTokenAppUser(Wire4ApiTest::USER_KEY, //REPLACE THIS WITH YOUR DATA
                Wire4ApiTest::SECRET_KEY, //REPLACE THIS WITH YOUR DATA
                "spid_admin");

        } catch(OAuthException $e) {
            echo "Respuesta: ". $e->lastResponse . "\n";
        }

        // Configure OAuth2 access token for authorization: wire4_aut_app_user_spid
        $config = mx\wire4\Configuration::getDefaultConfiguration()->setAccessToken($accessToken);

        $apiInstance = new mx\wire4\client\api\TransferenciasSPIDApi(
        // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
        // This is optional, `GuzzleHttp\Client` will be used as default.
            new GuzzleHttp\Client(),
            $config
        );
        $subscription = Wire4ApiTest::SUBSCRIPTION; // string | El identificador de la suscripción a esta API //REPLACE THIS WITH YOUR DATA

        try {
            $result = $apiInstance->getSpidClassificationsUsingGET($subscription);
            print_r($result);
        } catch (Exception $e) {
            echo 'Exception when calling TransferenciasSPIDApi->getSpidClassificationsUsingGET: ', $e->getMessage(), PHP_EOL;
        }
    }

    public function testregisterOutgoingSpidTransactionUsingPOST() {

        try{
            // Create the authenticator to obtain access token

            $oauth = new mx\wire4\OAuthWire4(
                Wire4ApiTest::OAUTH_CONSUMER_KEY, //REPLACE THIS WITH YOUR DATA
                Wire4ApiTest::OAUTH_CONSUMER_SECRET, //REPLACE THIS WITH YOUR DATA
                \mx\wire4\Environment::SANDBOX);

            // Obtain an access token use application flow and scope "spid_admin"
            $accessToken = $oauth->obtainAccessTokenAppUser(Wire4ApiTest::USER_KEY, //REPLACE THIS WITH YOUR DATA
                Wire4ApiTest::SECRET_KEY, //REPLACE THIS WITH YOUR DATA
                "spid_admin");

        } catch(OAuthException $e) {
            echo "Respuesta: ". $e->lastResponse . "\n";
        }

        // Configure OAuth2 access token for authorization: wire4_aut_app_user_spid
        $config = mx\wire4\Configuration::getDefaultConfiguration()->setAccessToken($accessToken);

        $apiInstance = new mx\wire4\client\api\TransferenciasSPIDApi(
        // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
        // This is optional, `GuzzleHttp\Client` will be used as default.
            new GuzzleHttp\Client(),
            $config
        );
        $body = new \mx\wire4\client\model\TransactionOutgoingSpid(); // \mx\wire4\client\model\TransactionOutgoingSpid | Información de las transferencias SPID de salida

        $body->setReturnUrl("https://your-app-url.mx/return");
        $body->setCancelReturnUrl("https://your-app-url.mx/cancel");
        $body->setOrderId("8A736A1D-ECA6-4959-93FE-794365F53E24");
        $body->setAmount(120.25);
        $body->setBeneficiaryAccount("112680000189999984");
        $body->setCurrencyCode("USD");
        $body->setEmail(array("notificar@wire4.mx"));
        $body->setClassificationId("01");
        $body->setNumericReferenceSpid(1234567);
        $body->setPaymentConceptSpid("Transfer out test 1");

        $subscription = Wire4ApiTest::SUBSCRIPTION; // string | El identificador de la suscripción a esta API //REPLACE THIS WITH YOUR DATA

        try {
            $result = $apiInstance->registerOutgoingSpidTransactionUsingPOST($body, $subscription);
            print_r($result);
        } catch (Exception $e) {
            echo 'Exception when calling TransferenciasSPIDApi->registerOutgoingSpidTransactionUsingPOST: ', $e->getMessage(), PHP_EOL;
        }

    }

    public function testetWebhook() {


        try {

            // Create the authenticator to obtain access token

            $oauth = new mx\wire4\OAuthWire4(
                Wire4ApiTest::OAUTH_CONSUMER_KEY, //REPLACE THIS WITH YOUR DATA
                Wire4ApiTest::OAUTH_CONSUMER_SECRET, //REPLACE THIS WITH YOUR DATA
                \mx\wire4\Environment::SANDBOX);

            // Obtain an access token use application flow and scope "general"
            $accessToken = $oauth->obtainAccessTokenApp("general");

        } catch(OAuthException $e) {
            echo "Respuesta: ". $e->lastResponse . "\n";
        }

        // Configure OAuth2 access token for authorization: wire4_aut_app
        $config = mx\wire4\Configuration::getDefaultConfiguration()->setAccessToken($accessToken);

        $apiInstance = new mx\wire4\client\api\WebhooksApi(
        // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
        // This is optional, `GuzzleHttp\Client` will be used as default.
            new GuzzleHttp\Client(),
            $config
        );
        $id = "wh_3838229e10774e428c037d39c2cb167b"; // string | Identificador del webhook //REPLACE THIS WITH YOUR DATA

        try {
            $result = $apiInstance->getWebhook($id);
            print_r($result);
        } catch (Exception $e) {
            echo 'Exception when calling WebhooksApi->getWebhook: ', $e->getMessage(), PHP_EOL;
        }

    }

    public function testetWebhooks() {


        try {

            // Create the authenticator to obtain access token

            $oauth = new mx\wire4\OAuthWire4(
                Wire4ApiTest::OAUTH_CONSUMER_KEY, //REPLACE THIS WITH YOUR DATA
                Wire4ApiTest::OAUTH_CONSUMER_SECRET, //REPLACE THIS WITH YOUR DATA
                \mx\wire4\Environment::SANDBOX);

            // Obtain an access token use application flow and scope "general"
            $accessToken = $oauth->obtainAccessTokenApp("general");

        } catch(OAuthException $e) {
            echo "Respuesta: ". $e->lastResponse . "\n";
        }

        // Configure OAuth2 access token for authorization: wire4_aut_app
        $config = mx\wire4\Configuration::getDefaultConfiguration()->setAccessToken($accessToken);

        $apiInstance = new mx\wire4\client\api\WebhooksApi(
        // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
        // This is optional, `GuzzleHttp\Client` will be used as default.
            new GuzzleHttp\Client(),
            $config
        );

        try {
            $result = $apiInstance->getWebhooks();
            print_r($result);
        } catch (Exception $e) {
            echo 'Exception when calling WebhooksApi->getWebhooks: ', $e->getMessage(), PHP_EOL;
        }

    }

    public function testregisterWebhook() {

        try {

            // Create the authenticator to obtain access token

            $oauth = new mx\wire4\OAuthWire4(
                Wire4ApiTest::OAUTH_CONSUMER_KEY, //REPLACE THIS WITH YOUR DATA
                Wire4ApiTest::OAUTH_CONSUMER_SECRET, //REPLACE THIS WITH YOUR DATA
                \mx\wire4\Environment::SANDBOX);

            // Obtain an access token use application flow and scope "general"
            $accessToken = $oauth->obtainAccessTokenApp("general");

        } catch(OAuthException $e) {
            echo "Respuesta: ". $e->lastResponse . "\n";
        }

        // Configure OAuth2 access token for authorization: wire4_aut_app
        $config = mx\wire4\Configuration::getDefaultConfiguration()->setAccessToken($accessToken);

        $apiInstance = new mx\wire4\client\api\WebhooksApi(
        // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
        // This is optional, `GuzzleHttp\Client` will be used as default.
            new GuzzleHttp\Client(),
            $config
        );
        $body = new \mx\wire4\client\model\WebhookRequest(); // \mx\wire4\client\model\WebhookRequest | Información para registrar un Webhook


        $body->setName("TEST-SDK-WEBHOOK-REGISTER");
        $body->setUrl("https://en0fpu357pjff.x.pipedream.net");
        $body->setEvents(array(
                "ACCOUNT.CREATED",
                "TRANSACTION.OUTGOING.RECEIVED",
                "ENROLLMENT.CREATED"));

        try {
            $result = $apiInstance->registerWebhook($body);
            print_r($result);
        } catch (Exception $e) {
            echo 'Exception when calling WebhooksApi->registerWebhook: ', $e->getMessage(), PHP_EOL;
        }
    }

    public function testsignWebhooks() {

        $message = "{\"id\":\"evt_641296342fdbf2db40ce674dde4881b87ada81b1695ae1c54666578272c1cd10\",\"object\":\"spid_outgoing\",\"api_version\":\"1.0.0\",\"created\":\"2019-12-05T11:55:10.058-06:00\",\"data\":{\"account\":\"8999998\",\"amount\":120.25,\"currency_code\":\"USD\",\"monex_description\":\"Nombre Receptor: BANAMEX | Monto Pago: 120.25 | Cuenta beneficiaria: 112680000189999984 | Nombre Beneficiario: notificar@wire4.mx | Clave de Rastreo:  | Referencia Numerica: 1234567 | Concepto del pago: Transfer out test 1 | Fecha Confirmacion de Liquidacion: 05-12-2019 11:55:10\",\"detention_message\":\"Cuenta de beneficiario, no existe\",\"payment_order_id\":1427991983,\"status_code\":\"FAILED\",\"transaction_id\":704814938,\"beneficiary_account\":\"112680000189999984\",\"beneficiary_bank\":{\"key\":\"40112\",\"name\":\"BMONEX\",\"company_name\":\"BANCO MONEX S.A. INSTITUCION DE BANCA MULTIPLE, MONEX GRUPO FINANCIERO\",\"rfc\":\"BMI9704113PA\"},\"beneficiary_name\":\"notificar@wire4.mx\",\"concept\":\"Transfer out test 1\",\"order_id\":\"8A736A1D-ECA6-4959-93FE-794365F53E24\",\"reference\":1234567,\"request_id\":\"7dbf528d-b395-4779-924e-b182a4de17a5\",\"cep\":{}},\"livemode\":false,\"pending_webhooks\":0,\"request\":\"8A736A1D-ECA6-4959-93FE-794365F53E24\",\"type\":\"TRANSACTION.OUTGOING.SPID.RECEIVED\"}";
        $referenceString = "7c088d16a8a25f1640e95dfdce65770cb0a31dc0e71a9749bba1e4e114201efb6e78c50bea3d8d9337b8ea63b2a8abf5b1e03d0cf9dda6f8e83a509d1ac11908";
        $key = "wh_6b5cb70ab7fd489a8bd0c9d06513008e";

        $signResult = \mx\wire4\webhooks\sign\UtilsCompute::toExadecimal(
            \mx\wire4\webhooks\sign\UtilsCompute::computeHmacSha512($message, $key));

        var_dump($signResult);

        if( ! \mx\wire4\webhooks\sign\UtilsCompute::compareSignatures($referenceString,$signResult) ) {
            echo "Las firmas no son iguales:";

        } else {
            echo "Las validacion de firmas es correcta";
        }

        echo "\noriginal:".$referenceString;
        echo "\nresultado:".$signResult;

    }

    public function testoutCommingSpeiRequestIdTransactionsReportUsingGET() {

        try{
            // Create the authenticator to obtain access token

            $oauth = new mx\wire4\OAuthWire4(
                Wire4ApiTest::OAUTH_CONSUMER_KEY, //REPLACE THIS WITH YOUR DATA
                Wire4ApiTest::OAUTH_CONSUMER_SECRET, //REPLACE THIS WITH YOUR DATA
                \mx\wire4\Environment::SANDBOX);

            // Obtain an access token use application flow and scope "spei_admin"
            $accessToken = $oauth->obtainAccessTokenAppUser(Wire4ApiTest::USER_KEY, //REPLACE THIS WITH YOUR DATA
                Wire4ApiTest::SECRET_KEY, //REPLACE THIS WITH YOUR DATA
                "spei_admin");


        } catch(OAuthException $e) {
            echo "Respuesta: ". $e->lastResponse . "\n";
        }

        // Configure OAuth2 access token for authorization: wire4_aut_app_user_spei
        $config = mx\wire4\Configuration::getDefaultConfiguration()->setAccessToken($accessToken);

        $apiInstance = new mx\wire4\client\api\TransferenciasSPEIApi(
        // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
        // This is optional, `GuzzleHttp\Client` will be used as default.
            new GuzzleHttp\Client(),
            $config
        );
        $request_id = "request_id_example"; // string | Identificador de la petición a buscar //REPLACE THIS WITH YOUR DATA
        $subscription = Wire4ApiTest::SUBSCRIPTION; // string | El identificador de la suscripción a esta API //REPLACE THIS WITH YOUR DATA

        try {
            $result = $apiInstance->outCommingSpeiRequestIdTransactionsReportUsingGET($request_id,$subscription);
            print_r($result);
        } catch (Exception $e) {
            echo 'Exception when calling TransferenciasSPEIApi->outgoingSpeiTransactionsReportUsingGET: ', $e->getMessage(), PHP_EOL;
        }
    }

}