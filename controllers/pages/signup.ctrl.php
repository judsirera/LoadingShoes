<?php
/**
 * Home Controller: Controller example.

 */
class PagesSignupController extends Controller
{
	private $user_name = "";
	private $email = "";
	private $password = "";
	private $twitter = "";
	private $obj;


	protected $view = 'pages/signup.tpl';

	public function build()
    {

        $this->obj = $this->getClass('PagesUserModel');

		$this->getUserData();

		$this->insertUserData();


		$this->setLayout( $this->view );

	}

	private function getUserData()
	{
		$this->user_name = Filter::getString('user_name');
		$this->email = Filter::getEmail('user_email');
		$this->password = Filter::getString('user_password');
		$this->twitter = Filter::getString('user_twitter');

    }

	private function insertUserData()
	{
		if ($this->checkUserName() && $this->checkPassword() && $this->checkEmail() && $this->checkTwitter())
		{
			$this->obj->insertNewUser($this->user_name, $this->email, $this->password, $this->twitter);
            $this->completeFields();
            $active_link = $this->generateActiveLink();
            $this->createAndSendEmail($active_link);
            $this->assign('active_link', "Check your mail box and your spam folder.");
		}
	}

	private function checkUserName()
	{
        if(empty($this->user_name))
        {
            return false;
        }
		if($this->obj->getUserByUsername($this->user_name))
        {
			$this->assign("error_msg", "This username already exists");
			return false;
		}

        $this->assign('username_value', $this->user_name);
		return true;
	}

	private function checkPassword()
	{
        if(empty($this->password))
        {
            return false;
        }
		if(strlen($this->password) > 0 && strlen($this->password) < 6)
        {
			$this->assign("error_msg", "The password is to short. 6 characters min.");
			return false;
		}
		if(strlen($this->password) > 10)
        {
			$this->assign("error_msg", "The password is to long. 10 characters max.");
			return false;
		}

        $this->assign('password_value', $this->password);
        return true;

	}

	private function checkEmail()
	{
        if(empty($this->email))
        {
           return false;
        }
		if($this->obj->getUsernameByEmail($this->email)) {
            $this->assign("error_msg", "This email already has an account");
            return false;
        }

        $this->assign('email_value', $this->email);
        return true;
	}

    private function checkTwitter()
    {
        if(!empty($this->twitter))
        {
            if($this->twitter[0] != '@')
            {
                $this->assign("error_msg", "Use @ to indicate your twitter username");
                return false;
            }
        }

        $this->assign('twitter_value', $this->twitter);
        return true;
    }

    private function completeFields()
    {
        $this->assign('username_value', $this->user_name);
        $this->assign('password_value', $this->password);
        $this->assign('email_value', $this->email);
        $this->assign('twitter_value', $this->twitter);

    }

    private function generateActiveLink()
    {
        $id = $this->obj->getUserByUsername($this->user_name);
        $id = $id[0]['id_user'];

        return URL_ABSOLUTE ."/activeuser/user-id/$id";
    }

    private function createAndSendEmail($link){
        $to = $this->email;
        $from = "From: Loading Shoes <productionsloading@gmail.com>";
        $subject = "Registration in Loading shoes";
        $content = "Content-Type: text/html; charset=ISO-8859-1";
        $headers = $from . "\r\n" . $content;


        $body = "<html>
                  <head>
                    <title>Registration on Loading shoes</title>
                    <link href='http://fonts.googleapis.com/icon?family=Material+Icons' rel='stylesheet'><!-- Latest compiled and minified CSS -->
                    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css'>
                    <style>
                        body{
                            font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif;
                        font-size: 14px;
                        line-height: 1.42857143;
                        color: #333;
                        background-color: #fff;
                      }
                      h1{
                            color: #852F06;
                        }
                      h3 {
                            color: #CC6B3C;
                            line-height: 1.5;
                      }
                      a{
                            color: #AC4D1F;
                        }
                      .box .a{
                            color: #AC4D1F;
                            font-size: 24px;
                            transform: translateX(-50%);
                            left: 50%;
                            position: absolute;
                      }
                      a:hover, a:active, a:focus{
                            text-decoration: none;
                            color: #852F06;
                      }
                      .box{
                            background-color: rgba(255,184,150,0.2);
                          border-radius: 10px;
                          padding: 30px 30px 30px 30px;
                          margin-top: 50px;
                          position: relative;
                          height: 260px;
                      }
                    </style>
                  </head>
                  <body>
                    <div class='container-fluid'>
                      <div class='row'>
                        <div class='col-md-3'></div>
                        <div class='col-md-6'>
                          <div class='box'>
                                <h1>Welcome " .$this->user_name ."</h1>
                                <h3>To finalize your registration on
                                <a href='" .URL_ABSOLUTE ."'>Loading Shoes</a>
                                you have to activate your account with this link:</h3>
                                <h2><a href='" .$link ."'>".$link ."</a></h2>
                          </div>
                        </div>
                      </div>
                    </div>
                    <script type='text/javascript' src='https://code.jquery.com/jquery-2.1.1.min.js'></script>
                    <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js'></script>
                  </body>
                </html>";


        mail($to, $subject, $body, $headers);

    }

	/**
	 * With this method you can load other modules that we will need in our page. You will have these modules availables in your template inside the "modules" array (example: {$modules.head}).
	 * The sintax is the following:
	 * $modules['name_in_the_modules_array_of_Smarty_template'] = Controller_name_to_load;
	 *
	 * @return array
	 */
	public function loadModules() {
		$modules['head']	= 'SharedHeadController';
		$modules['footer']	= 'SharedFooterController';
		return $modules;
	}
}