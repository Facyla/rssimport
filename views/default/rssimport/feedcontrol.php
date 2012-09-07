<?php

$rssimport = $vars['entity'];
$feed = $vars['feed'];

elgg_load_js('rssimport.js');
	
// if there are no items, let us know
if (!$feed->get_item_quantity()) {
  if ($feed->error) {
    echo "Error: " . $feed->error;
  }
  else {
    echo elgg_echo('rssimport:no:feed');
  }
  return;
}	
	

echo "<div class=\"rssimport_rsslisting\">";
	
	
// The Feed Title
echo "<div class=\"rssimport_blog_title\">";
echo "<h2><a href=\"" . $feed->get_permalink() . "\">" . $feed->get_title() . "</a></h2>";
echo "</div>";
	
// controls for importing
echo "<div class=\"rssimport_item\" id=\"rssimport_control_box\">";
echo "<div class=\"rssimport_control\">";
echo "<input type=\"checkbox\" name=\"checkalltoggle\" id=\"rssimport-checkalltoggle\">";
echo "<label for=\"checkalltoggle\"> " . elgg_echo('rssimport:select:all') . "</label>";
echo "</div>";
echo "<div class=\"rssimport_control\">";
  
echo elgg_view_form('rssimport/import', array(), array('entity' => $rssimport));

echo "</div>";
echo "
<script type=\"text/javascript\">
	var idarray = new Array();
</script>
";
echo "</div><!-- /rssimport_control_box -->";

//if no items are importable, display message instead of form - controlled by jquery at the bottom of the page
echo "<div class=\"rssimport_item\" id=\"rssimport_nothing_to_import\">";
echo elgg_echo('rssimport:nothing:to:import');
echo "</div><!-- /rssimport_nothing_to_import -->";