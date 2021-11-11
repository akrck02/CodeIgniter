<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class App extends CI_Controller {

	/**
	 * Default action of the controller
	 * redirects to apps.
	 */
	public function index()
	{
		$this->apps();
	}

	/**
	 * Get repositories of a user 
	 * and show the view.
	 */
	public function repositories()
	{
		$this->checkAccess();
		$this->load->model('repository');
		$this->load->model('people');

		$user = isset($_REQUEST['user'])? $_REQUEST['user'] : $this->session->appig_user;
		$profile =  $this->people->getProfile($user);

		$repositories = $this->repository->getRepositories($user);
		$profile["followers"] =  $this->people->getFollowersCount($user);
		$profile["following"] = $this->people->getFollowingCount($user);
		$profile["repositories"] = count($repositories);


		$this->load->view('header',[
			"view" => $this->separate([$user,"repositories"]),
			"selected" => 1,
			"token" =>  $this->session->appig_token,
			"title" =>  $user." - repositories",
			"entries" => $repositories,
			"profile" => $profile,
			"me" => $this->session->appig_user,
		]);
		$this->load->view('profile');
		$this->load->view('profileRepos');
		$this->load->view('footer');
	}

	/**
	 * Get repositories of a user 
	 * and show the view.
	 */
	public function user_repository_search()
	{
		$this->checkAccess();
		$this->load->model('repository');
		$this->load->model('people');

		$user = isset($_REQUEST['user'])? $_REQUEST['user'] : $this->session->appig_user;
		$word = isset($_POST['repo_name']) ? $_POST['repo_name'] : "";
		$profile =  $this->people->getProfile($user);

		$repositories = $this->repository->getRepositoriesLike($user,$word);
		$profile["followers"] =  $this->people->getFollowersCount($user);
		$profile["following"] = $this->people->getFollowingCount($user);
		$profile["repositories"] = count($this->repository->getRepositories($user));


		$this->load->view('header',[
			"view" => $this->separate([$user,"repositories","search","$word"]),
			"selected" => 1,
			"token" =>  $this->session->appig_token,
			"title" =>  $user." - repositories",
			"entries" => $repositories,
			"profile" => $profile,
			"me" => $this->session->appig_user,
		]);
		$this->load->view('profile');
		$this->load->view('profileRepos');
		$this->load->view('footer');
	}

	/**
	 * Get apps of a user 
	 * and show the view.
	 */
	public function apps()
	{
		$this->checkAccess();
		$this->load->model('repository');
		$this->load->model('people');

		$user = isset($_REQUEST['user'])? $_REQUEST['user'] : $this->session->appig_user;
		$profile =  $this->people->getProfile($user);

		$profile["followers"] = $this->people->getFollowersCount($user);
		$profile["following"] = $this->people->getFollowingCount($user);
		$profile["repositories"] = count( $this->repository->getRepositories($user));

		$this->load->view('header',[
			"view" =>  $this->separate([$user,"apps"]),
			"title" =>  $user." - apps",
			"selected" => 0,
			"token" =>  $this->session->appig_token,
			"entries" => $this->repository->getReleases($user),
			"profile" => $profile,
			"me" => $this->session->appig_user,
		]);
		$this->load->view('profile');
		$this->load->view('profileApps');
		$this->load->view('footer');
	}

	/**
	 * Get apps of a user
	 * filtering by word 
	 * and show the view.
	 */
	public function user_app_Search()
	{
		$this->checkAccess();
		$this->load->model('repository');
		$this->load->model('people');

		$user = isset($_REQUEST['user'])? $_REQUEST['user'] : $this->session->appig_user;
		$word = isset($_REQUEST['app_name']) ? $_REQUEST['app_name'] : "";
		$profile =  $this->people->getProfile($user);

		$profile["followers"] = $this->people->getFollowersCount($user);
		$profile["following"] = $this->people->getFollowingCount($user);
		$profile["repositories"] = count( $this->repository->getRepositories($user));

		$this->load->view('header',[
			"view" =>  $this->separate([$user,"apps","search",$word]),
			"title" =>  $user." - apps",
			"selected" => 0,
			"token" =>  $this->session->appig_token,
			"entries" => $this->repository->getReleasesLike($user,$word),
			"profile" => $profile,
			"me" => $this->session->appig_user,
		]);
		$this->load->view('profile');
		$this->load->view('profileApps');
		$this->load->view('footer');
	}

	/**
	 * Get followers of a user 
	 * and show the view.
	 */
	public function followers()
	{
		$this->checkAccess();
		$this->load->model('people');
		$this->load->model('repository');

		$user = isset($_REQUEST['user'])? $_REQUEST['user'] : $this->session->appig_user;
		$profile =  $this->people->getProfile($user);

		$followers = $this->people->getFollowers($user);
		$profile["followers"] = Count($followers);
		$profile["following"] = $this->people->getFollowingCount($user);
		$profile["repositories"] = count( $this->repository->getRepositories($user));

		$this->load->view('header',[
			"view" => $this->separate([$user,"followers"]),
			"selected" => 2,
			"token" =>  $this->session->appig_token,
			"title" =>  $user." - followers",
			"entries" => $followers,
			"profile" => $profile,
			"me" => $this->session->appig_user,
		]);
		$this->load->view('profile');
		$this->load->view('profileFollowers');
		$this->load->view('footer');
	}

	/**
	 * Get follows of a user 
	 * and show the view.
	 */
	public function following()
	{
		$this->checkAccess();
		$this->load->model('people');
		$this->load->model('repository');

		$user = isset($_REQUEST['user'])? $_REQUEST['user'] : $this->session->appig_user;
		$profile =  $this->people->getProfile($user);

		$following =  $this->people->getFollowing($user);
		$profile["followers"] = $this->people->getFollowersCount($user);
		$profile["following"] =  Count($following);
		$profile["repositories"] = count( $this->repository->getRepositories($user));

		$this->load->view('header',[
			"view" =>  $this->separate([$user,"following"]),
			"selected" => 3,
			"token" =>  $this->session->appig_token,
			"title" =>  $user." - following",
			"entries" => $following,
			"profile" => $profile,
			"me" => $this->session->appig_user,
		]);
		$this->load->view('profile');
		$this->load->view('profileFollowers');
		$this->load->view('footer');
	}

	/**
	 * Get teams of a user 
	 * and show the view.
	 */
	public function teams()
	{
		$this->checkAccess();
		$this->load->model('people');
		$this->load->model('repository');

		$user = isset($_REQUEST['user'])? $_REQUEST['user'] : $this->session->appig_user;
		$profile =  $this->people->getProfile($user);

		$teams = $this->people->getTeams($user);  
		$profile["followers"] = $this->people->getFollowersCount($user);
		$profile["following"] =  count($this->people->getFollowing($user));
		$profile["repositories"] = count( $this->repository->getRepositories($user));

		$this->load->view('header',[
			"view" =>  $this->separate([$user,"teams"]),
			"selected" => 4,
			"token" =>  $this->session->appig_token,
			"title" =>  $user." - teams",
			"entries" => $teams,
			"profile" => $profile,
			"me" => $this->session->appig_user,
		]);
		$this->load->view('profile');
		$this->load->view('profileTeams');
		$this->load->view('footer');
	}

	/**
	 * Check the token allows passing
	 * or redirects to the login view.
	 */
	public function checkAccess(){
		if($this->access->checkToken($this->session->appig_user,$this->session->appig_token) == false){
			redirect(base_url('index.php/Login/'));
			return false;
		}else return true;
	}

	/**
	 * Log out of appIgniter
	 */
	public function logOut(){
		$this->session->sess_destroy();
		redirect(base_url('index.php/app/'),'refresh');
	}

	/**
	 * Separate words with separator
	 */
	public function separate($words){
		return join(SEPARATOR,$words);
	}
}