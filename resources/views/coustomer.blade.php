@extends('master')
@section('mainSection')
  <div class="col-md-12">
    <div class="card">
      <div class="card-header card-header-info">
        <h4 class="card-title pl-3">All Coustomers</h4>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table data_table">
            <thead class=" text-primary">
              <th>
                No
              </th>
              <th>
                Date
              </th>
              <th>
                Name
              </th>
              <th>
                Mobile
              </th>
              <th>
                Address
              </th>
            </thead>
            <tbody>
              @php
                  $n = 0;
              @endphp
              @foreach ($rows as $row)
                <tr>
                  <td>
                    {{++$n}}
                  </td>
                  <td>
                    {{$row->date}}
                  </td>
                  <td>
                    {{$row->name}}
                  </td>
                  <td>
                    {{$row->phone}}
                  </td>
                  <td>
                    {{$row->address}}
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
@endsection