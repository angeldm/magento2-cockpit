<?php
namespace Angeldm\Cockpit\Block\Adminhtml\System;

use Angeldm\Cockpit\Helper\Data;
use Magento\Framework\View\Element\Template;

class Switcher extends \Magento\Backend\Block\Template
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

    /**
     * Block template filename
     *
     * @var string
     */
    protected $_template = 'Angeldm_Cockpit::system/switcher.phtml';

    /**
     * Get fully qualified link url.
     *
     * @param $url
     * @return string
     */
    public function getLinkUrl($url)
    {
        return $this->_urlBuilder->getUrl($url);
    }

    /**
     * Get active or first link for default display.
     *
     * @return \Magento\Framework\Phrase
     */
    public function getCurrentGridTitle()
    {
        $links      = $this->getLinks();
        $currentUrl = str_replace('_', '/', $this->getRequest()->getFullActionName());

        foreach ($links as $link) {
            if ($link['url'] == $currentUrl) {
                return __($link['title']);
            }
        }

        return __(reset($links)['title']);
    }
}
