<?php

require_once '../../private/initialize.php';

use Models\Fields;

$field = new Fields($_DB);


//Bind props to object
$field->name = $_POST['name'];

$field->address = $_POST['address'];

$field->rating = 0;

$field->price = $_POST['price'];


if ($field->create()) {
    $_SESSION['success'] = 'Successfully added field.';
    redirect('/pages/create_game.php');
} else {
    $_SESSION['errors'] = ['failed' => 'Something went wrong.'];
    back();
}
