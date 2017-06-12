@extends('layouts.default')

@section('header')
	
@stop

@section('content')


<p>
<input type="button" value="Siatka ON" onclick="return siatkaDisplay(this);"/>
<input type="button" value="Współrzędne ON" onclick="return pomiarDisplay(this);"/>
</p>

<div class='map' style="position:relative;">
<image src="/img/mapanowa.png"><!-- zdjecie mapy -->

<div style="position:absolute; top:0px; left:0px;"><!-- pozycja siatki wzgledem mapy -->
<!-- <image id="siatka" src="/img/mapanowatest1.png" style="visibility:hidden;"><!-- siatka -->
<image id="siatka" src="/img/siatka 3105.png" style="visibility:hidden;"><!-- siatka -->
</div>


<?php
///////////////////////// paramter na przyszłość SKALA  /////////////////////////////
		$skala=1;
		
//pozycja startowa to ta czerwona kropka czyli x 130px,  y 250px
//wyswietlanie grobow wzgledem mapy
$top=$skala*250;
$left=$skala*130;
echo "<div style=\"position:absolute; top:{$top}px; left:{$left}px;\"><!-- wyswietlanie grobow wzgledem mapy --->";
?>
<?php
//kolory dla statusu miejsca/grobu
$color_back[0]='green';
$color_back[1]='grey';
$color_back[2]='red';

$defaultImage="https://upload.wikimedia.org/wikipedia/commons/5/55/Brak_obrazka.svg";//obrazek domyslny - brak obrazka

$dataMiejsca=DB::table('places')->get();
	foreach ($dataMiejsca as $data)
	{
		//zalozenia co do szerokosci i dlugosci
			//2 * pi * R(ziemi)
			// 1' = 1,85km , 1" = 30,87m
			// odległość między 51 12'07,4" a 51 12'06,4" stopniem szerokosci geograficznej to 3088cm
			// siatka dzieli odcinek na 12 czyli jedna czesc siatki to +- 258cm / 20px ; 1px +-12,9cm
			//    1"=240px
			
			//2 * pi * R(ziemi) * cos(51)
			// 1' = 1,165km, 1" = 19,43m
			// odległość między 18 54'09,5" a 18 54'08,5" stopniem dlugosci geograficznej to 1943cm
			// siatka dzieli odcinek na 15 czyli jedna czesc siatki to +- 130cm / 15px ; 1px +-8,67cm
			//    1"=225px
		
		

		//chwilowe zalorzenie ze decymalne wspolrzedne sa pomnozone przez 1000000 (nie moge zmienic pola ani dodac nowego :( wiec uznaje ze zostan podane w formie dziesietnej
		//pozycja startowa to ta czerwona kropka
		//czyli x 130px,  y 250px
		$extraPrecision=1000000; //zwiekszona precyzja obliczen ...
		
		//przeliczanie z wspolrzednych na decymalne
		//$startX=18902361; //18 54'8.5"N 18902361(1)
		//$startY=51202333; //51 12'8.4"N 51202333(3)
		$startX=round((18+54/60+8.5/3600)*$extraPrecision);
		$startY=round((51+12/60+8.4/3600)*$extraPrecision);
		
		//3 punkty testowe
		//51 12 8.4		51202333(3)			18 54 8.5 	18902361(1)
		//51 12 7.4		51202055(5)			18 54 9.5	18902638(8)  
		//51 12 6.4		51201777(7)			18 54 10.5	18902916(6)
		
		//pozycja wzgledem wyswietlanej mapy
		//0,09" = 0,000025 dec
		//30px = 400cm   -> x(px)=30*3088/400
		//1" to dla szerokosci (odlegosci pomiedzy 51 12'07,4" a 51 12'06,4") 3088cm 	;; ok 31m 	/// 1" +- 231,6px
		//1" dla dlugosci(odlegosci pomiedzy 18 54'09,5" a 18 54'08,5") 1943cm			;; ok 19m	///	1" +- 145,725px
		
		//extra testowy start + 24m (w obie strony) czyli:
		//	x=(24/30,88)*0,000025/0,09		-0,000215 889 dec =>	51202333 - 216 = 51202117
		//	y=(24/19,43)*0,000025/0,09		+0,000343 112 dec =>	18902361 + 343 = 18902704
		
		$temp[0]=round($skala*($startY-($data->y))*231.6*0.09/25); //szerokosci
		$temp[1]=round($skala*(($data->x)-$startX)*145.725*0.09/25); //dlugosci
		
		
		//skala metryczna wiec wielkosci grobow: 30px = 400cm || x=dane -> x=30*dane/400
		$temp[2]=round($skala*30*($data->length)/400);
		$temp[3]=round($skala*30*($data->width)/400);
		
		echo "	<div style=\"position:absolute;
				border: 1px solid black;
				background:{$color_back[$data->status]}; 
				top:{$temp[0]}px; left:{$temp[1]}px;
				";
		if(($data->status)==0){ //sprawdzanie statusu miejsca, jesli brak przypisanego grobu to rowniez brak obrazka
			echo "	height:{$temp[2]}px; width:{$temp[3]}px\"
					onclick=\"myFunction('{$defaultImage}',";
			echo "	'Sektor {$data->sector}<br>";
			echo "	Rząd {$data->row}<br>Miejsce {$data->number}<br>Dlugość {$data->length}cm<br>";
			echo "	Szerokość {$data->width}cm',";
			echo "	'<tr><th>Wolne miejsce</th></tr>')\">
					</div>
					";
		}
		else{ //grob przypisany - wiec pobieranie danych grobu przypisanego do danego miejsca
			$dG=DB::table('graves')->get();
			foreach($dG as $dataGrob)
			{
				if ("{$dataGrob->id_place}"=="{$data->id}"){
				//echo " {$dataGrob->id}";
				break 1;
				}
			}

			//$dataGrob=DB::table('graves')->where('id_place',"{$data->id}")->first();
			if(($dataGrob->length)!='NULL' and ($dataGrob->length)!='' ){
				$temp[2]=round($skala*30*($dataGrob->length)/400);
			}
			if(($dataGrob->width)!='NULL' and ($dataGrob->width)!='' ){
				$temp[3]=round($skala*30*($dataGrob->width)/400);
			}
			
			echo 	"height:{$temp[2]}px; width:{$temp[3]}px\" 
					onclick=\"myFunction(";
			if(($dataGrob->image)=='NULL' or ($dataGrob->image)==''){//brak zdjecia
				echo 	"'{$defaultImage}',";
			}
			else{//jest zdjecie
				echo 	"'{$dataGrob->image}',";
			}
			echo 	"'Sektor {$data->sector}<br>";
			echo 	"Rząd {$data->row}<br>Miejsce {$data->number}<br><br>Grób:<br>";
			//$temp[2]=$temp[2]*10;
			//$temp[3]=$temp[3]*10;
			echo "Dlugość {$data->length}cm<br>";
			echo "Szerokość {$data->width}cm<br>";
			$graveType=DB::table('typesOfGraves')->where('id',"{$dataGrob->id_type}")->first();
			echo "Typ {$graveType->type}',";//typ grobu
			echo "'";
			$buried = DB::table('buried')->where('id_grav','LIKE',"{$dataGrob->id}")->get();
			foreach($buried as $bur)
			{
				echo "<tr><th> ";
				//dane zmarlego / zmarlych
				echo "Pochowany<br>Imię {$bur->first_name}<br>";
				echo "Nazwisko {$bur->last_name}<br>Nazwisko rodowe {$bur->family_name}<br>";
				echo "Data urodzenia {$bur->date_of_birth}<br>Data śmierci {$bur->date_of_death}<br>";
				echo "Data pochówku {$bur->date_of_burial}<br><br>";
				echo "</th><th>";
				// echo "<img src=\"";
				// if(($dataGrob->image)=='NULL' or ($dataGrob->image)==''){//brak zdjecia osoby pochowanej
					// echo 	"{$defaultImage}";
				// }
				// else{//jest zdjecie
					// echo 	"{$bur->image}";
				// }
				// echo "\" height=200px width=200px />"
				echo "</th></tr>";
			}
			echo "')\"></div>";
		}
	}
?>


<!---    Interaktywna "siatka" do pobrania wartosci w danym miejscu    --->
<div id="pomiar" style="position:absolute; top:0px; left:0px; visibility:hidden;"><!-- interaktywna siatka klikajaca :P -->
<!--<div style="position:absolute;height:50px; width:50px;border: 1px solid black;background:red"></div>--->
<?php
//1691 1382 - wielkosc siatki
////pozycja startowa to ta czerwona kropka czyli x 130px,  y 250px

//dokladnosc rysowania siatki to 0,1 sekundy !!!!!!!!!!!

//1690px rzeczywista szerokosc siatki || 130px punkt startowy   || 23.16 = 0,1'
for ($x =-23.16; $x <= 1690-130; $x=$x+23.16) {
	$x1=round($x);
	$x2=round(23.16);
	//1120px rzeczywista wysokosc siatki || 250px punkt startowy || 14.5725 = 0,1'
	for ($y =-87.435; $y <= 1120-250; $y=$y+14.5725) {
		$y1=round($y);
		$y2=round(14.5725);
		echo "<div title=\"{$y1} {$x1}\" style=\"position:absolute;height:{$x2}px; width:{$y2}px;";
		echo  "top:{$x1}px;left:{$y1}px;\" onclick=\"funPomiar(";
		echo  "'{$y1}','{$x1}'";
		echo  " )\"></div>\n";
	}
}
?>
</div>

</div>
</div>


<script>

function myFunction(a,b,c){
    var myWindow = window.open("", "MsgWindow", "width=400,height=300");
	myWindow.document.write("<style>th{text-align:left;vertical-align:top;}</style>");
    myWindow.document.write("<table><tr><th><img src=\""+a+"\" height=200px width=200px /></th>");
	myWindow.document.write("<th style=\"text-align:left;vertical-align:top;\">"+b+"</th></tr>");
	myWindow.document.write(c+"</table>");
    myWindow.document.close(); 
}

function funPomiar(a,b){
    var pomiarWindow = window.open("", "MsgWindow", "width=100,height=100");
	pomiarWindow.document.write(a+" "+b);
    pomiarWindow.document.close(); 
}

function siatkaDisplay( el )
{
	var x = document.getElementById('siatka');
    if ( el.value === "Siatka ON" ){
        el.value = "Siatka OFF";
		x.style.visibility="visible";
	}
    else{
        el.value = "Siatka ON";
		x.style.visibility="hidden";
	}
}
function pomiarDisplay( e2 )
{
	var x = document.getElementById('pomiar');
    if ( e2.value === "Współrzędne ON" ){
        e2.value = "Współrzędne OFF";
		x.style.visibility="visible";
	}
    else{
        e2.value = "Współrzędne ON";
		x.style.visibility="hidden";
	}
}
</script>
@stop