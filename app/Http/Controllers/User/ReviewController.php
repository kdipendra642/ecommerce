<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Order;
use App\Models\User;
use Auth;
use Carbon\Carbon;

class ReviewController extends Controller
{
    public function StoreReview(Request $request)
    {
        Review::insert([
            'product_id' => $request->product_id,
            'user_id' => $request->user_id,
            'summary' => $request->summary,
            'comment' => $request->comment,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Thank you for your review. Your words will be approved by admin soon.',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);
    }

    public function AllReviews()
    {
        $reviews = Review::orderBy('id', 'DESC')->get();
        return view('backend.review.allreviews', compact('reviews'));
    }

    public function ApproveReviews($id)
    {
        Review::find($id)->update([
            'status' => 1,
        ]);

        $notification = array(
            'message' => 'Review approved successfully.',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);
    }

    public function DisableReview($id)
    {
        Review::find($id)->update([
            'status' => 0,
        ]);

        $notification = array(
            'message' => 'Review disabled successfully',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);
    }

    public function DeleteReview($id)
    {
        Review::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Review deleted successfully',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);
    }
}
