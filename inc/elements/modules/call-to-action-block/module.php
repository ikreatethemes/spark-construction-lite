<?php

namespace SparkConstructionLiteElements\Modules\CallToActionBlock;

use SparkConstructionLiteElements\Base\Module_Base;

if (!defined('ABSPATH'))
    exit; // Exit if accessed directly

class Module extends Module_Base {

    public function get_name() {

        return 'SparkConstructionLite-call-to-action-block';
    }

    public function get_widgets() {
        $widgets = [
            'CallToActionBlock',
        ];
        return $widgets;
    }

}
