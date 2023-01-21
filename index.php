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
      <button class="check-button" id="check-<?php echo $x; ?>" onClick="checkAll(<?php echo $x; ?>)">&#x2718; All</button>
      <button class="check-button" id="uncheck-<?php echo $x; ?>" onClick="uncheckAll(<?php echo $x; ?>)" style="display: none;">&#x274f; All</button>
    <?php } ?>
  </div>
  <?php for($i = 0;$i < 10;$i++) {?>
    <div class="row">
      <label for="name">Guest: </label>
      <input class="name" type="text">
      <img src="suspicion.png" alt="">
      <div class="characters">
        <?php for($j = 0;$j < 10;$j++) {?>
          <div class="character character-<?php echo $j; ?>" data-state="unchecked">
          </div>
          <?php } ?>
      </div>
    </div>
  <?php } ?>
  <button class="lock-in" onClick="if(window.confirm('Are you sure you want to lock in your answers?')) {lockInAnswers();}">Lock In</button>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    var locked = false;
    function lockInAnswers() {
      $('input').prop('disabled', true);
      $('button').prop('disabled', true);
      locked = true;
    }

    function checkAll(character) {
      $('.character-' + character).attr('data-state', 'checked');
      $('#check-' + character).hide();
      $('#uncheck-' + character).show();
    }

    function uncheckAll(character) {
      $('.character-' + character).attr('data-state', 'unchecked');
      $('#check-' + character).show();
      $('#uncheck-' + character).hide();
    }

    $('.character').click(function() {;
    if(!locked) {
      if($(this).attr('data-state') == 'unchecked') {
        $(this).attr('data-state', 'guess');
      }
      else if($(this).attr('data-state') == 'guess') {
        $(this).attr('data-state', 'checked');
      }
      else if($(this).attr('data-state') == 'checked') {
        $(this).attr('data-state', 'unchecked');
      }
    }
    });

    var int = setInterval(function() {
      $('.character[data-state="unchecked"]').css('opacity', 0);
      $('.character[data-state="guess"]').css('opacity', .5);
      $('.character[data-state="checked"]').css('opacity', .9);
    }, 10);
  </script>
</body>
</html>