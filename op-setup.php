<?php
/*
* This document has the functionality manage the structures that holds
* the plugin information
*/

/*
 * FORCE USE OF TEMPLATES FROM PLUGIN FOLDER (frontend/templates)
 * if need to override, developer have to insert a copy of the file
 * on theme or child theme file structure
 */

add_action('wp_head', 'schn_styles_scripts');
function schn_styles_scripts(){
    if (
        // fontawesome for events
        is_archive('op_event')     ||
        is_single('op_event')      ||
        is_singular('op_event')    ||

        // fontawesome for training
        is_archive('schtra_training')   ||
        is_single('schtra_training')    ||
        is_singular('schtra_training')  ||

        // fontawesome for experts
        is_archive('schtra_expert')     ||
        is_single('schtra_expert')      ||
        is_singular('schtra_expert')
    ){
        wp_enqueue_style('schnell-training-icons', 'https://use.fontawesome.com/releases/v5.3.1/css/all.css', null, null);
    }
    /*
    if (
        // fontawesome for training
        is_archive('schtra_training')     ||
        is_single('schtra_training')      ||
        is_singular('schtra_training')
    ){
        wp_enqueue_style('schnell-training-icons', 'https://use.fontawesome.com/releases/v5.3.1/css/all.css', null, null);
    }
    */
}

function schn_force_template( $template )
{
    if( is_post_type_archive( 'op_event' ) ) {
        // Use Plugin template
        $template = OP_PLUGIN_DIR
            . 'frontend/templates/archive-op_event.php';

        // to override archive template
        $active_template = TEMPLATEPATH;
        if (is_child_theme()){
            $active_template = STYLESHEETPATH;
        }

        $archive_file = scandir($active_template);
        $found = array_search('archive-op_event.php', $archive_file);

        if ($found){
            $template = $active_template . '/archive-op_event.php';
        }

    }

    if( is_singular( 'op_event' ) || is_single( 'op_event' ) ) {
        // Use Plugin template
        $template = OP_PLUGIN_DIR
            . 'frontend/templates/single-op_event.php';

        // to override archive template
        $active_template = TEMPLATEPATH;
        if (is_child_theme()){
            $active_template = STYLESHEETPATH;
        }

        $archive_file = scandir($active_template);
        $found = array_search('single-op_event.php', $archive_file);

        if ($found){
            $template = $active_template . '/single-op_event.php';
        }

    }

    return $template;
}
add_filter( 'template_include', 'schn_force_template' );

add_action('pre_get_posts', function(){
    flush_rewrite_rules();
});

function mostrar_arreglo($array){
    echo '<pre>';
    var_dump($array);
    echo '</pre>';
}
