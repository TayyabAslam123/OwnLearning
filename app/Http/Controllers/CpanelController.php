<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;


class CpanelController extends Controller
{
    
 
    public function listEmail(){

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://www.miyaardevelopers.com:2083/execute/Email/list_pops');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');


        $headers = array();
        $headers[] = 'Authorization: cpanel miyantkd:1K66JWPBDRFM22MIPM4UY46VM4IQ1XYP';
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $result = curl_exec($ch);

        // view result
        $result = json_decode($result, true);
        print("<pre>".print_r($result,true)."</pre>");
        //end

        if (curl_errno($ch)) {
        echo 'Error:' . curl_error($ch);
        }
        curl_close($ch);

    }

    public function addEmail(){

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://www.miyaardevelopers.com:2083/execute/Email/add_pop?email=test&password=12345luggage');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');


        $headers = array();
        $headers[] = 'Authorization: cpanel miyantkd:1K66JWPBDRFM22MIPM4UY46VM4IQ1XYP';
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
     
        $result = curl_exec($ch);
        //view result    
        $result = json_decode($result, true);
        print("<pre>".print_r($result,true)."</pre>");
        //end

        if (curl_errno($ch)) {
        echo 'Error:' . curl_error($ch);
        }
        curl_close($ch);
    }

    public function forwardEmail(){

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://www.miyaardevelopers.com:2083/execute/Email/add_forwarder?miyaardevelopers.com&email=test@miyaardevelopers.com&fwdemail=clevercost@miyaardevelopers.com&fwdopt=fwd');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');


        $headers = array();
        $headers[] = 'Authorization: cpanel miyantkd:1K66JWPBDRFM22MIPM4UY46VM4IQ1XYP';
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
     
        $result = curl_exec($ch);
        //view result    
        $result = json_decode($result, true);
        print("<pre>".print_r($result,true)."</pre>");
        //end

        if (curl_errno($ch)) {
        echo 'Error:' . curl_error($ch);
        }
        curl_close($ch);
    }
}
