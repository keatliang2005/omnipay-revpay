<?php

namespace Omnipay\Revpay\Message;

use Omnipay\Common\Exception\InvalidRequestException;
use Omnipay\Common\Message\AbstractResponse;
use Omnipay\Common\Message\RequestInterface;

class CompletePurchaseResponse extends AbstractResponse
{
    public function __construct(RequestInterface $request, $data)
    {
        parent::__construct($request, $data);

        if($this->request->getVerifySignature() && ($this->checksumSignature() !== $this->getKey('Signature'))){
            throw new InvalidRequestException('revPay callback invalid signature');
        }
    }

    public function checksumSignature()
    {
        return hash('sha512',
            $this->request->getRevPayMerchantKey().
            $this->request->getRevPayMerchantId().
            $this->getTransactionReference().
            $this->getCode().
            $this->getTransactionId().
            $this->getKey('Amount').
            $this->getKey('Currency'));
    }

    public function isSuccessful()
    {
        return $this->getCode() === '00';
    }

    public function getTransactionId()
    {
        return $this->getKey('Reference_Number');
    }

    public function getTransactionReference()
    {
        return $this->getKey('Transaction_ID');
    }

    public function getMessage()
    {
        // todo find out non error one
        return $this->getKey('Error_Description');
    }

    public function isCancelled()
    {
        return $this->getCode() == '17';
    }

    public function getCode()
    {
        return $this->getKey('Response_Code');
    }

    protected function getKey($key)
    {
        return $this->data[$key] ?? null;
    }


}
