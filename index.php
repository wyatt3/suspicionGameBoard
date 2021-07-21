<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Suspicion Game Board</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <div class="check-button-container">
    <?php for($x = 0;$x < 10;$x++) {?>
      <button class="check-button" id="check-<?php echo $x; ?>" onClick="checkAll(<?php echo $x; ?>)">Check All</button>
      <button class="check-button" id="uncheck-<?php echo $x; ?>" onClick="uncheckAll(<?php echo $x; ?>)" style="display: none;">Un-Check All</button>
    <?php } ?>
  </div>
  <?php for($i = 0;$i < 10;$i++) {?>
    <div class="row">
      <label for="name">Guest: </label>
      <input class="name" type="text">
      <img src="suspicion.png" alt="">
      <div class="characters">
        <?php for($j = 0;$j < 10;$j++) {?>
          <div class="character <?php echo 'character-' . $j; ?>">
            <input class="character-checkbox-<?php echo $j; ?>" type="checkbox">
          </div>
          <?php } ?>
      </div>
    </div>
  <?php } ?>
  <button onClick="lockInAnswers();">Lock In</button>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    function lockInAnswers() {
      $('input').prop('disabled', true);
      $('button').prop('disabled', true);
    }

    function checkAll(character) {
      $('.character-checkbox-' + character).prop('checked', true);
      $('#check-' + character).hide();
      $('#uncheck-' + character).show();
    }

    function uncheckAll(character) {
      $('.character-checkbox-' + character).prop('checked', false);
      $('#check-' + character).show();
      $('#uncheck-' + character).hide();
    }
  </script>
</body>
</html>