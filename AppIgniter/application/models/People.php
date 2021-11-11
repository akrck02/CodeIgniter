<?php
class People extends CI_Model
{

  /** 
   *  Get followers of a user
   */
  public function getFollowers($username)
  {
    $sql = "Select * from follow where following='$username'";
    $query = $this->db->query($sql);

    $fetch = $query->result_array();
    $result = [];

    foreach ($fetch as $key => $value) {
      $profile = $this->getProfile($value['follower']);
      $value['profile'] = $profile;
      $result[] = $value;
    }

    return $result;
  }

  /** 
   *  Get followers of a user
   */
  public function getFollowersCount($username)
  {
    $sql = "Select * from follow where following='$username'";
    $query = $this->db->query($sql);

    $fetch = $query->result_array();
    $result = [];

    foreach ($fetch as $key => $value) {
      $profile = $this->getProfile($value['follower']);
      $value['profile'] = $profile;
      $result[] = $value;
    }

    return Count($result);
  }

  /** 
   *  Get user follows
   */
  public function getFollowing($username)
  {
    $sql = "Select * from follow where follower='$username'";
    $query = $this->db->query($sql);

    $fetch = $query->result_array();
    $result = [];

    foreach ($fetch as $key => $value) {
      $profile = $this->getProfile($value['following']);
      $value['profile'] = $profile;
      $result[] = $value;
    }

    return $result;
  }

  /** 
   *  Get user follows
   */
  public function getFollowingCount($username)
  {
    $sql = "Select * from follow where follower='$username'";
    $query = $this->db->query($sql);

    $fetch = $query->result_array();
    $result = [];

    foreach ($fetch as $key => $value) {
      $profile = $this->getProfile($value['following']);
      $value['profile'] = $profile;
      $result[] = $value;
    }

    return count($result);
  }

  /** 
   *  Get user profile
   */
  public function getProfile($username)
  {
    $sql = "Select * from auth_profile where username='$username'";
    $query = $this->db->query($sql);

    $fetch = $query->result_array();
    $result = [];

    foreach ($fetch as $key => $value) {
      $result[] = $value;
    }

    return count($result) == 0 ? $result : $result[0];
  }


  /** 
   *  Get user profile
   */
  public function getProfilesLike($username)
  {
    $sql = "Select * from auth_profile where username LIKE '%$username%'";
    $query = $this->db->query($sql);

    $fetch = $query->result_array();
    $result = [];

    foreach ($fetch as $value) {
      $result[] = $value;
    }

    return $result;
  }

  /** 
   *  Get user teams
   */
  public function getTeams($username)
  {
    $sql = "Select * from team_auth where auth='$username'";
    $query = $this->db->query($sql);
    $fetch = $query->result_array();
    $result = [];

    foreach ($fetch as $value) {
      $sql2 = "SELECT * FROM team WHERE id =" . $value["team"];

      //TODO FIX
      //....................................
      $sql3 = "SELECT * FROM team_auth 
                INNER JOIN auth_profile 
                ON team_auth.auth=auth_profile.username 
                WHERE team_auth.team=" . $value["team"] .
        " AND NOT auth_profile.username='" . $username . "'";

      $query2 = $this->db->query($sql2);
      $query3 = $this->db->query($sql3);

      $team_data = $query2->result_array()[0];
      $team_data["members"] = $query3->result_array();
      $result[] = $team_data;
    }

    return count($result) == 0 ? $result : $result;
  }

  /** 
   *  Get user teams
   */
  public function getGlobalTeamsLike($word)
  {
    $sql = "Select * from team where name LIKE '%$word%'";
    $query = $this->db->query($sql);
    $fetch = $query->result_array();
    $result = [];

    foreach ($fetch as $value) {

      $sql3 = "SELECT * FROM team_auth 
                INNER JOIN auth_profile 
                ON team_auth.auth=auth_profile.username 
                WHERE team_auth.team=" . $value["id"];
      $query3 = $this->db->query($sql3);

     $team_data = $value;
     $team_data["members"] = $query3->result_array();
      $result[] = $team_data;
    }

    return count($result) == 0 ? $result : $result;
  }


}

