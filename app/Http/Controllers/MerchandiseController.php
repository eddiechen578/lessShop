<?php

namespace App\Http\Controllers;


use App\Repositories\MerchandiseRepository;
use App\Repositories\CategoryRepository;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Entities\Merchandise;
use Validator;
use Image;
use File;
use Response;
use Cart;


class MerchandiseController extends Controller
{
        protected $merchandRepository,
                $categoryRepository;


        public function __construct(MerchandiseRepository $merchandRepository, CategoryRepository $categoryRepository)
        {
            $this->merchandRepository = $merchandRepository;
            $this->categoryRepository = $categoryRepository;

        }


    /**
     *
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = $this->categoryRepository->getAll();

        return Response::json($category);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->except('token');

        $rule = [
            'name' => [
                'required',
                'max:80',
                ],
            'introduction'=>[
                'required',
                'max:200',
            ],
            'photo'=>[

                'max:10240',
            ],
            'price'=>[
                'required',
                'integer',
                'min:0',
            ],
            'remain_count'=>[
                'required',
                'integer',
                'min:0',
            ],
    ];

        $validate= Validator::make($input,$rule);

        if($validate->fails()){
            return Response::json(['errors' => $validate->errors()]);
        }

        $fileName = null;
        if (request()->hasFile('photo')) {
            $file = request()->file('photo');
            $fileName = time().$file->getClientOriginalName();
            $file->move('uploads/posts', $fileName);
        }



        $addDatas = [
            'name' => $input['name'],
            'introduction' => $input['introduction'],
            'category_id' => $input['category_id'],
            'photo' => 'uploads/posts/'.$fileName,
            'price' => $input['price'],
            'remain_count' => $input['remain_count'],
        ];

        $this->merchandRepository->addDatas($addDatas);

        $data= [
            'status' => '1',
        ];
        return Response::json($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Entities\Merchandise  $merchandise
     * @return \Illuminate\Http\Response
     */
    public function show(Merchandise $merchandise)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Entities\Merchandise  $merchandise
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = $this->merchandRepository->edit($id);
        $category = $this->categoryRepository->getAll();
        return Response::json(array('data' => $data, 'category' => $category));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Entities\Merchandise  $merchandise
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $input = $request->except('_token');

        if ($request->hasFile('photo'))
        {
            $this->merchandRepository->delPhoto($id);
            $file = $request->file('photo');
            $name = time().$file->getClientOriginalName();
            $file->move('uploads/posts', $name);
        }

        $updateDatas = [
            'name' => $input['name'],
            'introduction' => $input['introduction'],
            'category_id' => $input['category_id'],
            'photo' => 'uploads/posts/'.$name,
            'price' => $input['price'],
            'remain_count' => $input['remain_count']
        ];

        $this->merchandRepository->update($updateDatas, $id);

        $data= [
            'status' => '2',
        ];
        return Response::json($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Entities\Merchandise  $merchandise
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->merchandRepository->delPhoto($id);

        $data = $this->merchandRepository->delete($id);

        return Response::json($data);
    }
    public function categoryItem ($category_id){

        $merchandises =  $this->merchandRepository->categoryItem($category_id);

        return view ('site.dicks',compact('merchandises'));
    }

    public function product($id){

        $merchandise = Merchandise::find($id);
        return view('site.product',compact('merchandise'));
    }


}



