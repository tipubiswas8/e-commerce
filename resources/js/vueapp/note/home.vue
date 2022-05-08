<template>
<div class="main">
<p> I am from Home</p>

<table>
<thead>
<tr>
<th>Id:</th>
<th>Name:</th>
<th>Price:</th>
</tr>
</thead>

<tbody>
<tr>

<div v-for="(mySingleProduct, myIndex) in myProducts" :key="myKey" >
<router-link :to="{ name:'product-page', params:{ mySlug:mySingleProduct.slug} }">
<td>{{ mySingleProduct.id }}</td>
<td>{{ mySingleProduct.name }}</td>
<td>{{ mySingleProduct.price }}</td>  
</router-link>
</div>

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
         myProducts: []
        };
    },

  async beforeMount() {
      const xyz =  await Axios.get("http://localhost:8000/api/products-list");
       this.myProducts = xyz.data;
       // console.log(xyz.data);
       
  }
  };


</script>