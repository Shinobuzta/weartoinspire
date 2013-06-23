<?php //-->
/*
 * This file is part a custom application package.
 */

/**
 * Default logic to output a page
 */
class Front_Page_Login extends Front_Page {
	/* Constants
	-------------------------------*/
	const FACEBOOK_KEY 			= '538015669578219';
	const FACEBOOK_SECRET 		= '453218468d914ae8d49a66c2dad1243c';
	const FACEBOOK_PERMISSIONS 	= 'email, user_likes, user_birthday, publish_stream, publish_actions, 
								   user_work_history, user_location, user_hometown, read_friendlists';
	/* Public Properties
	-------------------------------*/
	/* Protected Properties
	-------------------------------*/
	protected $_user 		= array();
	/* Private Properties
	-------------------------------*/
	/* Magic
	-------------------------------*/
	public static function i(Eden_Registry $request = NULL) {
		return self::_getMultiple(__CLASS__, $request);
	}
	/* Public Methods
	-------------------------------*/
	public function render() {
		//if auth
		$auth = eden('facebook')
				->auth(self::FACEBOOK_KEY, self::FACEBOOK_SECRET, 'http://'.$_SERVER['HTTP_HOST'].'/login');
		
		//if no code and no session
		if(!isset($_GET['code']) && !isset($_SESSION['fb_token'])) {
		    //redirect to login
		    $login = $auth->getLoginUrl(array(self::FACEBOOK_PERMISSIONS));
		    header('Location: '.$login);
		    exit;
		}

		//Code is returned back from facebook
		if(isset($_GET['code'])) {
			//saving to session
			if(!$this->_setSession($auth, $_GET['code'])) {
				header('location: /');
				exit;
			} 

			//save and update user information
			$this->_updateUser();
		}

		front()->output($this->_user);

		//$graph = eden('facebook')->graph($_SESSION['fb_token']);
		//$post = $graph->post('Hi Alex');
		//$url ="http://images2.fanpop.com/image/photos/10200000/Moon-Fairy-fairies-10270244-1024-768.jpg";
		//$post->setPicture($url);
		//$post->create();
		$url = isset($_SESSION['url']) ? $_SESSION['url'] : '/';
		
		header('Location: '.$url);
		exit;
	}
	/* Protected Methods
	-------------------------------*/
	protected function _setSession($auth = NULL, $code = NULL) {
		if(is_null($code) || is_null($auth)) return FALSE;
		$access 				= $auth->getAccess($code);
		$_SESSION['fb_token'] 	= $access['access_token'];			
		$this->_user 			= eden('facebook')->graph($_SESSION['fb_token'])->getUser();
						
		$_SESSION['user'] = array(
			'user_id'		=> $this->_user['id'],
			'user_name'		=> $this->_user['name'],
			'user_first'	=> $this->_user['first_name'],
			'user_email'	=> $this->_user['email']
			);	

		return TRUE;
	}
	protected function _updateUser()
	{
		$settings = array(
		'user_id'     	=> $this->_user['id'],
		'user_admin'    => '0',
		'user_first'    => $this->_user['first_name'],
		'user_last'    	=> $this->_user['last_name'],
		'user_email'    => $this->_user['email'],
		'user_image'    => 'http://graph.facebook.com/'.$this->_user['id'].'/picture',
		'user_gender'   => $this->_user['gender'],
		'user_birthday' => $this->_user['birthday'],
		'user_lastlog'  => date('Y-m-d H:i:s')
		);
		 
		//updates data if there is a user_email with the value of anemail@gmail.com otherwise will insert
		front()->getDatabase()->setRow('user', 'user_id', $this->_user['id'], $settings); 
	}
	/* Private Methods
	-------------------------------*/
}
