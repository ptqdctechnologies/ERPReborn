<?php
/*
	zk time attendance library by am05mhz
/**/

define('USHRT_MAX', 65535);

define('CMD_CONNECT', 1000);
define('CMD_EXIT', 1001);
define('CMD_ENABLEDEVICE', 1002);
define('CMD_DISABLEDEVICE', 1003);

define('CMD_ACK_OK', 2000);
define('CMD_ACK_ERROR', 2001);
define('CMD_ACK_DATA', 2002);

define('CMD_PREPARE_DATA', 1500);
define('CMD_DATA', 1501);

define('CMD_USERTEMP_RRQ', 9);
define('CMD_ATTLOG_RRQ', 13);
define('CMD_CLEAR_DATA', 14);
define('CMD_CLEAR_ATTLOG', 15);

define('CMD_WRITE_LCD', 66);

define('CMD_GET_TIME', 201);
define('CMD_SET_TIME', 202);

define('CMD_VERSION', 1100);
define('CMD_DEVICE', 11);

define('CMD_CLEAR_ADMIN', 20);
define('CMD_SET_USER', 8);

define('LEVEL_USER', 0);
define('LEVEL_ADMIN', 14);


class am05zk{
	
	private $ip;
	private $port;
	private $conn;
	
	private $reply_id;
	private $session_id = 0;

	public function __construct($ip, $port = 4370){
		$this->ip = $ip;
		$this->port = $port;
		
		$this->conn = fsockopen('udp://' . $ip, $port);
	}
	
	private function encode_time($t){
		/* zkemsdk.c - EncodeTime */
        $d = (($t->year % 100) * 12 * 31 + (($t->month - 1) * 31) + $t->day - 1) *
             (24 * 60 * 60) + ($t->hour * 60 + $t->minute) * 60 + $t->second;

        return $d;
	}
	
	private function decode_time($t){
		/* zkemsdk.c - DecodeTime */
		if (is_string($t)){
			$hex = '';
			for ($i = strlen($t); $i>=0; $i-=2){
				$hex .= substr($t, $i, 2);
			}
			$t = hexdec($hex);
		}
		
        $second = $t % 60;
        $t = $t / 60;

        $minute = $t % 60;
        $t = $t / 60;

        $hour = $t % 24;
        $t = $t / 24;

        $day = $t % 31+1;
        $t = $t / 31;

        $month = $t % 12+1;
        $t = $t / 12;

        $year = floor($t + 2000);
		
		// fix for wrong reading - am05mhz
		if ($second < 0) $second = 0;

		$d = new DateTime($year . '-' . $month . '-' . $day . ' ' . $hour . ':' . $minute . ':' . $second);
        return $d->format('Y-m-d H:i:s');
	}
	
	private function check_sum($d){
		$ctr = count($d);
		$chksum = 0;
		$i = 1;
		
		while ($ctr > 1){
			$u = unpack('S', pack('C2', $d['c' . $i], $d['c' . ($i + 1)]));
			$chksum += $u[1];
			
			if ($chksum > USHRT_MAX) $chksum -= USHRT_MAX;
			$ctr -= 2;
			$i += 2;
		}
		
		if ($ctr)
			$chksum += $d['c' . strval(count($d))];
		
		$chksum = $chksum % USHRT_MAX;
		
		if ( $chksum > 0 ) 
			$chksum = -($chksum);
		else
			$chksum = abs($chksum);

		$chksum -= 1;
		
		if ($chksum < 0) $chksum += USHRT_MAX;
		
		return $chksum;
	}

	private function create_header($cmd, $chksum, $session_id, $reply_id, $cmd_str){
		$data = pack('SSSS', $cmd, $chksum, $session_id, $reply_id) . $cmd_str;
		$data = unpack('C' . (8 + strlen($cmd_str)) . 'c', $data);
		$chksum = $this->check_sum($data);
		$reply_id += 1;
		$reply_id = $reply_id % USHRT_MAX;
		
		return pack('SSSS', $cmd, $chksum, $session_id, $reply_id) . $cmd_str;
	}
	
	private function get_header($reply){
		if (! $reply) return array('h1' => 0, 'h2' => 0, 'h3' => 0, 'h4' => 0, 'h5' => 0, 'h6' => 0, 'h7' => 0, 'h8' => 0);
		return unpack('H2h1/H2h2/H2h3/H2h4/H2h5/H2h6/H2h7/H2h8', substr($reply, 0, 8));
	}
	
	private function get_header_status($reply){
		if (is_array($reply)){
			$header = $reply;
		} else {
			$header = $this->get_header($reply);
		}
		return hexdec($header['h2'] . $header['h1']);
	}
	
	private function is_valid($reply){
		if ($this->get_header_status($reply) == CMD_ACK_OK){
			return true;
		} else {
			return false;
		}
	}
	
	public function connect(){
		$data = $this->create_header(CMD_CONNECT, 0, 0, -1 + USHRT_MAX, '');
		if ($this->conn){
			try {
				fwrite($this->conn, $data);
				$reply = fread($this->conn, 1024);
				if (strlen($reply) > 0){
					$header = unpack('H2h1/H2h2/H2h3/H2h4/H2h5/H2h6/H2h7/H2h8', substr($reply, 0, 8));
					$this->session_id = hexdec($header['h6'] . $header['h5']);
					$this->reply_id = hexdec($header['h8'] . $header['h7']);
					return $this->is_valid($reply);
				} else {
					return false;
				}
			} catch (ErrorException $e){
				return false;
			} catch (exception $e){
				return false;
			}
		}
	}
	
	public function disconnect(){
		$data = $this->create_header(CMD_EXIT, 0, $this->session_id, $this->reply_id, '');
		if ($this->conn){
			try {
				fwrite($this->conn, $data);
				$reply = fread($this->conn, 1024);
				$res = $this->is_valid($reply);
			} catch (ErrorException $e){
				$res = false;
			} catch (exception $e){
				$res = false;
			}
			fclose($this->conn);
			return $res;
		}
		return false;
	}
	
	private function send_command($cmd, $param = ''){
		$data = $this->create_header($cmd, 0, $this->session_id, $this->reply_id, $param);
		if ($this->conn){
			$reply = '';
			try {
				fwrite($this->conn, $data);
				$reply = fread($this->conn, 1024);
				$header = $this->get_header($reply);
				$this->session_id = hexdec($header['h6'] . $header['h5']);
				$this->reply_id = hexdec($header['h8'] . $header['h7']);
				return substr($reply, 8);
			} catch (ErrorException $e){
				return false;
			} catch (exception $e){
				return false;
			}
		}
	}

	public function get_version(){
		return $this->send_command(CMD_VERSION);
	}
	
	public function get_os(){
		return $this->send_command(CMD_DEVICE, '~OS');
	}
	
	public function get_platform(){
		return $this->send_command(CMD_DEVICE, '~Platform');
	}
	
	public function get_platform_version(){
		return $this->send_command(CMD_DEVICE, '~ZKFPVersion');
	}
	
	public function get_workcode(){
		return $this->send_command(CMD_DEVICE, 'WorkCode');
	}
	
	public function get_ssr(){
		return $this->send_command(CMD_DEVICE, '~SSR');
	}
	
	public function get_pin_width(){
		return $this->send_command(CMD_DEVICE, '~PIN2Width');
	}
	
	public function get_face_function(){
		return $this->send_command(CMD_DEVICE, 'FaceFunOn');
	}
	
	public function get_serial_number(){
		return $this->send_command(CMD_DEVICE, '~SerialNumber');
	}
	
	public function get_device_name(){
		return $this->send_command(CMD_DEVICE, '~DeviceName');
	}
	
	public function enable(){
		return $this->send_command(CMD_ENABLEDEVICE);
	}
	
	public function disable(){
		return $this->send_command(CMD_DISABLEDEVICE);
	}
	
	public function get_time(){
		$hex = bin2hex($this->send_command(CMD_GET_TIME));
		return $this->decode_time($hex);
	}
	
	public function set_time($time){
		return $this->send_command(CMD_SET_TIME, pack('I', $this->encode_time($time)));
	}
	
	private function get_data_size($reply){
		if ($this->get_header_status($reply) == CMD_PREPARE_DATA){
			$size = unpack('H2h1/H2h2/H2h3/H2h4', substr($reply, 8, 4));
			return hexdec($size['h4'] . $size['h3'] . $size['h2'] . $size['h1']);
		} else {
			return false;
		}
	}
	
	private function get_data($size){
		$buff = '';
		while ($size > 0){
			$data = fread($this->conn, min(1032, $size + 8));
			if ($this->get_header_status($data) == CMD_DATA){
				$buff .= substr($data, 8); 
			} else {
				$buff .= $data; 
			}
			$size -= min(1024, $size);
		}
		return $buff;
	}
	
	public function get_users($old_sdk = false){
		$data = $this->create_header(CMD_USERTEMP_RRQ, 0, $this->session_id, $this->reply_id, chr(5));
		if ($this->conn){
			$reply = '';
			try {
				fwrite($this->conn, $data);
				$reply = fread($this->conn, 1024);
				$header = $this->get_header($reply);
				
				if ($size = $this->get_data_size($reply)){
					$buff = $this->get_data($size);

					$this->session_id = hexdec($header['h6'] . $header['h5']);
					$this->reply_id = hexdec($header['h8'] . $header['h7']);
				} else {
					$buff = '';
				}
				
				$users = array();
				$unknown_data = array();
				
				//data length old: 28, new: 72
				if ($old_sdk){
					array_push($unknown_data, substr($buff, 0, 4));
					$buff = substr($buff, 4);
					$buff = str_split($buff, 28);

					foreach($buff as $b){
						if (strlen($b) == 28){
							$data = unpack('H56', $b);
							if (array_key_exists('1', $data)){
								$data = $data[1];
							}
							
							$id = hexdec(substr($data, 2, 2) . substr($data, 0, 2));
							$uid = hexdec(substr($data, 50, 2) . substr($data, 48, 2));
							
							$name = substr($b, 8, 8);
							$name = explode("\0", $name);
							$name = $name[0];
							
							$status = hexdec(substr($data, 42, 2));
							
							if ($name == '') $name = $uid;
						
							array_push($users, array(
									'id' => $id,
									'user' => $uid,
									'name' => $name,
									'status' => $status,
									'debug' => $b,
									'hex' => $data
								));
						} else {
							array_push($unknown_data, $b);
						}
					}
				} else {
					array_push($unknown_data, substr($buff, 0, 4));
					$buff = substr($buff, 4);
					$buff = str_split($buff, 72);

					foreach($buff as $b){
						if (strlen($b) == 72){
							$data = unpack('H144', $b);
							if (array_key_exists('1', $data)){
								$data = $data[1];
							}
							
							$id = hexdec(substr($data, 2, 2) . substr($data, 0, 2));
							
							$uid = substr($b, 48, 8);
							$uid = explode("\0", $uid);
							$uid = $uid[0];
							
							$name = substr($b, 11, 8);
							$name = explode("\0", $name);
							$name = $name[0];

							array_push($users, array(
									'id' => $id,
									'uid' => $uid,
									'name' => $name,
									'status' => 255,
									'debug' => $b,
									'hex' => $data
								));
						} else {
							array_push($unknown_data, $b);
						}
					}
				}
				
				return $users;
			} catch (ErrorException $e){
				return false;
			} catch (exception $e){
				return false;
			}
		}
	}
	
	public function set_user($uid, $userid, $name, $pwd, $role){
		$cmd_str = pack('C3', $uid % 256, $uid >> 8, $role) .
					str_pad($pwd, 8, "\0") . str_pad($name, 28, "\0") .
					str_pad(chr(1), 9, "\0") . str_pad($userid, 8, "\0") . str_repeat("\0", 16);
		return $this->send_command(CMD_SET_USER, $cmd_str);
	}
	
	public function clear_user(){
		return $this->send_command(CMD_CLEAR_DATA);
	}
	
	public function clear_admin(){
		return $this->send_command(CMD_CLEAR_ADMIN);
	}
	
	public function get_attendance($old_sdk = false){
		$data = $this->create_header(CMD_ATTLOG_RRQ, 0, $this->session_id, $this->reply_id, '');
		if ($this->conn){
			$reply = '';
			try {
				fwrite($this->conn, $data);
				$reply = fread($this->conn, 1024);
				$header = $this->get_header($reply);
				
				if ($size = $this->get_data_size($reply)){
					$buff = $this->get_data($size);

					$this->session_id = hexdec($header['h6'] . $header['h5']);
					$this->reply_id = hexdec($header['h8'] . $header['h7']);
				} else {
					$buff = '';
				}
				
				$att = array();
				$unknown_data = array();
				
				//data length old: 12, new: 36
				if ($old_sdk){
					array_push($unknown_data, substr($buff, 0, 2));
					$buff = substr($buff, 2);
					$buff = explode(hex2bin('ff000000'), $buff);
				
					foreach($buff as $b){
						if (strlen($b) == 12){
							$data = unpack('H24', $b);
							if (array_key_exists('1', $data)){
								$data = $data[1];
							}
							
							$uid = hexdec(substr($data, 6, 2) . substr($data, 4, 2));
							$hex = substr($data, 12, 8);
							$time = $this->decode_time($hex);
							
							array_push($att, array(
									'uid' => $uid,
									'user' => $uid, 
									'time' => $time,
									'status' => 255,
									//'a' => hexdec(substr($data, 20, 2)), 
									//'b' => hexdec(substr($data, 22, 2)), 
									'debug' => $b,
									'hex' => $data
								));
						} else {
							array_push($unknown_data, $b);
						}
					}
				} else {
					array_push($unknown_data, substr($buff, 0, 4));
					$buff = substr($buff, 4);
					$buff = explode(hex2bin('ff000000'), $buff);

					foreach($buff as $b){
						if (strlen($b) == 36){
							$data = unpack('H72', $b);
							if (array_key_exists('1', $data)){
								$data = $data[1];
							}
							
							$uid = hexdec(substr($data, 2, 2) . substr($data, 0, 2));
							
							$name = substr($b, 2, 8);
							$name = explode("\0", $name);
							$name = $name[0];
							
							$hex = substr($data, 54, 8);
							$time = $this->decode_time($hex);
							$status = hexdec(substr($data, 62, 2));

							array_push($att, array(
									'uid' => $uid,
									'user' => $name,
									'time' => $time,
									'status' => $status,
									'debug' => $b,
									'hex' => $data
								));
						} else {
							array_push($unknown_data, $b);
						}
					}
				}

				//var_dump($unknown_data);
				return $att;
			} catch (ErrorException $e){
				return false;
			} catch (exception $e){
				return false;
			}
		}
	}
	
	public function clear_attendance(){
		return $this->send_command(CMD_CLEAR_ATTLOG);
	}
	
}