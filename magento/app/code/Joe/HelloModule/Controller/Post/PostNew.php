<?php
declare(strict_types=1);
namespace Joe\HelloModule\Controller\Post;

use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\Controller\ResultInterface;
use Magento\Framework\Exception\NotFoundException;

class PostNew implements HttpGetActionInterface
{
    private ResultFactory $resultFactory;

    function __construct( ResultFactory $resultFactory)
    {
        $this->resultFactory = $resultFactory;
    }
    /**
     * Execute action based on request and return result
     *
     * @return ResultInterface|ResponseInterface
     * @throws NotFoundException
     */
    public function execute()
    {
        // 2. GET request : Render the post page
        return $this->resultFactory->create(ResultFactory::TYPE_PAGE);
    }
}
