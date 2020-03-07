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


  var html = "";
      var tfoot = "";
      var i;
      var qty;
      var reprcie;
      var data = $('.id').last().val();
      // alert(id);
      var data = $('.data').last().text();
      var price_plus = $('.price').last().val();
      var num=parseInt(data);
      var pricetotal = parseInt(price_plus);
      var orgin_price = parseInt(price);
      // alert(pricetotal);

      // alert(num);
      if(data < 1)
      {
        data=id;
        i=1;
        qty=1;
        reprice = price;
      }
      else{
        // data=id+',';
        i=num+1;
        reprice = pricetotal+orgin_price;
        qty=1;
      }
      // alert(data);
      // alert(reprice);

      html += `<tr>
                <td class="data" value="${i}">${i}</td>
                <td><input type='text' class="id" value="${id}"></td>
                <input type="hidden" class="price" value="${reprice}">
                <td>${price}</td>
              </tr>`;
      
      tfoot += `<tr>
                      <td colspan="2">Subtotal</td>
                      <td class="subtotal">${reprice}</td>
                </tr>
                <tr>
                <td colspan="2">Qty</td>
                <td><input type="number" class="form-control total_qty_price"></td>
                </tr>
                <tr>
                <td colspan="2">Total</td>
                <td class="total_price"></td>
                </tr>
                <tr>
                <td colspan="2"></td>
                  <td><button class="btn btn-success btn_create" data-topping_id="${id}" data-crust=
                  ${id} >Create</button></td>
                </tr>`;

      $('#order').append(html);
      $('#total').html(tfoot);


      $('#total').on('change','.total_qty_price',function(){
        var qty = $(this).val();
        var subtotal = $('.subtotal').text();
        var total = qty * subtotal;
        $('.total_price').text(total);
      });

      $('#total').on('click','.btn_create',function(){
        var top_id = $(this).data('topping_id');
        var crust_id = $(this).data('crust_id'); 
        alert(top_id);
        // var id = $('#order').val();
        // console.log(id.length);
        

      })
    // console.log(pizza);

        // var html=""; var qty=1;var total=0;
        // var j= 1;

        // $.each(pizza,function (i,v) {
        //   console.log(v);
        //     var name = v.name;
        //     var price = v.price;
        //     var qty = v.qty;

        //     //console.log($name);
    
        //     html+=`<tr>
        //     <td>${j++}</td>
        //     <td>${name}</td>
        //     <td>${price}</td>
        //     <td>${qty}</td>
        //     <tr>`

        //   });
      

        //   $('#order').html(html);
  })
});