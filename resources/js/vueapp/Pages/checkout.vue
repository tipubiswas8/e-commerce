
<template>
<div class="main">

<p> I am from Checkout Page</p>

<form action="" @submit.prevent="placeOrder">

<p>Product Name: {{ checkoutData.p_name }}</p>
<p>Product Price: {{ checkoutData.p_price }} Taka</p>

<label>Customer Name</label><br>
<input type="text" v-model="shippingInfo.customer_name"/><br>
<label>Customer Address</label><br>
<input type="text" v-model="shippingInfo.customer_address"/><br>
<label>Customer Phone</label><br>
<input type="text" v-model="shippingInfo.customer_phone"/><br>

<button>Order Submit</button>
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

      shippingInfo: {
        customer_name: "",
        customer_address: "",
        customer_phone: "",
      },

    };
  },

  methods:{
    async placeOrder(){
      let orderData = {
        pro_id: this.checkoutData.p_id,
        pro_name: this.checkoutData.p_name,
        pro_price: this.checkoutData.p_price,
        ship_info: this.shippingInfo,
      };
      const myResponse = await Axios.post('/api/place-order', orderData);
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
    this.checkoutData.p_id = this.$store.getters.getMyCheckoutData.prod_id;
    this.checkoutData.p_name = this.$store.getters.getMyCheckoutData.prod_name;
    // this.checkoutData.p_slug = this.$store.getters.getMyCheckoutData.prod_slug;
    this.checkoutData.p_price = this.$store.getters.getMyCheckoutData.prod_price;
    // this.checkoutData.p_image = this.$store.getters.getMyCheckoutData.prod_image;
  },
};
</script>
