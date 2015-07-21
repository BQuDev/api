<?php

class SubCategoriesController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /subcategories
	 *
	 * @return Response
	 */
	public function index()
	{
        $subCategory = new SubCategory();
        $subCategory->name = Request::get('name');
        $subCategory->description = Request::get('description');
        $subCategory->category_id = Request::get('category_id');
        //$category->user_id = Auth::user()->id;

        // Validation and Filtering is sorely needed!!
        // Seriously, I'm a bad person for leaving that out.
        if(Auth::user()->id ==1){
            $subCategory->save();
            return Response::json(array(
                    'error' => false,
                    'categories' => $subCategory->toArray()),
                200
            );
        }else{
            return Response::json(array(
                    'error' => true,
                    'reason' => 'Error with user id'.Auth::user()->id),
                200
            );
        }
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /subcategories/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /subcategories
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /subcategories/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /subcategories/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /subcategories/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /subcategories/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}