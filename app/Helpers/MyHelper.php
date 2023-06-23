<?php

function makeMessages()
{
    $messages = [
        'name.required' => 'El campo nombre es requerido.',
        'email.required' => 'El campo correo electrónico es requerido.',
        'price.required' => 'El campo precio es requerido.',
        'stock.required' => 'El campo stock es requerido.',
        'date.required' => 'El campo fecha es requerido.',
        'date.date' => 'Ingrese una fecha válida.',
        'email.email' => 'Ingrese una dirección de correo electrónico válida.',
        'password.required' => 'El campo contraseña es requerido.',
        'password.min' => 'La contraseña debe tener al menos :min caracteres.',
        'stock.between' => 'El stock debe ser entre 100 y 400 entradas.',
        'quantity.required' => 'El campo cantidad de entradas es requerido.',
        'quantity.min' => 'La cantidad de entradas debe ser mayor o igual a :min.',
        'pay_method.required' => 'El método de pago es requerido.',
        'date_search.required' => 'Ingrese una fecha válida.',

    ];
    return $messages;
}
