<?php

namespace SparkConstructionLiteElements\Modules\BlogSection;

use SparkConstructionLiteElements\Base\Module_Base;

if (!defined('ABSPATH'))
    exit; // Exit if accessed directly

class Module extends Module_Base {

    public function get_name() {
        return 'SparkConstructionLite-blog-section';
    }

    public function get_widgets() {
        $widgets = [
            'BlogSection',
        ];
        return $widgets;
    }

}
