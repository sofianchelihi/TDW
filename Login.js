$(document).ready(function(){ 
    $("#form").submit(function(e){
        e.preventDefault();
        var username = $("#email").val();
        $("#email").val("");
        var password = $("#password").val();
        $("#password").val("");

        $.ajax({
            url:"http://localhost/Serveur/TDW/Login.php",
            type:'POST',
            dataType:'text',
            data:JSON.stringify({
                username: username,
                password: password
            }),
            success:(Data)=>{ 
                var res = JSON.parse(Data)
                if(res['etat']==true){
                    localStorage.setItem("id",res["id"])
                    localStorage.setItem("code",res["code"])
                    location.replace("admin.html");
                }else{
                    alert("Mot de pass ou nom d'utilisateur incorrect !");
                }
            },   
        });
    });

   var ti ="hello";
   
    
 });
     