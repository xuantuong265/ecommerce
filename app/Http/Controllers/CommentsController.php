<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Model\comments;
use App\Model\products;

class CommentsController extends Controller
{
    public function listComments()
    {
        $comments = comments::orderBy('id', 'DESC')->get();
        return view('admin.comments.list-comments')->with([
            'comments'       => $comments
        ]);
    }

    public function unComments($id)
    {
        $comments = comments::find($id);
        $comments->status = '1';
        $comments->save();
        return redirect(Route('listComments'));
    }

    public function activeComments($id)
    {
        $comments = comments::find($id);
        $comments->status = '0';
        $comments->save();
        return redirect(Route('listComments'));
    }

    public function deleteComments($id)
    {
        $comments = comments::find($id);
        $comments->delete();
        return redirect(Route('listComments'));
    }

    public function searchComments(Request $request)
    {
        // $comments = comments::whereBetween('date', [$request->ngaydau, $request->ngaycuoi]);
        $comments = DB::table('tbl_comments')
                    ->whereBetween('date', [$request->ngaydau, $request->ngaycuoi])->get();
        return view('admin.comments.search-comments')->with([
            'comments'       => $comments
        ]);
    }
}
