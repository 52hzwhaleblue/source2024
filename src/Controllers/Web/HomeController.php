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

use Carbon\Carbon;
use Illuminate\Http\Request;
use NINA\Controllers\Controller;
use NINA\Models\PhotoModel;
use NINA\Models\NewsModel;
use NINA\Models\ProductModel;
use NINA\Models\ProductBrandModel;
use NINA\Models\ProductListModel;
use NINA\Models\SettingModel;
use NINA\Models\StaticModel;
use NINA\Models\ProductCatModel;
use NINA\Models\TagsModel;
use NINA\Core\Support\Facades\View;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $lang = $this->lang;

        // Prepare query
        $photoModel = function() use ($lang){
            return PhotoModel::select("name$lang", "desc$lang", "photo", "link", "type")
            ->whereIn("type",[
                'slide',
                'doi-tac',
                'tag-tu-khoa',
            ])
            ->whereRaw("FIND_IN_SET(?, status)", ['hienthi']);
        };
        
        $productListModel = function() use ($lang){
            return ProductListModel::select("name$lang", "desc$lang" , "slug$lang", "photo","banner","type","date_created", "id", "numb")
            ->whereIn("type", [
                'san-pham',
            ])
            ->whereRaw("FIND_IN_SET(?, status)", ['hienthi']);
        };

        $productModel = function() use ($lang){
            return ProductModel::select("name$lang", "desc$lang", "slug$lang", "photo", "regular_price", "sale_price", "discount" ,"type", "date_created")
            ->whereIn("type", [
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
            return NewsModel::select("name$lang", "desc$lang", "slug$lang", "photo","type", "date_created")
            ->whereIn("type", [
                'tieu-chi',
                'cau-hoi-thuong-gap',
                'tai-lieu-ky-thuat',
                'bang-gia-san-pham',
            ])
            ->whereRaw("FIND_IN_SET(?, status)", ['hienthi']);
        };

        $staticModel = function() use ($lang){
            return StaticModel::select("name$lang", "name1$lang" ,"desc$lang","photo", "icon" ,"type", "date_created", "id")
            ->whereIn("type", [

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
        // PhotoModel
        $slider = $photoModel()->where('type','slide')->get();
        $partner = $photoModel()->where('type','doi-tac')->get();
        $tagTuKhoa = $photoModel()->where('type','tag-tu-khoa')->get();


        // StaticModel
        $gioithieu = $staticModel()->where("type","gioi-thieu")->first();
        $gioithieuPhotos = !empty($gioithieu) ?  $gioithieu->getPhotos()->where("type","gioi-thieu")->get() : [];

        // NewsModel
        $criteria = $newsModel()->where("type", "tieu-chi")->get();
        $cauhoithuonggap = $newsModel()->where("type", "cau-hoi-thuong-gap")
        ->whereRaw("FIND_IN_SET(?, status)", ['noibat'])
        ->get();
        $tailieukythuat = $newsModel()->where("type", "tai-lieu-ky-thuat")
        ->whereRaw("FIND_IN_SET(?, status)", ['noibat'])
        ->get(); 
        $banggiasanpham = $newsModel()->where("type", "bang-gia-san-pham")
        ->whereRaw("FIND_IN_SET(?, status)", ['noibat'])
        ->get();                
            
        // ProductListModel
        $productListHot = $productListModel()
            ->where("type","san-pham")
            ->whereRaw("FIND_IN_SET(?,status)", ['noibat'])
            ->orderBy("numb", "asc")
            ->get();

        $producBrandHot = $productBrandModel()            
            ->where('type', 'san-pham')
            ->whereRaw("FIND_IN_SET(?,status)", ['noibat'])
            ->get();
        

        /* SEO */
        $titleMain = SettingModel::pluck('namevi')->first();
        $this->seoPage($titleMain);
        
        return View::share('com', 'trang-chu')->view(
            'home.index',
            compact(
            'slider',
            'criteria',
            'productListHot',
            'producBrandHot',
            'partner',
            'cauhoithuonggap',
            'tailieukythuat',
            'banggiasanpham',
            'tagTuKhoa',
            )
        );
    }

    public function ajaxProduct(Request $request)
    {
        $idl = $request->input('idl') ?? 0;
        $idc = $request->input('idc') ?? 0;
        
        $productList = ProductListModel::select('namevi', 'photo')
        ->where('id', $idl)
        ->where('type', 'san-pham')
        ->first();
        
        $productAjax = ProductModel::select('namevi', 'photo', 'descvi', 'slugvi', 'regular_price', 'sale_price', 'discount', 'id', 'id_list', 'id_cat')
            ->where('type', 'san-pham')
            ->where('id_list',$idl)
            ->where('id_cat',$idc)
            ->whereRaw("FIND_IN_SET(?,status)", ['hienthi'])
            ->whereRaw("FIND_IN_SET(?,status)", ['noibat'])
            ->orderBy('id', 'desc')
            ->limit(10)
            ->get();

        return view('ajax.homeProduct', 
        [
            'productList' => $productList,
            'productAjax' => $productAjax, 
        ]);
    }

}
