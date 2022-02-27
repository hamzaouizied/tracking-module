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
                       /*******get cookie*****/
                       function getCookie(cookieName) {
                         let cookie = {};
                         document.cookie.split(';').forEach(function (el) {
                           let [key, value] = el.split('=');
                           cookie[key.trim()] = value;
                         })
                         return cookie[cookieName];
                       }
                       /*******set cookie*****/
                       function setCookie(name, value, days) {
                         document.cookie = name + "=" + (value || "");
                       }
                       /************/
                       var date = new Date();
                       let cookie = getCookie('visitor');
                       let agent = navigator.userAgent;
                       /***get device type ****/
                       var device = ''
                      if (/(tablet|ipad|playbook|silk)|(android(?!.*mobi))/i.test(agent)) {
                        device = "tablet";
                      }
                      if (
                        /Mobile|iP(hone|od)|Android|BlackBerry|IEMobile|Kindle|Silk-Accelerated|(hpw|web)OS|Opera M(obi|ini)/.test(
                          agent
                        )
                      ) {
                        device = "mobile";
                      }
                      device = "desktop";
                       if (!cookie) {
                         setCookie('visitor', date.getTime());
                       }

                    $.get("https://ipinfo.io", function(response) {
                                   $.ajax({
                         //L'URL de la requête
                         url: "https://52b0-196-234-237-25.ngrok.io/analytics/eyJpdiI6ImhHV21zdWNYa0xHYkVlenA1aHJGZUE9PSIsInZhbHVlIjoiWFJCcGlEVnhId2FRWWVNc3RpMjdVZz09IiwibWFjIjoiOThhOTVmMmM2ZWEyMzNkOTI5YTIzOWFkYzExYWE0ZjQzNDllMDE2NzQ1MWNhODU0ZDc5Y2QyOGYzMDk4MTRjOCIsInRhZyI6IiJ9",
                         method: "GET",
                         data:{
                           'cookie':cookie ? cookie : getCookie('_ga'),
                           'user_agent':agent,
                           'ip':response.ip,
                           'country':response.country,
                           'device':device
                         },
                         success: function(response) {
                           console.log(response)
                         },
                         error: function(error) {
                         }
                       });
                        }, "json")

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
