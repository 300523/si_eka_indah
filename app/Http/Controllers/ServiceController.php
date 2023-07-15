<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class ServiceController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $model = Service::query();

            return DataTables::eloquent($model)
                ->editColumn('action', function ($row) {
                    return '<button class="btn btn-sm btn-warning" onclick="updatejasa(' . $row->id . ')"><i class="fa fa-pencil"></i> Update</button> <button class="btn btn-sm btn-danger" onclick="hapusjasa(' . $row->id . ')"><i class="fa fa-trash"></i> Hapus</button>';
                })
                ->toJson();
        }

        $data = [
            'title' => 'Kelola Jasa | SI Eka Indah',
            'nav' => 'services'
        ];

        return view('backend.service.index', $data);
    }

    public function tampilformtambah(Request $request)
    {
        if (!$request->ajax()) {
            return "<h1>Maaf tidak dapat diproses</h1>";
        }

        $msg = [
            'sukses' => View::make('backend/service/formtambah')->render(),
        ];

        echo json_encode($msg);
    }

    public function simpandata(Request $request)
    {

        if (!$request->ajax()) {
            return "<h1>Maaf tidak dapat diproses</h1>";
        }

        $errors = [];
        $validator = Validator::make($request->all(), [
            'name' => [
                'required',
            ],
            'category' => [
                'required'
            ],
            'size' => [
                'required'
            ],
            'price' => [
                'required'
            ],
        ], [
            'name.required' => 'Nama jasa tidak boleh kosong',
            'category.required' => 'Kategori jasa tidak boleh kosong',
            'size.required' => 'Ukuran jasa tidak boleh kosong',
            'price.required' => 'Harga jasa tidak boleh kosong',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors()->toArray();
        }

        if (!empty($errors)) {
            $msg = [
                'error' => $errors,
            ];
        } else {
            DB::table('services')->insert([
                'name' => $request->input('name'),
                'category' => $request->input('category'),
                'size' => $request->input('size'),
                'price' => $request->input('price'),
            ]);

            $msg = [
                'sukses' => 'Data jasa berhasil tersimpan'
            ];
        }

        echo json_encode($msg);
    }
}
