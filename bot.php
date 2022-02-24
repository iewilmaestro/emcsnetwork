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
function b(){
	c();
	$m = "\033[1;31m";
	$p = "\033[1;37m";
	$k = "\033[1;33m";
	$h = "\033[1;32m";
	$u = "\033[1;35m";
	$b = "\033[1;34m";
	$c = "\033[1;36m";
	$mp = "\033[101m\033[1;37m";
	$cl = "\033[0m";
	$mm = "\033[101m\033[1;31m";
	$hp = "\033[1;7m";
	$z = trim(strtoupper(a[1]));
	$x = 18;
	$y = strlen($z);
	$line = str_repeat('_',$x-$y);
	echo "\n{$m}[{$p}Script{$m}]->{$k}[".$h.$z."{$k}]-[".$h.v.$k."]".$p.$line.".\n{$u}.__              .__.__ 	    {$p}| \n{$u}|__| ______  _  _|__|  |	\n|  |/ __ \ \/ \/ /  |  |\n|  \  ___/\     /|  |  |__\n|__|\___  >\/\_/ |__|____/\n        \/\n{$mm}[{$mp}▶{$mm}]{$cl} {$k}https://www.youtube.com/c/iewil\n{$c}{$hp} >_{$cl}{$b} Team-Function-INDO\n{$p}────────────────────────────────────\nLink Reg : ".$reg."\n\n";
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
function l(){
	$l = 36;
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
	return a($url,h());
}
function api(){
	$url = ht.'/dashboard/claim/auto/api';
	return json_decode(a($url,h()),1);
}
function Credit(){
	$r = a(host().'/dashboard',h());
	preg_match_all('#<p class="amountText">(.*?)<span class="text-uppercase">(.*?)</span>#is',$r,$coin);
	echo str_repeat(' ',11).c.'Credit Balance'."\n";
	for($i=0;$i<count($coin[1]);$i++){
		if($i % 2 == 0){
			echo h.trim($coin[1][$i]).' '.k.substr($coin[2][$i],0,3).m."   |   ";
		}else{
			echo h.trim($coin[1][$i]).' '.k.substr($coin[2][$i],0,3)."\n";
		}
	}
	l();
}
function _f(){
	auto();
	while(true){
		$api = api();
		$time = $api["seconds"];
		$msg = $api["message"];
		auto();
		if($time){
			tmr($time);
		}
		if($msg=="no_autoclaims"){
			echo m.'insufficient BITS Balance'."\n";
			exit;
		}
		//api();
		Credit();
		$energy = explode('<span>',explode('<p class="amount">',auto())[1])[0];
		echo h."Energy ~> ".k.$energy."\n";l();
	}

}
function _r(){
	t();b();
	cookie:x();
	s('Cookie');
	s('User_Agent');
	system("termux-open-url ".a[3]);
	b();

	$r = auto();
	$user = explode('</p>',explode('<p class="username">',$r)[1])[0];
	$energy = explode('<span>',explode('<p class="amount">',$r)[1])[0];
	echo h."Username ~> ".k.$user."\n";
	echo h."Energy ~> ".k.$energy."\n";
	l();
	menu:
	echo m."1 >".p." AutoFaucet\n";
	echo m."2 >".p." Update Cookie\n";
	$pil = readline(h."Input Number ".m."> ".p));
	l();
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
