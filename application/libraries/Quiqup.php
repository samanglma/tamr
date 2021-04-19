<?php

defined('BASEPATH') or exit('No direct script access allowed');


class Quiqup
{
    public function __construct()
    {
        // $this->load->database();
    }
    //get authentication
    public function authorize()
    {

        $curl = curl_init();

        $request = '{
            "grant_type" : "client_credentials",
         
        }';

        curl_setopt_array($curl, array(
            // CURLOPT_URL => QUIQUP_BASE_URL . 'oauth/token',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => $request,
            CURLOPT_HTTPHEADER => array(
                "content-type: application/json"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
            return false;
        }
        return $response;
    }

    // create job
    public function createJob($data)
    {
        if ($data == null || empty($data)) {
            return false;
        }
        $auth = $this->authorize();

        if (!$auth) {
            return false;
        }
        $token = json_decode($auth, true);

        $items = '[';
        if (!empty($data['orderItems'])) {
            foreach ($data['orderItems'] as $key => $item) {
                $items .= '{
                "name": "' . $item->title . '",
                "quantity": ' . $item->qty . '
              }';
              if($key < count($data['orderItems']) - 1) {
                $items .= ",";
              }
            }
        }
        $items .= ']';


        $request = '{
            "kind": "partner_standard",
            "pickups": [
                {
              
                  "partner_order_id": "' . $data['order']['id'] . '", 
                        "notes": "",
                  "location": {
                    "address1": "Depachika Food Hall, Nakheel Mall, Palm Jumeirah",
                    "address2": "",
                    "coords": [],
                    "country":"United Arab Emirates",
                    "town":"Dubai"
                  },
                  "items": ' . $items . '
                }
              ],
              "dropoffs": [
                {
                  "contact_name": "' . $data['billing']['name'] . '",
                  "contact_phone": "' . $data['billing']['phone'] . '",
                        "payment_mode": "pre_paid",
                  "payment_amount": 0,
                  "location": {
                    "address1": "' . $data['billing']['shipping_address'] . ', ' . $data['billing']['city'] . ', ' . $data['billing']['country'] . '",
                    "address2": "' . $data['billing']['nearest_landmark'] . '",
                    "coords": [],
                    "country":"' . $data['billing']['country'] . '",
                    "town":"' . $data['billing']['city'] . '"
                  }
                }
              ]
            }
            ';
// echo '<pre>';
// print_r($request);
// echo $token['access_token'];
// echo QUIQUP_BASE_URL . "partner/jobs";
// die();
        $curl = curl_init();

        curl_setopt_array($curl, array(
         //   CURLOPT_URL => QUIQUP_BASE_URL . "partner/jobs",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => $request,
            CURLOPT_HTTPHEADER => array(
                "authorization: Bearer " . $token['access_token'],
                "content-type: application/json"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);
var_dump($response);
        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            echo $response;
        }
    }



    // create job
    public function submitJob($jobId)
    {
        if ($jobId == null || empty($jobId)) {
            return false;
        }
        $auth = $this->authorize();

        if (!$auth) {
            return false;
        }
        $token = json_decode($auth, true);
        $curl = curl_init();

        curl_setopt_array($curl, array(
       //   CURLOPT_URL => QUIQUP_BASE_URL. "partner/jobs".$jobId."/submissions",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_HTTPHEADER => array(
            "authorization: Bearer ".$token['access_token']
          ),
        ));
        
        $response = curl_exec($curl);
        $err = curl_error($curl);
        
        curl_close($curl);
        
        if ($err) {
          echo "cURL Error #:" . $err;
        } else {
          echo $response;
        }
    }
}
