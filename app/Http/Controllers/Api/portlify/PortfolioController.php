<?php

namespace App\Http\Controllers\Api\portlify;

use App\Http\Controllers\Controller;
use App\Model\portlify\Portfolio;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    $portfolios = Portfolio::all();
    return response()->json($portfolios);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $validateData = $request->validate([
            'name' => 'required|unique:employees|max:255',
            'email' => 'required',
            'phone' => 'required|unique:employees',

           ]);

           $category = Port::where('name', $postData['category_id'])->first();

           if($request->photo){
               // $image = $request->file('photo')
               $name = time(). '.' .explode('/', explode(':', substr($request->photo, 0, strpos($request->photo, ';')))[1])[1];
               $location = public_path('backend/portfolio');
               Image::make($request->photo)->save($location);
           }
           $post = Post::create([
               'topic' => $request['topic'],
               'body' => $request['body'],
               'category_id' => $category->id,
               'photo' => $name
           ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\portlify\Portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function show(Portfolio $portfolio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\portlify\Portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function edit(Portfolio $portfolio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\portlify\Portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Portfolio $portfolio)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\portlify\Portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Portfolio $portfolio)
    {
        //
    }
}
