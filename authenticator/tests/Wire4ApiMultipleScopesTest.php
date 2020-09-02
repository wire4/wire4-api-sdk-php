<?php
/**
 * Created by IntelliJ IDEA.
 * User: arturo.zuniga
 * Date: 2020-09-01
 * Time: 13:17
 */
include_once ("Wire4ApiTest.php");
class Wire4ApiMultipleScopesTest extends PHPUnit\Framework\TestCase {

    const OAUTH_CONSUMER_KEY = "vfRyDiLwEmVjweHrZt9dLmqfov0a";
    const OAUTH_CONSUMER_SECRET = "IBPnjfZsuzJYKZRGRBDaFk7PaFca";
    const USER_KEY = "12ce7e19e434fed95d0c0858f21632@develop.wire4.mx";
    const SECRET_KEY = "506285a31cb43a1bfd105dcbb8640e";
    const SUBSCRIPTION = "19b341dd-88b0-49a2-9997-117f553d15cd";

    /*../../vendor/bin/phpunit Wire4ApiMultipleScopesTest.php*/

    public function testgetBeneficiariesForAccountUsingGET() {

        $accessToken = "";
        try {

            // Create the authenticator to obtain access token

            $oauth = new \mx\wire4\auth\OAuthWire4 (
                  \Wire4ApiTest::OAUTH_CONSUMER_KEY, //REPLACE THIS WITH YOUR DATA
                \Wire4ApiTest::OAUTH_CONSUMER_SECRET, //REPLACE THIS WITH YOUR DATA
                \mx\wire4\auth\Environment::SANDBOX);

            // Obtain an access token use application flow and scope "general"
            $accessToken = $oauth->obtainAccessTokenAppUser(\Wire4ApiTest::USER_KEY, //REPLACE THIS WITH YOUR DATA
                \Wire4ApiTest::SECRET_KEY, //REPLACE THIS WITH YOUR DATA
                "spei_admin device_celular");

        } catch(OAuthException $e) {
            echo "Respuesta: ". $e->lastResponse . "\n";
        }

        echo "\nTOKEN MULTIPLES SCOPES:".$accessToken."\n";

        $apiInstance = new mx\wire4\client\api\CuentasDeBeneficiariosSPEIApi(
        // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
        // This is optional, `GuzzleHttp\Client` will be used as default.
            new GuzzleHttp\Client()
        );
        $authorization = $accessToken; // string | Header para token
        $subscription = \Wire4ApiTest::SUBSCRIPTION; // string | El identificador de la suscripción a esta API
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

    public function testconsultCodiOperations() {

        $accessToken = "";
        try {

            // Create the authenticator to obtain access token

            $oauth = new \mx\wire4\auth\OAuthWire4 (
                Wire4ApiMultipleScopesTest::OAUTH_CONSUMER_KEY, //REPLACE THIS WITH YOUR DATA
                Wire4ApiMultipleScopesTest::OAUTH_CONSUMER_SECRET, //REPLACE THIS WITH YOUR DATA
                \mx\wire4\auth\Environment::DEVELOP);

            // Obtain an access token use application report flow and scope "codi_report"
            $accessToken = $oauth->obtainAccessTokenAppUser(Wire4ApiMultipleScopesTest::USER_KEY, Wire4ApiMultipleScopesTest::SECRET_KEY, "codi_admin codi_report");


        } catch(OAuthException $e) {
            echo "Respuesta: ". $e->lastResponse . "\n";
        }

        echo "\nTOKEN MULTIPLES SCOPES:".$accessToken."\n";

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
}