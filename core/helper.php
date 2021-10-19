<?php

    include 'database.php';

    session_start();

    @$id  = $_GET['id'];

    function base_url($target)
    {
      $projectName = explode("/",$_SERVER['SCRIPT_NAME']);
      echo $projectName[1]."/".$target;
    }

    function url($target)
    {
        $projectName = explode("/",$_SERVER['SCRIPT_NAME']);
        echo "http://$_SERVER[HTTP_HOST]/$projectName[1]/$target";
    }

    function this_url()
    {
      return "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    }

    function controller($controllerName, $id = 0)
    {

        if ($id) {
          @$id = $id;
        }else{
          @$id = $_GET['id'];
        }
        
        $projectName = explode("/",$_SERVER['SCRIPT_NAME']);
        $controllerName = explode("@",$controllerName);

        echo "http://localhost/$projectName[1]/core/controller.php?controllerName=$controllerName[0].php&function=$controllerName[1]&id=$id";
        
    }

    function check($excecute)
    {
      
      global $host;
      
      include 'check.php';

      die();
      exit();
    }

    // REDIRECT

    function alert($title = 0,$msg = 0, $typeAlert = 0)
    {

      if (!$title) {
        $title = "Berhasil!";
      }

      if (!$msg) {
        $msg = "Berhasil";
      }

      if (!$typeAlert) {
        $typeAlert = "success";
      }
      
      @$_SESSION["title_alert"]   = $title;
      @$_SESSION["message_alert"] = $msg;
      @$_SESSION["type_alert"]    = $typeAlert;
      
    }

    function view($target, $data = null)
    {
      
      $anchor = null;

      foreach ($data as $key => $value) {
        foreach ($value as $key1 => $value1) {
          $anchor[$key][$key1] = $value1;
        }
      }

      @$_SESSION["data"] = $anchor;
      
      header('location:../'.$target);

    }

    /*
     *  MYSQL QUERY
     */

    function query()
    {
      $query = new Query;
      return $query;
    }

    class Query{

      private $table         = "";
      private $select        = "";
      private $where         = "";
      private $orderBy       = "";
      private $join          = "";
      private $praFinalQuery = "";
      private $finalQuery    = "";

      function table($table)
      {
          $this->table .= $table;
          return $this;
      }

      function select($selectColumn)
      {
          $this->select .= "SELECT ".$selectColumn." FROM ".$this->table;
          return $this;
      }

      function join($table, $column)
      {
          $this->join .= " INNER JOIN $table ON $column";
          return $this;
      }

      function where($where, $operator, $with = null)
      {

          if (!$with) {
            $this->where .= " WHERE $where = '$operator'";
          }else{
            $this->where .= " WHERE $where $operator '$with'";
          }

          return $this;
      }

      function orderBy($column, $type)
      {
          $this->orderBy .= " ORDER BY $column ".$type;
          return $this;
      }

      function get()
      {
        global $host;

          if ($this->select) {
              $this->praFinalQuery = $this->select;
          }

          if (!$this->select) {
              $this->praFinalQuery = "SELECT * FROM ".$this->table;
          }

          if ($this->join) {
              $this->praFinalQuery = $this->praFinalQuery.$this->join;
          }
          
          if ($this->where) {
              $this->finalQuery .= $this->praFinalQuery.$this->where;
          }else{
              $this->finalQuery .= $this->praFinalQuery;
          }

          return mysqli_query($host, $this->finalQuery);
      }

      function single()
      {
        global $host;

          if ($this->select) {
              $this->praFinalQuery = $this->select;
          }

          if (!$this->select) {
              $this->praFinalQuery = "SELECT * FROM ".$this->table;
          }

          if ($this->join) {
              $this->praFinalQuery = $this->praFinalQuery.$this->join;
          }
          
          if ($this->where) {
              $this->finalQuery .= $this->praFinalQuery.$this->where;
          }else{
              $this->finalQuery .= $this->praFinalQuery;
          }

          return mysqli_fetch_object(mysqli_query($host, $this->finalQuery));
      }

      function limit($value)
      {
          return $this->get()." LIMIT $value";
      }

      function raw($query)
      {
        global $host;
        return mysqli_query($host, $query);
      }

      /* 
        FUNCTION CRUD
      */

      /* CREATE */
      public function insert($table = 0, $values)
      {
        
        global $host;
        global $status;

        $data = (object)[];

        $values     = implode("','",$values);

        $dataValue  = "'".$values."'";

        $data->query = mysqli_query($host, "INSERT INTO $table VALUES('',$dataValue)");
        
        $data->id    = $host->insert_id;
        
        $cmdQuery    = $data->query;
        if ($data->query) {

          $data                = true;
          $status       .= true;

        }else{

          $status       .= false;

        }

        return new self;
      }
      /* END CREATE */

      /* UPDATE */
      public function update($table, $value, $id)
      {
          global $host;
          global $status;
          global $status;

          $sql = null;
          foreach($value as $k => $v){
            $sql .= " $k='$v',";
          }

          $sql = trim($sql, ',');

          $command = mysqli_query($host, "UPDATE $table SET $sql WHERE ".getPrimary($table)." = $id ");

          if ($command) {

            $status       .= true;
  
          }else{
  
            $status       .= false;
  
          }
          session_unset();

          return new self;
      }
      /* END UPDATE */

      /* DELETE */
      public function delete($table, $id, $column = 0)
      {

        global $host;
        global $status;

        if (!$column) {
          $query = mysqli_query($host, "DELETE FROM $table WHERE ".getPrimary($table)." = $id ");
        }else{
          $query = mysqli_query($host, "DELETE FROM $table WHERE $id = $column ");
        }


        if ($query) {

          $status       .= true;

        }else{

          $status       .= false;

        }

        return new self;

      }
      /* END DELETE */

      /* REDIRECT IF TRUE */
      public function view($target = 0, $msg = 0)
      {
        global $status;

        @$_SESSION["alert"] = $msg;

        if ($status) {
          header('location:../'.$target);
        }else{
          check($status);
        }

        
      }
      /* END REDIRECT */


    }

    function getPrimary($table)
    {
      global $host;
      $query = mysqli_query($host, "SHOW KEYS FROM ".$table." WHERE Key_name = 'PRIMARY'");
      return mysqli_fetch_object($query)->Column_name;
    }

    /* END MYSQL QUERY*/
    
    
    /* TABLE VIEW*/
    $no = 1;
    
    function tr()
    {
      echo "<tr>";
    }

    function td($list = null, $attr = null)
    {
      echo "<td $attr >$list</td>";
    }

    function endtr()
    {
      echo "</tr>";
    }

    function tombolHapus($target = null, $value = null, $attr  = null)
    {
      return "<a href='$target' class='btn btn-sm btn-danger shadow' $attr><i class='fa fa-trash'></i> $value</a>";
    }

    function tombolEdit($target = null, $value = null, $attr  = null)
    {
      return "<a href='$target' class='btn mx-1 btn-sm btn-warning shadow' $attr><i class='fa fa-edit'></i> $value</a>";
    }

    function tombolForm()
    { 

      $tombol  = "<div class='mt-3'>";
        $tombol .= "<a href='data' class='mx-1 btn btn-sm btn-warning float-right shadow'>Kembali</a>";
        $tombol .= "<button type='reset' class='mx-1 btn btn-sm btn-danger float-right shadow'>Reset</button>";
        $tombol .= "<button type='submit' class='mx-1 btn btn-sm btn-primary float-right shadow'>Simpan</button>";
      $tombol .= "</div>";

      echo $tombol;
      
    }

    /* END */
    
    /*For Edit View*/

    function loadView($target, array $data)
    {
      include "../resource/layouts/backend/header.php";
      include "../resource/views/$target.php";
      include "../resource/layouts/backend/footer.php";
    }

    function ambil(array $params)
    {
      mysqli_fetch_object($params);
    }
    /* END */

    /* HITUNG DATA */

    function hitung($data)
    {
      return $data->num_rows;
    }
    /* END HITUNG DATA */

    /* 
      MENGGANTI DARI [ARRAY] KE OBJECT (SESSION)
      $data ini akan dipakai untuk view yang memakai function compact
    */
    @$data = json_decode(json_encode($_SESSION["data"]));

    /*
    * ALL ABOUT FILES
    */

    function files($nameField)
    {
      return $_FILES[$nameField]['name'];
    }

    function asset($target)
    {
      $projectName = explode("/",$_SERVER['SCRIPT_NAME']);
      $root        = $_SERVER['HTTP_HOST'];
      return "http://$root/$projectName[1]/resource/assets/$target";
    }

    function move($tmp, $target)
    {
      $tmp = $_FILES[$tmp]['tmp_name'];
      return move_uploaded_file($tmp, $target);
    }

    function resource($target)
    {
      $projectName = explode("/",$_SERVER['SCRIPT_NAME']);
      $root        = $_SERVER['HTTP_HOST'];
      return "http://$root/$projectName[1]/resource/$target";
    }

    function FunctionName(Type $var = null)
    {
      # code...
    }

    /**END FILES */
    
