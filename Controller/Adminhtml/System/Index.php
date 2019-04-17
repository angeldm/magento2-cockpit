<?php
/**
 * Terminal
 *
 * @copyright Copyright © 2019 Angeldm. All rights reserved.
 * @author    angeldm@gmail.com
 */
namespace Angeldm\Cockpit\Controller\Adminhtml\System;

/**
 * @author Àngel Díaz <angeldm@gmail.com>
 */
class Index extends \Magento\Backend\App\Action
{
    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    protected $resultPageFactory;

    /**
     * Constructor
     *
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Magento\Framework\View\Result\PageFactory $resultPageFactory
     */
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory
    ) {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
    }

    /**
     * Load the page defined in view/adminhtml/layout/exampleadminnewpage_helloworld_index.xml
     *
     * @return \Magento\Framework\View\Result\Page
     */
    public function execute()
    {
        $page = $this->resultPageFactory->create();
        $page->getConfig()->getTitle()->prepend(__('Cockpit'));
        return $page;
    }
}
