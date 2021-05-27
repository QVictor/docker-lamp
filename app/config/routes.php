<?php

return array(

    'cart/add/([0-9]+)' => 'cart/add/$1',

    'cart/getCountProductsInBasket' => 'cart/GetCountProductsInBasket',

    'product/([0-9]+)' => 'product/view/$1',


    'category/([0-9]+)/page-([0-9]+)' => 'catalog/category/$1/$2',

    'category/([0-9]+)' => 'categories/category/$1',


    'cabinet/edit' => 'cabinet/editUserData',

    'cabinet' => 'cabinet/index',

    'user/register' => 'user/register',

    'user/login' => 'user/login',

    'user/logout' => 'user/logout',

    '' => 'site/index',


    /*'news/([a-z]+)/([0-9]+)' => 'news/view/$1/$2',
    'news/([0-9]+)' => 'news/view/$1',
    'news' => 'news/index',*/
);