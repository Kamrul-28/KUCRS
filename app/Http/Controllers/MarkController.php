<?php

namespace App\Http\Controllers;

use App\Models\Discipline;
use App\Models\Mark;
use App\Models\RegisteredCourse;
use App\Models\Registration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Dompdf\Dompdf;
use Illuminate\View\View;

class MarkController extends Controller
{

    public function index()
    {
        $request = [];
        $discipline = Discipline::all();
        return view('backend.mark.marks', compact(['request', 'discipline']));
    }


    public function create(Request $request)
    {
        $request->validate([
            'registration_type' => 'required',
            'discipline_id' => 'required',
            'term' => 'required',
            'year' => 'required',
            'enrollment_session' => 'required',
        ]);

        $registration = Registration::join('users', 'users.id', '=', 'registrations.student_id')
            ->leftJoin('user_details', 'user_details.user_id', '=', 'users.id')
            ->where('registrations.registration_type', $request->registration_type)
            ->where('registrations.discipline_id', $request->discipline_id)
            ->where('registrations.enrollment_term', $request->term)
            ->where('registrations.enrollment_year', $request->year)
            ->where('registrations.enrollment_session', $request->enrollment_session)
            ->where('registrations.is_completed', 6)
            ->select('registrations.*', 'registrations.id as reg_id', 'users.*', 'user_details.*')
            ->get();


        return view('backend.mark.create', compact(['registration']));
    }

    public function generate($id)
    {
        $id = Crypt::decrypt($id);

        $registered_courses = RegisteredCourse::join('courses', 'courses.id', '=', 'registered_courses.course_id')
            ->join('registrations', 'registrations.id', '=', 'registered_courses.registration_id')
            ->join('users', 'users.id', '=', 'registrations.student_id')
            ->join('user_details', 'user_details.user_id', '=', 'registrations.student_id')
            ->where('registered_courses.registration_id', $id)
            ->select('courses.*', 'courses.id as cid', 'registrations.*', 'users.*')->get();

        $user = RegisteredCourse::join('courses', 'courses.id', '=', 'registered_courses.course_id')
            ->join('registrations', 'registrations.id', '=', 'registered_courses.registration_id')
            ->join('users', 'users.id', '=', 'registrations.student_id')
            ->join('user_details', 'user_details.user_id', '=', 'registrations.student_id')
            ->where('registered_courses.registration_id', $id)
            ->select('courses.*', 'users.name', 'user_details.student_id')->first();
        $registration_id = $id;
        return view('backend.mark.generate', compact(['registered_courses', 'user', 'registration_id']));
    }

    public function store(Request $request)
    {

        $size = sizeof($request->cid);
        for ($i = 0; $i < $size; $i++) {
            $ct_marks = array();

            $marks = new Mark();
            $marks->registration_id = $request->registration_id;
            $marks->course_id = $request->cid[$i];
            $marks->attendance = $request->attendance[$i];
            $marks->ctOne = $request->ct1[$i];
            $marks->ctTwo = $request->ct2[$i];
            $marks->ctThree = $request->ct3[$i];
            $marks->total_class_test_marks = ($marks->ctOne + $marks->ctTwo + $marks->ctThree);
            $marks->sectionA = $request->secA[$i];
            $marks->sectionB = $request->secB[$i];
            $marks->total_mark_in_exam = $marks->sectionA + $marks->sectionB;
            $marks->avg_class_test_marks = $marks->total_class_test_marks / 3;


            array_push($ct_marks, $marks->ctOne, $marks->ctTwo, $marks->ctThree);
            rsort($ct_marks);

            $avg = (($ct_marks[0] + $ct_marks[1]) / 2);
            $ct_mark_avg = ceil($avg);
            $marks->avg_class_test_marks = $ct_mark_avg;
            $marks->final_mark = $marks->total_mark_in_exam + $marks->avg_class_test_marks + $marks->attendance;
            $marks->save();
            unset($ct_marks);
        }
        return redirect()->route('mark.marks');

    }

    public function edit(Mark $mark)
    {
        //
    }

    public function update(Request $request, Mark $mark)
    {
        //
    }

    public function destroy(Mark $mark)
    {
        //
    }
    public function getResult()
    {
        $request = [];
        $discipline = Discipline::all();
        return view('backend.mark.forResult', compact(['request', 'discipline']));
    }
    public function printResult(Request $request)
    {
        // $registration = Registration::join('users', 'users.id', '=', 'registrations.student_id')
        //     ->leftJoin('user_details', 'user_details.user_id', '=', 'users.id')
        //     ->leftJoin('marks', 'marks.registration_id', '=', 'registrations.id')
        //     ->where('registrations.registration_type', $request->registration_type)
        //     ->where('registrations.discipline_id', $request->discipline_id)
        //     ->where('registrations.enrollment_term', $request->term)
        //     ->where('registrations.enrollment_year', $request->year)
        //     ->where('registrations.enrollment_session', $request->enrollment_session)
        //     ->where('registrations.is_completed', 6)
        //     ->select('registrations.*', 'registrations.id as reg_id', 'users.*', 'user_details.*','marks.*')
        //     ->get();

        // return $registration;
        $rr = Registration::leftjoin('marks','marks.registration_id','=','registrations.id')->get();
        $r = Mark::leftjoin('registrations','registrations.id','=','marks.registration_id')->get();
        return $rr;
        $dompdf = new Dompdf();
        $pdfContent = View::make('mark.print',compact(['registration']))->render();
        $dompdf->loadHtml($pdfContent);

        // (Optional) Set any desired configuration options
        $dompdf->setPaper('A4', 'portrait');

        // Render the PDF
        $dompdf->render();

        // Output the PDF as a response with appropriate headers
        return response($dompdf->output(), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="result.pdf"',
        ]);
    }
}