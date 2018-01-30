<?php

namespace luya\bootstrap4;

use luya\cms\base\PhpBlock;

/**
 * Base block for all generic blocks.
 *
 * @author Basil Suter <basil@nadar.io>
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