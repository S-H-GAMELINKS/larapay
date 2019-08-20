<template>
  <div class="container">
    <div class="form-group">
      <label for="paymentForm">Password</label>
      <input
        type="numbers"
        class="form-control"
        id="paymentForm"
        v-model="price"
        placeholder="支払額を入力してください"
      />
    </div>
    <button class="btn btn-primary" v-on:click="setPayment()">支払いを登録</button>
  </div>
</template>

 <script>
import axios from "axios";
import $ from "jquery";

export default {
  data: function() {
    return {
      price: ""
    };
  },
  methods: {
    setPayment: function(token) {
      axios.defaults.headers["X-CSRF-TOKEN"] = $("meta[name=csrf-token]").attr(
        "content"
      );
      axios.defaults.headers["content-type"] = "application/json";
      axios.post("/pay", { price: this.price }).then(
        response => {
          alert("Success!");
          location.href = "/";
        },
        error => {
          alert("Failed!");
        }
      );
    }
  }
};
</script>