<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ShipDivision;
use App\Models\ShipDistrict;
use App\Models\ShipState;
use Carbon\Carbon;

class ShippingAreaController extends Controller
{
    public function ViewDivisions()
    {
        // division_name
        $shipdivision = ShipDivision::orderBy('id', 'DESC')->get();
        return view('backend.ship.division_view', compact('shipdivision'));
    }

    public function DivisionStore(Request $request)
    {
        ShipDivision::insert([
            'division_name' => $request->division_name,
            'created_at' => Carbon::now()
        ]);
        $notification = array(
            'message' => 'Division inserted successfully.',
            'alert-type' => 'success',
        );

        return redirect()->route('manage-divisions')->with($notification);
    }

    public function DivisionUpdate(Request $request, $id)
    {
        ShipDivision::findOrFail($id)->update([
            'division_name' => $request->division_name,
        ]);

        $notification = array(
            'message' => 'Division Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('manage-divisions')->with($notification);
    }

    public function DivisionDelete($id)
    {
        ShipDivision::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Division Deleted Successfully',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);
    }

    public function ViewDisctricts()
    {
        // district_name
        // division_id
        $shipdistrict = ShipDistrict::with('division')->orderBy('id', 'DESC')->get();
        $shipdivision = ShipDivision::orderBy('division_name', 'ASC')->get();
        return view('backend.ship.district.district_view', compact('shipdistrict', 'shipdivision'));
    }

    public function DisctrictStore(Request $request)
    {
        ShipDistrict::insert([
            'district_name' => $request->district_name,
            'division_id' => $request->division_id,
            'created_at' => Carbon::now()
        ]);
        $notification = array(
            'message' => 'District inserted successfully.',
            'alert-type' => 'success',
        );

        return redirect()->route('manage-district')->with($notification);
    }

    public function DisctrictUpdate(Request $request, $id)
    {
        ShipDistrict::findOrFail($id)->update([
            'district_name' => $request->district_name,
            'division_id' => $request->division_id,
        ]);

        $notification = array(
            'message' => 'District Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('manage-district')->with($notification);
    }

    public function DisctrictDelete($id)
    {
        ShipDistrict::findOrFail($id)->delete();

        $notification = array(
            'message' => 'District Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }


    public function ViewStates()
    {
        // division_id
        // district_id
        // state_name
        $shipdistrict = ShipDistrict::orderBy('id', 'DESC')->get();
        $shipdivision = ShipDivision::orderBy('division_name', 'ASC')->get();
        $shipstate = ShipState::with('division')->with('district')->orderBy('state_name', 'ASC')->get();
        return view('backend.ship.state.state_view', compact('shipdistrict', 'shipdivision', 'shipstate'));
    }

    public function GetDistrict($id)
    {
        $district = ShipDistrict::where('division_id', $id)->orderBy('district_name', 'ASC')->get();
        return json_encode($district);
    }


    public function StateStore(Request $request)
    {
        ShipState::insert([
            'state_name' => $request->state_name,
            'division_id' => $request->division_id,
            'district_id' => $request->district_id,
            'created_at' => Carbon::now()
        ]);
        $notification = array(
            'message' => 'State inserted successfully.',
            'alert-type' => 'success',
        );

        return redirect()->route('manage-state')->with($notification);
    }

    public function StateUpdate(Request $request, $id)
    {
        ShipState::findOrFail($id)->update([
            'state_name' => $request->state_name,
            'division_id' => $request->division_id,
            'district_id' => $request->district_id,
        ]);

        $notification = array(
            'message' => 'State Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('manage-state')->with($notification);
    }

    public function StateDelete($id)
    {
        ShipState::findOrFail($id)->delete();

        $notification = array(
            'message' => 'State Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}
