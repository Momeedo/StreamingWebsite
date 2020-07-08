@extends('layouts.front')
@section('title')
Contact - nfoot.net, The Live Sports Channels Streaming Platform!
@endsection
@section('meta')
<meta property="og:title" content="Contact - nfoot.net, The Live Sports Channels Streaming Platform!">
<meta property="og:description" content="Watch free Live Streaming of sports channels in HD and with no interruptions (beIN Sports, SKy Sports, RMC Sport, AlKaas, Movistar and more!)">
<meta property="og:image" content="{{url('/front/images/website_header.jpg')}}">
<meta property="og:url" content="https://nfoot.net">
<meta name="twitter:title" content="Contact - nfoot.net, The Live Sports Channels Streaming Platform!">
<meta name="twitter:description" content="Watch free Live Streaming of sports channels in HD and with no interruptions (beIN Sports, SKy Sports, RMC Sport, AlKaas, Movistar and more!)">
<meta name="twitter:image" content="{{url('/front/images/website_header.jpg')}}">
<meta name="twitter:card" content="{{url('/front/images/website_header.jpg')}}">
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
@endsection
@section('content')
<section class="vds-main">
    <div class="container">
        <div class="vidz_sec">
            <span class="page-title"><i class="icon-message"></i> Contact</span>
            <div class="vidz_list">
                <div class="row">

                </div>
            </div>
        </div>

        <div class="vidz_list">
            <table style="width:100%;">
                <tbody>
                    <form method="post" action="{{ route('contact-create') }}" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <tr class="form-separation"></tr>
                        <tr class="form-separation"></tr>
                        @if($errors->any())
                        <br>
                        <div class="col-lg-12 mb-4">
                            <div class="card bg-primary text-white shadow">
                                <div class="card-body">
                                    <b><i class="fas fa-exclamation-triangle"></i> </b>{{$errors->first()}}
                                </div>
                            </div>
                        </div>
                        @endif
                        <tr>
                            <td><span>Name <sup>(Required)</sup></span></td>
                        </tr>
                        <tr>
                            <td><input name="username" type="text" style="width:100%;" @if ($user) value="{{$user->name}}" @endif></td>
                        </tr>
                        <tr class="form-separation"></tr>
                        <tr>
                            <td><span>Email <sup>(Required)</sup></span></td>
                        </tr>
                        <tr>
                            <td><input type="email" name="email" style="width:100%;" @if ($user) value="{{$user->email}}" @endif></td>
                        </tr>
                        <tr class="form-separation"></tr>
                        <tr>
                            <td><span>Type <sup>(Required)</sup></span></td>
                        </tr>
                        <tr>
                            <td>
                                <select name="type" id="type" style="width:100%;">
                                    <option value="broken-link">Broken Link</option>
                                    <option value="request">Request</option>
                                    <option value="copyright">Copyright</option>
                                    <option value="other">Other</option>
                                </select>
                            </td>
                        </tr>
                        <tr class="form-separation"></tr>
                        <tr>
                            <td><span>Subject/Link <sup>(Required)</sup></span></td>
                        </tr>
                        <tr>
                            <td><textarea type="text" name="subject" style="width:100%;" rows="10"></textarea></td>
                        </tr>
                        <tr class="form-separation"></tr>
                        <tr>
                            <td>
                                <center>
                                    <div id="recaptcha-div"></div>
                                </center>
                            </td>
                        </tr>
                        <tr class="form-separation"></tr>
                        <tr>
                            <td>
                                <center><button type="submit" class="btn-default"><i class="icon-message"></i> Send</button></center>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div style="height:100px;"></div>
                            </td>
                        </tr>
                    </form>
                </tbody>
            </table>
        </div>
    </div>
</section>
<!--services-sec end-->
@endsection
@section('js')
<script>
var onloadCallback = function() {
	grecaptcha.render('recaptcha-div', {
    'sitekey' : '6LexA68ZAAAAALcJlb6fOejI9zKS'
  });
};
$('form').on('submit', function(e) {
  if(grecaptcha.getResponse() == "") {
    e.preventDefault();
    alert("You need to check the Captcha before proceeding!");
  }
});
</script>
onloadCallback();
@endsection