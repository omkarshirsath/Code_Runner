<html>
    <head>
        <title>Code Player</title>
        <script src="jquery.mini.js">
        </script>
       

    </head>
    <style>
        #header{
            width: 100%;
            background-color: rgb(194, 189, 189);
            height: 40px;
            
        }
        body{
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0px;
            padding: 0px;
        }
        #logo{
            font-size: 21px;
            float: left;
            font-weight: bold;
            padding-top: 6px;
            margin-left: 10px;

        }
        #headerbutton{
           
            width: 250px;
            margin: 0px auto;
            
        }
        .togglebutton{
            margin-top: 5px;
            float: left;
            background-color: rgb(252, 252, 252);
            border: 1px solid grey;
            padding: 5px;
            border-right: none;
            font-size: 90%;
        }
        #html{
            border-top-left-radius: 4px;
            border-bottom-left-radius: 4px;

        }
        #output{
            border-top-right-radius: 4px;
            border-bottom-right-radius: 4px;
            border-right: 1px solid gray;
        }
        .highlight{
            background-color: rgba(235, 229, 229, 0.89);;
        }
        .active{
            background-color: rgb(225, 248, 248);
        }
        textarea{
           
            border-top: none;
            resize: none;
        }
        .panel{
            float: left;
            width: 50%;
            border-left: none;
        }
        iframe{
            border: none;
            border-color: gray;
        }
        .hidden{
            display: none;
        }
        #codelogo{
          float: left;
          margin-right:10px;
        }
    </style>
    <body>
        <div id="header">
            <div id="logo"><img id="codelogo" src="codelogo.png" height="30px" width="65px">CodePlayer</div>
       
        <div id="headerbutton">
            <div class="togglebutton active" id="html">HTML</div>
            <div class="togglebutton" id="css">CSS</div>
            <div class="togglebutton" id="javascript">javascript</div>
            <div class="togglebutton active" id="output">Output</div>
        </div>
    </div>
        <div id="bodycontainer">
        <textarea id="htmlpanel" class="panel"><p id="paragraph"> hello world !</p></textarea>
        <textarea id="csspanel" class="panel hidden">p { color : blue }</textarea>
        <textarea id="javascriptpanel" class="panel hidden">document.getElementById("paragraph").innerHTML = "hello world"</textarea>
        <iframe id="outputpanel" class="panel"></iframe>
    </div>
        <script lang="javascript">
            function updateoutput(){
                $("iframe").contents().find("html").html("<html><head><style type='text/css'>" + $("#csspanel").val()
                    + "</style></head><body>" + $("#htmlpanel").val() + "</body></html>")

                    document.getElementById("outputpanel").contentWindow.eval($("#javascriptpanel").val());


            }
                $(".togglebutton").hover(function(){
                    $(this).addClass("highlight");

                }, function(){

                
                $(this).removeClass("highlight");
            });
            $(".togglebutton").click(function(){
                $(this).toggleClass("active");
                $(this).removeClass("highlight");

                var panelid = $(this).attr("id") + "panel";
               $("#" + panelid).toggleClass("hidden");
               var nuofactiveclass = 4 - $('.hidden').length;
               $(".panel").width(($(window).width()/ nuofactiveclass) -10) ;

            })
            $(".panel").height($(window).height() - $("#header").height()
            -5);
            $(".panel").width(($(window).width()/ 2) -10) ;

            updateoutput();

            $("textarea").on('change keyup paste', function() {

            updateoutput();
                
    
            });
        </script>
    </body>
</html>