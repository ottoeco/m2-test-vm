<?php
declare(strict_types=1);

namespace Joe\HelloModule\ViewModel\Post;

use Joe\HelloModule\Model\PostFactory;
use Magento\Framework\UrlInterface;
use Magento\Framework\View\Element\Block\ArgumentInterface;

class PostShowViewModel implements ArgumentInterface
{
    private UrlInterface $url;
    private PostFactory $postsFactory;

    public function __construct(
        UrlInterface $url,
        PostFactory  $postFactory
    )
    {
        $this->url = $url;
        $this->postsFactory = $postFactory;
    }

    public function getTitle()
    {
        return __('Show Posts');
    }

    public function getPostCollection()
    {
        $post = $this->postsFactory->create();
        return $post->getCollection();
    }
}
