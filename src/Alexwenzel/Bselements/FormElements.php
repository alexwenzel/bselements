<?php namespace Alexwenzel\Bselements;

use \Illuminate\Support\ViewErrorBag;

/**
 * Bootstrap Elements: Form Elements
 *
 * @author 	alexwenzel 	<alexander.wenzel.berlin@gmail.com>
 * @license GPL 2 		<http://www.gnu.de/documents/gpl-2.0.de.html>
 */
class FormElements {

	/**
	 * Validation Messages
	 * @var ViewErrorBag
	 */
	private $ViewErrorBag;

	/**
	 * Construktor
	 */
	public function __construct()
	{
		$this->ViewErrorBag = new ViewErrorBag();
	}

	/**
	 * Reads the first Message from ViewErrorBag if existent
	 * @param  ViewErrorBag $errors
	 * @param  string     $key
	 * @return bool|string
	 */
	private function getFirstErrorMessage(ViewErrorBag $errors, $key)
	{
		if ( $errors->has($key) ) {
			return $errors->first($key);
		}

		return false;
	}

	/**
	 * Returns formated helptext
	 * @param  ViewErrorBag $errors
	 * @param  string     $key
	 * @return string
	 */
	private function formatHelptext(ViewErrorBag $errors, $key)
	{
		if ( $error = $this->getFirstErrorMessage($errors, $key) ) {
			return '<p class="help-block">'.$error.'</p>';
		}

		return '';
	}

	/**
	 * Returns open tag for "formgroup" with error highlight
	 * @param  ViewErrorBag $errors
	 * @param  string     $key
	 * @return string
	 */
	private function formatFormgroupOpen(ViewErrorBag $errors, $key)
	{
		if ( $error = $this->getFirstErrorMessage($errors, $key) ) {
			return '<div class="form-group has-error">';
		}

		return '<div class="form-group">';
	}

	/**
	 * Injects a ViewErrorBag with error/validation messages
	 * @param  ViewErrorBag $errors
	 * @return void
	 */
	public function useViewErrorBag(ViewErrorBag $errors)
	{
		$this->ViewErrorBag = $errors;
	}

	/**
	 * Generates a text input look-alike field, without any functionality
	 * @param  string $label
	 * @param  string $text
	 * @param  array  $attributes
	 * @return string
	 */
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

	/**
	 * Generates a text input element
	 *
	 * @see http://getbootstrap.com/css/#forms-controls
	 *
	 * @param  string $id
	 * @param  string $label
	 * @param  array  $attributes
	 * @return string
	 */
	public function text($id, $label, array $attributes = array())
	{
		// merge with defaults
		$inputAttributes = array_merge(array(
			"class" => "form-control",
		), $attributes);

		$output  = $this->formatFormgroupOpen($this->ViewErrorBag, $id);
		$output .= \Form::label($id, $label);
		$output .= \Form::input('text', $id, null, $inputAttributes);
		$output .= $this->formatHelptext($this->ViewErrorBag, $id);
		$output .= '</div>';

		return $output;
	}

	/**
	 * Generates a text input element with addon
	 *
	 * @see http://getbootstrap.com/components/#input-groups
	 *
	 * @param  string $addonDirection left|right
	 * @param  string $addonContent
	 * @param  string $id
	 * @param  string $label
	 * @param  array  $attributes
	 * @return string
	 */
	public function textAddon($addonDirection, $addonContent, $id, $label, array $attributes = array())
	{
		// merge with defaults
		$inputAttributes = array_merge(array(
			"class" => "form-control",
		), $attributes);

		$output  = $this->formatFormgroupOpen($this->ViewErrorBag, $id);
		$output .= \Form::label($id, $label);
		$output .= '<div class="input-group">';
		if ($addonDirection == 'left') $output .= '<span class="input-group-addon">'.$addonContent.'</span>';
		$output .= \Form::input('text', $id, null, $inputAttributes);
		if ($addonDirection != 'left') $output .= '<span class="input-group-addon">'.$addonContent.'</span>';
		$output .= '</div>';
		$output .= $this->formatHelptext($this->ViewErrorBag, $id);
		$output .= '</div>';

		return $output;
	}

	/**
	 * Generates a file input element
	 *
	 * @see http://getbootstrap.com/css/#forms-controls
	 *
	 * @param  string $id
	 * @param  string $label
	 * @param  array  $attributes
	 * @return string
	 */
	public function file($id, $label, array $attributes = array())
	{
		// merge with defaults
		$inputAttributes = array_merge(array(
			"class" => "form-control",
		), $attributes);

		$output  = $this->formatFormgroupOpen($this->ViewErrorBag, $id);
		$output .= \Form::label($id, $label);
		$output .= \Form::file($id, $inputAttributes);
		$output .= $this->formatHelptext($this->ViewErrorBag, $id);
		$output .= '</div>';

		return $output;
	}

	/**
	 * Generates a select element
	 *
	 * @see http://getbootstrap.com/css/#forms-controls
	 *
	 * @param  string $id
	 * @param  string $label
	 * @param  array  $elements
	 * @param  array  $attributes
	 * @return string
	 */
	public function select($id, $label, array $elements, array $attributes = array())
	{
		// merge with defaults
		$inputAttributes = array_merge(array(
			"class" => "form-control",
		), $attributes);

		$output  = $this->formatFormgroupOpen($this->ViewErrorBag, $id);
		$output .= \Form::label($id, $label);
		$output .= \Form::select($id, $elements, null, $inputAttributes);
		$output .= $this->formatHelptext($this->ViewErrorBag, $id);
		$output .= '</div>';

		return $output;
	}

	/**
	 * Generates a password input element
	 *
	 * @see http://getbootstrap.com/css/#forms-controls
	 *
	 * @param  string $id
	 * @param  string $label
	 * @param  array  $attributes
	 * @return string
	 */
	public function password($id, $label, array $attributes = array())
	{
		// merge with defaults
		$inputAttributes = array_merge(array(
			"class" => "form-control",
		), $attributes);

		$output  = $this->formatFormgroupOpen($this->ViewErrorBag, $id);
		$output .= \Form::label($id, $label);
		$output .= \Form::password($id, $inputAttributes);
		$output .= $this->formatHelptext($this->ViewErrorBag, $id);
		$output .= '</div>';

		return $output;
	}

	/**
	 * Generates a textarea element
	 *
	 * @see http://getbootstrap.com/css/#forms-controls
	 *
	 * @param  string $id
	 * @param  string $label
	 * @param  array  $attributes
	 * @return string
	 */
	public function textarea($id, $label, array $attributes = array())
	{
		// merge with defaults
		$inputAttributes = array_merge(array(
			"class" => "form-control",
		), $attributes);

		$output  = $this->formatFormgroupOpen($this->ViewErrorBag, $id);
		$output .= \Form::label($id, $label);
		$output .= \Form::textarea($id, null, $inputAttributes);
		$output .= $this->formatHelptext($this->ViewErrorBag, $id);
		$output .= '</div>';

		return $output;
	}

	/**
	 * Generates a group of radio elements
	 *
	 * @see http://getbootstrap.com/css/#forms-controls
	 *
	 * @param  string $id
	 * @param  string $label
	 * @param  array  $values
	 * @return string
	 */
	public function radioGroup($id, $label, array $values)
	{
		$output  = $this->formatFormgroupOpen($this->ViewErrorBag, $id);
		$output .= \Form::label($id, $label);

		foreach ($values as $key => $value) {
			$output .= '<div class="radio"><label>'.\Form::radio($id, $key).' '.$value.'</label></div>';
		}

		$output .= $this->formatHelptext($this->ViewErrorBag, $id);
		$output .= '</div>';

		return $output;
	}

	/**
	 * Generates a group of checkbox elements
	 *
	 * @see http://getbootstrap.com/css/#forms-controls
	 *
	 * @param  string $label
	 * @param  array  $values
	 * @return string
	 */
	public function checkboxGroup($label, array $values)
	{
		$errorCounter = 0;
		$checkboxes = '';

		foreach ($values as $key => $value) {

			if ( $errorMsg = $this->getFirstErrorMessage($this->ViewErrorBag, $key) ) {
				$checkboxes .= '<div class="checkbox has-error"><label>'.\Form::checkbox($key, $key).' '.$value.'</label> '.$this->formatHelptext($this->ViewErrorBag, $key).'</div>';
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