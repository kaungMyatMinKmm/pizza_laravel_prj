$(document).ready(function () {

  getData();
  $('.select').click(function () {
    var id = $(this).data("id");
    var name = $(this).data("name");
    var price = $(this).data("price");

    var recipe = {
          id:id,
          name:name,
          price:price,
          qty:1
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

  });


      function getData() {
      
      var recipeString = localStorage.getItem("recipe");
      // console.log(recipeString);
      if(recipeString){
        var recipeArray = JSON.parse(recipeString);

        var html="";var myfoot="";var total=0; var subtotal1=0;
        var j= 1;

          $.each(recipeArray,function (i,v) {
            // console.log(v);
            var id = v.id;
            // console.log(id);
            var name = v.name;
            var price = v.price;
            var qty = v.qty;
            var subtotal = qty*price;
            console.log(qty);
           
            subtotal1+=subtotal++;

            html+=`<tr>
            <td>${j++}</td>
            <td>${name}</td>
            <td>${price}</td>
            <td><button class="btn btn-danger deletebtn" data-id="${i}">Delete</button></td>
            </tr> `;
            
              
          });

          // console.log(total);
            
            $("#order").html(html);

            myfoot +=`<tr>
            <td colspan=3>
            <h5 class="text-left">Subtotal: ${subtotal1}Ks,</h5></td>
            </td>
            <td colspan=3>
            <h5 class="text-right">Qty:</h5></td>
            </td>
             </tr>
            <tr>
            <td>
              <button class="btn btn-secondary btn-block createbtn"   style="background-color:#673AB7; border-color:#673AB7;">
                      Create</button>

            </td>
            </tr>`
            $("#total").html(myfoot)
            // console.log(id);


            
        }

      }

      $('#total').on('click','.createbtn', function () {



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

        $.each(recipeArray,function (i,v) {
        
         var create = v.id;

         create = {id:create};

         // console.log(create);

        

        if (!status) {
          createArray.push(create);
        }
        var createData=JSON.stringify(createArray);
        localStorage.setItem("create",createData);
       });
        
      })


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

   });

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

