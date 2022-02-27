@extends('layouts.app', ['activePage' => 'home', 'titlePage' => __('Dashboard')])
@section('js_after')
  <!-- Page JS Code -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0-rc"></script>
<script type="text/javascript" src="{{ asset('js/dashboard.js') }}"></script>
@endsection

@section('content')
<div class="container-fluid" style="height: auto;">
  <div class="body-page" style="margin-top: 2rem">
    <div class="row p-5">
      <div class="card-deck">
        <div class="card">
          <div class="card-body">
            <input type="hidden" id="visit" value="{{$visit}}">
            <input type="hidden" id="uniqueVisit" value="{{$uniqueVisit}}">
            <div>
              <canvas id="one-a" height="280" width="600"></canvas>
            </div>
          </div>
        </div>
        <div class="card">
          <div class="card-body">
            <input type="hidden" id="visitByChrome" value="{{$visitByChrome}}">
            <input type="hidden" id="visitByFireFox" value="{{$visitByFireFox}}">
            <input type="hidden" id="visitByOpera" value="{{$visitByOpera}}">
            <input type="hidden" id="visitBySafari" value="{{$visitBySafari}}">
            <input type="hidden" id="visitByEdge" value="{{$visitByEdge}}">
            <input type="hidden" id="uniqueVisitByChrome" value="{{$uniqueVisitByChrome}}">
            <input type="hidden" id="uniqueVisitByFirefox" value="{{$uniqueVisitByFirefox}}">
            <input type="hidden" id="uniqueVisitByOpera" value="{{$uniqueVisitByOpera}}">
            <input type="hidden" id="uniqueVisitBySafari" value="{{$uniqueVisitBySafari}}">
            <input type="hidden" id="uniqueVisitBySafari" value="{{$uniqueVisitBySafari}}">
            <div>
              <canvas id="one-b" height="280" width="600"></canvas>
            </div>
          </div>
        </div>
        <div class="card">
          <div class="card-body">
            <input type="hidden" id="visitByPhone" value="{{$visitByPhone}}">
            <input type="hidden" id="visitByTablet" value="{{$visitByTablet}}">
            <input type="hidden" id="visitByDesktop" value="{{$visitByDesktop}}">
            <input type="hidden" id="uniqueVisitByPhone" value="{{$uniqueVisitByPhone}}">
            <input type="hidden" id="uniqueVisitByTablet" value="{{$uniqueVisitByTablet}}">
            <input type="hidden" id="uniqueVisitByDesktop" value="{{$uniqueVisitByDesktop}}">
            <div>
              <canvas id="one-c" height="280" width="600"></canvas>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row p-5">
        <div class="card">
          <div class="card-body">
            <input type="hidden" id="visitByDays" value="{{json_encode($visitByDays)}}">
            <input type="hidden" id="uniqueVisitByDays" value="{{json_encode($uniqueVisitByDays)}}">
            <input type="hidden" id="labelDate" value="{{json_encode($labelDate)}}">
            <div>
              <canvas id="one-d" height="280" width="600"></canvas>
            </div>
          </div>
        </div>
    </div>
  </div>
</div>
@endsection