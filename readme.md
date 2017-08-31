# Laravel Form Builer

Laravel plugin for quick form creation. 

## Why

You can show validation errors, old input values and form context based on model entity without any line of code. 

And you can redefine all what you want manually.

## Quick example

Your code:

```
{!! Form::create('ArticleController@update', $article) !!}
{!! Form::end() !!}
```

Output:

```
<form method="post" action="/article/1" id="update-article" > 
    <input type="hidden" name="_token" value="P6LpFJ0bZf4s9aKOi8pSoZXTMITDxtRtQ98qF4wZ"> 
    <input type="hidden" name="_method" value="PUT"> 
</form>
```

## How to install

Register the provider (config/app.php):

```
A2design\Form\FormServiceProvider::class,
```

And the alias:

```
'Form' => A2design\Form\FormFacade::class,
```

## Customization

### Parameters

You can specify additional settings as array of parameters:

```
{!! Form::create('', null, [
    'url' => 'http://google.com',
]) !!}

{!! Form::input('', '', [
    'label' => false
]) !!}
```    
    
| Element          | Parameter      | Description                         |
|------------------|----------------|-------------------------------------|
| Common           | class          | Class attribute                     |
|                  | id             | Id attribute. Generated automatically. If you don't need, specify empty string or redefine by id what you want. |
| Form::create     | method         | POST, GET, PUT etc                  |
|                  | absolute       | Absolute path of the method         |
|                  | url            | Use the url instead action argument |
| Form::input      | all-errors     | List all of the validation errors fot the input instead only first |

### Template editing