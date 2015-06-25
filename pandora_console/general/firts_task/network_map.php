<?php
global $config;
check_login ();
ui_require_css_file ('firts_task');
?>
<?php 

ui_print_info_message ( array('no_close'=>true, 'message'=>  __('There are no recon task defined yet.') ) ); 
$strict_user = db_get_value('strict_acl', 'tusuario', 'id_user', $config['id_user']);
$networkmap_types = networkmap_get_types($strict_user);
?>

<div class="new_task">
	<div class="image_task">
		<?php echo html_print_image('images/firts_task/icono_grande_reconserver.png', true, array("alt" => __('Recon server')));?>
	</div>
	<div class="text_task">
		<h3> <?php echo __('Create Recon Task'); ?></h3>
		<p id="description_task"> <?php echo __("There is also an open-source version of the network map. 
								This functionality allows to graphically display the nodes and relationships, agents, modules and groups available to the user. 
								There are three types of network maps:
			<li><ul>Topology Map</ul>
			<ul>Group Map</ul>
			<ul>Policy Map</ul></li> "); ?></p>
		<form id="networkmap_action" method="post" action="index.php?sec=network&amp;sec2=operation/agentes/networkmap&action=create">
			<?php echo html_print_select($networkmap_types, 'tab', 'topology', '', '', 0);
					html_print_input_hidden('add_networkmap', 1);
			?>
			
			<input type="submit" class="button_task" value="<?php echo __('Create Recon Task'); ?>" />
		</form>
	</div>
</div>
