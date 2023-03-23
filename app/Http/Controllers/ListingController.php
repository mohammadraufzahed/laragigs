<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ListingController extends Controller
{
  public function index()
  {
    return view('index', [
      'listings' => Listing::latest()->filter(request(['tag', 'search']))->get(),
    ]);
  }
  public function show(Listing $listing)
  {
    if ($listing)
      return view('show', [
        'listing' => $listing,
      ]);
    else abort(404);
  }

  public function create()
  {
    return view('create');
  }

  public function store(Request $request)
  {
    $formFields = $request->validate([
      'title' => 'required',
      'company' => ['required', Rule::unique('listings', 'company')],
      'location' => 'required',
      'website' => 'required',
      'email' => ['required', 'email', Rule::unique('listings', 'email')],
      'tags' => 'required',
      'description' => 'required'
    ]);
    Listing::create($formFields);
    return redirect('/')->with('message', 'Listing created successfully!');
  }
}
