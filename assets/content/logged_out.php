<style>
ul{
    list-style-type:none;
}

li{
    float:left;
    color:white;
    padding:5px;
}
</style>
<body style="background-image:url('https://abs.twimg.com/b/front_page/v1/EU_1.jpg');background-repeat:no-repeat;background-attachment:fixed;background-size:cover;background-position:center;">

    <div class="container">
        <div class="row">
            <div class="col-sm-2"></div>
            <div class="col-sm-5" style="color:white;">
                <?php echo $lang['BODY_WELCOME']; ?>
            </div>
            <div class="col-sm-3">
                <div class="container" style="background-color:white;border-radius:5px;padding:10px;width:280px;">
                    <form method="POST">
                        <div class="form-group">
                          <input type="text" class="form-control" name="username" id="username" placeholder="<?php echo $lang['PH_USERNAME']; ?>" required>
                        </div>
                        <div class="form-group">
                          <input type="password" class="form-control" name="password" id="password" placeholder="<?php echo $lang['PH_PASSWORD']; ?>" required>
                        </div>
                        <div class="checkbox">
                            <label><input type="checkbox" name="autologin" value="1"> <?php echo $lang['LOGIN_REMEMBER']; ?></label> &bull; <a href="/blog/password_reset"><?php echo $lang['LOGIN_FORGORPASS']; ?></a>
                        </div>
                        <button type="submit" name="login_submit" class="btn btn-primary"><?php echo $lang['MENU_LOGIN']; ?></button>
                    </form>
                </div>
                </br>
                <div class="container" style="background-color:white;border-radius:5px;padding:10px;width:280px;">
                    <p style="font-weight:bold;"><?php echo $lang['BODY_FILLREGISTER']; ?></p>
                    <form method="POST">
                        <div class="form-group">
                          <input type="text" class="form-control" name="username" id="username" placeholder="<?php echo $lang['PH_USERNAME']; ?>" required>
                        </div>
                        <div class="form-group">
                          <input type="email" class="form-control" name="email" id="email" placeholder="<?php echo $lang['PH_EMAIL']; ?>" required>
                        </div>
                        <div class="form-group">
                          <input type="password" class="form-control" name="password" id="pwd" placeholder="<?php echo $lang['PH_PASSWORD']; ?>" required>
                        </div>
                        <div class="form-group">
                          <input type="password" class="form-control" name="repassword" id="pwd" placeholder="<?php echo $lang['PH_REPASSWORD']; ?>" required>
                        </div>
                        <button type="submit" name="reg_submit" class="btn btn-primary"><?php echo $lang['MENU_REGISTER']; ?></button>
                    </form>
                </div>
            </div>
            <div class="col-sm-2"></div>
        </div>
    </div>
    </br>
    </br>
    </br>
    <div class="container">
        <div class="row">
            <div class="col-sm-4"></div>
            <div class="col-sm-4">
                <ul>
                    <li>About</li>
                    <li>Help Center</li>
                    <li>Blog</li>
                    <li>Status</li>
                    <li>Jobs</li>
                </ul>
            </div>
            <div class="col-sm-4"></div>
        </div>
    </div>
    
    
</body>