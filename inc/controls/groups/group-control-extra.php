<?php
    use Elementor\Controls_Manager;
    use Elementor\Scheme_Color;
    use Elementor\Group_Control_Base;

    if (!defined('ABSPATH'))
        exit;

    class Group_Control_Extra extends Group_Control_Base {

        protected static $fields;

        public static function get_type() {
            return 'storezz-extra';
        }

        protected function init_fields() {
            $fields = [];

                $fields['color_scheme'] = [
                    'label' => __( 'Color Scheme', 'storezz-elements' ),
                    'type' => Controls_Manager::COLOR,
                    'scheme' => [
                        'type' => Scheme_Color::get_type(),
                        'value' => Scheme_Color::COLOR_1,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .storezz-header a:hover,{{WRAPPER}} .storezz-product-tabs-grid .tabs li:hover,{{WRAPPER}} .storezz-product-tabs-grid .tabs li.active,{{WRAPPER}} .product .content h3 a:hover, {{WRAPPER}} .product-btns .add_to_cart_button:hover,{{WRAPPER}} .product .star-rating span:before' => 'color: {{VALUE}}',
                        '{{WRAPPER}} .product .product-image .onsale,{{WRAPPER}} .storezz-product-tabs-grid .tabs li.active:after, {{WRAPPER}} .storezz-product-tabs-grid .tabs li:hover:after' => 'background-color: {{VALUE}}'
                    ],
                ];

            return $fields;
        }

        protected function get_default_options() {
            return [
                'popover' => false,
            ];
        }

    }
