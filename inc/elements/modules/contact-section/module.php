<?php

namespace SparkConstructionLiteElements\Modules\ContactSection;

use SparkConstructionLiteElements\Base\Module_Base;

if (!defined('ABSPATH'))
    exit; // Exit if accessed directly

class Module extends Module_Base {

    public function get_name() {
        return 'SparkConstructionLite-contact-block';
    }

    public function get_widgets() {
        $widgets = [
            'ContactSection',
        ];
        return $widgets;
    }

}
