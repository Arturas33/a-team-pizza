<?php

namespace App\Http\Controllers;

use App\models\Ingredients;


class IngredientsController extends APIbaseController {

	/**
	 * Display a listing of the resource.
	 * GET /ingridients
	 *
	 * @return Response
	 */
	public function adminIndex()
	{
	    $config = [];

	    $config['list'] = Ingredients::get()->toArray();

	    return view('admin.list', $config);
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /ingridients/create
	 *
	 * @return Response
	 */
	public function adminCreate()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /ingridients
	 *
	 * @return Response
	 */
	public function adminStore()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /ingridients/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function adminShow($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /ingridients/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function adminEdit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /ingridients/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function adminUpdate($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /ingridients/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function adminDestroy($id)
	{
		//
	}

}