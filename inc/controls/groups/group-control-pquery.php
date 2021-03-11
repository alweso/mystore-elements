<?php
use Elementor\Controls_Manager;
use Elementor\Group_Control_Base;

if (!defined('ABSPATH'))
    exit; // Exit if accessed directly

class Group_Control_Produt_Query extends Group_Control_Base {

    protected static $fields;

    public static function get_type() {
        return 'meta-store-pquery';
    }

    protected function init_fields() {
        $fields = [];

        $fields['tabs'] = [
            'label' => __( 'Product Tabs', 'meta-store-elements' ),
            'type' => \Elementor\Controls_Manager::SELECT2,
            'multiple' => true,
            'options' => [
                'latest'  => __( 'Latest', 'meta-store-elements' ),
                'featured'  => __( 'Featured', 'meta-store-elements' ),
                'best-selling' => __( 'Best Selling', 'meta-store-elements' ),
                'sale' => __( 'Sale', 'meta-store-elements' ),
                'top-rated' => __( 'Top Rated', 'meta-store-elements' ),
            ],
            'default' => [ 'latest', 'featured' ],
            'label_block' => true,
        ];

        $fields['no_of_products'] = [
            'label' => __( 'No. of products', 'meta-store-elements' ),
            'type' => Controls_Manager::SLIDER,
            'size_units' => [ 'no' ],
            'range' => [
                'no' => [
                    'min' => 1,
                    'max' => 20,
                    'step' => 1,
                ],
            ],
            'default' => [
                'unit' => 'no',
                'size' => 4,
            ],
        ];

        $fields['column_layout'] = [
            'label' => __( 'Column Layout', 'meta-store-elements' ),
            'type' => Controls_Manager::SELECT,
            'default' => 'columns-3',
            'options' => array(
                'columns-2' => __( '2 Column', 'meta-store-elements' ),
                'columns-3' => __( '3 Column', 'meta-store-elements' ),
                'columns-4' => __( '4 Column', 'meta-store-elements' ),
                'columns-5' => __( '5 Column', 'meta-store-elements' ),
                'columns-6' => __( '6 Column', 'meta-store-elements' )
            )
        ];

        $fields['orderby'] = [
            'label' => __( 'Order By', 'meta-store-elements' ),
            'type' => Controls_Manager::SELECT,
            'default' => 'none',
            'options' => array(
                'none' => __( 'None', 'meta-store-elements' ),
                'ID' => __( 'ID', 'meta-store-elements' ),
                'date' => __( 'Date', 'meta-store-elements' ),
                'name' => __( 'Name', 'meta-store-elements' ),
                'title' => __( 'Title', 'meta-store-elements' ),
                'rand' => __( 'Random', 'meta-store-elements' ),
                'comment_count' => __( 'Comment Count', 'meta-store-elements' ),
            )
        ];

        $fields['order'] = [
            'label' => __( 'Order', 'meta-store-elements' ),
            'type' => Controls_Manager::SELECT,
            'default' => 'DESC',
            'options' => array(
                'ASC' => __( 'Ascending', 'meta-store-elements' ),
                'DESC' => __( 'Descending', 'meta-store-elements' ),
            )
        ];

        return $fields;
    }

    private static function get_post_types() {
        $post_type_args = [
            'show_in_nav_menus' => true,
        ];
        
        $_post_types = get_post_types($post_type_args, 'objects');

        $post_types = [];

        foreach ($_post_types as $post_type => $object) {
            $post_types[$post_type] = $object->label;
        }

        return $post_types;
    }

    protected function get_default_options() {
        return [
            'popover' => false,
        ];
    }
}
