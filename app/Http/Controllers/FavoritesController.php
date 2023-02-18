<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FavoritesController extends Controller
{
    /**
     * ポストをお気に入りにするアクション。
     *
     * @param  $micropost_id  相手ポストのid
     * @return \Illuminate\Http\Response
     */
    public function store($micropost_id)
    {
        // 認証済みユーザ（閲覧者）が、 idのポストをお気に入りにする
        \Auth::user()->favorite($micropost_id);
        // 前のURLへリダイレクトさせる
        return back();
    }

    /**
     * ユーザをアンフォローするアクション。
     *
     * @param  $id  相手ポストのid
     * @return \Illuminate\Http\Response
     */
    public function destroy($micropost_id)
    {
        // 認証済みユーザ（閲覧者）が、 idのポストをお気に入りから削除する
        \Auth::user()->unfavorite($micropost_id);
        // 前のURLへリダイレクトさせる
        return back();
    }
}