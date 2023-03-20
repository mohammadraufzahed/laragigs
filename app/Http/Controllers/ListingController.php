<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;

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
}
