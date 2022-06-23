<?php

namespace App\Http\Controllers\User;

use App\Exports\UsersExport;
use App\Helpers\Traits\ImageUploader;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;

class ProductController extends Controller
{
    use ImageUploader;

    public function index()
    {
        $events = Product::where('initiator_id',auth('user')->user()->id)->where('initiator_type',User::class)
            ->when(\request()->filled('q'),function ($q){
                $q->where('name','like',"%".\request()->input('q')."%");
            })
            ->orderBy('activated','desc')
            ->paginate(9);
        $categories = Category::all();
        return view('pages.user.product.index',[
            'events' => $events,
            'categories' => $categories,
        ]);
    }

    public function store(Request $request)
    {
        $product = new Product();
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->speaker = $request->input('speaker');
        $product->place = $request->input('place');
        $product->fee = $request->input('fee');
        $product->capacity = $request->input('capacity');
        $product->initiator_type = User::class;
        $product->initiator_id = auth('user')->user()->id;
        $product->category_id = $request->input('category_id');
        $product->contact = $request->input('contact');
        $product->online = $request->input('online');
        $product->date = Carbon::parse($request->input('date'));

        if ($request->file('image')){
            $this->setImageUploadPath('product/'.auth('user')->user()->id);
            $filename = $this->uploadImage($request,'image',800,700);
            if ($filename)
            {
                $product->image = $filename;
            }
        }
        $product->save();

        return redirect()->route('user::product::index');
    }

    public function update(Request $request,Product $product)
    {
        $product->name = $request->input('edit-name');
        $product->description = $request->input('edit-description');
        $product->speaker = $request->input('edit-speaker');
        $product->place = $request->input('edit-place');
        $product->fee = $request->input('edit-fee');
        $product->capacity = $request->input('edit-capacity');
        $product->initiator_type = User::class;
        $product->initiator_id = auth('user')->user()->id;
        $product->category_id = $request->input('edit-category_id');
        $product->contact = $request->input('edit-contact');
        $product->online = $request->input('edit-online');
        $product->date = Carbon::parse($request->input('edit-date'));

        if ($request->file('edit-image')){
            $this->setImageUploadPath('product/'.auth('user')->user()->id);
            $filename = $this->uploadImage($request,'edit-image',700,800);
            if ($filename)
            {
                $product->image = $filename;
            }
        }
        $product->save();

        return redirect()->route('user::product::show',[$product]);
    }

    public function myEvents()
    {
        $events  = Product::whereHas('orders',function ($q){
            $q->where('user_id',auth('user')->user()->id);
        })->when(\request()->filled('q'),function ($q){
            $q->where('name','like',"%".\request()->input('q')."%");
        })
            ->paginate();

        return view('pages.user.product.my-product',[
            'events' => $events,
        ]);
    }

    public function audience(Product $product)
    {
        $users  = User::whereHas('orders',function ($q) use ($product){
            $q->where('product_id',$product->id);
        })->
            when(\request()->filled('q'),function ($q){
                $q->where('name','like',"%".\request()->input('q')."%");
        })->paginate(5);

        return view('pages.user.product.user',[
            'users' => $users,
            'product' => $product,
        ]);
    }

    public function show(Product $product)
    {
        $categories = Category::all();
        return view('pages.user.product.show',[
            'product' => $product,
            'categories' => $categories,
        ]);
    }

    public function generateCertificates(Product $product,User $user)
    {

        $pdf = PDF::loadView('pdf.certificates',[
            'user' => $user,
            'product' => $product,
        ])->setPaper('a5','landscape');

        return $pdf->download('certificates.pdf');
    }

    public function generateExcel(Product $product)
    {
        return Excel::download(new UsersExport($product), Str::slug($product->name).'-user.xlsx');
    }
}
