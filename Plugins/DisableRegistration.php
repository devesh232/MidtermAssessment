<?php

namespace Cognixia\DisableRegistration\Plugins;

use Magento\Customer\Model\Registration;
use Magento\Framework\App\Config\ScopeConfigInterface;

class DisableRegistration
{
    const XML_PATH_DISABLE_CUSTOMER_REGISTRATION = 'customer/create_account/disable_registration';
    protected $scopeConfig;

     public function __construct(
         ScopeConfigInterface $scopeConfig
     )
     {
        $this->scopeConfig = $scopeConfig;
     }

    public function afterIsAllowed(Registration $subject, $result)
    {
        if($this->scopeConfig->isSetFlag(self::XML_PATH_DISABLE_CUSTOMER_REGISTRATION, $scopeType = ScopeConfigInterface::SCOPE_TYPE_DEFAULT, $scopeCode = null)){
            return false;
        }else{
            return true;
        }
    }
}
