<?php
declare(strict_types=1);

namespace Joe\HelloModule\ViewModel\Post;

use Magento\Framework\UrlInterface;
use Magento\Framework\View\Element\Block\ArgumentInterface;

class PostNewViewModel implements ArgumentInterface
{
    private UrlInterface $url;

    public function __construct(UrlInterface $url)
    {
        $this->url = $url;
    }
    public function getTitle(): \Magento\Framework\Phrase
    {
        return __('New Post');
    }

    public function getPostNewAction(): string
    {
        return $this->url->getUrl('hello/post/post');
    }
}
