<?php
/**
 * Terminal
 *
 * @copyright Copyright © 2019 Angeldm. All rights reserved.
 * @author    angeldm@gmail.com
 */

namespace Angeldm\Cockpit\Block;

use Magento\Framework\View\Element\Template;

class Cockpit extends Template
{

    /**
     * Constructor
     *
     * @param \Magento\Backend\Block\Template\Context  $context
     * @param array $data
     */
    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        array $data = []
    ) {
        parent::__construct($context, $data);
    }
}
