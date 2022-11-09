$.ajax({
    url:"http://localhost/Serveur/TDW/admin.php",
    type:'POST',
    dataType:'text',
    data:JSON.stringify({
        service:"login",
        id_user: localStorage.getItem("id"),
        hashcode: localStorage.getItem("code")
    }),
    success:(Data)=>{ 
        if(JSON.parse(Data)['etat']==false){
            location.replace("Login.html");
        }
    },   
});
$(document).ready(function(){

    $("#Deconnect").click(function(){
        $.ajax({
            url:"http://localhost/Serveur/TDW/admin.php",
            type:'POST',
            dataType:'text',
            data:JSON.stringify({
                service:"deconnect",
                id_user: localStorage.getItem("id")         
            })   
        });
        localStorage.removeItem('id');
        localStorage.removeItem('code');
        location.replace("Login.html");
    });

    

    function AddT1(){
        $.ajax({
            url:"http://localhost/Serveur/TDW/admin.php",
            type:'POST',
            dataType:'text',
            data:JSON.stringify({
                service:"listT1"        
            }),
            success:(Data)=>{
                var listT1= JSON.parse(Data);
                $(".bd1").html("<tr> <th scope='row'> Somme</th> <td class='somme'></td>  <td class='somme'></td> </tr>");
                listT1.forEach(element => {
                    var th = $("<th></th>").text(element['Id_culture']+"  )  "+element['Nom_culture']).attr("scope","row");                
                    var col1 = $("<td></td>").text(element['Superficie']).addClass("valTdT11");  
                    var col2 = $("<td></td>").text(element['Production']).addClass("valTdT12");   
                    $(".bd1").children("tr").last().before( $("<tr></tr>").append(th,col1,col2))
                });
                AddSomme()
            } 
        });
    }


    function AddT2(){
        $.ajax({
            url:"http://localhost/Serveur/TDW/admin.php",
            type:'POST',
            dataType:'text',
            data:JSON.stringify({
                service:"listT2"        
            }),
            success:(Data)=>{
                var listT2= JSON.parse(Data);
                $(".bd2").html("<tr><th scope='row'> Somme</th><td class='somme'></td></tr>");
                listT2.forEach(element => {
                    var th = $("<th></th>").text(element["Id_elevage"]+" ) "+element["Nom_animal"]).attr("scope","row");                
                    var col = $("<td></td>").text(element["Nombre_tete"] ).addClass("valTdT2");  
                    $(".bd2").children("tr").last().before($("<tr></tr>").append(th,col))
                });
                AddSomme()
            }     
        });
    }

    AddT1();
    AddT2();
     

    function CalculeSomme(Col){
        var somme = 0;
        var col = $("."+Col);
        var j = 1;
        for(let i = 0 ; i<col.length ; i++){
           j = col.eq(i).attr('rowspan');
           if(j==null) j=1;
           somme+=j*parseInt(col.eq(i).text().replace(/ /g,""))
        }   
        return somme;
     }  
     
     function AddSomme(){
        $(".somme").eq(0).text(CalculeSomme("valTdT11"));
        $(".somme").eq(1).text(CalculeSomme("valTdT12"));
        $(".somme").eq(2).text(CalculeSomme("valTdT2"));
     }
     
     
     $(".button1").click(function(){
        $(".form1").show(800);
        $(".form2").hide();
     });
  
     $(".button2").click(function(){
        $(".form2").show(800);
        $(".form1").hide();
     });

     function inserEelemntT1(c,s,p,callfunction){
        $.ajax({
            url:"http://localhost/Serveur/TDW/admin.php",
            type:'POST',
            dataType:'text',
            data:JSON.stringify({
                service:"inserEelemntT1",
                Nom_culture:c,
                Superficie:s,
                Production:p
            }),
            success:(res)=>{
                callfunction();
            }, 
            error:(res)=>{
               console.log(res);
            }  
        });
     }
     function inserEelemntT2(e,n,callfunction){
        $.ajax({
            url:"http://localhost/Serveur/TDW/admin.php",
            type:'POST',
            dataType:'text',
            data:JSON.stringify({
                service:"inserEelemntT2",
                Nom_animal:e,
                Nombre_tete:n
            }), 
            success:(res)=>{
                callfunction();
            }, 
            error:(res)=>{
               console.log(res);
            }      
        });
    }

    function supEelemntT1(n1,callfunction){
        $.ajax({
            url:"http://localhost/Serveur/TDW/admin.php",
            type:'POST',
            dataType:'text',
            data:JSON.stringify({
                service:"supEelemntT1",
                num_sup_culture:n1
            }),  
            success:(res)=>{
                callfunction();
            }, 
            error:(res)=>{
               console.log(res);
            }    
        });
    }

    function supEelemntT2(n2,callfunction){
        $.ajax({
            url:"http://localhost/Serveur/TDW/admin.php",
            type:'POST',
            dataType:'text',
            data:JSON.stringify({
                service:"supEelemntT2",
                num_sup_Espece:n2
            }),
            success:(res)=>{
                callfunction();
            }, 
            error:(res)=>{
               console.log(res);
            }     
        });
    }

    function editEelemntT1(a1,b1,c1,d1,callfunction){
        $.ajax({
            url:"http://localhost/Serveur/TDW/admin.php",
            type:'POST',
            dataType:'text',
            data:JSON.stringify({
                service:"editEelemntT1",
                num_edit_culture:a1,
                edit_culture:b1,
                edit_Superficie:c1,
                edit_Production:d1
            }),
            success:(res)=>{
                callfunction();
            }, 
            error:(res)=>{
               console.log(res);
            }      
        });
    }

    function editEelemntT2(a2,b2,c2,callfunction){
        $.ajax({
            url:"http://localhost/Serveur/TDW/admin.php",
            type:'POST',
            dataType:'text',
            data:JSON.stringify({
                service:"editEelemntT2",
                num_edit_Espece:a2,
                edit_Espece:b2,
                edit_Nombre :c2,
            }), 
            success:(res)=>{
                callfunction();
            }, 
            error:(res)=>{
               console.log(res);
            }     
        });
    }
  
     $(".add1").submit(function(e){ 
        e.preventDefault();
        let culture = $(".culture").val();
        $(".culture").val("")
        let Superficie = $(".Superficie").val();
        $(".Superficie").val("")
        let Production = $(".Production").val();
        $(".Production").val("")
        inserEelemntT1(culture,Superficie,Production,AddT1); 
     });
  
     $(".add2").submit(function(e){ 
        e.preventDefault();
        let Espece = $(".Espece").val();
        $(".Espece").val("")
        let Nombre = $(".Nombre").val();
        $(".Nombre").val("")
        inserEelemntT2(Espece,Nombre,AddT2);
     });

     $(".suprim1").submit(function(e){ 
        e.preventDefault();
        let num_sup_culture = $(".num_sup_culture").val();
        $(".num_sup_culture").val("")      
        supEelemntT1(num_sup_culture,AddT1);
     });

     $(".suprim2").submit(function(e){ 
        e.preventDefault();
        let num_sup_Espece = $(".num_sup_Espece").val();
        $(".num_sup_Espece").val("")      
        supEelemntT2(num_sup_Espece,AddT2);
     });

     $(".edit1").submit(function(e){ 
        e.preventDefault();
        let num_edit_culture = $(".num_edit_culture").val();
        $(".num_edit_culture").val("")
        let edit_culture = $(".edit_culture").val();
        $(".edit_culture").val("")
        let edit_Superficie = $(".edit_Superficie").val();
        $(".edit_Superficie").val("")
        let edit_Production = $(".edit_Production").val();
        $(".edit_Production").val("")
        editEelemntT1(num_edit_culture,edit_culture,edit_Superficie,edit_Production,AddT1);
     });

     $(".edit2").submit(function(e){ 
        e.preventDefault();
        let num_edit_Espece = $(".num_edit_Espece").val();
        $(".num_edit_Espece").val("")
        let edit_Espece = $(".edit_Espece").val();
        $(".edit_Espece").val("")
        let edit_Nombre = $(".edit_Nombre").val();
        $(".edit_Nombre").val("")
        editEelemntT2(num_edit_Espece,edit_Espece,edit_Nombre,AddT2);
     });
    var so = 5 ;
    console.log(so);




});