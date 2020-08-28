<?php

namespace App\Http\Controllers;

use App\AssignedTags;
use App\Candidate;
use App\Note;
use App\Tag;
use Illuminate\Http\Request;

class NoteController extends Controller
{

    public function index()
    {
        $data = Note::orderBy('id', 'desc')->get();
        $tags = Tag::get();
        return view('notes.index', compact('data', 'tags'));

    }

    public function assign_tag(Request $request)
    {
        AssignedTags::updateOrCreate(['tag_id' => $request->tag_id, 'note_id' => $request->note_id]);
        return redirect('notes');

    }

    public function create()
    {
        $exclude = Note::select('user_id')->get('user_id')->pluck('user_id')->toArray();
        $users = Candidate::whereNotIn('id', $exclude)->orderBy('id', 'desc')->get();
        // dd($users);
        return view('notes.create', compact('users'));
    }

    public function store(Request $request)
    {
        $new = Note::create(
            [
                'user_id' => $request->user_id,
                'note' => $request->note,
            ]
        );

        return redirect('notes');
    }

    public function edit($id)
    {
        $data = Note::find($id);
        return view('notes.edit', compact('data'));
    }

    public function update(Request $request)
    {
        Note::where('id', $request->id)->update(
            [
                // 'user_id' => $request->user_id,
                'note' => $request->note,

            ]
        );

        return redirect('notes');
    }

    public function destroy(Request $request)
    {
        Note::find($request->id)->delete();
        AssignedTags::where('note_id', $request->id)->delete();
        return redirect('notes');
    }

}
