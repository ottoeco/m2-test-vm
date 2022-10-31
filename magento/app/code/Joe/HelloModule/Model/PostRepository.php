<?php
declare(strict_types=1);
namespace Joe\HelloModule\Model;

use Magento\Framework\Api\DataObjectHelper;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\StateException;
use Magento\Framework\Exception\ValidatorException;
use Magento\Framework\Exception\NoSuchEntityException;
use Joe\HelloModule\Api\PostRepositoryInterface;
use Joe\HelloModule\Api\Data\PostInterface;
use Joe\HelloModule\Api\Data\PostInterfaceFactory;
//use Joe\HelloModule\Api\Data\PostSearchResultsInterfaceFactory;
use Joe\HelloModule\Model\ResourceModel\Post as ResourcePost;
use Joe\HelloModule\Model\ResourceModel\Post\CollectionFactory as PostCollectionFactory;

class PostRepository implements PostRepositoryInterface
{
    /**
     * @var array
     */
    protected $_instances = [];
    /**
     * @var ResourcePost
     */
    protected $_resource;
    /**
     * @var PostCollectionFactory
     */
    protected $_postCollectionFactory;
//    /**
//     * @var PostSearchResultsInterfaceFactory
//     */
//    protected $_searchResultsFactory;
    /**
     * @var PostInterfaceFactory
     */
    protected $_postInterfaceFactory;
    /**
     * @var DataObjectHelper
     */
    protected $_dataObjectHelper;

    public function __construct(
        ResourcePost                      $resource,
        PostCollectionFactory             $postCollectionFactory,
//        PostSearchResultsInterfaceFactory $postSearchResultsInterfaceFactory,
        PostInterfaceFactory              $postInterfaceFactory,
        DataObjectHelper                  $dataObjectHelper
    )
    {
        $this->_resource = $resource;
        $this->_postCollectionFactory = $postCollectionFactory;
//        $this->_searchResultsFactory = $postSearchResultsInterfaceFactory;
        $this->_postInterfaceFactory = $postInterfaceFactory;
        $this->_dataObjectHelper = $dataObjectHelper;
    }

    /**
     * @param PostInterface $post
     * @return PostInterface
     * @throws CouldNotSaveException
     */
    public function save(PostInterface $post)
    {
        try {
            /** @var PostInterface|\Magento\Framework\Model\AbstractModel $post */
            $this->_resource->save($post);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__(
                'Could not save the post: %1',
                $exception->getMessage()
            ));
        }
        return $post;
    }

    /**
     * Get post record
     *
     * @param $postId
     * @return mixed
     * @throws NoSuchEntityException
     */
    public function getById($postId)
    {
        if (!isset($this->_instances[$postId])) {
            /** @var PostInterface|\Magento\Framework\Model\AbstractModel $post */
            $post = $this->_postInterfaceFactory->create();
            $this->_resource->load($post, $postId);
            if (!$post->getPostId()) {
                throw new NoSuchEntityException(__('Requested post doesn\'t exist'));
            }
            $this->_instances[$postId] = $post;
        }
        return $this->_instances[$postId];
    }

    /**
     * @param PostInterface $post
     * @return bool
     * @throws CouldNotSaveException
     * @throws StateException
    */
    public function delete(PostInterface $post)
    {
        /** @var PostInterface|\Magento\Framework\Model\AbstractModel $post */
        $id = $post->getPostId();
        try {
            unset($this->_instances[$id]);
            $this->_resource->delete($post);
        } catch (ValidatorException $e) {
            throw new CouldNotSaveException(__($e->getMessage()));
        } catch (\Exception $e) {
            throw new StateException(
                __('Unable to remove post %1', $id)
            );
        }
        unset($this->_instances[$id]);
        return true;
    }

    /**
     * @param $postId
     * @return bool
     */
    public function deleteById($postId)
    {
        $post = $this->getById($postId);
        return $this->delete($post);
    }
}
