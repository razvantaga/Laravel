<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function __construct() {
        $this->middleware('auth:admin');
    }

    public function todayOrder() {
        $today = date('d-m-y');
        $order = DB::table('orders')->where('status', 0)->where('date', $today)->get();
        return view('admin.report.today_order', compact('order'));
    }

    public function todayDelivery() {
        $today = date('d-m-y');
        $order = DB::table('orders')->where('status', 3)->where('date', $today)->get();
        return view('admin.report.today_delivery', compact('order'));
    }

    public function thisMonth() {
        $month = date('F');
        $order = DB::table('orders')->where('status', 3)->where('month', $month)->get();
        return view('admin.report.this_month', compact('order'));
    }

    public function searchReport() {
        return view('admin.report.search');
    }

    public function searchByDate(Request $request) {
        $date = date('d-m-y', strtotime($request->date));
        $total = DB::table('orders')->where('status', 3)->where('date', $date)->sum('total');
        $order = DB::table('orders')->where('status', 3)->where('date', $date)->get();
        return view('admin.report.search_date', compact('order', 'total'));
    }

    public function searchByMonth(Request $request) {
        $month = $request->month;
        $total = DB::table('orders')->where('status', 3)->where('month', $month)->sum('total');
        $order = DB::table('orders')->where('status', 3)->where('month', $month)->get();
        return view('admin.report.search_month', compact('order', 'total'));
    }

    public function searchByYear(Request $request) {
        $year = $request->year;
        $total = DB::table('orders')->where('status', 3)->where('year', $year)->sum('total');
        $order = DB::table('orders')->where('status', 3)->where('year', $year)->get();
        return view('admin.report.search_year', compact('order', 'total'));
    }
}
