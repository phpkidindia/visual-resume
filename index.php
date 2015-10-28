<?php
/**
 * @package Visual_Resume
 * @version 1.0.0
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
    add_meta_box( 'sections', 'Experience Sections', 'vir_experience_metabox_render', 'resume', 'normal', 'high' );
	add_meta_box( 'personal_sections', 'Personal Information', 'vir_personal_metabox_render', 'resume', 'normal', 'high' );
	add_meta_box( 'educational_sections', 'Educational Information', 'vir_educational_metabox_render', 'resume', 'normal', 'high' );
	add_meta_box( 'project_sections', 'Project Information', 'vir_project_metabox_render', 'resume', 'normal', 'high' );
	add_meta_box( 'skills_sections', 'Professional Skills', 'vir_skills_metabox_render', 'resume', 'normal', 'high' );
	add_meta_box( 'certification_sections', 'Certifications If any', 'vir_certifications_metabox_render', 'resume', 'normal', 'high' );
}

function vir_experience_metabox_render()
{
    $output = '<div class="experiences"></div>
			   <button class="button button-primary button-large addExperience" type="button">Add Experience</button>
			   '; 
	echo $output;
}
function vir_educational_metabox_render()
{
    $output = '<div class="educations"></div>
			   <button class="button button-primary button-large addEducation" type="button">Add Education</button>
			   '; 
	echo $output;
}

function vir_project_metabox_render()
{
    $output = '<div class="projects"></div>
			   <button class="button button-primary button-large addProject" type="button">Add A Project</button>
			   '; 
	echo $output;
}

function vir_skills_metabox_render()
{
    $output = '<div class="skills"></div>
			   <button class="button button-primary button-large addSkills" type="button">Add Skills</button>
			   '; 
	echo $output;
}

function vir_certifications_metabox_render()
{
    $output = '<div class="certifications"></div>
			   <button class="button button-primary button-large addCertification" type="button">Add Certification(s)</button>'; 
	echo $output;
}

function vir_personal_metabox_render()
{
	
	$output = '<table border="0" style="width:500px; border-collapse:collapse;">
	<tr><td><input type="text" name="vir[fname]" placeholder="First Name"></td><td><input type="text" name="vir[name]" placeholder=" Last Name"></td></tr>
	<tr><td><input type="text" name="vir[email]" placeholder="E-mail"><br><em>yourname@example.com</em></td><td><input type="text" name="vir[contact_no]" placeholder="Contact no"></td></tr>
	<tr><td><input type="text" name="vir[website]" placeholder="Website"><br><em>http://www.example.com</em></td><td><textarea name="vir[address]" placeholder="address"></textarea></td></tr>
	</table>';
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

function vir_save_experience($post_id){


    $vir = $_POST['vir'];

    update_post_meta($post_id,'_resume',$vir);
}
add_action('save_post','vir_save_experience');
add_action( 'admin_enqueue_scripts', 'vir_scripts' );
add_action( 'admin_enqueue_scripts', 'vir_styles' );