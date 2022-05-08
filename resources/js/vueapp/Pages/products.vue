
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
<button @click="buyNow">Buy Now</button>
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
        let dataForCheckoutPage = {
        prod_id: this.myProduct.id,
        prod_name: this.myProduct.name,
        prod_slug: this.myProduct.slug,
        prod_price: this.myProduct.price,
        prod_image: this.myProduct.image,
      };
      await this.$store.dispatch('setDataForCheckoutPage',dataForCheckoutPage);
      this.$router.push({name: "checkout-page",});
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