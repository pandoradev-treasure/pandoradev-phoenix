<?php

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