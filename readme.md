# Some Bootstrap Elements for Laravel

This Package helps me with building Bootstrap desinged applications with Laravel.

  * shows first error message in help text
  * automatically repopulates the form elements

Horizontal forms are not supported.

## Usage

First register the service provider ``Alexwenzel\Bselements\BselementsServiceProvider`` in ``app/conf/app.php``.  
Optional you can register an alias in the same file like the service provider.

There is a demo page included in this package. View it by using ``View::make('bselements::demopage')``.

## Form elements

### Info

Generates a text element like looking field, without any functionality.

````php
info($label, $text, array $attributes = array())
````

![info](img/info.png)

### Text

````php
text($id, $label, array $attributes = array(), $errors = null)
````

![text](img/text.png)

### Text Addon

````php
textAddon($id, $label, array $attributes = array(), $errors = null, $addonDirection, $addonContent)
````

``$addonDirection`` can be ``left`` or ``right``

![textaddon](img/textaddon.png)

### Select

````php
select($id, $label, array $elements, array $attributes = array(), $errors = null)
````

![select](img/select.png)

### Password

````php
password($id, $label, array $attributes = array(), $errors = null)
````

![password](img/password.png)

### Textarea

````php
textarea($id, $label, array $attributes = array(), $errors = null)
````

![textarea](img/textarea.png)

### Radio Group

````php
radioGroup($id, $label, array $values, $errors = null)
````

![radio](img/radio.png)

### Checkbox Group

````php
checkboxGroup($label, array $values, $errors = null)
````

![checkbox](img/checkbox.png)