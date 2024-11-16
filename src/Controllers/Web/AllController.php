<?php
/******************************************************************************
 * NINA VIỆT NAM
 * Email: nina@nina.vn
 * Website: nina.vn
 * Version: 1.1.1 
 * Date 18-09-2024
 * Đây là tài sản của CÔNG TY TNHH TM DV NINA. Vui lòng không sử dụng khi chưa được phép.
 */

namespace NINA\Controllers\Web;

use NINA\Controllers\Controller;
use NINA\Models\PhotoModel;
use NINA\Models\SettingModel;
use NINA\Models\NewsModel;
use NINA\Models\NewsListModel;
use NINA\Models\StaticModel;
use NINA\Models\ExtensionsModel;
use NINA\Models\ProductListModel;
use NINA\Models\ProductCatModel;
use NINA\Models\ProductItemModel;
use NINA\Models\ProductBrandModel;
use NINA\Core\Container;

class AllController extends Controller
{

    function composer($view): void
    {
        $extHotline = '';

         $lang = $this->lang;

        // Prepare query
        $photoModel = function() use ($lang){
            return PhotoModel::select("name$lang", "desc$lang", "photo", "link", "type")
            ->whereIn("type",[
                'favicon',
                'logo',
                'qc',
            ])
            ->whereRaw("FIND_IN_SET(?, status)", ['hienthi']);
        };
        
        $productListModel = function() use ($lang){
            return ProductListModel::select("name$lang","slug$lang", "photo" ,"type","date_created", "id")
            ->whereIn("type",[
                'san-pham',
            ])
            ->whereRaw("FIND_IN_SET(?, status)", ['hienthi']);
        };

        $productItemModel = function() use ($lang){
            return ProductItemModel::select("name$lang","slug$lang", "photo" ,"type","date_created", "id")
            ->whereIn("type",[
                'san-pham',
            ])
            ->whereRaw("FIND_IN_SET(?, status)", ['hienthi']);
        };        

        $productBrandModel = function() use ($lang){
            return ProductBrandModel::select("*")
            ->whereIn("type", [
                'san-pham',
            ])
            ->whereRaw("FIND_IN_SET(?, status)", ['hienthi']);
        }; 

        $newsModel = function() use ($lang){
            return NewsModel::select("name$lang", "desc$lang", "slug$lang", "photo","type", "date_created", "id")
            ->whereIn("type", [
                'chinh-sach',
            ])
            ->whereRaw("FIND_IN_SET(?, status)", ['hienthi']);
        };

        $newsListModel = function() use ($lang){
            return NewsListModel::select("name$lang", "desc$lang", "slug$lang", "photo","type", "date_created", "id")
            ->whereIn("type", [
                'tin-tuc',
            ])
            ->whereRaw("FIND_IN_SET(?, status)", ['hienthi']);
        };

        $staticModel = function() use ($lang){
            return StaticModel::select("name$lang", "desc$lang","photo" ,"type", "date_created", "id")
            ->whereIn("type", [
                'slogan',
                'footer',
            ])
            ->whereRaw("FIND_IN_SET(?, status)", ['hienthi']);
        };

        $tagModel = function() use ($lang){
            return TagsModel::select("name$lang", "slug$lang", "photo", "type", "id")
            ->whereIn('type',[
                'san-pham',
                'goi-y-hom-nay',
            ])
            ->whereRaw("FIND_IN_SET(?,status)", ['hienthi']);
        };

        // Query
        // Photo Model
        $favicon = $photoModel()->where('type', 'favicon')->first();
        $logo = $photoModel()->where('type', 'logo')->first();
        $social = $photoModel()->where('type', 'social');

        // Product Model
        $productListMenu = $productListModel()->where('type','san-pham')->get();
        $productItem = $productItemModel()->where('type','san-pham')->get();
        
        $producBrand = $productBrandModel()            
        ->where('type', 'san-pham')
        ->get();  

        // News Model
        $policies = $newsModel()->where("type","chinh-sach")->get();

        // NewsList Model
        $newsList = $newsListModel()->where("type","tin-tuc ")->get();

        // Static Model
        $slogan = $staticModel()->where("type","slogan")->first();
        $footer = $staticModel()
            ->where('type', 'footer')
            ->first();

        // Extension
        $extHotline = ExtensionsModel::select('*')
            ->where('type', 'hotline')
            ->first();

        $extSocial = ExtensionsModel::select('*')
            ->where('type', 'social')
            ->whereRaw("FIND_IN_SET(?,status)", ['hienthi'])
            ->first();

        $extPopup = ExtensionsModel::select('*')
            ->where('type', 'popup')
            ->whereRaw("FIND_IN_SET(?,status)", ['hienthi'])
            ->first();

        $setting = SettingModel::first();
        $optSetting = json_decode($setting['options'], true);
        $configType = json_decode(json_encode(config('type')));
        $lang = session()->get('locale');
        $view->share(compact(
            'favicon',
            'logo',
            'social',
            'productListMenu',
            'productItem',
            'producBrand',
            'social',
            'slogan',
            'footer',
            'policies',
            'extHotline',
            'extSocial',
            'extPopup',
            'lang',
            'configType',
            'setting',
            'optSetting',
        ));
    }
}
