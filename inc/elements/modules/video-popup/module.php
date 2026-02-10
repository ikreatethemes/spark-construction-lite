<?php

namespace SparkConstructionLiteElements\Modules\VideoPopup;

use SparkConstructionLiteElements\Base\Module_Base;

if (!defined('ABSPATH'))
    exit; // Exit if accessed directly

class Module extends Module_Base {

    public function get_name() {
        return 'SparkConstructionLite-video-popup';
    }

    public function get_widgets() {
        $widgets = [
            'VideoPopup',
        ];
        return $widgets;
    }

}
