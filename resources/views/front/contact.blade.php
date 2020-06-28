@extends('layouts.front')
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
					<tr class="form-separation"></tr>
					<tr class="form-separation"></tr>
					<tr><td><span>Name <sup>(Required)</sup></span></td></tr>
					<tr><td><input type="text" style="width:100%;"></td></tr>
					<tr class="form-separation"></tr>
					<tr><td><span>Email <sup>(Required)</sup></span></td></tr>
					<tr><td><input type="email" style="width:100%;"></td></tr>
					<tr class="form-separation"></tr>
					<tr><td><span>Type <sup>(Required)</sup></span></td></tr>
					<tr><td>
						<select id="type" style="width:100%;">
							<option value="broken-link">Broken Link</option>
							<option value="request">Request</option>
							<option value="copyright">Copyright</option>
							<option value="other">Other</option>
						</select>
					</td></tr>
					<tr class="form-separation"></tr>
					<tr><td><span>Subject <sup>(Required)</sup></span></td></tr>
					<tr><td><textarea type="text" style="width:100%;" rows="10"></textarea></td></tr>
					<tr class="form-separation"></tr>
					<tr><td><center>INSERT GOOGLE CAPTCHA</center></td></tr>
					<tr class="form-separation"></tr>
					<tr><td>
						<center><a href="#" class="btn-default"><i class="icon-message"></i> Send</a></center>
					</td></tr>
				</tbody>
			</table>
		</div>
	</div>
</section><!--services-sec end-->
@endsection