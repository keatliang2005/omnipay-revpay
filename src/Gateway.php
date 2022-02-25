<?php

namespace Omnipay\Revpay;

use Omnipay\Common\AbstractGateway;
use Omnipay\Common\Message\RequestInterface;
use Omnipay\Revpay\Message\CompletePurchaseRequest;
use Omnipay\Revpay\Message\PurchaseRequest;

class Gateway extends AbstractGateway
{
    public function getDefaultParameters()
    {
        return [
            'Revpay_Merchant_ID'  => '',
            'revpay_merchant_key' => '',
            'Payment_ID'          => '2', // default payment method if not provide
            'Key_Index'           => '1',
            'Return_URL'          => '',
            'environment'         => 'production'
        ];
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

    public function purchase(array $options = array()): RequestInterface
    {
        return $this->createRequest(PurchaseRequest::class, $options);
    }

    public function completePurchase(array $options = array()): RequestInterface
    {
        return $this->createRequest(CompletePurchaseRequest::class, $options);
    }

    public function setEnvironment($parameter)
    {
        return $this->setParameter('environment', $parameter);
    }

    public function getEnvironment()
    {
        return $this->getParameter('environment');
    }

    public function getName()
    {
        return 'Revpay';
    }
}
