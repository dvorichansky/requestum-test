<?php
require __DIR__ . "/model.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Requestum</title>

  <link href="https://fonts.googleapis.com/css?family=Ubuntu:300,400,500&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="app/css/all.min.css">
</head>

<body>

  <section class="section section-product-list">
    <div class="product-list" id="productList">

      <?php foreach (getItems(1, 4) as $item) : ?>
        <div class="product-list-item">
          <div class="product-list-item__picture">
            <img src="<?php echo $item['img']; ?>" alt="<?php echo $item['title']; ?>">
            <?php if ($item['new']) : ?>
              <div class="product-list-item__sprite-new">New</div>
            <?php endif; ?>
            <?php if ($item['discountCost'] !== null) : ?>
              <div class="product-list-item__sprite-discount">Sale</div>
            <?php endif; ?>
          </div>
          <div class="product-list-item__delineation">
            <h3 class="product-list-item__title"><?php echo $item['title']; ?></h3>
            <p class="product-list-item__description"><?php echo $item['description']; ?></p>
          </div>
          <div class="product-list-item__cost">
            <?php if ($item['discountCost'] !== null) : ?>
              <div class="product-list-item__cost-discount">$<?php echo $item['cost']; ?></div>
            <?php endif; ?>
            <div class="product-list-item__cost-current">
              $<?php echo $item['discountCost'] ? $item['discountCost'] : $item['cost']; ?>
            </div>
          </div>
          <div class="product-list-item__operation">
            <button class="btn btn-bright product-list-item__add">ADD TO CART</button>
            <button class="btn btn-faint product-list-item__view">VIEW</button>
          </div>
        </div>
      <?php endforeach; ?>

    </div>

    <div class="product-load-more">
      <button class="btn btn-bright product-load-more__button" id="prodLoadMore">LOAD MORE</button>
    </div>

  </section>

  <footer class="footer">

    <div class="footer-box">
      <h2 class="footer-box__title">HOT OFFERS</h2>
      <p class="footer-box__description">Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae. Suspendisse sollicitudin velit sed leo. Ut pharetra augue nec augue. Nam elit magna, hend.</p>
      <ul class="list-ui footer-box__list">
        <li>Vestibulum ante ipsum primis in faucibus orci luctus</li>
        <li>Nam elit magna hendrerit sit amet tincidunt ac</li>
        <li>Quisque diam lorem interdum vitae dapibus ac scele</li>
        <li>Donec eget tellus non erat lacinia fermentum</li>
        <li>Donec in velit vel ipsum auctor pulvin</li>
      </ul>
    </div>

    <div class="footer-box">
      <h2 class="footer-box__title">HOT OFFERS</h2>
      <p class="footer-box__description">Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae. Suspendisse sollicitudin velit sed leo. Ut pharetra augue nec augue. Nam elit magna, hend.</p>
      <ul class="list-ui footer-box__list">
        <li>Vestibulum ante ipsum primis in faucibus orci luctus</li>
        <li>Nam elit magna hendrerit sit amet tincidunt ac</li>
        <li>Quisque diam lorem interdum vitae dapibus ac scele</li>
        <li>Donec eget tellus non erat lacinia fermentum</li>
        <li>Donec in velit vel ipsum auctor pulvin</li>
      </ul>
    </div>
    <div class="footer-box">
      <h2 class="footer-box__title">STORE INFORMATION</h2>
      <div class="ico-item">
        <i class="ico-spriter ico-spriter--map-point"></i>
        <span class="text">Company Inc., 8901 Marmora Road, Glasgow, D04 89GR</span>
      </div>
      <div class="ico-item">
        <i class="ico-spriter ico-spriter--handset"></i>
        <span class="text">Call us now toll free: (800) 2345-6789</span>
      </div>
      <div class="ico-item">
        <i class="ico-spriter ico-spriter--post"></i>
        <span class="text">
          <span>Customer support: support@example.com</span>
          <span>Press: pressroom@example.com</span>
        </span>
      </div>
      <div class="ico-item">
        <i class="ico-spriter ico-spriter--skype"></i>
        <span class="text">Skype: sample-username</span>
      </div>
    </div>

  </footer>

  <script src="app/js/all.min.js"></script>

</body>

</html>