<?php

namespace SparkConstructionLiteElements\Modules\LogoCarousel;

use SparkConstructionLiteElements\Base\Module_Base;

if (!defined('ABSPATH'))
    exit; // Exit if accessed directly

class Module extends Module_Base {

    public function get_name() {
        return 'SparkConstructionLite-logo-carousel';
    }

    public function get_widgets() {
        $widgets = [
            'LogoCarousel',
        ];
        return $widgets;
    }

}
