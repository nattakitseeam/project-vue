<template>
    <div class="container my-5">
        <h2>แสดงข้อมูลลูกค้า</h2>
     <table class="table table-striped-columns"></table>
        <table class="table">
  <thead>
    <tr>
      <th scope="col">รหัส</th>
      <th scope="col">ชื่อ</th>
      <th scope="col">นามสกุล</th>
      <th scope="col">เบอร์โทรศัพท์</th>
      <th scope="col">Username</th>
    </tr>
  </thead>

  <tbody>
    <tr v-for="item in customers" :key="item.customer_id">
      <td>{{item.customer_id}}</td>
      <td>{{item.firstName}}</td>
      <td>{{item.lastName}}</td>
      <td>{{item.phone}}</td>
      <td>{{item.username}}</td>
          
    </tr>      
   
  </tbody>
</table>




    </div>
</template>
<script setup>
import { ref, onMounted } from 'vue'

const customers = ref([])
const loading = ref(true)
const error = ref(null)

onMounted(async () => {
  try {
    const res = await fetch('http://localhost/project-vue/php_api/show_customer.php')
    customers.value = await res.json()
    //products.value = data.products
  } catch (err) {
    error.value = 'โหลดข้อมูลไม่สำเร็จ'
  } finally {
    loading.value = false
  }
})
</script>
