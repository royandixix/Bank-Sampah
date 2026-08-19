@extends('layouts.app') @section('title', 'Setoran Sampah') @section('content')<div class="d-flex gap-2 mb-3">
    <form class="d-flex gap-2 flex-grow-1"><input class="form-control" name="search" value="{{ request('search') }}"
            placeholder="Kode / nama nasabah"><select class="form-select" name="status">
            <option value="">Semua status</option>
            @foreach (['pending', 'weighed', 'completed', 'cancelled'] as $s)
                <option @selected(request('status') === $s)>{{ $s }}</option>
            @endforeach
        </select>
        <button class="btn btn-outline-secondary">Filter</button>
    </form>
    @if (in_array(auth()->user()->role, ['admin', 'petugas']))
        <a class="btn btn-success" href="{{ route('deposits.create') }}">+ Setoran</a>
    @endif
</div>
<div class="card">
    <div class="table-responsive">
        <table class="table mb-0">
            <thead>
                <tr>
                    <th>Kode</th>
                    <th>Tanggal</th>
                    <th>Nasabah</th>
                    <th>Berat</th>
                    <th>Total</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse($deposits as $d)
                    <tr>
                        <td><a href="{{ route('deposits.show', $d) }}">{{ $d->code }}</a></td>
                        <td>{{ $d->deposit_date->format('d/m/Y') }}</td>
                        <td>{{ $d->customer->name }}</td>
                        <td>{{ $d->total_weight }} kg</td>
                        <td>Rp {{ number_format($d->total_amount, 0, ',', '.') }}</td>
                        <td><span class="badge bg-secondary">{{ $d->status }}</span></td>
                </tr>@empty<tr>
                        <td colspan="6" class="text-center">Data kosong</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
<div class="mt-3">{{ $deposits->links() }}</div>@endsection
