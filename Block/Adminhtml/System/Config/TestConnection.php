<?php
/**
 * Terminal
 *
 * @copyright Copyright © 2019 Angeldm. All rights reserved.
 * @author    angeldm@gmail.com
 */
namespace Angeldm\Cockpit\Block\Adminhtml\System\Config;

use Magento\Framework\Data\Form\Element\AbstractElement;

/**
 * @author Àngel Díaz <angeldm@gmail.com>
 */
class TestConnection extends \Magento\Config\Block\System\Config\Form\Field
{
    /**
     * @var string
     */
    protected $_template = 'Angeldm_Cockpit::system/config/test_connection.phtml';

    /**
     * Remove scope label
     *
     * @param  \Magento\Framework\Data\Form\Element\AbstractElement $element
     * @return string
     */
    public function render(\Magento\Framework\Data\Form\Element\AbstractElement $element)
    {
        $element->unsScope()->unsCanUseWebsiteValue()->unsCanUseDefaultValue();
        return parent::render($element);
    }

    /**
     * Return element html
     *
     * @param  \Magento\Framework\Data\Form\Element\AbstractElement $element
     * @return string
     */
    protected function _getElementHtml(AbstractElement $element)
    {
        return $this->_toHtml();
    }
    /**
     * Return ajax url for collect button
     *
     * @return string
     */
    public function getAjaxUrl()
    {
        return $this->getUrl(
            'cockpit/system_config/testConnection',
            ['store' => $this->_request->getParam('store')]
        );
    }

    /**
     * Generate button html
     *
     * @return string
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getButtonHtml()
    {
        return $this->getLayout()->createBlock(
            \Magento\Backend\Block\Widget\Button::class
        )->setData(
            [
                  'id' => 'test_connection',
                  'label' => __('Test Connection'),
                  'style' => 'display: block'
              ]
        )->toHtml();
    }
}
