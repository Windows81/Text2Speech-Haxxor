<?php
if(!isset($_GET['voice'])||!isset($_GET['text']))
	http_response_code(422);

$vName=strtolower($_GET['voice']);
$text=$_GET['text'];

//Amazon Polly
$plArr=array(
	'amy'=>1,
	'brian'=>2,
	'emma'=>3,
	'salli'=>4,
	'joey'=>5,
	'ivy'=>8,
	'justin'=>10,
	'kendra'=>11,
	'kimberly'=>12,
	'nicole'=>13,
	'russell'=>14,
	'raveena'=>15,
	'marlene'=>18,
	'hans'=>19,
	'gwyneth'=>20,
	'geraint'=>21,
	'conchita'=>24,
	'enrique'=>25,
	'penelope'=>26,
	'miguel'=>27,
	'carla'=>33,
	'giorgio'=>34,
	'maxim'=>47,
	'tatyana'=>48,
);

//VocalWare
$vwArr=array(
	'afroditi'=>'2_8_1',
	'agata'=>'4_14_1',
	'alan'=>'2_1_9',
	'alexandros'=>'4_8_1',
	'allison'=>'2_1_7',
	'alva'=>'4_9_1',
	'amalia'=>'2_6_2',
	'anna'=>'4_3_3',
	'annika'=>'2_9_1',
	'arantxa'=>'4_22_1',
	'ashley'=>'3_1_6',
	'aylin'=>'4_16_1',
	'bernard'=>'2_4_2',
	'beth'=>'3_1_8',
	'bridget'=>'3_1_4',
	'carlos'=>'2_2_7',
	'carmela'=>'2_15_1',
	'carmen'=>'2_2_1',
	'catherine'=>'2_1_6',
	'charlotte'=>'2_4_5',
	'chloe'=>'3_4_1',
	'claire'=>'4_11_2',
	'damayanti'=>'4_28_1',
	'daniel'=>'4_1_5',
	'dave'=>'2_1_2',
	'dayoung'=>'3_13_7',
	'diego'=>'2_2_4',
	'dmitri'=>'2_21_2',
	'duardo'=>'4_2_1',
	'elisa'=>'3_7_1',
	'elizabeth'=>'2_1_4',
	'ellen'=>'4_11_1',
	'empar'=>'2_5_3',
	'esperanza'=>'2_2_5',
	'eszter'=>'4_29_1',
	'eusebio'=>'2_6_3',
	'federica'=>'2_7_10',
	'felix'=>'4_4_1',
	'fiona'=>'4_1_12',
	'florence'=>'2_4_4',
	'francisca'=>'2_2_3',
	'francisco'=>'3_2_2',
	'frida'=>'2_19_1',
	'giulia'=>'2_7_9',
	'gloria'=>'3_2_3',
	'grace'=>'2_1_10',
	'haruka'=>'3_12_6',
	'helena'=>'3_6_1',
	'henrik'=>'2_20_2',
	'hikari'=>'3_12_5',
	'hugh'=>'3_1_5',
	'hui'=>'3_10_3',
	'hyeryun'=>'3_13_4',
	'hyuna'=>'3_13_8',
	'ida'=>'4_19_1',
	'ioana'=>'2_30_1',
	'james'=>'3_1_7',
	'javier'=>'4_2_5',
	'jihun'=>'3_13_10',
	'jill'=>'4_1_2',
	'jimin'=>'3_13_5',
	'joana'=>'4_6_3',
	'jolie'=>'2_4_3',
	'jordi'=>'2_5_2',
	'jorge'=>'2_2_6',
	'juan'=>'2_2_2',
	'julie'=>'3_1_3',
	'julie'=>'4_4_2',
	'junwoo'=>'3_13_2',
	'kaho'=>'3_10_6',
	'karen'=>'4_1_4',
	'kate'=>'3_1_1',
	'katrin'=>'2_3_3',
	'kayan'=>'3_10_7',
	'kerem'=>'2_16_1',
	'kiang'=>'3_10_5',
	'krzysztof'=>'2_14_2',
	'kyoko'=>'4_12_1',
	'laila'=>'2_27_2',
	'laura'=>'4_11_3',
	'lee'=>'4_1_10',
	'lekha'=>'4_24_1',
	'lena'=>'3_3_1',
	'leo'=>'3_4_2',
	'leonor'=>'2_2_9',
	'liang'=>'3_10_4',
	'linlin'=>'2_10_1',
	'lisheng'=>'2_10_2',
	'lola'=>'3_2_4',
	'louis'=>'3_4_4',
	'luca'=>'2_7_5',
	'ludoviko'=>'2_31_1',
	'maged'=>'4_27_1',
	'magnus'=>'2_19_2',
	'manuel'=>'3_2_5',
	'marcello'=>'2_7_6',
	'marko'=>'2_23_2',
	'matteo'=>'2_7_8',
	'mikko'=>'4_23_1',
	'milena'=>'4_21_2',
	'milla'=>'2_23_1',
	'misaki'=>'3_12_3',
	'moira'=>'4_1_8',
	'monica'=>'4_2_3',
	'montserrat'=>'2_5_1',
	'narae'=>'4_13_1',
	'narisa'=>'4_26_1',
	'nikos'=>'2_8_3',
	'nuria'=>'4_5_1',
	'olga'=>'2_21_1',
	'olivier'=>'2_4_6',
	'oskar'=>'4_9_3',
	'paola'=>'2_7_1',
	'paolo'=>'4_7_1',
	'paul'=>'3_1_2',
	'paulina'=>'4_2_4',
	'rafael'=>'3_6_2',
	'raquel'=>'4_6_2',
	'roberto'=>'2_7_7',
	'roberto'=>'3_7_2',
	'roxane'=>'3_4_3',
	'ryo'=>'3_12_7',
	'samantha'=>'4_1_11',
	'sangeeta'=>'4_1_9',
	'sarawut'=>'3_26_1',
	'saskia'=>'2_11_2',
	'sayaka'=>'3_12_4',
	'sebastien'=>'4_4_3',
	'selin'=>'2_16_3',
	'sena'=>'3_13_6',
	'serena'=>'4_1_7',
	'show'=>'3_12_2',
	'silvana'=>'2_7_2',
	'silvia'=>'4_7_2',
	'simon'=>'2_1_5',
	'simona'=>'4_30_1',
	'sin-ji'=>'4_10_1',
	'soledad'=>'2_2_8',
	'somsi'=>'3_26_2',
	'stefan'=>'2_3_2',
	'steffi'=>'4_3_1',
	'steven'=>'2_1_8',
	'stine'=>'4_20_2',
	'susan'=>'2_1_1',
	'sven'=>'2_9_2',
	'takeru'=>'3_12_8',
	'tarik'=>'2_27_1',
	'tessa'=>'4_1_13',
	'thomas'=>'4_4_5',
	'tim'=>'3_3_2',
	'ting-ting'=>'4_10_4',
	'tom'=>'4_1_3',
	'valentina'=>'2_7_3',
	'veena'=>'2_1_11',
	'vilde'=>'2_20_1',
	'violeta'=>'3_2_1',
	'virginie'=>'4_4_4',
	'willem'=>'2_11_1',
	'xander'=>'4_11_4',
	'ximena'=>'2_2_10',
	'ya-ling'=>'4_10_2',
	'yafang'=>'3_10_8',
	'yannick'=>'4_3_2',
	'yumi'=>'3_13_1',
	'yura'=>'3_13_9',
	'zeynep'=>'2_16_2',
	'zosia'=>'2_14_1',
	'zuzana'=>'4_18_1',
);

//Cepstrel (VoiceForge)
$vfArr=array(
	'allison'=>'Allison',
	'amy'=>'Amy',
	'belle'>'Belle',
	'callie'=>'Callie',
	'charlie'=>'Charlie',
	'dallas'=>'Dallas',
	'damien'=>'Damien',
	'david'=>'David',
	'diane'=>'Diane',
	'duchess'=>'Duchess',
	'duncan'=>'Duncan',
	'emily'=>'Emily',
	'linda'=>'Linda',
	'robin'=>'Robin',
	'shouty'=>'Shouty',
	'walter'=>'Walter',
	'william'=>'William',
	'whispery'=>'Whispery',
	'lawrence'=>'Lawrence',
	'millie'=>'Millie',
	'vittoria'=>'Vittoria',
	'katrin'=>'Katrin',
	'matthias'=>'Matthias',
	'isabelle'=>'Isabelle',
	'jeanpierre'=>'Jean-Pierre',
	'miguel'=>'Miguel',
);

//Acapela
$acArr=array(
	'leila'=>'Leila-HQM',
	'leila-lf'=>'Leila-LF',
	'mehdi'=>'Mehdi-HQM',
	'mehdi-lf'=>'Mehdi-LF',
	'nizar'=>'Nizar-HQM',
	'nizar-lf'=>'Nizar-LF',
	'salma'=>'Salma-HQM',
	'salma-lf'=>'Salma-LF',
	'laia'=>'Laia-HQM',
	'laia-lf'=>'Laia-LF',
	'eliska'=>'Eliska-HQM',
	'eliska-lf'=>'Eliska-LF',
	'mette'=>'Mette-HQM',
	'mette-lf'=>'Mette-LF',
	'rasmus'=>'Rasmus-HQM',
	'rasmus-lf'=>'Rasmus-LF',
	'jeroen'=>'Jeroen-HQM',
	'jeroen-lf'=>'Jeroen-LF',
	'jeroenHappy'=>'JeroenHappy-HQM',
	'jeroenSad'=>'JeroenSad-HQM',
	'sofie'=>'Sofie-HQM',
	'sofie-lf'=>'Sofie-LF',
	'zoe'=>'Zoe-HQM',
	'zoe-lf'=>'Zoe-LF',
	'daan'=>'Daan-HQM',
	'daan-lf'=>'Daan-LF',
	'femke'=>'Femke-HQM',
	'femke-lf'=>'Femke-LF',
	'jasmijn'=>'Jasmijn-HQM',
	'jasmijn-lf'=>'Jasmijn-LF',
	'max'=>'Max-HQM',
	'max-lf'=>'Max-LF',
	'liam'=>'Liam-HQM',
	'lisa'=>'Lisa-HQM',
	'lisa-lf'=>'Lisa-LF',
	'olivia'=>'Olivia-HQM',
	'tyler'=>'Tyler-HQM',
	'tyler-lf'=>'Tyler-LF',
	'deepa'=>'Deepa-HQM',
	'deepa-lf'=>'Deepa-LF',
	'graham'=>'Graham-HQM',
	'graham-lf'=>'Graham-LF',
	'harry'=>'Harry-HQM',
	'lucy'=>'Lucy-HQM',
	'lucy-lf'=>'Lucy-LF',
	'nizareng'=>'Nizareng-HQM',
	'nizareng-lf'=>'Nizareng-LF',
	'peter'=>'Peter-HQM',
	'peter-lf'=>'Peter-LF',
	'peterHappy'=>'PeterHappy-HQM',
	'peterSad'=>'PeterSad-HQM',
	'queenElizabeth'=>'QueenElizabeth-HQM',
	'rachel'=>'Rachel-HQM',
	'rachel-lf'=>'Rachel-LF',
	'rosie'=>'Rosie-HQM',
	'ella'=>'Ella-HQM',
	'heather'=>'Heather-HQM',
	'heather-lf'=>'Heather-LF',
	'josh'=>'Josh-HQM',
	'karen'=>'Karen-HQM',
	'kenny'=>'Kenny-HQM',
	'kenny-lf'=>'Kenny-LF',
	'laura'=>'Laura-HQM',
	'laura-lf'=>'Laura-LF',
	'micah'=>'Micah-HQM',
	'nelly'=>'Nelly-HQM',
	'nelly-lf'=>'Nelly-LF',
	'ryan'=>'Ryan-HQM',
	'ryan-lf'=>'Ryan-LF',
	'saul'=>'Saul-HQM',
	'scott'=>'Scott-HQM',
	'tracy'=>'Tracy-HQM',
	'tracy-lf'=>'Tracy-LF',
	'will'=>'Will-HQM',
	'will-lf'=>'Will-LF',
	'willBadGuy'=>'WillBadGuy-HQM',
	'willFromAfar'=>'WillFromAfar-HQM',
	'willHappy'=>'WillHappy-HQM',
	'willLittleCreature'=>'WillLittleCreature-HQM',
	'willOldMan'=>'WillOldMan-HQM',
	'willSad'=>'WillSad-HQM',
	'willUpClose'=>'WillUpClose-HQM',
	'sanna'=>'Sanna-HQM',
	'sanna-lf'=>'Sanna-LF',
	'louise'=>'Louise-HQM',
	'louise-lf'=>'Louise-LF',
	'alice'=>'Alice-HQM',
	'alice-lf'=>'Alice-LF',
	'antoine'=>'Antoine-HQM',
	'antoine-lf'=>'Antoine-LF',
	'antoineFromAfar'=>'AntoineFromAfar-HQM',
	'antoineHappy'=>'AntoineHappy-HQM',
	'antoineSad'=>'AntoineSad-HQM',
	'antoineUpClose'=>'AntoineUpClose-HQM',
	'bruno'=>'Bruno-HQM',
	'bruno-lf'=>'Bruno-LF',
	'Claire'=>'Claire-HQM',
	'Claire-lf'=>'Claire-LF',
	'julie'=>'Julie-HQM',
	'julie-lf'=>'Julie-LF',
	'margaux'=>'Margaux-HQM',
	'margaux-lf'=>'Margaux-LF',
	'margauxHappy'=>'MargauxHappy-HQM',
	'margauxSad'=>'MargauxSad-HQM',
	'robot'=>'Robot-HQM',
	'andreas'=>'Andreas-HQM',
	'andreas-lf'=>'Andreas-LF',
	'jonas'=>'Jonas-HQM',
	'julia'=>'Julia-HQM',
	'julia-lf'=>'Julia-LF',
	'klaus'=>'Klaus-HQM',
	'klaus-lf'=>'Klaus-LF',
	'lea'=>'Lea-HQM',
	'sarah'=>'Sarah-HQM',
	'sarah-lf'=>'Sarah-LF',
	'dimitris'=>'Dimitris-HQM',
	'dimitris-lf'=>'Dimitris-LF',
	'dimitrisHappy'=>'DimitrisHappy-HQM',
	'dimitrisSad'=>'DimitrisSad-HQM',
	'Chiara'=>'Chiara-HQM',
	'Chiara-lf'=>'Chiara-LF',
	'fabiana'=>'Fabiana-HQM',
	'fabiana-lf'=>'Fabiana-LF',
	'vittorio'=>'Vittorio-HQM',
	'vittorio-lf'=>'Vittorio-LF',
	'sakura'=>'Sakura-HQM',
	'sakura-lf'=>'Sakura-LF',
	'lulu'=>'Lulu-HQM',
	'lulu-lf'=>'Lulu-LF',
	'bente'=>'Bente-HQM',
	'bente-lf'=>'Bente-LF',
	'kari'=>'Kari-HQM',
	'kari-lf'=>'Kari-LF',
	'olav'=>'Olav-HQM',
	'olav-lf'=>'Olav-LF',
	'ania'=>'Ania-HQM',
	'ania-lf'=>'Ania-LF',
	'marcia'=>'Marcia-HQM',
	'marcia-lf'=>'Marcia-LF',
	'celia'=>'Celia-HQM',
	'celia-lf'=>'Celia-LF',
	'alyona'=>'Alyona-HQM',
	'alyona-lf'=>'Alyona-LF',
	'antonio'=>'Antonio-HQM',
	'antonio-lf'=>'Antonio-LF',
	'ines'=>'Ines-HQM',
	'ines-lf'=>'Ines-LF',
	'maria'=>'Maria-HQM',
	'maria-lf'=>'Maria-LF',
	'rosa'=>'Rosa-HQM',
	'rosa-lf'=>'Rosa-LF',
	'elin'=>'Elin-HQM',
	'elin-lf'=>'Elin-LF',
	'emil'=>'Emil-HQM',
	'emil-lf'=>'Emil-LF',
	'emma'=>'Emma-HQM',
	'emma-lf'=>'Emma-LF',
	'erik'=>'Erik-HQM',
	'erik-lf'=>'Erik-LF',
	'samuel'=>'Samuel-HQM',
	'samuel-lf'=>'Samuel-LF',
	'kal'=>'Kal-HQM',
	'kal-lf'=>'Kal-LF',
	'mia'=>'Mia-HQM',
	'mia-lf'=>'Mia-LF',
	'ipek'=>'Ipek-HQM',
	'ipek-lf'=>'Ipek-LF',
);

if(isset($plArr[$vName])){
	$ch=curl_init('https://pollyvoices.com/api/sound/add');
	$f=http_build_query(array('text'=>$text,'voice'=>$plArr[$vName]));
	curl_setopt($ch,CURLOPT_POST,1);
	curl_setopt($ch,CURLOPT_POSTFIELDS,$f);
	curl_setopt($ch,CURLOPT_FOLLOWLOCATION,1);
	curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
	curl_setopt($ch,CURLOPT_HEADER,0);
	$res=curl_exec($ch);
	curl_close($ch);
	
	header('Content-Type:audio/mpeg');
	$f=json_decode($res,true)['file'];
	if($f==null){
		http_response_code(422);
		return;
	}
	$url='https://pollyvoices.com'.$f;
	echo file_get_contents($url);
	return;
}
elseif(isset($vwArr[$vName])){
	$a=explode('_',$vwArr[$vName]);
	$eID=$a[0];$lID=$a[1];$vID=$a[2];
	//preg_match('AC_Vocalware_Embed((\\d{7}),300, 400,',1,1, 2292376, 0,1,0,'e704f7a6017aab05093b2cb079e00e4e',9);')
	$q=http_build_query(array(
		'EID'=>$eID,
		'LID'=>$lID,
		'VID'=>$vID,
		'TXT'=>$text,
		'IS_UTF8'=>1,
		'HTTP_ERR'=>1,
		'ACC'=>3314795,
		'API'=>2292376,
		'vwApiVersion'=>2,
		'CB'=>'vw_mc.vwCallback',
	));
	$ch=curl_init('https://cache-a.oddcast.com/tts/gen.php?'.$q);
	header('Content-Type:audio/mpeg');
	curl_setopt($ch,CURLOPT_HTTPHEADER,array(
		'Referer:https://www.vocalware.com/index/demo',
		'Origin:https://www.vocalware.com',
		'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.100 Safari/537.36',
	));
	curl_exec($ch);
	return;
}
elseif(isset($vfArr[$vName])){
	$ch=curl_init('https://www.cepstral.com/en/demos');
	curl_setopt($ch,CURLOPT_FOLLOWLOCATION,1);
	curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
	curl_setopt($ch,CURLOPT_HEADER,1);
	$res=curl_exec($ch);
	curl_close($ch);
	
	$m=array();
	preg_match('/PHPSESSID=.{26}/',$res,$m);
	$cookie=$m[0];
	
	$ch=curl_init('https://www.cepstral.com/demos/createAudio.php?'
	.http_build_query(array(
		'rate'=>170,'pitch'=>1,'sfx'=>'none',
		'voice'=>$vfArr[$vName],
		'voiceText'=>$text)));
	curl_setopt($ch,CURLOPT_HTTPHEADER,array('Cookie: '.$cookie));
	curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
	
	$res=curl_exec($ch);
	header('Content-Type:audio/mpeg');
	$url='https://www.cepstral.com'.json_decode($res,true)['mp3_loc'];
	echo file_get_contents($url);
	return;
}
elseif(isset($acArr[$vName])){
	$ch=curl_init('http://www.acapela-group.com/acapela-for-transport/demo-tts/DemoHTML5Form_transportV2.php');
	$f=http_build_query(array('MySelectedVoice'=>$acArr[$vName],'MyTextForTTS'=>$text,'SendToVaaS'=>'',));
	curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
	curl_setopt($ch,CURLOPT_FOLLOWLOCATION,1);
	curl_setopt($ch,CURLOPT_POSTFIELDS,$f);
	curl_setopt($ch,CURLOPT_POST,1);
	$res=curl_exec($ch);
	curl_close($ch);
	
	$m=array();
	preg_match('/var myPhpVar = \'([^\']*)\'/',$res,$m);
	if(strlen($m[1])>0){
		header('Content-Type:audio/mpeg');
		echo file_get_contents($m[1]);
	}
	else
		http_response_code(422);
	return;
}

$googI=null;
$goog=json_decode(file_get_contents("https://cxl-services.appspot.com/proxy?url=https%3A%2F%2Ftexttospeech.googleapis.com%2Fv1%2Fvoices"),true)['voices'];

foreach($goog as $i=>$v){
	if(!isset($v['name']))
		continue;
	elseif($vName==strtolower($v['name']))
		{$googI=$i;break;}
}

if(!$googI){
	http_response_code(422);
	return;
}

$gV=$goog[$googI];
$a=array(
	'content'=>$text,
	'voice'=>$gV['name'],
);
$ch=curl_init('https://notevibes.com/');
curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch,CURLOPT_POSTFIELDS,http_build_query($a));
curl_setopt($ch,CURLOPT_POST,1);

$headers=array(
	'Content-Type:application/x-www-form-urlencoded',
);

curl_setopt($ch,CURLOPT_HTTPHEADER,$headers);
$m=array();
preg_match('/\'(.+\.mp3)\'/',curl_exec($ch),$m);
header('Content-Type:audio/mpeg');
echo file_get_contents($m[1]);