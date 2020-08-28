<?php

namespace App\Http\Controllers\Api;

use App\AssignedTags;
use App\Candidate;
use App\CandidateLog;
use App\Http\Controllers\Controller;
use App\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Image;
use Validator;

class ApiController extends Controller
{

    public function images()
    {
        $files = Storage::disk('thumbnails')->files();
        // dd($files);
        $images = array();
        foreach ($files as $file) {
            if (file_exists("thumbnails/" . $file)) {
                $images[] = $file;
            }
        }
        $data['success'] = true;
        $data['message'] = "Thumbnail fetched!";
        $data['data'] = $images;
        return $data;

    }

    public function delete_candidate(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'id' => 'required|integer',

        ]);
        $errors = $validation->errors();

        if (count($errors) > 0) {
            $data['success'] = false;
            $data['message'] = "Unable to delete Candidate, please try again later!";
            $data['data'] = "";

        } else {
            $record = Candidate::find($request->id);
            Note::where('user_id', $record->id)->delete();

            $record->delete();

            $data['success'] = true;
            $data['message'] = "Candidate deleted successfully!";
            $data['data'] = "";

        }

        return $data;
    }

    public function delete_note(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'id' => 'required|integer',

        ]);
        $errors = $validation->errors();

        if (count($errors) > 0) {
            $data['success'] = false;
            $data['message'] = "Unable to delete note, please try again later!";
            $data['data'] = "";

        } else {
            Note::find($request->id)->delete();
            AssignedTags::where('note_id', $request->id)->delete();
            $data['success'] = true;
            $data['message'] = "Note deleted successfully!";
            $data['data'] = "";

        }

        return $data;
    }

    public function candidatelogs()
    {
        $details = array();
        $records = CandidateLog::orderBy('id', 'desc')
            ->get();
        foreach ($records as $row) {
            $details[] = array(
                // 'id' => $row->id,
                'name' => $row->name,
                'email' => $row->email,
                'phone' => $row->phone,
                'city' => $row->city,
                'country' => $row->country,
                'birth_date' => date('d-m-Y', strtotime($row->birth_date)),
                'gender' => ($row->gender == 1) ? "Female" : "Male",
                'image' => asset('uploads/' . $row->image),
                'pdf' => asset('pdf/' . $row->pdf),
                'status' => $row->status,
                'timestamp' => date('d-m-Y g:i A', strtotime($row->created_at)),
            );
        }
        $data['success'] = true;
        $data['message'] = "Data fetched!";
        $data['data'] = $details;
        return $data;
    }
    public function candidates()
    {
        $details = array();
        $records = Candidate::orderBy('id', 'desc')
            ->get();
        foreach ($records as $row) {
            $details[] = array(
                'id' => $row->id,
                'name' => $row->name,
                'email' => $row->email,
                'phone' => $row->phone,
                'city' => $row->city,
                'country' => $row->country,
                'birth_date' => date('d-m-Y', strtotime($row->birth_date)),
                'gender' => ($row->gender == 1) ? "Female" : "Male",
                'image' => asset('uploads/' . $row->image),
            );
        }
        $data['success'] = true;
        $data['message'] = "Data fetched!";
        $data['data'] = $details;
        return $data;
    }

    public function notes()
    {
        $details = array();
        $records = Note::orderBy('id', 'desc')
            ->get();
        foreach ($records as $row) {
            $details[] = array(
                'id' => $row->id,
                'candidate' => $row->candidate->name,
                'note' => $row->note,

            );
        }
        $data['success'] = true;
        $data['message'] = "Data fetched!";
        $data['data'] = $details;
        return $data;

    }

    public function update_note(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'id' => 'required|integer',
            'note' => 'required',
        ]);
        $errors = $validation->errors();

        if (count($errors) > 0) {
            $data['success'] = false;
            $data['message'] = "Unable to update note, please try again later!";
            $data['data'] = "";

        } else {
            Note::where('id', $request->id)->update(
                [
                    // 'user_id' => $request->user_id,
                    'note' => $request->note,

                ]
            );

            $data['success'] = true;
            $data['message'] = "Note updated successfully!";
            $data['data'] = "";

        }

        return $data;
    }

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
            $status = "Created";
            $exist = Candidate::where('email', $request->email)->get();
            if ($exist->count() > 0) {
                $status = "Updated";
            }
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
            $thumb = $request->file('image');

            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                $destinationPath = './uploads'; // upload path
                $extension = $file->getClientOriginalExtension();

                $fileName1 = Str::uuid() . '.' . $extension;

                // $file->move($destinationPath, $fileName1);
                // $thumbname = 'thumb' . time() . '.' . $extension;
                // Image::make($thumb)->resize(50, 50)->save(public_path('thumbnails/' . $thumbname));

                $thumbnailImage = Image::make($file);
                $thumbnailPath = public_path() . '/thumbnails/';
                $originalPath = public_path() . '/uploads/';
                $thumbnailImage->save($originalPath . $fileName1);
                $thumbnailImage->resize(150, 150);
                $thumbnailImage->save($thumbnailPath . "thumb-" . time() . "." . $file->getClientOriginalExtension());
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

            CandidateLog::create([

                'name' => $new->name,
                'email' => $new->email,
                'password' => $new->password,
                'birth_date' => date('Y-m-d', strtotime($new->birth_date)),
                'gender' => $new->gender,
                'phone' => $new->phone,
                'city' => $new->city,
                'country' => $new->country,
                'image' => $new->image,
                'pdf' => $new->pdf,
                'status' => $status,
            ]);

            $data['success'] = true;
            $data['message'] = "Form submitted successfully!";
            $data['data'] = "";
        }

        return $data;
    }
}
