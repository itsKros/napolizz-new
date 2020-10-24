<?php

namespace App\Http\Controllers\Backend;

use App\Category;
use App\Coupon;
use App\CouponType;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CouponsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $coupon_types = CouponType::all();

        $page = ($request->has('page') && $request->page > 1) ? $request->page : 1;
        $active = ($request->has('active') && $request->active > 0) ? $request->active : 0;
        $coupon_type_id = ($request->has('coupon_type_id') && $request->coupon_type_id > 0) ? $request->coupon_type_id : 0;
        $q = ($request->has('q') && !empty($request->q)) ? strtolower($request->q) : '';

        $queryCoupon = Coupon::query();

        if(!empty($q)){
            $queryCoupon->orWhere('code', 'LIKE', '%'.$q.'%')
                ->orWhere('discount', 'LIKE', '%'.$q.'%')
                ->orWhere('min_price', 'LIKE', '%'.$q.'%');
        }

        if($active>0){
            $queryCoupon->where('is_active', ($active==2)?1:0);
        }

        if($coupon_type_id>0){
            $queryCoupon->where('coupon_type_id', $coupon_type_id);
        }

        $coupons = $queryCoupon->paginate(10)->appends(['active'=>$active, 'q'=>$q, 'coupon_type_id'=>$coupon_type_id]);

        return view('backend.coupons.index', compact('coupon_types','coupons',  'page', 'active', 'q', 'coupon_type_id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $coupon_types = CouponType::all();

        $categories = Category::all();

        return view('backend.coupons.create', compact('coupon_types', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'code' => 'required|string|unique:coupons',
            'coupon_type_id' => 'required|gt:0',
            'discount' => (in_array($request->coupon_type_id, [2,3]))? 'required|numeric|gt:0' : 'sometimes|nullable|numeric|gt:0',
            'valid_till' => 'required|date',
            'min_price' => ($request->coupon_type_id == 1)? 'required|numeric|gt:0' : 'sometimes|nullable|numeric|gt:0',
            'food_id' => ($request->coupon_type_id == 5)? 'required|gt:0' : 'sometimes|nullable|gt:0'
        ],['discount.gt'=>'Discount must be greater than 0',
            'min_price.gt'=>'Minimum Price must be greater than 0',
            'food_id.gt'=>'Food must be a valid food',
            'coupon_type_id.gt'=>'Coupon type must be a valid coupon type'
        ]);

        $coupon = Coupon::create( [
            'code' => $request->code,
            'valid_till' => $request->valid_till,
            'coupon_type_id' => $request->coupon_type_id,
            'is_active' => $request->is_active,
            'discount' => $request->discount,
            'min_price' => $request->min_price,
            'food_id' => $request->food_id
        ]);

        if($coupon){
            request()->session()->flash('message.level', 'success');
            request()->session()->flash('message.content', 'Coupon was created successfully!');

            return redirect()->route('backend.coupons.index');
        }

        request()->session()->flash('message.level', 'danger');
        request()->session()->flash('message.content', 'Sorry, there was an error creating coupon!');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Coupon $coupon)
    {
        $coupon_types = CouponType::all();

        $categories = Category::all();

        return view('backend.coupons.view', compact('coupon', 'coupon_types', 'categories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Coupon $coupon)
    {

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
    public function destroy(Coupon $coupon)
    {
        if($coupon && $coupon->delete()){
            request()->session()->flash('message.level', 'success');
            request()->session()->flash('message.content', 'Coupon was deleted successfully!');

            return redirect()->route('backend.coupons.index');
        }

        request()->session()->flash('message.level', 'danger');
        request()->session()->flash('message.content', 'Sorry, there was an error deleting coupon!');
        return redirect()->back();
    }
}
