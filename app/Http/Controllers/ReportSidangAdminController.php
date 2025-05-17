<?php

namespace App\Http\Controllers;

use App\Models\jadwalta;
use App\Models\nilaitamahasiswa;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class ReportSidangAdminController extends Controller
{
    public function index()
    {
        return view('admin.report.index');
    }
    public function reportsidang()
    {
        $jadwaltas = jadwalta::all();
    

        $pdf = PDF::loadView('admin.report.sidang', compact('jadwaltas'));
        return $pdf->download('dosen_penguji_report.pdf');
    }
    public function reportstatus()
    {
        $nilaitas = nilaitamahasiswa::all();
    

        $pdf = PDF::loadView('admin.report.status', compact('nilaitas'));
        return $pdf->download('report_status_kelulusan_mahasiswa.pdf');
    }

    /**
     * Show the form for creating a new resource.
     */


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
