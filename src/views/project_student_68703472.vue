<template>
    <div class="container mt-5">
      <h2>ระบบนักศึกษา</h2>
  
      <!-- ฟอร์ม -->
      <form @submit.prevent="addStudent">
        <input v-model="form.first_name" placeholder="ชื่อ" class="form-control mb-2" required>
        <input v-model="form.last_name" placeholder="นามสกุล" class="form-control mb-2" required>
        <input v-model="form.phone" placeholder="เบอร์โทร" class="form-control mb-2" required>
        <input v-model="form.email" placeholder="Email" class="form-control mb-2" required>
        <input v-model="form.faculty" placeholder="คณะ" class="form-control mb-2" required>
  
        <button class="btn btn-primary">เพิ่มข้อมูล</button>
      </form>
  
      <hr>
  
      <!-- ตาราง -->
      <table border="1" cellspacing="0" cellpadding="5">
  <thead>
    <tr>
      <th>ID</th>
      <th>ชื่อ</th>
      <th>นามสกุล</th>
      <th>เบอร์</th>
      <th>Email</th>
      <th>คณะ</th>
    </tr>
  </thead>
  
        <tbody>
          <tr v-for="s in students" :key="s.student_id">
            <td>{{ s.student_id }}</td>
            <td>{{ s.first_name }}</td>
            <td>{{ s.last_name }}</td>
            <td>{{ s.phone }}</td>
            <td>{{ s.email }}</td>
            <td>{{ s.faculty }}</td>
          </tr>
        </tbody>
      </table>
  
    </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        students: [],
        form: {
          first_name: '',
          last_name: '',
          phone: '',
          email: '',
          faculty: ''
        }
      }
    },
  
    methods: {
      async fetchStudents() {
        const res = await fetch('http://localhost/project-vue/php_api/get_students.php');
        this.students = await res.json();
      },
  
      async addStudent() {
        const res = await fetch('http://localhost/project-vue/php_api/add_student.php', {
          method: 'POST',
          headers: { 'Content-Type': 'application/json' },
          body: JSON.stringify(this.form)
        });
  
        const result = await res.json();
  
        alert(result.message);
  
        this.fetchStudents();
  
        this.form = {
          first_name: '',
          last_name: '',
          phone: '',
          email: '',
          faculty: ''
        };
      }
    },
  
    mounted() {
      this.fetchStudents();
    }
  }
  </script>