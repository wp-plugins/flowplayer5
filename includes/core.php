<?php
add_shortcode("flowplayer", "fp5_shortcode");

function fp5_shortcode($atts) {
    extract(shortcode_atts(array('mp4' => '', 'webm' => '', 'ogg' => '', 'skin' => 'minimalist', 'splash' => '',
        'autoplay' => 'false', 'loop' => 'false', 'subtitles' => '', 'width' => '', 'height' => ''), $atts));

    $options = get_option('fp5_options');
    $key = $options['key'];
    $logo = $options['logo'];
    $analytics = $options['ga_accountId'];

    fp5_printScripts($key);

    $out =
        '<script>
            jQuery("head").append( jQuery(\'<link rel="stylesheet" type="text/css" />\').attr("href", "http://releases.flowplayer.org/'.FP5_FLOWPLAYER_VERSION.'/skin/' . $skin . '.css") );';

    if ($splash != '') {
        $out .= '
            jQuery(function() {
                jQuery(".flowplayer").css("background", "url('.$splash.') center no-repeat");
            });
        ';
    }

    $ratio = 0;
    if ($width != '' && $height != '') {
        $ratio = intval($height) / intval($width);
    }

    $out .= '
        </script>
        <div ' .
        ($width != '' && $height != '' ? 'style="width:'.$width.'px;height:'.$height.'px;" ' : '') .
        ($width != '' && $height == '' ? 'style="width:'.$width.'px" ' : '') .
        'class="flowplayer' . ($splash != "" ? " is-splash" : "") . '"' .
        ($key != '' ? ' data-key="'.$key.'"' : '') .
        ($key != '' && $logo != '' ? ' data-logo="'.$logo.'"' : '') .
        ($analytics != '' ? ' data-analytics="'.$analytics.'"' : '') .
        ($ratio != 0 ? ' data-ratio="'.$ratio.'"' : '') .
        '><video' .
        fp5_getopt($autoplay, "autoplay") .
        fp5_getopt($loop, "loop") .
        '>';
    $out .= fp5_getVideoLink($mp4);
    $out .= fp5_getVideoLink($webm);
    $out .= fp5_getVideoLink($ogg);
    $out .= $subtitles != "" ? '<track src="'.$subtitles.'"/>' : '';
    $out .=
        '</video>
        </div>';
    return $out;
}

function fp5_getopt($var, $option) {
    return ($var == 'true' ? " ".$option : "");
}

function fp5_getVideoLink($type) {
    if ($type == '') return '';
    return '<source type="video/mp4" src="' . $type . '" />';
}

function fp5_printScripts($key) {
    wp_register_script('fp5_embedder', "http://releases.flowplayer.org/".FP5_FLOWPLAYER_VERSION."/".($key != '' ? "commercial/" : "")."flowplayer.min.js", array('jquery'), null, true);
    wp_print_scripts('fp5_embedder');
}

?>