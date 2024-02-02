<?php
/**
 * List View Loop
 * This file sets up the structure for the list loop
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/list/loop.php
 *
 * @package TribeEventsCalendar
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
} ?>

<?php
$today_start = strtotime(date('Y-m-d 00:00:00'));
$today_end = strtotime(date('Y-m-d 23:23:59'));
global $event;
$events = tribe_get_events( [
    'start_date'     => $today_start,
    'end_date'     => $today_end,
   'posts_per_page' => 5,
 ] );
if ( $events ) {
    
?>
    <div class="a-la-une" >
        <h1 class="tribe-events-page-title titre-a-la-une">Ce soir à la nouvelle Seine</h1>


        <?php $results="";
        foreach($events as $event) { ?>
            <?php //setup_postdata( $event );?>
            <?php
                $content=(string) $event->post_content;

                $results.='<div class="single-movie-container">
                    <div class="movie_list_image">
                        <div class="bottom_line" style="text-align:center">
                            <a syle="text-align:center" href="'.get_the_permalink($event->ID).'" title="'. $event->post_title.'">
                            <img
                                src="'.get_the_post_thumbnail_url( $event->ID, 'full' ).'"
                                alt="'.$event->post_name.'"
                                title="'.$event->post_title.'"
                            />
                            </a>		
                        </div>
                    </div>
                    <div class="movie_list_container">
                        <div class="movie-card-right-side">
                            <div class="movie_title">
                            <div class="marginright30" >
                                <a href="'.get_the_permalink($event->ID).'">'
                                    .$event->post_title.		
                                '</a>
                            </div>
                            </div>
                            <div class="overview-container">
                            '.$content.'...
                            </div>';
                            $additional_fields = tribe_get_custom_fields($event->ID);
                                $lien = $additional_fields['Lien de réservation:'];
                                if (isset($lien)) {
                                    if (strpos($lien,'http://') !== false || strpos($lien,'https://') !== false) {
                                        //echo "<a target=\"_blank\" href=\"";
                                        $url_res= $lien;
                                    }
                                    else {
                                        //echo "<a target=\"_blank\" href=\"";
                                        $url_res= "http://".$lien;
                                    }
                                }
                                
                               
                            $results.='<div class="event_buttons" style="padding-top:0px">
                                <div class="button_red"><a target="_blank" href="'.$url_res.'" class="vh_button red icon-ticket hover_right">Acheter les tickets</a>
                                </div>
                                <div class="button_yellow">
                                    <a href="'.get_the_permalink($event->ID).'" class="vh_button yellow icon-play-1 hover_right">En savoir plus</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>';
         } 
         echo $results;?>
    </div>

<?php 
    } else {
        echo 'Aucun spectacle ce soir';
    }
    /* Restore original Post Data */
    wp_reset_postdata();
    ?>

<script>

$(".tribe-common-c-btn.tribe-events-c-search__button").click(function() {
    setTimeout(function() { 
    const regex_url_actus = new RegExp(/tribe-bar-search(.|-)*/);
    url=window.location.href
    console.log("url",url)
    if(regex_url_actus.test(url)){
        console.log("effacer")
        $('.a-la-une').hide()
    }     
    }, 2000);
    
});
</script>