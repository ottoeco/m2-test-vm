<?php
declare(strict_types=1);
namespace Joe\HelloModule\Controller\Post;

use Joe\HelloModule\Model\PostFactory;
use Joe\HelloModule\Model\ResourceModel\Post as PostResource;
use Magento\Framework\App\Action\HttpPostActionInterface;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\Controller\Result\ForwardFactory;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\Message\ManagerInterface;

class Post implements HttpPostActionInterface
{

    private RequestInterface $request;
    private PostFactory $postFactory;
    private ManagerInterface $messageManager;
    private ResultFactory $resultFactory;
    private PostResource $postResource;
    private ForwardFactory $forwardFactory;

    function __construct(
        RequestInterface $request,
        PostFactory      $postFactory,
        ManagerInterface $messageManager,
        ResultFactory    $resultFactory,
        PostResource     $postResource,
        ForwardFactory   $forwardFactory
    )
    {
        $this->request = $request;
        $this->postFactory = $postFactory;
        $this->resultFactory = $resultFactory;
        $this->postResource = $postResource;
        $this->forwardFactory = $forwardFactory;
        $this->messageManager = $messageManager;
    }

    public function execute()
    {
        // Retrieve your form data
        $postData = (array)$this->request->getPost();
        // 1. POST request : data
        $post = $this->postFactory->create();
        //update
        if (isset($postData['post_id']) && isset($postData['form_key'])) {
            $post->setPostId($postData['post_id']);
            $post->setPostName($postData['post_name']);
            $post->setPostContent($postData['post_content']);
            $this->postResource->save($post);
            $this->messageManager->addSuccessMessage('Dati Update !');
            $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
            return $resultRedirect->setUrl('/hello/post/postshow');

        }
        //insert
        if (!empty($postData) && isset($postData['form_key'])) {
            $post->setPostName($postData['post_name']);
            $post->setPostContent($postData['post_content']);
            $this->postResource->save($post);
            // Display the success form validation message
            $this->messageManager->addSuccessMessage('Dati Salvati !');
            // Redirect to your form page (or anywhere you want...)
            $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
            $resultRedirect->setUrl('/hello/post/postshow');
            return $resultRedirect;
        }
        return $this->forwardFactory->create()->forward('postnew');
    }
}
