@extends('backend.master')
@section('content')
<div style="padding:15px">
<h2 style="text-align:center">Crisis Types</h2>
<a href="{{route('crisistypes.create')}}" class="btn btn-outline-primary text black">Add Crisis Types</a>

<table class="table table-primary table-striped critypes">
<thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Date</th>
      <th scope="col">Name</th>
      <th scope="col">Status</th>
      <th scope="col">Action</th>

    </tr>
  </thead>
  <tbody>
  </tbody>
</table>
</div>
@endsection

@push('js')

    <script type="text/javascript">
        $(function () {
            var table = $('.critypes').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('crisis.types') }}",
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'date', name: 'date',searchable: true},
                    {data: 'name', name: 'name'},
                    {data: 'status', name: 'status'},
                    {
                        data: 'action',
                        name: 'action',
                        orderable: true,
                        searchable: true
                    },
                ]
            });
        });
    </script>
@endpush