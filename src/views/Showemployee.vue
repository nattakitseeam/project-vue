<template>
    <div class="container my-5">
        <h2>แสดงข้อมูลพนักงาน</h2>
     <table class="table table-striped-columns"></table>
        <table class="table">
  <thead>
    <tr>
      <th scope="col">รหัส</th>
      <th scope="col">ชื่อจริง-นามสกุล</th>
      <th scope="col">สาขา</th>
      <th scope="col">เงินเดือน</th>
      <th scope="col">สถานะ</th>
      <th scope="col">วันที่ทำรายการ</th>
    </tr>
  </thead>

  <tbody>
    <tr v-for="item in emp" :key="item.emp_id">
      <td>{{item.emp_id}}</td>
      <td>{{item.full_name}}</td>
      <td>{{item.department}}</td>
      <td>{{item.salary}}</td>
      <td>
        <span v-if="item.active==1">ปกติ</span>
        <span v-else>ลาออก</span>
      </td>
      <td>{{item.created_at}}</td>
          
    </tr>      
   
  </tbody>
</table>




    </div>
</template>
<script setup>
import { ref, onMounted } from 'vue'

const emp = ref([])
const loading = ref(true)
const error = ref(null)

onMounted(async () => {
  try {
    const res = await fetch('http://localhost/project-vue/php_api/show_employee.php')
    emp.value = await res.json()
    //products.value = data.products
  } catch (err) {
    error.value = 'โหลดข้อมูลไม่สำเร็จ'
  } finally {
    loading.value = false
  }
})
</script>
