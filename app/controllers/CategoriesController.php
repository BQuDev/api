<?php

class CategoriesController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /categories
	 *
	 * @return Response
	 */
	public function index()
	{
		//
        $category = Category::all();
        //$category = Category::where('user_id', Auth::user()->id)->get();

        return Response::json(array(
                'error' => false,
                'categories' => $category->toArray()),
            200
        );
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /categories/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /categories
	 *
	 * @return Response
	 */
	public function store()
	{
		//

        $category = new Category();
        $category->name = Request::get('name');
        $category->description = Request::get('description');
        //$category->user_id = Auth::user()->id;

        // Validation and Filtering is sorely needed!!
        // Seriously, I'm a bad person for leaving that out.
        if(Auth::user()->id ==1){
            $category->save();
            return Response::json(array(
                    'error' => false,
                    'categories' => $category->toArray()),
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
	 * Display the specified resource.
	 * GET /categories/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
        // Make sure current user owns the requested resource
       /* $category = Category::where('user_id', Auth::user()->id)
            ->where('id', $id)
            ->take(1)
            ->get();*/
        $category = Category::where('id', $id)
            ->take(1)
            ->get();

        return Response::json(array(
                'error' => false,
                'category' => $category->toArray()),
            200
        );
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /categories/{id}/edit
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
	 * PUT /categories/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
        //$category = Category::where('1','=', Auth::user()->id)->find($id);
        $category = Category::find($id);

        if ( Request::get('name') )
        {
            $category->name = Request::get('name');
        }

        if ( Request::get('description') )
        {
            $category->description = Request::get('description');
        }

        $category->save();

        return Response::json(array(
            'error' => false,
            'message' => 'category updated'),
            200
        );

	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /categories/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
        //$url = Category::where('user_id', Auth::user()->id)->find($id);
        $category = Category::find($id);

        $category->delete();

        return Response::json(array(
                'error' => false,
                'reason' => 'category deleted'),
            200
        );
	}

}