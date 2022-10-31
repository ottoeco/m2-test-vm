<?php
declare(strict_types=1);
namespace Joe\HelloModule\Controller\Post;

use Joe\HelloModule\Model\PostFactory;
use Joe\HelloModule\Model\ResourceModel\Post as PostResource;
use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\Message\ManagerInterface;

class PostDel implements HttpGetActionInterface
{

    private RequestInterface $request;
    private PostFactory $postFactory;
    private ManagerInterface $messageManager;
    private ResultFactory $resultFactory;
    private PostResource $postResource;

    function __construct(
        RequestInterface $request,
        PostFactory      $postFactory,
        ManagerInterface $messageManager,
        ResultFactory    $resultFactory,
        PostResource     $postResource
    )
    {
        $this->request = $request;
        $this->postFactory = $postFactory;
        $this->resultFactory = $resultFactory;
        $this->postResource = $postResource;
        $this->messageManager = $messageManager;
    }

    public function execute()
    {
        $id=$this->request->getParam('post_id');
        if (isset($id)){
            $post = $this->postFactory->create();
            $post->setPostId($id);
            $this->postResource->delete($post);
            $this->messageManager->addSuccessMessage('Dati Delete !');
            $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
            return $resultRedirect->setUrl('/hello/post/postshow');
        }
    }
}
