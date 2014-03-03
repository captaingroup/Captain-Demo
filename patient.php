<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Patient</title>

<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
       <script type="text/javascript" src="js/jquery-ui-1.8.17.custom.min.js"></script>
        
       <script type="text/javascript">
               $(document).ready(function(){
 
                    function showComment(){
                      $.ajax({
                        type:"post",
                        url:"functions/getHeartRate.php",
                        data:"action=showcomment",
                        success:function(data){
                             $("#comment").html(data);
                        }
                      });
                    }
 
                    showComment();
 
 
                    $("#button").click(function(){
 
                          var name=$("#name").val();
                          var message=$("#message").val();
 
                          $.ajax({
                              type:"post",
                              url:"process.php",
                              data:"name="+name+"&message="+message+"&action=addcomment",
                              success:function(data){
                                showComment();
                                  
                              }
 
                          });
 
                    });
               });
       </script>

</head>

<body>

<ul id="comment" style="color: #000"><h3>hello</h3></ul>


</body>
</html>