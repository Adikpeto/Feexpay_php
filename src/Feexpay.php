<?php

declare(strict_types=1);

namespace Adikpeto\Feexpay;

class Feexpay
{
    /**
     * Create a new Skeleton Instance
     */

   
    public function __construct(string $id,int $amount,string $token,string $callback_url,string $mode)
    {
        // constructor body
        $this->id = $id;
        $this->amount = $amount;
        $this->token = $token;
        $this->callback_url = $callback_url;
        $this->mode = $mode;

    
    }

    public function getIdAndMarchanName()
    {
        $curl = curl_init("https://api.feexpay.me/api/shop/$this->id/get_shop");
        curl_setopt($curl,CURLOPT_CAINFO,__DIR__.DIRECTORY_SEPARATOR.'certificats/IXRCERT.crt');
        curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
        $responseCurl = curl_exec($curl);
        $responseData = json_decode($responseCurl);
        return $responseData;

        
    }


  

}
