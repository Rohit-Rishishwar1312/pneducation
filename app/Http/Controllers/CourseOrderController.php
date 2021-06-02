<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Course_Order;
use App\Course_Order_Product;
use App\Cart;
use App\User;
use App\Navfoot;
use Session;
use DB;
use Auth;
use Mail;

class CourseOrderController extends Controller
{
    public function insert(Request $a)
    {
    	$co = new Course_Order();
    	$co->name=$a->name;
    	$co->user_email=$a->user_email;
    	$co->user_id=$a->user_id;
    	$co->country=$a->country;
    	$co->address=$a->address;
    	$co->city=$a->city;
    	$co->state=$a->state;
    	$co->pincode=$a->pincode;
    	$co->order_note=$a->order_note;
    	$co->payment_method=$a->payment_method;
    	$co->coupan_code=$a->coupan_code;
    	$co->coupan_amount=$a->coupan_amount;
    	$co->total=$a->total;
        $co->order_status="pending";
        $co->order_id= Str::random(10);
    	$co->save();
        $order_id= DB::getPdo()->lastinsertID();
        // // print_r($order_id);
        // // die;
    	$cartproduct=DB::table('carts')->where(['user_email'=>$a->user_email])->get();
    	foreach($cartproduct as $c)
    	{
    		$cp = new Course_Order_Product();
    		$cp->course_order_id=$order_id;
            $cp->user_id= $a->user_id;
            $cp->course_id= $c->course_id;
            $cp->course_name= $c->course_name;
            $cp->image= $c->course_image;
            $cp->course_price= $c->course_price;
            $cp->course_quantity= $c->course_quantity;
            $cp->save();


    	}
    	// print_r($cartproduct);
    	if($co['payment_method']=="cod")
        {
            $user = User::where('email',$a->user_email)->first();
            $to = $a->user_email;
            $navf = Navfoot::all();
            $corder = Course_Order::all();
            $corderd = Course_Order_Product::all();
            $id = $co->id;
            $subject = 'User Order Successful';
            $message = "Your Order Is Successful In PnInfosys Course Program \n\n";
            Mail::send('front.order_email', ['msg' => $message,'navbar' => $navf,'corder' => $corder,'corderd' => $corderd,'id' => $id, 'user' => $user] , function($message) use ($to){ 
                $message->to($to, 'User')->subject('User Order');  
            }); 

            return redirect('thanks');
        }
        elseif($co['payment_method']=="Paytm")
        {
            // echo "Paytm";
         $amount=$a['total'];
         //print_r($amount);
         $order_id=$co['order_id'];
         //print_r($order_id);

         //paytm code start
         $data_for_request = $this->handlePaytmRequest( $order_id, $amount );
       // ($data_for_request);
   


        $paytm_txn_url = 'https://securegw-stage.paytm.in/theia/processTransaction';

        $paramList = $data_for_request['paramList'];
        $checkSum = $data_for_request['checkSum'];
        return view('front/paytm-merchant-form', compact( 'paytm_txn_url', 'paramList', 'checkSum' ) );
       }
    

}



public function handlePaytmRequest( $order_id, $amount ) {
            // Load all functions of encdec_paytm.php and config-paytm.php
            $this->getAllEncdecFunc();
            $this->getConfigPaytmSettings();

            $checkSum = "";
            $paramList = array();

            // Create an array having all required parameters for creating checksum.
            $paramList["MID"] = 'maPMwo33207837405124';
            $paramList["ORDER_ID"] = $order_id;
            $paramList["CUST_ID"] = $order_id;
            $paramList["INDUSTRY_TYPE_ID"] = 'Retail';
            $paramList["CHANNEL_ID"] = 'WEB';
            $paramList["TXN_AMOUNT"] = $amount;
            $paramList["WEBSITE"] = 'WEBSTAGING';
            $paramList["CALLBACK_URL"] = url( '/paytm-callback' );
            $paytm_merchant_key = 'Q#!M6@pcVLt7q8dY';

        //Here checksum string will return by getChecksumFromArray() function.
        $checkSum = getChecksumFromArray( $paramList, $paytm_merchant_key );

        return array(
            'checkSum' => $checkSum,
            'paramList' => $paramList
        );
    }

public function paytmCallback( Request $request ) {
            // return $request;
        $order_id = $request['ORDERID'];
        $navf= Navfoot::all();
        $cart= Cart::all();

        if ( 'TXN_SUCCESS' === $request['STATUS'] ) {
            $transaction_id = $request['TXNID'];
            $order = Course_Order::where('order_id', $order_id )->first();
            $order->payment_status = 'complete';
            $order->transaction_id = $transaction_id;
            $order->save();
           
           $user_email = Auth::user()->email;
           DB::table('carts')->where('user_email',$user_email)->delete();
            return view('front.order-complete', compact( 'order','navf','cart') );
           

        } else if( 'TXN_FAILURE' === $request['STATUS'] ){
            return view( 'front.payment-failed' );
        }
    }

public function getAllEncdecFunc(){


function encrypt_e($input, $ky) {
    $key   = html_entity_decode($ky);
    $iv = "@@@@&&&&####$$$$";
    $data = openssl_encrypt ( $input , "AES-128-CBC" , $key, 0, $iv );
    return $data;
}
function decrypt_e($crypt, $ky) {
    $key   = html_entity_decode($ky);
    $iv = "@@@@&&&&####$$$$";
    $data = openssl_decrypt ( $crypt , "AES-128-CBC" , $key, 0, $iv );
    return $data;
}
function generateSalt_e($length) {
    $random = "";
    srand((double) microtime() * 1000000);
    $data = "AbcDE123IJKLMN67QRSTUVWXYZ";
    $data .= "aBCdefghijklmn123opq45rs67tuv89wxyz";
    $data .= "0FGH45OP89";
    for ($i = 0; $i < $length; $i++) {
        $random .= substr($data, (rand() % (strlen($data))), 1);
    }
    return $random;
}
function checkString_e($value) {
    if ($value == 'null')
        $value = '';
    return $value;
}
function getChecksumFromArray($arrayList, $key, $sort=1) {
    if ($sort != 0) {
        ksort($arrayList);
    }
    $str = getArray2Str($arrayList);
    $salt = generateSalt_e(4);
    $finalString = $str . "|" . $salt;
    $hash = hash("sha256", $finalString);
    $hashString = $hash . $salt;
    $checksum = encrypt_e($hashString, $key);
    return $checksum;
}
function getChecksumFromString($str, $key) {
    
    $salt = generateSalt_e(4);
    $finalString = $str . "|" . $salt;
    $hash = hash("sha256", $finalString);
    $hashString = $hash . $salt;
    $checksum = encrypt_e($hashString, $key);
    return $checksum;
}
function verifychecksum_e($arrayList, $key, $checksumvalue) {
    $arrayList = removeCheckSumParam($arrayList);
    ksort($arrayList);
    $str = getArray2StrForVerify($arrayList);
    $paytm_hash = decrypt_e($checksumvalue, $key);
    $salt = substr($paytm_hash, -4);
    $finalString = $str . "|" . $salt;
    $website_hash = hash("sha256", $finalString);
    $website_hash .= $salt;
    $validFlag = "FALSE";
    if ($website_hash == $paytm_hash) {
        $validFlag = "TRUE";
    } else {
        $validFlag = "FALSE";
    }
    return $validFlag;
}
function verifychecksum_eFromStr($str, $key, $checksumvalue) {
    $paytm_hash = decrypt_e($checksumvalue, $key);
    $salt = substr($paytm_hash, -4);
    $finalString = $str . "|" . $salt;
    $website_hash = hash("sha256", $finalString);
    $website_hash .= $salt;
    $validFlag = "FALSE";
    if ($website_hash == $paytm_hash) {
        $validFlag = "TRUE";
    } else {
        $validFlag = "FALSE";
    }
    return $validFlag;
}
function getArray2Str($arrayList) {
    $findme   = 'REFUND';
    $findmepipe = '|';
    $paramStr = "";
    $flag = 1;  
    foreach ($arrayList as $key => $value) {
        $pos = strpos($value, $findme);
        $pospipe = strpos($value, $findmepipe);
        if ($pos !== false || $pospipe !== false) 
        {
            continue;
        }
        
        if ($flag) {
            $paramStr .= checkString_e($value);
            $flag = 0;
        } else {
            $paramStr .= "|" . checkString_e($value);
        }
    }
    return $paramStr;
}
function getArray2StrForVerify($arrayList) {
    $paramStr = "";
    $flag = 1;
    foreach ($arrayList as $key => $value) {
        if ($flag) {
            $paramStr .= checkString_e($value);
            $flag = 0;
        } else {
            $paramStr .= "|" . checkString_e($value);
        }
    }
    return $paramStr;
}
function redirect2PG($paramList, $key) {
    $hashString = getchecksumFromArray($paramList);
    $checksum = encrypt_e($hashString, $key);
}
function removeCheckSumParam($arrayList) {
    if (isset($arrayList["CHECKSUMHASH"])) {
        unset($arrayList["CHECKSUMHASH"]);
    }
    return $arrayList;
}
function getTxnStatus($requestParamList) {
    return callAPI(PAYTM_STATUS_QUERY_URL, $requestParamList);
}
function getTxnStatusNew($requestParamList) {
    return callNewAPI(PAYTM_STATUS_QUERY_NEW_URL, $requestParamList);
}
function initiateTxnRefund($requestParamList) {
    $CHECKSUM = getRefundChecksumFromArray($requestParamList,PAYTM_MERCHANT_KEY,0);
    $requestParamList["CHECKSUM"] = $CHECKSUM;
    return callAPI(PAYTM_REFUND_URL, $requestParamList);
}
function callAPI($apiURL, $requestParamList) {
    $jsonResponse = "";
    $responseParamList = array();
    $JsonData =json_encode($requestParamList);
    $postData = 'JsonData='.urlencode($JsonData);
    $ch = curl_init($apiURL);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);                                                                  
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
    curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                         
    'Content-Type: application/json', 
    'Content-Length: ' . strlen($postData))                                                                       
    );  
    $jsonResponse = curl_exec($ch);   
    $responseParamList = json_decode($jsonResponse,true);
    return $responseParamList;
}
function callNewAPI($apiURL, $requestParamList) {
    $jsonResponse = "";
    $responseParamList = array();
    $JsonData =json_encode($requestParamList);
    $postData = 'JsonData='.urlencode($JsonData);
    $ch = curl_init($apiURL);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);                                                                  
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
    curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                         
    'Content-Type: application/json', 
    'Content-Length: ' . strlen($postData))                                                                       
    );  
    $jsonResponse = curl_exec($ch);   
    $responseParamList = json_decode($jsonResponse,true);
    return $responseParamList;
}
function getRefundChecksumFromArray($arrayList, $key, $sort=1) {
    if ($sort != 0) {
        ksort($arrayList);
    }
    $str = getRefundArray2Str($arrayList);
    $salt = generateSalt_e(4);
    $finalString = $str . "|" . $salt;
    $hash = hash("sha256", $finalString);
    $hashString = $hash . $salt;
    $checksum = encrypt_e($hashString, $key);
    return $checksum;
}
function getRefundArray2Str($arrayList) {   
    $findmepipe = '|';
    $paramStr = "";
    $flag = 1;  
    foreach ($arrayList as $key => $value) {        
        $pospipe = strpos($value, $findmepipe);
        if ($pospipe !== false) 
        {
            continue;
        }
        
        if ($flag) {
            $paramStr .= checkString_e($value);
            $flag = 0;
        } else {
            $paramStr .= "|" . checkString_e($value);
        }
    }
    return $paramStr;
}
function callRefundAPI($refundApiURL, $requestParamList) {
    $jsonResponse = "";
    $responseParamList = array();
    $JsonData =json_encode($requestParamList);
    $postData = 'JsonData='.urlencode($JsonData);
    $ch = curl_init($apiURL);   
    curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_URL, $refundApiURL);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);  
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
    $headers = array();
    $headers[] = 'Content-Type: application/json';
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);  
    $jsonResponse = curl_exec($ch);   
    $responseParamList = json_decode($jsonResponse,true);
    return $responseParamList;
}

    }

    function getConfigPaytmSettings(){

        define('PAYTM_ENVIRONMENT', 'PROD'); // PROD
        define('PAYTM_MERCHANT_KEY', 'EBPwh5dj_XmW1L7%'); //Change this constant's value with Merchant key received from Paytm.
        define('PAYTM_MERCHANT_MID', 'EbtGYn83534967686723'); //Change this constant's value with MID (Merchant ID) received from Paytm.
        define('PAYTM_MERCHANT_WEBSITE', 'DEFAULT'); //Change this constant's value with Website name received from Paytm.
        $PAYTM_STATUS_QUERY_NEW_URL='https://securegw-stage.paytm.in/order/status';
        $PAYTM_TXN_URL='https://securegw-stage.paytm.in/order/process';
        if (PAYTM_ENVIRONMENT == 'PROD') {
        $PAYTM_STATUS_QUERY_NEW_URL='https://securegw.paytm.in/merchant-status/getTxnStatus';
        $PAYTM_TXN_URL='https://securegw.paytm.in/theia/processTransaction';
    }
        define('PAYTM_REFUND_URL', '');
        define('PAYTM_STATUS_QUERY_URL', $PAYTM_STATUS_QUERY_NEW_URL);
        define('PAYTM_STATUS_QUERY_NEW_URL', $PAYTM_STATUS_QUERY_NEW_URL);
        define('PAYTM_TXN_URL', $PAYTM_TXN_URL);
    }
    
    public function thank()
    {
        $navf= Navfoot::all();
        $cart= Cart::all();
        $user_email = Auth::user()->email;
        DB::table('carts')->where('user_email',$user_email)->delete();
        return view('front.thanks',Compact('navf','cart'));
    }
}
