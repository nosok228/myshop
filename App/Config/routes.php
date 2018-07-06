<?php

return [
    //uri => controller/action/$arguments
    'category' => 'product/category',

    'product/([0-9]+)' => 'product/product/$1',

    'register' => 'register/registerForm',
    'reg' => 'register/register',
    'activate/(\w)' => 'register/activate/$1', 

    'login' => 'login/login',
    'logout' => 'login/logout',

    'cabinet' => 'account/home',

    'search' => 'product/search',

    'cart' => 'merchant/cart', 

    '' => 'product/index'
    
    
];