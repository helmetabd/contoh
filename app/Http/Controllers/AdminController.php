<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Throwable;

class AdminController extends Controller
{

    public function index(){
        try {
            if(Auth::user()->hasRole(['admin'])){
                $data = User::latest()->filter(request(['search']))->paginate(10);}
        }catch (Throwable $exception) {
            dd($exception);
        }
        return view('pages.users.index')->with([
            'data' => $data
        ]);
    }
}


//     public function create()
//     {
//         return view('pages.categories.add-edit');
//     }

//     public function store(Request $request)
//     {
//         try {
//             $validatedData = $request->validate([
//                 'name' => 'required|min:3|max:255|string',
//                 'parent_id' => 'sometimes|nullable|numeric'
//             ]);
//             $validatedData['created_at, updated_at'] = now();
//             // dd($validatedData);
//             Category::create($validatedData);
//         } catch (Throwable $exception) {
//             dd($exception);
//         }

//         return redirect()->route('categories.index')->withSuccess('You have successfully created a Category!');
//     }

//     public function edit($id)
//     {
//         $data = Category::findOrFail($id);
//         return view('pages.categories.add-edit', [
//             'data' => $data
//         ]);
//     }

//     public function update(Request $request, $id)
//     {
//         try {
//             $data = Category::findOrFail($id);
//             $validatedData = $request->validate([
//                 'name' => 'required|min:3|max:255|string',
//                 // 'parent_id' => 'sometimes|nullable|numeric'
//             ]);
//             // $validatedData['updated_at'] = now();
//             // dd($validatedData);
//             // dd($data);
//             // $data->save($validatedData);
//             $data->update($validatedData);
//             // Category::save($validatedData);
//         } catch (Throwable $exception) {
//             dd($exception);
//         }

//         return redirect()->route('categories.index')->withSuccess('You have successfully updated a Category!');
//     }

//     public function destroy($id)
//     {
//         $data = Category::findOrFail($id);
//         if ($data->children) {
//             foreach ($data->children()->with('blogs')->get() as $child) {
//                 foreach ($child->blogs as $blog) {
//                     $blog->update(['category_id' => NULL]);
//                 }
//             }

//             $data->children()->delete();
//         }

//         foreach ($data->blogs as $blog) {
//             $blog->update(['category_id' => NULL]);
//         }

//         $data->delete();

//         return redirect()->route('categories.index')->withSuccess('You have successfully deleted a Category!');
//     }