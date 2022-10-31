<?php
declare(strict_types=1);
namespace Joe\HelloModule\Observer;

use Exception;
use Joe\HelloModule\Logger\CustomLog\MyLogger as Logger;
use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;

class MyEventObserver implements ObserverInterface
{
    /**
     * @var Logger
     */
    private $logger;

    /**
     * MyObserver constructor.
     *
     * @param Logger $logger
     */
    public function __construct(
        Logger $logger
    )
    {
        $this->logger = $logger;
    }

    /**
     * @param Observer $observer
     */
    public function execute(Observer $observer)
    {
        try {
            $textDisplay = new \Magento\Framework\DataObject(array('text' => 'Aggiunto al Carrello !'));
            $this->logger->info("EVENTO: - ".$textDisplay->getText());
        } catch (Exception $e) {
            $this->logger->error($e->getMessage());
        }
    }
}
