<?php
//declare(strict_types=1);
//
//namespace Joe\HelloModule\Test\Unit\Model\Post;
//
//use Joe\HelloModule\Model\Post;
//use Joe\HelloModule\Model\Post\ValidatorTitle;
//use Magento\Framework\TestFramework\Unit\Helper\ObjectManager;
//use PHPUnit\Framework\MockObject\MockObject;
//use PHPUnit\Framework\TestCase;
//
//class ValidatorTitleTest extends TestCase
//{
//
//    /**
//     * @var $subject Validator
//     */
//    private $subject;
//
//    public function setUp(): void
//    {
//        $this->subject = (new ObjectManager($this))->getObject(ValidatorTitle::class);
//
//        parent::setUp();
//    }
//
//    public function testShouldReturnTrueIfTitleHasOneWord()
//    {
//        $postMock = $this->getPostMock('Ciao');
//
//        $result = $this->subject->execute($postMock);
//
//        self::assertTrue($result);
//    }
//
//
//
////    public function testShouldRaiseExceptionIfPostHasNoContent()
////    {
////        /**
////         * @var $postMock Post|MockObject
////         */
////        $postMock = $this->getPostMock();
////
////        $this->expectException(\Exception::class);
////
////        $this->subject->execute($postMock);
////    }
//
//    /**
//     * @param string $returnValue
//     * @param bool $success
//     * @return void
//     * @dataProvider mockReturnDataProvider
//     */
////    public function testValidatorShouldValidate(string $returnValue, bool $success)
////    {
////        $postMock = $this->getPostMock($returnValue);
////
////        $result = $this->subject->execute($postMock);
////
////        if ($success) {
////            self::assertSame($success, $result);
////        }
////    }
////
////    public function mockReturnDataProvider()
////    {
////        return [
////            'valid string' => [
////               'Ciao',
////               true
////            ],
////            'null' => [
////                '',
////                false
////            ],
////            'only spaces' => [
////                '     ',
////                false
////            ]
////        ];
////    }
//
//    /**
//     * @return Post|MockObject
//     */
//    protected function getPostMock($returnValue = null)
//    {
//        /**
//         * @var $postMock Post|MockObject
//         */
//        $postMock = $this->createMock(Post::class);
//        $postMock->expects($this->once())->method('__call')->with('getName')->willReturn($returnValue);
//        return $postMock;
//    }
//}
