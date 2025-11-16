<?php

namespace App\Http\Controllers\front;
use App\Models\Paypal;
use Illuminate\Support\Facades\Http;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use PayPalCheckoutSdk\Orders\OrdersGetRequest;
use PayPalCheckoutSdk\Core\PayPalHttpClient;
use PayPalCheckoutSdk\Core\SandboxEnvironment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PaypalController extends Controller
{
    public function payWithPayPal(Request $request)
    {
        $paypal = new PayPalClient;
        $paypal->setApiCredentials(config('paypal'));
        $token = $paypal->getAccessToken();
        $paypal->setAccessToken($token);


        $cart = session()->get('cart', []);
        $subtotal = 0;
        foreach ($cart as $item) {
            $subtotal += $item['price'] * $item['quantity'];
        }
        $shipping = 0;
        $shippingMethod = $request->input('shipping', 'flat-rate');
        if ($shippingMethod === 'flat-rate') {
            $shipping = 49;
        } elseif ($shippingMethod === 'cod-shipping') {
            $shipping = 20;
        }
        $total = $subtotal + $shipping;

        $order = $paypal->createOrder([
            "intent" => "CAPTURE",
            "purchase_units" => [
                [
                    "amount" => [
                        "currency_code" => "USD",
                        "value" => $total
                    ]
                ]
            ],
            "application_context" => [
                "return_url" => route('paypal.success'),
                "cancel_url" => route('paypal.cancel'),
            ]
        ]);

        foreach ($order['links'] as $link) {
            if ($link['rel'] === 'approve') {
                return redirect()->away($link['href']);
            }
        }

        return redirect()->route('checkout.index')->with('error', 'Something went wrong.');
    }

    public function success(Request $request)
    {
        $paypal = new PayPalClient;
        $paypal->setApiCredentials(config('paypal'));
        $token = $paypal->getAccessToken();
        $paypal->setAccessToken($token);

        $result = $paypal->capturePaymentOrder($request->token);

        if (isset($result['status']) && $result['status'] === 'COMPLETED') {
            // هنا تحفظ الأوردر في DB
            session()->forget('cart'); // امسح الكارت بعد الدفع
            return redirect()->route('checkout.index')->with('success', 'Payment successful!');
        }

        return redirect()->route('checkout.index')->with('error', 'Payment failed.');
    }

    public function cancel()
    {
        return redirect()->route('checkout.index')->with('error', 'You cancelled the payment.');
    }


    //save data in databaes
    public function handlePaypalSuccess(Request $request)
    {
        try {
            // البيانات اللي بترجع من PayPal
            $data = $request->all();

            Paypal::create([
                'paypal_order_id' => $data['id'] ?? null,
                'payer_email' => $data['payer']['email_address'] ?? null,
                'amount' => $data['purchase_units'][0]['amount']['value'] ?? 0,
                'currency' => $data['purchase_units'][0]['amount']['currency_code'] ?? 'USD',
                'status' => $data['status'] ?? 'UNKNOWN',
                'raw_response' => json_encode($data),
            ]);

            return response()->json(['message' => 'تم حفظ الدفع بنجاح ']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }


}





