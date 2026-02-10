<?php
/**
 * RTL Support Functions for Spark Construction Lite
 * 
 * These helper functions provide better RTL support throughout the theme
 * 
 * @package Spark Construction Lite
 */

if ( ! function_exists( 'sparkconstructionlite_is_rtl' ) ) {
    /**
     * Check if the site is using RTL language
     * 
     * @return boolean
     */
    function sparkconstructionlite_is_rtl() {
        return is_rtl();
    }
}

if ( ! function_exists( 'sparkconstructionlite_rtl_direction' ) ) {
    /**
     * Get the direction value (ltr or rtl)
     * 
     * @return string
     */
    function sparkconstructionlite_rtl_direction() {
        return is_rtl() ? 'rtl' : 'ltr';
    }
}

if ( ! function_exists( 'sparkconstructionlite_rtl_align' ) ) {
    /**
     * Get the appropriate alignment (left or right) based on RTL setting
     * 
     * @param string $ltr_value Value to use for LTR layouts
     * @param string $rtl_value Value to use for RTL layouts
     * @return string
     */
    function sparkconstructionlite_rtl_align( $ltr_value = 'left', $rtl_value = 'right' ) {
        return is_rtl() ? $rtl_value : $ltr_value;
    }
}

if ( ! function_exists( 'sparkconstructionlite_rtl_margin' ) ) {
    /**
     * Get appropriate margin property based on RTL setting
     * 
     * @param string $margin_value The margin value
     * @param string $side The side (left/right)
     * @return string CSS property with value
     */
    function sparkconstructionlite_rtl_margin( $margin_value, $side = 'left' ) {
        if ( is_rtl() ) {
            $side = ( 'left' === $side ) ? 'right' : 'left';
        }
        return 'margin-' . $side . ': ' . esc_attr( $margin_value ) . ';';
    }
}

if ( ! function_exists( 'sparkconstructionlite_rtl_padding' ) ) {
    /**
     * Get appropriate padding property based on RTL setting
     * 
     * @param string $padding_value The padding value
     * @param string $side The side (left/right)
     * @return string CSS property with value
     */
    function sparkconstructionlite_rtl_padding( $padding_value, $side = 'left' ) {
        if ( is_rtl() ) {
            $side = ( 'left' === $side ) ? 'right' : 'left';
        }
        return 'padding-' . $side . ': ' . esc_attr( $padding_value ) . ';';
    }
}

if ( ! function_exists( 'sparkconstructionlite_rtl_float' ) ) {
    /**
     * Get appropriate float value based on RTL setting
     * 
     * @param string $direction The direction (left/right)
     * @return string float value
     */
    function sparkconstructionlite_rtl_float( $direction = 'left' ) {
        if ( is_rtl() ) {
            return ( 'left' === $direction ) ? 'right' : 'left';
        }
        return $direction;
    }
}

if ( ! function_exists( 'sparkconstructionlite_rtl_css' ) ) {
    /**
     * Generate RTL-aware CSS rule
     * 
     * @param string $ltr_css CSS rule for LTR
     * @param string $rtl_css CSS rule for RTL
     * @return string
     */
    function sparkconstructionlite_rtl_css( $ltr_css = '', $rtl_css = '' ) {
        return is_rtl() ? $rtl_css : $ltr_css;
    }
}

if ( ! function_exists( 'sparkconstructionlite_add_rtl_attr' ) ) {
    /**
     * Add dir attribute to HTML elements for better accessibility
     * 
     * @param array $atts Element attributes
     * @return array
     */
    function sparkconstructionlite_add_rtl_attr( $atts = array() ) {
        if ( is_rtl() ) {
            $atts['dir'] = 'rtl';
        } else {
            $atts['dir'] = 'ltr';
        }
        return $atts;
    }
}

if ( ! function_exists( 'sparkconstructionlite_rtl_mirror_position' ) ) {
    /**
     * Mirror position values for RTL (left becomes right and vice versa)
     * 
     * @param string $position Either 'left' or 'right'
     * @param string $value The position value
     * @return string CSS property
     */
    function sparkconstructionlite_rtl_mirror_position( $position = 'left', $value = '0' ) {
        if ( is_rtl() ) {
            $position = ( 'left' === $position ) ? 'right' : 'left';
        }
        return $position . ': ' . esc_attr( $value ) . ';';
    }
}

if ( ! function_exists( 'sparkconstructionlite_rtl_text_align' ) ) {
    /**
     * Get appropriate text alignment based on RTL setting
     * 
     * @param string $alignment The alignment (left/right/center)
     * @return string
     */
    function sparkconstructionlite_rtl_text_align( $alignment = 'left' ) {
        if ( is_rtl() && ( 'left' === $alignment || 'right' === $alignment ) ) {
            return ( 'left' === $alignment ) ? 'right' : 'left';
        }
        return $alignment;
    }
}

if ( ! function_exists( 'sparkconstructionlite_rtl_transform_flip' ) ) {
    /**
     * Apply transform flip for icons/arrows in RTL
     * Useful for icons that need horizontal flipping
     * 
     * @param boolean $apply_flip Whether to apply flip
     * @return string CSS transform
     */
    function sparkconstructionlite_rtl_transform_flip( $apply_flip = true ) {
        if ( is_rtl() && $apply_flip ) {
            return 'transform: scaleX(-1);';
        }
        return '';
    }
}

if ( ! function_exists( 'sparkconstructionlite_rtl_lang_class' ) ) {
    /**
     * Get language-specific class for RTL styling
     * 
     * @return string CSS class
     */
    function sparkconstructionlite_rtl_lang_class() {
        if ( is_rtl() ) {
            return 'has-rtl-text';
        }
        return 'has-ltr-text';
    }
}

if ( ! function_exists( 'sparkconstructionlite_rtl_flex_reverse' ) ) {
    /**
     * Get flex direction based on RTL setting
     * 
     * @return string flex-direction value
     */
    function sparkconstructionlite_rtl_flex_reverse() {
        return is_rtl() ? 'flex-direction: row-reverse;' : 'flex-direction: row;';
    }
}

if ( ! function_exists( 'sparkconstructionlite_rtl_grid_auto_flow' ) ) {
    /**
     * Get grid auto-flow direction based on RTL
     * 
     * @return string CSS property
     */
    function sparkconstructionlite_rtl_grid_auto_flow() {
        return is_rtl() ? 'grid-auto-flow: column;' : '';
    }
}

if ( ! function_exists( 'sparkconstructionlite_rtl_style_attribute' ) ) {
    /**
     * Generate inline style attribute with RTL awareness
     * 
     * @param array $styles Array of CSS properties
     * @return string Inline style attribute
     */
    function sparkconstructionlite_rtl_style_attribute( $styles = array() ) {
        if ( empty( $styles ) ) {
            return '';
        }

        $css = '';
        foreach ( $styles as $property => $value ) {
            // Handle left/right properties
            if ( is_rtl() && ( 'margin-left' === $property || 'margin-right' === $property || 
                               'padding-left' === $property || 'padding-right' === $property ) ) {
                $property = ( 'left' === substr( $property, -4 ) ) ? 
                           substr( $property, 0, -4 ) . 'right' : 
                           substr( $property, 0, -5 ) . 'left';
            }
            $css .= $property . ': ' . esc_attr( $value ) . '; ';
        }

        return 'style="' . trim( $css ) . '"';
    }
}
