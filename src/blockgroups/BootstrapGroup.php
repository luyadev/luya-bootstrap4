<?php

namespace luya\bootstrap4\blockgroups;

/**
 * Bootstrap 4 Block Group.
 *
 * @author Basil Suter <basil@nadar.io>
 * @since 1.0.0
 */
class BootstrapGroup extends \luya\cms\base\BlockGroup
{
    public function identifier()
    {
        return 'bootstrap4';
    }

    public function label()
    {
        return 'Bootstrap 4';
    }
}
