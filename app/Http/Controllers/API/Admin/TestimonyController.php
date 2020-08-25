<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Testimony;

class TestimonyController extends Controller
{
    public function index()
    {
        $testimonies = Testimony::with('user')->paginate(10);
        return response()->json(['testimonies'=>$testimonies]);
    }

    public function show($id)
    {
        $testimony = Testimony::findOrFail($id);
        if($testimony->is_approved == 0)
        {
            $testimony->is_approved = 1;
        }else{
            $testimony->is_approved = 0;
        }
        $testimony->save();

        return response()->json('Approved');
    }
}
