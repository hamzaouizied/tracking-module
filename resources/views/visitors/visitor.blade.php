@extends('layouts.app', ['activePage' => 'visitor', 'titlePage' => __('Visitors')])
@section('js_after')
  <!-- Page JS Code -->
  <script type="text/javascript" src="{{ asset('js/visitor.js') }}"></script>
@endsection
<style>
  div#visitor-table_filter {
    float: right;
  }
  span.material-icons {
    margin-top: 0em!important;
    margin-bottom: 0em!important;
  }
</style>
@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="card">
        <div class="card-body">
          <table class="table" id="visitor-table" style="width: 100%;">
            <thead>
            <tr>
              <th width="40px">Id</th>
              <th width="30px">User agent</th>
              <th width="30px">Browser</th>
              <th width="100px">Ip</th>
              <th width="100px">Device</th>
              <th width="100px">Country</th>
              <th width="100px">Created_at</th>
              <th width="90px">Action</th>
            </tr>
            </thead>
          </table>
        </div>
      </div>
    </div>
  </div>
@endsection
