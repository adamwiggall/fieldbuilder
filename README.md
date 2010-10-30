FieldBuilder for ExpressionEngine 2.1
=========

**Fieldbuilder** is a plugin that will return a form label and input field from a given set of expressionengine fields.

Installation. The directory */fieldbuilder* should be placed in */system/expressionengine/third_party/*

## Usage

	{exp:fieldbuilder 
		label="{the_display_name_for_the_field}" 
		type="{form_input_type}"
		name="{to_create_name_and_id}"
		options="{comma_separated_list_of_options}" 
		req"{yes_or_no}"
	}

## Works Best With...

### 'Matrix' by Pixel & Tonic

The plugin works best with a matrix of fields that can be set by a user in the expressionengine control panel when publishing an entry.

#### Examples

For a {type} of "text" the plugin would return,


	<label for="{name}">{label}</label>  
	<input type="{type}" name="{name}" id="{name}" />  

	
For a {type} of "select" the plugin would return,

	

This plugin currently supports the following fieldtypes. *Name* *[variant]* *(argument)*
1. Input (text)
2. Text Area (text_area)
3. Select (select)
4. Select [multiple] (multi)
4. Upload (upload)
5. Checkbox [single] (checkbox)
6. Checkbox [multiple] (multic)
7. Radio Buttons (radio)

This plugin has been tested on EE2.1 running PHP 5.3.