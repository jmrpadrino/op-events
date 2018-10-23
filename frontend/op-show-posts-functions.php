<?php
/*
 * PRE GET POST ON ARCHIVE VIEW TO ORDER POST BY MATAVALUE START DATE
 */

function op_set_order_on_archive( $query ){

    if ( is_admin() && $query->is_main_query() ) return;

    //  IF IS ARCHIVE VIEW FOR TRAINING EVENTS
    if ( $query->is_main_query() && $query->is_post_type_archive('op_event') ){

        $prefix = 'op_';

        $keyname = $prefix . 'termine';

        $query->set( 'paged', true );
        $query->set( 'posts_per_page', 10 );
        $query->set( 'meta_key', $keyname);
        $query->set( 'orderby', array ('meta_value_num' => 'ASC' ));

    }

    return $query;

}
add_action('pre_get_posts', 'op_set_order_on_archive');

/*
 * SHORTCODE TO SHOW LAST EVENTS OR EVENTS BY EXPERT
 * SET ATTRIBUTE showboxtitle TO FALSE TO HIDE LIST TITLE
 * SET ATTRIBUTO boxtitle TO CHANCE THE LIST TITLE TEXT
 */

add_shortcode('op-show-events', 'op_show_events');
function op_show_events( $atts ){

    $prefix = 'op_';

    $a = shortcode_atts( array(
        'length' => 140,
        'box-title' => esc_html('Kongresse & Fortbildungen für Augenärzte', 'op'),
        'posts-per-page' => 4,
    ), $atts );

    $args = array( 'post_type' => 'op_event', 'posts_per_page' => $a['posts-per-page'] );

    $events = get_posts( $args );

    if ( $events ){

        $content_length = $a['length'];
        $content_length = apply_filters('shortcode-content-length', $content_length );

        $html = '<div class="shortcode-event-list">';
        $html .= '<h2 class="underline"><i class="far fa-calendar-alt"></i> ' . $a['box-title'] . '</h2>';
        do_action('accion-prueba');
        $html .= '<ul class="shortcode-event-list-list">';
        foreach( $events as $event ){
            // EVENT METADATA
            $the_id = $event->ID;
            $event_date     = get_post_meta($the_id, $prefix . 'termine', true );
            $split_date = explode('.',$event_date);
            $the_first_term = get_the_terms( $the_id, 'op-events-cat' );

            // GET LENGTH OF CONTENT

            if ( strlen( wp_strip_all_tags($event->post_content )) > $content_length ){
                $content = substr( wp_strip_all_tags($event->post_content), 0, $content_length ) . '... ';
            }


            $html .= '<li>';
            $html .= '<div class="shortcode-event-item-placeholder">';
                $html .= '<div class="shortcode-event-date-placeholder">';
                    $html .= '<div class="shortcode-event-date">' . $split_date[0] . '</div>';
                    $html .= '<div class="shortcode-event-month">' . date('M', $event_date) .'</div>';
                $html .= '</div>';
                $html .= '<div class="shortcode-event-content-placeholder">';
                    $html .= '<h3>' . $event->post_title . '</h3>';
                    $html .= $content;
                $html .= '</div>';
            $html .= '</div>';
            $html .= '</li>';
        }
        $post_type_data = get_post_type_object( 'op_event' );
        $post_type_slug = $post_type_data->has_archive;
        $html .= '</ul>';
        $html .= '<div class="shortcode-event-list-link"><a href="' . home_url( $post_type_slug ) . '"> ' . esc_html('All termine') . '</a></div>';
        $html .= '</div>';
    }
    return $html;
}

function op_frontend_css_js(){
    if( ! is_admin() ){
        wp_enqueue_style( 'op-trainings-icons', 'https://use.fontawesome.com/releases/v5.4.1/css/all.css', false, NULL, 'all' );
        wp_enqueue_style( 'op-bootstrap', OP_PLUGIN_URI . '/frontend/css/bootstrap.css', false, NULL, 'all' );
        wp_enqueue_style( 'op-trainings', OP_PLUGIN_URI . '/frontend/css/op-style.css', false, NULL, 'all' );
    }
}
add_action('wp_enqueue_scripts', 'op_frontend_css_js');
