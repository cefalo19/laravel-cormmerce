<?php namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;
use CodeCommerce\Category;

use CodeCommerce\Product;
use CodeCommerce\Tag;
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
        $categories = Category::All();
        $products = Product::OfCategory($id)->get();
        $category = Category::find($id);

        return view('store.category', compact('categories', 'products', 'category'));
    }

    public function product($id)
    {
        $categories = Category::All();
        $product = Product::find($id);

        return view('store.product', compact('categories', 'product'));
    }

    public function tag($id)
    {
        $categories = Category::All();
        $tag = Tag::find($id);
        $products = $tag->products;

        return view('store.tag', compact('categories', 'products', 'tag'));
    }

}
