<!DOCTYPE html>
<html>
	<head>
		<style>
	body
	{ color: red;
	background-color: #d0e4fe;
		}</style>
		<script>
function init() {					
var submitBtn = document.getElementById("submitBtn");
var origBtnText = submitBtn.firstChild.nodeValue;
var form = document.getElementById("carEntryForm");
form.onsubmit= function() {
document.getElementByID("carEntryForm").contentWindow.story();
submitBtn.firstChild.nodeValue ="Uploading Information...";
return true; // form submitted, and return to iframe
};
document.getElementById("submitBtn").onclick=function() {
	var xmlhttp;
if (window.XMLHttpRequest)
  { xmlhttp=new XMLHttpRequest();}
else
  {  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
   xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("check1").innerHTML = xmlhttp.responseText;
            }
        } 
       
        str=document.getElementById("name").value;
       
        xmlhttp.open("GET","x.php?q="+str,true);
        xmlhttp.send();
};
var iframe = document.getElementById("uploadFrame");
iframe.onload= function() {
if (iframe.href != "about:blank") {
submitBtn.firstChild.nodeValue = origBtnText;
submitBtn.disabled = false;
}
return true;
};
}
// Execute init() after the page loads.
window.onload = init;  
		</script>
		</head>
<body>
<center>
	<h2> SUBMIT YOUR STORY </h2>
	<form action="phps.php" method="post" id="carEntryForm" name="carEntryForm" 
          enctype="multipart/form-data" 
          target="uploadFrame">
<textarea name="name" id="name" rows="15" cols="65" placeholder="Please enter your story here"></textarea>
<br><br>
 <div id="buttonRow">
        <button id="submitBtn" type="button">
          SUBMIT
     </button>
      </div>
      <div id="check">
      <p id="check1"></p></div>
    </form>
    <iframe src="about:blank" width="0" height="0" tabindex="-1" id="uploadFrame" name="uploadFrame"></iframe>
</center>
<?php  
if(isset($_POST['submit']))
{
   story();
}
function story()
{
	$_SESSION["timeout"] = time();

$string1=$_POST["name"];
$string=strtolower($string1);
$string=$newStr = preg_replace('#[^a-zA-Z0-9 ]#', '', $string);
$words=preg_split('/[\s]+/', $string, -1, PREG_SPLIT_NO_EMPTY);
$commonWords = array('a','able','about','above','abroad','according','accordingly','across','actually','adj','after','afterwards','again','against','ago','ahead','ain\'t','all','allow','allows','almost','alone','along','alongside','already','also','although','always','am','amid','amidst','among','amongst','an','and','another','any','anybody','anyhow','anyone','anything','anyway','anyways','anywhere','apart','appear','appreciate','appropriate','are','aren\'t','around','as','a\'s','aside','ask','asking','associated','at','available','away','awfully','b','back','backward','backwards','be','became','because','become','becomes','becoming','been','before','beforehand','begin','behind','being','believe','below','beside','besides','best','better','between','beyond','both','brief','but','by','c','came','can','cannot','cant','can\'t','caption','cause','causes','certain','certainly','changes','clearly','c\'mon','co','co.','com','come','comes','concerning','consequently','consider','considering','contain','containing','contains','corresponding','could','couldn\'t','course','c\'s','currently','d','dare','daren\'t','definitely','described','despite','did','didn\'t','different','directly','do','does','doesn\'t','doing','done','don\'t','down','downwards','during','e','each','edu','eg','eight','eighty','either','else','elsewhere','end','ending','enough','entirely','especially','et','etc','even','ever','evermore','every','everybody','everyone','everything','everywhere','ex','exactly','example','except','f','fairly','far','farther','few','fewer','fifth','first','five','followed','following','follows','for','forever','former','formerly','forth','forward','found','four','from','further','furthermore','g','get','gets','getting','given','gives','go','goes','going','gone','got','gotten','greetings','h','had','hadn\'t','half','happens','hardly','has','hasn\'t','have','haven\'t','having','he','he\'d','he\'ll','hello','help','hence','her','here','hereafter','hereby','herein','here\'s','hereupon','hers','herself','he\'s','hi','him','himself','his','hither','hopefully','how','howbeit','however','hundred','i','i\'d','ie','if','ignored','i\'ll','i\'m','immediate','in','inasmuch','inc','inc.','indeed','indicate','indicated','indicates','inner','inside','insofar','instead','into','inward','is','isn\'t','it','it\'d','it\'ll','its','it\'s','itself','i\'ve','j','just','k','keep','keeps','kept','know','known','knows','l','last','lately','later','latter','latterly','least','less','lest','let','let\'s','like','liked','likely','likewise','little','look','looking','looks','low','lower','ltd','m','made','mainly','make','makes','many','may','maybe','mayn\'t','me','mean','meantime','meanwhile','merely','might','mightn\'t','mine','minus','miss','more','moreover','most','mostly','mr','mrs','much','must','mustn\'t','my','myself','n','name','namely','nd','near','nearly','necessary','need','needn\'t','needs','neither','never','neverf','neverless','nevertheless','new','next','nine','ninety','no','nobody','non','none','nonetheless','noone','no-one','nor','normally','not','nothing','notwithstanding','novel','now','nowhere','o','obviously','of','off','often','oh','ok','okay','old','on','once','one','ones','one\'s','only','onto','opposite','or','other','others','otherwise','ought','oughtn\'t','our','ours','ourselves','out','outside','over','overall','own','p','particular','particularly','past','per','perhaps','placed','please','plus','possible','presumably','probably','provided','provides','q','que','quite','qv','r','rather','rd','re','really','reasonably','recent','recently','regarding','regardless','regards','relatively','respectively','right','round','s','said','same','saw','say','saying','says','second','secondly','see','seeing','seem','seemed','seeming','seems','seen','self','selves','sensible','sent','serious','seriously','seven','several','shall','shan\'t','she','she\'d','she\'ll','she\'s','should','shouldn\'t','since','six','so','some','somebody','someday','somehow','someone','something','sometime','sometimes','somewhat','somewhere','soon','sorry','specified','specify','specifying','still','sub','such','sup','sure','t','take','taken','taking','tell','tends','th','than','thank','thanks','thanx','that','that\'ll','thats','that\'s','that\'ve','the','their','theirs','them','themselves','then','thence','there','thereafter','thereby','there\'d','therefore','therein','there\'ll','there\'re','theres','there\'s','thereupon','there\'ve','these','they','they\'d','they\'ll','they\'re','they\'ve','thing','things','think','third','thirty','this','thorough','thoroughly','those','though','three','through','throughout','thru','thus','till','to','together','too','took','toward','towards','tried','tries','truly','try','trying','t\'s','twice','two','u','un','under','underneath','undoing','unfortunately','unless','unlike','unlikely','until','unto','up','upon','upwards','us','use','used','useful','uses','using','usually','v','value','various','versus','very','via','viz','vs','w','want','wants','was','wasn\'t','way','we','we\'d','welcome','well','we\'ll','went','were','we\'re','weren\'t','we\'ve','what','whatever','what\'ll','what\'s','what\'ve','when','whence','whenever','where','whereafter','whereas','whereby','wherein','where\'s','whereupon','wherever','whether','which','whichever','while','whilst','whither','who','who\'d','whoever','whole','who\'ll','whom','whomever','who\'s','whose','why','will','willing','wish','with','within','without','wonder','won\'t','would','wouldn\'t','x','y','yes','yet','you','you\'d','you\'ll','your','you\'re','yours','yourself','yourselves','you\'ve','z','zero');
$fwords=preg_replace('/\b('.implode('|',$commonWords).')\b/','',$words);
$fwords=array_filter($fwords);
$count=array_count_values($fwords);
$max= -1;
foreach($count as $name => $ind) {
    if($ind > $max) {
        $max = $ind;
        $res = array();
    }
    if($ind == $max) {
        $res[] = $name;
    }
}
$x=implode('',$res);

echo "<center><br><br><br>Your Story is regarding " . implode(' & ',$res);
echo "<br><br>There are n stories collected about the same topic, click <a target='_blank' href=/~matluri/lab2/storydisp.php?refer=",$x,">here</a> to read them if you like</center>";
$file=fopen("story.txt","r") or die("unable to open file");
$array=json_decode(file_get_contents('story.txt'),true);
$key=$array;
$m=0;
$var=0;
foreach ($array as $key =>$value)
{
        if($key==$x)
        { 
			while($array[$x][$m]!="")
			{
			$m++;
			}
			$var=1;
		}
		
   }
 if($var==0)
 {
	   $array[$x][0]=$string1;
	   file_put_contents('story.txt', json_encode($array));
 }
session_start();
$file1=fopen("session.txt","r+") or die("unable to open file");
$check=json_decode(file_get_contents('session.txt'),true);
$inactive = 1200;

if (isset($_SESSION["timeout"])) {
      $sessionTTL = time() - $_SESSION["timeout"];
    if ($sessionTTL < $inactive) {
		if($check==$x)
		{
		$m=$m-1;;
		}
		if($var!=0)
        $array[$x][$m]=$string1;
      
		file_put_contents('story.txt', json_encode($array));
		$check=$x;
		file_put_contents('session.txt',json_encode($check));
   }
   if ($sessionTTL > $inactive) {
	   $array[$x][$m]=$string1;
		file_put_contents('story.txt', json_encode($array));
$check='';
file_put_contents('session.txt',json_encode($check));
       session_destroy();
       //header("Location: /phps.php");
   }
}
 
$_SESSION["timeout"] = time();
}
?>

</body>
</html>
