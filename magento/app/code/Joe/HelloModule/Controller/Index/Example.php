<?php
declare(strict_types=1);
namespace Joe\HelloModule\Controller\Index;

use Magento\Framework\App\Action\HttpGetActionInterface;

class Example implements HttpGetActionInterface
{

    protected string $title;

    public function execute()
    {
        echo $this->setTitle('Titolo');
        echo $this->getTitle();
    }

    public function setTitle($title)
    {
        return $this->title = $title;
    }

    public function getTitle()
    {
        return $this->title;
    }
}
