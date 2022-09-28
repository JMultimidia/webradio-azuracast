# webradio-azuracast
Webrádio Azuracast

Se você estava procurando por um modelo de site em PHP com a API do Azuracast implementada, você acabou de achar. Através desse modelo que estou disponibilizando, você pode ter uma webrádio totalmente personalizada. Mas não apenas isso. Esse modelo conta também com os botões de interação com as páginas públicas do AzuraCast, e seus ouvintes poderão acompanhar aquilo que já tocou, o que está tocando, a próxima música a tocar e também ver a grade de programação e fazer pedidos de músicas, tudo numa única página.

Além disso, foi implementado o MediaSession. Então quando você enviar os áudios com as TAGs de artista, título, álbum e capa do álbum preenchidas, seus ouvintes terão uma experiência única em seu website, pois a cada áudio as cores e o plano de fundo serão automaticamente alterados. É possível acompanhar também as informações no painel de status de seu smartphone e na tela de bloqueio.

Este website é responsivo e trabalha com TAGs para permitir o compartilhamento da URL nas principais mídias sociais, possibilitando a criação de uma miniatura personalizada baseada nas informações preenchidas dentro da página inicial (como título do projeto, conteúdo do projeto, logotipo, etc). Maiores informações você confere mais abaixo.

Mas as novidades não param por aí: se um dia você desejar transformar seu website em um aplicativo, poderá utilizar o site [PWA Builder](https://www.pwabuilder.com/) e informar a URL de seu site nele para gerar os arquivos para a PlayStore, App Store, Microsoft Apps e Meta. O site já está pronto para passar por esse processo e alcançar a pontuação necessária para virar um aplicativo para os sistemas mobile mais conhecidos.

Para personalizar ainda mais os recursos do seu site, basta trocar as imagens, textos e links presentes neste projeto.

--------------

Para acompanhar um exemplo em funcionamento, acesse:
[Webrádio Azuracast](https://azuracast.denilsonaraujo.com)

--------------

**Informações que devem ser alteradas**

Arquivo *index.php*:

No início do arquivo index.php, você encontrará todas as variáveis que serão informadas na página. Essas variáveis guardam os links e informações do seu projeto. Leia tudo com bastante calma e preencha todas as informações corretamente antes de tornar sua página pública.

Ainda na página index.php, preencha corretamente os pontos de montagem em 64 e 128 Kbps, além do link da rádio que antecede o ponto de montagem. Dentro do site será possível escolher qual ponto de montagem o ouvinte quer ouvir, por isso essas informações são as mais importantes a serem informadas, caso contrário, sua webrádio não funcionará.

Arquivo *js/metadados.js*:

Dentro de metadados.js, você deve informar o endereço de retorno do JSON de sua webrádio dentro da função *loadNowPlaying*, na variável *url*. Somente com essa informação preenchida corretamente o arquivo js conseguirá encontrar e processar todas as informações para tornar a experiência de seu ouvinte mais atrativa.

Pasta *images*:

Nessa pasta, você deverá subtituir todas as imagens genéricas por suas próprias imagens. Caso não queira mexer na estrutura do site, você deverá apenas substituir os arquivos por outros com o mesmo nome e extensão, atualizando portanto as informações de sua webrádio.

--------------

Espero que gostem de tudo que foi feito. Faça bom proveito!
