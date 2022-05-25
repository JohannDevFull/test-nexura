<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Inertia\Inertia;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use App\Models\User;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Inertia::render('Users/IndexUsers', [
            'users' => User::all()
        ]);
    }

    /**
     * Pagination of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function pagination(Request $request)
    {
        $show   = $request->show;
        $field  = $request->field;
        $order  = $request->order;

        $users = User::orderBy($field, $order)
        ->where('user_name','like','%'.$request['search'].'%')
        ->orwhere('name','like','%'.$request['search'].'%')
        ->orwhere('last_name','like','%'.$request['search'].'%')
        ->paginate($show);

        return [
            'pagination' => [
                'total'         => $users->total(),
                'current_page'  => $users->currentPage(),
                'per_page'      => $users->perPage(),
                'last_page'     => $users->lastPage(),
                'from'          => $users->firstItem(),
                'to'            => $users->lastPage()
            ],
            'users' => $users,
        ];
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $user = Auth::user();
        // if ( !isset($user->id) ){ return redirect()->route('login'); }
        // if ( $user->hasAnyRole(['Developer', 'Admin']) )
        // { }
        // else{ return Inertia::render('App/Config/ErrorPermissions'); }

        return Inertia::render('Users/CreateUsers', [
            'can' => [
                'create_user' => Auth::user()->can('users.create'),
            ],
            'roles' => Role::all()->pluck('name')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_name'     => 'required|unique:users',
            'name'          => 'required',
            'last_name'     => 'required',
            'email'         => 'required|email|unique:users',
            'password'      => 'required',
            'roles_user'    => 'required',
            'password_confirmation' => 'required'
        ]);

        if ($validator->fails())
        {
            return response()->json([
                'status'    => 'error',
                'masage'    => 'Este es un mensaje de prueba.',
                'errors'    => $validator->errors(),
            ]);
        }

        $user = User::create([
            'user_name'     => $request->user_name,
            'name'          => $request->name,
            'last_name'     => $request->last_name,
            'email'         => $request->email,
            'phone'         => 7878780,
            // 'phone'         => $request->phone,
            'password'      => Hash::make($request->password)
        ]);

        $user->assignRole($request->roles_user);

        return response()->json([
            'status'    => 'ok',
            'masage'    => 'Usuario creado correctamente.',
            'user'      => $user,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $user = User::find($request->id);
        $user->roles_user = $user->getRoleNames();

        return Inertia::render('Users/EditUser', [
            'can'   => [
                'edit_user' => Auth::user()->can('users.edit'),
            ],
            'user'  => $user,
            'roles' => Role::all()->pluck('name')
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            // 'user_name'     => 'required|unique:users',
            'name'          => 'required',
            'last_name'     => 'required',
            'email'         => 'required',
            // 'email'         => 'required|email|unique:users',
            // 'test'          => 'required'
        ]);

        if ($validator->fails())
        {
            return response()->json([
                'status'    => 'error',
                'masage'    => 'Este es un mensaje de prueba.',
                'errors'    => $validator->errors(),
            ]);
        }

        $user = User::where('id', $request->id)
        ->update([
            'user_name'     => $request->user_name,
            'name'          => $request->name,
            'last_name'     => $request->last_name,
            'email'         => $request->email,
            'phone'         => $request->phone,
            'address'       => $request->address,
            'country'       => $request->country
        ]);

        return response()->json([
            'status'    => 'ok',
            'masage'    => 'Usuario actualizado correctamente.',
            'user'      => $user
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $user= User::where('id','=',$id)
        ->delete();

        return response()->json(compact('user'),201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteForce($id)
    {
        $user = User::where('id','=',$id)
        ->get();

        $user->forceDelete();

        return response()->json(compact('user'),201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function rolesForce($id)
    {
        //
        $invoice_products= InvoiceSaleProduct::where('invoices_id','=',$id)
        ->delete();

        $invoice= InvoiceSale::where('id','=',$id)
        ->delete();

        return response()->json(compact('invoice','invoice_products'),201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function changeRole($id)
    {
        //
        $user = User::where('id', $request->id)
        ->get();

        $roles_user = $user->getRoleNames();

        foreach ($roles_user as $key )
        {
            $user->removeRole($key);
        }

        $user->assignRole($request->roles_user);

        return response()->json([
            'status'    => 'ok',
            'masage'    => 'Usuario actualizado correctamente.',
            'user'      => $user
        ],201);
    }  

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function deletedUsers()
    {
        $deleted_users = User::all()->map(function ($user) {
            return [
                'id'        => $user->id,
                'user_name' => $user->user_name,
                'full_name' => $user->name.' '.$user->last_name,
                'name'      => $user->name,
                'last_name' => $user->last_name,
                'email'     => $user->email,
                'create_at' => $user->create_at
            ];
        });

        return response()->json([
            'status'        => 'ok',
            'masage'        => 'Lista de usuarios eliminados.',
            'deleted_users' => $deleted_users
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        $user = User::where('id','=',$id)
        ->get();

        $user->restore();

        return response()->json(compact('user'),201);
    }
    
}
