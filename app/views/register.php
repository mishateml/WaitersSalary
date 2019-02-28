<?php $this->layout('template', ['title' => 'register']) ?>

<?php $this->start('style') ?>
<style>

    @media(min-width: 768px) {
        .field-label-responsive {
            padding-top: .5rem;
            text-align: right;
        }
    }
    .con{
        margin-top: 15vh;
    }
</style>
<!--        <style>-->
<!---->
<!---->
<!--            body, html{-->
<!--                height: 100%;-->
<!--                background-repeat: no-repeat;-->
<!--                background-color: #d3d3d3;-->
<!--                font-family: 'Oxygen', sans-serif;-->
<!--            }-->
<!---->
<!--            .main{-->
<!--                margin-top: 70px;-->
<!--            }-->
<!---->
<!--            h1.title {-->
<!--                font-size: 50px;-->
<!--                font-family: 'Passion One', cursive;-->
<!--                font-weight: 400;-->
<!--            }-->
<!---->
<!--            hr{-->
<!--                width: 10%;-->
<!--                color: #fff;-->
<!--            }-->
<!---->
<!--            .form-group{-->
<!--                margin-bottom: 15px;-->
<!--            }-->
<!---->
<!--            label{-->
<!--                margin-bottom: 15px;-->
<!--            }-->
<!---->
<!--            input,-->
<!--            input::-webkit-input-placeholder {-->
<!--                font-size: 11px;-->
<!--                padding-top: 3px;-->
<!--            }-->
<!---->
<!--            .main-login{-->
<!--                background-color: #fff;-->
<!--                /* shadows and rounded borders */-->
<!--                -moz-border-radius: 2px;-->
<!--                -webkit-border-radius: 2px;-->
<!--                border-radius: 2px;-->
<!--                -moz-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);-->
<!--                -webkit-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);-->
<!--                box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);-->
<!---->
<!--            }-->
<!---->
<!--            .main-center{-->
<!--                margin-top: 30px;-->
<!--                margin: 0 auto;-->
<!--                max-width: 330px;-->
<!--                padding: 40px 40px;-->
<!---->
<!--            }-->
<!---->
<!--            .login-button{-->
<!--                margin-top: 5px;-->
<!--            }-->
<!---->
<!--            .login-register{-->
<!--                font-size: 11px;-->
<!--                text-align: center;-->
<!--            }-->
<!---->
<!--        </style>-->
        <?php $this->stop() ?>
	<body>
    <div class="container con">
        <form action="" method="post">
           <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="card card-signin my-5">
                    <div class="card-body">
                      <form class="form-horizontal" role="form" method="POST" action="/register">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <h2>Register New User</h2>
                    <hr>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 field-label-responsive">
                    <label for="name">Name</label>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                            <div class="input-group-addon" style="width: 2.6rem"><i class="fa fa-user"></i></div>
                            <input type="text" name="name" class="form-control" id="name"
                                   placeholder="John Doe" required autofocus>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-control-feedback">
                        <span class="text-danger align-middle">
                            <!-- Put name validation error messages here -->
                        </span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 field-label-responsive">
                    <label for="email">E-Mail Address</label>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                            <div class="input-group-addon" style="width: 2.6rem"><i class="fa fa-at"></i></div>
                            <input type="text" name="email" class="form-control" id="email"
                                   placeholder="you@example.com" required autofocus>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-control-feedback">
                        <span class="text-danger align-middle">
                            <!-- Put e-mail validation error messages here -->
                        </span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 field-label-responsive">
                    <label for="password">Password</label>
                </div>
                <div class="col-md-6">
                    <div class="form-group has-danger">
                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                            <div class="input-group-addon" style="width: 2.6rem"><i class="fa fa-key"></i></div>
                            <input type="password" name="password" class="form-control" id="password"
                                   placeholder="Password" required>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-control-feedback">
                        <span class="text-danger align-middle">
                            <i class="fa fa-close"> Example Error Message</i>
                        </span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 field-label-responsive">
                    <label for="password">Confirm Password</label>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                            <div class="input-group-addon" style="width: 2.6rem">
                                <i class="fa fa-repeat"></i>
                            </div>
                            <input type="password" name="confirm" class="form-control"
                                   id="password-confirm" placeholder="Password" required>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <button type="submit" class="btn btn-success"><i class="fa fa-user-plus"></i> Register</button>
                </div>
            </div>
        </form>
                    </div>
                </div>
            </div>
        </div>
        </form>
    </div>
<!--		<div class="container">-->
<!--			<div class="row main">-->
<!--				<div class="panel-heading">-->
<!--	               <div class="panel-title text-center">-->
<!--	               		<h1 class="title">ברוחים הבאים ניסו</h1>-->
<!--	               		<hr />-->
<!--	               	</div>-->
<!--	            </div>-->
<!--				<div class="main-login main-center">-->
<!--					<form class="form-horizontal" method="post" action="">-->
<!---->
<!--						<div class="form-group">-->
<!--							<label for="name" class="cols-sm-2 control-label">Your Name</label>-->
<!--							<div class="cols-sm-10">-->
<!--								<div class="input-group">-->
<!--									<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>-->
<!--									<input type="text" class="form-control" name="name" id="name"  placeholder="Enter your Name"/>-->
<!--								</div>-->
<!--							</div>-->
<!--						</div>-->
<!---->
<!--						<div class="form-group">-->
<!--							<label for="email" class="cols-sm-2 control-label">Your Email</label>-->
<!--							<div class="cols-sm-10">-->
<!--								<div class="input-group">-->
<!--									<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>-->
<!--									<input type="email" class="form-control" name="email" id="email"  placeholder="Enter your Email"/>-->
<!--								</div>-->
<!--							</div>-->
<!--						</div>-->
<!---->
<!---->
<!--						<div class="form-group">-->
<!--							<label for="password" class="cols-sm-2 control-label">Password</label>-->
<!--							<div class="cols-sm-10">-->
<!--								<div class="input-group">-->
<!--									<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>-->
<!--									<input type="password" class="form-control" name="password" id="password" autocomplete="current-password"  placeholder="Enter your Password"/>-->
<!--								</div>-->
<!--							</div>-->
<!--						</div>-->
<!---->
<!--						<div class="form-group">-->
<!--							<label for="confirm" class="cols-sm-2 control-label">Confirm Password</label>-->
<!--							<div class="cols-sm-10">-->
<!--								<div class="input-group">-->
<!--									<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>-->
<!--									<input type="password" class="form-control" name="confirm" id="confirm"  placeholder="Confirm your Password"/>-->
<!--								</div>-->
<!--							</div>-->
<!--						</div>-->
<!---->
<!--						<div class="form-group ">-->
<!--							<button type="submit"class="btn btn-primary btn-lg btn-block login-button">Register</button>-->
<!--						</div>-->
<!--						<div class="login-register">-->
<!--				            <a href="/login">Login</a>-->
<!--				         </div>-->
<!--					</form>-->
<!--				</div>-->
<!--			</div>-->
<!--		</div>-->

		<script type="text/javascript" src="assets/js/bootstrap.js"></script>
	</body>
</html>