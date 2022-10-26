<link rel="stylesheet" href="./assets/front/css/style.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


<div class="container">
  <div class="pages">
    <div class="page one">
      <h1>Découvrir : </h1>
      <div class="nextprev moins" id="null">
        <button class="click" id="next" onClick="slide('next')">Next</button>
      </div>
    </div>
    <div class="page two">

      <?php
      require "index.php"
      ?>

      <div class="nextprev plus" id="1">
        <button class="click prev" id="prev" onClick="slide('prev')">Previous</button>
        <button class="click next" id="next" onClick="slide('next')">Next</button>
      </div>
    </div>
    <!-- <div class="page two">
      <div class="nextprev plus" id="1">
        <button class="click prev" id="prev" onClick="slide('prev')">Previous</button>
        <button class="click next" id="next" onClick="slide('next')">Next</button>
      </div>
    </div> -->
  </div>
</div>


<script>
  const pages = document.querySelectorAll(".page");
  const translateAmount = 100;
  let translate = 0;

  slide = (direction) => {

    direction === "next" ? translate -= translateAmount : translate += translateAmount;

    pages.forEach(
      pages => (pages.style.transform = `translateY(${translate}%)`)
    );

    document.getElementsByClassName("pages").innerHTML += '<div class="page two"> <?php require "index.php"?><div class="nextprev plus" id="1"><button class="click prev" id="prev" onClick="slide('prev')">Previous</button><button class="click next" id="next" onClick="slide('next')">Next</button></div></div>';
  }


  var res;
  $('.click').click(function() {
    idparent = parseInt($(this).parent().attr('id'));
    if (idparent == "null") {
      idparent = 0;
    } else {

    }
    $.ajax({
      type: 'post',
      url: 'function.php',
      data: {
        registration: "success",
        id: idparent
      },
      dataType: 'json',
      success: function(result, info) {

      }


    })
  });
</script>