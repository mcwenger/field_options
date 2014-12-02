<?php
/**
 * field_options
 * Grab options for select, radio and checkboxes fields
 *
 * @author  Mike Wenger <mike@m-wenger.com>
 * @copyright  2014
 */
class Plugin_field_options extends Plugin
{
    /**
     * @return array
     */
    public function pair()
    {
        $field = $this->fetchParam('field', null);
		$field = explode('/',$field);
		$fieldset = $field[0].'.yaml';
		$field = $field[1];
		
		$content = YAML::parse( getcwd().'/_config/fieldsets/'.$fieldset, null );
		$content = $content['fields'][$field]['options'];
		
		if (empty($content)) return false;
		
		$output = '';
		$count = 1;
		$total_options = count($content);
		
		foreach($content as $value=>$label) {
			$data = array();
			$data['value'] = $value;
			$data['label'] = $label;
			$data['total_options'] = $total_options;
			$data['index'] = $count;
			
			$output .= Parse::template($this->content, $data);
			$count ++;
		}

        return $output;
    }
    
    public function name()
    {
        $value = $this->fetchParam('value', null);
        $field = $this->fetchParam('field', null);
		$field = explode('/',$field);
		$fieldset = $field[0].'.yaml';
		$field = $field[1];
		
		$content = YAML::parse( getcwd().'/_config/fieldsets/'.$fieldset, null );
		$content = $content['fields'][$field]['options'];
		
		if (!empty($content[$value])) return $content[$value];
		return false;
    }
}