<?php
declare(strict_types=1);
namespace Joe\HelloModule\ViewModel\Post;

use Joe\HelloModule\Model\PostFactory;
use Magento\Framework\UrlInterface;
use Magento\Framework\View\Element\Block\ArgumentInterface;

class PostEditListViewModel implements ArgumentInterface
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
        return __('Modify Post');
    }

    public function getPostCollection()
    {
        $post = $this->postsFactory->create();
        return $post->getCollection();
    }
    public function getEditFormAction(int $postId): string
    {
        return $this->url->getUrl('hello/post/postedit', ['post_id' => $postId]);
    }
    public function getDelPostAction(int $postId): string
    {
        return $this->url->getUrl('hello/post/postdel', ['post_id' => $postId]);
    }
}
