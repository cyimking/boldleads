<?php

namespace BoldLeads\Http\Controllers;

use BoldLeads\Http\Requests\Listing\CreateListing;
use BoldLeads\Listing;
use BoldLeads\Repositories\Listing\ListingRepository;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    /**
     * @var ListingRepository
     */
    private $listings;

    /**
     * ListingController constructor.
     *
     * @param ListingRepository $listings
     */
    public function __construct(ListingRepository $listings)
    {
        $this->listings = $listings;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listings = $this->listings->paginate(10);

        return view('listing.list', compact('listings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('listing.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateListing|Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateListing $request)
    {
        $data = $request->all();
        $listing = $this->listings->create($data);

        return redirect()->route('home')
            ->withSuccess(trans('app.listing_created'));
    }

    /**
     * Display the specified resource.
     *
     * @param Listing $listing
     * @return \Illuminate\Http\Response
     */
    public function show(Listing $listing)
    {
        return view('listing.view', compact('listing'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Listing $listing
     * @return \Illuminate\Http\Response
     */
    public function edit(Listing $listing)
    {
        $edit = true;

        return view('listing.view', compact('listing', 'edit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param Listing $listing
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Listing $listing)
    {
        $data = $request->all();
        $this->listings->update($listing, $data);

        return redirect()->back()
            ->withSuccess(trans('app.listing_updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Listing $listing
     * @return \Illuminate\Http\Response
     */
    public function destroy(Listing $listing)
    {
        $this->listings->delete($listing);

        return redirect()->route('home')
            ->withSuccess(trans('app.listing_deleted'));
    }
}
