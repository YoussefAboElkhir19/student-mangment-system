<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class ReportController extends Controller
{
    //
    public function report1($paymentId)
    {
        $payment = Payment::findorFail($paymentId);
        $pdf = App::make('dompdf.wrapper');
        $html = "
        <div style='margin: 20px; padding: 20px;'>
            <h1>Payment Receipt</h1>
            <hr/>
            <p>Receipt No: <b>{$paymentId}</b></p>
            <p>Enrollment No: <b>{$payment->enrollment->enrollment_no}</b></p>
            <p>Student Name: <b>{$payment->enrollment->student->name}</b></p>
            <p>Amount Paid: <b>{$payment->price}</b></p>
            <hr/>
            <h3>Batch</h3>

            <p>Batch Name: <b>{$payment->enrollment->batch->name}</b></p>
            <hr/>

            <p>Payment Date: <b>{$payment->paid_date}</b></p>
        </div>
    ";
        $pdf->loadHTML($html);
        return $pdf->stream();
        return 'djdhhd';
    }
}
