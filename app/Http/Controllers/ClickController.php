<?php

namespace App\Http\Controllers;

use App\Models\Click;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ClickController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Click[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Http\Response
     */
    public function index()
    {
        return Click::all();
    }

    public function click(Request $request)
    {
        $data = $request->all();
        $data['user_ip'] = $request->ip();
        $createdClick = Click::create($data);
        return $createdClick;
    }
    public function stats(Request $request)
    {

        $clicksQuery = Click::query();
        if($request->filled('group_by')){

            if($request->group_by == 'created_at')
                $request->group_by = 'CAST(created_at AS DATE)';

            $clicksQuery->select(DB::raw("$request->group_by,COUNT(1) as total_clicks"));

            if($request->filled('campaign_id')){
                $clicksQuery->where('campaign_id','=', $request->campaign_id);
            }
            if($request->filled('link_id')){
                $clicksQuery->where('link_id','=', $request->link_id);
            }
            if($request->filled('user_ip')){
                $clicksQuery->where('user_ip','=', $request->user_ip);
            }
            $clicksQuery->groupBy(DB::raw($request->group_by));
        }

        return $clicksQuery->get();

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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
