<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;

class ApiController extends Controller
{
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
                $destinationPath = './uploads'; // upload path
                $extension = $pdf->getClientOriginalExtension();

                $fileName1 = Str::uuid() . '.' . $extension;

                $file->move($destinationPath, $fileName1);
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
