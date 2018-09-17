<?php

namespace App\Http\Controllers\review;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Review;
class ReviewsController extends Controller
{

    public function index()
    {
        return view('review.index');//to view
    }


    public function create()
    {
        return view('review.create');
    }


    public function store(Request $request)
    {
        $review = new Review();
        $review->description = $request->description;
        $review->numberOfstars = $request->numberOfstars;
        $review->save();

    }


    public function show($id)
    {
        $review = Review::find($id);
        return $review;
    }


    public function edit($id)
    {
        $review = Review::find($id);
        return view('review.edit')->with('review',$review);
    }


    public function update(Request $request, $id)
    {
        $review = Review::find($id);
        $review->description = $request->description;
        $review->numberOfstars = $request->numberOfstars;
        $review->save();

    }


    public function destroy($id)
    {
        $review = Review::find($id);
        $review->delete();
    }
}