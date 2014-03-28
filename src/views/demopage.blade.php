<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Bootstrap Helper for Laravel</title>
	<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet">
	<style type="text/css">body{padding-top: 50px;}</style>
</head>
<body>
{{ Form::open(array('url'=>'/post', 'role'=>'form')) }}
<div class="container"><div class="row">

	<div class="col-lg-3">
		{{ Alexwenzel\Bselements\Form::info('Info', 'Infotext', array()) }}
		{{ Alexwenzel\Bselements\Form::text('text', 'Text', array(), $errors) }}
		{{ Alexwenzel\Bselements\Form::textAddon('textaddon1', 'Text-Addon', array(), $errors, 'left', 'Demo') }}
		{{ Alexwenzel\Bselements\Form::textAddon('textaddon2', 'Text-Addon', array(), $errors, 'right', 'Demo') }}
		{{ Alexwenzel\Bselements\Form::password('password', 'Password', array(), $errors) }}
	</div>
	<div class="col-lg-3">
		{{ Alexwenzel\Bselements\Form::select('select', 'Select', array(''=>'-- Choose --','s1'=>'Select 1','s2'=>'Select 2','s3'=>'Select 3'), array(), $errors) }}
		{{ Alexwenzel\Bselements\Form::textarea('textarea', 'Textarea', array(), $errors) }}
	</div>
	<div class="col-lg-3">
		{{ Alexwenzel\Bselements\Form::radioGroup('radiogroup', 'radioGroup', array('r1'=>'1','r2'=>'2','r3'=>'3'), $errors) }}
		{{ Alexwenzel\Bselements\Form::checkboxGroup('checkboxGroup', array('c1'=>'one','c2'=>'two','c3'=>'three'), $errors) }}
	</div>

</div><div class="row">
	<div class="col-lg-12">
		{{ Form::submit('Los', array('class'=>'btn btn-primary')) }}
	</div>
</div></div>
{{ Form::close() }}
</body>
</html>