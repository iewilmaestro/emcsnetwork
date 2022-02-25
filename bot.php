<?php
error_reporting(0);
const 
a = [
"iewil",
"emcsnetwork",
"https://bit.ly/3gFG1oc",
"https://youtube.com/c/iewil",
"https://pastebin.com/raw/JGzBgSKe",
"http://ip-api.com/json"
],
b = "\033[1;34m",
c = "\033[1;36m",
d = "\033[0m",
h = "\033[1;32m",
k = "\033[1;33m",
m = "\033[1;31m",
n = "\n",
p = "\033[1;37m",
u = "\033[1;35m",
v = "1.0",
hp = "\033[1;7m",
mp = "\033[101m\033[1;37m",
mm = "\033[101m\033[1;31m",
ht = "https://emcsnetwork.com";

function a($u, $h = 0, $p = 0, $x = 0){
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $u);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
	curl_setopt($ch, CURLOPT_COOKIE,TRUE);
	curl_setopt($ch, CURLOPT_COOKIEFILE,"cookie.txt");
	curl_setopt($ch, CURLOPT_COOKIEJAR,"cookie.txt");
	if($p){
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $p);
	}
	if($h){
		curl_setopt($ch, CURLOPT_HTTPHEADER, $h);
	}if($x){
		curl_setopt($ch, CURLOPT_HTTPPROXYTUNNEL, true);
		curl_setopt($ch, CURLOPT_PROXY, $x);
	}
	curl_setopt($ch, CURLOPT_HEADER, true);
	$r = curl_exec($ch);
	$c = curl_getinfo($ch);
	if(!$c) return "Curl Error : ".curl_error($ch); else{
		$hd = substr($r, 0, curl_getinfo($ch, CURLINFO_HEADER_SIZE));
		$bd = substr($r, curl_getinfo($ch, CURLINFO_HEADER_SIZE));
		curl_close($ch);
		return array($hd,$bd);
	}
}
function b($i=0){
	if(!$i){
		c();
	}
	$s = file_get_contents(a[4]);
	$t = e($s,'#'.a[1].':','|',1);
	if($t == "on"){
		$st = w("Online","h");
		$msg = "";
	}elseif($status == "off" or $status == null){
		$st = w("Offline","m");
		$msg = g();
	}
	$z = trim(strtolower(a[1]));
	return p.' Day:'.date("l").'    Date:'.date("d M Y").'    Time:'.date("H:i").n.l().
h." ╔═╗┬ ┬┌┐┌┌─┐┌┬┐┬┌─┐┌┐┌   ╔═╗┌─┐┌┬┐┬┬ ┬ ┬   ╦╔╦╗".n.
k." ╠╣ │ │││││   │ ││ ││││───╠╣ ├─┤│││││ └┬┘───║ ║║".n.
p." ╚  └─┘┘└┘└─┘ ┴ ┴└─┘┘└┘   ╚  ┴ ┴┴ ┴┴┴─┘┴    ╩═╩╝".n.l().
' Script    : '.$z.' '.v.'          '.$st.n.n.
'『』Creator: iewil'.n.'『』Youtube: youtube.com/c/iewil'.n.
'『』support: All-Team-Function & All-Member'.n.
'『』D_TRX  : TK67fkL9EpcoCqP2kxonwMmmwyQ5pJmm'.n.
w('『』NOTE   : THIS SCRIPT FREE NOT FOR SALE','u').n.l().n.$msg;
}
function c(){
	return system('clear');
}
function d($m){
	$s = str_split($m);
	foreach($s as $t){
		echo $t;
		usleep(70000);
	}
}
function e($a,$b,$c,$d){
	return explode($c,explode($b,$a)[$d])[0];
}
function g(){
	$a = w("Script mati karena web update / scam!","m")."\nSupport Channel saya dengan cara\nSubscribe ".w("https://www.youtube.com/c/iewil","k")."\nkarena subscribe itu gratis :D\nUntuk mendapatkan info Script terbaru\nJoin grub via telegram ~> ".w("https://t.me/Iewil_G","c")."\nðŸ‡®ðŸ‡© ".w("Family-Team-Function-INDO","b")."\n";
	print d($a);
}
function l(){
	$l = 50;
	return str_repeat('─',$l).n;
}
function s($n){
	if(file_exists($n)){
		$d = file_get_contents($n);
	}else{
		$d = readline(w("Input ".$n,"m").w(" > ","k").h.n);
		echo n;
		file_put_contents($n,$d);
	}
	return $d;
}
function t(){
	$t = json_decode(file_get_contents(a[5]),1)["timezone"];
	if($t){
		date_default_timezone_set($t);
	}
}
function w($s,$c){
	if($c == "r"){
		$w = ['h','k','b','u','m'];
		$c = $w[array_rand($w)];
	}
	$w = ['h'=>h,'k'=>k,'b'=>b,'u'=>u,'m'=>m,'p'=>p];
	return $w[$c].$s.d;
}
function x(){
	error_reporting(0);
	if(strpos(b(1),"iewil") == ""){
		c();
		echo 'Warning: Undefined variable $a on line 115'.n;
		exit;
	}
}
function h(){
	$c = s('Cookie');$u = s('User_Agent');
	return [
		"user-agent: ".$u,
		"cookie: ".$c
	];
}
function auto(){
	$url = ht.'/dashboard/claim/auto/start';
	return a($url,h())[1];
}
function api(){
	$url = ht.'/dashboard/claim/auto/api';
	return json_decode(a($url,h())[1],1);
}
function Credit(){
	$r = a(ht.'/dashboard',h())[1];
	preg_match_all('#<p class="amountText">(.*?)<span class="text-uppercase">(.*?)</span>#is',$r,$coin);
	echo str_repeat(' ',17).c.'Credit Balance'."\n";
	for($i=0;$i<count($coin[1]);$i++){
		if($i % 3 == 1 || $i % 3 == 0){
			echo h.trim($coin[1][$i]).' '.k.substr($coin[2][$i],0,3).m." | ";
		}else{
			echo h.trim($coin[1][$i]).' '.k.substr($coin[2][$i],0,3)."\n";
		}
	}
	print l();
}
function _f(){
	gau:auto();
	while(true){
		$api = api();
		$time = $api["seconds"];
		$msg = $api["message"];
		auto();
		if($msg=="time"){
			tmr($time);goto gau;
		}else
		if($msg=="no_autoclaims"){
			echo m.'insufficient BITS Balance'."\n";
			exit;
		}else
		if($msg=="ok"){
			//api();
			Credit();
			$energy = explode('<span>',explode('<p class="amount">',auto())[1])[0];
			echo h."Energy   ~> ".k.$energy."\n";print l();
			if($time){tmr($time);}
		}
	}

}
function _r(){
	t();print b();
	cookie:x();
	s('Cookie');
	s('User_Agent');
	system("termux-open-url ".a[3]);
	print b();

	$r = auto();
	$user = explode('</p>',explode('<p class="username">',$r)[1])[0];
	$energy = explode('<span>',explode('<p class="amount">',$r)[1])[0];
	echo h."Username ~> ".k.$user."\n";
	echo h."Energy   ~> ".k.$energy."\n";
	print l();
	menu:
	echo m."1 >".p." AutoFaucet\n";
	echo m."2 >".p." Update Cookie\n";
	$pil = readline(h."Input Number ".m."> ".p);
	print l();
	if($pil==1){
		goto faucet;
	}elseif($pil==2){
		unlink("Cookie");goto cookie;
	}else{
		echo m."Bad Number\n".p;l();goto menu;
	}

	faucet:
	_f();
}
_r();
function tmr($tmr){
	$timr=time()+$tmr;
	while(true){
		echo "\r                       \r";
		$res=$timr-time();
		if($res < 1){break;}
		echo w(date('i:s',$res),"r");sleep(1);
	}
}


