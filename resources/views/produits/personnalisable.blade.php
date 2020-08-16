
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <title>Personnalisation produit</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>	
	
     <script type="text/javascript" src="{{asset('js/fabric.js')}}"></script>
     <script type="text/javascript" src="{{asset('js/tshirtEditor.js')}}"></script>
     <script type="text/javascript" src="{{asset('js/jquery.miniColors.min.js')}}"></script>
    <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>
	
	<link type="text/css" rel="stylesheet" href="{{asset('css/jquery.miniColors1.css')}}" />
    <link href="{{asset('css/bootstrap.min1.css')}}" rel="stylesheet">
	<link href="{{asset('css/bootstrap-responsive.min1.css')}}" rel="stylesheet">
	
      <link class="jsbin" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


	 <script type="text/javascript">
	 </script>
	 <style type="text/css">
	
		 .footer {
			padding: 70px 0;
			margin-top: 70px;
			border-top: 1px solid #E5E5E5;
			background-color: whiteSmoke;
			}			
	      body {
	        padding-top: 60px;	        
	      }
	      .color-preview {
	      	border: 1px solid #CCC;
	      	margin: 2px;
	      	zoom: 1.8;
	      	vertical-align: top;
	      	display: inline-block;
	      	cursor: pointer;
	      	overflow: hidden;
	      	width: 20px;
	      	height: 20px;
	      }
	      .rotate {  
		    -webkit-transform:rotate(90deg);
		    -moz-transform:rotate(90deg);
		    -o-transform:rotate(90deg);
		    /* filter:progid:DXImageTransform.Microsoft.BasicImage(rotation=1.5); */
		    -ms-transform:rotate(90deg);		   
		}		
		.Arial{font-family:"Arial";}
		.Helvetica{font-family:"Helvetica";}
		.MyriadPro{font-family:"Myriad Pro";}
		.Delicious{font-family:"Delicious";}
		.Verdana{font-family:"Verdana";}
		.Georgia{font-family:"Georgia";}
		.Courier{font-family:"Courier";}
		.ComicSansMS{font-family:"Comic Sans MS";}
		.Impact{font-family:"Impact";}
		.Monaco{font-family:"Monaco";}
		.Optima{font-family:"Optima";}
		.HoeflerText{font-family:"Hoefler Text";}
		.Plaster{font-family:"Plaster";}
		.Engagement{font-family:"Engagement";}
::-webkit-file-upload-button {
  background: red;
  color: white;
  padding: 0.8em;
  width:58%;
   text-transform: uppercase;
   margin-top: 20px;
}
 #b
  {
	  background:Chocolate;
	  color:white;
	   padding: 0.8em;
	  width:60%;
  }	
  #cart li{
  	float: right;
  	padding-right: 25px;
  	font-size: 18px;
  }
 

	 </style>
  </head>

  <body class="preview"  data-target=".subnav" data-offset="80">
  	<div class="container">
		<section id="typography">
				<div class="page row" style="margin-top:-60px;">
				
		   		 <h1 ><a href="{{URL('/')}}"><img  src="{{asset('images/eblack.jpg')}}" width="300" alt="Eblack"></a><span class="">Personalisation</span></h1>
                    <hr><hr>
				  </div>
				  
		  <br>
		  <!-- Headings & Paragraph Copy -->
		  <div class="row">			
		    <div class="span3">
		    	
		    	<div class="tabbable"> <!-- Only required for left/right tabs -->
				  <ul class="nav nav-tabs">
				  	<li class="active"><a href="#tab1" data-toggle="tab"><b>CUSTOMISER</b></a></li>				    
				    <!--<li><a href="#tab2" data-toggle="tab">Gravatar</a></li>-->
				  </ul>
				  <div class="tab-content">
				     <div class="tab-pane active" id="tab1">
				       <div class="well">
						   <p>couleurs</p>
							<ul class="nav">
								<li class="color-preview" title="White" style="background-color:#ffffff;"></li>
								<li class="color-preview" title="Dark Heather" style="background-color:#616161;"></li>
								<li class="color-preview" title="Gray" style="background-color:#f0f0f0;"></li>
							
								<li class="color-preview" title="Black" style="background-color:#222222;"></li>
								<li class="color-preview" title="Heather Orange" style="background-color:#fc8d74;"></li>
								<li class="color-preview" title="Heather Dark Chocolate" style="background-color:#432d26;"></li>
								<li class="color-preview" title="Salmon" style="background-color:#eead91;"></li>
								<li class="color-preview" title="Chesnut" style="background-color:#806355;"></li>
								<li class="color-preview" title="Dark Chocolate" style="background-color:#382d21;"></li>
								<li class="color-preview" title="Citrus Yellow" style="background-color:#faef93;"></li>
								<li class="color-preview" title="Avocado" style="background-color:#aeba5e;"></li>
								<li class="color-preview" title="Kiwi" style="background-color:#8aa140;"></li>
								<li class="color-preview" title="Irish Green" style="background-color:#1f6522;"></li>
								<li class="color-preview" title="Scrub Green" style="background-color:#13afa2;"></li>
								<li class="color-preview" title="Teal Ice" style="background-color:#b8d5d7;"></li>
								<li class="color-preview" title="Heather Sapphire" style="background-color:#15aeda;"></li>
								<li class="color-preview" title="Sky" style="background-color:#a5def8;"></li>
								<li class="color-preview" title="Antique Sapphire" style="background-color:#0f77c0;"></li>
								<li class="color-preview" title="Heather Navy" style="background-color:#3469b7;"></li>							
								<li class="color-preview" title="Cherry Red" style="background-color:#c50404;"></li>
							</ul>
							<hr style="color: black">
							<div class="input-append">
								<input class="span2" id="text-string" type="text" placeholder="ajouter votre texte ici"><button id="add-text" class="btn" title="Add text"><i class="fa fa-share"></i></button>
								<hr>
							  </div>
						</div>			      
				     </div>				   
				    <div class="tab-pane" id="tab2">
				    	<div class="well">
				    		
							<div id="avatarlist">
								<img style="cursor:pointer;" class="img-polaroid" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQacUAcnEjB5KyCM_vjs7CC6l9dZffy2CCofzeIqLSLc-Q7Lv5k">
								<img style="cursor:pointer;" class="img-polaroid" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTENHBvJs5_jo4L-BzkjHpUFa1tqOXbQIC3pvaVEuZCn9WW5N0gGA">
				                
				                <img style="cursor:pointer;" style="width: 96px;height: 96px;" class="img-polaroid" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcShpvpRpoErITYMtmVO7kr7mp0Wlyi3noiNzRupcxtLdzEKS37nPQ">
				                <img style="cursor:pointer;" class="img-polaroid" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTC38hgw0RPP-hwGpDd3cwBBCKBefVJNV2lF9kv_QpLnPYMPZ56Pg">
				                
				                <img style="cursor:pointer;" class="img-polaroid" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTud8HLWmE-wlhq-LGLVzC68Krmw-zz0ECor1ThuOR0RuHYDToT">
				                <img style="cursor:pointer;" class="img-polaroid" id="blah" src="#" alt="UPLOADED IMAGE HERE">
							<script type="text/javascript">
    	function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blah')
                    .attr('src', e.target.result)
                    .width(150)
                    .height(200);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
    </script>
							</div>				    		
				    	</div>				      
				    </div>
				  </div>
				</div>				
		    </div>		
		    <div class="span6">		    
		    		<div align="center" style="min-height: 32px;">
		    			<div class="clearfix">
							<div class="btn-group inline pull-left" id="texteditor" style="display:none">						  
								<button id="font-family" class="btn dropdown-toggle" data-toggle="dropdown" title="Font Style"><b class="">A</b></button>		                      
										                      
							    <ul class="dropdown-menu" role="menu" aria-labelledby="font-family-X">
								    <li><a tabindex="-1" href="#" onclick="setFont('Arial');" class="Arial">Arial</a></li>
								    <li><a tabindex="-1" href="#" onclick="setFont('Helvetica');" class="Helvetica">Helvetica</a></li>
								    <li><a tabindex="-1" href="#" onclick="setFont('Myriad Pro');" class="MyriadPro">Myriad Pro</a></li>
								    <li><a tabindex="-1" href="#" onclick="setFont('Delicious');" class="Delicious">Delicious</a></li>
								    <li><a tabindex="-1" href="#" onclick="setFont('Verdana');" class="Verdana">Verdana</a></li>
								    <li><a tabindex="-1" href="#" onclick="setFont('Georgia');" class="Georgia">Georgia</a></li>
								    <li><a tabindex="-1" href="#" onclick="setFont('Courier');" class="Courier">Courier</a></li>
								    <li><a tabindex="-1" href="#" onclick="setFont('Comic Sans MS');" class="ComicSansMS">Comic Sans MS</a></li>
								    <li><a tabindex="-1" href="#" onclick="setFont('Impact');" class="Impact">Impact</a></li>
								    <li><a tabindex="-1" href="#" onclick="setFont('Monaco');" class="Monaco">Monaco</a></li>
								    <li><a tabindex="-1" href="#" onclick="setFont('Optima');" class="Optima">Optima</a></li>
								    <li><a tabindex="-1" href="#" onclick="setFont('Hoefler Text');" class="Hoefler Text">Hoefler Text</a></li>
								    <li><a tabindex="-1" href="#" onclick="setFont('Plaster');" class="Plaster">Plaster</a></li>
								    <li><a tabindex="-1" href="#" onclick="setFont('Engagement');" class="Engagement">Engagement</a></li>
				                </ul>
							    <button id="text-bold" class="btn" data-original-title="Bold"><img src="{{asset('images/icons/font_bold.png')}}" height="" width=""></button>
							    <button id="text-italic" class="btn" data-original-title="Italic"><img src="{{asset('images/icons/font_italic.png')}}" height="" width=""></button>
							    <button id="text-strike" class="btn" title="Strike" style=""><img src="{{asset('images/icons/font_strikethrough.png')}}" height="" width=""></button>
							 	<button id="text-underline" class="btn" title="Underline" style=""><img src="{{asset('images/icons/font_underline.png')}}"></button>
							 	<a class="btn" href="#" rel="tooltip" data-placement="top" data-original-title="Font Color"><input type="hidden" id="text-fontcolor" class="color-picker" size="7" value="#000000"></a>
						 		<a class="btn" href="#" rel="tooltip" data-placement="top" data-original-title="Font Border Color"><input type="hidden" id="text-strokecolor" class="color-picker" size="7" value="#000000"></a>
								  <!--- Background <input type="hidden" id="text-bgcolor" class="color-picker" size="7" value="#ffffff"> --->
							</div>							  
							<div class="pull-right" align="" id="imageeditor" style="display:none">
								<div class="btn-group">										      
									<button class="btn" id="bring-to-front" title="Bring to Front"><i class="fa fa-fast-backward rotate" style="height:19px;"></i></button>
									<button class="btn" id="send-to-back" title="Send to Back"><i class="fa fa-fast-forward rotate" style="height:19px;"></i></button>
									<button id="remove-selected" class="btn" title="Delete selected item"><i class="fa fa-trash" style="height:19px;"></i></button>
								</div>
							  </div>		  
						</div>												
					</div>					  		
				<!--	EDITOR      -->					
					<div id="shirtDiv" class="page mb-9 im" style="width: 430px; height: 510px; position: relative; background-color: rgb(255, 255, 255);">
						<img id="tshirtFacing" src="{{asset('images\h.png')}}" style="">
						<div id="drawingArea" style="position: absolute;top: 80px;left: 120px;z-index: 10;width: 200px;height: 350px;">					
							<canvas id="tcanvas" width="200" height="350" class="hover" style="-webkit-user-select: none;"></canvas>
						</div>
        
					</div>
					
				</div>
				<div class="span3"> 
         <div class="well">
		<div class="well">
             <form method="post"> 
				 <br>                 
                    <button id="b" name="done" class="btn btn-hover pull-center">TERMINER</button>&nbsp&nbsp&nbsp&nbsp
                        <!--<input type="file" name="up" id="a"  onchange="readURL(this);"  />-->
         	 </form>
                    
                </div>
			</div>
			
		</div>

		</section>

	</div>
<div style="mt-5">
	<p style="font-size: 11px;margin-top:-70px" class="">mode experimentale, vous nous excusez pour tout desagrement ocasionné</p>

</div>
      <?php
	if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['done']))
    {
        if(!isset($_SESSION["active_user"]))
        {
            
            echo "<script>alert('Log in to shop')</script>";
            
        }
        else{
        echo "<script>alert('Your changes have been saved successfully')</script>";
        echo "<script>alert('Your can go back and add to cart')</script>";
        $i=1;
        }
    }
     ?>
	<script src="{{asset('js/bootstrap.min1.js')}}"></script>  
    
  </body>
</html>