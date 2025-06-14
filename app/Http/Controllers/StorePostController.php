<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Category;
use App\Models\Sold;
use App\Models\Log;

class StorePostController extends Controller
{
    public function addCategory(Request $request)
    {
        $request->validate([
            'category_name' => 'required|string|max:255',
        ]);

        $company_id = session('user_id');
        
        $qry = Category::insert([
            'category_name' => $request->category_name,
            'company_id' => $company_id,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        if ($qry) {
            $new_log = Log::insert(
                [
                    'company_id'=>session('user_id'),
                    'action'=>'add',
                    'message'=>'Added '.$request->category_name.' category to the inventory',
                    'created_at'=> now()
                ]);

            return redirect('/product')->with('success', 'Category added successfully.');
        } else {
            return redirect()->back()->withErrors('Failed to add category. Please try again.');
        }
        
    }


    public function deleteCategory(Request $request)
    {
        $categoryId = $request->category_id;

        if (!$categoryId) {
            return redirect()->back()->withErrors('Category ID is required.');
        }

        $category = Category::where('company_id', session('user_id'))->find($categoryId);

        if (!$category) {
            return redirect()->back()->withErrors('Item not found.');
        }

        $new_log = Log::insert(
                [
                    'company_id'=>session('user_id'),
                    'action'=>'delete',
                    'message'=>'Deleted '.$category->category_name.' category to the inventory',
                    'created_at'=> now()
                ]);

        $category->delete();

        return redirect('/product')->with('success', 'Category deleted successfully.');
    }




    public function addItem(Request $request)
    {
        $request->validate([
            'item_name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'original_price' => 'nullable|numeric|min:0',
        ]);

        // Check if original price is set and not less than price
        if (
            $request->filled('original_price') &&
            $request->original_price > $request->price
        ) {
            return redirect()->back()->withErrors('Selling price must not be less than the original price.');
        }

        $company_id = session('user_id');

        $qry = Item::insert([
            'company_id' => $company_id,
            'item_name' => $request->item_name,
            'category' => $request->category ?? '',
            'quantity' => $request->quantity ?? 0,
            'original_price' => $request->original_price ?? null,
            'price' => $request->price,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        if ($qry) {
            $new_log = Log::insert(
                [
                    'company_id'=>session('user_id'),
                    'action'=>'add',
                    'message'=>'Added '.$request->item_name.' item to the inventory',
                    'created_at'=> now()
                ]);

            return redirect('/product')->with('success', 'Item added successfully.');
        } else {
            return redirect()->back()->withErrors('Failed to add item. Please try again.');
        }
    }

    public function deleteItem(Request $request)
    {
        $itemId = $request->item_id;

        if (!$itemId) {
            return redirect()->back()->withErrors('Item ID is required.');
        }

        $item = Item::where('company_id', session('user_id'))->find($itemId);

        if (!$item) {
            return redirect()->back()->withErrors('Item not found.');
        }

        $new_log = Log::insert(
                [
                    'company_id'=>session('user_id'),
                    'action'=>'delete',
                    'message'=>'Deleted '.$item->item_name.' item to the inventory',
                    'created_at'=> now()
                ]);

        $item->delete();

        return redirect('/product')->with('success', 'Item deleted successfully.');
    }

    public function updateItem(Request $request)
    {
        $request->validate([
            'item_id' => 'required|integer|exists:items,id',
        ]);

        // Check if original price is set and not less than price
        if (
            $request->filled('original_price') &&
            $request->price < $request->original_price
        ) {
            return redirect()->back()->withErrors('Selling price must not be less than the original price.');
        }

        $item = Item::where('company_id', session('user_id'))->find($request->item_id);

        if (!$item) {
            return redirect()->back()->withErrors('Item not found.');
        }
        
        $item->quantity =  $item->quantity + $request->quantity;
        $item->updated_at = now();
        
        if ($item->save()) {
            $new_log = Log::insert(
                [
                    'company_id'=>session('user_id'),
                    'action'=>'update',
                    'message'=>'Added '.$request->quantity.' stock to the '.$item->item_name.' item. The new quantity now is '.$item->quantity,
                    'created_at'=> now()
                ]);
            return redirect('/product')->with('success', 'Item updated successfully.');
        } else {
            return redirect()->back()->withErrors('Failed to update item. Please try again.');
        }

    }

    public function addSold(Request $request)
    {
        $request->validate([
            'item_id'=> 'required|integer|exists:items,id',
            'sold_quantity' => 'required|integer|min:1',
        ]);

        $company_id = session('user_id');
        $item = Item::where('company_id', $company_id)->find($request->item_id);

        if (!$item) {
            return redirect()->back()->withErrors('Item not found.');
        }

        $quantity = $request->sold_quantity;

        // If sold quantity is greater than available, error
        if ($quantity > $item->quantity) {
            return redirect()->back()->withErrors('Sold quantity cannot be greater than available quantity.');
        }

        $product_name = $item->item_name;
        $category = $item->category;
        $sales = $item->price * $quantity;
        $profit = ($item->price - ($item->original_price ?? 0)) * $quantity;

        // Create a new Sold record only if sold_quantity == item quantity
        $sold = new Sold();
        $sold->company_id = $company_id;
        $sold->item_name = $product_name;
        $sold->category = $category;
        $sold->quantity = $quantity;
        $sold->sales = $sales;
        $sold->profit = $profit;

        if ($sold->save()) {
            // Update the item's quantity
            $item->quantity -= $quantity;

            // If quantity is now zero, delete the item
            if ($item->quantity <= 0) {
                $item->delete();
            } else {
                $item->save();
            }

            return redirect('/sold')->with('success', 'Item sold successfully.');
        } else {
            return redirect()->back()->withErrors('Failed to record sale. Please try again.');
        }
    }

}