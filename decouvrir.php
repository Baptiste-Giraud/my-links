<link rel="stylesheet" href="./assets/front/css/style.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
var res;
</script>

<div class="container">
    <div class="pages">
      <div class="page one">
        <h1>Découvrir : </h1>
        <div class="nextprev moins" id="1">
          <button class="click" id="next" onClick="slide('next')">Next</button>
        </div>
      </div>
      <div class="page two">
        <?php include("index.php") ?>
        <div class="nextprev plus" id="2">
          <button class="click" id="prev" onClick="slide('prev')">Previous</button>
          <button class="click" id="next" onClick="slide('next')">Next</button>
        </div>
      </div>
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
    }


    var res;
    $('.click').click(function() {
        pos =  $(this).parent();
        posid =  $(this).parent().attr('id');
        posclass =  $(this).parent().hasClass("moins") ? "moins" : "plus";
        type = $(this).attr('id');
        
        idparent = parseInt($(this).parent().attr('id'));
        $.ajax({
      type: 'post',
      url: 'function.php',
      data: {registration: "success", id: idparent, type : type, posid: posid, posclass : posclass},
      dataType: 'json',
      success:function(result, info){

      }
      
 
   })
        });
    </script>
