<?php
declare(strict_types=1);
namespace Joe\HelloModule\Controller\Post;

use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\Controller\ResultFactory;

class PostEditList implements HttpGetActionInterface
{
    private ResultFactory $resultFactory;

    function __construct( ResultFactory $resultFactory)
    {
        $this->resultFactory = $resultFactory;
    }
    public function execute()
    {
        return $this->resultFactory->create(ResultFactory::TYPE_PAGE);
    }
}
