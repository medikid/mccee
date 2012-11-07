<?php

/*
 * http://drupal.org/node/721552
 * http://anexusit.com:8080/blog/how-create-new-entitycontent-type-programmatically-drupal-7
 * http://www.thecarneyeffect.co.uk/creating-custom-content-type-adding-fields-programmatically-drupal-7
 * 
 * 
 */

function book_extension_install(){
    $t = get_t();

  /**** STEP 1 ****/

  // machine name of the content type
  $name = 'book';
/*
  // define the node type
  $notes = array(
    'type' => $name,
    'name' => $t('Notes'),
    'base' => 'node_content',
    'title_label' => $t('Notes Title'),
    'description' => $t('Post Notes.'),
    'custom' => TRUE,
  );

  // set other node defaults not declared above
  $content_type = node_type_set_defaults($notes);
  
    // add the body field
  node_add_body_field($content_type, $t('Text Content'));

  // save the content type
  node_type_save($content_type);

*/
  /**** STEP 2 ****/
/*
  // add peristant variables that control settings
  variable_set('additional_settings__active_tab_' . $name, 'edit-menu');
  variable_set('node_preview_' . $name, 2);
  variable_set('node_options_' . $name, array(0 => 'status', 1 => 'promote'));
  variable_set('node_submitted_' . $name, 0);
  variable_set('menu_options_' . $name, array());
  variable_set('menu_parent_' . $name, 'main-menu:0');

*/
  /**** STEP 3 ****/

  // create all the fields we are adding to our content type
  foreach (_book_extension_installed_fields() as $field) {
    field_create_field($field);
  }

  // create all the instances for our fields
  foreach ( _book_extension_installed_instances() as $instance) {
    $instance['entity_type'] = 'node';
    $instance['bundle'] = $name;
    field_create_instance($instance);
  }
}
  /************execute this code in execute php to add this into notes_installed field and instances function**
  include_once DRUPAL_ROOT . '/includes/utility.inc';

    $field_data = field_info_field('field_name');
    unset($field_data['id']);
    dsm(drupal_var_export($field_data));

    $instance_data = field_info_instance('node', 'field_name', 'dummy');
    unset($instance_data['id'], $instance_data['field_id']);
    dsm(drupal_var_export($instance_data));
    ****************************/
  
  
  function _book_extension_installed_fields(){
    return array(
	'field_mindmap_content' => array(
	'translatable' => '0',
	'entity_types' => array(),
	'settings' => array(),
	'storage' => array(
	  'type' => 'field_sql_storage',
	  'settings' => array(),
	  'module' => 'field_sql_storage',
	  'active' => '1',
	  'details' => array(
	    'sql' => array(
	      'FIELD_LOAD_CURRENT' => array(
		'field_data_field_mindmap_content' => array(
		  'map' => 'field_mindmap_content_map',
		  'plugins' => 'field_mindmap_content_plugins',
		  'features' => 'field_mindmap_content_features',
		  'settings' => 'field_mindmap_content_settings',
		),
	      ),
	      'FIELD_LOAD_REVISION' => array(
		'field_revision_field_mindmap_content' => array(
		  'map' => 'field_mindmap_content_map',
		  'plugins' => 'field_mindmap_content_plugins',
		  'features' => 'field_mindmap_content_features',
		  'settings' => 'field_mindmap_content_settings',
		),
	      ),
	    ),
	  ),
	),
	'foreign keys' => array(),
	'indexes' => array(),
	'field_name' => 'field_mindmap_content',
	'type' => 'graphmind',
	'module' => 'graphmind_service',
	'active' => '1',
	'locked' => '0',
	'cardinality' => '1',
	'deleted' => '0',
	'columns' => array(
	  'map' => array(
	    'type' => 'text',
	    'size' => 'big',
	    'not null' => TRUE,
	    'description' => 'XML map data',
	  ),
	  'plugins' => array(
	    'type' => 'text',
	    'not null' => TRUE,
	    'description' => 'Plugin selection',
	  ),
	  'features' => array(
	    'type' => 'text',
	    'not null' => TRUE,
	    'description' => 'Feature selection',
	  ),
	  'settings' => array(
	    'type' => 'text',
	    'not null' => TRUE,
	    'description' => 'Extra array for settings',
	  ),
	),
	'bundles' => array(
	  'node' => array(
	    'book',
	  ),
	),
	),

	'field_video_content' =>array(	
	    'translatable' => '0',
	    'entity_types' => array(),
	    'settings' => array(),
	    'storage' => array(
	      'type' => 'field_sql_storage',
	      'settings' => array(),
	      'module' => 'field_sql_storage',
	      'active' => '1',
	      'details' => array(
		'sql' => array(
		  'FIELD_LOAD_CURRENT' => array(
		    'field_data_field_video_content' => array(
		      'fid' => 'field_video_content_fid',
		      'title' => 'field_video_content_title',
		      'data' => 'field_video_content_data',
		    ),
		  ),
		  'FIELD_LOAD_REVISION' => array(
		    'field_revision_field_video_content' => array(
		      'fid' => 'field_video_content_fid',
		      'title' => 'field_video_content_title',
		      'data' => 'field_video_content_data',
		    ),
		  ),
		),
	      ),
	    ),
	    'foreign keys' => array(
	      'file_managed' => array(
		'table' => 'file_managed',
		'columns' => array(
		  'fid' => 'fid',
		),
	      ),
	    ),
	    'indexes' => array(
	      'fid' => array(
		'fid',
	      ),
	    ),
	    'field_name' => 'field_video_content',
	    'type' => 'media',
	    'module' => 'media',
	    'active' => '1',
	    'locked' => '0',
	    'cardinality' => '1',
	    'deleted' => '0',
	    'columns' => array(
	      'fid' => array(
		'type' => 'int',
		'unsigned' => TRUE,
		'not null' => FALSE,
	      ),
	      'title' => array(
		'type' => 'varchar',
		'length' => 255,
		'not null' => FALSE,
	      ),
	      'data' => array(
		'type' => 'text',
		'not null' => FALSE,
		'size' => 'big',
		'serialize' => TRUE,
	      ),
	    ),
	    'bundles' => array(
	      'node' => array(
		'book',
	      ),
	    ),
	  )
      );
  }
    
  function _book_extension_installed_instances(){
     return array(
      'field_mindmap_content' => array(
	'label' => 'Mindmap Content',
	'widget' => array(
	  'weight' => '-3',
	  'type' => 'graphmind_widget',
	  'module' => 'graphmind_service',
	  'active' => 0,
	  'settings' => array(),
	),
	'settings' => array(
	  'plugins' => array(
	    'OrganicGroupsPlugin' => 'OrganicGroupsPlugin',
	    'TaxonomyManager' => 'TaxonomyManager',
	    'Relationship' => 'Relationship',
	  ),
	  'features' => array(
	    'nodeInfo' => 'nodeInfo',
	    'createMindmapNode' => 'createMindmapNode',
	    'loadDrupalNode' => 'loadDrupalNode',
	    'removeNode' => 'removeNode',
	    'attributes' => 'attributes',
	    'connections' => 'connections',
	    'tooltips' => 'tooltips',
	  ),
	  'graphmind_relationship' => 1,
	  'settings' => NULL,
	  'user_register_form' => FALSE,
	),
	'display' => array(
	  'default' => array(
	    'label' => 'above',
	    'type' => 'graphmind_default_formatter',
	    'weight' => '1',
	    'settings' => array(),
	    'module' => 'graphmind_service',
	  ),
	  'full' => array(
	    'label' => 'above',
	    'type' => 'graphmind_default_formatter',
	    'weight' => '1',
	    'settings' => array(),
	    'module' => 'graphmind_service',
	  ),
	  'teaser' => array(
	    'type' => 'hidden',
	    'label' => 'above',
	    'settings' => array(),
	    'weight' => 0,
	  ),
	),
	'required' => 0,
	'description' => '',
	'default_value' => array(
	  array(
	    'is_used' => 1,
	    'map' => '',
	    'settings' => '',
	  ),
	),
	'field_name' => 'field_mindmap_content',
	'entity_type' => 'node',
	'bundle' => 'book',
	'deleted' => '0',
      ),
	
    'field_video_content' =>array(
	'label' => 'Video Content',
	'widget' => array(
	  'weight' => '-2',
	  'type' => 'media_generic',
	  'module' => 'media',
	  'active' => 1,
	  'settings' => array(
	    'allowed_types' => array(
	      'image' => 'image',
	      'video' => 'video',
	      'audio' => 0,
	      'default' => 0,
	    ),
	    'allowed_schemes' => array(
	      'youtube' => 'youtube',
	      'public' => 'public',
	      'http' => 0,
	      'https' => 0,
	      'feed' => 0,
	    ),
	    'progress_indicator' => 'throbber',
	  ),
	),
	'settings' => array(
	  'file_extensions' => 'jpg jpeg gif png txt doc docx xls xlsx pdf ppt pptx pps ppsx odt ods odp mp3 mov m4v mp4 mpeg avi ogg oga ogv wmv ico',
	  'user_register_form' => FALSE,
	),
	'display' => array(
	  'default' => array(
	    'label' => 'above',
	    'type' => 'media',
	    'weight' => '2',
	    'settings' => array(
	      'file_view_mode' => 'default',
	    ),
	    'module' => 'media',
	  ),
	  'full' => array(
	    'label' => 'above',
	    'type' => 'media',
	    'weight' => '2',
	    'settings' => array(
	      'file_view_mode' => 'default',
	    ),
	    'module' => 'media',
	  ),
	  'teaser' => array(
	    'type' => 'hidden',
	    'label' => 'above',
	    'settings' => array(),
	    'weight' => 0,
	  ),
	),
	'required' => 0,
	'description' => '',
	'field_name' => 'field_video_content',
	'entity_type' => 'node',
	'bundle' => 'book',
	'deleted' => '0'
	      )
     );
  }
  
  function book_extension_uninstall(){
      // machine name of the content type
	$name = 'book';

	// gather all job nodes created
	$sql = 'SELECT nid FROM {node} n WHERE n.type = :type';
	$result = db_query($sql, array(':type' => $name));
	$nids = array();
	foreach ($result as $row) {
	  $nids[] = $row->nid;
	}

	// delete all the job nodes at once
	node_delete_multiple($nids);

	// remove peristant variables that control settings
	variable_del('additional_settings__active_tab_' . $name);
	variable_del('node_preview_' . $name);
	variable_del('node_options_' . $name);
	variable_del('node_submitted_' . $name);
	variable_del('menu_options_' . $name);
	variable_del('menu_parent_' . $name);


	// find all fields and delete them
	foreach (array_keys(_notes_installed_fields()) as $field) {
	  field_delete_field($field);
	}

	// find all fields and delete instance
	$instances = field_info_instances('node', $name);
	foreach ($instances as $instance_name => $instance) {
	  field_delete_instance($instance);
	}

	// delete our content type
	node_type_delete($name);

	// purge all field infromation
	field_purge_batch(1000);
    }

?>
