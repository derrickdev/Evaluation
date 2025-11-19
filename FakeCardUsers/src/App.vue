<script setup>
import { ref } from 'vue'

// Variable pour stocker les données de l'utilisateur
const user = ref(null)
const loading = ref(false)
const error = ref(null)

// Fonction pour récupérer un utilisateur aléatoire
const generateUser = async () => {
  loading.value = true
  error.value = null
  
  try {
    const response = await fetch('https://randomuser.me/api/')
    const data = await response.json()
    user.value = data.results[0]
  } catch (err) {
    error.value = 'Erreur lors de la récupération des données'
    console.error(err)
  } finally {
    loading.value = false
  }
}



// Fonction pour formater l'adresse complète
const formatAddress = (location) => {
  return `${location.street.number} ${location.street.name} -- 
          ${location.city} -- 
          ${location.country}`
}
</script>

<template>
  <div class="container">
    <h1>Fake User</h1>
    
    <button @click="generateUser" class="btn-generate" :disabled="loading">
      {{ loading ? 'Chargement...' : 'Générer un utilisateur' }}
    </button>

    <div v-if="error" class="error">{{ error }}</div>

    <div v-if="user" class="user-card">
      <img :src="user.picture.large" :alt="`Photo de ${user.name.first}`" class="user-photo" />
      
      <div class="user-info">
        <h2>{{ user.name.title }} {{ user.name.first }} {{ user.name.last }}</h2>
        
        <div class="info-item">
          <span class="label">Genre:</span>
          <span class="value">{{ user.gender }}</span>
        </div>
        
        <div class="info-item">
          <span class="label">Email:</span>
          <span class="value">{{ user.email }}</span>
        </div>
        
        <div class="info-item">
          <span class="label">Téléphone:</span>
          <span class="value">{{ user.phone }}</span>
        </div>
        
        <div class="info-item">
          <span class="label">Adresse:</span>
          <span class="value">{{ formatAddress(user.location) }}</span>
        </div>
      </div>
    </div>

    <div v-else-if="!loading" class="placeholder">
      <p>Cliquez sur le bouton pour générer un utilisateur aléatoire</p>
    </div>
  </div>
</template>

<style scoped>
  .container {
    max-width: 800px;
    margin: 0 auto;
    padding: 2rem;
    text-align: center;
  }

  h1 {
    color: #2c3e50;
    margin-bottom: 2rem;
    font-size: 4rem;
    animation: slideIn 0.5s ease;
  }

  .btn-generate {
    background-color: #42b983;
    color: white;
    border: none;
    padding: 1rem 2rem;
    font-size: 1.1rem;
    border-radius: 8px;
    cursor: pointer;
    transition: all 0.3s ease;
    margin-bottom: 2rem;
    font-weight: bold;
  }

  .btn-generate:hover {
    background-color: #359268;
  }

  .btn-generate:disabled {
    background-color: #95a5a6;
  }

  .error {
    background-color: #e74c3c;
    color: white;
    padding: 1rem;
    border-radius: 8px;
    margin-bottom: 1rem;
  }

  .user-card {
    background: white;
    border-radius: 16px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
    padding: 2rem;
    margin-top: 2rem;
  }

  .user-photo {
    width: 150px;
    height: 150px;
    border-radius: 50%;
    border: 5px solid rgb(70, 70, 223);
    margin-bottom: 1.5rem;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
  }

  .user-info {
    text-align: left;
    max-width: 600px;
    margin: 0 auto;
  }

  .user-info h2 {
    color: #2c3e50;
    margin-bottom: 1.5rem;
    text-align: center;
    font-size: 1.8rem;
  }

  .info-item {
    margin-bottom: 1rem;
    padding: 0.8rem;
    background-color: #f8f9fa;
    border-radius: 8px;
    display: flex;
    flex-wrap: wrap;
    gap: 0.5rem;
  }

  .label {
    font-weight: bold;
    color: #42b983;
    min-width: 100px;
  }

  .value {
    color: #2c3e50;
    flex: 1;
  }

  .placeholder {
    margin-top: 2rem;
    padding: 3rem;
    background-color: #f8f9fa;
    border-radius: 16px;
    color: #7f8c8d;
    font-size: 1.2rem;
  }
</style>
