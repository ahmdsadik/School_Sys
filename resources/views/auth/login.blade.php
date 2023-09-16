<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() == 'ar'? 'rtl' : '' }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ __('login.login') }}</title>

    @if(app()->getLocale() == 'ar')

        <!-- Bootstrap rtl -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.rtl.min.css">
    @else

        <!-- Bootstrap -->
        <link rel="stylesheet"
              href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    @endif

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;500;600;700;800&display=swap"
          rel="stylesheet">

</head>

<style>
    body {
        font-family: 'Cairo', sans-serif;
    }
</style>
<body>

<!-- Sign up form -->
<section class="signup bg-light">
    <div class="container  vh-100 d-flex align-items-center justify-content-center p-4">
        <div class="bg-white py-5  shadow-lg rounded row ">
            <h3 class="text-center p-2 mb-2">{{ __('login.login') }}</h3>
            <h4 class="text-center p-1 mb-b2 text-primary">{{ __('login.sys_name') }}</h4>
            <form class=" col ps-md-5" method="POST" action="{{ route('login') }}">
                @csrf
                <div class="mb-4">
                    <label for="email" class="form-label ">{{ __('login.email') }}</label>
                    <input type="email" class="rounded-0 form-control @error('email') is-invalid @enderror" name="email" id="email" aria-describedby="emailHelp"
                           required autocomplete="email" autofocus>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong class="text-danger">{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="password" class="form-label">{{ __('login.password') }}</label>
                    <input type="password" class="rounded-0 form-control @error('password') is-invalid @enderror" name="password" id="password">
                    @error('password')
                    <span class="invalid-feedback alert-danger" role="alert">
                        <strong class="text-danger">{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="mb-4 form-check">
                    <input type="checkbox" class="form-check-input rounded-0" name="remember" id="remember-me" {{ old('remember') ? 'checked' : '' }}>
                    <label class="form-check-label" for="remember-me">{{ __('login.remember_me') }}</label>
                </div>
                <button type="submit" class="rounded-0 btn btn-primary w-100">{{ __('login.login') }}</button>
            </form>
            <div class="col d-flex justify-content-center d-lg-flex d-none">
                <figure><img class="w-100" src="{{ asset('assets/login-form/images/signup-image.jpg') }}"
                             alt="sing up image"></figure>
            </div>
        </div>
    </div>
</section>

</body>
</html>
