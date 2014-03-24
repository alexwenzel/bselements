# Bootstrap Elements for Laravel

This Package helps me with building Bootstrap desinged applications with Laravel.

  * shows error messages in help text
  * automatically repopulates the form elements

## Usage

First register the service provider ``Alexwenzel\Bselements\BselementsServiceProvider`` in ``app/conf/app.php``.

Thats all!

Optional you can register an alias in the same file like the service provider.

## Form elements

### Text

![text](img/text.png)

````
text($id, $label, $attributes = array(), $errors = null)
````

### Text Addon

![text](img/textaddon.png)

````
textAddon($id, $label, $attributes = array(), $errors = null, $addonDirection, $addonContent)
````

``$addonDirection`` can be ``left`` or ``right``

### Select

![text](img/select.png)

````
select($id, $label, array $elements, array $attributes = array(), $errors = null)
````

### Password

![password](img/password.png)

````
password($id, $label, $attributes = array(), $errors = null)
````

### Textarea

![textarea](img/textarea.png)

````
textarea($id, $label, $attributes = array(), $errors = null)
````

### Radio Group

![radio](img/radio.png)

````
radioGroup($id, $label, array $values, $errors = null)
````

### Checkbox Group

![checkbox](img/checkbox.png)

````
checkboxGroup($id, $label, array $values, $errors = null)
````