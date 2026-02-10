<?php

namespace SparkConstructionLiteElements\Modules\TestimonialSlider;

use SparkConstructionLiteElements\Base\Module_Base;

if (!defined('ABSPATH'))
    exit; // Exit if accessed directly

class Module extends Module_Base {

    public function get_name() {
        return 'SparkConstructionLite-testimonial-slider';
    }

    public function get_widgets() {
        $widgets = [
            'TestimonialSlider',
        ];
        return $widgets;
    }

}
