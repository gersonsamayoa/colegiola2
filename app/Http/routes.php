<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', ['as'=>'index', function
	() {
    return view('welcome');
}]);

Route::group(['prefix'=>'admin','middleware' => 'auth'], function() {

	Route::get('/', ['as'=>'admin.index', function
	() {
    return view('welcome');
	}]);

	Route::resource('niveles', 'NivelesController');
	Route::get('niveles/{id}/destroy', [
		'uses'	=>'NivelesController@destroy',
		'as' 	=>'admin.niveles.destroy'
		]);

    Route::resource('grados', 'GradosController');
  	Route::get('grados/{id}/destroy', [
  		'uses'	=>'GradosController@destroy',
  		'as' 	=>'admin.grados.destroy'
  		]);

      Route::resource('cursos', 'CursosController');
    	Route::get('cursos/{id}/destroy', [
    		'uses'	=>'CursosController@destroy',
    		'as' 	=>'admin.cursos.destroy'
    		]);

    	Route::get('grados/cursos/{id}', [
    		'uses'	=>	'cursosController@show',
    		'as'	=>	'admin.grados.cursos.show'
    		]);

    	Route::get('grados/curso/{id}', [
    		'uses' 	=>	'cursosController@create',
    		'as'	=>	'admin.cursos.create'
    	]);

		Route::resource('meses', 'MesesController');
		Route::get('meses/{id}/destroy', [
			'uses'	=>'MesesController@destroy',
			'as' 	=>'admin.meses.destroy'
			]);

	Route::resource('usuarios', 'UsersController');
	Route::get('usuarios/{id}/destroy', [
		'uses'	=>'UsersController@destroy',
		'as' 	=>'admin.usuarios.destroy'
		]);

	Route::resource('alumnos', 'AlumnosController');
	Route::get('alumnos/{id}/destroy', [
		'uses'	=>'AlumnosController@destroy',
		'as'	=>'admin.alumnos.destroy'
		]);

		/*Ruta del Js Dropdown*/
  	Route::get('alumnos/create/{id}', 'AlumnosController@getGrados');
		Route::get('alumnos/create2/{id}', 'AlumnosController@getGrados2');

		/*Rutas para listado de calificaciones*/
		Route::get('calificaciones/{id}', [
			'uses'	=>'CalificacionesController@listCalificaciones',
			'as' 	=>'admin.calificaciones.listCalificaciones'
			]);

			Route::post('grabarcalificaciones/{idcurso}', [
				'uses'=>'CalificacionesController@store',
				'as'=>'admin.calificaciones.store'
			]);

			Route::any('actualizar/{idcurso}', [
					'uses'=>'CalificacionesController@update',
					'as'=>'admin.actualizar.update'
				]);


			Route::get('calificaciones/{idalumno}/{cursoid}/destroy', [
					'uses'	=>'CalificacionesController@destroy',
					'as'	=>'admin.calificaciones.destroy'
					]);

					/*Ruta para Boleta de Calificaciones*/

					Route::get('boleta/{idalumno}', [
						'uses' 	=>	'BoletaController@index',
						'as'		=>	'admin.boleta'
					]);

					Route::get('grado/{idgrado}', [
						'uses' 	=>	'BoletaController@BoletaPorGrado',
						'as'		=>	'admin.grados.boleta'
					]);

					/*Ruta para imprimir boleta de calificaciones*/
					Route::get('boleta/imprimir/{idalumno}', [
						'uses'	=> 	'BoletaController@imprimir',
						'as'		=>	'admin.boleta.imprimir'
					]);

					/*Ruta para imprimir boleta de calificaciones por grado*/
					Route::get('grado/imprimir/{idgrado}',[
						'uses'	=>	'BoletaController@ImprimirPorGrado',
						'as'	=>	'admin.grados.imprimir'
					]);

				/*Rutas para listado de Colegiaturas*/

				Route::resource('colegiaturas', 'ColegiaturasController');

				Route::get('colegiaturas/{id}/details', [
				'uses' => 'ColegiaturasController@detalles',
				'as' => 'admin.colegiaturas.detalles'
				]);


				Route::get('colegiaturas/{id}/create', [
				'uses' => 'ColegiaturasController@create',
				'as' => 'admin.colegiaturas.create'
				]);

				Route::get('colegiaturas/{id}/destroy', [
					'uses'	=>'ColegiaturasController@destroy',
					'as'	=>'admin.colegiaturas.destroy'
					]);

				Route::get('colegiaturas/{id}/eliminar', [
					'uses'	=>'ColegiaturasController@eliminar',
					'as'	=>'admin.colegiaturas.eliminar'
					]);

					Route::get('colegiaturas/{id}/consultagrado', [
					'uses' => 'ColegiaturasController@consultagrado',
					'as' => 'admin.colegiaturas.consultagrado'
					]);

					Route::get('colegiaturas/{id}/alumnocolegiatura', [
					'uses'	=>	'ColegiaturasController@alumnocolegiatura',
					'as'	=>	'admin.colegiaturas.alumnocolegiatura'
					]);

				/*Rutas para la Factura*/
					Route::get('pdf/{id}', [
						'uses' 	=>	'PdfsController@index',
						'as'		=>	'admin.pdf'
					]);

});

		Route::get('admin/auth/login',[
				'uses' 	=> 'Auth\AuthController@getLogin',
				'as'	=>	'admin.auth.login'
				]);

			Route::post('admin/auth/login',[
				'uses' 	=> 'Auth\AuthController@postLogin',
				'as'	=>	'admin.auth.login'
				]);


			Route::get('admin/auth/logout',[
				'uses' 	=> 'Auth\AuthController@getLogout',
				'as'	=>	'admin.auth.logout'
				]);
