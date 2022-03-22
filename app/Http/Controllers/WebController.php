<?php

namespace App\Http\Controllers;

use App\Mail\EnrollConfirmationMail;
use App\Models\Enroll;
use App\Models\Student;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Session;

class WebController extends Controller
{
    private $subject;
    private $subjects;
    private $student;
    private $enroll;
    private $data = [];

    public function index()
    {
        $this->subjects = Subject::where('status', 1)->orderBy('id', 'desc')->get();
        return view('website.home.home', ['subjects' => $this->subjects]);
    }
    public function detail($id)
    {
        $this->subject = Subject::find($id);
        return view('website.course.detail', ['subject' => $this->subject]);
    }
    public function enroll($id)
    {
        return view('website.course.enroll',['id' => $id]);
    }
    public function newEnroll(Request $request, $id)
    {
//        New student Create
        $this->student              = new Student();
        $this->student->name        = $request->name;
        $this->student->email       = $request->email;
        $this->student->password    = bcrypt($request->mobile);
        $this->student->mobile      = $request->mobile;
        $this->student->save();

        Session::put('student_id', $this->student->id);
        Session::put('student_name', $this->student->name);

//        Enrolled data create
        $this->enroll = New Enroll();
        $this->enroll->subject_id       = $id;
        $this->enroll->student_id       = $this->student->id;
        $this->enroll->enroll_date      = date('Y-m-d');
        $this->enroll->enroll_timestamp = strtotime('Y-m-d');
        $this->enroll->save();

        /* ===============Email send Start ==================*/
        $this->data = [
            'name'          => $request->name,
            'user_id'       => $request->email,
            'password'      => $request->mobile,
        ];
        Mail::to($request->email)->send(new EnrollConfirmationMail($this->data));

        /* ===============Email send End ==================*/

        return redirect('/course-detail/'.$id)->with('message', 'Enrolled successfully');
    }
}
