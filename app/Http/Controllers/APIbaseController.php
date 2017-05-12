<?php namespace App\Http\Controllers;

use Illuminate\Routing\Controller;

class APIbaseController extends Controller {

	/**
	 * Display a listing of the resource.
	 * GET /apibase
	 *
	 * @return Response
	 */
	public function apiIndex()
	{
	     return response()->json(['success' => false, 'message' => 'Method not implemented']);
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /apibase
	 *
	 * @return Response
	 */
	public function apiStore()
	{
		 return response()->json(['success' => false, 'message' => 'Method not implemented']);
	}

	/**
	 * Display the specified resource.
	 * GET /apibase/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function apiShow($id)
	{
		 return response()->json(['success' => false, 'message' => 'Method not implemented']);
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /apibase/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function apiUpdate($id)
	{
		 return response()->json(['success' => false, 'message' => 'Method not implemented']);
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /apibase/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function apiDestroy($id)
	{
		 return response()->json(['success' => false, 'message' => 'Method not implemented']);
	}

}