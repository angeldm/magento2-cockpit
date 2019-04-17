<?php

namespace Angeldm\Cockpit\Helper;

use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\App\Helper\Context;

/**
 * @author Àngel Díaz <angeldm@gmail.com>
 */
class Data extends \Magento\Framework\App\Helper\AbstractHelper
{
    /**
 * @var \Magento\Framework\HTTP\Client\Curl
 */
    protected $curl;

    /**
     * @param \Magento\Framework\App\Helper\Context $context
     */
    public function __construct(
        \Magento\Framework\App\Helper\Context $context,
        \Magento\Framework\HTTP\Client\Curl $curl
    ) {
        $this->curl = $curl;

        $this->curl->setOption(CURLOPT_SSL_VERIFYHOST, false);
        $this->curl->setOption(CURLOPT_SSL_VERIFYPEER, false);
        parent::__construct($context);
    }

    /**
     * Get enabled
     *
     * @return bool
     */
    public function isEnabled($scope = ScopeConfigInterface::SCOPE_TYPE_DEFAULT)
    {
        return $this->scopeConfig->isSetFlag(
            'angeldm/cockpit/enabled',
            $scope
        );
    }

    /**
     * Get ping
     *
     * @return bool
     */
    public function ping($scope = ScopeConfigInterface::SCOPE_TYPE_DEFAULT)
    {
        try {
            $host = $this->getHost();
            $port = $this->getPort();
            $url = 'https://' . $host . ':' . $port . '/ping';
            $this->curl->get($url);
            $status =$this->curl->getStatus();
            //  $this->logger->debug('statyus', $status);
            return $status;
        } catch (\Exception $e) {
            return false;
        }
        if ($status == 200) {
            return true;
        }
        return false;
    }

    /**
     * Get Host
     *
     * @return string
     */
    public function getHost($scope = ScopeConfigInterface::SCOPE_TYPE_DEFAULT)
    {
        return $this->scopeConfig->getValue(
            'angeldm/cockpit/host',
            $scope
        );
    }

    /**
     * Get port
     *
     * @return string
     */
    public function getPort($scope = ScopeConfigInterface::SCOPE_TYPE_DEFAULT)
    {
        return $this->scopeConfig->getValue(
            'angeldm/cockpit/port',
            $scope
        );
    }
}
