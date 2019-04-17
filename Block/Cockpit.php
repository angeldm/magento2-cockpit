<?php
/**
 * Terminal
 *
 * @copyright Copyright © 2019 Angeldm. All rights reserved.
 * @author    angeldm@gmail.com
 */

namespace Angeldm\Cockpit\Block;

use Angeldm\Cockpit\Helper\Data;
use Magento\Framework\View\Element\Template;

class Cockpit extends Template
{
    protected $helper;
    /**
     * Constructor
     *
     * @param \Magento\Backend\Block\Template\Context  $context
     * @param array $data
     */
    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        Data $helper,
        array $data = []
    ) {
        $this->helper = $helper;
        parent::__construct($context, $data);
    }

    public function getHost()
    {
        return $this->helper->getHost();
    }

    public function getPort()
    {
        return $this->helper->getPort();
    }

    public function isEnabled()
    {
        return $this->helper->isEnabled();
    }

    public function ping()
    {
        return $this->helper->ping();
    }

    public function getDashboard()
    {
        return $this->helper->getDashboard();
    }

    public function getTabs()
    {
        return $this->helper->getTabs();
    }
}
