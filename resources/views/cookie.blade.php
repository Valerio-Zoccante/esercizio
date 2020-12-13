<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script type = "text/javascript" src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="{{ asset('js/app.js') }}" defer></script>
  <link href="{{ asset('css/style.css') }}" rel="stylesheet">
  <title></title>
</head>
<body>
  <div class="container">
    <?php foreach ($arrayCookies as $cookie) {?>
      <div class="card">
        <div class="row">Name: <?php echo $cookie->name ?></div>
        <div class="row">Weight: <?php echo $cookie->weight ?></div>
        <div class="row">Total Calories: <?php echo $cookie->calories ?></div>
        <div class="row">Calories each 100g: <?php echo ($cookie->calories/100) ?></div>
        <?php foreach ($arrayIngredients as $listOfIngredientsOfThisCookie) {?>
            <?php foreach ($listOfIngredientsOfThisCookie as $ingredient) {?>
              <div class="row hide">Ingr.:  <?php echo $ingredient->name ?></div>
            <?php } ?>
        <?php } ?>
      </div>
    <?php } ?>
  </div>
</body>
</html>
