<?php
declare(strict_types=1);

namespace Joe\HelloModule\Test\Integration\Post;

use Joe\HelloModule\Model\Post;
use Joe\HelloModule\Model\ResourceModel\Post\Collection as PostCollection;
use Magento\TestFramework\Helper\Bootstrap;
use PHPUnit\Framework\TestCase;

class CrudTest extends TestCase
{

    /** @var \Magento\Framework\ObjectManagerInterface */
    private $objectManager;

    public function setUp(): void
    {
        $this->objectManager = Bootstrap::getObjectManager();
    }
    //Create
    public function testShouldCreateAnewPost()
    {
        $post = $this->objectManager->create(Post::class);

        $post->setPostName('Ciao');
        $post->setPostContent("Come va?");

        $post->getResource()->save($post);

        $savedPost = $this->objectManager->create(Post::class);
        $post->getResource()->load($savedPost, $post->getId());

        self::assertSame("Come va?", $savedPost->getPostContent());
    }
    //Read
    /**
     * @magentoDataFixture Joe_HelloModule::Test/Integration/_files/post.php
     */
    public function testShouldReadAnExistingPost()
    {
        $post = $this->getExistingPost();
        self::assertSame("Post di prova", $post->getPostContent());

        $readPost = $this->objectManager->create(Post::class);
        $post->getResource()->load($readPost, $post->getId());

        self::assertSame("Titolo", $readPost->getPostName());
    }

    //Edit
    /**
     * @magentoDataFixture Joe_HelloModule::Test/Integration/_files/post.php
     */
    public function testShouldEditAnExistingPost()
    {
        $post = $this->getExistingPost();
        self::assertSame("Post di prova", $post->getPostContent());

        $post->setPostContent("Contenuto Modificato");
        $post->getResource()->save($post);

        $savedPost = $this->objectManager->create(Post::class);
        $post->getResource()->load($savedPost, $post->getId());

        self::assertSame("Contenuto Modificato", $savedPost->getPostContent());
    }

    //Delete
    /**
     * @magentoDataFixture Joe_HelloModule::Test/Integration/_files/post.php
     */
    public function testShouldDeleteAnExistingPost()
    {
        //check esistenza con name
        $post = $this->getExistingPost();
        self::assertSame("Titolo", $post->getPostName());

        $delPost = $this->objectManager->create(Post::class);
        $delPost->setPostName('Cancellami');
        $post->getResource()->save($delPost);
        $del_id=$delPost->getPostId();
        //$del=new Post();
//        $del=$post[0];
//        $post->getResource()->save($del);

        //trovo id e lo cancello
        //echo "Cancello id: ".$post->getPostId();
        $post->getResource()->delete($delPost);

        $post->getResource()->load($delPost, $del_id);

        //self::assertEmpty($post->getPostId());
        //self::assertSame(null,$del);
        //self::assertEmpty($post);
        //self::assertSame(null,$post->getPostId());
//        self::assertSame($del_id,$delPost->getPostId());
        self::assertSame('Cancellami',$delPost->getPostName());
        //oppure che sia null
        //echo "Clean: ".$post->getPostId();
    }

    private function getExistingPost(): Post
    {
        $postCollection = $this->objectManager->create(PostCollection::class);

        return $postCollection->getFirstItem();
    }

    public function tearDown(): void
    {
        $postCollection = $this->objectManager->create(PostCollection::class);

        foreach($postCollection->getItems() as $post) {
            $post->getResource()->delete($post);
        }
    }
}
