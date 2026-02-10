<?php

namespace SparkConstructionLiteElements\Modules\AdvanceGallery;

use SparkConstructionLiteElements\Base\Module_Base;

if (!defined('ABSPATH'))
    exit; // Exit if accessed directly

class Module extends Module_Base {

    public function get_name() {
        return 'SparkConstructionLite-advance-gallery';
    }

    public function get_widgets() {
        $widgets = [
            'AdvanceGallery',
        ];
        return $widgets;
    }

}
