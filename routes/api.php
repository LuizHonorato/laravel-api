<?php

$this->group(['prefix' => 'v1'], function(){
		$this->post('auth', 'Auth\AuthApiController@authenticate');
		$this->post('auth-refresh', 'Auth\AuthApiController@refreshToken');

		$this->group(['middleware' => 'jwt.auth'], function(){
			$this->post('products/search', 'Api\v1\ProdutoController@search');
			$this->resource('products', 'Api\v1\ProdutoController', ['except' => ['create', 'edit']]);
			});
});
