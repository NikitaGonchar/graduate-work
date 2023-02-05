@if(session()->has('success'))
    <div class="alert alert-success">{{session()->get('success')}}</div>
@endif
@if(session()->has('error'))
    <div class="alert alert-danger">{{session()->get('error')}}</div>
@endif
@if (session()->get('cookie-banner'))
    <!-- Cookie Banner -->
    <div id="cookie-banner" class="alert alert-dark text-center mb-0" role="alert">
        🍪 This website uses cookies to ensure you get the best experience on our website.
        <a href="https://www.cookiesandyou.com/" target="blank">Learn more</a>
        <button type="button" class="btn btn-primary btn-sm ms-3" id="accept-cookie">
            I Got It
        </button>
    </div>
    <style>
        #cookie-banner { position: fixed; bottom: 0; left: 0; width: 100%; z-index: 999; border-radius: 0; }
    </style>
    <script>
        document.getElementById('accept-cookie').addEventListener('click', function () {
            document.cookie = "cookie-accepted=1;max-age=3600";
            document.getElementById('cookie-banner').style.display = 'none';
        });
    </script>
    <!-- End of Cookie Banner -->
@endif
