![enter image description here](https://raw.githubusercontent.com/websheep/copyright/master/images/marca.png)

[![GitHub issues](https://img.shields.io/github/issues/websheep/copyright.svg)](https://github.com/websheep/copyright/issues) [![GitHub forks](https://img.shields.io/github/forks/websheep/copyright.svg)](https://github.com/websheep/copyright/network) [![GitHub stars](https://img.shields.io/github/stars/websheep/copyright.svg)](https://github.com/websheep/copyright/stargazers) [![GitHub license](https://img.shields.io/github/license/websheep/copyright.svg)](https://github.com/websheep/copyright)

# SCRIPT DE PROTEÇÃO CONTRA CÓPIAS

Sabemos que é impossível ser 100% seguros, porém devemos dificultar ao máximo a apropriação indevida de nossa propriedade intelectual.	
Esse código foi projetado inicialmente para um cliente que trabalhava com fotografias e não queria que suas fotos fossem "roubadas".
	Porém ele não queria deixar um monte de marca d'água estragando os previews dos clientes. 

### PrintScreen, Copy/Paste, SelectText, DragImage e RigthClick
Caso queira implementar apenas o script em seu site, inclua ao final da página o arquivo:

`<script src="./extension/protect-code.js"></script>`    

### imagem de única exibição a prova de cópia
Lembrando, que todos os códigos se complementam, por exemplo:  
`<img src="<?=img("./images/images.jpg")?>">`

Não adianta implementar essa técnica sem implementar o javascript no front, e vice e versa.
Esse método consiste em uma função para gravar na base de dados uma ASH única com o caminho da imagem.
Caso a **ash** exista **E** não for expirada **E** tenha sido acessada de uma tag `<img>`   ele retorna o jpg.
Caso contrário retorna um erro.

