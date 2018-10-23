<?php
/*
* This document has the functionality to create the structures that holds
* the plugin information for Events as meta fields
*/

// CUSTOM META FIELDS FOR KN Optimed Events


add_filter( 'rwmb_meta_boxes', 'op_register_events_meta_boxes' );
function op_register_events_meta_boxes( $meta_boxes ) {

    $prefix = 'op_';

    $meta_boxes[] = array(
        'id'         => 'information',
        'title'      => __('Information', 'op'),
        'post_types' => 'op_event',
        'context'    => 'side',
        'priority'   => 'high',

        'fields' => array(
            array(
                'name'  => __('Startdatum der Veranstaltung', 'op'),
                'id'    => $prefix . 'termine',
                'type'  => 'date',
                'js_options' => array(
                    'dateFormat'      => 'dd.mm.yy',
                    'showButtonPanel' => false,
                ),
                'std'   => date('d.m.Y')
            ),
            array(
                'name'  => __('Enddatum der Veranstaltung', 'op'),
                'id'    => $prefix . 'termine_end',
                'type'  => 'date',
                'js_options' => array(
                    'dateFormat'      => 'dd.mm.yy',
                    'showButtonPanel' => false,
                ),
                'std'   => date('d.m.Y')
            ),
            array(
                'name'  => __('Veranstaltungsort', 'op'),
                'id'    => $prefix . 'place',
                'type'  => 'text'
            ),
        ),

    );

    return $meta_boxes;
}
