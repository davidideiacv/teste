<template>
  <div class="login-bg">
    <div class="login-card animate__animated animate__fadeInDown">
      <div class="logo">
        <!-- <img src="/logo.svg" alt="Hotel Logo" /> -->
        D
      </div>
      <h2>Crie sua conta</h2>
      <form @submit.prevent="register">
        <div class="input-group">
          <span class="icon"><i class="mdi mdi-account-outline"></i></span>
          <input v-model="name" type="text" placeholder="Nome completo" required />
        </div>
        <div class="input-group">
          <span class="icon"><i class="mdi mdi-email-outline"></i></span>
          <input v-model="email" type="email" placeholder="E-mail" required />
        </div>
        <div class="input-group">
          <span class="icon"><i class="mdi mdi-lock-outline"></i></span>
          <input v-model="password" type="password" placeholder="Senha" required />
        </div>
        <button type="submit" class="btn-main">Cadastrar</button>
        <div class="register-link">
          <span>Já tem conta?</span>
          <router-link to="/">Entrar</router-link>
        </div>
      </form>
      <div class="login-message" v-if="message">{{ message }}</div>
    </div>
  </div>
</template>

<script setup>
import { ref } from 'vue'
import axios from 'axios'
import { useRouter } from 'vue-router'

const name = ref('')
const email = ref('')
const password = ref('')
const message = ref('')
const router = useRouter()

const register = async () => {
  try {
    const response = await axios.post('http://localhost:8000/api/register', {
      name: name.value,
      email: email.value,
      password: password.value
    })
    message.value = 'Cadastro realizado com sucesso!'
    // Redirecionar para login após cadastro
    setTimeout(() => router.push('/'), 1200)
  } catch (error) {
    message.value = 'Erro ao cadastrar. Tente outro e-mail.'
  }
}
</script>

<style scoped>
@import 'animate.css';
@import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap');
@import url('https://cdn.jsdelivr.net/npm/@mdi/font@7.4.47/css/materialdesignicons.min.css');

.login-bg {
  min-height: 100vh;
  background: linear-gradient(120deg, #2980b9, #6dd5fa);
  display: flex;
  align-items: center;
  justify-content: center;
  font-family: 'Inter', Arial, sans-serif;
}
.login-card {
  background: #fff;
  padding: 40px 32px 32px 32px;
  border-radius: 18px;
  box-shadow: 0 8px 32px rgba(0,0,0,0.18);
  width: 350px;
  text-align: center;
  position: relative;
}
.logo img {
  width: 60px;
  margin-bottom: 12px;
}
.login-card h2 {
  margin-bottom: 24px;
  color: #2980b9;
  font-weight: 700;
}
.input-group {
  display: flex;
  align-items: center;
  background: #f3f6fa;
  border-radius: 8px;
  margin-bottom: 18px;
  padding: 0 10px;
  border: 1px solid #e0e6ed;
}
.input-group .icon {
  color: #2980b9;
  font-size: 1.3rem;
}
.input-group input {
  border: none;
  background: transparent;
  padding: 12px 8px;
  width: 100%;
  font-size: 1rem;
  outline: none;
}
.btn-main {
  width: 100%;
  padding: 12px;
  background: linear-gradient(90deg, #2980b9, #6dd5fa);
  color: #fff;
  border: none;
  border-radius: 8px;
  font-size: 1.1rem;
  font-weight: 700;
  cursor: pointer;
  margin-top: 8px;
  transition: background 0.3s;
}
.btn-main:hover {
  background: linear-gradient(90deg, #2573a6, #4db8e6);
}
.register-link {
  margin-top: 18px;
  font-size: 0.97rem;
}
.register-link a {
  color: #2980b9;
  font-weight: 700;
  margin-left: 4px;
  text-decoration: none;
}
.login-message {
  margin-top: 15px;
  color: #e74c3c;
  font-size: 15px;
  min-height: 20px;
}
</style>
