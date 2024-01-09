<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Backend\BackendBaseController;
use App\Http\Requests\Frontend\CustomerInquiryRequest;
use App\Mail\ContactDetail;
use App\Models\Backend\CustomerInquiry;
use App\Models\Backend\Setting;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class ContactUsController extends BackendBaseController
{
    protected string $module        = 'frontend.';
    protected string $base_route    = 'frontend.';
    protected string $view_path     = 'frontend.page.';
    protected string $panel         = '';
    protected string $page_title, $page_method, $image_path;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function index()
    {
        $this->page_method      = 'index';
        $this->page_title       = 'Contact us';
        $this->page             = 'Contact';
        $data                   = [];
        $data['setting_data']   = Setting::first();

        return view($this->loadResource($this->view_path.'contact_us'), compact('data'));
    }


    public function contactStore(CustomerInquiryRequest $request)
    {
        $data                   = $request->except(['_token']);
        $data['setting_data']   = Setting::first();
        $data['title']          = 'Contact us response';

        DB::beginTransaction();
        try {
            CustomerInquiry::create($request->all());

            if(!app()->environment('local')){
                Mail::to($data['setting_data']->email)->send(new ContactDetail($data));
            }

            Session::flash('success','Your message was submitted successfully');
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            Session::flash('error','Your message could not relayed at the moment. Something went wrong.');
        }

        return response()->json(route('frontend.contact-us'));
    }

}
