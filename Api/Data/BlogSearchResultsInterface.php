<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Web30india\Uiform\Api\Data;

interface BlogSearchResultsInterface extends \Magento\Framework\Api\SearchResultsInterface
{

    /**
     * Get Blog list.
     * @return \Web30india\Uiform\Api\Data\BlogInterface[]
     */
    public function getItems();

    /**
     * Set Name list.
     * @param \Web30india\Uiform\Api\Data\BlogInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}

