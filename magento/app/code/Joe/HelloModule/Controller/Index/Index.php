<?php
declare(strict_types=1);
namespace Joe\HelloModule\Controller\Index;

use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\ResultInterface;
use Magento\Framework\Exception\NotFoundException;
use Magento\Framework\View\Result\PageFactory;
use Joe\HelloModule\Model\PostFactory;

class Index implements HttpGetActionInterface
{
    private PageFactory $pageFactory;
    private PostFactory $postFactory;
    public function __construct(
        PageFactory $pageFactory,
        PostFactory $postFactory
    )
    {
        $this->pageFactory = $pageFactory;
        $this->postFactory = $postFactory;
    }
    /**
     * Execute action based on request and return result
     *
     * @return ResultInterface|ResponseInterface
     * @throws NotFoundException
     */
    // @codingStandardsIgnoreStart
    public function execute()
    {
        $post = $this->postFactory->create();
        $collection = $post->getCollection();//->addFilter('post_name','nome');
        foreach ($collection as $item) {
            echo "<pre>";
            print_r($item->getData());
            echo "</pre>";
        }
        //exit();
        //blocco la creazione della pagina
        return $this->pageFactory->create();
    }
    // @codingStandardsIgnoreEnd
}
