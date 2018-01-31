<?php

namespace luya\bootstrap4;

use luya\cms\base\PhpBlock;

/**
 * Base block for all bootstrap4 blocks.
 *
 * The BaseBootstrap4Block helpts to allocate the view files for the blocks without using an alias.
 *
 * @author Basil Suter <basil@nadar.io>
 * @since 1.0.0
 */
abstract class BaseBootstrap4Block extends PhpBlock
{
    /**
     * @inheritdoc
     */
    public function getViewPath()
    {
        return  dirname(__DIR__) . '/src/views/blocks';
    }
}
