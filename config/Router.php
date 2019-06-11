<?php
// Blog router 
$r->addRoute('GET', '/blogs', '\Blog\Controller\BlogController@all');
$r->addRoute('GET', '/blog/{id:\d+}', '\Blog\Controller\BlogController@detail');
$r->addRoute('GET', '/blog/update/{id:\d+}', '\Blog\Controller\BlogController@getUpdateLayout');
$r->addRoute('POST', '/blog', '\Blog\Controller\BlogController@update');
$r->addRoute('PUT', '/blog', '\Blog\Controller\BlogController@insert');
$r->addRoute('DELETE', '/blog', '\Blog\Controller\BlogController@delete');
// Author router 
$r->addRoute('GET','/author','\Blog\Controller\AuthorController@logon');
$r->addRoute('PUT','/author','\Blog\Controller\AuthorController@insert');
$r->addRoute('POST','/author','\Blog\Controller\AuthorController@update');
$r->addRoute('PATCH','/author','\Blog\Controller\AuthorController@login');