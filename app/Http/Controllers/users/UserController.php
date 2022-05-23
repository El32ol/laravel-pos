<?php

namespace App\Http\Controllers\users;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\Permission;
use App\Models\User;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;


class UserController extends Controller
{
   public function __construct()
   {
       $this->middleware(['permission:users_read'])->only('index');
       $this->middleware(['permission:users_create'])->only('create');
       $this->middleware(['permission:users_update'])->only('edit');
       $this->middleware(['permission:users_delete'])->only('destroy');
   }

    public function index(Request $request)
    {
        
       
          $users = User::whereRoleIs('admin')->where(function($q) use ($request){
            return $q->when($request->search,function($query) use ($request){
                return $query->where('first_name', 'like' , '%' . $request->search . '%')
                ->orWhere('last_name', 'like' , '%' . $request->search . '%');
            });
            })->get(); 
          
        return view('dashboard.users.index',compact('users'));
    }

    public function create()
    {
        return view('dashboard.users.create');
    }

    public function store(UserRequest $request)
    {


       
        $request_data= $request->except(['password','cpassword','permissions','image']);
        $request_data['password']= bcrypt($request->password);

        if($request->image){
            
         Image::make($request->image)->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            
        })->save(public_path('upload/user_images/' . $request->image->hashName()));
        $request_data['image']=$request->image->hashName();
    }
    
        $user = User::create($request_data);
        $user->attachRole('admin');
        $user->syncPermissions($request->permissions);
        
        return redirect()->route('dashboard.users.index');
       
    }

    public function edit(User $user)
    {
      return view('dashboard.users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request_data= $request->except(['permissions']);

        if($request->image){

             if($user->image != 'default.jpg'){

            Storage::disk('public_upload')->delete('/user_images/' . $user->image);
            }
            Image::make($request->image)->resize(300, null, function ($constraint) {
            $constraint->aspectRatio();
            })->save(public_path('upload/user_images/' . $request->image->hashName()));
            $request_data['image']=$request->image->hashName();
        }

        $user->update($request_data);
        $user->syncPermissions($request->permissions);
        return redirect()->route('dashboard.users.index');
    }

    public function destroy(User $user)
    {
        if($user->image != 'default.jpg'){ 

        Storage::disk('public_upload')->delete('/user_images/' . $user->image);
        }
        $user->delete();
        return redirect()->route('dashboard.users.index');
    }
}
