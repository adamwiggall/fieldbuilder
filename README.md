FieldBuilder for ExpressionEngine 2
=========

**Fieldbuilder** is a plugin that will return a form label and input field from a given set of expressionengine fields.

For ExpressionEngine installation, the directory /fieldbuilder should be placed in /system/expressionengine/third_party/

Usage
-------

	{exp:fieldbuilder 
		label="{the_display_name_for_the_field}" 
		type="{form_input_type}"
		name="{to_create_name_and_id}"
		options="{comma_separated_list_of_options}" 
		req"{yes_or_no}"
	}
	
The plugin works best with a matrix of fields that can be set by a user in the expressionengine control panel when publishing an entry.

For a {type} of "text" the plugin would return the following,

	<label for="{name}">{label}</label>
	<input type="{type}" name="{name}" id="{name}" />
	
