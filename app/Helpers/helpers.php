<?php

use App\Models\Backend\Menu;
use App\Models\Backend\MenuItem;
use App\Models\Backend\User;
use JetBrains\PhpStorm\Pure;

if (!function_exists('getNepaliMonth')) {
    $selected_month = '';
    function getNepaliMonth($month){
        if($month == '1' || $month == '01'){
            $selected_month = "Baisakh";
        }else if($month == '2' || $month == '02'){
            $selected_month = "Jestha";
        }else if($month == '3' || $month == '03'){
            $selected_month = "Ashar";
        }else if($month== '4' || $month == '04'){
            $selected_month = "Shrawan";
        }else if($month== '5' || $month == '05'){
            $selected_month = "Bhadra";
        }else if($month== '6' || $month == '06'){
            $selected_month = "Ashoj";
        }else if($month== '7' || $month == '07'){
            $selected_month = "Kartik";
        }else if($month== '8' || $month == '08'){
            $selected_month = "Mangsir";
        }else if($month== '9' || $month == '09'){
            $selected_month = "Poush";
        }else if($month== '10'){
            $selected_month = "Magh";
        }else if($month== '11' ){
            $selected_month = "Falgun";
        }else if($month== '12' ){
            $selected_month = "Chaitra";
        }
        return $selected_month;
    }
}

if (!function_exists('greeting_msg')) {
    function greeting_msg(): string
    {
        date_default_timezone_set('Asia/kathmandu');
        $hour      = date('H');
        if ($hour >= 20) {
            $greetings = "Its Night Time";
        } elseif ($hour > 17) {
            $greetings = "Good Evening";
        } elseif ($hour > 11) {
            $greetings = "Good Afternoon";
        } elseif ($hour < 12) {
            $greetings = "Good Morning";
        }
        return $greetings;
    }
}

if (!function_exists('profile_percentage')) {
    function profile_percentage($id): int
    {
        $user       = User::find($id);
        $name       = 20;
        $email      = 20;
        $contact    = 20;
        $image      = 15;
        $gender     = 10;
        $address    = 10;
        $about      = 5;
        $percetage = 0;
        if ($user->name !== null) {
            $percetage += $name;
        }
        if ($user->email !== null) {
            $percetage += $email;
        }
        if ($user->contact !== null) {
            $percetage += $contact;
        }
        if ($user->address !== null) {
            $percetage += $address;
        }
        if ($user->image !== null) {
            $percetage += $image;
        }
        if ($user->gender !== null) {
            $percetage += $gender;
        }
        if ($user->about !== null) {
            $percetage += $about;
        }
        return $percetage;
    }
}


if (!function_exists('get_slugs_to_disable')) {
    /**
     * @param $id
     * @return array
     */
    function get_slugs_to_disable($id): array
    {
        $disable    = [];
        $desiredMenu   = Menu::where('slug',$id)->first();
        $menuitems     = MenuItem::where('menu_id',$desiredMenu->id)->get();
        foreach ($menuitems as $items){
            array_push($disable,$items->slug);
        }
        return $disable;
    }
}

if (!function_exists('get_menu_url')) {
    /**
     * @param $menu_type
     * @param $menu
     * @return string
     */
    function get_menu_url($menu_type, $menu){
        $url    = '#';
        if($menu_type == 'custom'){
            $url = '/'.@$menu->slug;
        }else if($menu_type == 'post'){
            $url = url('blog').'/'.@$menu->slug;
        }else if($menu_type == 'service'){
            $url = url('service').'/'.@$menu->slug;
        } else if($menu_type == 'package') {
            $url = url('activity').'/'.@$menu->slug;
        }
        else{
            $url = url('/').'/'.@$menu->slug;
        }

        return $url;
    }
}

if (!function_exists('elipsis')) {
    /**
     * @param $text
     * @param $words
     * @return string
     */
    function elipsis ($text, $words = 10) {
        // Check if string has more than X words
        if (str_word_count($text) > $words) {

            // Extract first X words from string
            preg_match("/(?:[^\s,\.;\?\!]+(?:[\s,\.;\?\!]+|$)){0,$words}/", $text, $matches);
            $text = trim($matches[0]);

            // Let's check if it ends in a comma or a dot.
            if (substr($text, -1) == ',') {
                // If it's a comma, let's remove it and add a ellipsis
                $text = rtrim($text, ',');
                $text .= '...';
            } else if (substr($text, -1) == '.') {
                // If it's a dot, let's remove it and add a ellipsis (optional)
                $text = rtrim($text, '.');
                $text .= '...';
            } else {
                // Doesn't end in dot or comma, just adding ellipsis here
                $text .= '...';
            }
        }
        // Returns "ellipsed" text, or just the string, if it's less than X words wide.
        return  strip_tags($text);
    }
}

if (!function_exists('get_icons')) {
    /**
     * @param $menu_type
     * @param $menu
     * @return string
     */
    function get_icons($index){
        $icon   = '';
        if($index == 0){
            $icon = 'flaticon-graph';
        }else if($index == 1){
            $icon = 'flaticon-analysis';
        }else if($index == 2){
            $icon = 'flaticon-sports-and-competition';
        }else{
            $icon = 'icon-happy';
        }

        return $icon;
    }
}

if (!function_exists('core_value_icon')) {
    /**
     * @param $index
     * @return string
     */
    function core_value_icon($index): string
    {
        if($index == 0){
            $icon = 'icon-business-advice';
        }else if($index == 1){
            $icon = 'icon-planning';
        }else if($index == 2){
            $icon = 'icon-report';
        }else if($index == 3){
            $icon = 'icon-solution';
        }else if($index == 4){
            $icon = 'icon-diversity';
        }else if($index == 5){
            $icon = 'icon-risk-management';
        }else if($index == 6){
            $icon = 'icon-woman';
        }else if($index == 7){
            $icon = 'icon-risk-management';
        }else{
            $icon = 'icon-icon-years-experience';
        }

        return $icon;
    }
}

if (!function_exists('get_country')) {
    /**
     * @param $code
     * @return string
     */
    function get_country($code): string
    {
        $countries      = CountryState::getCountries();
        $name= '';
        foreach ($countries as $key=>$value){
            if($key == $code){
                $name = $value;
            }
        }
        return $name;

    }
}

if (!function_exists('imagePath')) {
    /**
     * @param $image
     * @return string
     */
    function imagePath($image): string
    {
        return 'storage'.DIRECTORY_SEPARATOR.'images'.DIRECTORY_SEPARATOR.$image;
    }
}

if (!function_exists('filePath')) {
    /**
     * @param $file
     * @return string
     */
    function filePath($file): string
    {
        return 'storage'.DIRECTORY_SEPARATOR.'files'.DIRECTORY_SEPARATOR.$file;
    }
}

if (!function_exists('thumbnailImagePath')) {

    /**
     * @param $image
     * @return string
     */
    function thumbnailImagePath($image): string
    {
        $thumbnail = getThumbImageName($image);

        return 'storage'.DIRECTORY_SEPARATOR.'images'.DIRECTORY_SEPARATOR.$thumbnail;
    }
}

if (!function_exists('galleryImagePath')) {
    /**
     * @param $folder_name
     * @return string
     */
    function galleryImagePath($folder_name): string
    {
        return 'storage'.DIRECTORY_SEPARATOR.'images'.DIRECTORY_SEPARATOR.$folder_name.DIRECTORY_SEPARATOR.'gallery'.DIRECTORY_SEPARATOR;
    }
}

if (!function_exists('get_page_section_icons')) {
    /**
     * @param $value
     * @return string
     */
    function get_page_section_icons($value): string
    {
        $icon   = '';
        if($value == 'basic_section'){
            $icon = ' ri-layout-2-line';
        }else if($value == 'call_to_action'){
            $icon = 'ri-honour-line';
        }else if($value == 'flash_card'){
            $icon = 'ri-file-copy-2-line';
        }else if($value == 'gallery'){
            $icon = 'ri-gallery-line';
        }else if($value == 'faq'){
            $icon = 'ri-question-line';
        }else if($value == 'header_description'){
            $icon = 'ri-price-tag-2-line';
        }else if($value == 'map_description'){
            $icon = 'ri-map-2-line';
        }else if($value == 'slider_list'){
            $icon = 'ri-list-check-2';
        } else if($value == 'small_box_description'){
            $icon = 'ri-inbox-line';
        } else if($value == 'background_image_section'){
            $icon = 'ri-screenshot-2-line';
        } else if($value == 'map_and_description'){
            $icon = 'ri-map-2-line';
        } else if($value == 'document'){
            $icon = 'ri-file-pdf-line';
        }else{
            $icon = 'ri-flag-line';
        }

        return $icon;
    }

if (! function_exists('getYoutubeThumbnail')) {
        /**
         * returns youtube thumbnail based on its link
         *
         * @param  string  $link
         * @return string
         */
        function getYoutubeThumbnail($link)
        {
            $video_id = explode("?v=", $link);
            if (!isset($video_id[1])) {
                $video_id = explode("youtu.be/", $link);
            }
            $youtubeID = $video_id[1];
            if (empty($video_id[1])) {
                $video_id = explode("/v/", $link);
            }
            $video_id       = explode("&", $video_id[1]);
            $youtubeVideoID = $video_id[0];
            return "https://img.youtube.com/vi/".$youtubeVideoID."/hqdefault.jpg";
        }
    }
}

if (!function_exists('get_flash_card_icons')) {
    /**
     * @param $index
     * @return string
     */
    function get_flash_card_icons($index): string
    {
        if ($index == 0) {
            $icon = 'icon-icon-start-ups';
        } else if ($index == 1) {
            $icon = 'icon-icon-successful-project';
        } else if ($index == 2) {
            $icon = 'icon-icon-years-experience';
        } else {
            $icon = 'icon-star-1';
        }

        return $icon;
    }
}

if (! function_exists('getThumbImageName')) {
    /**
     * returns list of flights
     *
     * @param $image
     * @return string
     */
    function getThumbImageName($image): string
    {
        $thumb      = 'thumb_'.substr(strrchr($image, '/'), 1);
        $folder     = substr($image, 0, strrpos($image, '/'));

        return $folder.'/'.$thumb;
    }
}

