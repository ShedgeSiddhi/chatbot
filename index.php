<!DOCTYPE html>
<html>
<head>
  <title>ChatBot</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/main.css">
  <link rel="icon" type="image/png" href="img/home_image.png">
  <script src="js/vendor/modernizr-2.8.3.min.js"></script>
  <script src="js/vendor/jquery-1.12.0.min.js"></script>
  <style>
    .chat {
      position: fixed;
      bottom: 0;
      right: 0;
      margin-right: 20px;
      max-width: 300px;
      z-index: 999;
      box-shadow: 4px 4px 4px 4px;
      border: : 2px solid rgb(22, 118, 134);
    }
    #sc {
      background-color: rgb(22, 118, 134);
      padding: 15px;
      color: white;
      font-size: 16px;
      width: 300px;
      height: 45px;
    }
    #panel {
      background-color: white;
      display: none;
      margin: 0;
      width: 300px;
      height: 300px;
    }
    #div {
      padding: 10px;
      height: 240px;
      position: relative;
      overflow-y: auto;
    }
    input[type=text] {
      width: 100%;
      padding: 12px 20px;
      margin: 8px 0;
      box-sizing: border-box;
    }
    .ou {
      background-color: rgb(241, 240, 240);
      color: black;
      padding: 10px;
      left: 5;
      width: 130px;
      text-align: center;
      height: auto;
      border-radius: 15px;
    }
    .stt {
      margin-top: 5px;
    }
  </style>
</head>
<body>

<!-- Home Page Section -->
<div class="container">
  <div class="row">
    <div class="col-sm-12">
      <h1>Welcome to ChatBot</h1>
      <img src="img/home_image.png" alt="Home Image" style="width: 300px; height: 200px;">
      <p>This is the home page of your ChatBot application.</p>
      
    </div>
  </div>
</div>

<!-- ChatBot Section -->
<div class="container">
  <div class="row">
    <div class="col-sm-5"></div>
    <div class="col-sm-7">
      <div class="chat">
        <a style="text-decoration:none;" href="#">
          <div id="sc"><center ><img style="float:left;" src="img/home_image.png" width="20px" height="20px"/><b>Welcome Chat Bot</b></center></div>
        </a>
        <div id="panel">
          <script>
            $(document).ready(function(){
              var i=0;
              var st;
              $("#sc").click(function(){
                i++;
                $("#panel").slideToggle();
                if(i==1) {
                  $('#div').html("<div class=\"ou\"> Hello Guest. Welcome To ChatBot</div><br>");
                }
              });
            });
          </script>
          <script type="text/javascript">
            $(document).ready(function(){
              $("#st").click(function(){
                var str=$("#tt").val();
                $("#div").html(str);
              });
            });
          </script>
          <script>
            //wait for page load to initialize script
            $(document).ready(function(){
              window.alreadySubmit = false;
              $('#tt').keypress(function(f){
                if(f.which == 13 && !alreadySubmit) {
                  window.alreadySubmit = true;
                  $('form').on('submit', function(e){
                    e.preventDefault();
                    $.ajax({
                      type: "POST", 
                      cache: false,
                      url: "process.php",
                      datatype: "html", 
                      data: $('form').serialize(), 
                      success: function(result) { 
                        $('#div').append("<div class=\"stt\""+result+"</div>");
                        $('#tt').val("");
                      }
                    });
                  });
                }
              });
            });
          </script>
          <div id='div' name="output" >
            <div id="div1"></div>
          </div>
          <br>
          <div class="form-group">
            <form action="process.php" id="form" name="f2" method="POST" >
              <input type="textarea" id="tt" name="input" placeholder="Type Your Message" style="position:absolute; bottom:0; height:30px; width:100%; height:50px;" required />
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

</body>
</html>
