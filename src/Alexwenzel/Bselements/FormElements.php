<?php namespace Alexwenzel\Bselements;

/**
 * Bootstrap Elements: Form Elements
 *
 * @author 	alexwenzel 	<alexander.wenzel.berlin@gmail.com>
 * @license GPL 2 		<http://www.gnu.de/documents/gpl-2.0.de.html>
 */
class FormElements {

	private function getFirstErrorMessage($errors, $key)
	{
		// TODO: fix this
		if ( $errors !== null && $errors->has($key)) {
			return $errors->first($key);
		}

		return false;
	}

	private function getHelptext($errors, $key)
	{
		// TODO: fix this
		if ( $error = $this->getFirstErrorMessage($errors, $key) ) {
			return '<p class="help-block">'.$error.'</p>';
		}

		return '';
	}

	private function getFormgroupHeader($errors, $key)
	{
		// TODO: fix this
		if ( $error = $this->getFirstErrorMessage($errors, $key) ) {
			return '<div class="form-group has-error">';
		}

		return '<div class="form-group">';
	}

	public function info($label, $text, array $attributes = array())
	{
		// merge with defaults
		$inputAttributes = array_merge(array(
			"class" => "form-control",
		), $attributes);

		$attributesString = '';

		foreach ($inputAttributes as $key => $value) {
			$attributesString .= $key.'="'.$value.'"'; 
		}

		$output  = '<div class="form-group">';
		$output .= \Form::label('', $label);
		$output .= '<div '.$attributesString.'>'.$text.'</div>';
		$output .= '</div>';

		return $output;
	}

	public function text($id, $label, array $attributes = array(), $errors = null)
	{
		// merge with defaults
		$inputAttributes = array_merge(array(
			"class" => "form-control",
		), $attributes);

		$output  = $this->getFormgroupHeader($errors, $id);
		$output .= \Form::label($id, $label);
		$output .= \Form::input('text', $id, null, $inputAttributes);
		$output .= $this->getHelptext($errors, $id);
		$output .= '</div>';

		return $output;
	}

	public function textAddon($id, $label, array $attributes = array(), $errors = null, $addonDirection, $addonContent)
	{
		// merge with defaults
		$inputAttributes = array_merge(array(
			"class" => "form-control",
		), $attributes);

		$output  = $this->getFormgroupHeader($errors, $id);
		$output .= \Form::label($id, $label);
		$output .= '<div class="input-group">';
		if ($addonDirection == 'left') $output .= '<span class="input-group-addon">'.$addonContent.'</span>';
		$output .= \Form::input('text', $id, null, $inputAttributes);
		if ($addonDirection != 'left') $output .= '<span class="input-group-addon">'.$addonContent.'</span>';
		$output .= '</div>';
		$output .= $this->getHelptext($errors, $id);
		$output .= '</div>';

		return $output;
	}

	public function select($id, $label, array $elements, array $attributes = array(), $errors = null)
	{
		// merge with defaults
		$inputAttributes = array_merge(array(
			"class" => "form-control",
		), $attributes);

		$output  = $this->getFormgroupHeader($errors, $id);
		$output .= \Form::label($id, $label);
		$output .= \Form::select($id, $elements, null, $inputAttributes);
		$output .= $this->getHelptext($errors, $id);
		$output .= '</div>';

		return $output;
	}

	public function password($id, $label, array $attributes = array(), $errors = null)
	{
		// merge with defaults
		$inputAttributes = array_merge(array(
			"class" => "form-control",
		), $attributes);

		$output  = $this->getFormgroupHeader($errors, $id);
		$output .= \Form::label($id, $label);
		$output .= \Form::password($id, $inputAttributes);
		$output .= $this->getHelptext($errors, $id);
		$output .= '</div>';

		return $output;
	}

	public function textarea($id, $label, array $attributes = array(), $errors = null)
	{
		// merge with defaults
		$inputAttributes = array_merge(array(
			"class" => "form-control",
		), $attributes);

		$output  = $this->getFormgroupHeader($errors, $id);
		$output .= \Form::label($id, $label);
		$output .= \Form::textarea($id, null, $inputAttributes);
		$output .= $this->getHelptext($errors, $id);
		$output .= '</div>';

		return $output;
	}

	public function radioGroup($id, $label, array $values, $errors = null)
	{
		$output  = $this->getFormgroupHeader($errors, $id);
		$output .= \Form::label($id, $label);

		foreach ($values as $key => $value) {
			$output .= '<div class="radio"><label>'.\Form::radio($id, $key).' '.$value.'</label></div>';
		}

		$output .= $this->getHelptext($errors, $id);
		$output .= '</div>';

		return $output;
	}

	public function checkboxGroup($label, array $values, $errors = null)
	{
		$errorCounter = 0;
		$checkboxes = '';

		foreach ($values as $key => $value) {

			if ( $errorMsg = $this->getFirstErrorMessage($errors, $key) ) {
				$checkboxes .= '<div class="checkbox has-error"><label>'.\Form::checkbox($key, $key).' '.$value.'</label> '.$this->getHelptext($errors, $key).'</div>';
			} else {
				$checkboxes .= '<div class="checkbox"><label>'.\Form::checkbox($key, $key).' '.$value.'</label></div>';
			}

		}

		$output  = '<div class="form-group">';
		$output .= \Form::label('', $label);
		$output .= $checkboxes;
		$output .= '</div>';

		return $output;
	}
}