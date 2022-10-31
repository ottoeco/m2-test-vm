<?php
declare(strict_types=1);

namespace Joe\HelloModule\Controller\Post;

use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\Controller\ResultFactory;


class PostShow implements HttpGetActionInterface
{
    private ResultFactory $resultFactory;

    public function __construct(
       ResultFactory $resultFactory
    )
    {
        $this->resultFactory=$resultFactory;
    }

    public function execute()
    {
        return $this->resultFactory->create(ResultFactory::TYPE_PAGE);
    }
}
