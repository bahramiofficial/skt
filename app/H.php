<?php

namespace App;

use App\Models\Categoryshop;

class H
{

    public static function uploadImage($file, $path = '/uploads/image/'){

        if ($file && is_file($file))  {
            $imageName = explode('.' ,$file->getClientOriginalName());
            $image = $imageName[0] . "-" . date("Y-m-d-H-m-s", time()) .'.'.$file->getClientOriginalExtension();
            $destinationPath = public_path($path);
            $res  = $file->move($destinationPath,$image);

            if($res)
                return $path .''. $image;

        }
        return false;

    }

    public static function allCategoryShop(){
        return Categoryshop::all();
    }

}
