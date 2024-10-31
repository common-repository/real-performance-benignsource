<div class="wrap">
<?php 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if( current_user_can('administrator') ) {?>



<style type="text/css" >
.time {
    height: 30px;
    width: 32%;
    display: inline-block;
	padding:5px;
	font-size:16px;
    position: relative;
	text-align:center;

    background-color: #F1F2F7;
	text-shadow: 1px 1px #999999;
    overflow: hidden;
    -webkit-box-shadow: inset 0 1px 2px rgba(0,0,0,.1);
    -moz-box-shadow: inset 0 1px 2px rgba(0,0,0,.1);
    box-shadow: inset 0 1px 2px rgba(0,0,0,.1);}
.int{ 
background-color: #F1F2F7;
border:2px #666666 solid;
}
.check{
    content: "\2717";
    font-size: 24px;
    -webkit-font-smoothing: antialiased;
    text-align: center;
    color: #fff;
    display: inline-block;
    width: 26px;
    height: 26px;
	
   
    background: #C9D6E2;
    box-shadow: inset 0 1px 2px rgba(0,0,0,.1);
    border: 1px solid #B2BFCA;
}

[type="checkbox"]:not(:checked),
[type="checkbox"]:checked {
  position: absolute;
  left: -9999px;
}
[type="checkbox"]:not(:checked) + label,
[type="checkbox"]:checked + label {
  position: relative;
  padding-left: 75px;
  cursor: pointer;
}
[type="checkbox"]:not(:checked) + label:before,
[type="checkbox"]:checked + label:before,
[type="checkbox"]:not(:checked) + label:after,
[type="checkbox"]:checked + label:after {
  content: '';
  position: absolute;
}
[type="checkbox"]:not(:checked) + label:before,
[type="checkbox"]:checked + label:before {
  left:0; top: -3px;
  width: 65px; height: 30px;
  background: #DDDDDD;
  border-radius: 15px;
  transition: background-color .2s;
}
[type="checkbox"]:not(:checked) + label:after,
[type="checkbox"]:checked + label:after {
  width: 20px; height: 20px;
  transition: all .2s;
  border-radius: 50%;
  background: #7F8C9A;
  top: 2px; left: 5px;
}

/* on checked */
[type="checkbox"]:checked + label:before {
  background:#34495E; 
}
[type="checkbox"]:checked + label:after {
  background: #39D2B4;
  top: 2px; left: 40px;
}

[type="checkbox"]:checked + label .ui,
[type="checkbox"]:not(:checked) + label .ui:before,
[type="checkbox"]:checked + label .ui:after {
  position: absolute;
  left: 6px;
  width: 65px;
  border-radius: 15px;
  font-size: 14px;
  font-weight: bold;
  line-height: 22px;
  transition: all .2s;
}
[type="checkbox"]:not(:checked) + label .ui:before {
  content: "no";
  left: 32px
}
[type="checkbox"]:checked + label .ui:after {
  content: "yes";
  color: #39D2B4;
}
[type="checkbox"]:focus + label:before {
  border: 1px dashed #777;
  box-sizing: border-box;
  margin-top: -1px;
}

.checkdone{
    content: "\2717";
    font-size: 24px;
    -webkit-font-smoothing: antialiased;
    text-align: center;
    color: #fff;
    display: inline-block;
    width: 26px;
    height: 26px;
	
   
    background: #00CC00;
    box-shadow: inset 0 1px 2px rgba(0,0,0,.1);
    border: 1px solid #B2BFCA;
}		
</style>
<div></div>
<?php echo '<img src="' . esc_attr( plugins_url( 'rp_logo.png', __FILE__ ) ) . '" alt="Real Performance Benignsource" border="0px"> ';?>
<?php    
    if (isset($this->message)) {
        ?>
        <div class="updated fade"><p><?php echo $this->message; ?></p></div>  
        <?php
    }
    if (isset($this->errorMessage)) {
        ?>
        <div class="error fade"><p><?php echo $this->errorMessage; ?></p></div>  
        <?php
    }
?>
<script language="javascript"> 

var divs = ["Step2", "Step3", "Step4", "Step5"];
    var visibleDivId = null;
    function divVisibility(divId) {
      if(visibleDivId === divId) {
        visibleDivId = null;
      } else {
        visibleDivId = divId;
      }
      hideNonVisibleDivs();
    }
    function hideNonVisibleDivs() {
      var i, divId, div;
      for(i = 0; i < divs.length; i++) {
        divId = divs[i];
        div = document.getElementById(divId);
        if(visibleDivId === divId) {
          div.style.display = "block";
        } else {
          div.style.display = "none";
        }
      }
    }

</script>
<?php

function realbs_replace_string_in_file($filenamerealbs, $string_to_replace, $replace_with){
$content=file_get_contents($filenamerealbs);
$content_chunks=explode($string_to_replace, $content);
$content=implode($replace_with, $content_chunks);
file_put_contents($filenamerealbs, $content);
}

if (isset($_POST['turnoffcss'])){
function printme($turnoffcss){


$rpbsreplace =  get_stylesheet_directory() . '/functions.php';
$filenamerealbs="$rpbsreplace";
$string_to_replace="wp_enqueue_style";
$replace_with="wp_dequeue_style";
realbs_replace_string_in_file($filenamerealbs, $string_to_replace, $replace_with);

}

printme("{turnoffcss}");
}

if (isset($_POST['turnoncss'])){
function printme($turnoncss){


$rpbsreplace =  get_stylesheet_directory() . '/functions.php';
$filenamerealbs="$rpbsreplace";
$string_to_replace="wp_dequeue_style";
$replace_with="wp_enqueue_style";
realbs_replace_string_in_file($filenamerealbs, $string_to_replace, $replace_with);

}

printme("{turnoncss}");
}
?>
<?php 
if (isset($_POST['submitwoo'])){
function printme($submitwoo){

$bscss_url = get_stylesheet_directory_uri();
$bsstyle_one = get_option('rpbs_style_onein');
$bsstyle_two = get_option('rpbs_style_twoin');
$bsstyle_three = get_option('rpbs_style_threein');
$bsstyle_four = get_option('rpbs_style_fourin');
$bsstyle_five = get_option('rpbs_style_fivein');
$bscustomstyle_one = get_option('rpbs_customstyle_onein');
$bscustomstyle_two = get_option('rpbs_customstyle_twoin');
$bscustomstyle_three = get_option('rpbs_customstyle_threein');
?>
<?php
$realBScssFiles = array(

"$bscss_url/style.css",
"$bsstyle_one",
"$bsstyle_two",
"$bsstyle_three",
"$bsstyle_four",
"$bsstyle_five",
"$bscustomstyle_one",
"$bscustomstyle_two",
"$bscustomstyle_three"
);
$bsbuffercss = "";
foreach ($realBScssFiles as $realBScssFile) {
$bsbuffercss .= file_get_contents($realBScssFile);
}
$bsbuffercss = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $bsbuffercss);
$bsbuffercss = str_replace(array("\r\n","\r","\n","\t",'  ','    ','     '), '', $bsbuffercss);
$bsbuffercss = preg_replace(array('(( )+{)','({( )+)'), '{', $bsbuffercss);
$bsbuffercss = preg_replace(array('(( )+})','(}( )+)','(;( )*})'), '}', $bsbuffercss);
$bsbuffercss = preg_replace(array('(;( )+)','(( )+;)'), ';', $bsbuffercss);
   
?>
<?php
$upload_dir = wp_upload_dir();
$searchfilerealbs = $upload_dir['basedir'] . '/performance/realstyle.css';
$bsbuffercss = $bsbuffercss;
$realbsmode = fopen($searchfilerealbs, 'w');
fwrite($realbsmode, "$bsbuffercss");
fclose($realbsmode);

}

printme("{submitwoo}");
}
?>
<div id="poststuff">
<div id="post-body" class="metabox-holder columns-2">
<div id="post-body-content">
<div id="normal-sortables" class="meta-box-sortables ui-sortable">                        
<div class="postbox">
<h3 class="hndle"><?php _e('Performance', $this->plugin->name); ?></h3>
<div class="inside" style="background:url(<?php echo esc_attr( plugins_url( 'performance_optimization.png', __FILE__ ) );?>) top right no-repeat;">
<h2 style="color:#e96656; text-align:center; font-size:18px; font-weight:bold;"> Cup of coffee ?  and let's start :)</h2>
<div style="padding:5px;"><i>This is a professional tool to optimize your website! is not fiction No Caching or other useless things! Performance and Optimization in Real Time!</i></div>
<script type="text/javascript">
var before_loadtime = new Date().getTime();
window.onload = Pageloadtime;
function Pageloadtime() {
var aftr_loadtime = new Date().getTime();
// Time calculating in seconds
 pgloadtime = (aftr_loadtime - before_loadtime) / 1000
document.getElementById("loadtime").innerHTML = "<strong>Page load is <font color='red'><b>" + pgloadtime + "</b></font> Seconds</strong>";
}
</script>
<div style=" padding:15px;  padding-top:35px; border:2px #3980cf dotted; margin-bottom:30px; ">
<div style="padding:5px; color:#666666; font-size:16px;">
What do these settings mean? </div>
<div style="padding:10px; text-align:center; border:1px #CCCCCC solid;">
<div style=" width:20%;display: inline-block;"><a href="http://www.benignsource.com/category/documentation/real-performance-benignsource/" target="_blank">
<?php echo '<img src="' . esc_attr( plugins_url( 'document-icon.png', __FILE__ ) ) . '" alt="Documentation" border="0px"> ';?>
<p>Read online plugin documentation</p></a></div>
<div style=" width:20%;display: inline-block;"><a href="http://www.benignsource.com/demo/" target="_blank">
<?php echo '<img src="' . esc_attr( plugins_url( 'demo-icon.png', __FILE__ ) ) . '" alt="Demonstration" border="0px"> ';?>
<p>Demonstration</p></a></div>
<div style=" width:40%;display: inline-block; text-align:left;">
<lu><li style="font-size:16px; color:#e96656; font-weight:bold;">What will make?</li>
<li>Minify HTML Code Over 50%</li>
<li>Minify CSS Over 50%</li>
<li>Minify JavaScript Over 50%</li>
<li>Resampled JPEG / PNG Quality / Size from 10 - 100% your choice!</li>
<li>Enable compression & expires header on your server</li>
</lu>
</div>
<div style=" width:20%;display: inline-block;"></div>
</div>
<div class="time"><span id="loadtime"></span></div>
<div class="time"><strong>
Peak Memory Used</strong> <span><?php echo number_format( ( memory_get_peak_usage()/1024/1024 ), 2, ',', '' ) . ' / ' . ini_get( 'memory_limit' ), '<br />'; ?>
</span></div>
<div class="time"><strong>
Active Plugins:</strong> <span><?php echo count( get_option( 'active_plugins' ) ) ; ?>
</span></div>
<div style=" text-align:center; font-size:16px; color:#e96656; padding:10px;">This is Free version if you like it support us and take <a href="http://www.benignsource.com/product/real-performance-benignsource/" target="_blank" title="Premium Version">Premium Version</a></div>
<div style=" padding:15px;  padding-top:35px; border:2px #3980cf dotted; margin-bottom:30px; ">
<div style="margin-bottom:30px;text-align:left;text-transform:uppercase;padding:13px;border-radius:4px;margin:10px;border:none; text-decoration:none;background-color:#F1F2F7;box-shadow:none;text-shadow:none;font-weight:600;vertical-align:middle; cursor:pointer;white-space:nowrap;font-size:18px;width:95%;"><div class="check">&or;</div><a href="https://developers.google.com/speed/pagespeed/insights/?url=<?php echo get_site_url(); ?>" target="_blank" style="text-decoration:none;color:#666;">
Let's see Google PageSpeed Report</a></div></div>
<div style=" padding:15px; border:2px #3980cf dotted; margin-bottom:30px; "><div style="margin-bottom:30px;text-align:left;text-transform:uppercase;padding:13px;border-radius:4px;margin:10px;border:none; text-decoration:none;background-color:#F1F2F7;box-shadow:none;text-shadow:none;font-weight:600;vertical-align:middle; cursor:pointer;white-space:nowrap;font-size:18px;color:#666;width:95%;"><div class="checkdone">&radic;</div> Step 1 is Automatically</div><div style="margin-top:30px; font-size:18px; padding:15px; background:#3980cf; color:#FFFFFF;"><i>After activate the plugin your HTML Code automatically becomes OVER 50% compressed! see your source code...</i></div></div>
<div style=" padding:15px;  padding-top:35px; border:2px #3980cf dotted; margin-bottom:30px; ">
<div onclick="divVisibility('Step2');" style="margin-bottom:30px;text-align:left;text-transform:uppercase;padding:13px;border-radius:4px;margin:10px;border:none; text-decoration:none;background-color:#F1F2F7;box-shadow:none;text-shadow:none;font-weight:600;vertical-align:middle; cursor:pointer;white-space:nowrap;font-size:18px;width:95%;"><div class="check">&or;</div>
<a href="#Step2" style="text-decoration:none;color:#666;">Step 2 Insert Theme CSS styles</a></div>

<div style="display: none;" id="Step2">
<h2 style="color:#3980cf; font-size:18px; font-weight:bold;"> Insert Theme CSS styles which you are using</h2>
<p style="padding:5px; color:#FF0000;font-weight:bold;">YourTheme/style.css is taken into default, do not enter here.</p>
<p><h2 style="color:#3980cf; font-size:14px; font-weight:bold;">Your Theme CSS Styles</h2></p>
<div style="text-align:left; color:#FF0000;">Example: so you'll see your theme in the field YourTheme/ if there is a folder CSS write css/yourstyle.css  ( if you do not use 5 CSS Styles leave the fields blank )</div>
<form action="options-general.php?page=<?php echo $this->plugin->name; ?>" method="post">

<p>
<label for="rpbs_style_one"><strong>Style 1</strong></label></p><p>
<input type="text" style="background-color: #F1F2F7;border:1px #CCCCCC solid;" name="rpbs_style_one" id="rpbs_style_one" size="100" value="<?php echo esc_attr(get_stylesheet_directory_uri()); ?>/" /></p>
<p style="color:#3980cf;"><?php echo $this->settings['rpbs_style_one']; ?></p>
<p>
<label for="rpbs_style_two"><strong>Style 2</strong></label></p><p>
<input type="text" style="background-color: #F1F2F7;border:1px #CCCCCC solid;" name="rpbs_style_two" id="rpbs_style_two" size="100" value="<?php echo esc_attr(get_stylesheet_directory_uri()); ?>/" /></p>
<p style="color:#3980cf;"><?php echo $this->settings['rpbs_style_two']; ?></p>
<p>
<label for="rpbs_style_three"><strong>Style 3</strong></label></p><p>
<input type="text" style="background-color: #F1F2F7;border:1px #CCCCCC solid;" name="rpbs_style_three" id="rpbs_style_three" size="100" value="<?php echo esc_attr(get_stylesheet_directory_uri()); ?>/" /></p>
<p style="color:#3980cf;"><?php echo $this->settings['rpbs_style_three']; ?></p>
<p>
<label for="rpbs_style_four"><strong>Style 4</strong></label></p><p>
<input type="text" style="background-color: #F1F2F7;border:1px #CCCCCC solid;" name="rpbs_style_four" id="rpbs_style_four" size="100" value="<?php echo esc_attr(get_stylesheet_directory_uri()); ?>/" /></p>
<p style="color:#3980cf;"><?php echo $this->settings['rpbs_style_four']; ?></p>
<p>
<label for="rpbs_style_five"><strong>Style 5</strong></label></p><p>
<input type="text" style="background-color: #F1F2F7;border:1px #CCCCCC solid;" name="rpbs_style_five" id="rpbs_style_five" size="100" value="<?php echo esc_attr(get_stylesheet_directory_uri()); ?>/" /></p>
<p style="color:#3980cf;"><?php echo $this->settings['rpbs_style_five']; ?></p>


<p><h2 style="color:#3980cf; font-size:14px; font-weight:bold;">Insert Custom CSS styles which you are using</h2></p>
<div style="text-align:left; color:#FF0000;">Example: so you'll see the field YourWebsite/ if there is a custom folder write custom/css/yourstyle.css  ( if you do not use Custom CSS leave the fields blank )</div>
<p>
<label for="rpbs_customstyle_one"><strong>Custom Style 1</strong></label></p><p>
<input type="text" style="background-color: #F1F2F7;border:1px #CCCCCC solid;" name="rpbs_customstyle_one" id="rpbs_customstyle_one" size="100" value="" /></p>
<p style="color:#3980cf;"><?php echo $this->settings['rpbs_customstyle_one']; ?></p>
<p>
<label for="rpbs_customstyle_two"><strong>Custom Style 2</strong></label></p><p>
<input type="text" style="background-color: #F1F2F7;border:1px #CCCCCC solid;" name="rpbs_customstyle_two" id="rpbs_customstyle_two" size="100" value="" /></p>
<p style="color:#3980cf;"><?php echo $this->settings['rpbs_customstyle_two']; ?></p>
<p>
<label for="rpbs_customstyle_three"><strong>Custom Style 3</strong></label></p><p>
<input type="text" style="background-color: #F1F2F7;border:1px #CCCCCC solid;" name="rpbs_customstyle_three" id="rpbs_customstyle_three" size="100" value="" /></p>
<p style="color:#3980cf;"><?php echo $this->settings['rpbs_customstyle_three']; ?></p>


<div style=" padding:15px; border-top:2px #e96656 dotted; margin-bottom:30px; ">
<p><input name="submit" type="submit" class="button button-primary" value="<?php _e('Save Settings', $this->plugin->name); ?>" /></p></div>
<?php wp_nonce_field('benignsource-nonce', 'submit' ); ?>
</form>


</div><span style="color:#666;">Note:</span> <span style="color:#e96656;"><i>Unfortunately each WordPress Theme is with different directories and file names etc. You have to enter them manually is easy and faster so do not worry.</i></span>
<div style=" width:100%;">
<div style=" width:100%; padding:15px; ">
<form action="options-general.php?page=<?php echo $this->plugin->name; ?>" method="post">
<div style="width:100%;">
<div style="width:50%;display: inline-block;">
<p><h2 style="color:#3980cf; font-size:14px; font-weight:bold;">Disable / Enable Theme CSS</h2>
<div style="text-align:left; padding-left:10px; color:#FF0000;">Control your styles</div></p>

<div style="width:40%;display: inline-block;">
<p>
<label for="rpbs_style_onein"><strong></strong></label></p><p>
<input type="checkbox" name="rpbs_style_onein" id="rpbs_style_onein" value="<?php echo $this->settings['rpbs_style_one']; ?>" <?php echo $this->settings['rpbs_style_onein'] ? ' checked="checked"' : ''; ?>/><label for="rpbs_style_onein"><span class="ui"></span>Style 1</label>

</p>
<p></p>
<p>
<label for="rpbs_style_twoin"><strong></strong></label></p><p>
<input type="checkbox" name="rpbs_style_twoin" id="rpbs_style_twoin"  value="<?php echo $this->settings['rpbs_style_two']; ?>" <?php echo $this->settings['rpbs_style_twoin'] ? ' checked="checked"' : ''; ?>/>
<label for="rpbs_style_twoin"><span class="ui"></span>Style 2</label>
</p>
<p></p>
<p>
<label for="rpbs_style_threein"><strong></strong></label></p><p>
<input type="checkbox" name="rpbs_style_threein" id="rpbs_style_threein" value="<?php echo $this->settings['rpbs_style_three']; ?>" <?php echo $this->settings['rpbs_style_threein'] ? ' checked="checked"' : ''; ?>/>
<label for="rpbs_style_threein"><span class="ui"></span>Style 3</label>
</p>
<p></p>
<p>
<label for="rpbs_style_fourin"><strong></strong></label></p><p>
<input type="checkbox" name="rpbs_style_fourin" id="rpbs_style_fourin" value="<?php echo $this->settings['rpbs_style_four']; ?>" <?php echo $this->settings['rpbs_style_fourin'] ? ' checked="checked"' : ''; ?>/>
<label for="rpbs_style_fourin"><span class="ui"></span>Style 4</label>
</p></div>
<div style="width:40%;display: inline-block;">
<p>
<label for="rpbs_style_fivein"><strong></strong></label></p><p>
<input type="checkbox" name="rpbs_style_fivein" id="rpbs_style_fivein" value="<?php echo $this->settings['rpbs_style_five']; ?>" <?php echo $this->settings['rpbs_style_fivein'] ? ' checked="checked"' : ''; ?>/>
<label for="rpbs_style_fivein"><span class="ui"></span>Style 5</label>
</p>
<p>
<label for="rpbs_customstyle_onein"><strong></strong></label></p><p>
<input type="checkbox" name="rpbs_customstyle_onein" id="rpbs_customstyle_onein" value="<?php echo $this->settings['rpbs_customstyle_one']; ?>" <?php echo $this->settings['rpbs_customstyle_onein'] ? ' checked="checked"' : ''; ?>/>
<label for="rpbs_customstyle_onein"><span class="ui"></span>Custom Style 1</label>
</p>
<p>
<label for="rpbs_customstyle_twoin"><strong></strong></label></p><p>
<input type="checkbox" name="rpbs_customstyle_twoin" id="rpbs_customstyle_twoin" value="<?php echo $this->settings['rpbs_customstyle_two']; ?>" <?php echo $this->settings['rpbs_customstyle_twoin'] ? ' checked="checked"' : ''; ?>/>
<label for="rpbs_customstyle_twoin"><span class="ui"></span>Custom Style 2</label>
</p>
<p>
<label for="rpbs_customstyle_threein"><strong></strong></label></p><p>
<input type="checkbox" name="rpbs_customstyle_threein" id="rpbs_customstyle_threein" value="<?php echo $this->settings['rpbs_customstyle_three']; ?>" <?php echo $this->settings['rpbs_customstyle_threein'] ? ' checked="checked"' : ''; ?>/>
<label for="rpbs_customstyle_threein"><span class="ui"></span>Custom Style 3</label>
</p></div>
</div>
<div style="width:35%;display: inline-block;">

<p><h2 style="color:#3980cf; font-size:14px; font-weight:bold;">WooCommerce CSS</h2>
<div style="text-align:left; padding-left:10px; color:#FF0000;">if you do not use WooCommerce don't use this settings</div></p>
<div style="width:100%;display: inline-block;">
<p>
Optimize WooCommerce CSS ( Only Premium Version )
</p><p>
<label for="rpbs_woo_one"><strong></strong></label></p><p>
<input type="checkbox" name="rpbs_woo_one"  id="rpbs_woo_one" value="" <?php echo $this->settings['rpbs_woo_one'] ? ' checked="checked"' : ''; ?>/><label for="rpbs_woo_one"><span class="ui"></span>woocommerce-layout.css</label>

</p>
<p></p>
<p>
<label for="rpbs_woo_two"><strong></strong></label></p><p>
<input type="checkbox" name="rpbs_woo_two" id="rpbs_woo_two" value="" <?php echo $this->settings['rpbs_woo_two'] ? ' checked="checked"' : ''; ?>/>
<label for="rpbs_woo_two"><span class="ui"></span>woocommerce-smallscreen.css</label>
</p>
<p></p>
<p>
<label for="rpbs_woo_three"><strong></strong></label></p><p>
<input type="checkbox" name="rpbs_woo_three" id="rpbs_woo_three" value="" <?php echo $this->settings['rpbs_woo_three'] ? ' checked="checked"' : ''; ?>/>
<label for="rpbs_woo_three"><span class="ui"></span>woocommerce.css</label>
</p>
<p></p>

</div>
</div></div><div style=" padding:15px; margin-top:20px; border-top:2px #e96656 dotted; margin-bottom:30px; ">
<p><input name="submitwoo" type="submit" class="button button-primary" value="<?php _e('Save Settings', $this->plugin->name); ?>" /></p>
<p style="color:#e96656;">*After press "Save Settings" all css data will be stored/write in uploads dir " performance/realstyle.css "</p>
</div><?php wp_nonce_field('benignsource-nonce', 'submitwoo' ); ?></form>

</div><div style=" width:50%;display: inline-block;">
<?php
$realbscount = get_option('rpbs_style_off');
if ($realbscount < 1 ) {
?>

<div style="width:40%;display: inline-block;">
<form action="options-general.php?page=<?php echo $this->plugin->name; ?>" method="POST" ><input  name="turnoffcss"  type="submit" style="text-align:center;text-transform:uppercase;padding:13px 25px 13px 35px;border-radius:4px;margin:10px;border:none;background-color:#e96656;box-shadow:none;text-shadow:none;font-weight:400;vertical-align:middle;cursor:pointer;white-space:nowrap;font-size:14px;color:#FFF;" value="Disable Theme CSS"/><input type="text" name="rpbs_style_off" id="rpbs_style_off" style="display:none;" value="1" />
<?php wp_nonce_field('benignsource-nonce', 'turnoffcss' ); ?></form></div>
<?php
}
else
{
?>
<input  name="rpbs_style_off"  type="submit" style="text-align:center;text-transform:uppercase;padding:13px 15px 13px 15px;border-radius:4px;margin:10px;border:none;background-color:#4d5059;box-shadow:none;text-shadow:none;font-weight:400;vertical-align:middle;cursor:pointer;white-space:nowrap;font-size:14px;color:#FFF;" value="Styles are Excluded"/>
<?php
}
?>
<div style="width:30%;display: inline-block;"><form action="options-general.php?page=<?php echo $this->plugin->name; ?>" method="POST" ><input  name="turnoncss"  type="submit" style="text-align:center;text-transform:uppercase;padding:13px 30px 13px 35px;border-radius:4px;margin:10px;border:none;background-color:#00CC00;box-shadow:none;text-shadow:none;font-weight:400;vertical-align:middle;cursor:pointer;white-space:nowrap;font-size:14px;color:#FFF;" value="Enable Theme CSS"/><input type="text" name="rpbs_style_off" id="rpbs_style_off" style="display:none;" value="0" /><?php wp_nonce_field('benignsource-nonce', 'turnoncss' ); ?>
</form></div></div><div style=" width:50%;display: inline-block;">

<div style="width:47%;display: inline-block;">
<input  name="turnoffwoo"  type="submit" style="text-align:center;text-transform:uppercase;padding:13px 15px 13px 15px;border-radius:4px;margin:10px;border:none;background-color:#e96656;box-shadow:none;text-shadow:none;font-weight:400;vertical-align:middle;cursor:pointer;white-space:nowrap;font-size:14px;color:#FFF;" value="Disable WooCommerce CSS"/></div>
<div style="width:23%;display: inline-block;"><input  name="turnonwoo"  type="submit" style="text-align:center;text-transform:uppercase;padding:13px 15px 13px 15px;border-radius:4px;margin:10px;border:none;background-color:#00CC00;box-shadow:none;text-shadow:none;font-weight:400;vertical-align:middle;cursor:pointer;white-space:nowrap;font-size:14px;color:#FFF;" value="Enable WooCommerce CSS"/>
</div></div>


</div>
</div>
<div style=" padding:15px; padding-top:35px; border:2px #3980cf dotted; margin-bottom:30px; ">
<div onclick="divVisibility('Step3');" style="margin-bottom:30px;text-align:left;text-transform:uppercase;padding:13px;border-radius:4px;margin:10px;border:none; text-decoration:none;background-color:#F1F2F7;box-shadow:none;text-shadow:none;font-weight:600;vertical-align:middle; cursor:pointer;white-space:nowrap;font-size:18px;width:95%;"><div class="check">&or;</div>
<a href="#Step3" style="text-decoration:none;color:#666;">
Step 3 Insert Theme JavaScript</a></div>
<div style="display: none;" id="Step3">

<p><h2 style="color:#3980cf; font-size:14px; font-weight:bold;">Your Theme JavaScripts </h2>
<div style="text-align:left; color:#FF0000;">Example: so you'll your theme in the field YourTheme/ if there is a folder JS write js/yourjava.js ( if you do not use 7 JavaScript leave the fields blank )</div></p>
<p>
<div style=" text-align:center; font-size:16px; color:#e96656; padding:10px;">This is Free version if you like it support us and take <a href="" target="_blank" title="Premium Version">Premium Version</a></div>

</p>
<div style=" padding:15px; border-top:2px #e96656 dotted; margin-bottom:30px; ">
<p><input name="submitjava" type="submit" class="button button-primary" value="<?php _e('Save Settings', $this->plugin->name); ?>" /></p></div>
</div>
<div style=" text-align:center; font-size:16px; color:#e96656; padding:10px;">This is Free version if you like it support us and take <a href="http://www.benignsource.com/product/real-performance-benignsource/" target="_blank" title="Premium Version">Premium Version</a></div>
<div style=" width:100%; padding:15px; ">

<div style="width:100%;">
<div style="width:50%;display: inline-block;">
<p><h2 style="color:#3980cf; font-size:14px; font-weight:bold;">Disable / Enable Theme JS</h2>
<div style="text-align:left; padding-left:10px; color:#FF0000;">Control your javascripts</div></p>

<div style="width:40%;display: inline-block;">
<p>
<label for="rpbs_java_onein"><strong></strong></label></p><p>
<input type="checkbox" name="rpbs_java_onein" id="rpbs_java_onein" value="" <?php echo $this->settings['rpbs_java_onein'] ? ' checked="checked"' : ''; ?>/><label for="rpbs_java_onein"><span class="ui"></span>JavaScript 1</label>

</p>
<p></p>
<p>
<label for="rpbs_java_twoin"><strong></strong></label></p><p>
<input type="checkbox" name="rpbs_java_twoin" id="rpbs_java_twoin" value="" <?php echo $this->settings['rpbs_java_twoin'] ? ' checked="checked"' : ''; ?>/>
<label for="rpbs_java_twoin"><span class="ui"></span>JavaScript 2</label>
</p>
<p></p>
<p>
<label for="rpbs_java_threein"><strong></strong></label></p><p>
<input type="checkbox" name="rpbs_java_threein" id="rpbs_java_threein" value="" <?php echo $this->settings['rpbs_java_threein'] ? ' checked="checked"' : ''; ?>/>
<label for="rpbs_java_threein"><span class="ui"></span>JavaScript 3</label>
</p>
<p></p>
<p>
<label for="rpbs_java_fourin"><strong></strong></label></p><p>
<input type="checkbox" name="rpbs_java_fourin" id="rpbs_java_fourin" value="" <?php echo $this->settings['rpbs_java_fourin'] ? ' checked="checked"' : ''; ?>/>
<label for="rpbs_java_fourin"><span class="ui"></span>JavaScript 4</label>
</p></div>
<div style="width:40%;display: inline-block;">
<p>
<label for="rpbs_java_fivein"><strong></strong></label></p><p>
<input type="checkbox" name="rpbs_java_fivein" id="rpbs_java_fivein" value="" <?php echo $this->settings['rpbs_java_fivein'] ? ' checked="checked"' : ''; ?>/>
<label for="rpbs_java_fivein"><span class="ui"></span>JavaScript 5</label>
</p>
<p>
<label for="rpbs_java_sixin"><strong></strong></label></p><p>
<input type="checkbox" name="rpbs_java_sixin" id="rpbs_java_sixin" value="" <?php echo $this->settings['rpbs_java_sixin'] ? ' checked="checked"' : ''; ?>/>
<label for="rpbs_java_sixin"><span class="ui"></span>JavaScript 6</label>
</p>
<p>
<label for="rpbs_java_sevenin"><strong></strong></label></p><p>
<input type="checkbox" name="rpbs_java_sevenin" id="rpbs_java_sevenin" value="" <?php echo $this->settings['rpbs_java_sevenin'] ? ' checked="checked"' : ''; ?>/>
<label for="rpbs_java_sevenin"><span class="ui"></span>Critical JavaScript 7</label>
</p>
</div>
</div>
<div style="width:35%;display: inline-block;">
<p><h2 style="color:#3980cf; font-size:14px; font-weight:bold;">WooCommerce JS</h2>
<div style="text-align:left; padding-left:10px; color:#FF0000;">You do not have to make any changes.</div></p>
</div></div><div style=" padding:15px; margin-top:20px; border-top:2px #e96656 dotted; margin-bottom:30px; ">
<p><input name="submitjavain" type="submit" class="button button-primary" value="<?php _e('Save Settings', $this->plugin->name); ?>" /></p></div>
</div>
<div style=" width:60%;display: inline-block;">
<div style="width:33%;display: inline-block;">
<input  name="turnoffjs"  type="submit" style="text-align:center;text-transform:uppercase;padding:13px 35px 13px 35px;border-radius:4px;margin:10px;border:none;background-color:#e96656;box-shadow:none;text-shadow:none;font-weight:400;vertical-align:middle;cursor:pointer;white-space:nowrap;font-size:14px;color:#FFF;" value="Disable Theme JS"/></div>
<div style="width:30%;display: inline-block;"><input  type="submit" style="text-align:center;text-transform:uppercase;padding:13px 40px 13px 35px;border-radius:4px;margin:10px;border:none;background-color:#00CC00;box-shadow:none;text-shadow:none;font-weight:400;vertical-align:middle;cursor:pointer;white-space:nowrap;font-size:14px;color:#FFF;" value="Enable Theme JS"/></div></div>
</div>

<div style=" padding:15px; padding-top:35px; border:2px #3980cf dotted; margin-bottom:30px; ">
<div onclick="divVisibility('Step4');" style="margin-bottom:30px;text-align:left;text-transform:uppercase;padding:13px;border-radius:4px;margin:10px;border:none; text-decoration:none;background-color:#F1F2F7;box-shadow:none;text-shadow:none;font-weight:600;vertical-align:middle; cursor:pointer;white-space:nowrap;font-size:18px;width:95%;"><div class="check">&or;</div>
<a href="#Step4" style="text-decoration:none;color:#666;">Step 4 JPEG / PNG parameters</a></div>
<div style="display: none;" id="Step4">
<div style=" text-align:center; font-size:16px; color:#e96656; padding:10px;">This is Free version if you like it support us and take <a href="http://www.benignsource.com/product/real-performance-benignsource/" target="_blank" title="Premium Version">Premium Version</a></div>
<div style="text-align:left; color:#FF0000;">Example: /www/root/wp-content/uploads</div>
<label for="rpbs_images_root"><strong>Image Root Directory</strong></label></p><p>
<input type="text" id="rpbs_images_root" size="100" value="<?php echo $this->settings['rpbs_images_root']; ?>" /></p>
<p style="color:#e96656;">The absolute path to the directory of images you want to optimize</p>
<p style="color:#3980cf;"><?php echo $this->settings['rpbs_images_root']; ?></p>
<p>
<label for="rpbs_imagesjpg_root"><strong>Image JPEG Quality</strong></label></p>
<p>
Select: <select name="rpbs_imagesjpg_root" >
<option value="100">100</option>
<option value="90">90</option>
<option value="80">80</option>
<option value="70">70</option>
<option value="60">60</option>
<option value="50">50</option>
<option value="40">40</option>
<option value="30">30</option>
<option value="20">20</option>
<option value="10">10</option>
</select><strong style="color:#3980cf;"> JPEG Quality <?php echo $this->settings['rpbs_imagesjpg_root']; ?> ( form 100 )</strong>
</p>
<p style="color:#e96656;">The quality at which you would like to optimize the JPEG images. 80 is fairly standard for high-quality JPEG images</p>

<p>
<label for="rpbs_imagespng_root"><strong>Image PNG Quality</strong></label></p><p>
Select: <select name="rpbs_imagespng_root" >
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
<option value="7">7</option>
<option value="8">8</option>
<option value="9">9</option>
</select><strong style="color:#3980cf;"> PNG Quality <?php echo $this->settings['rpbs_imagespng_root']; ?> ( form 9 )</strong>
</p>
<p style="color:#e96656;">The amount you would like to compress the PNG images. 9 is the maximum compression for PNG images</p>
<div style=" padding:15px; border-top:2px #e96656 dotted; margin-bottom:30px; ">
<p><input type="submit" class="button button-primary" value="<?php _e('Save Settings', $this->plugin->name); ?>" /></p></div>
</div></div>

<div style=" padding:15px; border:2px #3980cf dotted; margin-bottom:30px;">
<div style="margin-bottom:30px;text-align:left;text-transform:uppercase;padding:13px;border-radius:4px;margin:10px;border:none; text-decoration:none;background-color:#F1F2F7;box-shadow:none;text-shadow:none;font-weight:600;vertical-align:middle; cursor:pointer;white-space:nowrap;font-size:18px;color:#666;width:95%;">
Step 5 Apply JPEG / PNG settings</div><div style="margin-top:30px;">
<div style="padding:10px;">Your  settings that you specified as parameters!
<p style="color:#e96656;"><i>JPEG Quality <?php echo $this->settings['rpbs_imagesjpg_root']; ?> ( form 100 )</i></p>
<p style="color:#e96656;"><i>PNG Quality <?php echo $this->settings['rpbs_imagespng_root']; ?> ( form 9 )</i></p></div>
<div style="width:100%; margin-bottom:30px;">
<input type="submit" value="Premium Version" style="text-align:center;text-transform:uppercase;padding:13px 35px 13px 35px;border-radius:4px;margin:10px;border:none;background-color:#e96656;box-shadow:none;text-shadow:none;font-weight:400;vertical-align:middle;cursor:pointer;white-space:nowrap;font-size:14px;color:#FFF;" />
<div style="padding:10px;"><p style="color:#e96656;">Note: <i>keep in mind that after pressing "Apply settings" all images will be optimized in the designated directory. so be careful in selected parameters</i></p></div></div>
<div style="margin-top:30px; font-size:18px; padding:15px; background:#3980cf; color:#FFFFFF;"><i>This action will Apply JPEG / PNG settings that you specified as parameters</i></div>


</div></div>
<div style=" padding:15px; border:2px #3980cf dotted; margin-bottom:30px;">
<div style="margin-bottom:30px;text-align:left;text-transform:uppercase;padding:13px;border-radius:4px;margin:10px;border:none; text-decoration:none;background-color:#F1F2F7;box-shadow:none;text-shadow:none;font-weight:600;vertical-align:middle; cursor:pointer;white-space:nowrap;font-size:18px;color:#666;width:95%;">
Step 6 Enable compression & expires header on your server</div><div style="margin-top:30px;">
<div style="margin-top:30px;">Enable compression for all documents & Set a far-future expires header
<div style="margin-top:30px; font-size:18px; padding:15px; background:#e96656; color:#FFFFFF;"><i><?php 
if (strncasecmp(PHP_OS, 'WIN', 3) == 0) {
echo 'This is a server using Windows!';
} else {
echo 'This is a server using linux!';
}?></i></div>
<?php
if (strncasecmp(PHP_OS, 'WIN', 3) == 0) {
?>
<div style="width:100%;"><h2 style="color:#e96656; font-size:16px;">Windows Server Settings</h2></div>
<div style="width:100%; margin-bottom:30px;"><input type="submit" value="Premium Version" style="text-align:center;text-transform:uppercase;padding:13px 35px 13px 35px;border-radius:4px;margin:10px;border:none;background-color:#e96656;box-shadow:none;text-shadow:none;font-weight:400;vertical-align:middle;cursor:pointer;white-space:nowrap;font-size:14px;color:#FFF;" />
</div>
<div style="margin-top:30px; font-size:18px; padding:15px; background:#3980cf; color:#FFFFFF;"><i>This action will Enable compression & expires header on your server!</i>
</div>
<?php } else {?>
<div style="width:100%; margin-bottom:30px;"><h2 style="color:#e96656; font-size:16px;">Apache Server Settings</h2></div>
<div style="width:100%; margin-bottom:30px;">Make sure that the file ".htaccess" exists in the Root directory</div>
<div style="width:100%; margin-bottom:30px;">
<input type="submit" value="Premium Version" style="text-align:center;text-transform:uppercase;padding:13px 35px 13px 35px;border-radius:4px;margin:10px;border:none;background-color:#e96656;box-shadow:none;text-shadow:none;font-weight:400;vertical-align:middle;cursor:pointer;white-space:nowrap;font-size:14px;color:#FFF;" />
</div><div style="margin-top:30px; font-size:18px; padding:15px; background:#3980cf; color:#FFFFFF;"><i>This action will Enable compression & expires header on your server!</i></div>
<?php }?>

</div>

</div></div>
</div>
<div class="postbox">

<h3 class="hndle"><?php _e('Latest from BenignSource', $this->plugin->name); ?></h3>

<div style="width:70%; margin-bottom:20px;"><h2>BenignSource <a href="http://www.benignsource.com/forums/" target="_blank" title="BenignSource">Support Page</a> | <a href="http://www.benignsource.com/products/" target="_blank" title="Products">Products</a> | <a href="http://www.benignsource.com/#contact" target="_blank" title="Send feedback">Send feedback</a></h2></div>
<div style="width:100%; text-align:center;">Copyright &copy; 2001 - <?php printf(__('%1$s | %2$s'), date("Y"), ''); ?><a href="http://www.benignsource.com/" target="_blank" title="BenignSource">BenignSource</a> Company, All Rights Reserved.</div>
</div>
</div>
</div>
</div>
</div><?php }?>   
</div>