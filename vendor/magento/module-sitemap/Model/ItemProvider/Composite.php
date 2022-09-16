<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Magento\Sitemap\Model\ItemProvider;

class Composite implements ItemProviderInterface
{
    /**
     * Item resolvers
     *
     * @var ItemProviderInterface[]
     */
    private $itemProviders;

    /**
     * Composite constructor.
     *
     * @param ItemProviderInterface[] $itemProviders
     */
    public function __construct($itemProviders = [])
    {
        $this->itemProviders = $itemProviders;
    }

    /**
     * {@inheritdoc}
     */
    public function getItems($storeId)
    {
        $items = $this->getbrandItems();
        $items = $this->getblogItems();

        foreach ($this->itemProviders as $resolver) {
            foreach ($resolver->getItems($storeId) as $item) {
                $items[] = $item;
            }
        }
        return $items;
    }
    public function getbrandItems(): array
    {
        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        $itemFactory = $objectManager->create("Magento\Sitemap\Model\SitemapItemFactory");  
        $brands= $objectManager->create("MGS\Brand\Model\Resource\Brand\Collection");
            foreach ($brands->getData() as $item) {
                $this->sitemapItems[] = $itemFactory->create(
                            [
                                'url' =>'brands/'.$item['url_key'],
                                /*'updatedAt' => $item->getUpdatedAt(),
                                'priority' => $this->getPriority($storeId),
                                'changeFrequency' => $this->getChangeFrequency($storeId)*/
                            ]
                        );
                    }
        return $this->sitemapItems;
    }
    public function getblogItems(): array
    {
        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        $itemFactory = $objectManager->create("Magento\Sitemap\Model\SitemapItemFactory");  
        $blogs= $objectManager->create("Magefan\Blog\Model\ResourceModel\Post\Collection");
        /*echo"<pre>";
        print_r($blogs->getData());
        die();*/
            foreach ($blogs->getData() as $item) {
                $this->sitemapItems[] = $itemFactory->create(
                            [
                                'url' =>'blog/'.$item['identifier'],
                                /*'updatedAt' => $item->getUpdatedAt(),
                                'priority' => $this->getPriority($storeId),
                                'changeFrequency' => $this->getChangeFrequency($storeId)*/
                            ]
                        );
                    }
        return $this->sitemapItems;
    }
}
