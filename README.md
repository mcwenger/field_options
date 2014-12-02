# Field Options

Get Statamic field options from a CP field on the front-end.

### Parameters

* field="" // REQUIRED: path to field via fieldset - example: "work/categories"

### Example usage

	<select>
		<option value="">Select One</option>
		{{ field_options:pair field="work/categories" }}
		<option value="{{ value }}">{{ label }}</option>
		{{ /field_options:pair }}
	</select>