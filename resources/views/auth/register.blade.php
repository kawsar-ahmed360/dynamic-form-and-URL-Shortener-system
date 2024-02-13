

<!DOCTYPE html>
<html>
    <head>
        <title>Form Registration</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="css.css">
    </head>

    <style>
        /*

    Green Registration Form, by Xavier Mod 

    v1.0 1/02/19

    Created by Xavier Mod | hi.xavier.mod@gmail.com | 2019

*/


@import url('https://fonts.googleapis.com/css?family=Montserrat:400,700');

* {
    padding: 0;
    margin: 0;
    box-sizing: border-box;
}

body {
   
    font-family: "Montserrat", sans-serif;
}

.container {
    margin: 70px auto;
    background-color: white;
    /* border: 2px red solid; */
    border-radius: 5px;
    width: 400px;
    height: 790px;
    box-shadow: 2px 3px 10px rgb(184, 184, 184);
}

/* Sign Up */
#main-title {
    /* border: 2px red solid; */
    text-align: center;
    font-size: 25px;
    padding: 30px 30px 10px 30px;
    font-weight: 700;
    color: rgb(20, 20, 20);
} 

/* It only takes a minute! */
#subtitle {
    text-align: center;
    font-size: 14px;
    color: rgb(70, 70, 70);
}

form {
    /* border: 2px red solid; */
    padding: 20px 40px 20px 40px;
    
}

.placeholders {
    /* border: 2px red solid; */
    height: 85px;
}

.placeholders > label {
    display: block;
    margin-bottom: 10px;
    font-size: 12px;
    /* border: 2px red solid; */
}

.placeholders input {
    /* border: 2px red solid; */
    width: 100%;
    height: 35px;
}

input::placeholder {
    font-family: 'Montserrat';
    /* border: 2px red solid; */
}

.terms-conditions {
    /* border: 2px red solid; */
}

#terms-conditions {
    display: inline;
    font-size: 13px;
    color: black;
    /* border: 2px red solid; */
}

#a-submit {
        display: block;
        margin: auto;
        text-align: center;
        padding: 10px 30px 10px 30px;
        font-family: 'Montserrat', 'sans-serif';
        border: 1px solid rgb(27, 233, 112);
        background-color: white;
        border-radius: 3px;
        cursor: pointer;
        width: 100%;
        font-size: 14px;
        color: rgb(27, 233, 112);
        font-weight: 700;
        -webkit-transition: all 0.43s ease;
}


#a-submit:hover {
    border: 1px solid rgb(27, 233, 112);
    background-color: rgb(27, 233, 112);
    color: white;
    width: 50%;
    /* box-shadow: 2px 3px 10px rgb(211, 211, 211); */
}

#a-submit:active {
    width: 40%;
    /* box-shadow: 2px 3px 10px rgb(211, 211, 211); */
}



    </style>

    <body>
        <div class="container">
            <h1 id="main-title">User Registration</h1>
            <p id="subtitle">It only takes a minute!</p>
            @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
@endif
            <form method="POST" action="{{ route('register') }}">
                        @csrf
               
                <div id="name" class="placeholders">
                    <label id="name" for="text" class="">Name</label>
                    <input required type="text" class="@error('name') is-invalid @enderror" name="name" placeholder="Enter your name...">
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                             <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>


                <div id="email" class="placeholders">
                    <label id="email" for="text" class="">Email</label>
                    <input required type="email" class="@error('email') is-invalid @enderror" name="email" placeholder="Enter email...">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                             <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>


                <div id="phone" class="placeholders">
                    <label id="phone" for="text" class="">Phone</label>
                    <input required type="number" class="@error('phone') is-invalid @enderror" name="phone" placeholder="Enter phone...">
                    @error('phone')
                        <span class="invalid-feedback" role="alert">
                             <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>


                <div id="designation" class="placeholders">
                    <label id="designation" for="text" class="">Designation</label>
                    <input required type="text" class="@error('designation') is-invalid @enderror" name="designation" placeholder="Enter designation...">
                    @error('designation')
                        <span class="invalid-feedback" role="alert">
                             <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>


                <div id="institute" class="placeholders">
                    <label id="institute" for="text" class="">Institute</label>
                    <input required type="text" class="@error('institute') is-invalid @enderror" name="institute" placeholder="Enter institute...">
                    @error('institute')
                        <span class="invalid-feedback" role="alert">
                             <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div id="password" class="placeholders">
                    <label id="password" for="text" class="">Password</label>
                    <input required type="password" class="@error('password') is-invalid @enderror" name="password" placeholder="Enter password...">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                             <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div id="password_confirmation" class="placeholders">
                    <label id="password_confirmation" for="text" class="">Confirm Password</label>
                    <input required type="password" class="@error('password_confirmation') is-invalid @enderror" name="password_confirmation" placeholder="Enter password...">
                    @error('password_confirmation')
                        <span class="invalid-feedback" role="alert">
                             <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>


               
                <br><br>
            
                <button id="a-submit" type="submit">Submit</button>

              </form> 

        </div>
    </body>
</html>





