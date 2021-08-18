	var protectCode={
		block:{
			dragImage	:true,
			selectText	:true,
			CopyPaste	:true,
			PrintScreen	:true,
			HotKeys		:true,
			RightClick	:true,
			focus		:true,
			debugger	:true,
		},
		mensages:{
			CopyPaste	:"Todos os direitos reservados a Fulâno de tal",
			HotKeys 	:"Conteúdo protegido!",
			PrintScreen :"Ops, você quer copiar o que aqui?",
			RightClick 	:"Ops, você quer clicando com o botão direito?",
		},
		AddClassNoSelect:function(element){
			if(element==undefined){element="*";}
				var css = element+'{-webkit-touch-callout:none!important;-webkit-user-select:none!important;-khtml-user-select:none!important;-moz-user-select:none!important; -ms-user-select:none!important; user-select:none!important;} *:not(a){cursor: default;}';
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
			if(protectCode.block.selectText==true){protectCode.AddClassNoSelect();}
			if(protectCode.block.dragImage==true){protectCode.AddClassNoDrag();}
			if(protectCode.block.focus==true){
				protectCode.AddClassProtectBlur();
				window.onfocus  = function() { 
					document.querySelectorAll('html')[0].classList.remove("AppProtectBlur");
				}
				window.onblur   = function() { 
					if (document.activeElement.nodeName != "IFRAME") {
						document.querySelectorAll('html')[0].classList.add("AppProtectBlur");
					}
				} 
			}
			if(protectCode.block.RightClick==true){
				if (document.addEventListener) {
					    document.addEventListener('contextmenu', function(e) {
					        if(protectCode.mensages.RightClick!=""){alert(protectCode.mensages.RightClick);}
					        e.preventDefault();
					    }, false);

				} else {
					    document.attachEvent('oncontextmenu', function() {
					       if(protectCode.mensages.RightClick!=""){ alert(protectCode.mensages.RightClick);}
					        window.event.returnValue = false;
					    });
				}
			}
			if(protectCode.block.CopyPaste==true){
				document.addEventListener('copy', function(e) {
					try {e.clipboardData.setData('text/plain', protectCode.mensages.CopyPaste);} catch (err) {}
					try {e.clipboardData.setData('text/html',  protectCode.mensages.CopyPaste);} catch (err) {}
					e.preventDefault();
				});		
			}

			if(protectCode.block.PrintScreen == true){
				window.addEventListener("keyup", function(e) {
				  if (e.keyCode == 44) {
					if(protectCode.mensages.PrintScreen!=""){alert(protectCode.mensages.PrintScreen);}			
					protectCode.clearCopy();
					  try { e.clipboardData.setData('text/plain', protectCode.mensages.PrintScreen); } catch (err) { }
					  try { e.clipboardData.setData('text/html', protectCode.mensages.PrintScreen); } catch (err) { }
					
					return false;
				  }
				});
			}
			if(protectCode.block.HotKeys==true){
				document.onkeydown = function(e) {
					var ctrl = (navigator.platform.match("Mac") ? e.metaKey : e.ctrlKey);
					if(
						(e.keyCode === 123) 												|| 	// F12
						(e.keyCode === 116) 												|| 	// F5
						(e.keyCode === 116	&& 	ctrl 				) 						|| 	// Ctrl+F5
						(e.keyCode === 73	&& 	ctrl && e.shiftKey	) 						|| 	// Ctrl+Shift+I
						(e.keyCode === 46	&& 	ctrl && e.shiftKey	) 						|| 	// Ctrl+Shift+del
						(e.keyCode === 46	&& 	ctrl && e.altKey	)						|| 	// Ctrl+Alt+del
						(e.keyCode === 74	&& 	ctrl && e.shiftKey	) 						|| 	// Ctrl+Shift+J
						(e.keyCode === 74	&& 	ctrl				)						|| 	// Ctrl + J
						(e.keyCode === 82	&& 	ctrl				)						|| 	// Ctrl + R
						(e.keyCode === 9	&& 	ctrl				)						|| 	// alt TAB
						(e.keyCode === 85	&& 	ctrl				)						|| 	// Ctrl + U
						(e.keyCode === 67	&& 	ctrl				)						||	// ctrl+C
						(e.keyCode === 86	&& 	ctrl				)						|| 	// Ctl + V
						(e.keyCode === 88	&& 	ctrl				)						|| 	// Ctl + X
						(e.keyCode === 18	&& 	ctrl				)							 
					){
						protectCode.clearCopy();
						if (e.stopPropagation) {
							e.stopPropagation();
						} else if (window.event) {
							window.event.cancelBubble = true;
						}
						e.preventDefault();
					    return false;
					};
				};
			};
			return true
		}
	};
	protectCode.fire();