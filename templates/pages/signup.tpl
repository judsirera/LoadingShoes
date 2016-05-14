{$modules.head}
<script src='https://www.google.com/recaptcha/api.js'></script>

<section id="signup">
    <div class="container extra-margin-top">
        <div class="row">
            <form method="POST" enctype="multipart/form-data">
                <div class="col s6">
                    <div class="row">
                        <div class="col s12">
                            <img class="img-signUp" src="{$url.global}/imag/signUp.png" alt="" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12">
                            <!--Captcha-->
                        </div>
                    </div>
                </div>
                <div class="col s6 box">
                    <div class="row">
                        <div class="col s12">
                            <h1>Sign up</h1>
                            <p>or <a href="{$url.global}/login">log in</a></p>
                        </div>
                    </div>
                    <div class="row">
                        {if $to_active}
                        <div class="col s12 borders-box">
                            <p>To activate: {$to_active}</p>
                        </div>
                        {/if}
                        {if $active_link}
                            <div class="col s12 borders-box">
                                <p>To activate: <a href="{$active_link}">click to active your account</a></p>
                            </div>
                        {/if}
                        {if $error_msg}
                        <div class="col s12 error-message borders-box">
                            <p>{$error_msg}</p>
                        </div>
                        {/if}
                    </div>
                    <div class="row">
                        <div class="col s12">
                            <div class="row">
                                <div class="input-field col s12">
                                    <input name="user_name" id="user_name" type="text" class="validate" value="{$username_value}" required>
                                    <label for="user_name" data-error="wrong" data-success="right">Username (*)</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <input name="user_email" id="email" type="email" class="validate" value="{$email_value}" {literal}pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$"{/literal} required>
                                    <label for="email" data-error="wrong" data-success="right">Email (*)</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <input name="user_password" id="password-signup" type="password" class="check" value="{$password_value}" {literal}pattern=".{6,10}"{/literal} required>
                                    <label for="password" data-error="wrong" data-success="right">Password (*)</label>
                                    <span class="instructions right">Minimum 6 characters, maximum 10 characters</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col s12">
                                    <div style="width: 100%; margin-left: auto" id="fileInput" class="file-field input-field">
                                        <div style="height: 3rem" class="btn waves-effect waves-light btn-large">
                                            <span>Photo</span>
                                            <input id="fileName" name="fileName" type="file">
                                        </div>
                                        <div class="file-path-wrapper">
                                            <input class="file-path validate" type="text">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <input name="user_twitter" id="twitter" type="text" value="{$twitter_value}" class="check">
                                    <label for="twitter" data-error="wrong" data-success="right">Twitter user</label>
                                    <span class="instructions right">@example</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col s12">
                                    <button class="btn waves-effect waves-light btn-large right" type="submit" name="submit">Sign up</button>
                                </div>
                            </div>
                        </div>
                        <div class="g-recaptcha" data-sitekey="6LfZ5B8TAAAAAPvZ2Klvaiw9OJco5hdZdnlIA02B"></div>
                    </form>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>


{$modules.footer}