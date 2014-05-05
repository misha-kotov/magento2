<?php
/**
 * Magento
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@magentocommerce.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade Magento to newer
 * versions in the future. If you wish to customize Magento for your
 * needs please refer to http://www.magentocommerce.com for more information.
 *
 * @category    Magento
 * @copyright   Copyright (c) 2014 X.commerce, Inc. (http://www.magentocommerce.com)
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

namespace Magento\Catalog\Pricing\Render;

use Magento\Catalog\Model\Product\Configuration\Item\ItemInterface;

/**
 * Class for configured_price rendering
 */
class ConfiguredPriceBox extends FinalPriceBox
{
    /**
     * Retrieve an item instance to the configured price model
     *
     * @return $this
     */
    protected function _prepareLayout()
    {
        /** @var $price \Magento\Bundle\Pricing\Price\ConfiguredPrice */
        $price = $this->getPrice();
        /** @var $renderBlock \Magento\Catalog\Pricing\Render */
        $renderBlock = $this->getRenderBlock();
        if ($renderBlock && $renderBlock->getItem() instanceof ItemInterface) {
            $price->setItem($renderBlock->getItem());
        } elseif ($renderBlock
            && $renderBlock->getParentBlock()
            && $renderBlock->getParentBlock()->getItem() instanceof ItemInterface
        ) {
            $price->setItem($renderBlock->getParentBlock()->getItem());
        }
        return parent::_prepareLayout();
    }
}
