<?php

namespace SparkConstructionLiteElements\Modules\TeamBlock;

use SparkConstructionLiteElements\Base\Module_Base;

if (!defined('ABSPATH'))
    exit; // Exit if accessed directly

class Module extends Module_Base {

    public function get_name() {
        return 'SparkConstructionLite-team-block';
    }

    public function get_widgets() {
        $widgets = [
            'TeamBlock',
        ];
        return $widgets;
    }

}
