<?php

function alu_scripts()
{
    wp_enqueue_style('alu', ALU_URL . "/static/css/style.css", array(), ALU_VERSION);
    wp_enqueue_script('alu', ALU_URL . "/static/js/index.js", array(), ALU_VERSION);
}
add_action('wp_enqueue_scripts', 'alu_scripts', 20, 1);

add_filter('smilies_src', 'alu_smilies_src', 1, 10);
function alu_smilies_src($img_src, $img, $siteurl)
{
    $img = rtrim($img, "gif");
    return ALU_URL . '/static/img/' . $img . 'gif';
}


function alu_get_wpsmiliestrans()
{
    global $wpsmiliestrans;
    $wpsmilies = array_unique($wpsmiliestrans);
    $output = '';
    foreach ($wpsmilies as $alt => $src_path) {
        //$emoji = str_replace(array('&#x', ';'), '', wp_encode_emoji($src_path));
        $output .= '<a class="add-smily" data-action="addSmily" data-smilies="' . $alt . '"><img class="wp-smiley" src="' . ALU_URL . '/static/img/' . $src_path . '" /></a>';
    }
    return $output;
}

function alu_smilies_reset()
{
    global $wpsmiliestrans, $wp_smiliessearch;

    // don't bother setting up smilies if they are disabled
    if (!get_option('use_smilies'))
        return;

    $wpsmiliestrans = array(
        ':mrgreen:' => 'icon_mrgreen.gif',
        ':neutral:' => 'icon_neutral.gif',
        ':twisted:' => 'icon_twisted.gif',
        ':arrow:' => 'icon_arrow.gif',
        ':shock:' => 'icon_eek.gif',
        ':smile:' => 'icon_smile.gif',
        ':???:' => 'icon_confused.gif',
        ':cool:' => 'icon_cool.gif',
        ':evil:' => 'icon_evil.gif',
        ':grin:' => 'icon_biggrin.gif',
        ':idea:' => 'icon_idea.gif',
        ':oops:' => 'icon_redface.gif',
        ':razz:' => 'icon_razz.gif',
        ':roll:' => 'icon_rolleyes.gif',
        ':wink:' => 'icon_wink.gif',
        ':cry:' => 'icon_cry.gif',
        ':eek:' => 'icon_surprised.gif',
        ':lol:' => 'icon_lol.gif',
        ':mad:' => 'icon_mad.gif',
        ':sad:' => 'icon_sad.gif',
        '8-)' => 'icon_cool.gif',
        '8-O' => 'icon_eek.gif',
        ':-(' => 'icon_sad.gif',
        ':-)' => 'icon_smile.gif',
        ':-?' => 'icon_confused.gif',
        ':-D' => 'icon_biggrin.gif',
        ':-P' => 'icon_razz.gif',
        ':-o' => 'icon_surprised.gif',
        ':-x' => 'icon_mad.gif',
        ':-|' => 'icon_neutral.gif',
        ';-)' => 'icon_wink.gif',
        // This one transformation breaks regular text with frequency.
        //     '8)' => 'icon_cool.gif',
        '8O' => 'icon_eek.gif',
        ':(' => 'icon_sad.gif',
        ':)' => 'icon_smile.gif',
        ':?' => 'icon_confused.gif',
        ':D' => 'icon_biggrin.gif',
        ':P' => 'icon_razz.gif',
        ':o' => 'icon_surprised.gif',
        ':x' => 'icon_mad.gif',
        ':|' => 'icon_neutral.gif',
        ';)' => 'icon_wink.gif',
        ':!:' => 'icon_exclaim.gif',
        ':?:' => 'icon_question.gif',
    );
}
add_action('init', 'alu_smilies_reset');


add_filter('comment_form_defaults', 'alu_add_smilies_to_comment_form');
function alu_add_smilies_to_comment_form($default)
{
    $commenter = wp_get_current_commenter();
    $default['comment_field'] .= '<p class="comment-form-smilies">' . alu_get_wpsmiliestrans() . '</p>';
    return $default;
}
