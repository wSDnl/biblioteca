<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<style>
/* TELA NORMAL */
body{ font-family:Verdana, Arial, Helvetica, sans-serif; margin:0; padding:0; background-color:#f5f5f5; }
.item1 { grid-area: header; }
.item2 { grid-area: menu; }
.item3 { grid-area: main; }
.item4 { grid-area: right; }
.item5 { grid-area: footer; }

.grid-container {
  display: grid;
  grid-template-areas:
    'menu main main main main main'
    'menu main main main main main'
    'menu main main main main main';
  grid-gap: 0px;
  background-color: #f5f5f5;
  padding: 0px;
}

.grid-container > div {
  background-color: rgba(255, 255, 255, 0.8);
  text-align: center;
  padding: 20px 0;
  font-size: 30px;
}

.menuLateral{ background-color:#333333;height:800px; display:block; color:#CCCCCC}
.menuTopo{ background-color:#333333;height:50px; display:none; color:#CCCCCC}

/* SMARTFONE */
@media  (max-width: 600px) {

.grid-container {
  display: grid;
  grid-template-areas:
    'menu menu menu menu menu menu'
    'main main main main main main'
    'main main main main main main';
  grid-gap: 0px;
  background-color: #f5f5f5;
  padding: 0px;
}
.menuLateral{ background-color:#333333;height:50px; display:none}
.menuTopo{ background-color:#333333;height:50px; display:block}



}
</style>
<meta name="viewport" content="width=device-width, initial-scale=1"><title>Documento sin t&iacute;tulo</title>
</head>

<body>

<div class="grid-container">
  <div class="item2" style="background-color:#333333">
  	<div class="menuLateral">Lateral</div>
	<div class="menuTopo">Top</div>
  </div>
  <div class="item3" style="text-align:left; padding:10px">lllll</div>  
</div>


</body>
</html>
