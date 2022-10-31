<?php
declare(strict_types=1);
namespace Joe\HelloModule\Model;

use Joe\HelloModule\Api\Data\PostInterface;
use Magento\Framework\Model\AbstractModel;
//use Magento\Framework\DataObject\IdentityInterface;

class Post extends AbstractModel implements PostInterface
{
	const CACHE_TAG = 'joe_hellomodule_post';

	protected $_cacheTag = 'joe_hellomodule_post';

	protected $_eventPrefix = 'joe_hellomodule_post';

	protected function _construct()
	{
		$this->_init('Joe\HelloModule\Model\ResourceModel\Post');
	}

	public function getIdentities()
	{
		return [self::CACHE_TAG . '_' . $this->getId()];
	}

	public function getDefaultValues()
	{
		$values = [];

		return $values;
	}

    /**
     * Get ID
     *@return int|null

     */
    //     * * @return string
    public function getPostId(): int
    {
        // TODO: Implement getPostId() method.
        return (int)$this->getData(PostInterface::POST_ID);
    }

    /**
     * Set ID
     *
     * @param $id
     * @return PostInterface
     */
    public function setPostId($id): PostInterface
    {
        // TODO: Implement setPostId() method.
        return $this->setData(PostInterface::POST_ID , $id);
    }

    /**
     * Get Post name
     *
     * @return string
     */
    public function getPostName(): string
    {
        // TODO: Implement getPostName() method.
        return $this->getData(PostInterface::POST_NAME);
    }

    /**
     * Set Post name
     *
     * @param string $name
     */
    public function setPostName(string $name)
    {
        // TODO: Implement setPostName() method.
        $this->setData(PostInterface::POST_NAME , $name);
    }

    /**
     * Get Post content
     *
     * @return string
     */
    public function getPostContent(): string
    {
        // TODO: Implement getPostContent() method.
        return $this->getData(PostInterface::POST_CONTENT);
    }

    /**
     * Set Post content
     *
     * @param string $content
          */
    public function setPostContent(string $content)
    {
        // TODO: Implement setPostContent() method.
        $this->setData(PostInterface::POST_CONTENT , $content);
    }
}
