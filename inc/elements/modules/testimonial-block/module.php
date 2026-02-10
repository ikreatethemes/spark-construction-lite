<?php

namespace SparkConstructionLiteElements\Modules\TestimonialBlock;

use SparkConstructionLiteElements\Base\Module_Base;

if (!defined('ABSPATH'))
    exit; // Exit if accessed directly

class Module extends Module_Base {

    public function get_name() {
        return 'SparkConstructionLite-testimonial-block';
    }

    public function get_widgets() {
        $widgets = [
            'TestimonialBlock',
        ];
        return $widgets;
    }

}
