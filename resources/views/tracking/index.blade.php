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
              <div class="row">
                  <div class="col-lg-12">
                      <input type="text" class="form-control" value="{{$link}}" readonly>
                  </div>
              </div>
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
                else if (
                    /Mobile|iP(hone|od)|Android|BlackBerry|IEMobile|Kindle|Silk-Accelerated|(hpw|web)OS|Opera M(obi|ini)/.test(
                        agent
                    )
                ) {
                    device = "mobile";
                }else{
                  device = "desktop";
                }
                if (!cookie) {
                    setCookie('visitor', date.getTime());
                }
                var url = window.location.href;
                /*************browser name */
                let userAgent = navigator.userAgent;
                let browserName;

                if(userAgent.match(/chrome|chromium|crios/i)){
                    browserName = "chrome";
                }else if(userAgent.match(/firefox|fxios/i)){
                    browserName = "firefox";
                }  else if(userAgent.match(/safari/i)){
                    browserName = "safari";
                }else if(userAgent.match(/opr\//i)){
                    browserName = "opera";
                } else if(userAgent.match(/edg/i)){
                    browserName = "edge";
                }else{
                    browserName="No browser detection";
                }
                $.get("https://ipinfo.io", function(response) {
                    $.ajax({
                        //L'URL de la requête
                        url:
                            "https://7fe5-196-234-237-25.ngrok.io/analytics/eyJpdiI6ImZmYTY0N3JEdDNpSUI3dGZMbkVkQ2c9PSIsInZhbHVlIjoiQXZoZHRRZFB3c3BEdUNMbUVtaHA5dz09IiwibWFjIjoiM2EwODE1OGE2Y2M4NTBmMTM5N2QxNzI4NGQ5NDY2MDgzZjI4NDNkMmEzMjg1Y2M4Yjk3ZjQ5ZDU1YTFiYjA3MyIsInRhZyI6IiJ9",
                        method: "GET",
                        data:{
                            'cookie':cookie ? cookie : getCookie('_ga'),
                            'user_agent':agent,
                            'ip':response.ip,
                            'country':response.country,
                            'device':device,
                            'path':url,
                            'browser':browserName
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
        </div>
      </div>
    </div>
  </div>
  </div>
  <script src="{{ asset('material') }}/js/core/jquery.min.js"></script>
@endsection
