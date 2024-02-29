<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\News;
use App\Coment;
use Config;
use Paypal;
use Auth;
use App\Preferencia;
use App\Shop;


class PaymentController extends Controller
{
    private $apiContext;

    public function __construct()
    {
        $payPalConfig = config('paypal');
        $client = "ASH6r960SRaDIBU3mN_kUBmKsaWRVapJqwRUZGUCnpdZfZwz8r8J4U5dfXlzjkx8kEwoE18Uii39Tz-S";
        
        $secret = "EOP1SLbEpR9LBmltgqN6mcuRe59XrRtCNCih-inbPtXfmcrfJN4tNyqaChi6kXMfFH2lQaze5AevEpFi";
        
        $this->apiContext = new \PayPal\Rest\ApiContext(
            new \PayPal\Auth\OAuthTokenCredential(
                $client,
                $secret
            )
        );

        return $payPalConfig['settings'];

        $this->apiContext->setConfig($payPalConfig['settings']);
    }

    // ...

    public function payWithPayPal()
    {
        $payer = new \PayPal\API\Payer();
        $payer->setPaymentMethod('paypal'); 
        $payerInfo  = new \PayPal\API\PayerInfo();                 
        $payerInfo->setFirstName(Auth::user()->memb___id);
        $payerInfo->setEmail(Auth::user()->memb_addr);        
        $payer->setPayerInfo($payerInfo);                         

        $total = ($_GET['wcoins'] * 3) / 1000;

        $amount = new \PayPal\API\Amount();
        $amount->setTotal($total);
        $amount->setCurrency('USD');

        $transaction = new \PayPal\API\Transaction();
        $transaction->setAmount($amount);
        $transaction->setDescription($_GET['wcoins'] . 'Wcoins para UnderMu');

        $callbackUrl = url('/paypal/status');

        $redirectUrls = new \PayPal\API\RedirectUrls();
        $redirectUrls->setReturnUrl($callbackUrl)
            ->setCancelUrl($callbackUrl);

        $payment = new \PayPal\API\Payment();
        $payment->setIntent('sale')
            ->setPayer($payer)
            ->setTransactions(array($transaction))
            ->setRedirectUrls($redirectUrls);

        try {
            $payment->create($this->apiContext);
            $preferencia = new Preferencia(); 
            $preferencia->preference_id = $payment->id; 
            $preferencia->wcoins = $_GET['wcoins']; 
            $preferencia->estado = 1; 
            $preferencia->memb_id = Auth::user()->memb___id;
            $preferencia->plataforma = "Paypal";
            $preferencia->save(); 
            return redirect()->away($payment->getApprovalLink());
        } catch (\PayPal\API\PayPalConnectionException $ex) {
            echo $ex->getData();
        }
    }

    public function payPalStatus(Request $request)
    {
        $paymentId = $request->input('paymentId');
        $payerId = $request->input('PayerID');
        $token = $request->input('token');

        if (!$paymentId || !$payerId || !$token) {
            session()->put('failure', 'true');		
            return view('dashboard');
        }

        $payment = \PayPal\API\Payment::get($paymentId, $this->apiContext);

        $execution = new \PayPal\API\PaymentExecution();
        $execution->setPayerId($payerId);

        /** Execute the payment **/
        $result = $payment->execute($execution, $this->apiContext);

        if ($result->getState() === 'approved') {
            $preferencia = Preferencia::where('preference_id' ,'=', $payment->id)->first();
            $accs = DB::table('CashShopData')->get(); 
                foreach($accs as $acc){	

                     if($acc->AccountID == Auth::user()->memb___id){					 					                        
					   $shop = Shop::find($acc->AccountID);                       
                       $total = $shop->WCoinC+$preferencia->wcoins;
					   $shop->WCoinC = $total;
					   $shop->save();  
                       $preferencia->estado = 2; 
                       $preferencia->save();                       
                    }															
				}  

                session()->put('successMerc', 'true');			
                return redirect('/dashboard');
        }

        session()->put('failure', 'true');		
		return view('dashboard');
    }
}
