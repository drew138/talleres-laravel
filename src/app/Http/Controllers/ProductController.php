<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\View\View;

use App\Models\Product;

class ProductController extends Controller

{

    public function index(): View
    {
        $viewData = [];

        $viewData["title"] = "Products - Online Store";

        $viewData["subtitle"] = "List of products";

        $viewData["products"] = Product::all();

        return view('product.index')->with("viewData", $viewData);
    }

    public function show(string $id): View

    {

        $viewData = [];

        if ($id > 4) {
            return view('home.index');
        }

        $product = Product::findOrFail($id);
        $viewData["title"] = $product["name"] . " - Online Store";
        $viewData["subtitle"] = $product["name"] . " - Product information";
        $viewData["product"] = $product;
        echo $product;

        return view('product.show')->with("viewData", $viewData);
    }

    public function create(): View

    {

        $viewData = []; //to be sent to the view

        $viewData["title"] = "Create product";

        return view('product.create')->with("viewData", $viewData);
    }

    public function save(Request $request)

    {

        $request->validate([
            "name" => "required",
            "price" => ["required", "integer", "min:0"],
        ]);

        Product::create($request->only(["name", "price"]));
        return view('product.created');
    }
}
