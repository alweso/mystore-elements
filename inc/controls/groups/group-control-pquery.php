<?php
use Elementor\Controls_Manager;
use Elementor\Group_Control_Base;

if (!defined('ABSPATH'))
    exit; // Exit if accessed directly

class Group_Control_Produt_Query extends Group_Control_Base {

    protected static $fields;

    public static function get_type() {
        return 'storezz-pquery';
    }

    protected function init_fields() {
        $fields = [];

        $fields['tabs'] = [
            'label' => __( 'Product Tabs', 'storezz-elements' ),
            'type' => \Elementor\Controls_Manager::SELECT2,
            'multiple' => true,
            'options' => [
                'latest'  => __( 'Latest', 'storezz-elements' ),
                'featured'  => __( 'Featured', 'storezz-elements' ),
                'best-selling' => __( 'Best Selling', 'storezz-elements' ),
                'sale' => __( 'Sale', 'storezz-elements' ),
                'top-rated' => __( 'Top Rated', 'storezz-elements' ),
            ],
            'default' => [ 'latest', 'featured' ],
            'label_block' => true,
        ];

        $fields['no_of_products'] = [
            'label' => __( 'No. of products', 'storezz-elements' ),
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
            'label' => __( 'Column Layout', 'storezz-elements' ),
            'type' => Controls_Manager::SELECT,
            'default' => 'columns-3',
            'options' => array(
                'columns-2' => __( '2 Column', 'storezz-elements' ),
                'columns-3' => __( '3 Column', 'storezz-elements' ),
                'columns-4' => __( '4 Column', 'storezz-elements' ),
                'columns-5' => __( '5 Column', 'storezz-elements' ),
                'columns-6' => __( '6 Column', 'storezz-elements' )
            )
        ];

        $fields['orderby'] = [
            'label' => __( 'Order By', 'storezz-elements' ),
            'type' => Controls_Manager::SELECT,
            'default' => 'none',
            'options' => array(
                'none' => __( 'None', 'storezz-elements' ),
                'ID' => __( 'ID', 'storezz-elements' ),
                'date' => __( 'Date', 'storezz-elements' ),
                'name' => __( 'Name', 'storezz-elements' ),
                'title' => __( 'Title', 'storezz-elements' ),
                'rand' => __( 'Random', 'storezz-elements' ),
                'comment_count' => __( 'Comment Count', 'storezz-elements' ),
            )
        ];

        $fields['order'] = [
            'label' => __( 'Order', 'storezz-elements' ),
            'type' => Controls_Manager::SELECT,
            'default' => 'DESC',
            'options' => array(
                'ASC' => __( 'Ascending', 'storezz-elements' ),
                'DESC' => __( 'Descending', 'storezz-elements' ),
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
