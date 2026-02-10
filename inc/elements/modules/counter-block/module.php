<?php

namespace SparkConstructionLiteElements\Modules\CounterBlock;

use SparkConstructionLiteElements\Base\Module_Base;

if (!defined('ABSPATH'))
    exit; // Exit if accessed directly

class Module extends Module_Base {

    public function get_name() {
        return 'SparkConstructionLite-counter-block';
    }

    public function get_widgets() {
        $widgets = [
            'CounterBlock',
        ];
        return $widgets;
    }

}
