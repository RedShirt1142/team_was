<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

class UserController extends Controller
{
     /**
        * タスク一覧
        *
        * @param Request $request
        * @return Response
        */
        public function index(Request $request)
        {
            $users = User::orderBy('created_at', 'asc')->get();
            return view('users.index', [
                'users' => $users,
            ]);
        }

        //  Quitaで書かれていた一覧画面の書き方
        // public function index()
        // {
                // usersテーブルからname,telephone,emailを$usersに格納
                // $users = DB::table('users')
                // ->select('id','name','telephone','email')
                // ->get();
        // viewを返す(compactでviewに$usersを渡す)
        // return view('user/index',compact('users'));
        // }

        public function create(Request $request)
        {
            return view('users/create');
        }


        public function edit(Request $request, int $user_id)
        {
            $user=User::find($user_id);
            return view('users/edit',['users'=> Auth::user() ]);
            
        }

        public function update(Request $request, int $user_id){
        
        $user_form = $request->all();
        $user = Auth::user();
        //不要な「_token」の削除
        unset($user_form['_token']);
        //保存
        $user->fill($user_form)->save();
        //リダイレクト
        return redirect('user/index');
        }
}
