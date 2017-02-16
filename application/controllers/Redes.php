<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Redes extends CI_Controller {



    public function __construct() {
        parent::__construct();
        $this->load->model('posts', '', TRUE);
    }

    public function twitter(){
        
        $this->load->model('categories', '', TRUE);
        $this->load->model('socialnets', '', TRUE);
        $this->load->library('twitterinterface',array($this->posts));
        if(isset($_POST['tweets'])){           
            foreach($_POST['tweets'] as $tweet){
                $post = json_decode($tweet);
                $datetime = new DateTime($post->date);
                $datetime->setTimezone(new DateTimeZone('America/Argentina/Buenos_Aires'));
                $date = $datetime->format('Y-m-d H:i:s');
                $post->date = $date;
                $this->save_post($post, Posts::TWITTER_ID);
            }
            $this->socialnets->update_followers(POSTS::TWITTER_ID, $this->twitterinterface->get_followers());
        }
       
        
        $tweets = $this->twitterinterface->get_posts();

        $categories = $this->categories->get_categories();
//        echo'<pre>';
//        print_r($result);echo'</pre>';exit;
       
        $data = array('css'=>array(),'js'=>array('/js/list_posts.js','/ckeditor/ckeditor.js'),'tweets'=>$tweets,'categories'=>$categories,'social_net'=>POSTS::TWITTER_ID);
        $this->get_view(array('/backend/list_tweets'),$data);
    }

    protected function save_post($post, $social_net){
        $post_db = $this->posts->get_by_social_post_id($post->post_id, $social_net);
        if(count($post_db)==0){
            $id_post = $this->posts->create($social_net,$post->post_id,$post->date,$post->text,json_encode($post->media),$post->posted_by, $post->link);
            
        }else{
            $this->posts->update($social_net,$post->post_id,$post->date,$post->text,json_encode($post->media),$post->posted_by, $post->link);
            $this->posts->delete_categories($post_db[0]->posts_id);
            $id_post = $post_db[0]->posts_id;           
        }
        if($this->input->post('category-'.$post->post_id) != ''){
                foreach($this->input->post('category-'.$post->post_id) as $category){
                    $this->posts->set_category($id_post,$category);
                }
            }            

    }

    public function fb(){
        $this->load->library('facebookInterface',array($this->posts));
        $this->load->helper('url');
        $this->load->model('categories', '', TRUE);
        $this->load->model('socialnets', '', TRUE);
        
        $authenticated = $this->facebookinterface->is_authenticated();
        if (  $authenticated){
            if(isset($_POST['posts'])){
                foreach($_POST['posts'] as $posts){
                    $post = json_decode($posts);
                    $datetime = new DateTime($post->date);
                    $datetime->setTimezone(new DateTimeZone('America/Argentina/Buenos_Aires'));
                    $post->date = $datetime->format('Y-m-d H:i:s');
                    $this->save_post($post, Posts::FACEBOOK_ID);
                }
                $this->socialnets->update_followers(POSTS::FACEBOOK_ID, $this->facebookinterface->get_followers());
            }          
            $posts = $this->facebookinterface->get_posts();
           
        }else{
            $posts = array();
        }
        $categories = $this->categories->get_categories();
        $data = array('css'=>array(),'js'=>array('/js/list_posts.js','/ckeditor/ckeditor.js'),'authenticated'=>$authenticated,'posts'=>$posts,'categories'=>$categories,'social_net'=>POSTS::FACEBOOK_ID);
        $this->get_view(array('/backend/list_fb_posts'),$data);
    }


    public function instagram(){
        $this->load->library('instagramInterface',array($this->posts));
        $this->load->model('categories', '', TRUE);
        $this->load->model('socialnets', '', TRUE);
        $login_link = '';
        if($this->session->userdata('instagram-token') != '') {
            if(isset($_POST['instaPosts'])){
                foreach($_POST['instaPosts'] as $instaPost){
                    $post = json_decode($instaPost);
                    $this->save_post($post, Posts::INSTAGRAM_ID);
                }
                $this->socialnets->update_followers(POSTS::INSTAGRAM_ID, $this->instagraminterface->get_followers($this->session->userdata('instagram-token')));
            }
          
            $posts = $this->instagraminterface->get_posts($this->session->userdata('instagram-token'));
//            echo '<pre>';print_r($insta_posts);echo'</pre>';exit;
        }else{
            $posts = array();
            $login_link = anchor( $this->instagraminterface->instagram_login(), 'Instagram Login');
        }
        $categories = $this->categories->get_categories();
        $data = array('css'=>array(),'js'=>array('/js/list_posts.js','/ckeditor/ckeditor.js'),'login_link'=>$login_link,'posts'=>$posts,'categories'=>$categories,'social_net'=>POSTS::INSTAGRAM_ID);
		    $this->get_view(array('/backend/list_instagram'),$data);
    }


    function get_code_insta() {
	$this->load->library('instagram_api');
        // Make sure that there is a GET variable of code
        if(isset($_GET['code']) && $_GET['code'] != '') {

                $auth_response = $this->instagram_api->authorize($_GET['code']);

                // Set up session variables containing some useful Instagram data
                $this->session->set_userdata('instagram-token', $auth_response->access_token);
                $this->session->set_userdata('instagram-username', $auth_response->user->username);
                $this->session->set_userdata('instagram-profile-picture', $auth_response->user->profile_picture);
                $this->session->set_userdata('instagram-user-id', $auth_response->user->id);
                $this->session->set_userdata('instagram-full-name', $auth_response->user->full_name);

                redirect('Redes/instagram');

        } else {

                // There was no GET variable so redirect back to the homepage
                redirect('Backend');

        }
    }

        public function quitar_post($social_post_id, $social_net){
          $this->load->model('posts', '', TRUE);
            $result = array();
            $post =  $this->posts->get_by_social_post_id($social_post_id,$social_net);
            $this->posts->delete_categories($post[0]->posts_id);
            $result['success'] = $this->posts->remove_by_social_post_id($social_post_id,$social_net);
            $result['message'] = '';
            echo json_encode($result);
        }
        
          
          
          public function youtube(){
            $this->load->library('youtube',array('key' => YOUTUBE_API_KEY));
            $this->load->model('categories', '', TRUE);
            $this->load->model('socialnets', '', TRUE);
            $this->load->library('formatYoutubePosts',array($this->posts));
            if(isset($_POST['instaPosts'])){
                foreach($_POST['instaPosts'] as $instaPost){
                    $post = json_decode($instaPost);
                    $this->save_post($post, Posts::YOUTUBE_ID);
                }
                $this->socialnets->update_followers(POSTS::YOUTUBE_ID, $this->get_youtube_followers());
            }
            $params = array(
                        'q' => '',                        
                        'channelId' => YOUTUBE_CHANNEL_ID,
                        'part' => ' snippet',      
                        'maxResults' => 8
                    );
            $result = $this->youtube->searchAdvanced($params);
            $youtubePosts = $this->formatyoutubeposts->formatPosts($result);
            $categories = $this->categories->get_categories();
            // echo '<pre>';print_r($result); echo '</pre>';exit;
            $data = array('css'=>array(),'js'=>array('/js/list_posts.js','/ckeditor/ckeditor.js'),'posts'=>$youtubePosts,'categories'=>$categories,'social_net'=>POSTS::INSTAGRAM_ID);
		    $this->get_view(array('/backend/list_youtube'),$data);
           
          }
          
          public function get_youtube_followers(){
              $result = $this->youtube->getChannelById(YOUTUBE_CHANNEL_ID);
              return $result->statistics->subscriberCount;
          }

    }
