<?php namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Product;
use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;

use CodeCommerce\Http\Requests\ProductRequest;

class ProductsController extends Controller {

    /**
     * @var \CodeCommerce\Product
     */
    private $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function index()
    {
        $products = $this->product->all();

        return view('products.index')->with(['products' => $products]);
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(ProductRequest $request)
    {
        $input = $request->all();

        $this->product->create($input);

        return redirect()->route('products');
    }

    public function edit($id)
    {
        $product = $this->product->find($id);

        return view('products.edit')->with(['product' => $product]);
    }

    public function update(ProductRequest $request, $id)
    {
        $request['featured']  = $request->get('featured');
        $request['recommend'] = $request->get('recommend');

        $this->product->find($id)->update($request->all());

        return redirect()->route('products');
    }

    public function destroy($id)
    {
        $this->product->find($id)->delete();

        return redirect()->route('products');
    }

}
