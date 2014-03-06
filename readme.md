# Bootstrap Elements for Laravel

This Package helps me with building Bootstrap desinged applications with Laravel.

  * shows error messages in help text
  * automatically repopulates the form elements

## Usage

First register the service provider ``Alexwenzel\Bselements\BselementsServiceProvider`` in ``app.conf/app.php``.

Thats all!

Optional you can register an alias in the same file like the service provider.

## Form elements

### Text

![text](img/text.png)

````
Alexwenzel\Bselements\Form::text($id, $label, $attributes = array(), $errors = null)
````

### Password

![password](img/password.png)

````
Alexwenzel\Bselements\Form::password($id, $label, $attributes = array(), $errors = null)
````

### Textarea

![textarea](img/textarea.png)

````
Alexwenzel\Bselements\Form::textarea($id, $label, $attributes = array(), $errors = null)
````

### Radio Group

![radio](img/radio.png)

````
Alexwenzel\Bselements\Form::radioGroup($id, $label, array $values, $errors = null)
````

### Checkbox Group

![checkbox](img/checkbox.png)

````
Alexwenzel\Bselements\Form::checkboxGroup($id, $label, array $values, $errors = null)
````