$(document).ready(function () {
  $('.select').click(function () {
    var id = $(this).data("id");
    var name = $(this).data("name");
    var price = $(this).data("price");


// console.log(typeof (name));

      var pizza = {
                id:id,
                name:name,
                price:price,
                qty:1
              }

            // var pizzaArray = JSON.parse(pizza);

      var html = "";
      var i;
      var qty;
      var data = $('.data').last().text();
      var num=parseInt(data);
      alert(num);
      if(data < 1)
      {
        i=1;
        qty=1;
      }
      else{
        i=num+1;
        qty=1;
      }
      html += `<tr>
                <td class="data" value="${i}">${i}</td>
                <td>${name}</td>
                <td>
                
                
                ${qty}

                </td>
                <td>${price}</td>
                <td>${1*price}</td>
               
              </tr>`;
      


      $('#order').append(html);


      $('#order').on('click','.btn_add',function(){
        var qty = $('.btn_add').attr();
        alert(qty);
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