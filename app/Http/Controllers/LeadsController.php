<?php

namespace BoldLeads\Http\Controllers;

use BoldLeads\Http\Requests\Leads\CreateLead;
use BoldLeads\Lead;
use BoldLeads\Repositories\Lead\LeadRepository;
use Illuminate\Http\Request;

class LeadsController extends Controller
{
    /**
     * @var LeadRepository
     */
    private $leads;

    /**
     * LeadsController constructor.
     *
     * @param LeadRepository $leads
     */
    public function __construct(LeadRepository $leads)
    {
        // We only want the guest to be able to view the form and
        // store the lead information
        $this->middleware('auth')->except(['create', 'store']);
        $this->leads = $leads;
    }

    /**
     * Display a lead of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $leads = $this->leads->paginate(10);

        return view('lead.list', compact('leads'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('lead.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateLead|Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateLead $request)
    {
        $data = $request->all();
        $lead = $this->leads->create($data);

        return redirect()->route('home')
            ->withSuccess(trans('app.lead_created'));
    }

    /**
     * Display the specified resource.
     *
     * @param Lead $lead
     * @return \Illuminate\Http\Response
     */
    public function show(Lead $lead)
    {
        return view('lead.view', compact('lead'));
    }

    //---------------------------------------------------------------
    // TODO - Implement the below resources via Views
    //---------------------------------------------------------------

    /**
     * Show the form for editing the specified resource.
     *
     * @param Lead $lead
     * @return \Illuminate\Http\Response
     */
    public function edit(Lead $lead)
    {
        $edit = true;

        return view('lead.view', compact('lead', 'edit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param Lead $lead
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lead $lead)
    {
        $data = $request->all();
        $this->leads->update($lead, $data);

        return redirect()->back()
            ->withSuccess(trans('app.lead_updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Lead $lead
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lead $lead)
    {
        $this->leads->delete($lead);

        return redirect()->route('home')
            ->withSuccess(trans('app.lead_deleted'));
    }
}
