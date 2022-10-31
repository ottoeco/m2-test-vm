<?php
declare(strict_types=1);
namespace Joe\HelloModule\ViewModel\Post;

use Joe\HelloModule\Model\PostFactory;
use Joe\HelloModule\Model\ResourceModel\Post as PostResource;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\Controller\Result\ForwardFactory;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\Message\ManagerInterface;
use Magento\Framework\UrlInterface;
use Magento\Framework\View\Element\Block\ArgumentInterface;

class PostEditViewModel implements ArgumentInterface
{
    private RequestInterface $request;
    private PostFactory $postFactory;
//    private ManagerInterface $messageManager;
//    private ResultFactory $resultFactory;
    private PostResource $postResource;
//    private ForwardFactory $forwardFactory;
    private UrlInterface $url;

    public function __construct(
        RequestInterface $request,
        PostFactory      $postFactory,
        PostResource     $postResource,
        UrlInterface    $url
    )
    {
        $this->request = $request;
        $this->postFactory = $postFactory;
        $this->postResource = $postResource;
        $this->url = $url;
    }
    public function getTitle()
    {
        return __('Edit Post N: '.$this->request->getParam('post_id'));
    }
    public function getEditPostRequest()
    {
        $post= $this->postFactory->create();
        $this->postResource->load($post,$this->request->getParam('post_id'));
        return $post;
    }
    public function getPostAction(): string
    {
        return $this->url->getUrl('hello/post/post');
    }
}
