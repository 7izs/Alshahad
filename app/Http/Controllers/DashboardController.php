<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Details;
use Illuminate\Support\Facades\DB;
class DashboardController extends Controller
{
    

public function get_product()
{
    $product = Product::all();
    return view('dashboard.product', compact('product'));
}

public function get_details()
{
    $details = Details::all();

    return view('dashboard.details', compact('details'));
}

public function Save_product(Request $request)
{
    $rule = [
        'name' => 'required',
        'type' => 'required',
        'price' => 'required',
        'discount' => 'nullable',
        'image' => 'required',
    ];

    $message = [
        'name.required' => 'يرجى ادخال الاسم',
        'type.required' => 'يرجى ادخال نوع العسل',
        'price.required' => 'يرجى ادخال السعر',
        'image.required' => 'يرجى ادخال صورة العسل',
    ];

    $request->validate($rule, $message);

    $image_Name = null;

    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $image_Name = time().'_'.uniqid().'_'.$image->getClientOriginalName();
        $image->move(public_path('images'), $image_Name);
    }

    Product::create([
        'name' => $request->name,
        'type' => $request->type,
        'price' => $request->price,
        'discount' => $request->discount,
        'image' => $image_Name,
    ]);

    return back();
}

public function Save_details(Request $request)
{
    $rule = [
        'name' => 'required',
        'price' => 'required',
        'stock_status' => 'required',
        'rating' => 'required',
        'description' => 'required',
        'image' => 'required',
    ];

    $message = [
        'name.required' => 'يرجى ادخال اسم',
        'price.required' => 'يرجى ادخال السعر',
        'stock_status.required' => 'يرجى ادخال حالة التوفر',
        'rating.required' => 'يرجى ادخال التقييم',
        'description.required' => 'يرجى ادخال الوصف',
        'image.required' => 'يرجى ادخال صورة العسل',
    ];

    $request->validate($rule, $message);

    $image_Name = null;

    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $image_Name = time().'_'.uniqid().'_'.$image->getClientOriginalName();
        $image->move(public_path('images'), $image_Name);
    }

    Details::create([
        'name' => $request->name,
        'price' => $request->price,
        'stock_status' => $request->stock_status,
        'rating' => $request->rating ?? 0,
        //'rating' => $request->rating,
        'description' => $request->description,
        'image' => $image_Name,
    ]);

    return back();
}

public function Delete_Product($id)
{
    $product = Product::find($id);

    if ($product) {
        $product->delete();
    }

    return back();
}

public function Delete_details($id)
{
    $details = Details::find($id);

    if ($details) {
        $details->delete();
    }

    return back();
}

public function Edit_Product($id)
{
    $product = Product::find($id);
    return view('dashboard.edit_product', compact('product'));
}

public function Edit_Details($id)
{
    $details = Details::find($id);
    return view('dashboard.edit_details', compact('details'));
}


public function Update_details(Request $request, $id)
{
    $details = Details::find($id);

    $image_Name = $details->image;

    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $image_Name = time().'_'.uniqid().'_'.$image->getClientOriginalName();
        $image->move(public_path('images'), $image_Name);
    }

    $details->update([
        'name' => $request->name,
        'price' => $request->price,
        'stock_status' => $request->stock_status,
        'rating' => $request->rating,
        'description' => $request->description,
        'image' => $image_Name,
    ]);

    return redirect()->route('dashboard.details');
}

public function Update_product(Request $request, $id)
{
    $product = Product::find($id);

    $image_Name = $product->image;

    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $image_Name = time().'_'.uniqid().'_'.$image->getClientOriginalName();
        $image->move(public_path('images'), $image_Name);
    }

    $product->update([
        'name' => $request->name,
        'type' => $request->type,
        'price' => $request->price,
        'discount' => $request->discount,
        'image' => $image_Name,
    ]);

    return redirect()->route('dashboard.product');
}
}

