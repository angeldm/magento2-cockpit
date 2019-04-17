<?php

namespace Angeldm\Cockpit\Helper;

use Angeldm\Cockpit\Model\Config\Source\Tabs;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Framework\App\Helper\Context;

class Data extends AbstractHelper
{
    protected $curl;
    protected $tabs;
    /**
     * @param \Magento\Framework\App\Helper\Context $context
     */
    public function __construct(
        \Magento\Framework\App\Helper\Context $context,
        \Magento\Framework\HTTP\Client\Curl $curl,
        Tabs $tabs
    ) {
        $this->curl = $curl;
        $this->tabs = $tabs;
        $this->curl->setOption(CURLOPT_SSL_VERIFYHOST, false);
        $this->curl->setOption(CURLOPT_SSL_VERIFYPEER, false);
        parent::__construct($context);
    }

    public function getLastCollectTime()
    {
        return "Yes";
    }

    /*
     * @return bool
     */
    public function isEnabled($scope = ScopeConfigInterface::SCOPE_TYPE_DEFAULT)
    {
        return $this->scopeConfig->isSetFlag(
            'angeldm/cockpit/enabled',
            $scope
        );
    }

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
        }
        return 0;
    }
    /*
     * @return string
     */
    public function getHost($scope = ScopeConfigInterface::SCOPE_TYPE_DEFAULT)
    {
        return $this->scopeConfig->getValue(
            'angeldm/cockpit/host',
            $scope
        );
    }

    /*
     * @return string
     */
    public function getPort($scope = ScopeConfigInterface::SCOPE_TYPE_DEFAULT)
    {
        return $this->scopeConfig->getValue(
            'angeldm/cockpit/port',
            $scope
        );
    }

    /*
     * @return string
     */
    public function getDashboard($scope = ScopeConfigInterface::SCOPE_TYPE_DEFAULT)
    {
        return $this->scopeConfig->getValue(
            'angeldm/cockpit/dashboard',
            $scope
        );
    }

    /*
     * @return string
     */
    public function getTabs($scope = ScopeConfigInterface::SCOPE_TYPE_DEFAULT)
    {
        $list = $this->scopeConfig->getValue(
            'angeldm/cockpit/tabs',
            $scope
        );
        if ($list !== null) {
            $array=explode(',', $list);
            return $this->tabs->arrayFillKeys($array);
        } else {
            return [];
        }
    }
}
