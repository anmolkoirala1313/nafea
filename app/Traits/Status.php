<?php

namespace App\Traits;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

trait Status {

    public function statusUpdate(){

        $data['row']       = $this->model->find(request()->id);
        DB::beginTransaction();
        try {
            $data['row']->update(request()->all());
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            Session::flash('error',$this->page.' was not updated. Something went wrong.');
        }
        return response()->json(['id'=>$data['row']->id,'status'=>$data['row']->status]);
    }

}
