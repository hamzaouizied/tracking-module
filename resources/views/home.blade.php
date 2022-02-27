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
            <input type="hidden" id="visitByBrowser" value="{{$visitByBrowser}}">
            <input type="hidden" id="uniqueVisitByBrowser" value="{{$uniqueVisitByBrowser}}">
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
            <h5 class="card-title">Card title</h5>
            <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
          </div>
        </div>
    </div>
  </div>
</div>
@endsection