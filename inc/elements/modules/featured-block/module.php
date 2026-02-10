<?php

namespace SparkConstructionLiteElements\Modules\FeaturedBlock;

use SparkConstructionLiteElements\Base\Module_Base;

if (!defined('ABSPATH'))
    exit; // Exit if accessed directly

class Module extends Module_Base {

    public function get_name() {

        return 'SparkConstructionLite-featured-block';
    }

    public function get_widgets() {
        $widgets = [
            'FeaturedBlock',
        ];
        return $widgets;
    }

}
