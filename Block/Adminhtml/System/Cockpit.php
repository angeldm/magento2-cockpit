<?php
/**
 * Terminal
 *
 * @copyright Copyright © 2019 Angeldm. All rights reserved.
 * @author    angeldm@gmail.com
 */

namespace Angeldm\Cockpit\Block\Adminhtml\System;

/**
 * @author Àngel Díaz <angeldm@gmail.com>
 */
class Cockpit extends \Magento\Framework\View\Element\Template
{

    /**
     * @var \Angeldm\Cockpit\Helper\Data
     */
    protected $helper;
    /**
     * Constructor
     *
     * @param \Magento\Backend\Block\Template\Context  $context
     * @param array $data
     */
    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Angeldm\Cockpit\Helper\Data $helper,
        array $data = []
    ) {
        $this->helper = $helper;
        parent::__construct($context, $data);
    }

    /**
     * Get Host
     *
     * @return string
     */
    public function getHost()
    {
        return $this->helper->getHost();
    }

    /**
     * Get port
     *
     * @return string
     */
    public function getPort()
    {
        return $this->helper->getPort();
    }

    /**
     * Get enabled
     *
     * @return bool
     */
    public function isEnabled()
    {
        return $this->helper->isEnabled();
    }

    /**
     * Get ping
     *
     * @return bool
     */
    public function ping()
    {
        return $this->helper->ping();
    }

    /**
     * Get url
     *
     * @return string
     */
    public function getCockpitURL()
    {
        return 'https://' . $this->helper->getHost()
        . ':' . $this->helper->getPort() . '/cockpit/@localhost/system/terminal.html';
    }
}
