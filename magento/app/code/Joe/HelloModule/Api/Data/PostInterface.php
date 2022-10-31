<?php
declare(strict_types=1);
namespace Joe\HelloModule\Api\Data;
/**
 * Post entity interface for API handling.
 *
 * @api 001
 */

interface PostInterface
{
    const POST_ID = 'post_id';
    const POST_NAME = 'post_name';
    const POST_CONTENT = 'post_content';

    /**
     * Get ID
     *
     * @return int
     */
    public function getPostId(): int;


    /**
     * Set ID
     *
     * @param $id
     * @return PostInterface
     */
    public function setPostId($id): PostInterface;

    /**
     * Get Post name
     *
     * @return string
     */
    public function getPostName(): string;


    /**
     * Set Post name
     *
     * @param string $name
     * @return this
     */
    public function setPostName(string $name);

    /**
     * Get Post content
     *
     * @return string
     */
    public function getPostContent(): string;


    /**
     * Set Post content
     *
     * @param string $content
     * @return this

     */
    public function setPostContent(string $content);
}
