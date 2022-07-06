<?php

/*
* create by MH
* 2022
*/
class cipaykish
{
    public $MerchantCode;
    public $RedirectURL;
    
    public function __construct($RedirectURL = "http://localhost/cipaykish/tstpay.php",$MerchantCode = "11026481")
    {
        $this->MerchantCode = $MerchantCode;
        $this->RedirectURL = $RedirectURL;
    }

    public function verifypay()
    {
        if (isset($_POST['State']) && $_POST['State'] == "OK") {
            $soapclient = new soapclient('https://verify.sep.ir/Payments/ReferencePayment.asmx?WSDL');
            $res = $soapclient->VerifyTransaction($_POST['RefNum'], $this->MerchantCode);

            if ($res <= 0) {
                // Transaction Failed
                return false;
            } else {
                // Transaction Successful
                return ['result' => $res, 'RefNum' => $_POST['RefNum']];
            }
        } else {
            return false;
        }
    }

    public function showpay($Amount,$ResNum)
    {
        echo <<<form
        <form id="payform" action="https://sep.shaparak.ir/Payment.aspx" method="post">
            <input type="hidden" name="MID" value="{$this->MerchantCode}">
            <input type="hidden" name="ResNum" value="{$ResNum}">
            <input type="hidden" name="Amount" value="{$Amount}">
            <input type="hidden" name="RedirectURL" value="{$this->RedirectURL}">
            <script>document.forms['payform'].submit()</script>
        </form>
        form;
    }
}
