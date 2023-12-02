<table>
    <thead>
        <tr>
            <th style="width: 1%">No</th>
            <th>Tanggal</th>
            <th>Halte</th>
            <th>Serial Number</th>
            <th>Status</th>
            <th>Nama Barang</th>
            <th>Merk</th>
            <th>Petugas</th>
        </tr>
    </thead>
    <tbody>
        @foreach($inventaris as $inventory)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $inventory->created_at->toDateString() }}
            </td>
            <td>{{ $inventory->halteId->koridor == 99 ? 'Non BRT' : '(Koridor '. $inventory->halteId->koridor .')' }} - {{ $inventory->halteId->nama_halte }}</td>
            <td>{{ $inventory->serial_number }}</td>
            <td>{{ $inventory->status }}</td>
            <td>{{ $inventory->item->name }}</td>
            <td>{{ $inventory->brand->name }}</td>
            <td>{{ $inventory->user->name }}</td>
        </tr>
        @endforeach
    </tbody>
</table>