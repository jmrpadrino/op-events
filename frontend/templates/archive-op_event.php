<?php get_header(); $prefix = 'op_';?>
<style>
    .op-event-single-content{
        margin-bottom: 36px;
    }
    .op-event-single-content h2{
        margin: 0;
    }
    .op-event-single-content a{
        color: #eb6f08;
    }
    .op-event-date-placeholder{
        display: flex;
        flex-direction: column;
        align-content: space-around;
        justify-content: space-evenly;
        align-items: center;
        width: 100%;
        background: black;
        color: white;
        min-height: 80px;
    }
    .op-event-date{
        font-size: 28px;
    }
    .op-event-features{
        list-style: none;
        margin: 5px 0;
        margin-bottom: 18px;
        padding: 0;
        font-size: 14px;
    }
    .op-event-features li{
        display: inline-block;
    }
    .op-event-features li:after{
        content: '|';
        display: inline-block;
        margin: 0 5px;
    }
    .op-event-features li:last-child:after{
        display: none;
    }
</style>
<div id="main-content">
    <div class="container">
        <div id="content-area" class="clearfix">
            <div class="events-content">
                <?php if( have_posts() ){ $month = 0;?>
                <!-- objeto bucle principal -->
                <?php while (have_posts() ){
                        the_post();
                        // EVENT METADATA
                        $event_date     = get_post_meta(get_the_id(), $prefix . 'termine', true );
                        $split_date = explode('.',$event_date);
                        $the_id = get_the_ID();
                        $the_first_term = get_the_terms( $the_id, 'op-events-cat' );
                ?>
                <div class="op-event-single-content">
                    <!-- objeto bucle posts -->
                    <div class="row">
                        <div class="col-xs-1">
                            <div class="op-event-date-placeholder">
                                <div class="op-event-date"><?= $split_date[0] ?></div>
                                <div class="op-event-month"><?= date('M', $event_date) ?></div>
                            </div>
                        </div>
                        <div class="col-xs-11">
                            <h2><?= the_title() ?></h2>
                            <ul class="op-event-features">
                                <li><?= $the_first_term[0]->name ?></li>
                                <li><?= get_post_meta( $the_id, $prefix . 'place', true) ?></li>
                                <li><?= get_post_meta( $the_id, $prefix . 'termine', true) ?></li>
                                <li><?= get_post_meta( $the_id, $prefix . 'termine_end', true) ?></li>
                            </ul>
                            <div class="op-event-excerpt-placeholder">
                                <?= the_content() ?>
                            </div>
                        </div>
                    </div>
                    <!-- -->
                </div>
                <?php } // END WHILE
                    the_posts_pagination( array(
                        'mid_size'  => 2,
                        'prev_text' => __( 'Back', 'textdomain' ),
                        'next_text' => __( 'Onward', 'textdomain' ),
                    ) );
                }else{ ?>
                <div class="op-events-months-content">
                    <p><?= _e('There is no events published yet','schnell') ?></p>
                </div>
                <?php } // END IF ?>
                <!-- -->
            </div>
        </div> <!-- #content-area -->
    </div> <!-- .container -->
</div> <!-- #main-content -->
<?php

get_footer();
