<?php
/**
 * Created by PhpStorm.
 * User: eddie chen
 * Date: 2018/12/31
 * Time: 上午 12:24
 */

namespace App\Http\ViewComposers;
use App\Entities\Merchandise;

class NavComposer
{
    public function compose($view)
    {
        $view->with('cate_1_count', Merchandise::where('category_id','1')->get()->count())
            ->with('cate_2_count', Merchandise::where('category_id','2')->get()->count())
            ->with('cate_3_count', Merchandise::where('category_id','3')->get()->count())
            ->with('cate_4_count', Merchandise::where('category_id','4')->get()->count())
            ->with('cate_5_count', Merchandise::where('category_id','5')->get()->count())
            ->with('cate_6_count', Merchandise::where('category_id','6')->get()->count())
            ->with('cate_7_count', Merchandise::where('category_id','7')->get()->count())
            ->with('cate_8_count', Merchandise::where('category_id','8')->get()->count())
            ->with('cate_9_count', Merchandise::where('category_id','9')->get()->count())
            ->with('cate_10_count', Merchandise::where('category_id','10')->get()->count());

    }
}