<?php namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Category;
use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;

use CodeCommerce\Http\Requests\CategoryRequest;

class CategoriesController extends Controller {

    /**
     * @var \CodeCommerce\Category
     */
    private $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function index()
    {
        $categories = $this->category->paginate(10);

        return view('categories.index')->with(['categories' => $categories]);
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(CategoryRequest $request)
    {
        $input = $request->all();

        $this->category->create($input);

        return redirect()->route('categories');
    }

    public function edit($id)
    {
        $category = $this->category->find($id);

        return view('categories.edit')->with(['category' => $category]);
    }

    public function update(CategoryRequest $request, $id)
    {
        $this->category->find($id)->update($request->all());

        return redirect()->route('categories');
    }

    public function destroy($id)
    {
        $this->category->find($id)->delete();

        return redirect()->route('categories');
    }

}
