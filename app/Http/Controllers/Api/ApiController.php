<?php

namespace App\Http\Controllers\Api;

use App\Candidate;
use App\Http\Controllers\Controller;
use App\Note;
use Illuminate\Http\Request;
use Validator;

class ApiController extends Controller
{

    public function store_note(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'user_id' => 'required|integer',
            'note' => 'required',
        ]);
        $errors = $validation->errors();

        if (count($errors) > 0) {
            $data['success'] = false;
            $data['message'] = "Unable to add note, please try again later!";
            $data['data'] = "";

        } else {
            $new = Note::create(
                [
                    'user_id' => $request->user_id,
                    'note' => $request->note,
                ]
            );

            $data['success'] = true;
            $data['message'] = "Note added successfully!";
            $data['data'] = "";

        }

        return $data;
    }

    public function search_candidate(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'keyword' => 'required',
        ]);
        $errors = $validation->errors();

        if (count($errors) > 0) {
            $data['success'] = false;
            $data['message'] = "Unable to search records, please try again later!";
            $data['data'] = "";

        } else {
            $details = array();
            $records = Candidate::where('name', 'like', '%' . $request->keyword . '%')
                ->orWhere('email', 'like', '%' . $request->keyword . '%')
                ->orWhere('email', 'like', '%' . $request->keyword . '%')
                ->orWhere('birth_date', 'like', '%' . $request->keyword . '%')
                ->orWhere('phone', 'like', '%' . $request->keyword . '%')
                ->orWhere('city', 'like', '%' . $request->keyword . '%')
                ->orWhere('country', 'like', '%' . $request->keyword . '%')
                ->get();
            foreach ($records as $row) {
                $details[] = array(
                    'name' => $row->name,
                    'email' => $row->email,
                    'phone' => $row->phone,
                    'city' => $row->city,
                    'country' => $row->country,
                    'birth_date' => date('d-m-Y', strtotime($row->birth_date)),
                    'gender' => ($row->gender == 1) ? "Female" : "Male",
                );
            }
            $data['success'] = true;
            $data['message'] = "Data fetched!";
            $data['data'] = $details;

        }
        return $data;
    }

    public function submit_form(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'image' => 'required|image|mimes:jpeg,png,jpg',
            'pdf' => 'required|mimes:pdf,doc,docx',
            'password' => 'required|min:8',
            'birth_date' => 'required|date',
            'gender' => 'required|integer',
            'phone' => 'required',
            'city' => 'required',
            'country' => 'required',
        ]);
        $errors = $validation->errors();
        // dd($errors);
        if (count($errors) > 0) {
            $data['success'] = false;
            $data['message'] = "Unable to submit form, please try again later!";
            $data['data'] = "";

        } else {

            $new = Candidate::updateOrCreate(
                ['email' => $request->email],
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
            $data['success'] = true;
            $data['message'] = "Form submitted successfully!";
            $data['data'] = "";
        }

        return $data;
    }
}
