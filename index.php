<?php
/**
 * @package Visual_Resume
 * @version 1.0
 */
/*
Plugin Name: Visual Resume
Plugin URI: http://wordpress.org/plugins/visual-resume/
Description: This is plugin to create simple and elegant visual resume for induviduals.
Author: wpashokg
Version: 1.6
Author URI: http://ashokg.in/
*/

//Custom Post Types
add_action( 'init', 'vir_create_post_type' );
function vir_create_post_type() {
  register_post_type( 'resume',
    array(
      'labels' => array(
        'name' => __( 'Resumes' ),
				'singular_name' => __( 'Resume' ),
				'add_new' => __( 'Add New' ),
				'add_new_item' => __( 'Add New Resume' ),
				'edit' => __( 'Edit' ),
				'edit_item' => __( 'Edit Resume' ),
				'new_item' => __( 'New Resume' ),
				'view' => __( 'View Resume' ),
				'view_item' => __( 'View Resume' ),
				'search_items' => __( 'Search Resumes' ),
				'not_found' => __( 'No Resumes found' ),
				'not_found_in_trash' => __( 'No Resumes found in Trash' ),
				'parent' => __( 'Parent Resume' ),
      ),
      'public' => true,
	  'supports' => array('title','gallery','thumbnail','page-attributes'),
  	  'taxonomies' => array('resume'),
	  'capability_type' => 'page'
    )
  );
}

add_action( 'add_meta_boxes', 'sections_metabox' );
function sections_metabox()
{
    add_meta_box( 'sections', 'Experience Sections', 'sections_metabox_render', 'resume', 'normal', 'high' );
}

function sections_metabox_render()
{
    $output = '<input type="text" placeholder="Company" name="vir_company[]" style="width:100%; width:45%; float:left; margin-right:5%;"/>
				<input type="text" placeholder="Designation" name="vir_designation[]" style="width:45%; float:left; ">
				<input type="text" placeholder="From" name="vir_frm[]" style="width:45%; float:left; margin-right:5%;">
				<input type="text" placeholder="To" name="vir_to_yr[]" style="width:35%; float:left; ">
				<label style="padding:8px 0px;"><input type="checkbox" placeholder="To" name="vir_curr_employer" style="float:left; ">Current Employer</label>
			   <div class="row"><textarea placeholder="Section Content" name="section_content[]" style="width:100%;" class="textedit" /></textarea></div></div>'; 
	echo $output;
}

function vir_styles()
{
    // Register the style like this for a plugin:
    wp_enqueue_style( 'vir-admin-style',  plugins_url('assets/jquery-te-1.4.0.css', __FILE__) );
}

function vir_scripts()
{
   
    // For either a plugin or a theme, you can then enqueue the script:
    wp_enqueue_script( 'vir-admin-scrtipt',  plugins_url('assets/jquery-te-1.4.0.min.js', __FILE__) );
    wp_enqueue_script( 'vir-admin-config',  plugins_url('assets/text-editor.js', __FILE__) );
}
add_action( 'admin_enqueue_scripts', 'vir_scripts' );
add_action( 'admin_enqueue_scripts', 'vir_styles' );