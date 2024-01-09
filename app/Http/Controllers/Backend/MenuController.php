<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\MenuRequest;
use App\Http\Requests\Backend\ServiceRequest;
use App\Models\Backend\Menu;
use App\Models\Backend\MenuItem;
use App\Models\Backend\News\Blog;
use App\Models\Backend\Page\Page;
use App\Models\Backend\Service;
use App\Services\MenuService;
use App\Traits\ControllerOps;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class MenuController extends BackendBaseController
{
    use ControllerOps;
    protected string $module        = 'backend.';
    protected string $base_route    = 'backend.menu.';
    protected string $view_path     = 'backend.menu.';
    protected string $page          = 'Menu';
    protected string $folder_name   = 'menu';
    protected string $page_title, $page_method, $image_path, $file_path;
    protected object $model;
    private MenuService $menuService;


    public function __construct(MenuService $menuService)
    {
        $this->model            = new Menu();
        $this->menuService      = $menuService;
        $this->image_path       = public_path(DIRECTORY_SEPARATOR.'storage'.DIRECTORY_SEPARATOR.'images'.DIRECTORY_SEPARATOR);
    }

    public function getData(){
        $data                = $this->menuService->getMenuStructureData();
        $data['services']    = Service::active()->descending()->get();
        $data['menus']       = Menu::active()->descending()->get();
        $data['pages']       = Page::active()->descending()->get();
        $data['blogs']       = Blog::active()->descending()->get();

        return $data;
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param MenuRequest $request
     * @return RedirectResponse
     */
    public function store(MenuRequest $request)
    {
        DB::beginTransaction();
        try {
            $request->request->add(['created_by' => auth()->user()->id]);
            $request->request->add(['status' => true ]);

            $data = $this->model->create($request->all());
            DB::commit();
            Session::flash('success',$this->page.' was created successfully');
            return redirect()->route($this->base_route.'index');
        } catch (\Exception $e) {
            DB::rollback();
            Session::flash('error',$this->page.'  was not created. Something went wrong.');
            return redirect()->back();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ServiceRequest $request
     * @param int $id
     * @return array
     */
    public function update(ServiceRequest $request, $id)
    {
        $data['row']       = $this->model->find($id);

        return $data;
    }

    public function destroy(Request $request)
    {
        $data['row']   = $this->model->find($request['id']);

        DB::beginTransaction();
        try {
            if($data['row']->menuItems){
                foreach ($data['row']->menuItems as $item){
                    $item->forceDelete();
                }
            }

            $data['row']->forceDelete();
            DB::commit();
            Session::flash('success',$this->page.' was deleted successfully');
        } catch (\Exception $e) {
            DB::rollback();

            Session::flash('error',$this->page.'  was not deleted. Something went wrong.');
        }

        return redirect()->route($this->base_route.'index');
    }

    public function updateMenu(Request $request){

        $status = $this->syncData($request);

        if($status){
            Session::flash('success','Menu Updated Successfully');
        }else{
            Session::flash('error','Menu could not be updated');
        }
    }

    public function addPage(Request $request){
        $menuid     = $request->menuid;
        $ids        = $request->ids;
        $menu       = $this->model->findOrFail($menuid);
        if($menu->content == ''){
            foreach($ids as $id){
                $page = Page::find($id);
                $data =[
                    'title'         => $page->title,
                    'slug'          => $page->slug,
                    'page_id'       => $id,
                    'type'          => 'page',
                    'menu_id'       => $menuid,
                    'created_by'    => Auth::user()->id,
                ];
                $status = MenuItem::create($data);
            }

        }
        else{
            $olddata = json_decode($menu->content,true);
            foreach($ids as $id){
                $page = Page::find($id);
                $data =[
                    'title'         => $page->title,
                    'slug'          => $page->slug,
                    'page_id'       => $id,
                    'type'          => 'page',
                    'menu_id'       => $menuid,
                    'created_by'    => Auth::user()->id,
                ];
                $status = MenuItem::create($data);
            }
            foreach($ids as $id){
                $page = Page::find($id);
                $array['title']         = $page->title;
                $array['slug']          = $page->slug;
                $array['page_id']       = $id;
                $array['type']          = 'page';
                $array['id']            = MenuItem::where('slug',$array['slug'])->where('type',$array['type'])->value('id');
                $array['children']      = [[]];
                array_push($olddata[0],$array);
                $oldata = json_encode($olddata);
                $status = $menu->update(['content'=>$olddata]);
            }
        }
        if($status){
            Session::flash('success','Page added in '.$this->page);
        }else{
            Session::flash('error','Page could not be added in '.$this->page);
        }
    }

    public function addService(Request $request){
        $menuid     = $request->menuid;
        $ids        = $request->ids;
        $menu       = $this->model->findOrFail($menuid);
        if($menu->content == ''){
            foreach($ids as $id){
                $service = Service::find($id);
                $data = [
                    'title'          => $service->title,
                    'slug'           => $service->key,
                    'service_id'     => $id,
                    'type'           => 'service',
                    'menu_id'        => $menuid,
                    'created_by'     => Auth::user()->id,
                ];
                $status = MenuItem::create($data);
            }

        }
        else{
            $olddata = json_decode($menu->content,true);
            foreach($ids as $id){
                $service = Service::find($id);
                $data =[
                    'title'         => $service->title,
                    'slug'          => $service->key,
                    'service_id'    => $id,
                    'type'          => 'service',
                    'menu_id'       => $menuid,
                    'created_by'    => Auth::user()->id,
                ];
                $status = MenuItem::create($data);
            }
            foreach($ids as $id){
                $service = Service::find($id);
                $array['title']         = $service->title;
                $array['slug']          = $service->key;
                $array['service_id']    = $id;
                $array['type']          = 'service';
                $array['id']            = MenuItem::where('slug',$array['slug'])->where('type',$array['type'])->value('id');
                $array['children']      = [[]];
                array_push($olddata[0],$array);
                $status = $menu->update(['content'=>json_encode($olddata)]);
            }
        }
        if($status){
            Session::flash('success','Service added in '.$this->page);
        }else{
            Session::flash('error','Service could not be added in '.$this->page);
        }
    }

    public function addBlog(Request $request){
        $menuid     = $request->menuid;
        $ids        = $request->ids;
        $menu       = $this->model->findOrFail($menuid);
        if($menu->content == null){
            $olddata = [];
            foreach($ids as $id){
                $post = Blog::find($id);
                $data = [
                    'title'          => $post->title,
                    'slug'           => $post->key,
                    'package_id'     => $id,
                    'type'           => 'post',
                    'menu_id'        => $menuid,
                    'created_by'     => Auth::user()->id,
                ];
                $array = [
                    'title'          => $post->title,
                    'slug'           => $post->key,
                    'package_id'     => $id,
                    'type'           => 'post',
                    'id'             => MenuItem::where('slug',$post->key)->where('type','post')->value('id'),
                    'children'       => [[]],
                ];
                array_push($olddata,$array);
                $status = MenuItem::create($data);
            }
//            Session::put('data', $olddata);
        }
        else{
            $olddata = json_decode($menu->content,true);
            foreach($ids as $id){
                $post = Blog::find($id);
                $data =[
                    'title'         => $post->title,
                    'slug'          => $post->key,
                    'package_id'    => $id,
                    'type'          => 'post',
                    'menu_id'       => $menuid,
                    'created_by'    => Auth::user()->id,
                ];
                $status = MenuItem::create($data);
            }
            foreach($ids as $id){
                $post = Blog::find($id);
                $array['title']         = $post->title;
                $array['slug']          = $post->key;
                $array['package_id']    = $id;
                $array['type']          = 'post';
                $array['id']            = MenuItem::where('slug',$array['slug'])->where('type',$array['type'])->value('id');
                $array['children']      = [[]];
                array_push($olddata[0],$array);
                $data_encode = json_encode($olddata);
                $status = $menu->update(['content'=>json_encode($olddata)]);
            }
        }

        if($status){
            Session::flash('success','Blog added in '.$this->page);
        }else{
            Session::flash('error','Blog could not be added in '.$this->page);
        }
    }

    public function syncData($request){
        $menu                   = Menu::findOrFail($request->menuid);
        $content                = $request->data;
        $newdata                = [];
        $newdata['location']    = $request->location ?? $menu->location;
        $newdata['title']       = $request->title ?? $menu->title;
        $newdata['content']     = json_encode($content);
        return $menu->update($newdata);
    }


//    public function addPost(Request $request){
//        $menuid         = $request->menuid;
//        $ids            = $request->ids;
//$menu       = $this->model->findOrFail($menuid);
//        if($menu->content == ''){
//            foreach($ids as $id){
//                $post = Blog::find($id);
//                $data =[
//                    'title'         => $post->title,
//                    'slug'          => $post->slug,
//                    'blog_id'       => $id,
//                    'type'          => 'post',
//                    'menu_id'       => $menuid,
//                    'created_by'    => Auth::user()->id,
//                ];
//                $status  = MenuItem::create($data);
//            }
//        }else{
//            $olddata = json_decode($menu->content,true);
//            foreach($ids as $id){
//                $post = Blog::find($id);
//                $data =[
//                    'title'         => $post->title,
//                    'slug'          => $post->slug,
//                    'blog_id'       => $id,
//                    'type'          => 'post',
//                    'menu_id'       => $menuid,
//                    'created_by'    => Auth::user()->id,
//                ];
//                $status  = MenuItem::create($data);
//            }
//            foreach($ids as $id){
//                $post               = Blog::find($id);
//                $array['title']     = $post->title;
//                $array['slug']      = $post->slug;
//                $array['blog_id']   = $post->id;
//                $array['type']      = 'post';
//                $array['id']        = MenuItem::where('slug',$array['slug'])->where('type',$array['type'])->orderby('id','DESC')->value('id');
//                $array['children']  = [[]];
//                array_push($olddata[0],$array);
//                $status             = $menu->update(['content'=>json_encode($olddata)]);
//            }
//        }
//
//        if($status){
//            Session::flash('success','Blog added in '.$this->page);
//        }else{
//            Session::flash('error','Blog could not be added in '.$this->page);
//        }
//    }

    public function addCustomLink(Request $request){
        $data       = $request->all();
        $menuid     = $request->menuid;
        $menu       = $this->model->findOrFail($menuid);
        if($menu->content == ''){
            $data =[
                'title'         => $request->url_text,
                'slug'          => $request->url,
                'type'          => 'custom',
                'menu_id'       => $menuid,
                'created_by'    => Auth::user()->id,
            ];
            $status = MenuItem::create($data);
        }else{
            $olddata = json_decode($menu->content,true);
            $data =[
                'title'         => $request->url_text,
                'slug'          => $request->url,
                'type'          => 'custom',
                'menu_id'       => $menuid,
                'created_by'    => Auth::user()->id,
            ];
            MenuItem::create($data);
            $array = [];
            $array['title']     = $request->url_text;
            $array['slug']      = $request->url;
            $array['type']      = 'custom';
            $array['id']        = MenuItem::where('slug',$array['slug'])->where('type',$array['type'])->orderby('id','DESC')->value('id');
            $array['children']  = [[]];
            array_push($olddata[0],$array);
            $status = $menu->update(['content'=>json_encode($olddata)]);
        }
        if($status){
            Session::flash('success','Custom link added in '.$this->page);
        }else{
            Session::flash('error','Custom link could not be added in '.$this->page);
        }
    }

    public function updateMenuItem(Request $request){
        $data           = $request->all();
        $target         = $request->input('target');
        $item           = MenuItem::findOrFail($request->id);
        if($target == null){
            $data['target'] = NULL;
        }
        $status         = $item->update($data);
        if($status){
            Session::flash('success','Menu Item Updated Successfully');
        }else{
            Session::flash('error','Menu Item could not be updated');
        }
        return redirect()->back();
    }

    public function deleteMenuItem($id,$key,$in='',$inside=''){
        $menuitem       = MenuItem::findOrFail($id);
        $menus           = $this->model->where('id',$menuitem->menu_id)->first();

        if($menus->content != ''){
            $data       = json_decode($menus->content,true);
            if($in == ''){

                //collecting the inner child ID to remove them from table
                $childarray = array();
                if(array_key_exists('children', $data[0][$key])) {
                    //first child of the main menu (second layer)
                    foreach ($data[0][$key]['children'][0] as $k=>$child){
                        $childarray[] = $child['id'];
                        //looping through that child list to check if it has inner child (third layer)
                        if (array_key_exists('children', $data[0][$key]['children'][0][$k])){
                            //if second layer has children, then looping through them to get its ID
                            foreach ($data[0][$key]['children'][0][$k]['children'][0] as $l=>$inner){
                                $childarray[] = $inner['id'];
                            }
                        }
                    }
                }

                if($childarray){
                    //removing the collected item list ID here
                    foreach ($childarray as $id){
                        $childitem = MenuItem::find($id);
                        $childitem->forceDelete();
                    }
                }

                unset($data[0][$key]);
                //removing the ID from the structure
                $newdata = json_encode($data);
                $menus->update(['content'=>$newdata]);
            }
            else if($inside == ''){

                //checking if the removed menu child item has additional child or not.
                if(array_key_exists('children', $data[0][$key]['children'][0][$in])){
                    //if it does, looping over value to get the menu items ID and keeping it in array to remove them later.
                    foreach ($data[0][$key]['children'][0][$in]['children'][0] as $child) {
                        foreach ($child as $c){
                            $childitem = MenuItem::findOrFail($c);
                            $childitem->forceDelete();
                        }
                    }
                }
                //removing the deleted menu item and its children from the menu content structure
                unset($data[0][$key]['children'][0][$in]);
                $newdata = json_encode($data);
                $menus->update(['content'=>$newdata]);
            }else{
                unset($data[0][$key]['children'][0][$in]['children'][0][$inside]);
                $newdata = json_encode($data);
                $menus->update(['content'=>$newdata]);
            }
        }

        //deleting the menu item here
        $status = $menuitem->forceDelete();
        if($status){
            Session::flash('success','Menu Item Deleted Successfully');

        }else{
            Session::flash('error','Menu Item could not be Deleted');
        }
        return redirect()->back();
    }



}
