<?php

    include 'database.php';

    session_start();

    @$id  = $_GET['id'];
    

    //From Root Project Name
    function base_url($target)
    {
      $projectName = explode("/",$_SERVER['SCRIPT_NAME']);
      echo $projectName[1]."/".$target;
    }
    //End

    // To Asset Folder
    function asset($target)
    {
      $projectName = explode("/",$_SERVER['SCRIPT_NAME']);
      $root        = $_SERVER['HTTP_HOST'];
      echo "http://$root/$projectName[1]/resource/assets/$target";
    }

    function url($target)
    {
        echo "../$target";
    }

    function controller($controllerName, $id = 0)
    {

        if ($id) {
          $id = $id;
        }else{
          $id = $_GET['id'];
        }
        
        $projectName = explode("/",$_SERVER['SCRIPT_NAME']);
        $controllerName = explode("@",$controllerName);

        return "http://localhost/$projectName[1]/core/controller.php?controllerName=$controllerName[0].php&function=$controllerName[1]&id=$id";
        
    }

    function check($excecute)
    {
      
      global $host;
      @$url     = explode("/",@$_SERVER['REQUEST_URI']);
      @$getFile = explode(".", $url[3]);

      echo '<link rel="stylesheet" href="../resource/assets/dist/css/bootstrap.min.css">';

      if(empty($excecute) || $excecute == '' || $excecute == null || $excecute == 'null'){
        echo "<body style='padding:20px'>";
          echo '<div style="color:white;background-color:#18171b;padding:30px;border-radius:7px;box-shadow:2px 9px 13px #c1c1c1">';
          echo '<span style="float:left;color:#1299da"><span style="color:orange">#</span>'.$_GET['controllerName'].'/'.$_GET['function'].'<span style="color:orange"> :</span></span><br>';
            echo "<div style='margin-top:10px;margin-left: 19px;'>";

            if (mysqli_errno($host) == 1054) {

              $replace = str_replace('Unknown column','',mysqli_error($host));
              $replace = str_replace(" in 'field list'",'',$replace);

              echo '<span style="color:#ffffff"><b style="margin-right:6px;color:#e056fd">'.mysqli_errno($host).'</b>|<span style="margin-left:6px">Tidak ditemukan kolom dengan nama'.$replace.'</span></span>';
            }else{
              echo '<span style="color:#ffffff"><b style="margin-right:6px;color:#e056fd"><span>'.mysqli_error($host).'</span></span>';
            }

            echo "</div>";
          echo '</div>';
          echo "</body>";
      }else{

        if (is_string($excecute)) {

          echo "<body style='padding:20px'>";
          echo '<div style="color:white;background-color:#18171b;padding:30px;border-radius:7px;box-shadow:2px 9px 13px #c1c1c1">';
          echo '<span style="float:left;color:#1299da"><span style="color:orange">#</span>'.$_GET['controllerName'].'/'.$_GET['function'].'<span style="color:orange"> :</span></span><br>';
            echo "<div style='margin-top:10px;margin-left: 19px;'>";
            echo '<i style="color:white">'.var_export($excecute, true).'</i> <span style="color:#f9ca24">($string)</span>';
            echo "</div>";
          echo '</div>';
          echo "</body>";

        }else if(is_array($excecute)){

          echo "<body style='padding:20px'>";
          echo '<div style="color:white;background-color:#18171b;padding:30px;border-radius:7px;box-shadow:2px 9px 13px #c1c1c1">';
            echo '<span style="float:left;color:#1299da"><span style="color:orange">#</span>'.$_GET['controllerName'].'/'.$_GET['function'].'<span style="color:orange"> :</span></span><br>';
            echo '<span style="color:orange">#</span>request<span style="color:orange">:</span> <span style="color:#1299da">array</span> <span style="color:orange">[</span>';
              echo "<table style='margin-top:10px;margin-left: 20px;'>";
              foreach ($excecute as $key => $value) {
                echo "<tr>";
                  echo "<td style='color:#4cd137;width: 30px;'>";
                  echo '<span style="color:#ffa502">"</span>';
                  echo $key;
                  echo '<span style="color:#ffa502">"</span>';
                  echo "</td>";
                  echo "<td width='30px' style='color:#ffa502'>=></td>";
                  echo "<pre style='color:white'>";
                  echo "<td style='color:white'><i> ".$value." </i></td>";
                  echo "</pre>";
                echo "</tr>";
              }
              echo "</table>";
            echo '<span style="color:orange;margin-left:10px">]</span>';
          echo '</div>';
          echo "</body>";

        }else if(is_int($excecute)){

          echo "<body style='padding:20px'>";
          echo '<div style="color:white;background-color:#18171b;padding:30px;border-radius:7px;box-shadow:2px 9px 13px #c1c1c1">';
          echo '<span style="float:left;color:#1299da"><span style="color:orange">#</span>'.$_GET['controllerName'].'/'.$_GET['function'].'<span style="color:orange"> :</span></span><br>';
            echo "<div style='margin-top:10px;margin-left: 19px;'>";
            echo '<span style="color:#f9ca24">'.var_export($excecute, true).'</span> <i style="color:#7ed6df">int</i>';
            echo "</div>";
          echo '</div>';
          echo "</body>";

        }else{
          echo "<body style='padding:20px'>";
          echo '<div style="color:white;background-color:#18171b;padding:30px;border-radius:7px;box-shadow:2px 9px 13px #c1c1c1">';
            echo '<span style="float:left;color:#1299da"><span style="color:orange">#</span>All Request<span style="color:orange"> :</span></span><br>';
            echo "<table style='margin-top:10px;margin-left: 19px;'>";

            foreach ($excecute as $key => $value) {

              echo "<tr>";
                echo "<td style='color:#4cd137;width: 107px;'>";
                echo '<span style="color:#ffa502">"</span>';
                echo $key;
                echo '<span style="color:#ffa502">"</span>';
                echo "</td>";
                echo "<td width='30px' style='color:#ffa502'>=></td>";
                echo "<td style='color:#7ed6df'><i> $value </i></td>";
              echo "</tr>";

              foreach ($value as $keys => $values) {
                echo "<tr>";
                  echo "<td style='color:#4cd137;width: 107px;'>";
                  echo '<span style="color:#ffa502">"</span>';
                  echo $key."['$keys']";
                  echo '<span style="color:#ffa502">"</span>';
                  echo "</td>";
                  echo "<td width='30px' style='color:#ffa502'>=></td>";
                  echo "<td style='color:#7ed6df'><i> $values </i></td>";
                echo "</tr>";
              }

            }
            echo "</table>";
          echo '</div>';
          echo "</body>";
        }
      }

      die();
      exit();
    }

    // REDIRECT

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
     *  INSERT INTO TABLE
     */

    class Query{

      static function insert($table = 0, $values)
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

          $data         = true;
          $status       = true;

        }else{

          $status       = false;

        }

        return new self;
      }

      static function delete($table, $id)
      {

        global $host;
        global $status;

        $query = mysqli_query($host, "DELETE FROM $table WHERE ".getPrimary($table)." = $id ");

        if ($query) {
          
          $status = true;

        }else{

          check($query);
          $status = false;

        }

        return new self;

      }

      static function update($table, $value, $id)
      {
          global $host;
          global $status;

          $sql = null;
          foreach($value as $k => $v){
            $sql .= " $k='$v',";
          }

          $sql = trim($sql, ',');

          $command = mysqli_query($host, "UPDATE $table SET $sql WHERE ".getPrimary($table)." = $id ");

          if ($command) {
          
            $status = true;
  
          }else{
  
            check($command);
            $status = false;
  
          }
          session_unset();
  
          return new self;
      }

      public function view($target = 0)
      {

        global $status;
        
        if ($status == true) {
          header('location:../'.$target);
        }else{
          check('error');
        }
        
      }

      static function select($table)
      {

        global $host;
        return mysqli_query($host, "SELECT * FROM $table");
        
      }

      static function single($table, $where = null)
      {

        global $host;
        global $id;

        if ($where) {
          $query = mysqli_query($host, "SELECT * FROM $table WHERE ".getPrimary($table)."  = $where ");
        }else{
          $query = mysqli_query($host, "SELECT * FROM $table");
        }

        return mysqli_fetch_object($query);
        
      }

      static function table($table)
      {

        global $host;
        return mysqli_query($host, "SELECT * FROM $table ORDER BY ".getPrimary($table)." DESC ");
        
      }

      static function raw($query)
      {
        global $host;
        return mysqli_query($host, "$query");
      }


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

    @$data = json_decode(json_encode($_SESSION["data"]));
    