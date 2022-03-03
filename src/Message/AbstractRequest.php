<?php

namespace Omnipay\Revpay\Message;

use Omnipay\Common\Message\ResponseInterface;

abstract class AbstractRequest extends \Omnipay\Common\Message\AbstractRequest
{
    public function setVerifySignature($parameter)
    {
        return $this->setParameter('verify_signature', $parameter);
    }

    public function getVerifySignature()
    {
        return $this->getParameter('verify_signature');
    }

    public function setRevPayMerchantId($parameter)
    {
        return $this->setParameter('Revpay_Merchant_ID', $parameter);
    }

    public function getRevPayMerchantId()
    {
        return $this->getParameter('Revpay_Merchant_ID');
    }

    public function setRevPayMerchantKey($parameter)
    {
        return $this->setParameter('revpay_merchant_key', $parameter);
    }

    public function getRevPayMerchantKey()
    {
        return $this->getParameter('revpay_merchant_key');
    }

    public function setPaymentId($parameter)
    {
        return $this->setParameter('Payment_ID', $parameter);
    }

    public function getPaymentId()
    {
        return $this->getParameter('Payment_ID');
    }

    public function getKeyIndex()
    {
        return $this->getParameter('Key_Index');
    }

    public function setKeyIndex($parameter)
    {
        return $this->setParameter('Key_Index', $parameter);
    }

    public function getReturnUrl()
    {
        return $this->getParameter('Return_URL');
    }

    public function setReturnUrl($parameter)
    {
        return $this->setParameter('Return_URL', $parameter);
    }

    public function setEnvironment($parameter)
    {
        return $this->setParameter('environment', $parameter);
    }

    public function getEnvironment()
    {
        return $this->getParameter('environment');
    }
}
