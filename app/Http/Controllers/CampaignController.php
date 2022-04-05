<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class CampaignController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::orderBy('name')->get()->pluck('name', 'id');
        return view('campaign.index', compact('category'));
    }

    public function data(Request $request)
    {
        $query = Campaign::orderBy('publish_date', 'desc')->get();

        return datatables($query)
            ->addIndexColumn()
            ->escapeColumns([])
            ->make(true);
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
        $validator = Validator::make($request->all(), [
            'title' => 'required|min:8',
            'categories' => 'required|array',
            'short_description' => 'required',
            'body' => 'required|min:8',
            'publish_date' => 'required|date_format:Y-m-d H:i',
            'status' => 'required|in:publish,archived',
            'goal' => 'required|integer|min:100000',
            'end_date' => 'required|date_format:Y-m-d H:i',
            'note' => 'nullable',
            'receiver' => 'required',
            'path_image' => 'required|mimes:png,jpg,jpeg|max:2048'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $data = $request->except('path_image', 'categories');
        $data['slug'] = Str::slug($request->title);
        $data['path_image'] = upload('campaign', $request->file('path_image'), 'campaign');
        $data['user_id'] = auth()->id();

        $campaign = Campaign::create($data);
        $campaign->category_campaign()->attach($request->categories);

        return response()->json(['data' => $campaign, 'message' => 'Projek berhasil ditambahkan']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Campaign  $campaign
     * @return \Illuminate\Http\Response
     */
    public function show(Campaign $campaign)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Campaign  $campaign
     * @return \Illuminate\Http\Response
     */
    public function edit(Campaign $campaign)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Campaign  $campaign
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Campaign $campaign)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Campaign  $campaign
     * @return \Illuminate\Http\Response
     */
    public function destroy(Campaign $campaign)
    {
        //
    }
}
