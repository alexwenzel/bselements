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
		{{ BsForm::useMessageBag($errors) }}
		{{ BsForm::info('Info', 'Infotext', array()) }}
		{{ BsForm::text('text', 'Text') }}
		{{ BsForm::textAddon('left', 'Demo', 'textaddon1', 'Text-Addon') }}
		{{ BsForm::textAddon('right', 'Demo', 'textaddon2', 'Text-Addon') }}
		{{ BsForm::password('password', 'Password') }}
	</div>
	<div class="col-lg-3">
		{{ BsForm::select('select', 'Select', array(''=>'-- Choose --','s1'=>'Select 1','s2'=>'Select 2','s3'=>'Select 3')) }}
		{{ BsForm::textarea('textarea', 'Textarea') }}
	</div>
	<div class="col-lg-3">
		{{ BsForm::radioGroup('radiogroup', 'radioGroup', array('r1'=>'1','r2'=>'2','r3'=>'3')) }}
		{{ BsForm::checkboxGroup('checkboxGroup', array('c1'=>'one','c2'=>'two','c3'=>'three')) }}
	</div>

</div><div class="row">
	<div class="col-lg-12">
		{{ Form::submit('Los', array('class'=>'btn btn-primary')) }}
	</div>
</div></div>
{{ Form::close() }}
</body>
</html>