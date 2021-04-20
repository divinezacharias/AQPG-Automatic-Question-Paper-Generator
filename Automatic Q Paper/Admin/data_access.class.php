<?php
class DataAccess
{
	private $_con;
	
	public function __construct()
	{
		$this->_con=mysqli_connect("localhost","root","admin","qpaper");
		if(mysqli_errno($this->_con))
		{
			die("connection error");
		}
		
	}
	
	public function get_scalar($field,$table,$condition)
	{
		$q="select $field from $table where $condition";
		//echo $q;
		$res=mysqli_query($this->_con,$q);
		if(mysqli_num_rows($res)>0)
		{
			$arr=mysqli_fetch_array($res);
			
			return $arr[0];
		}
		else 
			return false;
		
	}
	
	public function insert($arr,$table)
	{
		$q="insert into $table(";
		foreach($arr as $ind=>$val)
		{
			$q.=$ind.",";
		}
		$q=$this->_chop_query($q);
		$q.=") values(";
		foreach($arr as $ind=>$val)
		{
			$q.="'$val',";
		
		}
		$q=$this->_chop_query($q);
		$q.=")";
		//echo $q;
		if(mysqli_query($this->_con,$q))
		{
			return true;
		}
		else
			return false;
	}
	public function insert_full($arr,$table)
	{
		$q="insert into $table values(";
		foreach($arr as $val)
		{
			$q.="'$val',";
		}
		$q=$this->_chop_query($q);
		$q.=")";
		//echo $q;
		if(mysqli_query($this->_con,$q))
		{
			return true;
		}
		else
			return false;
		
	}
	public function select_array($fields,$table,$cond)
	{
		$q="select ";
		foreach($fields as $ind=>$val)
		{
			$q.=$val.",";
		}
		$q=$this->_chop_query($q);
		$q.=" from $table where $cond";
		
		$res=mysqli_query($this->_con,$q);
		$pass_arr=array();
		if(mysqli_num_rows($res))
		{
			while($row=mysqli_fetch_array($res))
			{
				$pass_arr[]=$row;
			}
			return $pass_arr;
		}
		else
			return false;
	}
	public function select_distinct($field,$table,$condition)
	{
		$q="select distinct $field from $table where $condition";
		$res=mysqli_query($this->_con,$q);
		$pass_arr=array();
		$i=0;
		while($row=mysqli_fetch_array($res))
		{
			$pass_arr[$i++]=$row;
		}
		return $pass_arr;
	}
	public function create_html_table($fields,$table,$cond)
	{
		$arr=$this->select_array($fields,$table,$cond);
		$table_str="";
		if(is_array($arr))
		{
			foreach($arr as $ind=>$val)
			{
				$table_str.="<tr>";
				$len=count($val)/2;
				$i=0;
				while($i<$len)
				{
					$table_str.="<td>".$val[$i++]."</td>";
				}
				
				$table_str.="</tr>";
				
			}
			return $table_str;
		}
		else
			return "";
		
	}
	public function create_option($val_field,$label_field,$table,$condition)
	{
		$options="";
		if($val_field!='')
		{
			
			$q="select distinct $val_field,$label_field from $table where $condition";
			//echo $q;
			$res=mysqli_query($this->_con,$q);
			while($arr=mysqli_fetch_array($res))
			{
				$options.="<option value='$arr[0]'>$arr[1]</option>";
			}
			return $options;
			
		}
		else
		{
			$q="select $label_field from $table where $condition";
			$res=mysqli_query($this->_con,$q);
			while($arr=mysqli_fetch_array($res))
			{
				$options.="<option>$arr[0]</option>";
			}
			return $options;
		}
		
	}
	public function update($arr,$table,$condition)
	{
		$q="update $table set ";
		foreach($arr as $ind=>$val)
		{
			$q.="$ind='$val',";
		}
		$q=$this->_chop_query($q);
		$q.=" where $condition";
		//echo $q."<br />";
		if(mysqli_query($this->_con,$q))
		{
			return true;
		}
		else
			return false;
		
	}
	
	public function count($table,$condition)
	{
		$q="select count(*) from $table where $condition";
		$res=mysqli_query($this->_con,$q);
		if(mysqli_num_rows($res)>0)
		{
			$arr=mysqli_fetch_array($res);
			return $arr[0];
		}
		else 
			return 0;
	}
	public function if_exists($field,$val,$table)
	{
		$q="select * from $table where $field='$val'";
		$res=mysqli_query($this->_con,$q);
		if(mysqli_num_rows($res))
		{
			return true;
		}
		else
			return false;
	}
	
	public function delete($table,$condition)
	{
		$q="delete from $table where $condition";
		if(mysqli_query($this->_con,$q))
		{
			return true;
		}
		else
			return false;
		
	}
	
	public function upload_file($FILES,$extarr,$size,$path)
	{
		$name=$FILES["name"];
		
		$ext=strrchr($name,".");
		echo "<br />";
		//$extarr=array(".jpeg",".png",".gif",".jpg",".bmp");
		if(in_array($ext,$extarr))
		{
			if($FILES['size']<$size*1000)
			{
				//rand(1000,9999);
				do
				{
				$orgname=substr(md5(rand(1,1000000)),1,10)."_".substr(md5(rand(1,1000000)),1,10)."_".substr(md5(rand(1,1000000)),1,10).$ext;
					
				}while(file_exists("$path/".$orgname));
				//echo $orgname;
				if(move_uploaded_file($FILES['tmp_name'],"$path/".$orgname))
				{
					return $orgname;
					
					
				}
				else
					return false;
			}
			else
				return false;
		}
		else
			return false;
	}
	public function null_check($arr)
	{
		foreach($arr as $val)
		{
			if($val=='')
			{
				return false;
			}
		}
		return true;
		
	}
	private function _chop_query($qr)
	{
		$l=strlen($qr);
		return substr($qr,0,$l-1);
	}
	
	
}



?>
