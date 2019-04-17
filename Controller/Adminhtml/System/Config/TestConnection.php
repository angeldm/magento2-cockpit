<?php
/**
 * Terminal
 *
 * @copyright Copyright © 2019 Angeldm. All rights reserved.
 * @author    angeldm@gmail.com
 */
namespace Angeldm\Cockpit\Controller\Adminhtml\System\Config;

/**
 * @author Àngel Díaz <angeldm@gmail.com>
 */
class TestConnection extends \Magento\Backend\App\Action
{

  /**
   * @var \Magento\Framework\Controller\Result\JsonFactory
   */
    protected $resultJsonFactory;

    /**
     * @var \Angeldm\Cockpit\Helper\Data
     */
    protected $helper;

    /**
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Magento\Framework\Controller\Result\JsonFactory $resultJsonFactory
     * @param \Angeldm\Cockpit\Helper\Data $helper
     */
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\Controller\Result\JsonFactory $resultJsonFactory,
        \Psr\Log\LoggerInterface $logger,
        \Angeldm\Cockpit\Helper\Data $helper
    ) {
        $this->resultJsonFactory = $resultJsonFactory;
        $this->helper = $helper;
        parent::__construct($context);
    }

    /**
     * Collect relations data
     *
     * @return \Magento\Framework\Controller\Result\Json
     */
    public function execute()
    {
        /** @var \Magento\Framework\Controller\Result\Json $result */
        $result = $this->resultJsonFactory->create();
        try {
            if (!$this->helper->ping()) {
                $responseData = [
                            'success' => false,
                            'message' => __('Service cockpit not found')
                        ];
                return $result->setData($responseData);
            } else {
                $responseData = [
                            'success' => true,
                            'message' => __('Connection Success')
                        ];
            }
        } catch (\Exception $e) {
            $responseData['success'] = false;
            $responseData['message'] = $e->getMessage();
            $this->logger->critical($e);
        }

        return $result->setData($responseData);
    }

    /**
     * Is the user allowed to view the blog post grid.
     *
     * @return bool
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Angeldm_Cockpit::cockpit');
    }
}
