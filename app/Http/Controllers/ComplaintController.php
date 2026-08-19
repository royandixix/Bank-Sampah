<?php

namespace App\Http\Controllers;

use App\Models\{Complaint, ComplaintStatusHistory};
use App\Http\Requests\StoreComplaintRequest;
use Illuminate\Http\Request;

class ComplaintController extends Controller
{
    public function index()
    {
        $u = auth()->user();
        $q = Complaint::with('customer');
        if ($u->role === 'nasabah') $q->where('customer_id', $u->id);
        return view('complaints.index', ['complaints' => $q->latest()->paginate(10)]);
    }
    public function create()
    {
        return view('complaints.create');
    }
    public function store(StoreComplaintRequest $r)
    {
        $d = $r->validated();
        if ($r->hasFile('attachment')) $d['attachment'] = $r->file('attachment')->store('complaints', 'public');
        $d['customer_id'] = auth()->id();
        $d['status'] = 'open';
        $c = Complaint::create($d);
        ComplaintStatusHistory::create(['complaint_id' => $c->id, 'from_status' => null, 'to_status' => 'open', 'changed_by' => auth()->id()]);
        return redirect()->route('complaints.index')->with('success', 'Pengaduan terkirim.');
    }
    public function update(Request $r, Complaint $complaint)
    {
        abort_unless(in_array(auth()->user()->role, ['admin', 'petugas'], true), 403);
        $d = $r->validate(['status' => ['required', 'in:processed,resolved,closed'], 'response' => ['nullable', 'string', 'max:1500']]);
        $old = $complaint->status;
        $complaint->update($d);
        ComplaintStatusHistory::create(['complaint_id' => $complaint->id, 'from_status' => $old, 'to_status' => $d['status'], 'changed_by' => auth()->id(), 'notes' => $d['response'] ?? null]);
        return back()->with('success', 'Pengaduan diperbarui.');
    }
}
