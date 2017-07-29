// Quando estiver instalando/atualizando:
chrome.runtime.onInstalled.addListener(function() {
	// Remover as regras de mudança de página:
    chrome.declarativeContent.onPageChanged.removeRules(undefined, function() {
        new chrome.declarativeContent.ShowPageAction() 
    });
});

