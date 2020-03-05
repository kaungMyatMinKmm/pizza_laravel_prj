$(document).ready(function () {

        getData();
  
      $(".addtocart").click(function () {
        var id = $(this).data("id");
        var name = $(this).data("name");
        var price = $(this).data("price");
        // console.log(price);


        var pizza = {
          id:id,
          name:name,
          price:price
        }
        // console.log(pizza);

        var pizzaString=localStorage.getItem("pizza");
        var pizzaArray;
        if (pizzaString==null) {
          pizzaArray=Array();
        } else {
          pizzaArray=JSON.parse(pizzaString);
        }

        var  status=false;

        $.each(pizzaArray,function (i,v) {
          if (id==v.id){
            status=true;
            
          }
        })


        if (!status) {
          pizzaArray.push(pizza);
        }
        var pizzaData=JSON.stringify(pizzaArray);
        localStorage.setItem("pizza",pizzaData);
        getData();


      });


    function getData() {
      
      var pizzaString = localStorage.getItem("pizza");
      // console.log(pizzaString);
      if(pizzaString){
        var pizzaArray = JSON.parse(pizzaString);

        var html=""; var qty=1;var total=0;
        var j= 1;

          $.each(pizzaArray,function (i,v) {
            // console.log(v);
            var name = v.name;
            var price = v.price;
            var subtotal = qty*price;
            // var subtotal = qty*price;
            //total+=parseInt(subtotal);
            // console.log(subtotal);

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
                


           
              console.log(total);

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
                      <textarea class="form-control" id ="notes"></textarea></td>
                      <td colspan="3">
                      <button class="btn btn-secondary btn-block checkoutbtn" data-total=${total}  style="background-color:#673AB7; border-color:#673AB7;">
                      Order</button></td>
      </tr>`

       $("#total").html(myfoot);

            
        }

      }



});