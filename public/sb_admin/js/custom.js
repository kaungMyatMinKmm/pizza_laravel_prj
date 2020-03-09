$(document).ready(function () {
getData();

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});


  
  $('.select').click(function () {
    var id = $(this).data("id");
    var name = $(this).data("name");
    var price = $(this).data("price");

    var recipe = {
          id:id,
          name:name,
          price:price,
          
        };
        var recipeString=localStorage.getItem("recipe");
        var recipeArray;
        if (recipeString==null){
          recipeArray=Array();
        } else {
          recipeArray=JSON.parse(recipeString);
        }
      

        if (!status) {
          recipeArray.push(recipe);
        }
        var recipeData=JSON.stringify(recipeArray);
        localStorage.setItem("recipe",recipeData);
        getData();
        // location.reload();
      

  });
  


      function getData() {

      
      var recipeString = localStorage.getItem("recipe");
      // console.log(recipeString);
      if(recipeString){
        var recipeArray = JSON.parse(recipeString);

        var html="";var myfoot="";var total=0; var subtotal=0;
        var j= 1;
        // var qty1=0;

          $.each(recipeArray,function (i,v) {
            // console.log(v);
            var id = v.id;
            // console.log(id);
            var name = v.name;
            var price = v.price;
            // var qty = v.qty;
            // var subtotal = price;
            // console.log(qty);
           
            subtotal+=price;
            // qty1+=qty++;


            html+=`<tr>
            <td>${j++}</td>
            <td>${name}</td>
            <td>${price}</td>
            <td><button class="btn btn-danger deletebtn" data-id="${i}">Delete</button></td>
            </tr> `;
            
              
          });

          // console.log(qty1);
          // console.log(subtotal1);
            
            $("#order").html(html);

            myfoot +=`<tr>
            <td colspan=3>
            <h5 class="text-left price" data-price = "${subtotal}">Subtotal: ${subtotal}Ks,</h5></td>
            </td>
            <td colspan="2">
            <h5 class="text-right">Qty:<input type="number" class="form-control qty" value="0"> </h5>

            </td>
            </td>
             </tr>
             <tr>
              <td> <h3>Total</h3></td>
              <td ><h5 class="total_price"></h5></td>
             </tr>
            <tr>
            <td>
              <button class="btn btn-secondary btn-block createbtn"   style="background-color:#673AB7; border-color:#673AB7;">
                      Create</button>

            </td>
            <td class="orderbtn">
            </td>
            </tr>`
            $("#total").html(myfoot)
            // console.log(id); 
        }

      }
      
      $('.qty').change(function(){

        var qty = $(this).val();
        var price = $('.price').data('price');

        var int_price = parseInt(price);
        var total_price = qty*int_price;
        alert(total_price);
        $('.total_price').text(total_price);

      })
   

      $('#total').on('click','.createbtn',function () {
      
         var data="";
             data+= `
                    <button class="btn btn-secondary btn-block order_recipe"  style="background-color:#673AB7;">Order</button>
                    <button class="btn btn-secondary btn-block print"  style="background-color:#00FF00;">Print</button>
                    `;
             $('.orderbtn').html(data);


        var recipeString=localStorage.getItem("recipe");
        var recipeArray = JSON.parse(recipeString);

        var createString = localStorage.getItem('create');
        var createArray;

        if (createString==null){
          createArray=Array();
        } else {
          createArray=JSON.parse(createString);
        }
        var status=false;
        var topping_id;
        var crust_id;
        var size_id 
        // $.each(recipeArray,function (i,v) {
        if(recipeArray[0]){
         topping_id = recipeArray[0].id;
        }
        else
        {
          topping_id=1;
        }

         if(recipeArray[1]){
         crust_id = recipeArray[1].id;
        }
        else
        {
          crust_id=1;
        }

        if(recipeArray[2]){
         size_id = recipeArray[2].id;
        }
        else
        {
          size_id=1;
        }


        var price = $('.price').data('price');
        var qty = $('.qty').val();
       

         create = {
                  topping_id:topping_id,
                  crust_id:crust_id,
                  size_id:size_id,
                  price:price,
                  qty:qty
                };
         

         // console.log(create);

        

        if (!status) {
          createArray.push(create);
        }
        var createData=JSON.stringify(createArray);
        localStorage.setItem("create",createData);
       // });
        // localStorage.clear();
      })

      $('#total').on('click','.order_recipe',function(){
        // alert('helo');
        var recipeString = localStorage.getItem('create');
        console.log(recipeString);
        if(recipeString)
        {
          var recipeArray = JSON.parse(recipeString);
          $.post("/backend/order_store",{data:recipeArray},function(res){
            // console.log(res);
          })
          
        }
        localStorage.clear();
        location.reload();

      })

      // $('.order_recipe').click(function(){

      //   var recipeString = localStorage.getItem('create');
      //   console.log(recipeString);
      //   if(recipeString)
      //   {
      //     var recipeArray = JSON.parse(recipeString);
      //     $.post("/backend/order_store",{data:recipeArray},function(res){
      //       // console.log(res);
      //     })
          
      //   }

      // })





    $("tbody").on('click', ".deletebtn", function () {
    var id = $(this).data('id');
    // console.log(id);
    var ans = confirm("Are you sure want to delete?");

    if (ans) {
      var recipe = localStorage.getItem('recipe');
      var recipeObj = JSON.parse(recipe);
      

      recipeObj.splice(id,1);
      var recipeObj = JSON.stringify(recipeObj);
      console.log(recipeObj);
      localStorage.setItem('recipe',recipeObj);
      getData();

      
    }
    // getData();

   });





// $('#something').click(function() {
//     location.reload();
// });

  // $('#total').on('click', '.createbtn', function(){

  //       var recipeString = localStorage.getItem('recipe');
        
  //       var recipeArray = JSON.parse(recipeString);
  //       // console.log(typeof(createArray));
  //        // console.log(createArray);
  //       var createString = localStorage.getItem('create');
  //       var array_data;


  //       if(!createString)
  //       {
  //         array_data=Array();
  //       }else{

  //         array_data = JSON.parse(createString);

  //       }
  //       var data = {
  //         id:id,
  //       }
  //       // console.log(typeof(array_data));

  //       var id;
  //       var status=false;
  //       $.each(recipeArray,function (i,v) {
        
        
  //         data.id = v.id;
  //         if (!status) {
  //        array_data.push(data);
  //        }
  //       var idData=JSON.stringify(array_data);
  //       console.log(idData);
  //       localStorage.setItem("create",idData);
        
  //    });


  //        // console.log(localStorage.getItem('create'));

  //  });
});


// <button class="btn-increase" data-id="${i}">+</button>${qty}
// <button class="btn-decrease" data-id="${i}">-</button>

