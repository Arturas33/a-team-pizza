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
        $dataFromModel = new Ingredients;
        $config = $this->listBladeData();
        $config['tableName'] = $dataFromModel->getTableName();
        $config['list'] = $dataFromModel->get()->toArray();

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

        $array = Ingredients::find(0);
        $config['item'] = $array->getFillable();
        $config['route'] = 'app.ingredients.create';
        return view('admin.createform', $config);
    }

	/**
	 * Store a newly created resource in storage.
	 * POST /ingridients
	 *
	 * @return Response
	 */
	public function adminStore()
	{
        $config = $this->listBladeData();
        $config['list'] = Ingredients::get()->toArray();
        $data = request()->all();

        Ingredients::create(
            [
                'name' => $data['name'],
                'calories' => $data['calories']
            ]
        );
        return redirect()->route('app.ingredients.index', $config);
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
		$config = [];
		$config['item'] = Ingredients::find($id)->toArray();
		return view('admin.single', $config);
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
        $config = [];
        $config['route'] = 'app.ingredients.edit';
        $config['id'] = $id;
        $config['item'] = Ingredients::find($id)->toArray();
        return view('admin.editform', $config);
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
        $config = $this->listBladeData();
        $config['list'] = Ingredients::get()->toArray();
        $data = request()->all();
        $record = Ingredients::find($id);
        $record->update(
            [
                'name' => $data['name'],
                'calories' => $data['calories']
            ]
        );
        return redirect()->route('app.ingredients.index', $config);
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
        if (Ingredients::destroy($id)){
            return ["success" => true, "id" => $id];
        }
	}

	private function listBladeData() {
        $config = [];
        $config['show'] = 'app.ingredients.show';
        $config['create'] = 'app.ingredients.create';
        $config['delete'] = 'app.ingredients.destroy';
        $config['edit'] = 'app.ingredients.edit';
        return $config;
    }
}