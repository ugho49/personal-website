<?php include '../layouts/header.php'; ?>
<?php
//Constantes
$color = "grey darken-1";
$color_btn = "grey lighten-1";
?>

<div class="parallax-container">
  <div class="parallax">
    <img src="img/image1.jpg" style="display: block; transform: translate3d(-50%, 172px, 0px);" class="fond_info">
    <div class="info">
        <img src="img/avatar.jpg" alt="avatar" class="avatar circle" />
        <h2>Ugho Stephan</h2>
        <h3>Developer Web & Mobile </h3>
    </div>
  </div>
</div>
<div class="section white">
  <div class="row container">
    <h2 class="header">A propos de moi</h2>
    <p class="grey-text text-darken-3 lighten-3">
      Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l'imprimerie depuis les années 1500, quand un peintre anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il n'a pas fait que survivre cinq siècles, mais s'est aussi adapté à la bureautique informatique, sans que son contenu n'en soit modifié. Il a été popularisé dans les années 1960 grâce à la vente de feuilles Letraset contenant des passages du Lorem Ipsum, et, plus récemment, par son inclusion dans des applications de mise en page de texte, comme Aldus PageMaker.
    </p>
  </div>
</div>

<div class="parallax-container">
  <div class="parallax"><img src="img/image2.jpg" style="display: block; transform: translate3d(-50%, 85px, 0px);"></div>
</div>

<div class="section white">
  <div class="row container">
    <h2 class="header">Mes compétences</h2>
    <p class="grey-text text-darken-3 lighten-3">
      Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l'imprimerie depuis les années 1500, quand un peintre anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il n'a pas fait que survivre cinq siècles, mais s'est aussi adapté à la bureautique informatique, sans que son contenu n'en soit modifié. Il a été popularisé dans les années 1960 grâce à la vente de feuilles Letraset contenant des passages du Lorem Ipsum, et, plus récemment, par son inclusion dans des applications de mise en page de texte, comme Aldus PageMaker.
    </p>
  </div>
</div>

<div class="parallax-container">
  <div class="parallax"><img src="img/image3.jpg" style="display: block; transform: translate3d(-50%, 85px, 0px);"></div>
</div>

<div class="section white">
  <div class="row container">
    <h2 class="header">Mes expériences</h2>
    <p class="grey-text text-darken-3 lighten-3">
      Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l'imprimerie depuis les années 1500, quand un peintre anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il n'a pas fait que survivre cinq siècles, mais s'est aussi adapté à la bureautique informatique, sans que son contenu n'en soit modifié. Il a été popularisé dans les années 1960 grâce à la vente de feuilles Letraset contenant des passages du Lorem Ipsum, et, plus récemment, par son inclusion dans des applications de mise en page de texte, comme Aldus PageMaker.
    </p>
  </div>
</div>

<div class="parallax-container">
  <div class="parallax"><img src="img/image4.jpg" style="display: block; transform: translate3d(-50%, 85px, 0px);"></div>
</div>

<div class="section white">
  <div class="row container">
    <h2 class="header">Me Contacter</h2>
    <p class="grey-text text-darken-3 lighten-3">
      Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l'imprimerie depuis les années 1500, quand un peintre anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il n'a pas fait que survivre cinq siècles, mais s'est aussi adapté à la bureautique informatique, sans que son contenu n'en soit modifié. Il a été popularisé dans les années 1960 grâce à la vente de feuilles Letraset contenant des passages du Lorem Ipsum, et, plus récemment, par son inclusion dans des applications de mise en page de texte, comme Aldus PageMaker.
    </p>
  </div>
</div>

<footer class="page-footer <?= $color; ?>" style="margin-top:0px;">
  <div class="container">
    <div class="row">
      <div class="col l6 s12">
        <h5 class="white-text">Aider Materialize à grandir</h5>
        <p class="grey-text text-lighten-4">We hope you have enjoyed using Materialize! If you feel Materialize has helped you out and want to support the team, send us over a donation! Any amount would help support and continue development on this project and is greatly appreciated.</p>
        <form id="paypal-donate" action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
          <button class="btn waves-effect waves-light <?= $color_btn; ?>" type="submit" name="action" alt="PayPal - The safer, easier way to pay online!">Faire un don</button>
        </form>

      </div>
      <div class="col l6 s12">
        <h5 class="white-text">Rejoindre la discussion</h5>
        <p class="grey-text text-lighten-4">We have a Gitter chat room set up where you can talk directly with us. Come in and discuss new features, future goals, general problems or questions, or anything else you can think of.</p>
        <a class="btn waves-effect waves-light <?= $color_btn; ?>" target="_blank" href="https://gitter.im/Dogfalo/materialize">Chat</a>
      </div>
    </div>
  </div>
  <div class="footer-copyright">
    <div class="container">© 2014-2015 Materialize, All rights reserved. <a class="grey-text text-lighten-4 right" href="https://github.com/Dogfalo/materialize/blob/master/LICENSE">MIT License</a> </div>
  </div>
</footer>
<?php include '../layouts/footer.php'; ?>
