<?php
declare(strict_types=1);
namespace Joe\HelloModule\Model\ResourceModel;

/*use Joe\HelloModule\Model\Post\Validator;
use Joe\HelloModule\Model\Post\ValidatorTitle;*/
use Joe\HelloModule\Model\ResourceModel\Post as PostModel;
use Magento\Framework\Model\ResourceModel\Db\AbstractDb;
use Magento\Framework\Model\ResourceModel\Db\Context;


class Post extends AbstractDb
{

//    /**
//     * @var PostModel\Validator
//     */
//    private $validator;
//
//    public function __construct(
//		Context $context,
//        Validator $validator
//	)
//	{
//		parent::__construct($context);
//        $this->validator = $validator;
//    }

	protected function _construct()
	{
		$this->_init('joe_hellomodule_post', 'post_id');
	}

//    protected function _beforeSave( \Magento\Framework\Model\AbstractModel $post)
//    {
//        $this->validator->execute($post);
//
//        return $this;
//    }
}
