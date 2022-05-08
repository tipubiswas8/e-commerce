
<template>
<div class="main">
<p> I am from Product Page</p>

<table>
<thead>
<tr>
<th>Id:</th>
<th>Name:</th>
<th>Slug:</th>
<th>Price:</th>
</tr>
</thead>

<tbody>
<tr>
<td>{{myProduct.id}}</td>
<td>{{myProduct.name}}</td>
<td>{{myProduct.slug}}</td>
<td>{{myProduct.price}}</td>
<button @click="buyNow">Update</button>
</tr>

</tbody>
</table>

</div>
</template>


<script>
import Axios from "axios";
   export default {
   data(){
    return {
         myProduct: {}
        };
    },

 
  methods: {
    async buyNow() {
      this.$router.push({ 
        name: "checkout-page",
        query:{'product_id': this.myProduct.id,'product_name': this.myProduct.name, 'product_price': this.myProduct.price}
         });
    },
  },

async beforeMount() {
 let myProSlug = this.$route.params.mySlug;
   const abc =  await Axios.get("http://localhost:8000/api/product/"+myProSlug);
   this.myProduct = abc.data;
   console.log(abc.data);
   // console.log(myProSlug);
  }  
};

</script>