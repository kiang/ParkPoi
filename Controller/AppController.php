<?php

App::uses('Controller', 'Controller');

class AppController extends Controller {

    public $helpers = array('Html', 'Form', 'Js', 'Session', 'Olc');
    public $components = array('Acl', 'Auth', 'RequestHandler', 'Session', 'Flash');
    public $fb, $loginMember;

    public function beforeFilter() {
        if (isset($this->Auth)) {
            $this->Auth->authenticate = array(
                'Form' => array(
                    'userModel' => 'Member',
                    'scope' => array('Member.user_status' => 'Y'),
                )
            );
            $this->Auth->loginAction = '/members/login';
            $this->Auth->loginRedirect = '/';
            $this->Auth->authorize = array(
                'Actions' => array(
                    'userModel' => 'Member',
                )
            );
        }
        $this->loginMember = $this->Session->read('Auth.User');
        if (empty($this->loginMember)) {
            $this->loginMember = array(
                'id' => 0,
                'group_id' => 0,
                'username' => '',
            );
        } elseif (isset($this->loginMember['group_id']) && $this->loginMember['group_id'] == '1') {
            Configure::write('debug', 2);
        }
        Configure::write('loginMember', $this->loginMember);
        $token = $this->Session->read('fbToken');
        $options = Configure::read('Facebook');
        if(!empty($token)) {
            $options['default_access_token'] = $token;
        }

        $this->fb = new \Facebook\Facebook($options);
        $this->set('fbHelper', $this->fb->getRedirectLoginHelper());

    }

}
