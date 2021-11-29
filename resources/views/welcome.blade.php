@include('header')
<body>

	<div class="limiter">
		<div class="container-login100" style="background-image: url('{{asset("frontend")}}/images/bgimage.jpg');">
			<div class="wrap-login100 p-t-30 p-b-50">
				<span class="login100-form-title p-b-41">
					Account Login
				</span>
                @if(session()->has('success'))

                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @endif
                @if(session()->has('notsuccess'))

                    <div class="alert alert-success">
                        {{ session()->get('notsuccess') }}
                    </div>
                @endif
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger">{{$error}}</div>
                    @endforeach
                @endif
				<form method="POST" action="{{route('login.validate')}}"  class="login100-form validate-form p-b-33 p-t-5">
                    @csrf
					<div class="wrap-input100 validate-input" data-validate = "Enter email">
						<input class="input100" type="text" name="email" placeholder="User email">
						<span class="focus-input100" data-placeholder="&#xe82a;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100" data-placeholder="&#xe80f;"></span>
					</div>

					<div class="container-login100-form-btn m-t-32">
						<button type="submit" class="login100-form-btn">
							Login
						</button>
					</div><br>
                    <center><div ><a href="{{route('reg.page')}}" style="font-size:20px"> Register here </a></div></center>

				</form>
			</div>
		</div>
	</div>


	<div id="dropDownSelect1"></div>
@include('footer')
