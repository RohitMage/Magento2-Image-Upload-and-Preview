<?php

namespace Web30india\Uiform\Ui\Component\Listing\Column;

use Magento\Ui\Component\Listing\Columns\Column;
use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Framework\View\Element\UiComponentFactory;
use Magento\Store\Model\StoreManagerInterface;
use Magento\Framework\UrlInterface;

class Thumbnail extends Column
{
    const NAME = 'thumbnail';

    const ALT_FIELD = 'Image';

    protected $storeManager;

    public function __construct(
        ContextInterface $context,
        UiComponentFactory $uiComponentFactory,
        StoreManagerInterface $storeManager,
        array $components = [],
        array $data = []
    )
    {
        $this->storeManager = $storeManager;
        parent::__construct($context, $uiComponentFactory, $components, $data);
    }

    public function prepareDataSource(array $dataSource)
    {
        if (isset($dataSource['data']['items'])) {
            $fieldName = $this->getData('name');
            foreach ($dataSource['data']['items'] as & $item) {
                $filename = $item[$fieldName];
                $item[$fieldName . '_src'] = $this->getImage($filename);
                $item[$fieldName . '_alt'] = $this->getAlt($item) ?: $filename;
                $item[$fieldName . '_orig_src'] = $this->getImage($filename);
            }
        }

        return $dataSource;
    }

    public function getImage($imagePath){
        if($imagePath != ""){
            return $this->storeManager->getStore()->getBaseUrl(UrlInterface::URL_TYPE_MEDIA).'/blog/tmp/image/'.$imagePath;
        }
        return "";
    }

    protected function getAlt($row)
    {
        $altField = $this->getData('config/altField') ?: self::ALT_FIELD;
        return isset($row[$altField]) ? $row[$altField] : null;
    }
}