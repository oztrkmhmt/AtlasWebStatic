<?php
class User {
     
    private $url = REQUEST_URL;
    private $detailsURL = LOGINDETAILS_URL;
    private $customerDetailsURL = CUSTOMERDETAILS_URL;
    private $userProductsURL = USERPRODUCTS_URL;
    private $policyScreen = POLICYSCREEN_URL;
    private $producturl = PRODUCTS_URL;
    private $static_values = STATICVALUES_URL;

    public function __construct() {
        
    }
    // Get User Hash Code
    public function GetUserHashCode() {
        $hashcode = array("username" => $_POST['username'], "password" => $_POST['password']);
        $hashcode_string = json_encode($hashcode);
        $ch = curl_init($this->url);
        //Call common set option from util class
        Utils::CurlSetOpts($ch);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $hashcode_string);
        $result = curl_exec($ch); //execute
        curl_close($ch);
        $userDetail = (json_decode($result, true));
        $_SESSION['userDetail'] = $userDetail;
    }
    // Get User Details
    public function GetLoginDetails($data) {
        $userDetails = array("username" => $data['username'], "hashcode" => $_SESSION['userDetail']['hashCode']);
        $userDetails_string = json_encode($userDetails);
        $ch = curl_init($this->detailsURL);
        //Call common set option from util class
        Utils::CurlSetOpts($ch);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $userDetails_string);
        $resultUserDetails = curl_exec($ch); //execute
        curl_close($ch);
        $details = (json_decode($resultUserDetails, true));
        $_SESSION['logindetails'] = $details;
    }
    // Get Customer Details
    public function GetCustomerDetails($data) {
        $customerDetails = array("kimliktipi" => "0", "kimlikno" => $_POST['kimlikno']);
        $customerDetails_string = json_encode($customerDetails);
        $ch = curl_init($this->customerDetailsURL);
        //Call common set option from util class
        Utils::CurlSetOpts($ch);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $customerDetails_string);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array("username:" . $data['username'], "hashcode:" . $_SESSION['userDetail']['hashCode'], "Content-Type : application/x-www-form-urlencoded"));
        $resultCustomerDetails = curl_exec($ch); //execute
        curl_close($ch);
        $ctDetailResult = (json_decode($resultCustomerDetails, true));
        $_SESSION['customerDetails'] = $ctDetailResult;
    }
       // Get User Products
       public function UserProducts($data) {
        $userProducts = array("username" => $data['username']);
        $userProducts_string = json_encode($userProducts);
        $ch = curl_init($this->userProductsURL);
        //Call common set option from util class
        Utils::CurlSetOpts($ch);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $userProducts_string);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array("username:" . $data['username'], "hashcode:" . $_SESSION['userDetail']['hashCode']));
        $resultCustomerDetails = curl_exec($ch); //execute
        curl_close($ch);
        $userProductsResult = (json_decode($resultCustomerDetails, true));
        $_SESSION['userProducts'] = $userProductsResult;
    }
      // Get Product Details Abonman
      public function GetProductDetailsAbonman($data) {
        $productDetailAbonman = array("username" => $data['username'], "productid" => "ASM", "policytype" =>  "A");
        $productDetailAbonman_string = json_encode($productDetailAbonman);
        $ch = curl_init($this->producturl);
        //Call common set option from util class
        Utils::CurlSetOpts($ch);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $productDetailAbonman_string);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array("username:" . $data['username'], "hashcode:" . $_SESSION['userDetail']['hashCode'], "Content-Type : application/x-www-form-urlencoded"));
        $result = curl_exec($ch); //execute
        curl_close($ch);
        $productDetail = (json_decode($result, true));
        $_SESSION['productDetailAbonman'] = $productDetail;
    }
     // Get Product Details Kati
     public function GetProductDetailsKati($data) {
        $productDetailKati = array("username" => $data['username'], "productid" => "ASM", "policytype" =>  "K");
        $productDetailKati_string = json_encode($productDetailKati);
        $ch = curl_init($this->producturl);
        //Call common set option from util class
        Utils::CurlSetOpts($ch);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $productDetailKati_string);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array("username:" . $data['username'], "hashcode:" . $_SESSION['userDetail']['hashCode'], "Content-Type : application/x-www-form-urlencoded"));
        $result = curl_exec($ch); //execute
        curl_close($ch);
        $productDetailKatiResult = (json_decode($result, true));
        $_SESSION['productDetailKati'] = $productDetailKatiResult;
    }
     // Get Product Details Kaskom Atlas
     public function GetProductDetailsKaskomAtlas($data) {
        $productDetailKaskomAtlas = array("username" => $data['username'], "productid" => "BKS", "policytype" =>  "N");
        $productDetailKaskomAtlas_string = json_encode($productDetailKaskomAtlas);
        $ch = curl_init($this->producturl);
        //Call common set option from util class
        Utils::CurlSetOpts($ch);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $productDetailKaskomAtlas_string);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array("username:" . $data['username'], "hashcode:" . $_SESSION['userDetail']['hashCode'], "Content-Type : application/x-www-form-urlencoded"));
        $result = curl_exec($ch); //execute
        curl_close($ch);
        $productDetailKaskomAtlasResult = (json_decode($result, true));
        $_SESSION['productDetailKaskomAtlas'] = $productDetailKaskomAtlasResult;
    }
    // Get Ship Names Details
    public function GetAtlasShips($data) {
        $atlasShips = array("username" => $data['username'], "productid" => "ASM", "policytype" =>  "K", "staticcode" => "GEM", "keyvalue" => '20');
        $atlasShips_string = json_encode($atlasShips);
        $ch = curl_init($this->static_values);
        //Call common set option from util class
        Utils::CurlSetOpts($ch);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $atlasShips_string);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array("username:" . $data['username'], "hashcode:" . $_SESSION['userDetail']['hashCode'], "Content-Type : application/x-www-form-urlencoded"));
        $result = curl_exec($ch); //execute
        curl_close($ch);
        $atlasShipNames = (json_decode($result, true));
        $_SESSION['atlasShipNames'] = $atlasShipNames;  
        
    }
    // Get User Hash Code
    public function GetPolicyScreen($data) {
        $getPolicy = array("username" => $data['username'], "password" => $data['password'], "productid" => "ASM", "policytype" => "K");
        $getPolicy_string = json_encode($getPolicy);
        $ch = curl_init($this->policyScreen);
        //Call common set option from util class
        Utils::CurlSetOpts($ch);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $getPolicy_string);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array("username:" . $data['username'], "hashcode:" . $_SESSION['userDetail']['hashCode'], 'Content-Type : application/json;charset=UTF-8'));
        $result = curl_exec($ch); //execute
        curl_close($ch);
        $policyScreenDetail = (json_decode($result, true));
        $_SESSION['policyScreen'] = $policyScreenDetail;
    }
}