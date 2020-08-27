<?php

namespace App\Http\Controllers;

use App\Candidate;
use App\Http\Requests\CandidateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CandidateController extends Controller
{
    public function index()
    {
        $data = Candidate::orderBy('id', 'desc')->get();
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
        // dd($file);

        // if ($request->hasFile('image') && $request->file('image')->isValid()) {
        //     $destinationPath = './uploads'; // upload path
        //     $extension = $file->getClientOriginalExtension();

        //     $fileName1 = Str::uuid() . '.' . $extension;

        //     $file->move($destinationPath, $fileName1);
        //     $new->image = $fileName1;
        //     $new->save();
        // }

        // $pdf = $request->file('pdf');

        // if ($request->hasFile('pdf') && $request->file('pdf')->isValid()) {
        //     $destinationPath = './uploads'; // upload path
        //     $extension = $pdf->getClientOriginalExtension();

        //     $fileName1 = Str::uuid() . '.' . $extension;

        //     $file->move($destinationPath, $fileName1);
        //     $new->pdf = $fileName1;
        //     $new->save();
        // }

        return redirect('candidates');
    }

    public function edit($id)
    {
        $data = Candidate::find($id);
        return view('candidates.edit', compact('data'));
    }

    public function update(TestimonialRequest $request)
    {
        $data = Candidate::find($request->id);
        $data->name = $request->name;
        $data->details = $request->details;
        $data->save();
        $file = $request->file('image');

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $destinationPath = './uploads'; // upload path
            $extension = $file->getClientOriginalExtension();

            $fileName1 = Str::uuid() . '.' . $extension;

            $file->move($destinationPath, $fileName1);
            $data->image = $fileName1;
            $data->save();
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
            $destinationPath = './uploads'; // upload path
            $extension = $pdf->getClientOriginalExtension();

            $fileName1 = Str::uuid() . '.' . $extension;

            $file->move($destinationPath, $fileName1);
            $new->pdf = $fileName1;
            $new->save();
        }
        return redirect('/');
    }

}