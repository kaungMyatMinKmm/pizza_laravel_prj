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
        var status=false;

        $.each(recipeArray,function (i,v) {
          if (id==v.id) {
            v.qty++;
          }

          });

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
            // console.log(typeof subtotal);
            // total+=parseInt(subtotal);
            subtotal1+=parseInt(subtotal);
            // console.log(typeof total);

            html+=`<tr>
            <td>${j++}</td>
            <td>${name}</td>
            <td>${price}</td>
            <td><button class="delete" data-id="${i}">Delete</button></td>
            </tr> `;
            
              
          });

          // console.log(total);
            
            $("#order").html(html);

            myfoot +=`<tr>
            <td colspan=5>
            <h5 class="text-right">Subtotal: ${subtotal1}Ks</h5></td>
            </td> </tr>
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

  $('#total').on('click', '.createbtn', function(){

        var recipeString = localStorage.getItem('recipe');
        
        var recipeArray = JSON.parse(recipeString);
        // console.log(typeof(createArray));
         // console.log(createArray);
        var createString = localStorage.getItem('create');
        var array_data;
        if(!createString)
        {
          array_data=Array();
        }else{

          array_data = JSON.parse(createString);

        }
        var data = {
          id:id,
        }
        // console.log(typeof(array_data));

        var id;
        $.each(recipeArray,function (i,v) {
        
        if(data.id != v.id){
          data.id = v.id;
         array_data.push(data);
        var idData=JSON.stringify(array_data);
        localStorage.setItem("create",idData);
        }
     });


         console.log(localStorage.getItem('create'));

          


   });
});

