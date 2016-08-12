<?php

(defined('BASEPATH')) OR exit('No direct script access allowed');
/**
 * CMS Canvas
 *
 * @author      Mohd Belal
 * @copyright   Copyright (c) 2016
 * @license     MIT License
 * @link        http://cmscanvas.com
 */
class Twitter extends Public_Controller {

	public function index(){

		$data =array();

		$this->load->model('tweet_model');
		$this->load->library('twitteroauth');
		 $this->load->library('pagination');
		// $this->config->load('twitter');

		// $data['tweets'] = $this->tweet_model->get();

		if($this->input->post()){
			$this->form_validation->set_rules('tweet_name', 'Tweet Name', 'trim|required');

			if($this->form_validation->run()==TRUE){

				// Getting Tweets from Twitter

				$twitter_customer_key           = 'JdmrAiQk2mx8v3tvhDEA';
				$twitter_customer_secret        = 'uQ7imQSv6hirqQr9Nt5mksCdUCVAfk5srF0Mk3vo';
				$twitter_access_token           = '17587879-mftRUoqaPQj2OLZdu2Y08qY9vHRJfM7hE2yo87Y3d';
				$twitter_access_token_secret    = 'jFQyQ64PAEnyBVCWYPgJdVEGr3X0RpoCldgkyLUW5A';

				$connection = new TwitterOAuth($twitter_customer_key, $twitter_customer_secret, $twitter_access_token, $twitter_access_token_secret);

				$my_tweets = $connection->get('statuses/user_timeline', array('screen_name' => $this->input->post('tweet_name'), 'count' => 10));

				// echo '<div class="twitter-bubble">';
				if(isset($my_tweets->errors))
				{           
				    $data['tweets_error'] = 'Error :'. $my_tweets->errors[0]->code. ' - '. $my_tweets->errors[0]->message;
				}else{
					//Fetching & Inserting in DataBase

					foreach($my_tweets as $value){
						// $data['tweets'][] =  makeClickableLinks($value->text);
						
						$query = $this->db->query('SELECT * FROM tweet WHERE content="'.$value->text.'"');

    					$rows = $query->num_rows();
    					if($rows==0){

							$tweetData = array('name' => $this->input->post('tweet_name'),
		                    'content' => $value->text,
		                    'updated_time' => date('Y-m-d'));

			                $this->db->set($tweetData);
			                $this->db->insert('tweet');

		            	}
            		}

                
				}

			}
		}

		$config = array();
		$config["base_url"] = base_url() . "index.php/twitter/index";
		$total_row = $this->tweet_model->record_count();
		$config["total_rows"] = $total_row;
		$config["per_page"] = 1;
		$config['use_page_numbers'] = TRUE;
		$config['num_links'] = $total_row;
		$config['cur_tag_open'] = '&nbsp;<a class="current">';
		$config['cur_tag_close'] = '</a>';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Previous';

		$this->pagination->initialize($config);
		if($this->uri->segment(3)){
		$page = ($this->uri->segment(3)) ;
		}
		else{
		$page = 1;
		}
		$data["results"] = $this->tweet_model->fetch_data($config["per_page"], $page);
		$str_links = $this->pagination->create_links();
		$data["links"] = explode('&nbsp;',$str_links );

   		$this->template->view('twitter',$data);

   }

   
}
