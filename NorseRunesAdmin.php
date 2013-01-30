<?php

if (isset($_POST['norserune_process']) && $_POST['norserune_process'] == 'y') {
	update_option('norserune_definitionpage',strip_tags($_POST['definitions_page']) );
	$updates = "Odin's Rune Plugin Settings Updates.";
}

	runes_header();
	$definitions_page = get_option( 'norserune_definitionpage' );
	echo "<h2>Odin's Rune Instructions/Setup</h2>";

if ($updates != '') {
?>

<div class="updated">
				<p><strong><?php _e($updates ); ?></strong></p>
                <?php /*?><p><a href="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">go back</a></p><?php */?>
			</div>
<?php } ?>
<h3>Instructions</h3>
<ol>
<li>To display a run on a page use <strong>[showrune runeid="IDNUMBER"]</strong> with the ID Number of the Rune to be shown with information. To show a rune without the textual information you can use <strong>[showsinglerune runeid="IDNUMBER"]</strong></li>
<li>To Display all of the Runes use <strong>[showallrunes]</strong>.  This will show all of the runes with hover effects of the information.  If there is a Definition Page set below it will also put a link to that page with the Rune being shown on the page.</li>
<li>On the Definitions Page you need to put the <strong>[definerune]</strong> shortcode so it will display the rune and its information.<br />
Sample Definitions Page (Shows the Definition of the Rune and also all the runes below it with links):<br />
<textarea rows="3" cols="25">
[definerune]

[showallrunes]</textarea></li>
<li>To display the Odin's Rune Form you use the shortcode <strong>[odinsrune]</strong>.</li>

</ol>
<h3>Configuration</h3>
    <form name="norserune_form" method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">
    <input type="hidden" name="norserune_process" value="y">
    <p><?php _e("<strong>Definition Page: </strong>"); 
	echo get_bloginfo('wpurl'); ?>/<input type="text" name="definitions_page" value="<?php echo $definitions_page; ?>" /><br>
    <?php _e("(Set to the page with the Definitions Shortcode in it, leave blank for none.)" ); ?>
    </p>

<p class="submit">  
<input type="submit" name="Submit" value="<?php _e('Update Options', 'oscimp_trdom' ) ?>" />  
</p>
    </form>
    <p>&nbsp;</p> 
    <?php
	//showAllRunes(true, true);

	showRuneStatistics();
?>