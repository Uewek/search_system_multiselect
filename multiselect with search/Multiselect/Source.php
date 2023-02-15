<?php
declare(strict_types=1);

namespace Vega\ProductCardReport\Model\Multiselect;

use Magento\Catalog\Model\ResourceModel\Product\Attribute\CollectionFactory;
use Magento\Framework\Option\ArrayInterface;

/**
 * Data source for multiselect in system config
 */
class Source implements ArrayInterface
{
    /**
     * @var CollectionFactory
     */
    protected $collectionFactory;

    public function __construct(
        CollectionFactory $collectionFactory
    ) {
        $this->collectionFactory = $collectionFactory;
    }

    public function toOptionArray()
    {
        $result = [];
        $data = $this->collectionFactory->create()->getData();
        foreach ($data as $item) {
            $result[] = [
                'label' => $item['frontend_label'],
                'value' => $item['attribute_code']
            ];
        }
        return  $result;
    }
}