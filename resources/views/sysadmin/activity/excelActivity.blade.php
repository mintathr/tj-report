<table>
    <thead>
        <tr>
            <th style="width: 1%">No</th>
            <th>Tanggal</th>
            <th>Halte</th>
            <th>Nomor Tiket</th>
            <th>Help Topic</th>
            <th>NIK</th>
            <th>Nama</th>
            <th>Problem</th>
            <th>Root Cause</th>
            <th>Action</th>
            <th>Status</th>
            <th>Assign To</th>
        </tr>
    </thead>
    <tbody>
        @foreach($activities as $activity)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $activity->created_at->toDateString() }}
            </td>
            <td>{{ $activity->busstopAkhir->koridor == 99 ? 'Non BRT' : '(Koridor '. $activity->busstopAkhir->koridor .')' }} - {{ $activity->busstopAkhir->nama_halte }}</td>
            <td>{{ $activity->nomor_tiket }}</td>
            <td>{{ $activity->helpTopic->topic_name }}</td>
            <td>{{ $activity->user_id }}</td>
            <td>{{ $activity->user->name }}</td>
            <td>{{ $activity->problem }}</td>
            <td>{{ $activity->root_cause }}</td>
            <td>{{ $activity->action }}</td>
            <td>
                @if($activity->status == 'Open')
                <h5><span class="badge badge-danger">Open</span></h5>
                @elseif($activity->status == 'Close')
                <h5><span class="badge badge-success">Close</span></h5>
                @elseif(is_null($activity->status))
                <h5><span class="badge badge-warning">On Progress</span></h5>
                @endif
            </td>
            <td>{{ $activity->assign_to }}</td>
        </tr>
        @endforeach
    </tbody>
</table>