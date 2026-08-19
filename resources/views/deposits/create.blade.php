@extends('layouts.app') @section('title', 'Catat Setoran') @section('content')<div class="card">
    <div class="card-body">
        <form method="post" action="{{ route('deposits.store') }}">@csrf<div class="row g-3">
                <div class="col-md-6"><label>Nasabah</label><select class="form-select" name="customer_id" required>
                        @foreach ($customers as $u)
                            <option value="{{ $u->id }}">{{ $u->name }} - {{ $u->email }}</option>
                        @endforeach
                    </select></div>
                <div class="col-md-6"><label>Tanggal</label><input type="date" class="form-control"
                        name="deposit_date" value="{{ old('deposit_date', date('Y-m-d')) }}" required></div>
            </div>
            <hr>
            <h6>Item Sampah</h6>
            <div id="items"></div><button type="button" class="btn btn-outline-success btn-sm"
                onclick="addItem()">+ Tambah Item</button>
            <div class="mt-3"><label>Catatan</label>
                <textarea class="form-control" name="notes"></textarea>
            </div><button class="btn btn-success mt-3">Simpan Setoran</button>
        </form>
    </div>
</div>@endsection @push('scripts')
<script>
    const wastes = @json($wastes->map(fn($w) => ['id' => $w->id, 'name' => $w->name, 'price' => $w->price_per_kg]));
    let idx = 0;

    function addItem() {
        let opts = wastes.map(w =>
            `<option value="${w.id}">${w.name} - Rp ${Number(w.price).toLocaleString('id-ID')}/kg</option>`).join(
            '');
        document.getElementById('items').insertAdjacentHTML('beforeend',
            `<div class="row g-2 mb-2 item"><div class="col-md-7"><select class="form-select" name="items[${idx}][waste_id]">${opts}</select></div><div class="col-md-4"><input class="form-control" type="number" step="0.01" min="0.01" name="items[${idx}][weight_kg]" placeholder="Berat kg" required></div><div class="col-md-1"><button type="button" class="btn btn-danger" onclick="this.closest('.item').remove()">×</button></div></div>`
            );
        idx++
    }
    addItem();
</script>
@endpush
