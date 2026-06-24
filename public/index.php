<?php
include "../vendor/autoload.php";
use LangueDeFeu\LangueDeFeu;
$langueDeFeu = new LangueDeFeu();
$langueDeFeu->execute();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <title>Traducteur de mots en louchebem</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Traducteur louchebem gratuit : traduisez vos mots et expressions en louchebem, l'argot traditionnel des bouchers français, rapidement et simplement en ligne.">
  <meta name="robots" content="index, follow" />
  <link href="assets/reset.css" rel="stylesheet">
  <link href="assets/style.css?version=1.0.0" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Chango&family=Averia+Sans+Libre:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&display=swap" rel="stylesheet">
  <script defer src="assets/jenesaispas.js?version=1.0.0"></script>
  <link rel="icon" type="image/x-icon" href="assets/favicon.png">
</head>

<body>
  <header class="header">
    <div class="margin-auto width-container">
      <h1 class="title-1">Traducteur de mots en louchebem</h1>
    </div>
  </header>

  <div class="main width-container margin-auto">
    <div class="explanation-container">
      <h2
        class="title-2">Création lexicale :
      </h2>
      <p class="explanation">"Le processus de création lexicale du louchébem se rapproche du verlan et du javanais. On « camoufle » des mots existants en les modifiant suivant une certaine règle : la consonne ou le groupe de consonnes au début du mot est reportée à la fin du mot et remplacée par un « l », puis on ajoute un suffixe argotique au choix, par exemple -em/ème, -ji, -oc, -ic, -uche, -ès (en fait -i ou é comme dans largonji ou à loilpé et non ji). Ainsi s-ac se mue en l-ac-s-é, b-oucher en l-oucher-b-em, j-argon en l-argon-j-i, etc."</p>
      <p class="wikipedia-source">Source : <a href="https://fr.wikipedia.org/wiki/Largonji" target="_blank">Wikipedia</a></p>
    </div>


    <div class="top-container">
      <div class="form-container">
        <form method="post">
          <div class="word-textarea <?php echo ($langueDeFeu->getErrorByFieldname("word")) ? "error" : "" ?>">
            <label for="word" class="label">Quel est le mot à traduire ?</label>
            <textarea class="textarea" name="word" id="word"><?php echo $langueDeFeu->getRequest()->getValueByFieldname('word') ?></textarea>
            <div class="missing-value"><?php echo $langueDeFeu->getErrorByFieldname("word") ?></div>
          </div>
          <button class="send-button" type="submit">Envoyer</button>
        </form>
      </div>
    </div>
    <?php if (!empty($langueDeFeu->viewTransformWords())) : ?>
      <div class="response-container">
        <div class="response">
          <div class="response-title-container">
            <h2 class="response-title">Résultat :</h2>
          </div>
          <div class="response-text"><?php echo $langueDeFeu->viewTransformWords() ?></div>
          <button type="button" class="copy-button">
            <svg width="40px" height="40px" viewBox="0 -0.5 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" clip-rule="evenodd" d="M17.676 14.248C17.676 15.8651 16.3651 17.176 14.748 17.176H7.428C5.81091 17.176 4.5 15.8651 4.5 14.248V6.928C4.5 5.31091 5.81091 4 7.428 4H14.748C16.3651 4 17.676 5.31091 17.676 6.928V14.248Z" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
              <path d="M10.252 20H17.572C19.1891 20 20.5 18.689 20.5 17.072V9.75195" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
          </button>
          <span class="copy-success">Copié</span>
          <span class="copy-fail">Erreur de copie</span>
        </div>
      </div>
    <?php endif; ?>
  </div>

  <footer class="footer">
    <div class="footer-text">
      <p>Created by Nora</p>
      <p class="little">@<?php echo date("Y") ?></p>
    </div>
    <a class="github-logo" href="https://github.com/norabeurel/loucherbem" target="_blank">
      <svg class="github-logo" fill="#000000" width="30px" height="30px" viewBox="0 -0.5 25 25" xmlns="http://www.w3.org/2000/svg">
        <path d="m12.301 0h.093c2.242 0 4.34.613 6.137 1.68l-.055-.031c1.871 1.094 3.386 2.609 4.449 4.422l.031.058c1.04 1.769 1.654 3.896 1.654 6.166 0 5.406-3.483 10-8.327 11.658l-.087.026c-.063.02-.135.031-.209.031-.162 0-.312-.054-.433-.144l.002.001c-.128-.115-.208-.281-.208-.466 0-.005 0-.01 0-.014v.001q0-.048.008-1.226t.008-2.154c.007-.075.011-.161.011-.249 0-.792-.323-1.508-.844-2.025.618-.061 1.176-.163 1.718-.305l-.076.017c.573-.16 1.073-.373 1.537-.642l-.031.017c.508-.28.938-.636 1.292-1.058l.006-.007c.372-.476.663-1.036.84-1.645l.009-.035c.209-.683.329-1.468.329-2.281 0-.045 0-.091-.001-.136v.007c0-.022.001-.047.001-.072 0-1.248-.482-2.383-1.269-3.23l.003.003c.168-.44.265-.948.265-1.479 0-.649-.145-1.263-.404-1.814l.011.026c-.115-.022-.246-.035-.381-.035-.334 0-.649.078-.929.216l.012-.005c-.568.21-1.054.448-1.512.726l.038-.022-.609.384c-.922-.264-1.981-.416-3.075-.416s-2.153.152-3.157.436l.081-.02q-.256-.176-.681-.433c-.373-.214-.814-.421-1.272-.595l-.066-.022c-.293-.154-.64-.244-1.009-.244-.124 0-.246.01-.364.03l.013-.002c-.248.524-.393 1.139-.393 1.788 0 .531.097 1.04.275 1.509l-.01-.029c-.785.844-1.266 1.979-1.266 3.227 0 .025 0 .051.001.076v-.004c-.001.039-.001.084-.001.13 0 .809.12 1.591.344 2.327l-.015-.057c.189.643.476 1.202.85 1.693l-.009-.013c.354.435.782.793 1.267 1.062l.022.011c.432.252.933.465 1.46.614l.046.011c.466.125 1.024.227 1.595.284l.046.004c-.431.428-.718 1-.784 1.638l-.001.012c-.207.101-.448.183-.699.236l-.021.004c-.256.051-.549.08-.85.08-.022 0-.044 0-.066 0h.003c-.394-.008-.756-.136-1.055-.348l.006.004c-.371-.259-.671-.595-.881-.986l-.007-.015c-.198-.336-.459-.614-.768-.827l-.009-.006c-.225-.169-.49-.301-.776-.38l-.016-.004-.32-.048c-.023-.002-.05-.003-.077-.003-.14 0-.273.028-.394.077l.007-.003q-.128.072-.08.184c.039.086.087.16.145.225l-.001-.001c.061.072.13.135.205.19l.003.002.112.08c.283.148.516.354.693.603l.004.006c.191.237.359.505.494.792l.01.024.16.368c.135.402.38.738.7.981l.005.004c.3.234.662.402 1.057.478l.016.002c.33.064.714.104 1.106.112h.007c.045.002.097.002.15.002.261 0 .517-.021.767-.062l-.027.004.368-.064q0 .609.008 1.418t.008.873v.014c0 .185-.08.351-.208.466h-.001c-.119.089-.268.143-.431.143-.075 0-.147-.011-.214-.032l.005.001c-4.929-1.689-8.409-6.283-8.409-11.69 0-2.268.612-4.393 1.681-6.219l-.032.058c1.094-1.871 2.609-3.386 4.422-4.449l.058-.031c1.739-1.034 3.835-1.645 6.073-1.645h.098-.005zm-7.64 17.666q.048-.112-.112-.192-.16-.048-.208.032-.048.112.112.192.144.096.208-.032zm.497.545q.112-.08-.032-.256-.16-.144-.256-.048-.112.08.032.256.159.157.256.047zm.48.72q.144-.112 0-.304-.128-.208-.272-.096-.144.08 0 .288t.272.112zm.672.673q.128-.128-.064-.304-.192-.192-.32-.048-.144.128.064.304.192.192.32.044zm.913.4q.048-.176-.208-.256-.24-.064-.304.112t.208.24q.24.097.304-.096zm1.009.08q0-.208-.272-.176-.256 0-.256.176 0 .208.272.176.256.001.256-.175zm.929-.16q-.032-.176-.288-.144-.256.048-.224.24t.288.128.225-.224z"/>
      </svg>
    </a>
  </footer>
</body>
</html>

