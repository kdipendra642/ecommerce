<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Wishlist;
use Auth;

class WishlistController extends Controller
{
    public function GetWishlist()
    {
        return view('frontend.wishlist.view_wishlist');
    }

    public function GetWishlistData()
    {
        $wishlist = Wishlist::with('product')->where('user_id', Auth::id())->get();
        return response()->json($wishlist);
    }

    public function RemoveWishlist($id)
    {
        Wishlist::where('user_id', Auth::id())->where('id', $id)->delete();

        return response()->json(['success' => 'Product removed from wishlist.']);
    }
}
