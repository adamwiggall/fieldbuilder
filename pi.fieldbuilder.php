<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Fieldbuilder Plugin
 * Copyright Adam Wiggall, http://turnandface.com
 */

$plugin_info       = array(
   'pi_name'        => 'Field Builder',
   'pi_version'     => '1.0',
   'pi_author'      => 'Adam Wiggall',
   'pi_author_url'  => 'http://turnandface.com',
   'pi_description' => 'Returns form fields and labels based on Matrix entries.',
   'pi_usage'       => Fieldbuilder::usage()
   );

/**
 * Memberlist Class
 *
 * @package			ExpressionEngine
 * @category		Plugin
 * @author			Adam Wiggall
 * @copyright		Copyright (c) 2010, Adam Wiggall
 * @link			http://turnandface.com
 */


class Fieldbuilder
{
	
var $return_data = '';
	
	public function Fieldbuilder()
	{
		$this->EE =& get_instance();
		$this->EE->load->helper('url');
		$this->EE->load->helper('form');
		
		$field_name = ($this->EE->TMPL->fetch_param('label')) ? ($this->EE->TMPL->fetch_param('label')) : 'Field Name Required*';
		$field_type = ($this->EE->TMPL->fetch_param('type')) ? strtolower(($this->EE->TMPL->fetch_param('type'))) : '';
		$required =  ($this->EE->TMPL->fetch_param('req')) ? strtolower(($this->EE->TMPL->fetch_param('req'))) : '';
		$options = ($this->EE->TMPL->fetch_param('options')) ? ($this->EE->TMPL->fetch_param('options')) : '';
		$field_id = ($this->EE->TMPL->fetch_param('name')) ? ($this->EE->TMPL->fetch_param('name')) : '';
		$field_class = ($this->EE->TMPL->fetch_param('class')) ? ($this->EE->TMPL->fetch_param('class')) : '';
		
		// Additional attributes for the label (must be associative array)
		$label_attributes = array(
			'for' => $field_id
		);
		
		// Standard attributes for the inputs	
		$input_data = array(
			'name' => $field_id,
			'id' => $field_id,
			'class' => $field_class,
			'value' => ''
		);
		
		// Add extras for required fields
		if ($required == 'yes') {
			$field_name .= "*";
			$input_data['class'] = 'required';
			$select_extra = "class='required' id='" . $field_id . "'";
		} else {
			$select_extra = "id='" . $field_id . "'";
		}
		
		
		switch ($field_type) {
			case 'text':
				$tagdata = form_label($field_name, $field_id, $field_class);
				$tagdata .= form_input($input_data);
				break;
				
			case 'text_area':
				$tagdata = form_label($field_name, $field_id, $field_class);
				$input_data['rows'] = '10';
				$input_data['cols'] = '30';
				$tagdata .= form_textarea($input_data);
				break;
				
			case 'select':
				$tagdata = form_label($field_name, $field_id, $field_class, $field_class);
				// create the associative array of selectables
				$options = explode(",", $options);
				$selectables = array("" => "Please Select...");
				foreach ($options as $option) {
					$option_name = trim($option);
					$option_value = url_title($option,"underscore",true);
					$selectables[$option_value] = $option_name;
				}
				$tagdata .= form_dropdown($field_id, $selectables, '', $select_extra);
				break;
				
			case 'upload':
				$tagdata = form_label($field_name, $field_id, $field_class);
				$tagdata .= form_upload($input_data);
				break;

			case 'multi':
				$tagdata = form_label($field_name, $field_id, $label_attributes, $field_class);
				// create the associative array of selectables
				$options = explode(",", $options);
				foreach ($options as $option) {
					$option_name = trim($option);
					$option_value = url_title($option,"underscore",true);
					$selectables[$option_value] = $option_name;
				}
				$select_extra .= " class='multi'";
				$tagdata .= form_multiselect($field_id . "[]", $selectables, '', $select_extra);
				break;

			case 'multic':
			$tagdata = "<h4>" . $field_name . "</h4>";
			// create the checkboxes
			$options = explode(",", $options);
			foreach ($options as $option) {
				$option_name = trim($option);
				$option_value = url_title($option,"underscore",true);
				$tagdata .= form_checkbox($field_id . "[]", $option_value, false);
				$tagdata .= form_label($option_name, $field_id, $label_attributes, $field_class);
			}
				break;
			
			case 'radio':
				$tagdata = "<h4>" . $field_name . "</h4>";
				// create the buttons
				$options = explode(",", $options);
				foreach ($options as $option) {
					$option_name = trim($option);
					$option_value = url_title($option,"underscore",true);
					$tagdata .= form_radio($field_id, $option_value, false);
					$tagdata .= form_label($option_name, $field_id, $field_class);
				}
				break;
			
			case 'checkbox':
				$tagdata = "<h4>" . $field_name . "</h4>";
				// create the checkboxes
				$options = explode(",", $options);
				foreach ($options as $option) {
					$option_name = trim($option);
					$option_value = url_title($option,"underscore",true);
					$tagdata .= form_checkbox($field_id, $option_value, false);
					$tagdata .= form_label($option_name, $field_id, $label_attributes, $field_class);
				}				
				break;
				
				
			default:
				$tagdata = "Field type unknown, please check the entry";
				break;
		}

		$this->return_data = $tagdata;
		
		return;

	}

	// --------------------------------------------------------------------

		/**
		 * Usage
		 *
		 * This function describes how the plugin is used.
		 *
		 * @access	public
		 * @return	string
		 */

	  //  Make sure and use output buffering

	  function usage()
	  {
	  ob_start(); 
	  ?>
	The Fieldbuilder Plugin returns an HTML form field
	and label based on the input.

	{exp:fieldbuilder}

	  <?php
	  $buffer = ob_get_contents();

	  ob_end_clean(); 

	  return $buffer;
	  }
	  // END

	}
	/* End of file pi.fieldbuilder.php */
	/* Location: ./system/expressionengine/third_party/fieldbuilder/pi.fieldbuilder.php */