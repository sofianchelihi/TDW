$(document).ready(function(){ 
    $("#form").submit(function(e){
        e.preventDefault();
        var username = $("#email").val();
        $("#email").val("");
        var password = $("#password").val();
        $("#password").val("");

        $.ajax({
            url:"http://localhost/Serveur/TDW/Serveur/View.php",
            type:'POST',
            dataType:'text',
            data:JSON.stringify({
                service :"login",
                username: username,
                password: password
            }),
            success:(Data)=>{ 
                var res = JSON.parse(Data);
                if(res['etat']==true){
                    localStorage.setItem("id",res["id"])
                    localStorage.setItem("code",res["code"])
                    location.replace("../Admin/admin.html");
                }else{
                    alert("Mot de pass ou nom d'utilisateur incorrect !");
                }
            },  
        });
    });

   
    
 });
     