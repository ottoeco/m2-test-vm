<?php
declare(strict_types=1);
namespace Joe\HelloModule\Api;

use Joe\HelloModule\Api\Data\PostInterface;

/**
 * Post CRUD interface.
 * @api
 * @since 100
 */
interface PostRepositoryInterface
{
    /**
     * Create or update a post.
     *
     * @param PostInterface $post
     * @return PostInterface
     * @throws \Magento\Framework\Exception\InputException If bad input is provided
     * @throws \Magento\Framework\Exception\State\InputMismatchException If the provided email is already used
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(PostInterface $post);

    /**
     * Get post by post ID.
     *
     * @param int $postId
     * @return PostInterface
     * @throws \Magento\Framework\Exception\NoSuchEntityException If post with the specified ID does not exist.
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getById($postId);

    /**
     * Delete post.
     *
     * @param PostInterface $post
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete( PostInterface $post);

    /**
     * Delete post by post ID.
     *
     * @param int $postId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($postId);
}
