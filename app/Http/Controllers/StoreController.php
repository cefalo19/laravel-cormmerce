<?php namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;
use CodeCommerce\Category;

use CodeCommerce\Product;
use Illuminate\Http\Request;

class StoreController extends Controller {

	public function index()
    {
        $featured = Product::featured()->get();

        $recommend = Product::recommend()->get();

        $categories = Category::All();

        return view('store.index', compact('categories', 'featured', 'recommend'));
    }

    public function category($id)
    {
        $products = Product::byCategory($id)->get();

        $categories = Category::All();

        return view('store.category', compact('categories', 'products'));
    }

}
