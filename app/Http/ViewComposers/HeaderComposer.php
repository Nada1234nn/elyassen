<?php
/**
 * Created by PhpStorm.
 * User: mohamed
 * Date: 20/08/18
 * Time: 09:52
 */

namespace App\Http\ViewComposers;


use App\Models\Address;
use App\Models\Cart;
use App\Models\Message;
use App\Models\Orders;
use App\Models\Products;
use App\Models\Setting;
use App\Models\StaticPage;
use App\Models\Store_product;
use App\Models\Subcategories;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class HeaderComposer
{
    protected $categories = [],
        $settings = [],
        $products = [],
        $orders = [],
        $order = [],
        $totalPriceOrder = [],
//        $subcategories = [],
//        $subcategories_doc = [],
        $count;

    /**
     * HeaderComposer constructor.
     */
    public function __construct()
    {
        $this->products = Products::orderby('sorting', 'ASC')->take(4)->get();
        $this->orders = Orders::where('user_id', Auth::id())->with(['getProduct' => function ($q) {
            $q->orderby('sorting', 'ASC');
        }])->get();
        $collection_orders = Orders::where('user_id', Auth::id())->with(['getProduct', 'getProduct.getSupplier', 'getProduct.getSupplier.getUser'])->get();

        $this->totalPriceOrder = $collection_orders->sum->getSumOrderProduct();
        $this->order = Orders::where('user_id', Auth::id())->with(['getProduct'])->first();
    }

    /**
     * bind data to the view
     *
     * 0* @param \View $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with([
            "products" => $this->products,
            "orders" => $this->orders,
            "order" => $this->order,
            "totalPriceOrder" => $this->totalPriceOrder,

        ]);
    }


}