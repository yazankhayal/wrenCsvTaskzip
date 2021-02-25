<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ImportData;
use App\ProductData;

class ImportController extends Controller
{
    public function index(){
        return view('index');
    }

    public function get_data(Request $request){
        $columns = array(
            0 => 'id',
            1 => 'strProductCode',
            2 => 'strProductName',
            3 => 'strProductDesc',
            4 => 'dtmAdded',
            5 => 'id',
        );

        $totalData = ProductData::count();
        $totalFiltered = $totalData;

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        $search = $request->input('search.value');

        $posts = ProductData::
        Where('strProductName', 'LIKE', "%{$search}%")
            ->offset($start)
            ->limit($limit)
            ->orderBy('id', 'desc')
            ->orderBy($order, $dir)
            ->get();

        if ($search != null) {
            $totalFiltered = ProductData::
            Where('strProductName', 'LIKE', "%{$search}%")
                ->count();
        }


        $data = array();
        if (!empty($posts)) {
            foreach ($posts as $post) {
                $nestedData['id'] = $post->id;
                $nestedData['strProductName'] = $post->strProductName;
                $nestedData['strProductDesc'] = $post->strProductDesc;
                $nestedData['strProductCode'] = $post->strProductCode;
                $nestedData['dtmAdded'] = $post->dtmAdded;
                $data[] = $nestedData;

            }
        }
        $json_data = array(
            "draw" => intval($request->input('draw')),
            "recordsTotal" => intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data" => $data
        );
        echo json_encode($json_data);
    }

    public function import(Request $request){
        $validator = Validator::make($request->all(),$this->rules());
        if($validator->fails()){
            return redirect()->back()->withInput()->withErrors($validator);
        }
        Excel::import(new ImportData(),request()->file('file'));
        return redirect()->route('index')->with('success','Success Import');
    }

    public function rules(){
        $x = [
            'file' => 'required|file|mimes:csv,txt,xlsx',
        ];
        return $x;
    }
}
