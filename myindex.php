<?php require_once 'search_request.php'; ?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <title>search</title>
<style>
  .wrap{
    color: black;
    width: 400px;
    margin: 100px auto;
    text-align: left;
  }
  .input-search{
    width: 250px;
	margin-right: 10px;
  }
  #search{
    background: #FFF;
    width: 100px;
  }
  #search li{
    list-style: none;
    padding: 5px 10px;
    margin: 0 0 0 -40px;
    cursor: pointer;
  }
  #search li:hover{
    background: #B0C4C6;
  }
  a{
  	color: inherit;
  	text-decoration: none;
  }
</style>

<script>
function search(str){
	str = str.replace(/\s/g, '');
	if (str.length == 0){
	    document.getElementById("search").innerHTML="";
	    document.getElementById("search").style.border="0px";
	    return;
	}
	if(str.length > 0){
		var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function() {
		    if (this.readyState==4 && this.status==200){
				document.getElementById("search").innerHTML=this.responseText;
				document.getElementById("search").style.border="1px solid #A5ACB2";
		    }
	  };
	  xmlhttp.open("GET","live_search.php?live_search="+str,true);
	  xmlhttp.send();
	}
}
</script>
</head>
<body>
<div class="wrap">
  <form action="<?=$_SERVER['PHP_SELF']?>">
  <input name ="search_request_form" class="input-search" type="text" onkeyup="search(this.value)" required ><button type="submit">ПОИСК</button>
  <ul id="search"></ul>
  </form>
  <br><br>
  <div>
  	<?=$answer;?>
  </div>
</body>
</html>