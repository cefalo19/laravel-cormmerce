<?php namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Category;
use CodeCommerce\Http\Requests;
use CodeCommerce\Product;
use CodeCommerce\ProductImage;
use CodeCommerce\Http\Requests\ProductRequest;
use CodeCommerce\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ProductsController extends Controller {

    /**
     * @var \CodeCommerce\Product
     */
    private $product;

    /**
     * @var \CodeCommerce\Tag
     */
    private $tag;

    public function __construct(Product $product, Tag $tag)
    {
        $this->product = $product;
        $this->tag     = $tag;

    }

    public function index()
    {
        $products = $this->product->paginate(10);

        return view('products.index')->with(['products' => $products]);
    }

    public function create(Category $category)
    {
        $categories = $category->lists('name', 'id');

        return view('products.create')->with(['categories' => $categories]);
    }

    public function store(Requests\ProductRequest $request)
    {
        $input = $request->all();

        $tags = $request->get('tags');

        $product = $this->product->create($input);

        $this->saveTags($product, $tags);

        return redirect()->route('products');
    }

    public function edit($id, Category $category)
    {
        $categories = $category->lists('name', 'id');

        $product = $this->product->find($id);

        return view('products.edit')->with(['product' => $product, 'categories' => $categories]);
    }

    public function update(ProductRequest $request, $id)
    {
        $tags = $request->get('tags');

        $product = $this->product->find($id);
        $product->save($request->all());

        $this->saveTags($product, $tags);

        return redirect()->route('products');
    }

    public function destroy($id)
    {
        $product = $this->product->find($id);

        $images = $product->images;

        foreach ($images as $image) {
            if (Storage::disk('public_local')->exists($image->id.'.'.$image->extension))
                Storage::disk('public_local')->delete($image->id.'.'.$image->extension);

            $image->delete();
        }

        $product->delete();

        return redirect()->route('products');
    }

    public function images($id)
    {
        $product = $this->product->find($id);

        return view('products.images', compact('product'));
    }

    public function createImage($id)
    {
        $product = $this->product->find($id);

        return view('products.create_image', compact('product'));
    }

    public function storeImage(Requests\ProductImageRequest $request, $id, ProductImage $productImage)
    {
        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension();

        $image = $productImage::create(['product_id' => $id, 'extension' => $extension]);

        Storage::disk('public_local')->put($image->id.'.'.$extension, File::get($file));

        return redirect()->route('products.images', ['id' => $id]);
    }

    public function destroyImage(ProductImage $productImage, $id)
    {
        $image = $productImage->find($id);

        if (Storage::disk('public_local')->exists($image->id.'.'.$image->extension))
            Storage::disk('public_local')->delete($image->id.'.'.$image->extension);

        $product = $image->product;
        $image->delete();

        return redirect()->route('products.images', ['id' => $product->id]);
    }

    private function saveTags(Product $product, $tags = '')
    {
        $syncTags = [];

        if ( !empty($tags) ) {

            $tags = explode(', ', $tags);

            foreach ($tags as $tag) {
                $foundTag = $this->tag->where('name', 'like', "%$tag%")->first();

                if ($foundTag) {
                    $syncTags[] = (int) $foundTag->id;
                } else {
                    $createdTag = $this->tag->create(['name' => $tag]);
                    $syncTags[] = $createdTag->id;
                }
            }
        }

        $product->tags()->sync($syncTags);
    }

}
