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
              <th width="40px">id</th>
              <th width="40px">path</th>
              <th width="30px">user_agent</th>
              <th width="100px">ip</th>
              <th width="100px">device</th>
              <th width="100px">country</th>
              <th width="100px">created_at</th>
              <th width="90px">Action</th>
            </tr>
            </thead>
          </table>
        </div>
      </div>
    </div>
  </div>
@endsection
