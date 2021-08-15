<?php

class Bootstrap_Menu_Walker extends \Walker_Nav_Menu
{

    public function start_lvl( &$output, $depth = 0, $args = null ) {
        $output .= '<ul class="navbar-nav me-auto mb-2 mb-lg-0">';
    }

    public function end_lvl( &$output, $depth = 0, $args = null ) {
        $output .= "</ul>";
    }

    public function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
        if ((is_object($item) && $item->title == null) || (!is_object($item))) {
            return ;
        }
        $output .= '<li class="nav-item"><a class="nav-link" href="' . esc_attr($item->url) . '">' . $item->title;
    }

    public function end_el( &$output, $item, $depth = 0, $args = null ) {
        $output .= '</a></li>';
    }

    public function display_element( $element, &$children_elements, $max_depth, $depth, $args, &$output ) {
        if ( ! $element ) {
            return;
        }
        $this->start_el( $output, $element, $depth, ...array_values( $args ) );
        $this->end_el( $output, $element, $depth, ...array_values( $args ) );
    }

}