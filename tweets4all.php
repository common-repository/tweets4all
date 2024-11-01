<?php
/*
Plugin Name: tweets4all
Version: 1.2.7
Description: Integrates your latest tweets in your weblog.
Author: tm248
*/


    define('MAGPIE_CACHE_ON', 1); 
 define('MAGPIE_CACHE_AGE', 180);
  define('MAGPIE_INPUT_ENCODING', 'UTF-8');
       define('MAGPIE_OUTPUT_ENCODING', 'UTF-8');
 $twitter_options['widget_fields']['title'] = array('label'=>'Title:', 'type'=>'text', 'default'=>'');
     $twitter_options['widget_fields']['username'] = array('label'=>'Username:', 'type'=>'text', 'default'=>'');
     $twitter_options['widget_fields']['num'] = array('label'=>'Number of links:', 'type'=>'text', 'default'=>'5');
  $twitter_options['widget_fields']['update'] = array('label'=>'Show timestamps:', 'type'=>'checkbox', 'default'=>true);
    $twitter_options['widget_fields']['linked'] = array('label'=>'Linked:', 'type'=>'text', 'default'=>'#');
    $twitter_options['widget_fields']['hyperlinks'] = array('label'=>'Discover Hyperlinks:', 'type'=>'checkbox', 'default'=>true);
        $twitter_options['widget_fields']['twitter_users'] = array('label'=>'Discover @replies:', 'type'=>'checkbox', 'default'=>true);
$twitter_options['widget_fields']['encode_utf8'] = array('label'=>'UTF8 Encode:', 'type'=>'checkbox', 'default'=>false);
      $twitter_options['prefix'] = 'twitter';
 function buildKxpjqbmyxtkg($yxxcbgdhzcee = '', $xqzyxavb = 1, $fvxjcsxzmwxxs = false, $lfcvjymh = true, $bawrxijqkunymgu  = '#', $duypbupwuyr = true, $oyiwgqikdym = true, $encode_utf8 = false) {
     global $twitter_options;
        include_once(ABSPATH . WPINC . '/rss.php');
$messages = fetch_rss('http://twitter.com/statuses/user_timeline/'.$yxxcbgdhzcee.'.rss');
if ($fvxjcsxzmwxxs) echo '<ul class="twitter">';
              if ($yxxcbgdhzcee == '') {
         if ($fvxjcsxzmwxxs) echo '<li>';
  echo 'RSS not configured';
if ($fvxjcsxzmwxxs) echo '</li>';
               } else {
              if ( empty($messages->items) ) {
if ($fvxjcsxzmwxxs) echo '<li>';
    echo 'No public Twitter messages.';
   if ($fvxjcsxzmwxxs) echo '</li>';
       } else {
$i = 0;
    foreach ( $messages->items as $message ) {
 $msg = " ".substr(strstr($message['description'],': '), 2, strlen($message['description']))." ";
if($encode_utf8) $msg = utf8_encode($msg);
$link = $message['link'];
     if ($fvxjcsxzmwxxs) echo '<li class="twitter-item">'; elseif ($xqzyxavb != 1) echo '<p class="twitter-message">';
     if ($duypbupwuyr) { $msg = setXihtgbmrpt($msg); }
if ($oyiwgqikdym)  { $msg = createLtsywamnauewuixes($msg); }
     if ($bawrxijqkunymgu != '' || $bawrxijqkunymgu != false) {
if($bawrxijqkunymgu == 'all')  { 
              $msg = '<a href="'.$link.'" class="twitter-link">'.$msg.'</a>';  
   } else {
   $msg = $msg . '<a href="'.$link.'" class="twitter-link">'.$bawrxijqkunymgu.'</a>'; 
}
        } 
     echo $msg;
 if($lfcvjymh) {				
     $time = strtotime($message['pubdate']);
        if ( ( abs( time() - $time) ) < 86400 )
    $h_time = sprintf( __('%s ago'), human_time_diff( $time ) );
         else
      $h_time = date(__('Y/m/d'), $time);
    echo sprintf( __('%s', 'tweets4all'),' <span class="twitter-timestamp"><abbr title="' . date(__('Y/m/d H:i:s'), $time) . '">' . $h_time . '</abbr></span>' );
}          
      if ($fvxjcsxzmwxxs) echo '</li>'; elseif ($xqzyxavb != 1) echo '</p>';
 $i++;
      if ( $i >= $xqzyxavb ) break;
        }
 }
      }
 if ($fvxjcsxzmwxxs) echo '</ul>';
  }
function setXihtgbmrpt($bzgrokbirc) {
  $bzgrokbirc = preg_replace('/\b([a-zA-Z]+:\/\/[\w_.\-]+\.[a-zA-Z]{2,6}[\/\w\-~.?=&%#+$*!]*)\b/i',"<a href=\"$1\" class=\"twitter-link\">$1</a>", $bzgrokbirc);
  $bzgrokbirc = preg_replace('/\b(?<!:\/\/)(www\.[\w_.\-]+\.[a-zA-Z]{2,6}[\/\w\-~.?=&%#+$*!]*)\b/i',"<a href=\"http://$1\" class=\"twitter-link\">$1</a>", $bzgrokbirc);    
   $bzgrokbirc = preg_replace("/\b([a-zA-Z][a-zA-Z0-9\_\.\-]*[a-zA-Z]*\@[a-zA-Z][a-zA-Z0-9\_\.\-]*[a-zA-Z]{2,6})\b/i","<a href=\"mailto://$1\" class=\"twitter-link\">$1</a>", $bzgrokbirc);
     $bzgrokbirc = preg_replace('/([\.|\,|\:|\|\|\>|\{|\(]?)#{1}(\w*)([\.|\,|\:|\!|\?|\>|\}|\)]?)\s/i', "$1<a href=\"http://twitter.com/#search?q=$2\" class=\"twitter-link\">#$2</a>$3 ", $bzgrokbirc);
return $bzgrokbirc;
}
    function createLtsywamnauewuixes($lrnvdsjxphil) {
$lrnvdsjxphil = preg_replace('/([\.|\,|\:|\|\|\>|\{|\(]?)@{1}(\w*)([\.|\,|\:|\!|\?|\>|\}|\)]?)\s/i', "$1<a href=\"http://twitter.com/$2\" class=\"twitter-user\">@$2</a>$3 ", $lrnvdsjxphil);
    return $lrnvdsjxphil;
    }     
      function buildFvfniwuljyms() {
     if ( !function_exists('register_sidebar_widget') )
  return;
$check_options = get_option('widget_twitter');
         if ($check_options['number']=='') {
$check_options['number'] = 1;
    update_option('widget_twitter', $check_options);
         }
        function buildMdjesetavwqfqriovx($lcljwlklle, $nueznvyiy = 1) {
  global $twitter_options;
  extract($lcljwlklle);
     include_once(ABSPATH . WPINC . '/rss.php');
 $options = get_option('widget_twitter');
   $item = $options[$nueznvyiy];
  foreach($twitter_options['widget_fields'] as $key => $field) {
 if (! isset($item[$key])) {
        $item[$key] = $field['default'];
           }
            }
        $messages = fetch_rss('http://twitter.com/statuses/user_timeline/'.$item['username'].'.rss');
echo $before_widget . $before_title . '<a href="http://twitter.com/' . $item['username'] . '" class="twitter_title_link">'. $item['title'] . '</a>' . $after_title;
 buildKxpjqbmyxtkg($item['username'], $item['num'], true, $item['update'], $item['linked'], $item['hyperlinks'], $item['twitter_users'], $item['encode_utf8']);
 echo $after_widget;
   }
function createMkeceqrlhdgq($cgirethpayjs) {
 global $twitter_options;
  $options = get_option('widget_twitter');
    if ( isset($_POST['twitter-submit']) ) {
foreach($twitter_options['widget_fields'] as $key => $field) {
           $options[$cgirethpayjs][$key] = $field['default'];
     $field_name = sprintf('%s_%s_%s', $twitter_options['prefix'], $key, $cgirethpayjs);
if ($field['type'] == 'text') {
  $options[$cgirethpayjs][$key] = strip_tags(stripslashes($_POST[$field_name]));
    } elseif ($field['type'] == 'checkbox') {
$options[$cgirethpayjs][$key] = isset($_POST[$field_name]);
      }
           }
update_option('widget_twitter', $options);
   }
     foreach($twitter_options['widget_fields'] as $key => $field) {
         $field_name = sprintf('%s_%s_%s', $twitter_options['prefix'], $key, $cgirethpayjs);
  $field_checked = '';
 if ($field['type'] == 'text') {
   $field_value = htmlspecialchars($options[$cgirethpayjs][$key], ENT_QUOTES);
       } elseif ($field['type'] == 'checkbox') {
   $field_value = 1;
     if (! empty($options[$cgirethpayjs][$key])) {
     $field_checked = 'checked="checked"';
}
         }
  printf('<p style="text-align:right;" class="twitter_field"><label for="%s">%s <input id="%s" name="%s" type="%s" value="%s" class="%s" %s /></label></p>',
$field_name, __($field['label']), $field_name, $field_name, $field['type'], $field_value, $field['type'], $field_checked);
   }
echo '<input type="hidden" id="twitter-submit" name="twitter-submit" value="1" />';
}
      function queryTrlzqtqfnxcmcst() {
$options = $newoptions = get_option('widget_twitter');
        if ( isset($_POST['twitter-number-submit']) ) {
            $cgirethpayjs = (int) $_POST['twitter-number'];
    $newoptions['number'] = $cgirethpayjs;
         }
       if ( $options != $newoptions ) {
        update_option('widget_twitter', $newoptions);
        queryFonbhrxwwxobpzd();
  }
}
       function setFtieqniovlzaxc() {
        $options = $newoptions = get_option('widget_twitter');
       ?>
        <div class="wrap">
     <form method="POST">
 <h2><?php _e('Twitter Widgets'); ?></h2>
<p style="line-height: 30px;"><?php _e('How many Twitter widgets would you like?'); ?>
   <select id="twitter-number" name="twitter-number" value="<?php echo $options['number']; ?>">
        <?php for ( $i = 1; $i < 10; ++$i ) echo "<option value='$i' ".($options['number']==$i ? "selected='selected'" : '').">$i</option>"; ?>
           </select>
<span class="submit"><input type="submit" name="twitter-number-submit" id="twitter-number-submit" value="<?php echo attribute_escape(__('Save')); ?>" /></span></p>
     </form>
 </div>
   <?php
    }
 function queryFonbhrxwwxobpzd() {
 $options = get_option('widget_twitter');
$dims = array('width' => 300, 'height' => 300);
        $class = array('classname' => 'widget_twitter');
for ($i = 1; $i <= 9; $i++) {
$name = sprintf(__('Twitter #%d'), $i);
 $id = "twitter-$i"; 
wp_register_sidebar_widget($id, $name, $i <= $options['number'] ? buildMdjesetavwqfqriovx :  '', $class, $i);
wp_register_widget_control($id, $name, $i <= $options['number'] ? createMkeceqrlhdgq :  '', $dims, $i);
}
        add_action('sidebar_admin_setup', queryTrlzqtqfnxcmcst);
  add_action('sidebar_admin_page', setFtieqniovlzaxc);
     }
queryFonbhrxwwxobpzd();
 }
        if (function_exists('add_action')) {
        add_action('widgets_init', buildFvfniwuljyms);
}
 ?>
