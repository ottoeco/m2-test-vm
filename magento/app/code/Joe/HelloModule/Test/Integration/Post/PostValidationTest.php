<?php
declare(strict_types=1);

namespace Joe\HelloModule\Test\Integration\Post;

use Joe\HelloModule\Model\Post;
use Joe\HelloModule\Model\ResourceModel\Post\Collection as PostCollection;
use Magento\Framework\ObjectManagerInterface;
use Magento\TestFramework\Helper\Bootstrap;
use PHPUnit\Framework\TestCase;

class PostValidationTest extends TestCase
{
    /** @var Post */
    private $subject;

    /** @var ObjectManagerInterface */
    private $objectManager;

    /**
     * @return Post|mixed
     */
    public function setUp(): void
    {
        $this->objectManager = Bootstrap::getObjectManager();
        $this->subject = $this->objectManager->create(Post::class);
    }

//    public function testShouldNotValidatePostsWIthEmptyContent()
//    {
//
//        $this->expectException(\Exception::class);
//
//        $this->subject->setPostName('ciao');
//        $this->subject->getResource()->save($this->subject);
//        self::assertNotEquals('',$this->subject->getPostName());
//    }

    public function testShouldValidatePostWithPopulatedContent()
    {
        $this->subject->setPostName('ciao');
        $content = 'un bel contenuto';
        $this->subject->setPostContent($content);
        $this->subject->getResource()->save($this->subject);

        $result = $this->objectManager->create(Post::class);
//        echo " #: ".$this->subject->getId();
//        echo " N: ".$this->subject->getPostName();
//        echo " C: ".$this->subject->getPostContent();

        $this->subject->getResource()->load($result, $this->subject->getId());

        self::assertNotEmpty($result->getData('post_id'));
//        echo " C2: ".$result->getPostContent();
        self::assertSame($content, $result->getPostContent());
//        self::assertEquals($content, $result->getPostContent());
    }

    public function tearDown(): void
    {
        $collection = $this->objectManager->create(PostCollection::class);

        /** @var Post $post */
        foreach($collection->getItems() as $post) {
            $post->getResource()->delete($post);
        }
    }
}
