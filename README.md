FieldBuilder for ExpressionEngine 2.1
=========

**Fieldbuilder** is a plugin that will return a form label and form field from a given set of expressionengine fields.

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

For a {type} of "text" that was shown as required the plugin would return,


	<label for="{name}">{label}</label>  
	<input type="{type}" name="{name}" id="{name}" class="required" />  

	
For a {type} of "select" the plugin would return,
	
	<label for="{name}">{label}</label>  
	<select name="{name}" id="{name}">  
	<option value="" selected="selected">Please Select...</option>  
	<option value="{options(1)}">{options(1)}</option>  
	<option value="{options(2)}">{options(2)}</option>  
	<option value="{options(3)}">{options(3)}</option>  
	<option value="{options(4)}">{options(4)}</option>  
	</select>  
	
For all of the other types available the plugin will return pretty much what you expect, a label, then the fieldtype laid out in a valid way.  

This plugin currently supports the following fieldtypes. *Name* *[variant]* *(argument)*  

1. 	Input (text)
2. 	Text Area (text_area)
3. 	Select (select)
4. 	Select [multiple] (multi)
5. 	Upload (upload)
6. 	Checkbox [single] (checkbox)
7. 	Checkbox [multiple] (multic)
8. 	Radio Buttons (radio)

Use the argument values above in a select field within the matrix either on their own, or to the left of a colon when paired with a more readable label, like so...

<pre>
	text : First Name
	select : Home State
	checkbox : Newsletter
</pre>


#### Compatibility 

This plugin has been tested on EE2.1 running PHP 5.2.

#### Warranty/License 

There’s no warranty of any kind. If you find a bug, please tell me and I will try to fix it. It’s provided completely as-is; if something breaks, you lose data, or something else bad happens, the author(s) and owner(s) of this plugin are in no way responsible.

This plugin is owned by Adam Wiggall. You can modify it and use it for your own personal or commercial projects, but you can’t redistribute it.