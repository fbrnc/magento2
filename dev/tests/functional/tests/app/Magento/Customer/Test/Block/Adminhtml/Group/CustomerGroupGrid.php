<?php
/**
 * @copyright Copyright (c) 2014 X.commerce, Inc. (http://www.magentocommerce.com)
 */

namespace Magento\Customer\Test\Block\Adminhtml\Group;

use Magento\Backend\Test\Block\Widget\Grid;

/**
 * Class CustomerGroupGrid
 * Adminhtml customer group grid
 */
class CustomerGroupGrid extends Grid
{
    /**
     * Initialize block elements
     *
     * @var array $filters
     */
    protected $filters = [
        'code' => [
            'selector' => '#customerGroupGrid_filter_type',
        ],
    ];

    /**
     * Locator value for grid to click
     *
     * @var string
     */
    protected $editLink = 'td[data-column="time"]';
}
