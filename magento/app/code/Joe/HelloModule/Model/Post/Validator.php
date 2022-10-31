<?php
declare(strict_types=1);
namespace Joe\HelloModule\Model\Post;

use Joe\HelloModule\Model\Post;

class Validator
{
    public function execute(Post $post): bool
    {
        $content = trim($post->getPostContent());

        if(empty($content)) {
            throw new \Exception('Invalid content');
        };

        return true;
    }
}
