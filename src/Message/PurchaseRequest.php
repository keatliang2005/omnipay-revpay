<?php

namespace Omnipay\Revpay\Message;

class PurchaseRequest extends AbstractRequest
{
    protected string $uatEndpoint = 'https://staging-gateway.revpay.com.my/payment';
    protected string $productionEndpoint = 'https://gateway.revpay.com.my/payment';

    /**
     * @inheritDoc
     */
    public function getData()
    {
        $this->validate(
            'revpay_merchant_key',
            'Revpay_Merchant_ID',
            'Payment_ID',
            'Reference_Number',
            'Amount',
            'Currency',
            'Transaction_Description',
            'Customer_IP',
            'Key_Index',
            'Return_URL',
        );

        $data = [
            'Revpay_Merchant_ID'            => $this->getRevPayMerchantId(),
            'Payment_ID'                    => $this->getPaymentId(),
            'Bank_Code'                     => '',
            'Reference_Number'              => $this->getReferenceNumber(),
            'Amount'                        => $this->getAmount(),
            'Currency'                      => $this->getCurrency(),
            'Transaction_Description'       => $this->getTransactionDescription(),
            'Billing_Address'               => '',
            'Shipping_Address'              => '',
            'Device_ID'                     => '',
            'Ecomm_Marketplace'             => '',
            'Promo_Code'                    => '',
            'Transaction_Type'              => '',
            'Customer_ID'                   => '',
            'Customer_Name'                 => '',
            'Customer_Email'                => '',
            'Customer_Contact'              => '',
            'Customer_IP'                   => $this->getCustomerIp(),
            'Geo_Location'                  => '',
            'Card_Type'                     => '',
            'Card_Holder_Name'              => '',
            'Funding_Pan'                   => '',
            'Funding_Exp_Date'              => '',
            'Funding_CVV'                   => '',
            'Card_Issuer_Bank_Country_Code' => '',
            'Instalment_Plan'               => '',
            'Instalment_Term'               => '',
            'Token_Pan'                     => '',
            'Token_Exp_Date'                => '',
            'Key_Index'                     => $this->getKeyIndex(),
            'Return_URL'                    => $this->getReturnUrl(),
            'Payment_Indicator'             => ''
        ];

        $data['Signature'] = $this->checksumSignature($data);

        return $data;
    }

    /**
     * @inheritDoc
     */
    public function sendData($data)
    {
        return $this->response = new PurchaseResponse($this, $data);
    }

    public function setReferenceNumber($parameter)
    {
        return $this->setParameter('Reference_Number', $parameter);
    }

    public function getReferenceNumber()
    {
        return $this->getParameter('Reference_Number');
    }

    public function setAmount($parameter)
    {
        return $this->setParameter('Amount', $parameter);
    }

    public function getAmount()
    {
        return $this->getParameter('Amount');
    }

    public function setCurrency($parameter)
    {
        return $this->setParameter('Currency', $parameter);
    }

    public function getCurrency()
    {
        return $this->getParameter('Currency');
    }

    public function setTransactionDescription($parameter)
    {
        return $this->setParameter('Transaction_Description', $parameter);
    }

    public function getTransactionDescription()
    {
        return $this->getParameter('Transaction_Description');
    }

    public function setCustomerIp($parameter)
    {
        return $this->setParameter('Customer_IP', $parameter);
    }

    public function getCustomerIp()
    {
        return $this->getParameter('Customer_IP');
    }

    public function getEndpoint()
    {
        return $this->getTestMode() ? $this->uatEndpoint : $this->productionEndpoint;
    }

    public function checksumSignature($data)
    {
        return hash('sha512',
            $this->getRevPayMerchantKey().
            $data['Revpay_Merchant_ID'].
            $data['Reference_Number'].
            $data['Amount'].
            $data['Currency']
        );
    }
}
