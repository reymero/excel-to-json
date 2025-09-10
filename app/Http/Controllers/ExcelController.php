<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Mail;
use App\Mail\ExcelDataMail;

class ExcelController extends Controller
{
    public function uploadExcel(Request $request)
    {
        // Check for Excel format
        $request->validate([
            'excel_file' => 'required|mimes:xlsx,xls,csv|max:2048',
        ]);

        // Get the uploaded file
        $file = $request->file('excel_file');

        // Optionally, store the file in the local disk (Wrote this for test but it is removable)
        $path = $file->store('excel_files', 'local');

        // Parse the Excel file into an array
        $data = Excel::toArray([], $file);

        // Get the first sheet's data
        $excelData = $data[0];

        // Get the number of rows and columns
        $rowsCount = count($excelData);
        $columnsCount = count($excelData[0]);

        // Pass the parsed data to maneuver it
        return view('process', compact('rowsCount','columnsCount','excelData'));

    }


    public function sendEmail(Request $request)
    {
        $excelData = $request->input('json_data'); // this will be a JSON string from the form

        // decode to array
        $excelDataArray = json_decode($excelData, true);

        // send email
        Mail::to('hello@example.com')->send(new ExcelDataMail($excelDataArray));

        return redirect('/upload')
            ->with('success', 'Email sent successfully!')
            ->with('excelData', $excelDataArray);
    }


}
