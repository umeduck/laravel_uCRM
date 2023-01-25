<script setup>
import {reactive} from 'vue';
import {Inertia} from '@inertiajs/inertia'

defineProps({
  errors: Object 
})

const form = reactive({
  title: null,
  content: null
})

const submitFunction = () => {
  Inertia.post('/inertia', form)
}

</script>

<template>
  <form @submit.prevent="submitFunction">
    <input type="text" name="title" v-model="form.title" style="border: 1px solid black;"><br><br>
    <div v-if="errors.title">{{ errors.title }}</div>
    <input type="text" name="content" v-model="form.content" style="border: 1px solid black;"><br>
    <div v-if="errors.content">{{ errors.content }}</div>
    <button>送信</button>
  </form>
</template>