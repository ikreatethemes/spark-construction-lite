<?php

namespace SparkConstructionLiteElements\Modules\SliderBlock;

use SparkConstructionLiteElements\Base\Module_Base;

if (!defined('ABSPATH'))
    exit; // Exit if accessed directly

class Module extends Module_Base {

    public function get_name() {
        return 'SparkConstructionLite-slider';
    }

    public function get_widgets() {
        $widgets = [
            'SliderBlock',
        ];
        return $widgets;
    }

}
