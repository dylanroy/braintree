<?php
/**
 * Braintree base class and initialization
 *
 *  PHP version 5
 *
 * @copyright  2010 Braintree Payment Solutions
 */


set_include_path(get_include_path() . PATH_SEPARATOR . realpath(dirname(__FILE__)));

/**
 * Braintree PHP Library
 *
 * Provides methods to child classes. This class cannot be instantiated.
 *
 * @copyright  2010 Braintree Payment Solutions
 */
abstract class Braintree
{
    /**
     * @ignore
     * don't permit an explicit call of the constructor!
     * (like $t = new Braintree_Transaction())
     */
    protected function __construct()
    {
    }
    /**
     * @ignore
     *  don't permit cloning the instances (like $x = clone $v)
     */
    protected function __clone()
    {
    }

    /**
     * returns private/nonexistent instance properties
     * @ignore
     * @access public
     * @param string $name property name
     * @return mixed contents of instance properties
     */
    public function __get($name)
    {
        if (array_key_exists($name, $this->_attributes)) {
            return $this->_attributes[$name];
        }
        else {
            trigger_error('Undefined property on ' . get_class($this) . ': ' . $name, E_USER_NOTICE);
            return null;
        }
    }

    /**
     * used by isset() and empty()
     * @access public
     * @param string $name property name
     * @return boolean
     */
    public function __isset($name)
    {
        return array_key_exists($name, $this->_attributes);
    }

    public function _set($key, $value)
    {
        $this->_attributes[$key] = $value;
    }

    /**
     *
     * @param string $className
     * @param object $resultObj
     * @return object returns the passed object if successful
     * @throws Braintree_Exception_ValidationsFailed
     */
    public static function returnObjectOrThrowException($className, $resultObj)
    {
        $resultObjName = Braintree_Util::cleanClassName($className);
        if ($resultObj->success) {
            return $resultObj->$resultObjName;
        } else {
            throw new Braintree_Exception_ValidationsFailed();
        }
    }
}
require_once(dirname(__FILE__) . '/Braintree/Modification.php');
require_once(dirname(__FILE__) . '/Braintree/Instance.php');

require_once(dirname(__FILE__) . '/Braintree/Address.php');
require_once(dirname(__FILE__) . '/Braintree/AddOn.php');
require_once(dirname(__FILE__) . '/Braintree/Collection.php');
require_once(dirname(__FILE__) . '/Braintree/Configuration.php');
require_once(dirname(__FILE__) . '/Braintree/CreditCard.php');
require_once(dirname(__FILE__) . '/Braintree/Customer.php');
require_once(dirname(__FILE__) . '/Braintree/CustomerSearch.php');
require_once(dirname(__FILE__) . '/Braintree/Descriptor.php');
require_once(dirname(__FILE__) . '/Braintree/Digest.php');
require_once(dirname(__FILE__) . '/Braintree/Discount.php');
require_once(dirname(__FILE__) . '/Braintree/IsNode.php');
require_once(dirname(__FILE__) . '/Braintree/EqualityNode.php');
require_once(dirname(__FILE__) . '/Braintree/Exception.php');
require_once(dirname(__FILE__) . '/Braintree/Http.php');
require_once(dirname(__FILE__) . '/Braintree/KeyValueNode.php');
require_once(dirname(__FILE__) . '/Braintree/MultipleValueNode.php');
require_once(dirname(__FILE__) . '/Braintree/MultipleValueOrTextNode.php');
require_once(dirname(__FILE__) . '/Braintree/PartialMatchNode.php');
require_once(dirname(__FILE__) . '/Braintree/Plan.php');
require_once(dirname(__FILE__) . '/Braintree/RangeNode.php');
require_once(dirname(__FILE__) . '/Braintree/ResourceCollection.php');
require_once(dirname(__FILE__) . '/Braintree/SettlementBatchSummary.php');
require_once(dirname(__FILE__) . '/Braintree/Subscription.php');
require_once(dirname(__FILE__) . '/Braintree/SubscriptionSearch.php');
require_once(dirname(__FILE__) . '/Braintree/SubscriptionStatus.php');
require_once(dirname(__FILE__) . '/Braintree/TextNode.php');
require_once(dirname(__FILE__) . '/Braintree/Transaction.php');
require_once(dirname(__FILE__) . '/Braintree/TransactionSearch.php');
require_once(dirname(__FILE__) . '/Braintree/TransparentRedirect.php');
require_once(dirname(__FILE__) . '/Braintree/Util.php');
require_once(dirname(__FILE__) . '/Braintree/Version.php');
require_once(dirname(__FILE__) . '/Braintree/Xml.php');
require_once(dirname(__FILE__) . '/Braintree/Error/Codes.php');
require_once(dirname(__FILE__) . '/Braintree/Error/ErrorCollection.php');
require_once(dirname(__FILE__) . '/Braintree/Error/Validation.php');
require_once(dirname(__FILE__) . '/Braintree/Error/ValidationErrorCollection.php');
require_once(dirname(__FILE__) . '/Braintree/Exception/Authentication.php');
require_once(dirname(__FILE__) . '/Braintree/Exception/Authorization.php');
require_once(dirname(__FILE__) . '/Braintree/Exception/Configuration.php');
require_once(dirname(__FILE__) . '/Braintree/Exception/DownForMaintenance.php');
require_once(dirname(__FILE__) . '/Braintree/Exception/ForgedQueryString.php');
require_once(dirname(__FILE__) . '/Braintree/Exception/InvalidSignature.php');
require_once(dirname(__FILE__) . '/Braintree/Exception/NotFound.php');
require_once(dirname(__FILE__) . '/Braintree/Exception/ServerError.php');
require_once(dirname(__FILE__) . '/Braintree/Exception/SSLCertificate.php');
require_once(dirname(__FILE__) . '/Braintree/Exception/SSLCaFileNotFound.php');
require_once(dirname(__FILE__) . '/Braintree/Exception/Unexpected.php');
require_once(dirname(__FILE__) . '/Braintree/Exception/UpgradeRequired.php');
require_once(dirname(__FILE__) . '/Braintree/Exception/ValidationsFailed.php');
require_once(dirname(__FILE__) . '/Braintree/Result/CreditCardVerification.php');
require_once(dirname(__FILE__) . '/Braintree/Result/Error.php');
require_once(dirname(__FILE__) . '/Braintree/Result/Successful.php');
require_once(dirname(__FILE__) . '/Braintree/Test/CreditCardNumbers.php');
require_once(dirname(__FILE__) . '/Braintree/Test/TransactionAmounts.php');
require_once(dirname(__FILE__) . '/Braintree/Transaction/AddressDetails.php');
require_once(dirname(__FILE__) . '/Braintree/Transaction/CreditCardDetails.php');
require_once(dirname(__FILE__) . '/Braintree/Transaction/CustomerDetails.php');
require_once(dirname(__FILE__) . '/Braintree/Transaction/StatusDetails.php');
require_once(dirname(__FILE__) . '/Braintree/Transaction/SubscriptionDetails.php');
require_once(dirname(__FILE__) . '/Braintree/WebhookNotification.php');
require_once(dirname(__FILE__) . '/Braintree/WebhookTesting.php');
require_once(dirname(__FILE__) . '/Braintree/Xml/Generator.php');
require_once(dirname(__FILE__) . '/Braintree/Xml/Parser.php');
require_once(dirname(__FILE__) . '/Braintree/CreditCardVerification.php');
require_once(dirname(__FILE__) . '/Braintree/CreditCardVerificationSearch.php');

if (version_compare(PHP_VERSION, '5.2.1', '<')) {
    throw new Braintree_Exception('PHP version >= 5.2.1 required');
}


function requireDependencies() {
    $requiredExtensions = array('xmlwriter', 'SimpleXML', 'openssl', 'dom', 'hash', 'curl');
    foreach ($requiredExtensions AS $ext) {
        if (!extension_loaded($ext)) {
            throw new Braintree_Exception('The Braintree library requires the ' . $ext . ' extension.');
        }
    }
}

requireDependencies();
