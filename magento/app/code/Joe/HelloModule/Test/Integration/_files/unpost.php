<?php
//cancellazione db
use Joe\HelloModule\Model\Post;
use Joe\HelloModule\Model\ResourceModel\Post\Collection as PostCollection;

$objectManager = \Magento\TestFramework\Helper\Bootstrap::getObjectManager();
$collection = $objectManager->create(PostCollection::class);

/** @var Post $post */
foreach($collection->getItems() as $post) {
    $post->getResource()->delete($post);
}
