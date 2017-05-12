<?php namespace App\Http\Controllers;

use App\models\Pizzas;
use Illuminate\Routing\Controller;

class PizzasController extends APIbaseController {

	/**
	 * Display a listing of the resource.
	 * GET /pizzas
	 *
	 * @return Response
	 */
	public function index()
	{
        $config = [];
        $config['pizzas'] = Pizzas::get()->toArray();
	    return view('frontend.list', $config);
	}

    /**
     * Display a listing of the resource.
     * GET /pizzas
     *
     * @return Response
     */
    public function adminIndex()
    {
        $config = [];
        $config['pizzas'] = Pizzas::get()->toArray();
        return view('admin.list', $config);
    }


	/**
	 * Show the form for creating a new resource.
	 * GET /pizzas/create
	 *
	 * @return Response
	 */

    public function apiIndex()
    {
        return Pizzas::get()->toArray();
    }


    /**
     * Show the form for creating a new resource.
     * GET /pizzas/create
     *
     * @return Response
     */

	public function create()
    {

    }

    /**
     * Show the form for creating a new resource.
     * GET /pizzas/create
     *
     * @return Response
     */

    public function adminCreate()
    {
        return view('admin');
    }

    /**
     * Show the form for creating a new resource.
     * GET /pizzas/create
     *
     * @return Response
     */

	public function apiCreate()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /pizzas
	 *
	 * @return Response
	 */
	public function store()
{
    //
}

    /**
     * [apiStore description]
     * @return [type] [description]
     */

    public function adminStore()
    {

    }

    /**
     * [apiStore description]
     * @return [type] [description]
     */

	public function apiStore()
	{

	}

	/**
	 * Display the specified resource.
	 * GET /pizzas/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        $config = [];
        $config['pizzas'] = Pizzas::find($id)->toArray();
        return view('frontend.single', $config);
	}

    /**
     * Display the specified resource.
     * GET /pizzas/{id}
     *
     * @param  int  $id
     * @return Response
     */
    public function adminShow($id)
    {
        $config = [];
        $config['pizzas'] = Pizzas::find($id)->toArray();
        return view('admin.single', $config);
    }
	/**
	 * [apiShow description]
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function apiShow($id)
	{

	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /pizzas/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{

	}

	/**
	 * Update the specified resource in storage.
	 * PUT /pizzas/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
    public function adminEdit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     * PUT /pizzas/{id}
     *
     * @param  int  $id
     * @return Response
     */
    public function apiEdit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     * PUT /pizzas/{id}
     *
     * @param  int  $id
     * @return Response
     */

	public function update($id)
	{
		//
	}

    /**
     * [apiUpdate description]
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function adminUpdate($id)
    {
        //
    }
	/**
	 * [apiUpdate description]
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */


	public function apiUpdate($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /pizzas/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

    /**
     * Remove the specified resource from storage.
     * DELETE /pizzas/{id}
     *
     * @param  int  $id
     * @return Response
     */
    public function adminDestroy($id)
    {
        //
    }

	/**
	 * [apiDestroy description]
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function apiDestroy($id)
	{

	}

}