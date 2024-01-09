<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\Homepage\WelcomeRequest;
use App\Http\Requests\Backend\ServiceRequest;
use App\Http\Requests\Backend\TestimonialRequest;
use App\Http\Requests\Frontend\CustomerInquiryRequest;
use App\Models\Backend\CustomerInquiry;
use App\Models\Backend\Service;
use App\Models\Backend\Testimonial;
use App\Traits\ControllerOps;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class CustomerInquiryController extends BackendBaseController
{
    use ControllerOps;
    protected string $module        = 'backend.';
    protected string $base_route    = 'backend.customer-inquiry.';
    protected string $view_path     = 'backend.customer_inquiry.';
    protected string $page         = 'Customer Inquiry';
    protected string $folder_name   = 'customer_inquiry';
    protected string $page_title, $page_method, $image_path, $file_path;
    protected object $model;


    public function __construct()
    {
        $this->model            = new CustomerInquiry();
    }


    /**
     * Update the specified resource in storage.
     *
     * @param CustomerInquiryRequest $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(CustomerInquiryRequest $request, $id)
    {
        $data['row']       = $this->model->find($id);

        DB::beginTransaction();
        try {
            $data['row']->update($request->all());

            Session::flash('success',$this->page.' was updated successfully');
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            Session::flash('error',$this->page.' was not updated. Something went wrong.');
        }

        return response()->json(route($this->base_route.'index'));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function destroy($id)
    {
        try {
            DB::beginTransaction();

            //deletable without any child values
            $this->model->find($id)->delete();
            DB::commit();
            Session::flash('success',$this->page.' was removed successfully');
        } catch (\Exception $e) {
            Session::flash('error',$this->page.' was not removed as data is already in use.');
        }

        return response()->json(route($this->base_route.'index'));
    }
}
