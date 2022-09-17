<!DOCTYPE html>
<html lang="en-US">
<head>
    <title>Loan</title>
    <!-- fav icon -->
    <link rel="icon" href="{{ asset('assets') }}/images/favicon.svg" type="image/gif/x-icon" />
    <!-- meta tag -->
    <meta charset="UTF-8" />
    <meta name="author" content="abc.com" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <!-- meta keywords -->
    <meta name="keywords" content="template, webdesign, html, css" />
    <meta name="robots" content="NOODP,index,follow" />
    <!-- font awesome -->
    <link rel="stylesheet" href="{{ asset('assets') }}/css/font-awesome-4.7.0.min.css" />
    <!-- bootstrap css -->
    <link rel="stylesheet" href="{{ asset('assets') }}/css/bootstrap.min.css" />
    <!-- main stylesheet -->
    <link rel="stylesheet" href="{{ asset('assets') }}/css/style.css" />
    <!-- responsive stylesheet -->
    <link rel="stylesheet" href="{{ asset('assets') }}/css/responsive.css" />
</head>
<body>
    <div class="form_area">
        <div class="container">
            <!-- login box -->
            <div class="main_box active_box_1">
                <div class="single_box">
                    <!-- items -->
                    <div class="gap_1">
                        <div class="left_form_box">
                            <div class="form_title">
                                <h1>Log in your <br>account</h1>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                            </div>

                           
                            
                        </div>
                    </div>
                    <!-- items -->

                    <!-- items -->
                    <div class="gap_2">
                        <div class="right_form_box">
                            <div class="form_images">
                                <img src="{{ asset('assets') }}/images/img-1.svg" alt="">
                            </div> 
                                    <!-- items -->
                                    <div class="form_gap">
                                        <div class="submit_btn"> <a class="primary_btn" href="{{ url('admin/login') }}">Log in as Admin</a>  </div>
                                        <div class="submit_btn"> <a class="primary_btn" href="{{ url('institution/login') }}">Log in as Institution</a></div>
                                        <div class="submit_btn"><a class="primary_btn" href="{{ url('cashier/login') }}">Log in as Cashier</a></div>
                                        <div class="submit_btn"><a class="primary_btn" href="{{ url('customer/login') }}">Log in as Customer</a></div>
                                    </div>
                                   
                        </div>
                    </div>
                    <!-- items -->
                </div>
            </div>
            <!-- login box -->

            <!-- signUp box -->
            <div class="main_box active_box_2">
                <div class="single_box">
                    <!-- items -->
                    <div class="gap_1">
                        <div class="left_form_box">
                            <div class="form_title">
                                <h1>Create an <br>account</h1>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                            </div>

                            <div class="sineup">
                                <p>Already Have an Account?</p>
                                <a href="#" class="signIn">Sign In</a>
                            </div>
                        </div>
                    </div>
                    <!-- items -->

                    <!-- items -->
                    <div class="gap_2">
                        <div class="right_form_box">
                            <div class="form_images">
                                <img src="{{ asset('assets') }}/images/img-1.svg" alt="">
                            </div>

                            <form  method="POST" action="{{ route('register') }}">
                                @csrf
                                <div class="form_box">
                                    <!-- items -->
                                    <div class="form_gap_2">
                                        <div class="input_box">
                                            <input type="text" placeholder="First Name" value="{{ old('first_name') }}" required name="first_name">
                                            @error('first_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <!-- items -->

                                    <!-- items -->
                                    <div class="form_gap_2">
                                        <div class="input_box">
                                            <input type="text" placeholder="Last Name" value="{{ old('last_name') }}" required name="last_name">
                                            @error('last_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <!-- items -->

                                    <!-- items -->
                                    <div class="form_gap_2">
                                        <div class="input_box">
                                            <input type="email" placeholder="enter your email" value="{{ old('email') }}" required name="email">
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <!-- items -->

                                    <!-- items -->
                                    <div class="form_gap_2">
                                        <div class="input_box">
                                            <input type="number" placeholder="mobile no." value="{{ old('phone') }}" required name="phone">
                                            @error('phone')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <!-- items -->

                                    <!-- items -->
                                    <div class="form_gap_2">
                                        <div class="input_box">
                                            <input type="password" placeholder="Enter password" name="password">
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <!-- items -->

                                    <!-- items -->
                                    <div class="form_gap_2">
                                        <div class="input_box">
                                            <input type="password" placeholder="Enter confirm password" name="password_confirmation">
                                        </div>
                                    </div>
                                    <!-- items -->

                                    <!-- items -->
                                    <div class="form_gap">
                                        <div class="submit_btn">
                                            <button class="primary_btn" type="submit">Sign Up</button>
                                        </div>
                                    </div>
                                    <!-- items -->
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- items -->
                </div>
            </div>
            <!-- signUp box -->

            <!-- box -->
            <div class="main_box active_box_3">
                <div class="single_box">
                    <!-- items -->
                    <div class="gap_1">
                        <div class="left_form_box">
                            <div class="form_title">
                                <h1>Reset your <br>Password</h1>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut</p>
                            </div>

                            
                        </div>
                    </div>
                    <!-- items -->

                    <!-- items -->
                    <div class="gap_2">
                        <div class="right_form_box">
                            <div class="form_images">
                                <img src="{{ asset('assets') }}/images/img-1.svg" alt="">
                            </div>

                            <form action="" method="">
                                <div class="form_box">
                                    <!-- items -->
                                    <div class="form_gap">
                                        <div class="input_box">
                                            <input type="text" placeholder="Enter your Email or mobile no.">
                                        </div>
                                    </div>
                                    <!-- items -->

                                    <!-- items -->
                                    <div class="form_gap">
                                        <div class="submit_btn">
                                            <button type="button" name="next" value="Next" class="next_1 primary_btn">Continue</button>
                                        </div>
                                    </div>
                                    <!-- items -->
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- items -->
                </div>
            </div>
            <!-- box -->

            <!-- box -->
            <div class="main_box active_box_4">
                <div class="single_box">
                    <!-- items -->
                    <div class="gap_1">
                        <div class="left_form_box">
                            <div class="form_title">
                                <h1>Enter an <br>OTP</h1>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut</p>
                            </div>

                       
                            
                        </div>
                    </div>
                    <!-- items -->

                    <!-- items -->
                    <div class="gap_2">
                        <div class="right_form_box">
                            <div class="form_images">
                                <img src="{{ asset('assets') }}/images/img-1.svg" alt="">
                            </div>

                            <form action="" method="">
                                <div class="form_box">
                                    <!-- items -->
                                    <div class="form_gap">
                                        <div class="otp_box">
                                            <div class="otp">
                                                <input type="text" maxlength="1">
                                                <input type="text" maxlength="1">
                                                <input type="text" maxlength="1">
                                                <input type="text" maxlength="1">
                                            </div>
                                            <input type="hidden" id="verificationCode" />

                                            <div class="resend">
                                                <span>1.52</span>
                                                <button type="button">resent</button>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- items -->

                                    <!-- items -->
                                    <div class="form_gap">
                                        <div class="submit_btn">
                                            <button type="button" name="next" value="Next" class="next_2 primary_btn">Continue</button>
                                        </div>
                                    </div>
                                    <!-- items -->
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- items -->
                </div>
            </div>
            <!-- box -->

            <!-- box -->
            <div class="main_box active_box_5">
                <div class="single_box">
                    <!-- items -->
                    <div class="gap_1">
                        <div class="left_form_box">
                            <div class="form_title">
                                <h1>Enter a new <br>Password</h1>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut</p>
                            </div>

                           
                            
                        </div>
                    </div>
                    <!-- items -->

                    <!-- items -->
                    <div class="gap_2">
                        <div class="right_form_box">
                            <div class="form_images">
                                <img src="{{ asset('assets') }}/images/img-1.svg" alt="">
                            </div>

                            <form action="" method="">
                                <div class="form_box">
                                    <!-- items -->
                                    <div class="form_gap">
                                        <div class="input_box">
                                            <input type="password" placeholder="Enter  Your Password">
                                        </div>
                                    </div>
                                    <!-- items -->

                                    <!-- items -->
                                    <div class="form_gap">
                                        <div class="input_box">
                                            <input type="password" placeholder="Conform Password">
                                        </div>
                                    </div>
                                    <!-- items -->

                                    <!-- items -->
                                    <div class="form_gap">
                                        <div class="submit_btn">
                                            <button class="next_3 primary_btn" type="submit">Save & Continue</button>
                                        </div>
                                    </div>
                                    <!-- items -->
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- items -->  
                </div>
            </div>
            <!-- box -->
        </div>
    </div>

    <!-- jquery js -->
    <script src="{{ asset('assets') }}/js/jquery.min.js"></script>
    <!-- bootstrap js -->
    <script src="{{ asset('assets') }}/js/bootstrap.min.js"></script>
    <!-- custom js -->
    <script src="{{ asset('assets') }}/js/custom.js"></script>
</body>
</html> 