<style>
@import url("https://fonts.googleapis.com/css?family=Rubik:300,400,500,700,900");
        body {
            background: url('login/untitled.jpg') no-repeat fixed center center;
            background-color: rgba(0, 0, 0, 0.6);
            background-size: fit;
            font-family: "Rubik", sans-serif;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        body::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.6);
        }

        .login-container {
            text-align: center;
            position: relative;
        }

        .login-block {
            width: 350px;
            padding: 20px;
            background: rgba(255, 255, 255, 0.5);
            border-radius: 5px;
            /* border-top: 5px solid #0178bc; */
            display: inline-block;
            text-align: left;
        }

        .login-block h1 {
            text-align: center;
            color: #000;
            font-size: 18px;
            text-transform: uppercase;
            margin-top: 0;
            margin-bottom: 20px;
        }

        .login-block input {
            width: 100%;
            height: 42px;
            box-sizing: border-box;
            border-radius: 5px;
            border: 1px solid #ccc;
            margin-bottom: 20px;
            font-size: 14px;
            font-family: "Rubik", sans-serif;
            padding: 0 20px 0 50px;
            outline: none;
        }

        .login-block input#username {
            background: #fff url('login/u0XmBmv.png') 20px top no-repeat;
            background-size: 16px 80px;
        }

        .login-block input#username:focus {
            background: #fff url('login/u0XmBmv.png') 20px bottom no-repeat;
            background-size: 16px 80px;
        }

        .login-block input#password {
            background: #fff url('login/Qf83FTt.png') 20px top no-repeat;
            background-size: 16px 80px;
        }

        .login-block input#password:focus {
            background: #fff url('login/Qf83FTt.png') 20px bottom no-repeat;
            background-size: 16px 80px;
        }

        .login-block input:active, .login-block input:focus {
            border: 1px solid #0178bc;
        }

        .login-block button {
            width: 100%;
            height: 40px;
            
            background: #4b49ac;

            box-sizing: border-box;
            border-radius: 5px;
            border: 1px solid white;
            color: #fff;
            font-weight: bold;
            text-transform: uppercase;
            font-size: 14px;
            font-family: "Rubik", sans-serif;
            outline: none;
            cursor: pointer;
        }

        .login-block button:hover {
            background: rgba(255, 255, 255, 0.1);
        }

        .login-logo {
            font-size: 60px; 
            color: #333333;

            display: -webkit-box;
            display: -webkit-flex;
            display: -moz-box;
            display: -ms-flexbox;
            display: flex;
            justify-content: center;
            align-items: center;
            width: 130px;
            height: 60px;
 
            margin: 0 auto;
        }
</style>

<body>
    <div class="login-container">
        <div class="login-block">
            <img class ="login-logo mb-3" src="login/unnamed.png" alt="">
            <form class="login100-form validate-form" action="<?= base_url('home/aksi_login/')?>"method="post">
                
                <input type="text" value="" placeholder="Username" id="username" name="username"/>
                
                <input type="password" value="" placeholder="Password" id="password" name="pswd"/>
                
                <div class="g-recaptcha mb-3" align="center" data-sitekey="6Le4D6snAAAAAHKAJFOOLbLc17nMTBTF6Ze12hWG"></div>
                
                <button type="submit">Login</button>
                <div class="text-center mt-4 font-weight-light">
                  Don't have an account? <a href="<?= base_url('/Home/register')?>" class="text-primary">Create</a>
                </div>
            </form>
        </div>
    </div>
</body>
