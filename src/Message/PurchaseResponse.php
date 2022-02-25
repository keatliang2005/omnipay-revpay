<?php

namespace Omnipay\Revpay\Message;

use Omnipay\Common\Message\AbstractResponse;
use Omnipay\Common\Message\RedirectResponseInterface;

class PurchaseResponse extends AbstractResponse implements
    RedirectResponseInterface
{

    public function isSuccessful()
    {
        return false;
    }

    public function isRedirect()
    {
        return true;
    }

    public function getRedirectUrl()
    {
        // need to implement on purchase request
        return $this->getRequest()->getEndpoint();
    }

    public function getRedirectMethod()
    {
        return 'POST';
    }

    // array of data
    public function getRedirectData()
    {
        return $this->data;
    }
}
