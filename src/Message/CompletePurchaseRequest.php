<?php

namespace Omnipay\Revpay\Message;

use Omnipay\Common\Exception\InvalidRequestException;
use Omnipay\Common\Message\ResponseInterface;

class CompletePurchaseRequest extends AbstractRequest
{

    public function getData()
    {
        $data = $this->httpRequest->request->all();

        if(empty($data)){
            $data = $this->httpRequest->toArray();
        }

        return $data;
    }

    /**
     * @inheritDoc
     * @throws InvalidRequestException
     */
    public function sendData($data): CompletePurchaseResponse|ResponseInterface
    {
        return $this->response = new CompletePurchaseResponse($this, $data);
    }


}
