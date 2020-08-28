<?php

namespace App\Http\Controllers;

use App\AssignedTags;
use App\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{

    public function index()
    {
        $data = Tag::orderBy('id', 'desc')->get();

        return view('tags.index', compact('data'));

    }

    public function create()
    {

        return view('tags.create');
    }

    public function store(Request $request)
    {
        $new = Tag::create(
            [
                'name' => $request->name,
            ]
        );

        return redirect('tags');
    }

    public function edit($id)
    {
        $data = Tag::find($id);
        return view('tags.edit', compact('data'));
    }

    public function update(Request $request)
    {
        Tag::where('id', $request->id)->update(
            [

                'name' => $request->name,

            ]
        );

        return redirect('tags');
    }

    public function destroy(Request $request)
    {
        Tag::find($request->id)->delete();
        AssignedTags::where('tag_id', $request->id)->delete();

        return redirect('tags');
    }

}
