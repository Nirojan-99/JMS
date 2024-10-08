<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class adminProductController extends Controller
{
    public function index()
    {
        $perPage = 16; // Pagination items per page
        $page = request()->query('page', 1);
        $searchQuery = request()->query('searchQuery', null);
        $category = request()->query('category', null);

        $query = Product::query();

        if ($searchQuery) {
            $query->where(function ($q) use ($searchQuery) {
                $q->where('name', 'like', '%' . $searchQuery . '%')
                    ->orWhere('category', 'like', '%' . $searchQuery . '%');
            });
        }

        if ($category) {
            $query->where('category', $category);
        }

        $totalCount = $query->count();

        $products = $query->paginate($perPage, ['*'], 'page', $page);
        $pageCount = ceil($totalCount / $perPage);

        return view('Admin.admin_home', compact('products', 'pageCount', 'searchQuery', 'page'));
    }
    public function add_product()
    {
        $categories = Category::all();
        return view("Admin.add_product", compact('categories'));
    }

    public function store_product(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string',
            'price' => 'required|numeric',
            'weight' => 'required|numeric',
            'description' => 'required|string',
            'gender' => 'required|string|in:male,female,unisex',
            'warranty' => 'required|integer',
            'store_available' => 'required|integer',
            'images' => 'nullable|array',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ]);

        $imageNames = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $index => $image) {
                $imageName = time() . $index . '.' . $image->extension();
                if (!$image->move(public_path('uploads/products'), $imageName)) {
                    throw new \Exception('Failed to upload image.');
                }
                $imageNames[] = $imageName;
            }
        } else {
            return redirect()->route('add_product')->with('error', 'Images are required.');
        }

        Product::create([
            'name' => $request->name,
            'category' => $request->category,
            'price' => $request->price,
            'weight' => $request->weight,
            'description' => $request->description,
            'gender' => $request->gender,
            'warranty' => $request->warranty,
            'store_available' => $request->store_available,
            'images' => $imageNames,
        ]);

        return redirect()->route('add_product')->with('success', 'Product added successfully!');
    }

    public function edit_product()
    {
        return view("Admin.edit_product");
    }
    public function destroy_product($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('Admin.admin_home', ['page' => '1'])->with('success', 'Category deleted successfully.');
    }
    public function category_management()
    {
        $categories = Category::all();
        return view('Admin.category_management', compact('categories'));
    }
    public function add_categories()
    {
        return view("Admin.add_category");
    }
    public function store_categories(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'image|max:2048',
        ]);

        try {
            $imageName = null;
            if ($request->hasFile('image')) {
                $imageName = time() . '.' . $request->image->extension();
                $request->image->move(public_path('img/images/category'), $imageName);
            }

            Category::create([
                'name' => $request->name,
                'image' => $imageName,
                'created_at' => now(),
                'created_by' => Auth::id(),
            ]);

            return redirect()->route('add_categories')->with('success', 'Category created successfully.');
        } catch (\Exception $e) {
            return redirect()->route('add_categories')->with('error', 'Unable to add category!');
        }
    }
    public function edit_categories($id)
    {
        $category = Category::findOrFail($id);
        return view('Admin.edit_categories', compact('category'));
    }
    public function update_categories(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'image|max:2048',
        ]);

        try {
            $category = Category::findOrFail($id);
            $imageName = $category->image;

            if ($request->hasFile('image')) {
                $imageName = time() . '.' . $request->image->extension();
                $request->image->move(public_path('img/images/category'), $imageName);
            } else {
                return redirect()->route('update_categories', ['id' => $id])->with('error', 'Unable to update category!');
            }

            $category->update([
                'name' => $request->name,
                'image' => $imageName,
                'updated_at' => now(),
                'updated_by' => Auth::id(),
            ]);
            return redirect()->route('update_categories', ['id' => $id])->with('success', 'Category updated successfully.');
        } catch (\Exception $e) {
            return redirect()->route('update_categories', ['id' => $id])->with('error', 'Unable to update category!' . $e->getMessage());
        }
    }

    public function destroy_categories($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->route('category_management')->with('success', 'Category deleted successfully.');
    }
    public function pos()
    {
        return view("Admin.pos");
    }
    public function customization_request()
    {
        return view("Admin.customization_request");
    }
    public function warranty_claims()
    {
        return view("Admin.warranty_claims");
    }
    public function repair_requests()
    {
        return view("Admin.repair_requests");
    }
}
