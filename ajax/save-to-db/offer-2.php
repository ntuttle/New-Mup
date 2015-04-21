<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
		&times;
	</button>
	<h4 class="modal-title"><img src="WWW/IMG/logo.png" width="150" alt="SmartAdmin"></h4>
</div>
<div class="modal-body no-padding">

	<form action="" id="login-form" class="smart-form">

		<fieldset>
			<section>
				<div class="row">
					<label class="label col col-2">Username</label>
					<div class="col col-10">
						<label class="input"> <i class="icon-append fa fa-user"></i>
							<input type="email" name="email">
						</label>
					</div>
				</div>
			</section>

			<section>
				<div class="row">
					<label class="label col col-2">Password</label>
					<div class="col col-10">
						<label class="input"> <i class="icon-append fa fa-lock"></i>
							<input type="password" name="password">
						</label>
						<div class="note">
							<a href="javascript:void(0)">Forgot password?</a>
						</div>
					</div>
				</div>
			</section>

			<section>
				<div class="row">
					<div class="col col-2"></div>
					<div class="col col-10">
						<label class="checkbox">
							<input type="checkbox" name="remember" checked="">
							<i></i>Keep me logged in</label>
					</div>
				</div>
			</section>
		</fieldset>

		<footer>
			<button type="submit" class="btn btn-primary">
				Sign in
			</button>
			<button type="button" class="btn btn-default" data-dismiss="modal">
				Cancel
			</button>
		</footer>

	</form>
</div>
