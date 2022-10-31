<?php
declare(strict_types=1);

namespace Joe\HelloModule\Model\ResourceModel\Post;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
	protected $_idFieldName = 'post_id';
	protected $_eventPrefix = 'joe_hellomodule_post_collection';
	protected $_eventObject = 'post_collection';

	/**
	 * Collection initialisation
     * Define resource model
	 *
	 * @return void
	 */
	protected function _construct()
	{
		$this->_init('Joe\HelloModule\Model\Post', 'Joe\HelloModule\Model\ResourceModel\Post');
	}

}
