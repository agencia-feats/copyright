var protectCode={
	block:{
		dragImage:true,
		selectText:true,
		CopyPaste:true,
		PrintScreen:true,
		HotKeys:true,
		RightClick:true,
		focus:true
	},
	mensages:{
		CopyPaste	:"Todos os direitos reservados a Fulâno de tal",
		HotKeys 	:"Conteúdo protegido!",
		PrintScreen :"Ops, você quer copiar o que aqui?",
		RightClick 	:"Ops, você quer clicando com o botão direito?",
	},
	AddClassNoSelect:function(element){
		if(element==undefined){element="*";}
		var css = element+'{-webkit-touch-callout:none!important;-webkit-user-select:none!important;-khtml-user-select:none!important;-moz-user-select:none!important; -ms-user-select:none!important; user-select:none!important;}',
		    head = document.head || document.getElementsByTagName('head')[0],
		    style = document.createElement('style');
			style.type = 'text/css';
			if (style.styleSheet){
			  style.styleSheet.cssText = css;
			} else {
			  style.appendChild(document.createTextNode(css));
			}
			head.appendChild(style);
	},
	AddClassNoDrag:function(element){
		if(element==undefined){element="img";}
		var css = element+'{pointer-events:none!important; }',
		    head = document.head || document.getElementsByTagName('head')[0],
		    style = document.createElement('style');
			style.type = 'text/css';
			if (style.styleSheet){
				style.styleSheet.cssText = css;
			} else {
				style.appendChild(document.createTextNode(css));
			}
			head.appendChild(style);
	},
	clearCopy:function() { 
		var tempInput 	= document.createElement("input");
		tempInput.value = protectCode.mensages.Copy;
		tempInput.style = "position:fixed;left:-20000px;top:-20000px";
		document.body.appendChild(tempInput);
		tempInput.select();
		document.execCommand("copy");
		document.body.removeChild(tempInput);
	},
	AddClassProtectBlur: function(){
		var css = '.AppProtectBlur{-webkit-filter:blur(5px);-moz-filter:blur(5px);-o-filter:blur(5px);-ms-filter:blur(5px);filter:blur(5px);}',
		    head = document.head || document.getElementsByTagName('head')[0],
		    style = document.createElement('style');
			style.type = 'text/css';
			if (style.styleSheet){
			  style.styleSheet.cssText = css;
			} else {
			  style.appendChild(document.createTextNode(css));
			}
			head.appendChild(style);
	},
	fire:function(){
		console.log("ProtectCode running!");
		if(protectCode.block.selectText==true){protectCode.AddClassNoSelect();}
		if(protectCode.block.dragImage==true){protectCode.AddClassNoDrag();}
		if(protectCode.block.focus==true){
			protectCode.AddClassProtectBlur();
			window.onfocus  = function() { 
				document.querySelectorAll('html')[0].classList.remove("AppProtectBlur");
			}
			window.onblur   = function() { 
				console.log(document.activeElement.nodeName)
				if (document.activeElement.nodeName != "IFRAME") {
					document.querySelectorAll('html')[0].classList.add("AppProtectBlur");
				}
			} 
		}
		if(protectCode.block.RightClick==true){
			if (document.addEventListener) {
				    document.addEventListener('contextmenu', function(e) {
				        alert(protectCode.mensages.RightClick);
				        e.preventDefault();
				    }, false);

			} else {
				    document.attachEvent('oncontextmenu', function() {
				        alert(protectCode.mensages.RightClick);
				        window.event.returnValue = false;
				    });
			}
		}
		if(protectCode.block.CopyPaste==true){
			document.addEventListener('copy', function(e) {
				e.clipboardData.setData('text/plain', protectCode.mensages.CopyPaste);
				e.clipboardData.setData('text/html',  protectCode.mensages.CopyPaste);
				e.preventDefault();
			});		
		}

		if(protectCode.block.PrintScreen == true){
			window.addEventListener("keyup", function(e) {
			  if (e.keyCode == 44) {
				alert(protectCode.mensages.PrintScreen)
				protectCode.clearCopy();
				return false;
			  }
			});
		}
		if(protectCode.block.HotKeys==true){
			document.onkeydown = function(e) {
				if(
					(e.keyCode === 123) 													|| 	// F12
					(e.ctrlKey && e.shiftKey && e.keyCode === 46) 							|| 	// Ctrl+Shift+del
					(e.ctrlKey && e.altKey && e.keyCode === 46) 							|| 	// Ctrl+Alt+del
					(e.ctrlKey && e.keyCode === 82) 										|| 	// Ctrl + R
					(e.ctrlKey && e.keyCode === 9) 											|| 	// alt TAB
					(e.ctrlKey && e.keyCode === 85) 										|| 	// Ctrl + U
					(e.ctrlKey && e.keyCode === 74) 										|| 	
					(e.ctrlKey && e.keyCode === 67) 										||	//ctrl+C
					(e.ctrlKey && e.keyCode === 86) 										|| 	//Ctl + V
					(e.ctrlKey && e.keyCode === 88) 										|| 	//Ctl + X
					(e.ctrlKey && e.keyCode === 18) 
				){
					console.log("HotKeys disabled")
					protectCode.clearCopy();
				    return false;
				};
			};
		};
	}
};

protectCode.block.dragImage		 =	true;
protectCode.block.selectText	 =	true;
protectCode.block.CopyPaste		 =	true;
protectCode.block.PrintScreen	 =	true;
protectCode.block.HotKeys		 =	true;
protectCode.block.RightClick	 =	true;
protectCode.block.focus			 =	true;
protectCode.mensages.CopyPaste	 =	"Todos os direitos reservados a Fulâno de tal";
protectCode.mensages.HotKeys	 =	"Conteúdo protegido!";
protectCode.mensages.PrintScreen =	"Ops, você quer copiar o que aqui?";
protectCode.mensages.RightClick	 =	"Ops, você quer clicando com o botão direito?";
protectCode.fire();