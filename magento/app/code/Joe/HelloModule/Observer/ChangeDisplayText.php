<?php
declare(strict_types=1);
namespace Joe\HelloModule\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;

class ChangeDisplayText implements ObserverInterface
{
    public function __construct()
    {
    }
    // @codingStandardsIgnoreStart
    public function execute( Observer $observer)
    {
        $displayText = $observer->getData('mp_text');
        echo $displayText->getText() . " - Event </br>";
        $displayText->setText('Execute event successfully.');

        return $this;
    }
    // @codingStandardsIgnoreEnd
}
