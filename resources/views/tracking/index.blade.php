@extends('layouts.app', ['activePage' => 'tracking', 'titlePage' => __('Tracking')])
<style>
    pre {
    background-color: black;
    color: #ffffff!important;
        border-radius: 61px;
    }
</style>
@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="card" style="height:100%">
          <div class="card-body">
            <h5 class="card-title">Tracking Link</h5>
            <p class="card-text">Usage</p>
            <p class="card-text">
              <pre>

                  $(document).ready(function () {
                      function getCookie(cookieName) {
                          let cookie = {};
                          document.cookie.split(';').forEach(function (el) {
                              let [key, value] = el.split('=');
                              cookie[key.trim()] = value;
                          })
                          return cookie[cookieName];
                      }
                      function setCookie(name, value, days) {
                          document.cookie = name + "=" + (value || "");
                      }
                      var info = [];
                      $.getJSON('https://api.db-ip.com/v2/free/self', function(data) {
                      info.push(JSON.stringify(data, null, 2));
                                });
                      console.log(info);
                      var date = new Date();
                      let cookie = getCookie('visitor');
                      let agent = navigator.userAgent;
                                console.log(agent)
                      if (!cookie) {
                          setCookie('visitor', date.getTime());
                      }

                      $.ajax({
                          //L'URL de la requête
                          url: "{{$link}}",
                          method: "GET",
                          data:{
                              'cookie':cookie,
                              'user_agent':agent,
                              'ip':info
                          },
                          success: function(response) {
                              console.log(response)
                          },
                          error(error) {
                              console.log(error)
                          }
                      });
                  });
              </pre>
            </p>
            <div class="row">
              <div class="col-lg-12">
                <input type="text" class="form-control" value="{{$link}}" readonly> <button type="button" class="btn btn-success">Copy</button>
              </div>
            </div>
        </div>
      </div>
    </div>
  </div>
  </div>
  <script src="{{ asset('material') }}/js/core/jquery.min.js"></script>
@endsection
