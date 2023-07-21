$(document).ready(function(){
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
 
    AddSomme();

    function AddT1(){
        $.ajax({
            url:"http://localhost/Serveur/TDW/Serveur/View.php",
            type:'POST',
            dataType:'text',
            data:JSON.stringify({
                service:"listT1"        
            }),
            success:(Data)=>{
                var listT1= JSON.parse(Data);
                $(".bd1").html("<tr> <th scope='row'> Somme</th> <td class='somme'></td>  <td class='somme'></td> </tr>");
                listT1.forEach(element => {
                    var th = $("<th></th>").text(element['Nom_culture']).attr("scope","row");                
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
            url:"http://localhost/Serveur/TDW/Serveur/View.php",
            type:'POST',
            dataType:'text',
            data:JSON.stringify({
                service:"listT2"        
            }),
            success:(Data)=>{
                var listT2= JSON.parse(Data);
                $(".bd2").html("<tr><th scope='row'> Somme</th><td class='somme'></td></tr>");
                listT2.forEach(element => {
                    var th = $("<th></th>").text(element["Nom_animal"]).attr("scope","row");                
                    var col = $("<td></td>").text(element["Nombre_tete"] ).addClass("valTdT2");  
                    $(".bd2").children("tr").last().before($("<tr></tr>").append(th,col))
                });
                AddSomme()
            }     
        });
    }
    AddT1();
    AddT2();
    setInterval(()=>{
        AddT1();
        AddT2();
    },5000)


   $.ajax({
    url:"http://localhost/Serveur/TDW/Serveur/View.php",
    type:'POST',
    dataType:'text',
    data:JSON.stringify({
        service:"menu"
    }),
    success:(res)=>{
        $(".menu").append(res);
    }    
    });

    $.ajax({
        url:"http://localhost/Serveur/TDW/Serveur/View.php",
        type:'POST',
        dataType:'text',
        data:JSON.stringify({
            service:"typeA"
        }),
        success:(res)=>{
            $(".menu li").eq(1).addClass("list_type_agriculture");
            $(".menu li").eq(1).append("<ul class='type_agriculture'></ul>")
            $(".type_agriculture").append(res);
        }    
    });

    $.ajax({
        url:"http://localhost/Serveur/TDW/Serveur/View.php",
        type:'POST',
        dataType:'text',
        data:JSON.stringify({
            service:"diaporama"
        }),
        success:(res)=>{
            $(".slider").append(res);
        }    
    });

    $.ajax({
        url:"http://localhost/Serveur/TDW/Serveur/View.php",
        type:'POST',
        dataType:'text',
        data:JSON.stringify({
            service:"title"
        }),
        success:(res)=>{
            $(".titre").append(res);
        }    
    });

    $.ajax({
        url:"http://localhost/Serveur/TDW/Serveur/View.php",
        type:'POST',
        dataType:'text',
        data:JSON.stringify({
            service:"video"
        }),
        success:(res)=>{
            $(".video").append(res);
        }    
    });



});
     