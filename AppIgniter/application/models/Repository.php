<?php
class Repository extends CI_Model {
    public function getRepositories($username){

        $sql = "Select * from repository where auth='$username'";
        $query = $this->db->query($sql);
       
        $fetch = $query->result_array();
        $result = [];

        foreach ($fetch as $key => $value) {
          $langs = $this->getLanguages($value['id']); 
          $value['langs'] = $langs;
          $result[] = $value;
        }
        
        return $result;
    }

    public function getRepositoriesLike($username,$word){
      $sql = "Select * from repository where auth='$username' and name LIKE '%".$word."%'";
      $query = $this->db->query($sql);
     
      $fetch = $query->result_array();
      $result = [];

      foreach ($fetch as $key => $value) {
        $langs = $this->getLanguages($value['id']); 
        $value['langs'] = $langs;
        $result[] = $value;
      }
      
      return $result;
  }

  public function getGlobalRepositoriesLike($word){
    $sql = "Select * from repository where name LIKE '%".$word."%'";
    $query = $this->db->query($sql);
   
    $fetch = $query->result_array();
    $result = [];

    foreach ($fetch as $key => $value) {
      $langs = $this->getLanguages($value['id']); 
      $value['langs'] = $langs;
      $result[] = $value;
    }
    
    return $result;
}

    public function getReleases($username){

      $sql = "Select * from repository inner join repo_release on repository.id=repo_release.repository where repository.auth='$username'";
      $query = $this->db->query($sql);
     
      $fetch = $query->result_array();
      $result = [];

      foreach ($fetch as $key => $value) {
        $langs = $this->getLanguages($value['id']); 
        $value['langs'] = $langs;
        $result[] = $value;
      }
      
      return $result;
  }

  public function getReleasesLike($username,$word){

    $sql = "Select * from repository inner join repo_release on repository.id=repo_release.repository where repository.auth='$username' and repository.name LIKE '%$word%'";
    $query = $this->db->query($sql);
   
    $fetch = $query->result_array();
    $result = [];

    foreach ($fetch as $key => $value) {
      $langs = $this->getLanguages($value['id']); 
      $value['langs'] = $langs;
      $result[] = $value;
    }
    
    return $result;
}


    public function getLanguages($repositoryID){
        $sql = "Select * from repo_lang where repository='$repositoryID'";
        $query = $this->db->query($sql);
       
        $fetch = $query->result_array();
        foreach ($fetch as $key => $value) {



            $result[] = $value;
          }
              
          return $result;
    }

}