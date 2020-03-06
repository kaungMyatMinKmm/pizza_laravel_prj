$(document).ready(function () {

        getData();
  

      $(".select").click(function () {
        var id = $(this).data("id");
        var name = $(this).data("name");
        var price = $(this).data("price");
        // console.log(id);
        // console.log(name);
        // console.log(price);
        storeData(id,name,price);
      });

      function storeData(id,name,price)
          {
            var qty = 1;
            var mylist = {id: id,name:name,price:price,qty:qty};
            var pizza = localStorage.getItem('pizza');

            if (!pizza)
            {
              var pizza = '{"mypizza":[]}';
            }

            pizza = JSON.parse(pizza);

            var mypizza = pizza.mypizza;
            var length = mypizza.length;

            for (var i =0;i<length; i++) 
            {
              if (id == mypizza[i].id)
              {
                var exit = 1;
                mypizza[i].qty +=1;
              }
            }

            if(!exit)
            {
              pizza.mypizza.push(mylist);
            }
            pizza = JSON.stringify(pizza);
            localStorage.setItem('pizza', pizza);

            getData();
          }




      //   var pizza = {
      //     id:id,
      //     name:name,
      //     price:price
      //   }
      //   // console.log(pizza);

      //   var pizzaString=localStorage.getItem("pizza");
      //   var pizzaArray;
      //   if (pizzaString==null) {
      //     pizzaArray=Array();
      //   } else {
      //     pizzaArray=JSON.parse(pizzaString);
      //   }

      //   var  status=false;

      //   $.each(pizzaArray,function (i,v) {
      //     if (id==v.id){
      //       status=true;
            
      //     }
      //   })


      //   if (!status) {
      //     pizzaArray.push(pizza);
      //   }
      //   var pizzaData=JSON.stringify(pizzaArray);
      //   localStorage.setItem("pizza",pizzaData);
      //   getData();


      // });


    function getData() {
      
      var pizzaString = localStorage.getItem("pizza");
      // console.log(pizzaString);
      if(pizzaString){
        var pizzaArray = JSON.parse(pizzaString);

        var mypizza =pizzaArray.mypizza

        var html=""; var qty=1;var total=0;
        var j= 1;

          $.each(mypizza,function (i,v) {
            // console.log(v);

            var name = v.name;
            var price = v.price;
            var subtotal = qty*price;
            // var subtotal = qty*price;
            //total+=parseInt(subtotal);
            console.log(price);

            html+=`<tr>
            <td>${j++}</td>
            <td>${name}</td>
            <td>${qty}</td>`



            if(price){
              html += `<td>${price}</td>`;
              }else
                {
                  html += `<td>---</td>`;
                }

            
            if(subtotal){
              html += `<td>${subtotal}</td>`;
               total += subtotal;
              }else
                {
                  html += `<td>--</td>`;
                }
                


           
              // console.log(total);

                // console.log(typeof(total));
                
           
              
          });
         
            $("#order").html(html);

            var myfoot="";

        myfoot += `<tr>
                    <td colspan="5">
                    <h5 class="text-right"> Total : ${total}Ks</h5></td>
                    
                  </tr>


      <tr>
                     <td colspan="4">
                      <textarea class="form-control" id ="recipe"></textarea></td>
                      <td colspan="3">
                      <button class="btn btn-secondary btn-block orderbtn" data-total=${total}  style="background-color:#673AB7; border-color:#673AB7;">
                      Order</button></td>
      </tr>`

       $("#total").html(myfoot);

            
        }

      }

     //  $('#total').on('click', '.orderbtn', function(){

        
     //  var table_no= $("#table_no").val();
     // var recipe = $("#recipe").val();
     // var total =$(this).data('total');
     // var pizza = localStorage.getItem('pizza');
     // var pizzaobj = JSON.parse(pizza);

     // // var pizzaarr = pizzaobj.pizza;
     // console.log(table_no);
     //  $.ajaxSetup({
     //      headers: {
     //          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
     //      }
     //  });  

     //    $.post('/orders',{pizza:pizzaobj,total:total,recipe:recipe,table_no:table_no},function(response){
       

     //  });
     // console.log(pizzaobj);

     // $.post('url','data',function(response){
       
     // })

      

      // localStorage.clear();
      //   showTable();
      //   location.href="ordersuccess.php";
     });




// });