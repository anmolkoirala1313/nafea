<?php


namespace App\Http\ViewComposer;

use App\Models\Backend\Menu;
use App\Models\Backend\MenuItem;
use App\Models\Backend\News\Blog;
use App\Models\Backend\Page\Page;
use App\Models\Backend\Setting;
use Illuminate\View\View;


class SensitiveComposer
{
    public function compose(View $view){

        $topNav               = Menu::where('location',1)->first();
        $footerMenu           = Menu::where('location',2)->get();
        $topNavItems          = json_decode(@$topNav->content);
        $footerItem1          = json_decode(@$footerMenu[0]->content);
        $footerItem2          = json_decode(@$footerMenu[1]->content);
        $topNavItems          = @$topNavItems[0];
        $footerItem1          = @$footerItem1[0];
        $footerItem2          = @$footerItem2[0];
        $footerItemTitle1     = @$footerMenu[0]->title;
        $footerItemTitle2     = @$footerMenu[1]->title;
        $pageData             = Page::active()->whereIn('slug',['terms-conditions','terms-and-conditions','privacy-policy','service-agreement'])->pluck('slug')->toArray();

        if(!empty(@$topNavItems)){
            foreach($topNavItems as $menu){
                $menu->title    = MenuItem::where('id',$menu->id)->value('title');
                $menu->name     = MenuItem::where('id',$menu->id)->value('name');
                $menu->slug     = MenuItem::where('id',$menu->id)->value('slug');
                $menu->target   = MenuItem::where('id',$menu->id)->value('target');
                $menu->type     = MenuItem::where('id',$menu->id)->value('type');
                if(!empty($menu->children[0])){
                    foreach ($menu->children[0] as $child) {
                        $child->title = MenuItem::where('id',$child->id)->value('title');
                        $child->name = MenuItem::where('id',$child->id)->value('name');
                        $child->slug = MenuItem::where('id',$child->id)->value('slug');
                        $child->target = MenuItem::where('id',$child->id)->value('target');
                        $child->type = MenuItem::where('id',$child->id)->value('type');
                        if(!empty($child->children[0])){
                            foreach ($child->children[0] as $lastchild) {
                                $lastchild->title = MenuItem::where('id',$lastchild->id)->value('title');
                                $lastchild->name = MenuItem::where('id',$lastchild->id)->value('name');
                                $lastchild->slug = MenuItem::where('id',$lastchild->id)->value('slug');
                                $lastchild->target = MenuItem::where('id',$lastchild->id)->value('target');
                                $lastchild->type = MenuItem::where('id',$lastchild->id)->value('type');
                            }
                        }
                    }
                }
            }
        }

        if(!empty(@$footerItem1)){
            foreach($footerItem1 as $menu1){
                $menu1->title   = MenuItem::where('id',$menu1->id)->value('title');
                $menu1->name    = MenuItem::where('id',$menu1->id)->value('name');
                $menu1->slug    = MenuItem::where('id',$menu1->id)->value('slug');
                $menu1->target  = MenuItem::where('id',$menu1->id)->value('target');
                $menu1->type    = MenuItem::where('id',$menu1->id)->value('type');
            }
        }

        if(!empty(@$footerItem2)){
            foreach($footerItem2 as $menu2){
                $menu2->title   = MenuItem::where('id',$menu2->id)->value('title');
                $menu2->name    = MenuItem::where('id',$menu2->id)->value('name');
                $menu2->slug    = MenuItem::where('id',$menu2->id)->value('slug');
                $menu2->target  = MenuItem::where('id',$menu2->id)->value('target');
                $menu2->type    = MenuItem::where('id',$menu2->id)->value('type');
            }
        }

        $theme_data = Setting::first();
        $blogs   = Blog::active()->latest()->limit(3)->get();

        $view
            ->with('setting_data', $theme_data)
            ->with('footer_nav_data1', $footerItem1)
            ->with('footer_nav_title1', $footerItemTitle1)
            ->with('footer_nav_data2', $footerItem2)
            ->with('footer_nav_title2', $footerItemTitle2)
            ->with('top_nav_data', $topNavItems)
            ->with('footerTopNav', $pageData)
            ->with('latest_blogs', $blogs);
    }
}
