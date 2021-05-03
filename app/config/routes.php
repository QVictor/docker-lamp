<?php

return array(

    'product/([0-9]+)' => 'product/view/$1',

    'category/([0-9]+)/page-([0-9]+)' => 'catalog/category/$1/$2',

    'category/([0-9]+)' => 'categories/category/$1',

    'user/register' => 'user/register',

    'cabinet' => 'cabinet/index',

    'user/login' => 'user/login',

    'user/logout' => 'user/logout',

    '' => 'site/index',

    /*'news/([a-z]+)/([0-9]+)' => 'news/view/$1/$2',
    'news/([0-9]+)' => 'news/view/$1',
    'news' => 'news/index',*/
);