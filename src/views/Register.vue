<template >
 <div class="d-flex justify-content-center align-items-center vh-100">
    <div class="card shadow p-4" style="width: 500px; border-radius: 15px;">
      <h3 class="text-center mb-4">Register</h3>
      <form>
        <div class="mb-3">
          <label for="username" class="form-label">Firstname</label>
          <input type="text" class="form-control" id="username" placeholder="Enter Firstname" required>
        </div>
         <div class="mb-3">
          <label for="username" class="form-label">Lastname</label>
          <input type="text" class="form-control" id="username" placeholder="Enter Lastname" required>
        </div>
        <div class="mb-3">
          <label for="username" class="form-label">Telephone</label>
          <input type="text" class="form-control" id="username" placeholder="Telephone" required>
        </div>
        <div class="mb-3">
          <label for="username" class="form-label">Username</label>
          <input type="text" class="form-control" id="username" placeholder="Enter username" required>
        </div>
        
        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input type="password" class="form-control" id="password" placeholder="Enter password" required>
        </div>
        <button type="submit" class="btn btn-primary w-100">Login</button>
        <div class="text-center mt-3">
        </div>
      </form>
    </div>
  </div>

 
</template>
<script>
export default {
    
}
</script>
<style lang="">
    
</style>