<?php

namespace App\Http\Controllers;

use App\FamilyDonationHistory;
use App\Http\Requests\DonationsHistoryValidator;
use App\Http\Requests\FMIRvalidatior;
use App\Repositories\FamiliesMajorInfoRepository;
use App\Responses;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class FamilyDonationHistoryController extends Controller
{
    protected $familyMajorInfoRepo;
    public function __construct(FamiliesMajorInfoRepository $repository)
    {
        $this->familyMajorInfoRepo = $repository;
    }

    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        {
            //
            $data = new FamilyDonationHistory();
            $data->fill($request->all());
            if($data->save())
            {
                return $data;
            }
            return null;
            
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\FamilyDonationHistory  $familyDonationHistory
     * @return \Illuminate\Http\Response
     */
    public function show(FamilyDonationHistory $familyDonationHistory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\FamilyDonationHistory  $familyDonationHistory
     * @return \Illuminate\Http\Response
     */
    public function edit(DonationsHistoryValidator $request)
    {
        //
        $data = $this->familyMajorInfoRepo->edit($request);
        if($data)
        {
            return Responses::success($data);
        }
        return Responses::failure();    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\FamilyDonationHistory  $familyDonationHistory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FamilyDonationHistory $familyDonationHistory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\FamilyDonationHistory  $familyDonationHistory
     * @return \Illuminate\Http\Response
     */
    public function destroy(FamilyDonationHistory $familyDonationHistory)
    {
        //
    }
}
