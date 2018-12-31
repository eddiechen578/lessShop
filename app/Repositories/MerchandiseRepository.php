<?php


namespace App\Repositories;

use Doctrine\Common\Collections\Collection;
use App\Entities\Merchandise;
use Image;
use File;
use Response;

class MerchandiseRepository
{

protected $merchandise;


public function __construct(Merchandise $merchandise)
{
$this->merchandise = $merchandise;
}

public function addDatas($addDatas){
        $datas = $this->merchandise;

        foreach($addDatas as $key => $addData){
            $datas->$key = $addData;
        }
    $datas->save();
  }

public function categoryItem($category_id){

    $data = $this->merchandise;

    $row_per_page = 10;

    return $data->where('category_id', $category_id)->orderBy('created_at','desc')->paginate($row_per_page);
}


public function edit($id){

    $data = $this->merchandise;

    return $data->find($id);
}

public function update($updateDatas, $id){

    $data=Merchandise::find($id);


    foreach($updateDatas as $key => $updateData){
        $data->$key = $updateData;
    }
    $data->save();

}

public function delPhoto($id){

    $delData=$this->merchandise->find($id);

    if($delData){
        $old_file = parse_url($delData->photo);
        File::delete(public_path($old_file['path']));
    }
}


public function delete($id){

    $data = $this->merchandise;

    return $data->destroy($id);
}

}