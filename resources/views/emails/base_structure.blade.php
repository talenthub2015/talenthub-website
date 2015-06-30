<style>
    .body {
        background: {{asset('site_images/talenthub.jpg')}} cover fixed; }

    .email_body_container {
        width: 800px;
        margin: 0px auto;
        border: 1px solid #1a1a1a; }
    .email_body_container .header {
        background: #203f15;
        box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.75);
        -moz-box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.75);
        -webkit-box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.75); }
    .email_body_container .header:after
    {
        content:'';
        display: table;
        width:100%;
        height:1px;
    }
    .email_body_container .header .logo {
        position: relative;
        float: left;
        max-width: 100px; }
    .email_body_container .header .logo img
    {
        width:100%;
        max-width:100px;
    }
    .email_body_container .header .logo:after
    {
        content:'';
        display:table;
        width:100%;
    }
    .email_body_container .container {
        padding: 15px;
        background: rgba(255, 255, 255, 0.9);
        font-size: 14px;
        font-weight: 300;
        color: #1a1a1a; }
    .email_body_container .container p {
        margin-bottom: 15px; }
    .email_body_container .footer {
        background: #203f15;
        box-shadow: -5px 5px 10px rgba(0, 0, 0, 0.75);
        -moz-box-shadow: -5px 5px 10px rgba(0, 0, 0, 0.75);
        -webkit-box-shadow: -5px 5px 10px rgba(0, 0, 0, 0.75); }
</style>
<div class="body">


<link rel="stylesheet" href="{{asset("css/emails.css")}}" />
    <div class="email_body_container">
        <div class="header">
            <div class="logo">
                <img src="{{asset('site_images/talenthub_logo.png')}}">
            </div>
        </div>

        <div class="container">
            @yield('content')
        </div>

        <div class="footer">

        </div>
    </div>

</div>