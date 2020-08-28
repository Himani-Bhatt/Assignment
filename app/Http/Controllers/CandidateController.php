<?php

namespace App\Http\Controllers;

use App\Candidate;
use App\Http\Requests\CandidateRequest;
use App\SetConfig;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CandidateController extends Controller
{
    public function change_password(Request $request)
    {
        Candidate::where('id', $request->user_id)->update(
            [
                'password' => bcrypt($request->password),
                // 'password' => $request->password,

            ]
        );

    }

    public function index()
    {
        $data = Candidate::orderBy('id', 'desc')->get();
        $fields = SetConfig::where('value', 1)->get();
        if ($fields->count() > 0) {
            return view('candidates.custom_index', compact('data', 'fields'));

        }
        return view('candidates.index', compact('data'));

    }

    public function create()
    {
        return view('candidates.create');
    }

    public function store(CandidateRequest $request)
    {
        $new = Candidate::create(
            [
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'birth_date' => date('Y-m-d', strtotime($request->birth_date)),
                'gender' => $request->gender,
                'phone' => $request->phone,
                'city' => $request->city,
                'country' => $request->country,
            ]
        );

        $file = $request->file('image');

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $destinationPath = './uploads'; // upload path
            $extension = $file->getClientOriginalExtension();

            $fileName1 = Str::uuid() . '.' . $extension;

            $file->move($destinationPath, $fileName1);
            $new->image = $fileName1;
            $new->save();
        }

        $pdf = $request->file('pdf');
        if ($request->hasFile('pdf') && $request->file('pdf')->isValid()) {
            $destinationPath = './pdf'; // upload path
            $extension = $pdf->getClientOriginalExtension();
            $fileName2 = Str::uuid() . '.' . $extension;
            $pdf->move($destinationPath, $fileName2);
            $new->pdf = $fileName2;
            $new->save();
        }

        return redirect('candidates');
    }

    public function edit($id)
    {
        $data = Candidate::find($id);
        return view('candidates.edit', compact('data'));
    }

    public function update(CandidateRequest $request)
    {
        Candidate::where('id', $request->id)->update(
            [
                'name' => $request->name,
                'email' => $request->email,
                // 'password' => bcrypt($request->password),
                'birth_date' => date('Y-m-d', strtotime($request->birth_date)),
                'gender' => $request->gender,
                'phone' => $request->phone,
                'city' => $request->city,
                'country' => $request->country,
            ]
        );

        $new = Candidate::find($request->id);
        $file = $request->file('image');

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $destinationPath = './uploads'; // upload path
            $extension = $file->getClientOriginalExtension();

            $fileName1 = Str::uuid() . '.' . $extension;

            $file->move($destinationPath, $fileName1);
            $new->image = $fileName1;
            $new->save();
        }

        $pdf = $request->file('pdf');

        if ($request->hasFile('pdf') && $request->file('pdf')->isValid()) {
            $destinationPath = './pdf'; // upload path
            $extension = $pdf->getClientOriginalExtension();

            $fileName1 = Str::uuid() . '.' . $extension;

            $pdf->move($destinationPath, $fileName1);
            $new->pdf = $fileName1;
            $new->save();
        }

        return redirect('candidates');
    }

    public function destroy(Request $request)
    {
        Candidate::find($request->id)->delete();
        return redirect('candidates');
    }

    public function view_form()
    {
        return view('form');
    }

    public function post_form(CandidateRequest $request)
    {
        // dd($request->all());

        $new = Candidate::create(
            [
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'birth_date' => date('Y-m-d', strtotime($request->birth_date)),
                'gender' => $request->gender,
                'phone' => $request->phone,
                'city' => $request->city,
                'country' => $request->country,
            ]
        );

        $file = $request->file('image');

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $destinationPath = './uploads'; // upload path
            $extension = $file->getClientOriginalExtension();

            $fileName1 = Str::uuid() . '.' . $extension;

            $file->move($destinationPath, $fileName1);
            $new->image = $fileName1;
            $new->save();
        }

        $pdf = $request->file('pdf');

        if ($request->hasFile('pdf') && $request->file('pdf')->isValid()) {
            $destinationPath = './pdf'; // upload path
            $extension = $pdf->getClientOriginalExtension();

            $fileName1 = Str::uuid() . '.' . $extension;

            $pdf->move($destinationPath, $fileName1);
            $new->pdf = $fileName1;
            $new->save();
        }
        return redirect('/');
    }

}
