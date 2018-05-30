<noscript>
	<!-- 
		podemos utilizar a tag http-equiv="refresh" e redirecionar o usuário para outra página  
		porém essa função pode ser cancelada no IE 
		<meta http-equiv="refresh" content="0.0;url=/arquivo_sem_javascript.html">
		Então caso realmente seja cancelada no IE, criamos uma DIV tapando tudo, isso dificultará mais ainda o usuário    
	-->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,700" rel="stylesheet">
	<style type="text/css">
		#tapatudo{
			font-family: 'Open Sans Condensed', sans-serif;
			position: fixed;
			top: 0;
			left: 0;
			width: 100%;
			height: 100%;
			background-color: #FF0;
			z-index: 9999;
		}
		#tapatudo .content{
			vertical-align: middle;
			position: absolute;
			top: 50%;
			left: 50%;
			transform: translate(-50%,-50%);
			font-size: 40px;
			font-weight: 700;
			text-align: center;
		}
	</style> 
	<div id="tapatudo">
		<div class="content">
			ATENÇÃO!<br> ATIVE O JAVASCRIPT DO SEU BROWSER PARA NAVEGAR
		</div>
	</div>
</noscript>




<style type="text/css">
	h1,p{font-family: 'Open Sans Condensed', sans-serif;}
</style>




<? include('./functions.php'); ?>

<h1>Férias na beira do lago</h1>
<p>
	Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam at turpis posuere, volutpat quam eget, bibendum quam. Fusce facilisis euismod orci eu vehicula. Fusce congue quam non lorem euismod vestibulum. Aliquam bibendum id est nec congue. Donec non metus augue. Vivamus a efficitur mi. Quisque imperdiet quam maximus ligula rutrum, vitae elementum tortor tempor. In viverra non mi a molestie. Suspendisse ullamcorper imperdiet libero non auctor. Maecenas lacus orci, mattis id urna in, hendrerit semper velit. Integer vehicula tempus arcu, et tempus diam tincidunt ut.
	<img src="<?=img("./images/images.jpg")?>" style="width: 500px; margin-right: 40px; float: left;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam at turpis posuere, volutpat quam eget, bibendum quam. Fusce facilisis euismod orci eu vehicula. Fusce congue quam non lorem euismod vestibulum. Aliquam bibendum id est nec congue. Donec non metus augue. Vivamus a efficitur mi. Quisque imperdiet quam maximus ligula rutrum, vitae elementum tortor tempor. In viverra non mi a molestie. Suspendisse ullamcorper imperdiet libero non auctor. Maecenas lacus orci, mattis id urna in, hendrerit semper velit. Integer vehicula tempus arcu, et tempus diam tincidunt ut.
	Etiam at elit elementum, consequat ligula quis, congue erat. Vivamus ultricies risus at neque viverra pretium. In in laoreet nisi. Etiam venenatis faucibus iaculis. Cras auctor, dui et dictum volutpat, nisl dui cursus tortor, sed efficitur magna tellus vitae erat. Suspendisse et aliquam odio. Donec vehicula diam nec ipsum pharetra, non eleifend libero sodales. Vestibulum at augue at diam posuere convallis et sit amet ex. Phasellus lobortis mauris eget urna gravida, in semper diam faucibus. Proin ultricies tortor vel ullamcorper vulputate. Maecenas ultricies risus in erat placerat interdum.
	Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Sed diam erat, varius vel metus eget, accumsan efficitur libero. Mauris quis egestas magna, ut ornare sem. Vivamus mattis augue vitae dui lacinia fermentum. Nullam mollis at urna ac mattis. Vivamus congue risus diam, eu fringilla magna scelerisque quis. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Duis eleifend leo in porta consectetur. Vivamus fringilla suscipit lectus, vitae dignissim odio. Nullam molestie eget urna in ultrices. Mauris vitae justo ut metus ullamcorper imperdiet ac eu nisi. Morbi aliquam velit ut orci dictum, nec pellentesque tellus commodo. Sed nec lorem at ipsum rhoncus feugiat. Integer eget sapien pellentesque, interdum quam vitae, interdum lacus. Suspendisse vestibulum tempor orci quis tincidunt.
</p>

<script src="./protect-code.js"></script>
