<?php

class datasetController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */


	public function __construct() {
        # Make sure BaseController construct gets called
        parent::__construct();
    }
   // protected $fillable = array('dbname', 'username', 'password', 'hostname', 'port', 'dbtype');

    // public function search()
    // {
    // 	return "get me!";
    // }
	public function index()
	{
		////flash message not working below?
		//return Redirect::action('datasetController@create')->with('flash_message','Api could not be created bad data. !');

		$query= Input::get('query');
		$datasets = dataset::search($query);

		return View::make('search')->with('query', $query)->with('datasets', $datasets);
		// return Redirect::action('datasetController@create')->with('flash_message', "Fetching APIs..");
	
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		return View::make('dataset_add');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
		Eloquent::unguard(); //unable to save without unguard ?
		$dataset = new dataset();
		$dataset->fill(Input::all());
		$dataset->save();
			//View::make('homepage')
		return Redirect::action('datasetController@index')->with('flash_message','Api created sucessfully !');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
		try
		{
			$dataset = dataset::findOrFail($id);
		}
		catch(exeption $e){
			return Redirect::to('/dataset')->with('flash_message', 'API not found.');
		}

		return View::make('dataset_show')->with('dataset', $dataset);

		

	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
		try
		{
			$dataset = dataset::findOrFail($id);
		}
		catch(exeption $e){
			return Redirect::to('/dataset')->with('flash_message', 'Dataset for API not found.');
		}

		return View::make('dataset_edit')->with('dataset', $dataset);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
		try
		{
			$dataset = dataset::findOrFail(Input::get('id'));
		}
		catch(Exception $e){
			return Redirect::to('/dataset')->with('flash_message', "API $id not found :( ");
		}

		try{
			Eloquent::unguard(); //unable to save without unguard ?
			$dataset->fill(Input::except('_method'));
			$dataset->save();
			return Redirect::action('datasetController@index')->with('flash_message', 'API updated sucessfully ! ');
		}
		catch(Exception $e){
			return Redirect::action('datasetController@index')->with('flash_message', 'Something bad happened :(, error updating API. ');
		}

	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}