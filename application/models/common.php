<?php
class common extends CI_Model {
    
    function __construct()
 	{
 		parent::__construct();	
 	}

  /*生成级联列表*/
  function generateJiList($array)
  {
    //urldecode($array);
    foreach ($array as $str) {
      echo "<option  value = $str[0]>";
      echo str_replace("&nbsp;", "",$str[1]);
      echo "</option>";
    }
  }

 	function generatePf()
 	{
 		$Pf= 
		"<select name='platform' size='2' id='platform'>
		  <option value='1'>大陆安卓 </option>
  		<option value='2'>大陆IOS官方</option>
  		<option value='3'>大陆IOS越狱</option>
  		<option value='4'>韩服</option>
  		<option value='5'>港澳台</option>
      <option value='6'>腾讯</option>
  		</select>
  		";
  		return $Pf;
 	}

  function generatePfInSerUtil()
  {
    $Pf= 
    "<select name='platform' size='2' id='platform'>
    <option value='1'>飞流App官方 </option>
    <option value='2'>飞流IOS越狱</option>
    <option value='3'>A8安卓</option>
    <option value='4'>昆仑繁体</option>
    <option value='5'>昆仑韩文</option>
    <option value='6'>昆仑日文</option>
    <option value='7'>A8腾讯</option>generatePjByid_value
    </select>
      ";
      return $Pf;
  }

  function getPfList()
  {
    $array = array();
    $sql = "SELECT p_name FROM dic_platform";
    $query = $this->db->query($sql);
    $qr = $query->result();
    foreach ($qr as $row) {
      array_push($array, $row->p_name);
    }
    return $array;
  }   

 	function generatePj($arrPj,$name)
 	{
 		$head = "<select id ='" . $name . "' name='" . $name  . "' size='3'>";
 		$tail = "</select>";
 		$content = "";
 		$i = 1;
 		foreach ($arrPj as $key ) {
 			$content = $content . "<option value='" . $i . "'>" . $key . "</option> " ;
 			$i = $i + 1;
 		}
 		$Pj = $head . $content .$tail;
 		return $Pj;
 	}



  function generateSelPjByid($arrPj,$name,$selid)
  {
    $head = "<select id ='" . $name . "' name='" . $name  . "' size='3'>";
    $tail = "</select>";
    $content = "";

    $i = 1;
    foreach ($arrPj as $key ) {
    if($selid == $i)
      $content = $content . "<option value='" . $i . "' selected>" . $key . "</option> " ;
    else
      $content = $content . "<option value='" . $i . "'>" . $key . "</option> " ;
      $i = $i + 1;
    }
    $Pj = $head . $content .$tail;
    return $Pj;
  }

  //带初始化参数的项目下拉框生成器
  function generateSelPjByid_init($arrPj,$name,$selid,$initvalue)
  {
    $head = "<select id ='" . $name . "' name='" . $name  . "' size='3'>";
    $tail = "</select>";
    $content = "";
    $i = $initvalue;
    foreach ($arrPj as $key ) {
    if($selid == $i)
      $content = $content . "<option value='" . $i . "' selected>" . $key . "</option> " ;
    else
      $content = $content . "<option value='" . $i . "'>" . $key . "</option> " ;
      $i = $i + 1;
    }
    $Pj = $head . $content .$tail;
    return $Pj;
  }

  function generateSelPjByName($arrpj,$name,$selname)
  {
      $head = "<select id ='" . $name . "' name='" . $name  . "' size='3'>";
      $tail = "</select>";
      $content = "";
      $i = 1;
      foreach ($arrPj as $key ) {
      if($key == $selname)
        $content = $content . "<option value='" . $i . "' selected>" . $key . "</option> " ;
      else
        $content = $content . "<option value='" . $i . "'>" . $key . "</option> " ;
      $i = $i + 1;
      }
      $Pj = $head . $content .$tail;
      return $Pj;
  }

  /*生成复选下拉框
    $arr_all: keylist + valuelist
    $arr_sel: valuelist
  */
 	function generateSelMul($arr_all,$name,$arr_sel)
 	{
 		  //$arr_mul = explode(",",$this->input->post('multilist'));
  		$head = "<select name='$name' multiple='multiple' size='2' id='$name'>";
  		$tail = "</select>";
  		$content = "";
  		$flag = 0;
  		if(!empty($arr_all[0]))
  		{
	  		 	foreach ($arr_all as $all) {
	  		 	$flag = 0;

	  		 	foreach ($arr_sel as $sel ) {
	  		 		if($sel == $all[0])
	  		 		{
	  		 			$flag++;
	  		 		}
	  		 	}
	  		 	if($flag >= 1)
	  		 		$content = $content . "<option selected = 'selected' value = '" . $all[0] . "'>" . $all[1] . "</option>";
	  		 	else
	  		 		$content = $content . "<option value = '" . $all[0] . "'>" . $all[1] . "</option>";	
  				
  			}
  		}
  		return $head.$content.$tail;
 	}

/*生产一个不是自动填写value的下拉框
  arrPj[0] = value
  arrPj[1] = name
*/

  function generatePjByid_value($arrPj,$name)
  {
    $head = "<select id ='" . $name . "' name='" . $name  . "' size='3'>";
    $tail = "</select>";
    $content = "";
    
    if(!empty($arrPj))
    {
      foreach ($arrPj as $key ) {
        $content = $content . "<option value='" . $key[0] . "'>" . $key[1] . "</option> " ;
      }
    }
    $Pj = $head . $content .$tail;
    return $Pj;
  }

  function generateSelPjByid_value($arrPj,$name,$id)
  {
    $head = "<select id ='" . $name . "' name='" . $name  . "' size='3'>";
    $tail = "</select>";
    $content = "";
    if(!empty($arrPj))
    {
      foreach ($arrPj as $key ) {
        if($key[0] == $id)
        {
          $content = $content . "<option selected = 'selected' value='" . $key[0] . "'>" . $key[1] . "</option> " ;
        }
        else
           $content = $content . "<option value='" . $key[0] . "'>" . $key[1] . "</option> " ;
      }
    }
    $Pj = $head . $content .$tail;
    return $Pj;
  }

  function getGroupArr($group)
  {
    $arrreturn = array();

    $arrpf = $this->getPfList();

    $arrgroup = explode(",", $group);
    foreach ($arrgroup as $row) {
        array_push($arrreturn, array($row,$arrpf[$row - 1]));
    }
    return $arrreturn;
  }

  function write_log($type,$sql,$username,$platform,$classify)
  {
/*      if($classify == 1)
      {
        $sql = "SELECT label FROM oss_platform WHERE id = $platform";
        $query = $this->db->query($sql);
        $pflabel = $query->result()[0]->label;
      }*/
      if($classify == 2 || $classify == 1)
      {
        $sqlstr = "SELECT p_name FROM dic_platform WHERE p_id = $platform";
        $query = $this->db->query($sqlstr);
        $pflabel = $query->result()[0]->p_name;        
      }
      else
        $pflabel = "";
      $time = date('Y-m-d H:i:s',time());
      $ip = $this->input->ip_address();
      $sql = "INSERT INTO `operate_log` values('','$type','$time',\"$sql\",'$ip'," . $this->db->escape($username) . ",'$pflabel'" .")";
      //print_r($sql);
      $query = $this->db->query($sql);

  }  

    function getServerIdStr($platform)
    {
        $sidstr = "";
        if(empty($platform))
          return;
        $sql = "SELECT si_sid FROM viewserverinfo WHERE u_name = 'Produce' AND ui_platformid = $platform";
        //print_r($sql);
        $query = $this->db->query($sql);
        foreach ($query->result() as $str) {
            $sidstr = $str->si_sid . "," . $sidstr;
          }
          $sidstr = substr($sidstr,0,strlen($sidstr)-1);

      return $sidstr;
    }


    function getMenuLable($menuid)
    {
      $sql = "SELECT lable FROM menu WHERE menuid = $menuid";
      $query = $this->db->query($sql);
      return $query->result()[0]->lable;
    }

    function getPfName($platformid)
    {
      $sql = "SELECT p_name FROM dic_platform WHERE p_id = $platformid";
      $query = $this->db->query($sql);
      return $query->result()[0]->p_name;

    }

  public function writeFile($title,$list,$name,$actnum)
  {
    $titlearray = array('总','壮士','豪杰','诸侯','王侯','霸主','君王'); 
    $nowtime = date('YmdHis',time());
    $guid = $this->session->userdata('guid');
    $filename = $name . "_" . $guid . "_" . $nowtime .".csv";
    //echo "filename:++++++++++++++" . $filename; 
    if(empty($title) || empty($list))
      return;
    $tempstr = "";
    $flag = true;
    $handle = fopen("./csv/$filename", "w");
      if ($handle) {
      fwrite($handle,chr(0xEF).chr(0xBB).chr(0xBF));

    if($actnum != 0)
    {
        $tempstr = "," ;
        foreach ($titlearray as $key) {
          $tempstr = $tempstr . $key;
          for ($i=0; $i < $actnum ; $i++) { 
            $tempstr = $tempstr . ",";

        }
      }
      fwrite($handle, $tempstr."\r\n");
    }
      
      $tempstr = "";

      foreach ($title as $tl) {
        $tempstr = $tempstr . "," .$tl;
      }
      $tempstr = substr($tempstr,1);
      fwrite($handle, $tempstr."\r\n");
      $tempstr = "";

      foreach ($list as $ls) {
        foreach ($ls as $row) {
          $tempstr = $tempstr . "," .$row;
        }
        $tempstr = substr($tempstr,1);
        fwrite($handle, $tempstr."\r\n");
        $tempstr = "";
      }
      fclose($handle);
    }

    return $filename;
  }
    
}
?>
