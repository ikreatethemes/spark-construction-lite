<?php

namespace SparkConstructionLiteElements\Modules\HighlightBlock;

use SparkConstructionLiteElements\Base\Module_Base;

if (!defined('ABSPATH'))
    exit; // Exit if accessed directly

class Module extends Module_Base {

    public function get_name() {
        return 'SparkConstructionLite-highlight-block';
    }

    public function get_widgets() {
        $widgets = [
            'HighlightBlock',
        ];
        return $widgets;
    }

}
