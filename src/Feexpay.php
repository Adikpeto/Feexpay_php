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

    public function init()
    {
        return $this->token;
    }

  

}
