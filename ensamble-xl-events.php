<?php
/**
 * Plugin Name: Ensamble XL events plugin
 * Plugin URI: https://github.com/wemf/ensamblexl-events
 * Description: Plugin necesario para renderizar los eventos del sitio de Ensamble
 * Version: 0.1.4
 * Author: WEMF
 * Author URI: https://github.com/wemf/
 * License: GPL2
 */
 
add_action( 'admin_init', 'child_plugin_has_parent_plugin' );
function child_plugin_has_parent_plugin() {
    if ( is_admin() && current_user_can( 'activate_plugins' ) &&  (!is_plugin_active( 'advanced-custom-fields/acf.php' ) || !is_plugin_active( 'acf-to-rest-api/class-acf-to-rest-api.php' )) ) {
        add_action( 'admin_notices', 'child_plugin_notice' );

        deactivate_plugins( plugin_basename( __FILE__ ) ); 

        if ( isset( $_GET['activate'] ) ) {
            unset( $_GET['activate'] );
        }
    }
}

function child_plugin_notice(){
    ?><div class="error"><p>Lo siento, pero el plugin de Events necesita que instales y actives Advanced Custom Fields y ACF Rest API.</p></div><?php
}

function events_simple_schedule_shortcode($atts) {
	$html_content = '<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.0/moment.min.js" integrity="sha512-Izh34nqeeR7/nwthfeE0SI3c8uhFSnqxV0sI9TvTcXiFJkMd6fB644O64BRq2P/LA/+7eRvCw4GmLsXksyTHBg==" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.0/locale/es.min.js" integrity="sha512-L6Trpj0Q/FiqDMOD0FQ0dCzE0qYT2TFpxkIpXRSWlyPvaLNkGEMRuXoz6MC5PrtcbXtgDLAAI4VFtPvfYZXEtg==" crossorigin="anonymous"></script>
<script src="https://ensamblexl.co/wp-content/themes/genesisexpo-child/schedule-simple.js"></script>';
	 
    return $html_content;
}

add_shortcode('events-simple-schedule', 'events_simple_schedule_shortcode');

function events_full_schedule_shortcode($atts) {
	$html_content = '<div id="genesisexpo_button_2154123123" class="genesisexpo_module_button wgl_button wgl_button-xl acenter">
<button type="button" id="load-more-events" style="border-radius:5px; border-width:2px; ">Cargar más</button>
</div><script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.0/moment.min.js" integrity="sha512-Izh34nqeeR7/nwthfeE0SI3c8uhFSnqxV0sI9TvTcXiFJkMd6fB644O64BRq2P/LA/+7eRvCw4GmLsXksyTHBg==" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.0/locale/es.min.js" integrity="sha512-L6Trpj0Q/FiqDMOD0FQ0dCzE0qYT2TFpxkIpXRSWlyPvaLNkGEMRuXoz6MC5PrtcbXtgDLAAI4VFtPvfYZXEtg==" crossorigin="anonymous"></script>
<script src="https://ensamblexl.co/wp-content/themes/genesisexpo-child/schedule-full.js"></script>';
	 
    return $html_content;
}

add_shortcode('events-full-schedule', 'events_full_schedule_shortcode');