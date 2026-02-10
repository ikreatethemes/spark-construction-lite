<?php

namespace SparkConstructionLiteElements\Modules\WorkingProcess;

use SparkConstructionLiteElements\Base\Module_Base;

if (!defined('ABSPATH'))
    exit; // Exit if accessed directly

class Module extends Module_Base {

    public function get_name() {
        return 'SparkConstructionLite-working-process';
    }

    public function get_widgets() {
        $widgets = [
            'WorkingProcess',
        ];
        return $widgets;
    }

}
