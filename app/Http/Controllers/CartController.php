<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;


class CartController extends Controller
{
    public function addToCart(Request $request, $productId)
    {
        $user = Auth::user();
    
        // Get the product by its ID
        $product = Product::find($productId);
    
        // Ensure that the product exists
        if (!$product) {
            return redirect()->back()->with('error', 'Product not found.');
        }
    
        // Get the quantity (default to 1 if not provided)
        $quantity = $request->input('quantity', 1);
    
        // Check if the quantity is more than available stock
        if ($quantity > $product->quantity) {
            return redirect()->back()->with('error', 'Not enough stock available.');
        }
    
        // Check if the product is already in the cart
        $cartItem = Cart::where('user_id', $user->id)
                        ->where('product_id', $product->id)
                        ->first();
    
        if ($cartItem) {
            // If the item already exists, increment the quantity but not more than available stock
            $newQuantity = $cartItem->quantity + $quantity;
    
            if ($newQuantity > $product->quantity) {
                return redirect()->back()->with('error', 'Not enough stock available.');
            }
    
            // Update the quantity
            $cartItem->quantity = $newQuantity;
            $cartItem->save();
        } else {
            // Create a new cart item if it doesn't exist
            Cart::create([
                'user_id' => $user->id,
                'product_id' => $productId,
                'quantity' => $quantity
            ]);
        }
    
        // Update the cart count
        $cartCount = Cart::where('user_id', $user->id)->count();
    
        // Return response
        return redirect()->back()->with('cartCount', $cartCount);
    }
    
    public function myCart()
    {
        $user = Auth::user();

        $cart =  Cart::where('user_id', $user->id)->get();;

        return view('user.cart.view', compact('cart'));
    }

    public function remove_product($id)
    {

        $cart = Cart::find($id);
    
        $cart->delete();

    
        // Redirect back to the cart view
        return redirect()->back();
        
    }

    public function cart_checkout()
    {
        $user = Auth::user();
    
        // Retrieve the user's cart items
        $cartItems = Cart::where('user_id', $user->id)->get();
    
        // Loop through each item in the cart to update the product quantity and remove the cart item
        foreach ($cartItems as $cartItem) {
            // Find the product related to the cart item
            $product = Product::find($cartItem->product_id);
    
            if ($product) {
                // Update the product's quantity
                $product->quantity -= $cartItem->quantity;
                $product->save(); // Save the updated product quantity
            }
    
            // Remove the item from the cart
            $cartItem->delete();
        }
    
        // Redirect to the dashboard or any other view after checkout
        return redirect()->route('user.dashboard');
    }


}
