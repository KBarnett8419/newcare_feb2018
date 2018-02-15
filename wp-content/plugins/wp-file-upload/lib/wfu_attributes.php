<?php

function wfu_component_definitions() {
	$components = array(
		array(
			"id"				=> "title",
			"name"				=> "Title",
			"mode"				=> "free",
			"dimensions"		=> array("plugin/Plugin", "title/Title"),
			"multiplacements"	=> false,
			"help"				=> "A title text for the plugin"
		),
		array(
			"id"				=> "filename",
			"name"				=> "Filename",
			"mode"				=> "free",
			"dimensions"		=> null,
			"multiplacements"	=> false,
			"help"				=> "It shows the name of the selected file (useful only for single file uploads)."
		),
		array(
			"id"				=> "selectbutton",
			"name"				=> "Select Button",
			"mode"				=> "free",
			"dimensions"		=> null,
			"multiplacements"	=> false,
			"help"				=> "Represents the button to select the files for upload."
		),
		array(
			"id"				=> "uploadbutton",
			"name"				=> "Upload Button",
			"mode"				=> "free",
			"dimensions"		=> null,
			"multiplacements"	=> false,
			"help"				=> "Represents the button to execute the upload after some files have been selected."
		),
		array(
			"id"				=> "subfolders",
			"name"				=> "Subfolders",
			"mode"				=> "free",
			"dimensions"		=> array("uploadfolder_label/Upload Folder Label", "subfolders/Subfolders", "subfolders_label/Subfolders Label", "subfolders_select/Subfolders List"),
			"multiplacements"	=> false,
			"help"				=> "Allows the user to select the upload folder from a dropdown list."
		),
		array(
			"id"				=> "webcam",
			"name"				=> "Webcam",
			"mode"				=> "commercial",
			"dimensions"		=> array("webcam/Webcam Box"),
			"multiplacements"	=> false,
			"help"				=> "Displays video from the device's webcam. The user can capture and upload screenshots or video streams."
		),
		array(
			"id"				=> "progressbar",
			"name"				=> "Progressbar",
			"mode"				=> "free",
			"dimensions"		=> null,
			"multiplacements"	=> false,
			"help"				=> "Displays a simple progress bar, showing total progress of upload."
		),
		array(
			"id"				=> "userdata",
			"name"				=> "User Fields",
			"mode"				=> "free",
			"dimensions"		=> array("userdata/User Fields", "userdata_label/User Fields Label", "userdata_value/User Fields Value"),
			"multiplacements"	=> true,
			"help"				=> "Displays additional fields that the user must fill-in together with the uploaded files."
		),
		array(
			"id"				=> "message",
			"name"				=> "Message",
			"mode"				=> "free",
			"dimensions"		=> null,
			"multiplacements"	=> false,
			"help"				=> "Displays a message block with information about the upload, together with any warnings or errors."
		)
	);
	
	wfu_array_remove_nulls($components);

	return $components;
}

function wfu_category_definitions() {
	$cats = array(
		"general"			=> "General",
		"placements"		=> "Placements",
		"general"			=> "General",
		"labels"			=> "Labels",
		"notifications"		=> "Notifications",
		"colors"			=> "Colors",
		"dimensions"		=> "Dimensions",
		"general"			=> "General",
		"userdata"			=> "Additional Fields",
		"interoperability"	=> "Interoperability",
		"webcam"			=> "Webcam"
	);

	return $cats;
}

function wfu_formfield_definitions() {
	//field properties have 2 parts separated by "/"; the first part determines if the property will be shown to the user (show or hide); the second part determines default value)
	//when making changes in the structure of formfield definitions, the following are affected:
	//  - wfu_admin_composer.php function wfu_shortcode_composer
	//      variable $fieldprops_basic
	//      variable $fieldprops_default
	//      variable $template
	//      variable wfu_attribute_..._typeprops
	//      variable $from_template
	//  - wfu_functions.php function wfu_parse_userdata_attribute
	//      variable $default
	//      variable $fieldprops
	//  - wfu_blocks.php function wfu_userdata_apply_template
	//      return variable
	//  - wordpress_file_upload_adminfuctions.js function wfu_formdata_type_changed
	//      variable field
	//  - wordpress_file_upload_adminfuctions.js function wfu_formdata_add_field
	//      variable field
	//  - wordpress_file_upload_adminfuctions.js function wfu_formdata_prepare_template
	//      variable fieldprops_basic
	//      variable template
	//  - wordpress_file_upload_adminfuctions.js function wfu_update_formfield_value
	//      variable part
	//  - wordpress_file_upload_adminfuctions.js function wfu_apply_value
	//      variable def
	//      variable fieldprops
	$formfields = array(
		array(
			"type"						=> "text",
			"type_description"			=> "Simple Text",
			//checkbox properties
			"required"					=> "show/false",
			"required_hint"				=> "if checked, then this field must have a non-empty value for the file to be uploaded",
			"donotautocomplete"			=> "show/false",
			"donotautocomplete_hint"	=> "if checked, then the field will notify the browsers not to fill it with autocomplete data when the plugin is reloaded",
			"validate"					=> "hide/false",
			"validate_hint"				=> "if checked, then the field value entered by the user will be validated before file upload",
			"typehook"					=> "hide/false",
			"typehook_hint"				=> "if checked, then text suggestions will be shown below the field as the user types more text inside",
			//dropdown properties
			"labelposition"				=> "show/left",
			"labelposition_hint"		=> "select the position of the field&#39;s label; the position is relative to the field",
			"hintposition"				=> "show/right",
			"hintposition_hint"			=> "select the position of the hint that will be shown to notify the user that something is wrong\\r\\nthe position is relative to the field",
			//text properties
			"default"					=> "show/",
			"default_hint"				=> "enter a default value for the field or leave it empty if you do not want a default value",
			"data"						=> "hide/",
			"data_label"				=> "Data",
			"data_hint"					=> "complete a list of values to be shown to the user",
			"group"						=> "hide/",
			"group_hint"				=> "if a value is set, then all fields having the same value will belong to the same group",
			"format"					=> "hide/",
			"format_hint"				=> "enter a format to format user selection",
			//html templates
			"template"					=> '<input type="text" id="userdata_[sid]_field_[key]" class="file_userdata_message" value="[default]" autocomplete="[autocomplete]" onfocus="wfu_userdata_focused(this);" /><input id="userdata_[sid]_props_[key]" type="hidden" value="p:[hintposition]" />',
			"template_testmode"			=> '<input type="text" id="userdata_[sid]_field_[key]" class="file_userdata_message" value="Test message" autocomplete="off" readonly="readonly" />',
			//javascript mandatory code
			"init_code"					=> 'wfu_attach_element_handlers(document.getElementById("userdata_[sid]_field_[key]"), function(e) { document.getElementById("hiddeninput_[sid]_userdata_[key]").value = e.target.value; }); window["userdata_[sid]_codes_[key]"] = {};',
			"value_code"				=> 'window["userdata_[sid]_codes_[key]"].value = function(field) { return field.value; };',
			"lock_code"					=> 'window["userdata_[sid]_codes_[key]"].lock = function(field) { field.disabled = true; };',
			"unlock_code"				=> 'window["userdata_[sid]_codes_[key]"].unlock = function(field) { field.disabled = false; };',
			"reset_code"				=> 'window["userdata_[sid]_codes_[key]"].reset = function(field, store) { field.value = "[default]"; store.value = "[default]"; };',
			"empty_code"				=> 'window["userdata_[sid]_codes_[key]"].empty = function(field, store) { return (field.value === "") ? "'.WFU_ERROR_USERDATA_EMPTY.'" : ""; };',
			//javascript optional code
			"validate_code"				=> "",
			"typehook_code"				=> ""
		),
		array(
			"type"						=> "multitext",
			"type_description"			=> "Multiple Lines Text",
			//checkbox properties
			"required"					=> "show/false",
			"required_hint"				=> "if checked, then this field must have a non-empty value for the file to be uploaded",
			"donotautocomplete"			=> "hide/true",
			"donotautocomplete_hint"	=> "if checked, then the field will notify the browsers not to fill it with autocomplete data when the plugin is reloaded",
			"validate"					=> "hide/false",
			"validate_hint"				=> "if checked, then the field value entered by the user will be validated before file upload",
			"typehook"					=> "hide/false",
			"typehook_hint"				=> "if checked, then text suggestions will be shown below the field as the user types more text inside",
			//dropdown properties
			"labelposition"				=> "show/left",
			"labelposition_hint"		=> "select the position of the field&#39;s label; the position is relative to the field",
			"hintposition"				=> "show/right",
			"hintposition_hint"			=> "select the position of the hint that will be shown to notify the user that something is wrong\\r\\nthe position is relative to the field",
			//text properties
			"default"					=> "hide/",
			"default_hint"				=> "enter a default value for the field or leave it empty if you do not want a default value",
			"data"						=> "hide/",
			"data_label"				=> "Data",
			"data_hint"					=> "complete a list of values to be shown to the user",
			"group"						=> "hide/",
			"group_hint"				=> "if a value is set, then all fields having the same value will belong to the same group",
			"format"					=> "hide/",
			"format_hint"				=> "enter a format to format user selection",
			//html templates
			"template"					=> '<textarea id="userdata_[sid]_field_[key]" class="file_userdata_message" value="[default]" onfocus="wfu_userdata_focused(this);">[default]</textarea><input id="userdata_[sid]_props_[key]" type="hidden" value="p:[hintposition]" />',
			"template_testmode"			=> '<textarea id="userdata_[sid]_field_[key]" class="file_userdata_message" value="Test message" readonly="readonly">Test message</textarea>',
			//javascript mandatory code
			"init_code"					=> 'wfu_attach_element_handlers(document.getElementById("userdata_[sid]_field_[key]"), function(e) { document.getElementById("hiddeninput_[sid]_userdata_[key]").value = e.target.value; }); window["userdata_[sid]_codes_[key]"] = {};',
			"value_code"				=> 'window["userdata_[sid]_codes_[key]"].value = function(field) { return field.value; };',
			"lock_code"					=> 'window["userdata_[sid]_codes_[key]"].lock = function(field) { field.disabled = true; };',
			"unlock_code"				=> 'window["userdata_[sid]_codes_[key]"].unlock = function(field) { field.disabled = false; };',
			"reset_code"				=> 'window["userdata_[sid]_codes_[key]"].reset = function(field, store) { field.value = "[default]"; store.value = "[default]"; };',
			"empty_code"				=> 'window["userdata_[sid]_codes_[key]"].empty = function(field, store) { return (field.value === "") ? "'.WFU_ERROR_USERDATA_EMPTY.'" : ""; };',
			//javascript optional code
			"validate_code"				=> "",
			"typehook_code"				=> ""
		),
		array(
			"type"						=> "number",
			"type_description"			=> "Number",
			//checkbox properties
			"required"					=> "show/false",
			"required_hint"				=> "if checked, then this field must have a non-empty value for the file to be uploaded",
			"donotautocomplete"			=> "show/true",
			"donotautocomplete_hint"	=> "if checked, then the field will notify the browsers not to fill it with autocomplete data when the plugin is reloaded",
			"validate"					=> "show/true",
			"validate_hint"				=> "if checked, then the number entered by the user will be checked if it is a valid number, based on the format defined, before file upload",
			"typehook"					=> "show/false",
			"typehook_hint"				=> "if checked, then only valid characters will be allowed during typing",
			//dropdown properties
			"labelposition"				=> "show/left",
			"labelposition_hint"		=> "select the position of the field&#39;s label; the position is relative to the field",
			"hintposition"				=> "show/right",
			"hintposition_hint"			=> "select the position of the hint that will be shown to notify the user that something is wrong\\r\\nthe position is relative to the field",
			//text properties
			"default"					=> "show/",
			"default_hint"				=> "enter a default value for the field or leave it empty if you do not want a default value",
			"data"						=> "hide/",
			"data_label"				=> "Data",
			"data_hint"					=> "complete a list of values to be shown to the user",
			"group"						=> "hide/",
			"group_hint"				=> "if a non-empty group value is set, then another email confirmation field belonging to the same group must have the same email value",
			"format"					=> "show/d",
			"format_hint"				=> "enter a format for the number:\\r\\n  d for integers\\r\\n  f for floating point numbers\\r\\nthe dot (.) symbol is used as a decimal separator",
			//html templates
			"template"					=> '<input type="text" id="userdata_[sid]_field_[key]" class="file_userdata_message" value="[default]" autocomplete="[autocomplete]" onfocus="wfu_userdata_focused(this);" /><input id="userdata_[sid]_props_[key]" type="hidden" value="p:[hintposition]" />',
			"template_testmode"			=> '<input type="text" id="userdata_[sid]_field_[key]" class="file_userdata_message" value="Test message" autocomplete="off" readonly="readonly" />',
			//javascript mandatory code
			"init_code"					=> 'wfu_attach_element_handlers(document.getElementById("userdata_[sid]_field_[key]"), function(e) { if (window["userdata_[sid]_codes_[key]"].typehook) window["userdata_[sid]_codes_[key]"].typehook(e); else document.getElementById("hiddeninput_[sid]_userdata_[key]").value = e.target.value; }); window["userdata_[sid]_codes_[key]"] = {};',
			"value_code"				=> 'window["userdata_[sid]_codes_[key]"].value = function(field) { return field.value; };',
			"lock_code"					=> 'window["userdata_[sid]_codes_[key]"].lock = function(field) { field.disabled = true; };',
			"unlock_code"				=> 'window["userdata_[sid]_codes_[key]"].unlock = function(field) { field.disabled = false; };',
			"reset_code"				=> 'window["userdata_[sid]_codes_[key]"].reset = function(field, store) { field.value = "[default]"; store.value = "[default]"; };',
			"empty_code"				=> 'window["userdata_[sid]_codes_[key]"].empty = function(field) { return (field.value === "") ? "'.WFU_ERROR_USERDATA_EMPTY.'" : ""; };',
			//javascript optional code
			"validate_code"				=> 'window["userdata_[sid]_codes_[key]"].validate = function(field) { var re = /^(\+|\-)?[0-9]*$/i; if ("[format]" == "f") re = /^(\+|\-)?[0-9]*?\.?[0-9]*$/i; return (re.test(field.value) ? "" : "'.WFU_ERROR_USERDATANUMBER_INVALID.'"); };',
			"typehook_code"				=> 'window["userdata_[sid]_codes_[key]"].typehook = function(e) { var re = /^(\+|\-)?[0-9]*$/i; if ("[format]" == "f") re = /^(\+|\-)?[0-9]*?\.?[0-9]*$/i; if (re.test(e.target.value)) document.getElementById("hiddeninput_[sid]_userdata_[key]").value = e.target.value; else e.target.value = document.getElementById("hiddeninput_[sid]_userdata_[key]").value; };',
		),
		array(
			"type"						=> "email",
			"type_description"			=> "Email",
			//checkbox properties
			"required"					=> "show/false",
			"required_hint"				=> "if checked, then this field must have a non-empty value for the file to be uploaded",
			"donotautocomplete"			=> "show/true",
			"donotautocomplete_hint"	=> "if checked, then the field will notify the browsers not to fill it with autocomplete data when the plugin is reloaded",
			"validate"					=> "show/true",
			"validate_hint"				=> "if checked, then the email entered by the user will be checked if it is valid before file upload",
			"typehook"					=> "hide/false",
			"typehook_hint"				=> "if checked, then text suggestions will be shown below the field as the user types more text inside",
			//dropdown properties
			"labelposition"				=> "show/left",
			"labelposition_hint"		=> "select the position of the field&#39;s label; the position is relative to the field",
			"hintposition"				=> "show/right",
			"hintposition_hint"			=> "select the position of the hint that will be shown to notify the user that something is wrong\\r\\nthe position is relative to the field",
			//text properties
			"default"					=> "show/",
			"default_hint"				=> "enter a default value for the field or leave it empty if you do not want a default value",
			"data"						=> "hide/",
			"data_label"				=> "Data",
			"data_hint"					=> "complete a list of values to be shown to the user",
			"group"						=> "show/0",
			"group_hint"				=> "if a non-empty group value is set, then another email confirmation field belonging to the same group must have the same email value",
			"format"					=> "hide/",
			"format_hint"				=> "enter a format to format user selection",
			//html templates
			"template"					=> '<input type="text" id="userdata_[sid]_field_[key]" class="file_userdata_message file_userdata_[sid]_emailgroup_[group]" value="[default]" autocomplete="[autocomplete]" onfocus="wfu_userdata_focused(this);" /><input id="userdata_[sid]_props_[key]" type="hidden" value="p:[hintposition]" />',
			"template_testmode"			=> '<input type="text" id="userdata_[sid]_field_[key]" class="file_userdata_message file_userdata_emailgroup_[group]" value="Test message" autocomplete="off" readonly="readonly" />',
			//javascript mandatory code
			"init_code"					=> 'wfu_attach_element_handlers(document.getElementById("userdata_[sid]_field_[key]"), function(e) { document.getElementById("hiddeninput_[sid]_userdata_[key]").value = e.target.value; }); window["userdata_[sid]_codes_[key]"] = {};',
			"value_code"				=> 'window["userdata_[sid]_codes_[key]"].value = function(field) { return field.value; };',
			"lock_code"					=> 'window["userdata_[sid]_codes_[key]"].lock = function(field) { field.disabled = true; };',
			"unlock_code"				=> 'window["userdata_[sid]_codes_[key]"].unlock = function(field) { field.disabled = false; };',
			"reset_code"				=> 'window["userdata_[sid]_codes_[key]"].reset = function(field, store) { field.value = "[default]"; store.value = "[default]"; };',
			"empty_code"				=> 'window["userdata_[sid]_codes_[key]"].empty = function(field) { return (field.value === "") ? "'.WFU_ERROR_USERDATA_EMPTY.'" : ""; };',
			//javascript optional code
			"validate_code"				=> 'window["userdata_[sid]_codes_[key]"].validate = function(field) { var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i; return (re.test(field.value) ? "" : "'.WFU_ERROR_USERDATAEMAIL_INVALID.'"); };',
			"typehook_code"				=> ""
		),
		array(
			"type"						=> "confirmemail",
			"type_description"			=> "Confirmation Email",
			//checkbox properties
			"required"					=> "show/true",
			"required_hint"				=> "if checked, then this field must have a non-empty value for the file to be uploaded",
			"donotautocomplete"			=> "show/true",
			"donotautocomplete_hint"	=> "if checked, then the field will notify the browsers not to fill it with autocomplete data when the plugin is reloaded",
			"validate"					=> "hide/true",
			"validate_hint"				=> "if checked, then the confirmation email entered by the user will be checked if it is the same with the email belonging to the same group",
			"typehook"					=> "hide/false",
			"typehook_hint"				=> "if checked, then text suggestions will be shown below the field as the user types more text inside",
			//dropdown properties
			"labelposition"				=> "show/left",
			"labelposition_hint"		=> "select the position of the field&#39;s label; the position is relative to the field",
			"hintposition"				=> "show/right",
			"hintposition_hint"			=> "select the position of the hint that will be shown to notify the user that something is wrong\\r\\nthe position is relative to the field",
			//text properties
			"default"					=> "hide/",
			"default_hint"				=> "enter a default value for the field or leave it empty if you do not want a default value",
			"data"						=> "hide/",
			"data_label"				=> "Data",
			"data_hint"					=> "complete a list of values to be shown to the user",
			"group"						=> "show/0",
			"group_hint"				=> "enter a non-empty value to match this email confirmation field with another email field",
			"format"					=> "hide/",
			"format_hint"				=> "enter a format to format user selection",
			//html templates
			"template"					=> '<input type="text" id="userdata_[sid]_field_[key]" class="file_userdata_message" value="[default]" autocomplete="[autocomplete]" onfocus="wfu_userdata_focused(this);" /><input id="userdata_[sid]_props_[key]" type="hidden" value="p:[hintposition]" />',
			"template_testmode"			=> '<input type="text" id="userdata_[sid]_field_[key]" class="file_userdata_message" value="Test message" autocomplete="off" readonly="readonly" />',
			//javascript mandatory code
			"init_code"					=> 'wfu_attach_element_handlers(document.getElementById("userdata_[sid]_field_[key]"), function(e) { document.getElementById("hiddeninput_[sid]_userdata_[key]").value = e.target.value; }); window["userdata_[sid]_codes_[key]"] = {};',
			"value_code"				=> 'window["userdata_[sid]_codes_[key]"].value = function(field) { return field.value; };',
			"lock_code"					=> 'window["userdata_[sid]_codes_[key]"].lock = function(field) { field.disabled = true; };',
			"unlock_code"				=> 'window["userdata_[sid]_codes_[key]"].unlock = function(field) { field.disabled = false; };',
			"reset_code"				=> 'window["userdata_[sid]_codes_[key]"].reset = function(field, store) { field.value = "[default]"; store.value = "[default]"; };',
			"empty_code"				=> 'window["userdata_[sid]_codes_[key]"].empty = function(field) { return (field.value === "") ? "'.WFU_ERROR_USERDATA_EMPTY.'" : ""; };',
			//javascript optional code
			"validate_code"				=> 'window["userdata_[sid]_codes_[key]"].validate = function(field) { var base = document.querySelector("input.file_userdata_[sid]_emailgroup_[group]"); return (base ? (field.value == base.value ? "" : "'.WFU_ERROR_USERDATACONFIRMEMAIL_NOMATCH.'") : "'.WFU_ERROR_USERDATACONFIRMEMAIL_NOBASE.'"); };',
			"typehook_code"				=> ""
		),
		array(
			"type"						=> "password",
			"type_description"			=> "Password",
			//checkbox properties
			"required"					=> "show/true",
			"required_hint"				=> "if checked, then this field must have a non-empty value for the file to be uploaded",
			"donotautocomplete"			=> "false/true",
			"donotautocomplete_hint"	=> "if checked, then the field will notify the browsers not to fill it with autocomplete data when the plugin is reloaded",
			"validate"					=> "hide/false",
			"validate_hint"				=> "if checked, then the value entered by the user will be validated",
			"typehook"					=> "hide/false",
			"typehook_hint"				=> "if checked, then text suggestions will be shown below the field as the user types more text inside",
			//dropdown properties
			"labelposition"				=> "show/left",
			"labelposition_hint"		=> "select the position of the field&#39;s label; the position is relative to the field",
			"hintposition"				=> "show/right",
			"hintposition_hint"			=> "select the position of the hint that will be shown to notify the user that something is wrong\\r\\nthe position is relative to the field",
			//text properties
			"default"					=> "hide/",
			"default_hint"				=> "enter a default value for the field or leave it empty if you do not want a default value",
			"data"						=> "hide/",
			"data_label"				=> "Data",
			"data_hint"					=> "complete a list of values to be shown to the user",
			"group"						=> "show/0",
			"group_hint"				=> "if a non-empty group value is set, then another password confirmation field belonging to the same group must have the same password",
			"format"					=> "hide/",
			"format_hint"				=> "enter a format to format user selection",
			//html templates
			"template"					=> '<input type="password" id="userdata_[sid]_field_[key]" class="file_userdata_message file_userdata_[sid]_passwordgroup_[group]" value="[default]" autocomplete="[autocomplete]" onfocus="wfu_userdata_focused(this);" /><input id="userdata_[sid]_props_[key]" type="hidden" value="p:[hintposition]" />',
			"template_testmode"			=> '<input type="password" id="userdata_[sid]_field_[key]" class="file_userdata_message file_userdata_passwordgroup_[group]" value="Test message" autocomplete="off" readonly="readonly" />',
			//javascript mandatory code
			"init_code"					=> 'wfu_attach_element_handlers(document.getElementById("userdata_[sid]_field_[key]"), function(e) { document.getElementById("hiddeninput_[sid]_userdata_[key]").value = e.target.value; }); window["userdata_[sid]_codes_[key]"] = {};',
			"value_code"				=> 'window["userdata_[sid]_codes_[key]"].value = function(field) { return field.value; };',
			"lock_code"					=> 'window["userdata_[sid]_codes_[key]"].lock = function(field) { field.disabled = true; };',
			"unlock_code"				=> 'window["userdata_[sid]_codes_[key]"].unlock = function(field) { field.disabled = false; };',
			"reset_code"				=> 'window["userdata_[sid]_codes_[key]"].reset = function(field, store) { field.value = "[default]"; store.value = "[default]"; };',
			"empty_code"				=> 'window["userdata_[sid]_codes_[key]"].empty = function(field) { return (field.value === "") ? "'.WFU_ERROR_USERDATA_EMPTY.'" : ""; };',
			//javascript optional code
			"validate_code"				=> "",
			"typehook_code"				=> ""
		),
		array(
			"type"						=> "confirmpassword",
			"type_description"			=> "Confirmation Password",
			//checkbox properties
			"required"					=> "show/true",
			"required_hint"				=> "if checked, then this field must have a non-empty value for the file to be uploaded",
			"donotautocomplete"			=> "false/true",
			"donotautocomplete_hint"	=> "if checked, then the field will notify the browsers not to fill it with autocomplete data when the plugin is reloaded",
			"validate"					=> "hide/true",
			"validate_hint"				=> "if checked, then the value entered by the user will be validated",
			"typehook"					=> "hide/false",
			"typehook_hint"				=> "if checked, then text suggestions will be shown below the field as the user types more text inside",
			//dropdown properties
			"labelposition"				=> "show/left",
			"labelposition_hint"		=> "select the position of the field&#39;s label; the position is relative to the field",
			"hintposition"				=> "show/right",
			"hintposition_hint"			=> "select the position of the hint that will be shown to notify the user that something is wrong\\r\\nthe position is relative to the field",
			//text properties
			"default"					=> "hide/",
			"default_hint"				=> "enter a default value for the field or leave it empty if you do not want a default value",
			"data"						=> "hide/",
			"data_label"				=> "Data",
			"data_hint"					=> "complete a list of values to be shown to the user",
			"group"						=> "show/0",
			"group_hint"				=> "if a non-empty group value is set, then another password confirmation field belonging to the same group must have the same password",
			"format"					=> "hide/",
			"format_hint"				=> "enter a format to format user selection",
			//html templates
			"template"					=> '<input type="password" id="userdata_[sid]_field_[key]" class="file_userdata_message" value="[default]" autocomplete="[autocomplete]" onfocus="wfu_userdata_focused(this);" /><input id="userdata_[sid]_props_[key]" type="hidden" value="p:[hintposition]" />',
			"template_testmode"			=> '<input type="password" id="userdata_[sid]_field_[key]" class="file_userdata_message" value="Test message" autocomplete="off" readonly="readonly" />',
			//javascript mandatory code
			"init_code"					=> 'wfu_attach_element_handlers(document.getElementById("userdata_[sid]_field_[key]"), function(e) { document.getElementById("hiddeninput_[sid]_userdata_[key]").value = e.target.value; }); window["userdata_[sid]_codes_[key]"] = {};',
			"value_code"				=> 'window["userdata_[sid]_codes_[key]"].value = function(field) { return field.value; };',
			"lock_code"					=> 'window["userdata_[sid]_codes_[key]"].lock = function(field) { field.disabled = true; };',
			"unlock_code"				=> 'window["userdata_[sid]_codes_[key]"].unlock = function(field) { field.disabled = false; };',
			"reset_code"				=> 'window["userdata_[sid]_codes_[key]"].reset = function(field, store) { field.value = "[default]"; store.value = "[default]"; };',
			"empty_code"				=> 'window["userdata_[sid]_codes_[key]"].empty = function(field) { return (field.value === "") ? "'.WFU_ERROR_USERDATA_EMPTY.'" : ""; };',
			//javascript optional code
			"validate_code"				=> 'window["userdata_[sid]_codes_[key]"].validate = function(field) { var base = document.querySelector("input.file_userdata_[sid]_passwordgroup_[group]"); return (base ? (field.value == base.value ? "" : "'.WFU_ERROR_USERDATACONFIRMPASSWORD_NOMATCH.'") : "'.WFU_ERROR_USERDATACONFIRMPASSWORD_NOBASE.'"); };',
			"typehook_code"				=> ""
		),
		array(
			"type"						=> "checkbox",
			"type_description"			=> "Checkbox",
			//checkbox properties
			"required"					=> "show/false",
			"required_hint"				=> "if checked, then this checkbox field must be checked before file upload",
			"donotautocomplete"			=> "show/true",
			"donotautocomplete_hint"	=> "if checked, then the field will not be autocompleted by browsers",
			"validate"					=> "hide/false",
			"validate_hint"				=> "if checked, then the field value entered by the user will be validated before file upload",
			"typehook"					=> "hide/false",
			"typehook_hint"				=> "if checked, then text suggestions will be shown below the field as the user types more text inside",
			//dropdown properties
			"labelposition"				=> "show/none",
			"labelposition_hint"		=> "select the position of the field&#39;s label; the position is relative to the field",
			"hintposition"				=> "show/right",
			"hintposition_hint"			=> "select the position of the hint that will be shown to notify the user that something is wrong\\r\\nthe position is relative to the field",
			//text properties
			"default"					=> "show/false",
			"default_hint"				=> "enter a default value (true or false) for the field or leave it empty if you do not want a default value",
			"data"						=> "show/",
			"data_label"				=> "Description",
			"data_hint"					=> "enter a description for the checkbox",
			"group"						=> "hide/",
			"group_hint"				=> "if a value is set, then all fields having the same value will belong to the same group",
			"format"					=> "show/right",
			"format_hint"				=> "define the location of the description in relation to the check box\\r\\npossible values are: top, right, bottom, left",
			//html templates
			"template"					=> '<input type="checkbox" id="userdata_[sid]_field_[key]" class="file_userdata_checkbox" autocomplete="[autocomplete]" onchange="document.getElementById(\'hiddeninput_[sid]_userdata_[key]\').value = (this.checked ? \'true\' : \'false\');" style="display:none;" onfocus="wfu_userdata_focused(this);" /><label id="userdata_[sid]_checklabel_[key]" class="file_userdata_checkbox_description" for="userdata_[sid]_field_[key]" style="display:none;">[data]</label><input id="userdata_[sid]_props_[key]" type="hidden" value="p:[hintposition]" />',
			"template_testmode"			=> '<input type="checkbox" id="userdata_[sid]_field_[key]" class="file_userdata_checkbox" autocomplete="off" readonly="readonly" /><label id="userdata_[sid]_checklabel_[key]" for="userdata_[sid]_field_[key]" style="display:none;">[list]</label>',
			//javascript mandatory code
			"init_code"					=> 'function wfu_checkbox_init() { var f = document.getElementById("userdata_[sid]_field_[key]"); var l = document.getElementById("userdata_[sid]_checklabel_[key]"); var p = f.parentNode; var pos = "[format]"; if (pos == "top") {p.insertBefore(l, f); p.insertBefore(document.createElement("BR"), f);} else if (pos == "bottom") {p.insertBefore(document.createElement("BR"), l);} else if (pos == "left") {p.insertBefore(l, f);} f.style.display = "inline-block"; l.style.display = "inline-block"; f.checked = ("[default]" == "true"); }; wfu_checkbox_init(); window["userdata_[sid]_codes_[key]"] = {};',
			"value_code"				=> 'window["userdata_[sid]_codes_[key]"].value = function(field) { return (field.checked ? "true" : "false"); };',
			"lock_code"					=> 'window["userdata_[sid]_codes_[key]"].lock = function(field) { field.disabled = true; };',
			"unlock_code"				=> 'window["userdata_[sid]_codes_[key]"].unlock = function(field) { field.disabled = false; };',
			"reset_code"				=> 'window["userdata_[sid]_codes_[key]"].reset = function(field, store) { field.checked = ("[default]" == "true"); store.value = (field.checked ? "true" : "false"); };',
			"empty_code"				=> 'window["userdata_[sid]_codes_[key]"].empty = function(field) { return (field.value != "true" ? "'.WFU_ERROR_USERDATACHECKBOX_NOTCHECKED.'" : ""); };',
			//javascript optional code
			"validate_code"				=> "",
			"typehook_code"				=> ""
		),
		array(
			"type"						=> "radiobutton",
			"type_description"			=> "Radio button",
			//checkbox properties
			"required"					=> "show/false",
			"required_hint"				=> "if checked, then a radio button must be selected before file upload",
			"donotautocomplete"			=> "show/true",
			"donotautocomplete_hint"	=> "if checked, then the field will not be autocompleted by browsers",
			"validate"					=> "hide/false",
			"validate_hint"				=> "if checked, then the field value entered by the user will be validated before file upload",
			"typehook"					=> "hide/false",
			"typehook_hint"				=> "if checked, then text suggestions will be shown below the field as the user types more text inside",
			//dropdown properties
			"labelposition"				=> "show/left",
			"labelposition_hint"		=> "select the position of the field&#39;s label; the position is relative to the field",
			"hintposition"				=> "show/right",
			"hintposition_hint"			=> "select the position of the hint that will be shown to notify the user that something is wrong\\r\\nthe position is relative to the field",
			//text properties
			"default"					=> "show/",
			"default_hint"				=> "enter a default value for the field or leave it empty if you do not want a default value",
			"data"						=> "show/",
			"data_label"				=> "Items",
			"data_hint"					=> "enter a comma delimited list of radio button items",
			"group"						=> "show/0",
			"group_hint"				=> "all radio buttons having the same group id belong to the same group",
			"format"					=> "show/",
			"format_hint"				=> "define the location of the radio labels in relation to their radio buttons (top, right, bottom, left)\\r\\nand the placement of the radio buttons (horizontal, vertical)",
			//html templates
			"template"					=> '<input type="radio" id="userdata_[sid]_field_[key]" class="file_userdata_radiobutton" name="userdata_[sid]_radiogroup_[group]" autocomplete="[autocomplete]" onchange="var items = document.getElementsByName(this.name); for (var i = 0; i < items.length; i++) if (items[i].checked) {document.getElementById(\'hiddeninput_[sid]_userdata_[key]\').value = items[i].value; break;}" style="display:none;" onfocus="wfu_userdata_focused(document.getElementById(\'userdata_[sid]_field_[key]\'));" /><label id="userdata_[sid]_radiolabel_[key]" class="file_userdata_radiobutton_label" for="userdata_[sid]_field_[key]" style="display:none;">[data]</label><input id="userdata_[sid]_props_[key]" type="hidden" value="p:[hintposition]" />',
			"template_testmode"			=> '<input type="radio" id="userdata_[sid]_field_[key]" class="file_userdata_radiobutton" name="userdata_[sid]_radiogroup_[group]" autocomplete="off" readonly="readonly" /><label id="userdata_[sid]_radiolabel_[key]" for="userdata_[sid]_field_[key]" style="display:none;">[list]</label>',
			//javascript mandatory code
			"init_code"					=> 'function wfu_radiobutton_init() { var data = "[data]"; var items = data.split(","); var f = document.getElementById("userdata_[sid]_field_[key]"); var l = document.getElementById("userdata_[sid]_radiolabel_[key]"); var p = f.parentNode; var fo = "[format]"; var pos = (fo.indexOf("top") > -1 ? "top" : (fo.indexOf("bottom") > -1 ? "bottom" : (fo.indexOf("left") > -1 ? "left" : "right"))); var or = (fo.indexOf("vertical") > -1 ? "vertical" : "horizontal"); var def = "[default]"; for (var i = 0; i < items.length; i++) { var f2 = f; var l2 = l; if (i > 0) {var f2 = f.cloneNode(true); f2.id += "_item_" + i; l2 = l.cloneNode(true); l2.id += "_item_" + i; l2.setAttribute("for", f2.id);} f2.value = items[i]; l2.innerHTML = items[i]; var w = document.createElement("DIV"); w.className = "file_userdata_radio_wrapper"; if (pos == "top") {w.appendChild(l2); w.appendChild(document.createElement("BR")); w.appendChild(f2);} else if (pos == "right") {w.appendChild(f2); w.appendChild(l2);} else if (pos == "bottom") {w.appendChild(f2); w.appendChild(document.createElement("BR")); w.appendChild(l2);} else if (pos == "left") {w.appendChild(l2); w.appendChild(f2);} f2.style.display = "inline-block"; l2.style.display = "inline-block"; f2.checked = (def == f2.value); if (i > 0 && or == "vertical") p.appendChild(document.createElement("BR")); p.appendChild(w); } }; wfu_radiobutton_init(); window["userdata_[sid]_codes_[key]"] = {};',
			"value_code"				=> 'window["userdata_[sid]_codes_[key]"].value = function(field) { var value = ""; var items = document.getElementsByName(field.name); for (var i = 0; i < items.length; i++) if (items[i].checked) {value = items[i].value; break;} return value; };',
			"lock_code"					=> 'window["userdata_[sid]_codes_[key]"].lock = function(field) { var items = document.getElementsByName(field.name); for (var i = 0; i < items.length; i++) items[i].disabled = true; };',
			"unlock_code"				=> 'window["userdata_[sid]_codes_[key]"].unlock = function(field) { var items = document.getElementsByName(field.name); for (var i = 0; i < items.length; i++) items[i].disabled = false; };',
			"reset_code"				=> 'window["userdata_[sid]_codes_[key]"].reset = function(field, store) { var items = document.getElementsByName(field.name); for (var i = 0; i < items.length; i++) {items[i].checked = (items[i].value == "[default]"); if (items[i].checked) store.value = items[i].value;} };',
			"empty_code"				=> 'window["userdata_[sid]_codes_[key]"].empty = function(field) { return (field.value === "" ? "'.WFU_ERROR_USERDATARADIO_NOTSELECTED.'" : ""); };',
			//javascript optional code
			"validate_code"				=> "",
			"typehook_code"				=> ""
		),
		array(
			"type"						=> "date",
			"type_description"			=> "Date",
			//checkbox properties
			"required"					=> "show/false",
			"required_hint"				=> "if checked, then a date must be entered before file upload",
			"donotautocomplete"			=> "show/true",
			"donotautocomplete_hint"	=> "if checked, then the field will not be autocompleted by browsers",
			"validate"					=> "hide/false",
			"validate_hint"				=> "if checked, then the field value entered by the user will be validated before file upload",
			"typehook"					=> "hide/false",
			"typehook_hint"				=> "if checked, then text suggestions will be shown below the field as the user types more text inside",
			//dropdown properties
			"labelposition"				=> "show/left",
			"labelposition_hint"		=> "select the position of the field&#39;s label; the position is relative to the field",
			"hintposition"				=> "show/right",
			"hintposition_hint"			=> "select the position of the hint that will be shown to notify the user that something is wrong\\r\\nthe position is relative to the field",
			//text properties
			"default"					=> "show/",
			"default_hint"				=> "enter a default date for the field or leave it empty if you do not want a default value",
			"data"						=> "hide/",
			"data_label"				=> "Data",
			"data_hint"					=> "enter data items",
			"group"						=> "hide/",
			"group_hint"				=> "enter a group value",
			"format"					=> "show/",
			"format_hint"				=> "define the format of the date field as follows:\\r\\n  d - day of month (no leading zero)\\r\\n  dd - day of month (two digit)\\r\\n  o - day of the year (no leading zeros)\\r\\n  oo - day of the year (three digit)\\r\\n  D - day name short\\r\\n  DD - day name long\\r\\n  m - month of year (no leading zero)\\r\\n  mm - month of year (two digit)\\r\\n  M - month name short\\r\\n  MM - month name long\\r\\n  y - year (two digit)\\r\\n  yy - year (four digit)\\r\\n  @ - Unix timestamp (ms since 01/01/1970)\\r\\n  ! - Windows ticks (100ns since 01/01/0001)\\r\\n  &#39;...&#39; - literal text\\r\\n  &#39;&#39; - single quote\\r\\n  anything else - literal text\\r\\nthe format must be in parenthesis ()",
			//html templates
			"template"					=> '<input type="text" id="userdata_[sid]_field_[key]" class="file_userdata_message" autocomplete="[autocomplete]" readonly="readonly" onchange="document.getElementById(\'hiddeninput_[sid]_userdata_[key]\').value = this.value;" onfocus="wfu_userdata_focused(this);" /><input id="userdata_[sid]_props_[key]" type="hidden" value="p:[hintposition]" />',
			"template_testmode"			=> '<input type="text" id="userdata_[sid]_field_[key]" class="file_userdata_message" autocomplete="off" readonly="readonly" />',
			//javascript mandatory code
			"init_code"					=> 'jQuery(function() {var format = "[format]"; format = format.trim(); if (format.substr(0, 1) == "(" && format.substr(format.length - 1, 1) == ")") format = format.substr(1, format.length - 2); else format = ""; if (format == "") format = "yy-mm-dd"; var def = "[default]"; def = def.trim(); if (def.substr(0, 1) == "(" && def.substr(def.length - 1, 1) == ")") def = def.substr(1, def.length - 2); else def = ""; jQuery("#userdata_[sid]_field_[key]").datepicker({dateFormat: format, showButtonPanel: true}).datepicker("setDate", def); }); window["userdata_[sid]_codes_[key]"] = {};',
			"value_code"				=> 'window["userdata_[sid]_codes_[key]"].value = function(field) { return field.value; };',
			"lock_code"					=> 'window["userdata_[sid]_codes_[key]"].lock = function(field) { field.disabled = true; };',
			"unlock_code"				=> 'window["userdata_[sid]_codes_[key]"].unlock = function(field) { field.disabled = false; };',
			"reset_code"				=> 'window["userdata_[sid]_codes_[key]"].reset = function(field, store) { var def = "[default]"; def = def.trim(); if (def.substr(0, 1) == "(" && def.substr(def.length - 1, 1) == ")") def = def.substr(1, def.length - 2); else def = ""; jQuery("#userdata_[sid]_field_[key]").datepicker("setDate", def); store.value = field.value; };',
			"empty_code"				=> 'window["userdata_[sid]_codes_[key]"].empty = function(field, store) { return (field.value === "") ? "'.WFU_ERROR_USERDATA_EMPTY.'" : ""; };',
			//javascript optional code
			"validate_code"				=> "",
			"typehook_code"				=> ""
		),
		array(
			"type"						=> "time",
			"type_description"			=> "Time",
			//checkbox properties
			"required"					=> "show/false",
			"required_hint"				=> "if checked, then a time must be entered before file upload",
			"donotautocomplete"			=> "show/true",
			"donotautocomplete_hint"	=> "if checked, then the field will not be autocompleted by browsers",
			"validate"					=> "hide/false",
			"validate_hint"				=> "if checked, then the field value entered by the user will be validated before file upload",
			"typehook"					=> "hide/false",
			"typehook_hint"				=> "if checked, then text suggestions will be shown below the field as the user types more text inside",
			//dropdown properties
			"labelposition"				=> "show/left",
			"labelposition_hint"		=> "select the position of the field&#39;s label; the position is relative to the field",
			"hintposition"				=> "show/right",
			"hintposition_hint"			=> "select the position of the hint that will be shown to notify the user that something is wrong\\r\\nthe position is relative to the field",
			//text properties
			"default"					=> "show/",
			"default_hint"				=> "enter a default time for the field or leave it empty if you do not want a default value",
			"data"						=> "hide/",
			"data_label"				=> "Data",
			"data_hint"					=> "enter data items",
			"group"						=> "hide/",
			"group_hint"				=> "enter a group value",
			"format"					=> "show/",
			"format_hint"				=> "define the format of the time field as follows:\\r\\n  H - hour with no leading 0 (24 hour)\\r\\n  HH - hour with leading 0 (24 hour)\\r\\n  h - hour with no leading 0 (12 hour)\\r\\n  hh - hour with leading 0 (12 hour)\\r\\n  m - minute with no leading 0\\r\\n  mm - minute with leading 0\\r\\n  s - second with no leading 0\\r\\n  ss - second with leading 0\\r\\n  l - milliseconds always with leading 0\\r\\n  c - microseconds always with leading 0\\r\\n  t - a or p for AM/PM\\r\\n  T - A or P for AM/PM\\r\\n  tt - am or pm for AM/PM\\r\\n  TT - AM or PM for AM/PM\\r\\n  z - timezone as defined by timezoneList\\r\\n  Z - timezone in Iso 8601 format (+04:45)\\r\\n  &#39;...&#39; - literal text\\r\\nthe format must be in parenthesis ()",
			//html templates
			"template"					=> '<input type="text" id="userdata_[sid]_field_[key]" class="file_userdata_message" autocomplete="[autocomplete]" readonly="readonly" onchange="document.getElementById(\'hiddeninput_[sid]_userdata_[key]\').value = this.value;" onfocus="wfu_userdata_focused(this);" /><input id="userdata_[sid]_props_[key]" type="hidden" value="p:[hintposition]" />',
			"template_testmode"			=> '<input type="text" id="userdata_[sid]_field_[key]" class="file_userdata_message" autocomplete="off" readonly="readonly" />',
			//javascript mandatory code
			"init_code"					=> 'jQuery(function() {var format = "[format]"; format = format.trim(); if (format.substr(0, 1) == "(" && format.substr(format.length - 1, 1) == ")") format = format.substr(1, format.length - 2); else format = ""; if (format == "") format = "HH:mm"; var def = "[default]"; def = def.trim(); if (def.substr(0, 1) == "(" && def.substr(def.length - 1, 1) == ")") def = def.substr(1, def.length - 2); else def = ""; jQuery("#userdata_[sid]_field_[key]").timepicker({timeFormat: format}).datepicker("setTime", def); }); window["userdata_[sid]_codes_[key]"] = {};',
			"value_code"				=> 'window["userdata_[sid]_codes_[key]"].value = function(field) { return field.value; };',
			"lock_code"					=> 'window["userdata_[sid]_codes_[key]"].lock = function(field) { field.disabled = true; };',
			"unlock_code"				=> 'window["userdata_[sid]_codes_[key]"].unlock = function(field) { field.disabled = false; };',
			"reset_code"				=> 'window["userdata_[sid]_codes_[key]"].reset = function(field, store) { var def = "[default]"; def = def.trim(); if (def.substr(0, 1) == "(" && def.substr(def.length - 1, 1) == ")") def = def.substr(1, def.length - 2); else def = ""; jQuery("#userdata_[sid]_field_[key]").datepicker("setTime", def); store.value = field.value; };',
			"empty_code"				=> 'window["userdata_[sid]_codes_[key]"].empty = function(field, store) { return (field.value === "") ? "'.WFU_ERROR_USERDATA_EMPTY.'" : ""; };',
			//javascript optional code
			"validate_code"				=> "",
			"typehook_code"				=> ""
		),
		array(
			"type"						=> "datetime",
			"type_description"			=> "DateTime",
			//checkbox properties
			"required"					=> "show/false",
			"required_hint"				=> "if checked, then a date and time must be entered before file upload",
			"donotautocomplete"			=> "show/true",
			"donotautocomplete_hint"	=> "if checked, then the field will not be autocompleted by browsers",
			"validate"					=> "hide/false",
			"validate_hint"				=> "if checked, then the field value entered by the user will be validated before file upload",
			"typehook"					=> "hide/false",
			"typehook_hint"				=> "if checked, then text suggestions will be shown below the field as the user types more text inside",
			//dropdown properties
			"labelposition"				=> "show/left",
			"labelposition_hint"		=> "select the position of the field&#39;s label; the position is relative to the field",
			"hintposition"				=> "show/right",
			"hintposition_hint"			=> "select the position of the hint that will be shown to notify the user that something is wrong\\r\\nthe position is relative to the field",
			//text properties
			"default"					=> "show/",
			"default_hint"				=> "enter a default date and time for the field or leave it empty if you do not want a default value",
			"data"						=> "hide/",
			"data_label"				=> "Data",
			"data_hint"					=> "enter data items",
			"group"						=> "hide/",
			"group_hint"				=> "enter a group value",
			"format"					=> "show/",
			"format_hint"				=> "define the format of the datetime field as follows:\\r\\n  date(dateformat) where dateformat is:\\r\\n    d - day of month (no leading zero)\\r\\n    dd - day of month (two digit)\\r\\n    o - day of the year (no leading zeros)\\r\\n    oo - day of the year (three digit)\\r\\n    D - day name short\\r\\n    DD - day name long\\r\\n    m - month of year (no leading zero)\\r\\n    mm - month of year (two digit)\\r\\n    M - month name short\\r\\n    MM - month name long\\r\\n    y - year (two digit)\\r\\n    yy - year (four digit)\\r\\n    @ - Unix timestamp (ms since 01/01/1970)\\r\\n    ! - Windows ticks (100ns since 01/01/0001)\\r\\n    &#39;...&#39; - literal text\\r\\n    &#39;&#39; - single quote\\r\\n    anything else - literal text\\r\\n  time(timeformat) where timeformat is:\\r\\n    H - hour with no leading 0 (24 hour)\\r\\n    HH - hour with leading 0 (24 hour)\\r\\n    h - hour with no leading 0 (12 hour)\\r\\n    hh - hour with leading 0 (12 hour)\\r\\n    m - minute with no leading 0\\r\\n    mm - minute with leading 0\\r\\n    s - second with no leading 0\\r\\n    ss - second with leading 0\\r\\n    l - milliseconds always with leading 0\\r\\n    c - microseconds always with leading 0\\r\\n    t - a or p for AM/PM\\r\\n    T - A or P for AM/PM\\r\\n    tt - am or pm for AM/PM\\r\\n    TT - AM or PM for AM/PM\\r\\n    z - timezone as defined by timezoneList\\r\\n    Z - timezone in Iso 8601 format (+04:45)\\r\\n    &#39;...&#39; - literal text",
			//html templates
			"template"					=> '<input type="text" id="userdata_[sid]_field_[key]" class="file_userdata_message" autocomplete="[autocomplete]" readonly="readonly" onchange="document.getElementById(\'hiddeninput_[sid]_userdata_[key]\').value = this.value;" onfocus="wfu_userdata_focused(this);" /><input id="userdata_[sid]_props_[key]" type="hidden" value="p:[hintposition]" />',
			"template_testmode"			=> '<input type="text" id="userdata_[sid]_field_[key]" class="file_userdata_message" autocomplete="off" readonly="readonly" />',
			//javascript mandatory code
			"init_code"					=> 'jQuery(function() {var format = "[format]"; var dateformat = "yy-mm-dd"; var timeformat = "HH:mm"; var re = /(date|time)\((.*?)\)/g; var f; while ((f = re.exec(format)) !== null) {if (f[1] == "date") dateformat = f[2]; else if (f[1] == "time") timeformat = f[2];} var def = "[default]"; def = def.trim(); if (def.substr(0, 1) == "(" && def.substr(def.length - 1, 1) == ")") def = def.substr(1, def.length - 2); else def = ""; jQuery("#userdata_[sid]_field_[key]").datetimepicker({dateFormat: dateformat, timeFormat: timeformat}).datetimepicker("setDate", def); }); window["userdata_[sid]_codes_[key]"] = {};',
			"value_code"				=> 'window["userdata_[sid]_codes_[key]"].value = function(field) { return field.value; };',
			"lock_code"					=> 'window["userdata_[sid]_codes_[key]"].lock = function(field) { field.disabled = true; };',
			"unlock_code"				=> 'window["userdata_[sid]_codes_[key]"].unlock = function(field) { field.disabled = false; };',
			"reset_code"				=> 'window["userdata_[sid]_codes_[key]"].reset = function(field, store) { var def = "[default]"; def = def.trim(); if (def.substr(0, 1) == "(" && def.substr(def.length - 1, 1) == ")") def = def.substr(1, def.length - 2); else def = ""; jQuery("#userdata_[sid]_field_[key]").datetimepicker("setDate", def); store.value = field.value; };',
			"empty_code"				=> 'window["userdata_[sid]_codes_[key]"].empty = function(field, store) { return (field.value === "") ? "'.WFU_ERROR_USERDATA_EMPTY.'" : ""; };',
			//javascript optional code
			"validate_code"				=> "",
			"typehook_code"				=> ""
		),
		array(
			"type"						=> "list",
			"type_description"			=> "Listbox",
			//checkbox properties
			"required"					=> "show/false",
			"required_hint"				=> "if checked, then a list item must be selected before file upload",
			"donotautocomplete"			=> "show/true",
			"donotautocomplete_hint"	=> "if checked, then the field will not be autocompleted by browsers",
			"validate"					=> "hide/false",
			"validate_hint"				=> "if checked, then the field value entered by the user will be validated before file upload",
			"typehook"					=> "hide/false",
			"typehook_hint"				=> "if checked, then text suggestions will be shown below the field as the user types more text inside",
			//dropdown properties
			"labelposition"				=> "show/left",
			"labelposition_hint"		=> "select the position of the field&#39;s label; the position is relative to the field",
			"hintposition"				=> "show/right",
			"hintposition_hint"			=> "select the position of the hint that will be shown to notify the user that something is wrong\\r\\nthe position is relative to the field",
			//text properties
			"default"					=> "show/",
			"default_hint"				=> "enter a default value for the field or leave it empty if you do not want a default value",
			"data"						=> "show/",
			"data_label"				=> "List Items",
			"data_hint"					=> "enter a comma delimited list of items",
			"group"						=> "hide/",
			"group_hint"				=> "all items having the same group id belong to the same group",
			"format"					=> "hide/",
			"format_hint"				=> "enter the format of the list",
			//html templates
			"template"					=> '<select id="userdata_[sid]_field_[key]" class="file_userdata_listbox" multiple="multiple" autocomplete="[autocomplete]" value="[default]" onchange="document.getElementById(\'hiddeninput_[sid]_userdata_[key]\').value = this.value;" onfocus="wfu_userdata_focused(this);"><option id="userdata_[sid]_listitem_[key]" style="display:none;"></option></select><input id="userdata_[sid]_props_[key]" type="hidden" value="p:[hintposition]" />',
			"template_testmode"			=> '<select id="userdata_[sid]_field_[key]" class="file_userdata_listbox" multiple="multiple" autocomplete="off" readonly="readonly"><option>Test value</option></select>',
			//javascript mandatory code
			"init_code"					=> 'function wfu_listbox_init() { var data = "[data]"; var items = data.split(","); var f = document.getElementById("userdata_[sid]_field_[key]"); var o = document.getElementById("userdata_[sid]_listitem_[key]"); var def = "[default]"; for (var i = 0; i < items.length; i++) { var o2 = o; if (i > 0) o2 = o.cloneNode(true); o2.value = items[i]; o2.innerHTML = items[i]; o2.selected = (o2.value == def); o2.style.display = "block"; if (i > 0) f.appendChild(o2); } }; wfu_listbox_init(); window["userdata_[sid]_codes_[key]"] = {};',
			"value_code"				=> 'window["userdata_[sid]_codes_[key]"].value = function(field) { return field.value; };',
			"lock_code"					=> 'window["userdata_[sid]_codes_[key]"].lock = function(field) { field.disabled = true; };',
			"unlock_code"				=> 'window["userdata_[sid]_codes_[key]"].unlock = function(field) { field.disabled = false; };',
			"reset_code"				=> 'window["userdata_[sid]_codes_[key]"].reset = function(field, store) { for (var i = 0; i < field.options.length; i++) {field.options[i].checked = (field.options[i].value == "[default]"); if (field.options[i].checked) store.value = field.options[i].value;} };',
			"empty_code"				=> 'window["userdata_[sid]_codes_[key]"].empty = function(field) { return (field.value === "" ? "'.WFU_ERROR_USERDATALIST_NOITEMSELECTED.'" : ""); };',
			//javascript optional code
			"validate_code"				=> "",
			"typehook_code"				=> ""
		),
		array(
			"type"						=> "dropdown",
			"type_description"			=> "Dropdown",
			//checkbox properties
			"required"					=> "show/false",
			"required_hint"				=> "if checked, then an item from the dropdown list must be selected before file upload",
			"donotautocomplete"			=> "show/true",
			"donotautocomplete_hint"	=> "if checked, then the field will not be autocompleted by browsers",
			"validate"					=> "hide/false",
			"validate_hint"				=> "if checked, then the field value entered by the user will be validated before file upload",
			"typehook"					=> "hide/false",
			"typehook_hint"				=> "if checked, then text suggestions will be shown below the field as the user types more text inside",
			//dropdown properties
			"labelposition"				=> "show/left",
			"labelposition_hint"		=> "select the position of the field&#39;s label; the position is relative to the field",
			"hintposition"				=> "show/right",
			"hintposition_hint"			=> "select the position of the hint that will be shown to notify the user that something is wrong\\r\\nthe position is relative to the field",
			//text properties
			"default"					=> "show/",
			"default_hint"				=> "enter a default value for the field or leave it empty if you do not want a default value",
			"data"						=> "show/",
			"data_label"				=> "List Items",
			"data_hint"					=> "enter a comma delimited list of items",
			"group"						=> "hide/",
			"group_hint"				=> "all items having the same group id belong to the same group",
			"format"					=> "hide/",
			"format_hint"				=> "enter the format of the list",
			//html templates
			"template"					=> '<select id="userdata_[sid]_field_[key]" class="file_userdata_dropdown" autocomplete="[autocomplete]" value="[default]" onchange="document.getElementById(\'hiddeninput_[sid]_userdata_[key]\').value = this.value;" onfocus="wfu_userdata_focused(this);"><option id="userdata_[sid]_listitem_[key]" style="display:none;"></option></select><input id="userdata_[sid]_props_[key]" type="hidden" value="p:[hintposition]" />',
			"template_testmode"			=> '<select id="userdata_[sid]_field_[key]" class="file_userdata_dropdown" autocomplete="off" readonly="readonly"><option>Test value</option></select>',
			//javascript mandatory code
			"init_code"					=> 'function wfu_dropdown_init() { var data = "[data]"; var items = data.split(","); var f = document.getElementById("userdata_[sid]_field_[key]"); var o = document.getElementById("userdata_[sid]_listitem_[key]"); var def = "[default]"; for (var i = 0; i < items.length; i++) { var o2 = o.cloneNode(true); o2.value = items[i]; o2.innerHTML = items[i]; o2.selected = (o2.value == def); o2.style.display = "block"; f.appendChild(o2); } }; wfu_dropdown_init(); window["userdata_[sid]_codes_[key]"] = {};',
			"value_code"				=> 'window["userdata_[sid]_codes_[key]"].value = function(field) { return field.value; };',
			"lock_code"					=> 'window["userdata_[sid]_codes_[key]"].lock = function(field) { field.disabled = true; };',
			"unlock_code"				=> 'window["userdata_[sid]_codes_[key]"].unlock = function(field) { field.disabled = false; };',
			"reset_code"				=> 'window["userdata_[sid]_codes_[key]"].reset = function(field, store) { for (var i = 0; i < field.options.length; i++) {field.options[i].selected = (field.options[i].value == "[default]"); if (field.options[i].selected) store.value = field.options[i].value;} };',
			"empty_code"				=> 'window["userdata_[sid]_codes_[key]"].empty = function(field) { return (field.value === "" ? "'.WFU_ERROR_USERDATALIST_NOITEMSELECTED.'" : ""); };',
			//javascript optional code
			"validate_code"				=> "",
			"typehook_code"				=> ""
		)
	);
	
	return $formfields;
}

function wfu_attribute_definitions() {
	$defs = array(
		array(
			"name"		=> "Widget ID",
			"attribute"	=> "widgetid",
			"type"		=> "hidden",
			"listitems"	=> null,
			"value"		=> "",
			"mode"		=> "free",
			"category"	=> "",
			"subcategory"	=> "Basic ",
			"parent"	=> "",
			"dependencies"	=> null,
			"variables"	=> null,
			"help"		=> ""
		),
		array(
			"name"		=> "Plugin ID",
			"attribute"	=> "uploadid",
			"type"		=> "integer",
			"listitems"	=> null,
			"value"		=> WFU_VAR("WFU_UPLOADID"),
			"mode"		=> "free",
			"category"	=> "general",
			"subcategory"	=> "Basic Functionalities",
			"parent"	=> "",
			"dependencies"	=> null,
			"variables"	=> null,
			"help"		=> "The unique id of each shortcode. When you have many shortcodes of this plugin in the same page, then you must use different id for each one."
		),
		array(
			"name"		=> "Single Button Operation",
			"attribute"	=> "singlebutton",
			"type"		=> "onoff",
			"listitems"	=> null,
			"value"		=> WFU_VAR("WFU_SINGLEBUTTON"),
			"mode"		=> "free",
			"category"	=> "general",
			"subcategory"	=> "Basic Functionalities",
			"parent"	=> "",
			"dependencies"	=> array("!uploadbutton"),
			"variables"	=> null,
			"help"		=> "When it is activated, no Upload button will be shown, but upload will start automatically as soon as files are selected."
		),
		array(
			"name"		=> "Upload Path",
			"attribute"	=> "uploadpath",
			"type"		=> "ltext",
			"listitems"	=> null,
			"value"		=> WFU_VAR("WFU_UPLOADPATH"),
			"mode"		=> "free",
			"category"	=> "general",
			"subcategory"	=> "Basic Functionalities",
			"parent"	=> "",
			"dependencies"	=> null,
			"variables"	=> array("%userid%", "%username%", "%blogid%", "%pageid%", "%pagetitle%", "%userdataXXX%"),
			"help"		=> "This is the folder where the files will be uploaded. The path is relative to wp-contents folder of your Wordpress website. The path can be dynamic by including variables such as %username% or %blogid%. Please check Documentation on how to use variables inside uploadpath."
		),
		array(
			"name"		=> "Plugin Fit Mode",
			"attribute"	=> "fitmode",
			"type"		=> "radio",
			"listitems"	=> array("fixed", "responsive"),
			"value"		=> WFU_VAR("WFU_FITMODE"),
			"mode"		=> "free",
			"category"	=> "general",
			"subcategory"	=> "Basic Functionalities",
			"parent"	=> "",
			"dependencies"	=> null,
			"variables"	=> null,
			"help"		=> "This defines how the plugin's elements will fit inside the page/post. If it is set to fixed, then the plugin's element positions will remain fixed no matter the width of the container page/post. If it is set to responsive, then the plugin's elements will wrap to fit the width of the container page/post."
		),
		array(
			"name"		=> "Allow No File",
			"attribute"	=> "allownofile",
			"type"		=> "onoff",
			"listitems"	=> null,
			"value"		=> WFU_VAR("WFU_ALLOWNOFILE"),
			"mode"		=> "free",
			"category"	=> "general",
			"subcategory"	=> "Basic Functionalities",
			"parent"	=> "",
			"dependencies"	=> null,
			"variables"	=> null,
			"help"		=> "when it is activated a user can submit the upload form even if a file is not selected."
		),
		array(
			"name"		=> "Upload Roles",
			"attribute"	=> "uploadrole",
			"type"		=> "rolelist",
			"listitems"	=> array("default_administrator"),
			"value"		=> WFU_VAR("WFU_UPLOADROLE"),
			"mode"		=> "free",
			"category"	=> "general",
			"subcategory"	=> "Filters",
			"parent"	=> "",
			"dependencies"	=> null,
			"variables"	=> null,
			"help"		=> "Defines the categories (roles) of users allowed to upload files. Multiple selections can be made. If 'Select All' is checked, then all logged users can upload files. If 'Include Guests' is checked, then guests (not logged users) can also upload files. Default value is 'all,guests'."
		),
		array(
			"name"		=> "Allowed File Extensions",
			"attribute"	=> "uploadpatterns",
			"type"		=> "text",
			"listitems"	=> null,
			"value"		=> WFU_VAR("WFU_UPLOADPATTERNS"),
			"mode"		=> "free",
			"category"	=> "general",
			"subcategory"	=> "Filters",
			"parent"	=> "",
			"dependencies"	=> null,
			"variables"	=> null,
			"help"		=> "Defines the allowed file extensions. Multiple extentions can be defined, separated with comma (,)."
		),
		array(
			"name"		=> "Allowed File Size",
			"attribute"	=> "maxsize",
			"type"		=> "float",
			"listitems"	=> null,
			"value"		=> WFU_VAR("WFU_MAXSIZE"),
			"mode"		=> "free",
			"category"	=> "general",
			"subcategory"	=> "Filters",
			"parent"	=> "",
			"dependencies"	=> null,
			"variables"	=> null,
			"help"		=> "Defines the allowed file size in MBytes. Files larger than maxsize will not be uploaded. Floating point numbers can be used (e.g. '2.5')."
		),
		array(
			"name"		=> "Create Upload Path",
			"attribute"	=> "createpath",
			"type"		=> "onoff",
			"listitems"	=> null,
			"value"		=> WFU_VAR("WFU_CREATEPATH"),
			"mode"		=> "free",
			"category"	=> "general",
			"subcategory"	=> "Upload Path and Files",
			"parent"	=> "",
			"dependencies"	=> null,
			"variables"	=> null,
			"help"		=> "If activated then the plugin will attempt to create the upload path, if it does not exist."
		),
		array(
			"name"		=> "Do Not Change Filename",
			"attribute"	=> "forcefilename",
			"type"		=> "onoff",
			"listitems"	=> null,
			"value"		=> WFU_VAR("WFU_FORCEFILENAME"),
			"mode"		=> "free",
			"category"	=> "general",
			"subcategory"	=> "Upload Path and Files",
			"parent"	=> "",
			"dependencies"	=> null,
			"variables"	=> null,
			"help"		=> "The plugin by default will modify the filename if it contains invalid or non-english characters. By enabling this attribute the plugin will not change the filename."
		),
		array(
			"name"		=> "Folder Access Method",
			"attribute"	=> "accessmethod",
			"type"		=> "radio",
			"listitems"	=> array("normal", "*ftp"),
			"value"		=> WFU_VAR("WFU_ACCESSMETHOD"),
			"mode"		=> "free",
			"category"	=> "general",
			"subcategory"	=> "Upload Path and Files",
			"parent"	=> "",
			"dependencies"	=> array("ftpinfo", "userftpdomain", "ftppassivemode", "ftpfilepermissions"),
			"variables"	=> null,
			"help"		=> "Some times files cannot be uploaded to the upload folder because of read/write permissions. A workaround is to use ftp to transfer the files, however ftp credentials must be declared, so use carefully and only if necessary."
		),
		array(
			"name"		=> "FTP Access Credentials",
			"attribute"	=> "ftpinfo",
			"type"		=> "ltext",
			"listitems"	=> null,
			"value"		=> WFU_VAR("WFU_FTPINFO"),
			"mode"		=> "free",
			"category"	=> "general",
			"subcategory"	=> "Upload Path and Files",
			"parent"	=> "accessmethod",
			"dependencies"	=> null,
			"variables"	=> null,
			"help"		=> "If FTP access method is selected, then FTP credentials must be declared here, in the form username:password@ftpdomain:port, e.g. myusername:mypass@ftpdomain.com:80. Port can be ommitted. The user can use Secure FTP (sftp) by putting the prefix 's' before the port number, e.g. myusername:mypass@ftpdomain.com:s22."
		),
		array(
			"name"		=> "Use FTP Domain",
			"attribute"	=> "useftpdomain",
			"type"		=> "onoff",
			"listitems"	=> null,
			"value"		=> WFU_VAR("WFU_USEFTPDOMAIN"),
			"mode"		=> "free",
			"category"	=> "general",
			"subcategory"	=> "Upload Path and Files",
			"parent"	=> "accessmethod",
			"dependencies"	=> null,
			"variables"	=> null,
			"help"		=> "If FTP access method is selected, then sometimes the FTP domain is different than the domain of your Wordpress installation. In this case, enable this attribute if upload of files is not successful."
		),
		array(
			"name"		=> "FTP Passive Mode",
			"attribute"	=> "ftppassivemode",
			"type"		=> "onoff",
			"listitems"	=> null,
			"value"		=> WFU_VAR("WFU_FTPPASSIVEMODE"),
			"mode"		=> "free",
			"category"	=> "general",
			"subcategory"	=> "Upload Path and Files",
			"parent"	=> "accessmethod",
			"dependencies"	=> null,
			"variables"	=> null,
			"help"		=> "If files fail to upload to the ftp domain then switching to passive FTP mode may solve the problem."
		),
		array(
			"name"		=> "Permissions of Uploaded File",
			"attribute"	=> "ftpfilepermissions",
			"type"		=> "text",
			"listitems"	=> null,
			"value"		=> WFU_VAR("WFU_FTPFILEPERMISSIONS"),
			"mode"		=> "free",
			"category"	=> "general",
			"subcategory"	=> "Upload Path and Files",
			"parent"	=> "accessmethod",
			"dependencies"	=> null,
			"variables"	=> null,
			"help"		=> "Force the uploaded files to have specific permissions. This is a 4-digit octal number, e.g. 0777. If left empty, then the ftp server will define the permissions."
		),
		array(
			"name"		=> "Show Upload Folder Path",
			"attribute"	=> "showtargetfolder",
			"type"		=> "onoff",
			"listitems"	=> null,
			"value"		=> WFU_VAR("WFU_SHOWTARGETFOLDER"),
			"mode"		=> "free",
			"category"	=> "general",
			"subcategory"	=> "Upload Path and Files",
			"parent"	=> "",
			"dependencies"	=> array("targetfolderlabel"),
			"variables"	=> null,
			"help"		=> "It defines if a label with the upload directory will be shown."
		),
		array(
			"name"		=> "Select Subfolder",
			"attribute"	=> "askforsubfolders",
			"type"		=> "onoff",
			"listitems"	=> null,
			"value"		=> WFU_VAR("WFU_ASKFORSUBFOLDERS"),
			"mode"		=> "free",
			"category"	=> "general",
			"subcategory"	=> "Upload Path and Files",
			"parent"	=> "",
			"dependencies"	=> array("subfoldertree", "subfolderlabel"),
			"variables"	=> null,
			"help"		=> "If enabled then user can select the upload folder from a drop down list. The list is defined in subfoldertree attribute. The folder paths are relative to the path defined in uploadpath."
		),
		array(
			"name"		=> "List of Subfolders",
			"attribute"	=> "subfoldertree",
			"type"		=> "folderlist",
			"listitems"	=> null,
			"value"		=> WFU_VAR("WFU_SUBFOLDERTREE"),
			"mode"		=> "free",
			"category"	=> "general",
			"subcategory"	=> "Upload Path and Files",
			"parent"	=> "askforsubfolders",
			"dependencies"	=> null,
			"variables"	=> null,
			"help"		=> "The list of folders a user can select. Please see documentation on how to create the list of folders. If 'Auto-populate list' is selected, then the list will be filled automatically with the first-level subfolders inside the directory defined by uploadpath. If 'List is editable' is selected, then the user will have the capability to type the subfolder and filter the subfolder list and/or define a new subfolder."
		),
		array(
			"name"		=> "File Duplicates Policy",
			"attribute"	=> "duplicatespolicy",
			"type"		=> "radio",
			"listitems"	=> array("overwrite", "reject", "*maintain both"),
			"value"		=> WFU_VAR("WFU_DUBLICATESPOLICY"),
			"mode"		=> "free",
			"category"	=> "general",
			"subcategory"	=> "Upload Path and Files",
			"parent"	=> "",
			"dependencies"	=> array("uniquepattern"),
			"variables"	=> null,
			"help"		=> "It determines what happens when an uploaded file has the same name with an existing file. The uploaded file can overwrite the existing one, be rejected or both can be kept by renaming the uploaded file according to a rule defined in uniquepattern attribute."
		),
		array(
			"name"		=> "File Rename Rule",
			"attribute"	=> "uniquepattern",
			"type"		=> "radio",
			"listitems"	=> array("index", "datetimestamp"),
			"value"		=> WFU_VAR("WFU_UNIQUEPATTERN"),
			"mode"		=> "free",
			"category"	=> "general",
			"subcategory"	=> "Upload Path and Files",
			"parent"	=> "duplicatespolicy",
			"dependencies"	=> null,
			"variables"	=> null,
			"help"		=> "If duplicatespolicy is set to 'maintain both', then this rule defines how the uploaded file will be renamed, in order not to match an existing file. An incremental index number or a datetime stamp can be included in the uploaded file name to make it unique."
		),
		array(
			"name"		=> "Redirect after Upload",
			"attribute"	=> "redirect",
			"type"		=> "onoff",
			"listitems"	=> null,
			"value"		=> WFU_VAR("WFU_REDIRECT"),
			"mode"		=> "free",
			"category"	=> "general",
			"subcategory"	=> "Redirection",
			"parent"	=> "",
			"dependencies"	=> array("redirectlink"),
			"variables"	=> null,
			"help"		=> "If enabled, the user will be redirected to a url defined in redirectlink attribute upon successful upload of all the files."
		),
		array(
			"name"		=> "Redirection URL",
			"attribute"	=> "redirectlink",
			"type"		=> "ltext",
			"listitems"	=> null,
			"value"		=> WFU_VAR("WFU_REDIRECTLINK"),
			"mode"		=> "free",
			"category"	=> "general",
			"subcategory"	=> "Redirection",
			"parent"	=> "redirect",
			"dependencies"	=> null,
			"variables"	=> array("%filename%", "%username%"),
			"help"		=> "This is the redirect URL. The URL can be dynamic by using variables. Please see Documentation on how to use variables inside attributes."
		),
		array(
			"name"		=> "Show Detailed Admin Messages",
			"attribute"	=> "adminmessages",
			"type"		=> "onoff",
			"listitems"	=> null,
			"value"		=> WFU_VAR("WFU_ADMINMESSAGES"),
			"mode"		=> "free",
			"category"	=> "general",
			"subcategory"	=> "Other Administrator Options",
			"parent"	=> "",
			"dependencies"	=> null,
			"variables"	=> null,
			"help"		=> "If enabled then more detailed messages about upload operations will be shown to administrators for debugging or error detection."
		),
		array(
			"name"		=> "Disable AJAX",
			"attribute"	=> "forceclassic",
			"type"		=> "onoff",
			"listitems"	=> null,
			"value"		=> WFU_VAR("WFU_FORCECLASSIC"),
			"mode"		=> "free",
			"category"	=> "general",
			"subcategory"	=> "Other Administrator Options",
			"parent"	=> "",
			"dependencies"	=> null,
			"variables"	=> null,
			"help"		=> "If AJAX is disabled, then upload of files will be performed using HTML forms, meaning that page will refresh to complete the upload. Use it in case that AJAX is causing problems with your page (although the plugin has an auto-detection feature for checking if user's browser supports AJAX or not)."
		),
		array(
			"name"		=> "Test Mode",
			"attribute"	=> "testmode",
			"type"		=> "onoff",
			"listitems"	=> null,
			"value"		=> WFU_VAR("WFU_TESTMODE"),
			"mode"		=> "free",
			"category"	=> "general",
			"subcategory"	=> "Other Administrator Options",
			"parent"	=> "",
			"dependencies"	=> null,
			"variables"	=> null,
			"help"		=> "If enabled then the plugin will be shown in test mode, meaning that all selected features will be shown but no upload will be possible. Use it to review how the plugin looks like and style it according to your needs."
		),
		array(
			"name"		=> "Debug Mode",
			"attribute"	=> "debugmode",
			"type"		=> "onoff",
			"listitems"	=> null,
			"value"		=> WFU_VAR("WFU_DEBUGMODE"),
			"mode"		=> "free",
			"category"	=> "general",
			"subcategory"	=> "Other Administrator Options",
			"parent"	=> "",
			"dependencies"	=> null,
			"variables"	=> null,
			"help"		=> "If enabled then the plugin will show to administrators any internal PHP warnings and errors generated during the upload process inside the message box."
		),
		array(
			"name"		=> "Plugin Component Positions",
			"attribute"	=> "placements",
			"type"		=> "placements",
			"listitems"	=> null,
			"value"		=> WFU_VAR("WFU_PLACEMENTS"),
			"mode"		=> "free",
			"category"	=> "placements",
			"subcategory"	=> "Plugin Component Positions",
			"parent"	=> "",
			"dependencies"	=> null,
			"variables"	=> null,
			"help"		=> "It defines the positions of the selected plugin components. Drag the components from the right pane and drop them to the left one to define your own component positions."
		),
		array(
			"name"		=> "Plugin Title",
			"attribute"	=> "uploadtitle",
			"type"		=> "text",
			"listitems"	=> null,
			"value"		=> WFU_UPLOADTITLE,
			"mode"		=> "free",
			"category"	=> "labels",
			"subcategory"	=> "Title",
			"parent"	=> "",
			"dependencies"	=> null,
			"variables"	=> null,
			"help"		=> "A text representing the title of the plugin."
		),
		array(
			"name"		=> "Select Button Caption",
			"attribute"	=> "selectbutton",
			"type"		=> "text",
			"listitems"	=> null,
			"value"		=> WFU_SELECTBUTTON,
			"mode"		=> "free",
			"category"	=> "labels",
			"subcategory"	=> "Buttons",
			"parent"	=> "",
			"dependencies"	=> null,
			"variables"	=> null,
			"help"		=> "The caption of the button that selects the files for upload."
		),
		array(
			"name"		=> "Upload Button Caption",
			"attribute"	=> "uploadbutton",
			"type"		=> "text",
			"listitems"	=> null,
			"value"		=> WFU_UPLOADBUTTON,
			"mode"		=> "free",
			"category"	=> "labels",
			"subcategory"	=> "Buttons",
			"parent"	=> "",
			"dependencies"	=> null,
			"variables"	=> null,
			"help"		=> "The caption of the button that starts the upload."
		),
		array(
			"name"		=> "Upload Folder Label",
			"attribute"	=> "targetfolderlabel",
			"type"		=> "text",
			"listitems"	=> null,
			"value"		=> WFU_VAR("WFU_TARGETFOLDERLABEL"),
			"mode"		=> "free",
			"category"	=> "labels",
			"subcategory"	=> "Upload Folder",
			"parent"	=> "",
			"dependencies"	=> null,
			"variables"	=> null,
			"help"		=> "This is the label before the upload folder path, if the path is selected to be shown using the showtargetfolder attribute."
		),
		array(
			"name"		=> "Select Subfolder Label",
			"attribute"	=> "subfolderlabel",
			"type"		=> "text",
			"listitems"	=> null,
			"value"		=> WFU_VAR("WFU_SUBFOLDERLABEL"),
			"mode"		=> "free",
			"category"	=> "labels",
			"subcategory"	=> "Upload Folder",
			"parent"	=> "",
			"dependencies"	=> null,
			"variables"	=> null,
			"help"		=> "This is the label of the subfolder dropdown list. It is active when askforsubfolders attribute is on."
		),
		array(
			"name"		=> "Success Upload Message",
			"attribute"	=> "successmessage",
			"type"		=> "ltext",
			"listitems"	=> null,
			"value"		=> WFU_SUCCESSMESSAGE,
			"mode"		=> "free",
			"category"	=> "labels",
			"subcategory"	=> "Upload Messages",
			"parent"	=> "",
			"dependencies"	=> null,
			"variables"	=> array("%filename%", "%filepath%"),
			"help"		=> "This is the message that will be shown for every file that has been uploaded successfully."
		),
		array(
			"name"		=> "Warning Upload Message",
			"attribute"	=> "warningmessage",
			"type"		=> "ltext",
			"listitems"	=> null,
			"value"		=> WFU_WARNINGMESSAGE,
			"mode"		=> "free",
			"category"	=> "labels",
			"subcategory"	=> "Upload Messages",
			"parent"	=> "",
			"dependencies"	=> null,
			"variables"	=> array("%filename%", "%filepath%"),
			"help"		=> "This is the message that will be shown for every file that has been uploaded with warnings."
		),
		array(
			"name"		=> "Error Upload Message",
			"attribute"	=> "errormessage",
			"type"		=> "ltext",
			"listitems"	=> null,
			"value"		=> WFU_ERRORMESSAGE,
			"mode"		=> "free",
			"category"	=> "labels",
			"subcategory"	=> "Upload Messages",
			"parent"	=> "",
			"dependencies"	=> null,
			"variables"	=> array("%filename%", "%filepath%"),
			"help"		=> "This is the message that will be shown for every file that has failed to upload."
		),
		array(
			"name"		=> "Wait Upload Message",
			"attribute"	=> "waitmessage",
			"type"		=> "ltext",
			"listitems"	=> null,
			"value"		=> WFU_WAITMESSAGE,
			"mode"		=> "free",
			"category"	=> "labels",
			"subcategory"	=> "Upload Messages",
			"parent"	=> "",
			"dependencies"	=> null,
			"variables"	=> array("%filename%", "%filepath%"),
			"help"		=> "This is the message that will be shown while file is uploading."
		),
		array(
			"name"		=> "Upload Media Button Caption",
			"attribute"	=> "uploadmediabutton",
			"type"		=> "text",
			"listitems"	=> null,
			"value"		=> WFU_UPLOADMEDIABUTTON,
			"mode"		=> "free",
			"category"	=> "labels",
			"subcategory"	=> "Webcam Labels",
			"parent"	=> "",
			"dependencies"	=> null,
			"variables"	=> null,
			"help"		=> "The caption of the button that starts the upload when media capture from the webcam has been activated."
		),
		array(
			"name"		=> "Video Filename",
			"attribute"	=> "videoname",
			"type"		=> "text",
			"listitems"	=> null,
			"value"		=> WFU_VIDEONAME,
			"mode"		=> "free",
			"category"	=> "labels",
			"subcategory"	=> "Webcam Labels",
			"parent"	=> "",
			"dependencies"	=> null,
			"variables"	=> array("%userid%", "%username%", "%blogid%", "%pageid%", "%pagetitle%", "%userdataXXX%"),
			"help"		=> "This is the file name of the captured video file."
		),
		array(
			"name"		=> "Image Filename",
			"attribute"	=> "imagename",
			"type"		=> "text",
			"listitems"	=> null,
			"value"		=> WFU_IMAGENAME,
			"mode"		=> "free",
			"category"	=> "labels",
			"subcategory"	=> "Webcam Labels",
			"parent"	=> "",
			"dependencies"	=> null,
			"variables"	=> array("%userid%", "%username%", "%blogid%", "%pageid%", "%pagetitle%", "%userdataXXX%"),
			"help"		=> "This is the file name of the captured image file."
		),
		array(
			"name"		=> "Required Fields Suffix",
			"attribute"	=> "requiredlabel",
			"type"		=> "text",
			"listitems"	=> null,
			"value"		=> WFU_USERDATA_REQUIREDLABEL,
			"mode"		=> "free",
			"category"	=> "labels",
			"subcategory"	=> "Other Labels",
			"parent"	=> "",
			"dependencies"	=> null,
			"variables"	=> null,
			"help"		=> "This is the keyword that shows up next to user field labels in order to denote that they are required."
		),
		array(
			"name"		=> "Notify by Email",
			"attribute"	=> "notify",
			"type"		=> "onoff",
			"listitems"	=> null,
			"value"		=> WFU_VAR("WFU_NOTIFY"),
			"mode"		=> "free",
			"category"	=> "notifications",
			"subcategory"	=> "Email Notifications",
			"parent"	=> "",
			"dependencies"	=> array("notifyrecipients", "notifysubject", "notifymessage", "notifyheaders", "attachfile"),
			"variables"	=> null,
			"help"		=> "If activated then email will be sent to inform about successful file uploads."
		),
		array(
			"name"		=> "Email Recipients",
			"attribute"	=> "notifyrecipients",
			"type"		=> "mtext",
			"listitems"	=> null,
			"value"		=> WFU_VAR("WFU_NOTIFYRECIPIENTS"),
			"mode"		=> "free",
			"category"	=> "notifications",
			"subcategory"	=> "Email Notifications",
			"parent"	=> "notify",
			"dependencies"	=> null,
			"variables"	=> array("%useremail%", "%userdataXXX%", "%n%", "%dq%"),
			"help"		=> "Defines the recipients of the email notification. Can be dynamic by using variables. Please check Documentation on how to use variables in atributes."
		),
		array(
			"name"		=> "Email Headers",
			"attribute"	=> "notifyheaders",
			"type"		=> "mtext",
			"listitems"	=> null,
			"value"		=> WFU_VAR("WFU_NOTIFYHEADERS"),
			"mode"		=> "free",
			"category"	=> "notifications",
			"subcategory"	=> "Email Notifications",
			"parent"	=> "notify",
			"dependencies"	=> null,
			"variables"	=> array("%n%", "%dq%"),
			"help"		=> "Defines additional email headers, in case you want to sent an HTML message, or use Bcc list, or use a different From address and name or other more advanced email options."
		),
		array(
			"name"		=> "Email Subject",
			"attribute"	=> "notifysubject",
			"type"		=> "ltext",
			"listitems"	=> null,
			"value"		=> WFU_NOTIFYSUBJECT,
			"mode"		=> "free",
			"category"	=> "notifications",
			"subcategory"	=> "Email Notifications",
			"parent"	=> "notify",
			"dependencies"	=> null,
			"variables"	=> array("%username%", "%useremail%", "%filename%", "%filepath%", "%blogid%", "%pageid%", "%pagetitle%", "%userdataXXX%", "%dq%"),
			"help"		=> "Defines the email subject. Can be dynamic by using variables. Please check Documentation on how to use variables in atributes."
		),
		array(
			"name"		=> "Email Body",
			"attribute"	=> "notifymessage",
			"type"		=> "mtext",
			"listitems"	=> null,
			"value"		=> WFU_NOTIFYMESSAGE,
			"mode"		=> "free",
			"category"	=> "notifications",
			"subcategory"	=> "Email Notifications",
			"parent"	=> "notify",
			"dependencies"	=> null,
			"variables"	=> array("%username%", "%useremail%", "%filename%", "%filepath%", "%blogid%", "%pageid%", "%pagetitle%", "%userdataXXX%", "%n%", "%dq%"),
			"help"		=> "Defines the email body. Can be dynamic by using variables. Please check Documentation on how to use variables in atributes."
		),
		array(
			"name"		=> "Attach Uploaded Files",
			"attribute"	=> "attachfile",
			"type"		=> "onoff",
			"listitems"	=> null,
			"value"		=> WFU_VAR("WFU_ATTACHFILE"),
			"mode"		=> "free",
			"category"	=> "notifications",
			"subcategory"	=> "Email Notifications",
			"parent"	=> "notify",
			"dependencies"	=> null,
			"variables"	=> null,
			"help"		=> "If activated, then uploaded files will be included in the notification email as attachments. Please use carefully."
		),
		array(
			"name"		=> "Success Upload Message Color",
			"attribute"	=> "successmessagecolor",
			"type"		=> "hidden",
			"listitems"	=> null,
			"value"		=> WFU_SUCCESSMESSAGECOLOR,
			"mode"		=> "free",
			"category"	=> "colors",
			"subcategory"	=> "Upload Message Colors",
			"parent"	=> "",
			"dependencies"	=> null,
			"variables"	=> null,
			"help"		=> "It defines the color of the success message. This attribute has been replaced by successmessagecolors, however it is kept here for backward compatibility."
		),
		array(
			"name"		=> "Success Message Colors",
			"attribute"	=> "successmessagecolors",
			"type"		=> "color-triplet",
			"listitems"	=> null,
			"value"		=> WFU_VAR("WFU_SUCCESSMESSAGECOLORS"),
			"mode"		=> "free",
			"category"	=> "colors",
			"subcategory"	=> "Upload Message Colors",
			"parent"	=> "",
			"dependencies"	=> null,
			"variables"	=> null,
			"help"		=> "It defines the text, background and border color of the success message."
		),
		array(
			"name"		=> "Warning Message Colors",
			"attribute"	=> "warningmessagecolors",
			"type"		=> "color-triplet",
			"listitems"	=> null,
			"value"		=> WFU_VAR("WFU_WARNINGMESSAGECOLORS"),
			"mode"		=> "free",
			"category"	=> "colors",
			"subcategory"	=> "Upload Message Colors",
			"parent"	=> "",
			"dependencies"	=> null,
			"variables"	=> null,
			"help"		=> "It defines the text, background and border color of the warning message."
		),
		array(
			"name"		=> "Fail Message Colors",
			"attribute"	=> "failmessagecolors",
			"type"		=> "color-triplet",
			"listitems"	=> null,
			"value"		=> WFU_VAR("WFU_FAILMESSAGECOLORS"),
			"mode"		=> "free",
			"category"	=> "colors",
			"subcategory"	=> "Upload Message Colors",
			"parent"	=> "",
			"dependencies"	=> null,
			"variables"	=> null,
			"help"		=> "It defines the text, background and border color of the fail (error) message."
		),
		array(
			"name"		=> "Wait Message Colors",
			"attribute"	=> "waitmessagecolors",
			"type"		=> "hidden",
			"listitems"	=> null,
			"value"		=> WFU_VAR("WFU_WAITMESSAGECOLORS"),
			"mode"		=> "free",
			"category"	=> "colors",
			"subcategory"	=> "Upload Message Colors",
			"parent"	=> "",
			"dependencies"	=> null,
			"variables"	=> null,
			"help"		=> "It defines the text, background and border color of the wait message."
		),
		array(
			"name"		=> "Plugin Component Widths",
			"attribute"	=> "widths",
			"type"		=> "dimensions",
			"listitems"	=> null,
			"value"		=> WFU_VAR("WFU_WIDTHS"),
			"mode"		=> "free",
			"category"	=> "dimensions",
			"subcategory"	=> "Plugin Component Widths",
			"parent"	=> "",
			"dependencies"	=> null,
			"variables"	=> null,
			"help"		=> "It defines the widths of the selected plugin components."
		),
		array(
			"name"		=> "Plugin Component Heights",
			"attribute"	=> "heights",
			"type"		=> "dimensions",
			"listitems"	=> null,
			"value"		=> WFU_VAR("WFU_HEIGHTS"),
			"mode"		=> "free",
			"category"	=> "dimensions",
			"subcategory"	=> "Plugin Component Heights",
			"parent"	=> "",
			"dependencies"	=> null,
			"variables"	=> null,
			"help"		=> "It defines the heights of the selected plugin components."
		),
		array(
			"name"		=> "Include Additional Data Fields",
			"attribute"	=> "userdata",
			"type"		=> "onoff",
			"listitems"	=> null,
			"value"		=> WFU_VAR("WFU_USERDATA"),
			"mode"		=> "free",
			"category"	=> "userdata",
			"subcategory"	=> "Additional Data Fields",
			"parent"	=> "",
			"dependencies"	=> array("userdatalabel"),
			"variables"	=> null,
			"help"		=> "If enabled, then user can send additional information together with uploaded files (e.g. name, email etc), defined in userdatalabel attribute."
		),
		array(
			"name"		=> "Additional Data Fields",
			"attribute"	=> "userdatalabel",
			"type"		=> "formfields",
			"listitems"	=> wfu_formfield_definitions(),
			"value"		=> WFU_USERDATALABEL,
			"mode"		=> "free",
			"category"	=> "userdata",
			"subcategory"	=> "Additional Data Fields",
			"parent"	=> "userdata",
			"dependencies"	=> null,
			"variables"	=> null,
			"help"		=> "It defines the labels of the additional data fields and whether they are required or not."
		),
		array(
			"name"		=> "WP Filebase Plugin Connection",
			"attribute"	=> "filebaselink",
			"type"		=> "onoff",
			"listitems"	=> null,
			"value"		=> WFU_VAR("WFU_FILEBASELINK"),
			"mode"		=> "free",
			"category"	=> "interoperability",
			"subcategory"	=> "Connection With Other Plugins",
			"parent"	=> "",
			"dependencies"	=> null,
			"variables"	=> null,
			"help"		=> "If enabled then the WP Filebase Plugin will be informed about new file uploads."
		),
		array(
			"name"		=> "Add Uploaded Files To Media",
			"attribute"	=> "medialink",
			"type"		=> "onoff",
			"listitems"	=> null,
			"value"		=> WFU_VAR("WFU_MEDIALINK"),
			"mode"		=> "free",
			"category"	=> "interoperability",
			"subcategory"	=> "Connection With Other Wordpress Features",
			"parent"	=> "",
			"dependencies"	=> null,
			"variables"	=> null,
			"help"		=> "If enabled then the uploaded files will be added to the Media library of your Wordpress website. Please note that the upload path must be inside the wp-content/uploads directory (which is the default upload path)."
		),
		array(
			"name"		=> "Attach Uploaded Files To Post",
			"attribute"	=> "postlink",
			"type"		=> "onoff",
			"listitems"	=> null,
			"value"		=> WFU_VAR("WFU_POSTLINK"),
			"mode"		=> "free",
			"category"	=> "interoperability",
			"subcategory"	=> "Connection With Other Wordpress Features",
			"parent"	=> "",
			"dependencies"	=> null,
			"variables"	=> null,
			"help"		=> "If enabled then the uploaded files will be added to the current post as attachments. Please note that the upload path must be inside the wp-content/uploads directory (which is the default upload path)."
		),
		array(
			"name"		=> "Enable Webcam",
			"attribute"	=> "webcam",
			"type"		=> "onoff",
			"listitems"	=> null,
			"value"		=> WFU_VAR("WFU_WEBCAM"),
			"mode"		=> "free",
			"category"	=> "webcam",
			"subcategory"	=> "Capture from Webcam (experimental)",
			"parent"	=> "",
			"dependencies"	=> array("webcammode", "audiocapture", "videowidth", "videoheight", "videoaspectratio", "videoframerate", "camerafacing", "maxrecordtime", "uploadmediabutton", "videoname", "imagename"),
			"variables"	=> null,
			"help"		=> "This enables capturing of video or still pictures from the computer's webcam. It is experimental because it is not supported by all browsers yet."
		),
		array(
			"name"		=> "Capture Mode",
			"attribute"	=> "webcammode",
			"type"		=> "radio",
			"listitems"	=> array("capture video", "take photos", "both"),
			"value"		=> WFU_VAR("WFU_WEBCAMMODE"),
			"mode"		=> "free",
			"category"	=> "webcam",
			"subcategory"	=> "Capture from Webcam (experimental)",
			"parent"	=> "webcam",
			"dependencies"	=> null,
			"variables"	=> null,
			"help"		=> "It defines the webcam capture mode. The webcam can either capture video, still photos or both."
		),
		array(
			"name"		=> "Capture Audio",
			"attribute"	=> "audiocapture",
			"type"		=> "onoff",
			"listitems"	=> null,
			"value"		=> WFU_VAR("WFU_AUDIOCAPTURE"),
			"mode"		=> "free",
			"category"	=> "webcam",
			"subcategory"	=> "Capture from Webcam (experimental)",
			"parent"	=> "webcam",
			"dependencies"	=> null,
			"variables"	=> null,
			"help"		=> "It defines whether audio will be captured together with video from the webcam."
		),
		array(
			"name"		=> "Video Width",
			"attribute"	=> "videowidth",
			"type"		=> "text",
			"listitems"	=> null,
			"value"		=> WFU_VAR("WFU_VIDEOWIDTH"),
			"mode"		=> "free",
			"category"	=> "webcam",
			"subcategory"	=> "Capture from Webcam (experimental)",
			"parent"	=> "webcam",
			"dependencies"	=> null,
			"variables"	=> null,
			"help"		=> "It requests a preferable video width for the webcam. The plugin will try to match this setting as close as possible depending on webcam capabilities."
		),
		array(
			"name"		=> "Video Height",
			"attribute"	=> "videoheight",
			"type"		=> "text",
			"listitems"	=> null,
			"value"		=> WFU_VAR("WFU_VIDEOHEIGHT"),
			"mode"		=> "free",
			"category"	=> "webcam",
			"subcategory"	=> "Capture from Webcam (experimental)",
			"parent"	=> "webcam",
			"dependencies"	=> null,
			"variables"	=> null,
			"help"		=> "It requests a preferable video height for the webcam. The plugin will try to match this setting as close as possible depending on webcam capabilities."
		),
		array(
			"name"		=> "Video Aspect Ratio",
			"attribute"	=> "videoaspectratio",
			"type"		=> "text",
			"listitems"	=> null,
			"value"		=> WFU_VAR("WFU_VIDEOASPECTRATIO"),
			"mode"		=> "free",
			"category"	=> "webcam",
			"subcategory"	=> "Capture from Webcam (experimental)",
			"parent"	=> "webcam",
			"dependencies"	=> null,
			"variables"	=> null,
			"help"		=> "It requests a preferable video aspect ratio for the webcam. The plugin will try to match this setting as close as possible depending on webcam capabilities."
		),
		array(
			"name"		=> "Video Frame Rate",
			"attribute"	=> "videoframerate",
			"type"		=> "text",
			"listitems"	=> null,
			"value"		=> WFU_VAR("WFU_VIDEOFRAMERATE"),
			"mode"		=> "free",
			"category"	=> "webcam",
			"subcategory"	=> "Capture from Webcam (experimental)",
			"parent"	=> "webcam",
			"dependencies"	=> null,
			"variables"	=> null,
			"help"		=> "It requests a preferable video frame rate for video recording. The plugin will try to match this setting as close as possible depending on webcam capabilities."
		),
		array(
			"name"		=> "Camera Facing Mode",
			"attribute"	=> "camerafacing",
			"type"		=> "radio",
			"listitems"	=> array("any", "front", "back"),
			"value"		=> WFU_VAR("WFU_CAMERAFACING"),
			"mode"		=> "free",
			"category"	=> "webcam",
			"subcategory"	=> "Capture from Webcam (experimental)",
			"parent"	=> "webcam",
			"dependencies"	=> null,
			"variables"	=> null,
			"help"		=> "It defines if the front or back camera will be preferred (for mobile devices with 2 cameras). The plugin will try to match this setting depending on webcam capabilities."
		),
		array(
			"name"		=> "Max Record Time",
			"attribute"	=> "maxrecordtime",
			"type"		=> "integer",
			"listitems"	=> null,
			"value"		=> WFU_VAR("WFU_MAXRECORDTIME"),
			"mode"		=> "free",
			"category"	=> "webcam",
			"subcategory"	=> "Capture from Webcam (experimental)",
			"parent"	=> "webcam",
			"dependencies"	=> null,
			"variables"	=> null,
			"help"		=> "It defines the maximum time of video recording (in seconds). If it is set to -1, then there is no time limit."
		),
		null
	);

	wfu_array_remove_nulls($defs);
	

	return $defs;
}


?>
