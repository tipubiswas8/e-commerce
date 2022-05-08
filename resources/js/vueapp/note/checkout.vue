
<template>
<div class="main">

<p> I am from Checkout Page</p>

<form action="" @submit.prevent="placeOrder">

<p>Product Name: {{ checkoutData.p_name }}</p>
<p>Product Price: {{ checkoutData.p_price }} Taka</p>

<label>Enter New Name</label><br>
<input type="text" v-model="checkoutData.p_name"/><br>
<label>Enter New Price</label><br>
<input type="text" v-model="checkoutData.p_price"/><br>

<button>Update</button>
</form>

</div>
</template>


<script>

import Axios from "axios";
export default {

  data() {
    return {
      checkoutData: {
        p_id: null,
        p_name: "",
        p_price: "",
      },
    };
  },

  methods:{
    async placeOrder(){
     let myId = this.checkoutData.p_id;
     console.log(myId);
      const myResponse = await Axios.put("/api/edit-order/"+myId);
              if (myResponse.data.mySuccess) {
          this.$router.push({
            name: "checkout-success-page",
          });
        } else {
          this.$router.push({
            name: "checkout-failure-page",
          });
        }
    }
  },


  beforeMount() {
    this.checkoutData.p_id = this.$route.query.product_id;
    this.checkoutData.p_name = this.$route.query.product_name;
    this.checkoutData.p_price = this.$route.query.product_price;
  },
};

</script>