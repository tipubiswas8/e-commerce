
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

<div v-for="(mySingleProduct, myIndex) in $store.getters.getMyProducts" :key="myKey" >
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

  export default {
    async beforeMount() {
      await this.$store.dispatch('loadDataFromMySql'); 
       },
  };

</script>