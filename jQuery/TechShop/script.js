$(document).ready(function(){


    count();
    getData();
    function getData() {
        let itemString = localStorage.getItem('shops');
        if(itemString){
            let itemsArray = JSON.parse(itemString);
            let data ='';
            let j=1;
            let total=0;
            $.each(itemsArray,function(i,v){
                data += `<tr>
                <td>${j++}</td>
                <td>${v.name}</td>
                <td>${v.price}</td>
                <td><button class="min" data-key="${i}">-</button>
                ${v.qty}
                <button class="max" data-key="${z}">+</button>
                </td>
                <td>${v.price*v.qty}</td>
                </tr>`
                total+= v.price*v.qty;
            })
            
            data += `<tr>
            <td colspan="4">Total</td>
            <td>${total}</td>
            </tr>`;
            $('#tbody').html(data);
        }
    }

    function count(){
        let itemString = localStorage.getItem('shops');
        if(itemString) {
            let itemsArray = JSON.parse(itemString);
            if(itemsArray!=null) {
                let count=itemsArray.length;
                $("#count_item").text(count);
            }

        }
    }

    $('.addToCart').click(function(){
        // alert("hello");
        let id=$(this).data('id');
        let name=$(this).data('name');
        let price=$(this).data('price');
        console.log(id,name,price);


        let items ={
            id:id,
            name:name,
            price:price,
            qty:1,
        }

        //local storage
        let itemString = localStorage.getItem('shops');
        let itemsArray;

        if(itemString == null){
            itemsArray=[];
        }else{
            itemsArray = JSON.parse(itemString);
        }

        let status=false;
        $.each(itemsArray,function(i,v){
            if(v.id==id){
                v.qty++;
                status=true;
            }
        })

        if(status==false){
            itemsArray.push(items);

        }
        let itemsData = JSON.stringify(itemsArray);
        localStorage.setItem('shops',itemsData);
        count();

    })

    $('#tbody').on('click',".min",function(){
        let key=$(this).data('key');
        //alert (key);
        let itemString=localStorage.getItem('shops');
        if(itemString){
            let itemsArray=JSON.parse(itemString);
            $.each(itemsArray,function(i,v){
                if(i==key){
                    v.qty--;
                    if(v.qty==0){
                        itemsArray.splice(key,1)//splice  to delete
                    }
                }
            });
            let itemsData=JSON.stringify(itemsArray);
            localStorage.setItem('shops',itemsData);
            getData();
        }

        $('#tbody').on('click',".max",function(){
            let key=$(this).data('key');
            //alert (key);
            let itemString=localStorage.getItem('shops');
            if(itemString){
                let itemsArray=JSON.parse(itemString);
                $.each(itemsArray,function(z,v){
                    if(z==key){
                        v.qty++;

                        
                    }
                });
                let itemsData=JSON.stringify(itemsArray);
                localStorage.setItem('shops',itemsData);
                getData();
            }
            })
    })
    $('#order_now').click(function{
        let ans=confirm('Are you sure order?');
        //console.log(ans);
        if(ans){
            localStorage.removeItem('shops');
            window.location.href="index.html";
        }
    
    })
})