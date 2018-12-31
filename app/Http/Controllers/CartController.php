<?php

namespace App\Http\Controllers;

use Request;
use Illuminate\Support\Facades\Redirect;
use App\Repositories\MerchandiseRepository;
use Cart;
class CartController extends Controller
{

    protected $merchandRepository;


    public function __construct(MerchandiseRepository $merchandRepository)
    {
        $this->merchandRepository=$merchandRepository;

    }


    /**
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function cart() {


        if (Request::isMethod('post')) {
            $product_id = Request::get('product_id');
            $product = $this->merchandRepository->edit($product_id);
            $img = $product->photo;
            Cart::add(array('id' => $product_id, 'name' => $product->name, 'qty' => 1, 'price' => $product->price, 'options' => ['image' => $img]));
        }

        //increment the quantity
        if (Request::get('product_id') && (Request::get('increment')) == 1) {
            $product_id = Request::get('product_id');
            $product = $this->merchandRepository->edit($product_id);
            $img = $product->photo;

          $items =  Cart::search(function ($cartItem, $rowId) {
                return $cartItem->id === Request::get('product_id');
            });
            $rowId = $items->keys();

            $item = Cart::get($rowId[0]);

            Cart::update($rowId[0], $item->qty + 1);
        }


        //decrease the quantity
        if (Request::get('product_id') && (Request::get('decrease')) == 1) {
            $product_id = Request::get('product_id');
            $product = $this->merchandRepository->edit($product_id);
            $img = $product->photo;

            $items =  Cart::search(function ($cartItem, $rowId) {
                return $cartItem->id === Request::get('product_id');
            });
            $rowId = $items->keys();
            $item = Cart::get($rowId[0]);

            Cart::update($rowId[0], $item->qty - 1);
        }

        if (Request::get('product_id') && (Request::get('remove')) == 1) {
            $product_id = Request::get('product_id');
            $product = $this->merchandRepository->edit($product_id);
            $img = $product->photo;

            $items =  Cart::search(function ($cartItem, $rowId) {
                return $cartItem->id === Request::get('product_id');
            });
            $rowId = $items->keys();

            Cart::remove($rowId[0]);
        }



        $cart = Cart::content();

        return view('site.cart', array('cart' => $cart, 'title' => 'Welcome', 'description' => '', 'page' => 'home', 'img' => $img));
    }
}
