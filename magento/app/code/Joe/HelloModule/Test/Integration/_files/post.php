<?php
//creazione db
$objectManager = \Magento\TestFramework\Helper\Bootstrap::getObjectManager();

$post = $objectManager->create(\Joe\HelloModule\Model\Post::class);

$post->setPostContent("Post di prova");
$post->setPostName("Titolo");

$post->getResource()->save($post);
