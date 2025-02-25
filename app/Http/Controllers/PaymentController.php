<?php

namespace App\Http\Controllers;


use App\Models\Enrollment;
use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{

    public function index()
    {
        $payments = Payment::all();
        return view('payments.index', compact('payments'));
    }
    public function show($paymentId)
    {
        $payment = Payment::findorFail($paymentId);
        return view('payments.show', compact('payment'));
    }
    public function create()
    {
        $enrolls = Enrollment::all();

        return view('payments.create', compact('enrolls'));
    }
    public function store()
    {
        // validation
        request()->validate([
            'enrollment_id' => ['required', 'exists:enrollments,id'],
            'paid_date' => ['required', 'date'],
            'price' => ['required', 'numeric']

        ]);
        // set data in variable  after validation
        // dd($enrollment_id, $paid_date, $price);
        $enrollment_id = request()->enrollment_id;
        $paid_date = request()->paid_date;
        $price = request()->price;
        // dd($price, $enrollment_id);
        // create in db
        Payment::create([
            'enrollment_id' => $enrollment_id,
            'paid_date' => $paid_date,
            'price' => $price


        ]);
        // redierct
        return redirect()->route('payments.index')->with('success', 'Created Payment Successfuly');
    }
    public function edit($paymentId)
    {
        $payment = Payment::findorFail($paymentId);
        $enrolls = Enrollment::all();
        return view('payments.edit', compact('payment', 'enrolls'));
    }
    public function update($paymentId)
    {
        request()->validate([
            'enrollment_id' => ['exists:enrollments,id'],
            'paid_date' => ['date'],
            'price' => ['numeric']

        ]);
        $enrollment_id = request()->enrollment_id;
        $paid_date = request()->paid_date;
        $price = request()->price;
        $payment = Payment::findorFail($paymentId);
        $payment->update([

            'enrollment_id' => $enrollment_id,
            'paid_date' => $paid_date,
            'price' => $price

        ]);
        return redirect()->route('payments.index')->with('success', 'Update Payment Successfuly');
    }
    public function destroy($paymentId)
    {
        $payment = Payment::findorFail($paymentId);
        $payment->delete();
        return redirect()->route('payments.index')->with('delete', 'Deleted Payment Successfuly');
    }
}
