<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Web30india\Uiform\Api\Data;

interface BlogInterface
{

    const CATEGORY = 'category';
    const IMAGE = 'image';
    const BLOG_ID = 'blog_id';
    const NAME = 'name';
    const STATUS = 'status';

    /**
     * Get blog_id
     * @return string|null
     */
    public function getBlogId();

    /**
     * Set blog_id
     * @param string $blogId
     * @return \Web30india\Uiform\Blog\Api\Data\BlogInterface
     */
    public function setBlogId($blogId);

    /**
     * Get Name
     * @return string|null
     */
    public function getName();

    /**
     * Set Name
     * @param string $name
     * @return \Web30india\Uiform\Blog\Api\Data\BlogInterface
     */
    public function setName($name);

    /**
     * Get Status
     * @return string|null
     */
    public function getStatus();

    /**
     * Set Status
     * @param string $status
     * @return \Web30india\Uiform\Blog\Api\Data\BlogInterface
     */
    public function setStatus($status);

    /**
     * Get Category
     * @return string|null
     */
    public function getCategory();

    /**
     * Set Category
     * @param string $category
     * @return \Web30india\Uiform\Blog\Api\Data\BlogInterface
     */
    public function setCategory($category);

    /**
     * Get Image
     * @return string|null
     */
    public function getImage();

    /**
     * Set Image
     * @param string $image
     * @return \Web30india\Uiform\Blog\Api\Data\BlogInterface
     */
    public function setImage($image);
}

